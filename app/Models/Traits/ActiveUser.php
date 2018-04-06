<?php

namespace App\Models\Traits;

use Illuminate\Support\Facades\Cache;

trait ActiveUser
{
    //存放 临时用户数组
    protected $users = [];

    //配置信息
    protected $topic_weight = 4;//话题权重
    protected $reply_weight = 1;//回复权重
    protected $pass_days = 7;//多少天内发表的内容
    protected $users_number = 6;//取出多少用户

    //缓存相关配置
    protected $cache_key ='1and1_active_users';
    protected $cache_expire_in_minutes=60;

    public function getActiveUsers()
    {
        return Cache::remember($this->cache_key, $this->cache_expire_in_minutes, function(){
            return ;
        });
    }

}