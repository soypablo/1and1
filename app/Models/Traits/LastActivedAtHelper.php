<?php

namespace App\Models\Traits;


use Carbon\Carbon;
use Illuminate\Support\Facades\Cache;
use Redis;


trait LastActivedAtHelper
{
    //缓存相关
    protected $hash_prefix = 'larabbs_last_actived_at_';
    protected $field_prefix = 'user_';

    public function recordLastActivedAt()
    {
        //获取今天日期
        $date = Carbon::now()->toDateString();

        //获取当前时间
        $now = Carbon::now()->toDateTimeString();

        //Redis 哈希表的命名
        $hash = $this->hash_prefix.$date;

        //字段名称
        $field = $this->field_prefix.$this->attributes['id'];
     //  dd( \Illuminate\Support\Facades\Redis::hGetAll($hash));

        //数据写入Redis,字段已存在的会被更新
        \Illuminate\Support\Facades\Redis::hSet($hash, $field, $now);
    }

    public function syncUserActivedAt()
    {
        // 获取昨天的日期，格式如：2017-10-21
        $yesterday_date = Carbon::yesterday()->toDateString();

        // Redis 哈希表的命名，如：larabbs_last_actived_at_2017-10-21
        $hash = $this->hash_prefix.$yesterday_date;

        // 从 Redis 中获取所有哈希表里的数据
        $dates = Redis::hGetAll($hash);

        // 遍历，并同步到数据库中
        foreach($dates as $user_id => $actived_at) {
            // 会将 `user_1` 转换为 1
            $user_id = str_replace($this->field_prefix, '', $user_id);

            // 只有当用户存在时才更新到数据库中
            if($user = $this->find($user_id)){
                $user->last_actived_at = $actived_at;
                $user->save();
            }
        }

        // 以数据库为中心的存储，既已同步，即可删除
        Redis::del($hash);
    }

}