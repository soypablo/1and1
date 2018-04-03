<div class="reply-list">
    @if(count($replies))
        <ul class="list-unstyled">
            @foreach($replies as $reply )
                <li class="media border-bottom pb-2 mb-3">
                    <a href="{{route('users.show',[$reply->user_id])}}">
                        <img class="mr-3 img-thumbnail" src="{{asset('storage/'.$reply->user->avatar) }}"
                             alt="Generic placeholder image">
                    </a>
                    @can('destroy',$topic)
                        <span class="reply-trash">
                        <form action="{{route('replies.destroy',[$reply])}}"
                              method="post">{{csrf_field()}}{{method_field('DELETE')}}
                            <button type="submit" class="btn btn-link" title="删除"><i class="fa fa-trash-o fa-lg"
                                                                                     aria-hidden="true"></i></button>
                        </form>
                    </span>
                    @endcan
                    <div class="media-body">
                        <h5 class="mt-0 mb-1"><a
                                    href="{{route('users.show',[$reply->user_id])}}">{{$reply->user->name}}</a> <i
                                    class="fa fa-clock-o" aria-hidden="true"></i> 回复于 <span
                                    class="text-muted">{{$reply->updated_at->diffForHumans()}} </span></h5>
                        <p class="reply-content">{!! $reply->content !!}
                        </p>
                    </div>
                </li>
            @endforeach
        </ul>
        {!! $replies->links('vendor/pagination/bootstrap-4') !!}
    @else
        <div>暂无回复</div>
    @endif
</div>