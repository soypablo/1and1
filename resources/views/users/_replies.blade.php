@if(count($replies))
    <ul class="list-group list-group-flush meta-ul">
        @foreach( $replies as $reply )
            <li class="list-group-item list-group-item-action">
                <a href="{{route('topics.show',$reply->topic->id)}}"> {{$reply->topic->title}}</a>
                <div class="reply-content">
                    {!! $reply->content !!}
                </div>
                <div>
                    <i class="fa fa-clock-o" aria-hidden="true"></i>   回复于 {{$reply->created_at->diffForHumans()}}
                </div>
            </li>
        @endforeach
    </ul>
    {!! $replies->appends(['tab'=>'replies'])->links('vendor/pagination/bootstrap-4') !!}

@else
    <div>暂无数据</div>
@endif