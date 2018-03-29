<div class="reply-list">
    <ul class="list-unstyled">
        @foreach($replies as $reply )
            <li class="media border-bottom pb-2 mb-3">
                <a href="{{route('users.show',[$reply->user_id])}}">
                    <img class="mr-3 img-thumbnail" src="{{asset('storage/'.$reply->user->avatar) }}"
                         alt="Generic placeholder image">
                </a>
              <span class="reply-trash">  <a href="" title="删除回复">
                        <i class="fa fa-trash-o fa-lg" aria-hidden="true"></i>
                    </a></span>
                <div class="media-body">
                    <h5 class="mt-0 mb-1"><a href="{{route('users.show',[$reply->user_id])}}">{{$reply->user->name}}</a>   <i class="fa fa-weixin" aria-hidden="true"></i> <span class="text-muted">{{$reply->updated_at->diffForHumans()}} </span>   </h5>
                    <p class="reply-content">{!! $reply->content !!}
                    </p>
                </div>
            </li>
        @endforeach
    </ul>
</div>