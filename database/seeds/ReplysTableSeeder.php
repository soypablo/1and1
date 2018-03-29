<?php

use App\Models\Topic;
use App\Models\User;
use Illuminate\Database\Seeder;
use App\Models\Reply;

class ReplysTableSeeder extends Seeder
{
    public function run()
    {
        $user_ids  = User::all()->pluck('id')->toArray();
        $topic_ids = Topic::all()->pluck('id')->toArray();
        $replys    = factory(Reply::class)->times(600)->make()->each(function($reply, $index) use ($user_ids, $topic_ids) {
            $reply->user_id = array_random($user_ids);
            $reply->topic_id = array_random($topic_ids);

        });

        Reply::insert($replys->toArray());
    }

}

