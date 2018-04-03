<li class="media border-bottom mb-3 pb-2 repliy-li">
    <img class="mr-3 img-thumbnail rounded-circle media-img" src="{{asset('storage/'.$notification->data['user_avatar'])}}" alt="Generic placeholder image">
    <div class="media-body">
      <h5 class="reply-content"><a href="{{route('users.show',[$notification->data['user_id']])}}">{{$notification->data['user_name']}}</a> 评论了你的话题
          <a href="{{$notification->data['topic_link']}}">{{$notification->data['topic_title']}}</a>
          <small class="float-right">{{$notification->created_at->diffForHumans()}}</small>
      </h5>
        <div class="reply-content">{!! $notification->data['reply_content']!!}</div>
    </div>
</li>