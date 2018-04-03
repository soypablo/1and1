<?php

namespace App\Observers;

use App\Models\Reply;
use App\Notifications\TopicReplied;
use function clean;

// creating, created, updating, updated, saving,
// saved,  deleting, deleted, restoring, restored

class ReplyObserver
{
    public function creating(Reply $reply)
    {

    }

    public function created(Reply $reply)
    {
        $reply->topic->increment('reply_count',1);
        $reply->content =clean($reply->content,'user_topic_body');

        $reply->topic->user->notify(new TopicReplied($reply));
    }

    public function updating(Reply $reply)
    {
        //
    }

    public function deleted(Reply $reply)
    {
        $reply->topic->decrement('reply_count',1);
    }
}