@if(count($topics))
    <ul class="list-group list-group-flush meta-ul">
        @foreach( $topics as $topic )
            <li class="list-group-item list-group-item-action">
                <a href="{{route('topics.show',[$topic])}}">{{$topic->title}}</a>
                <span class="float-right meta">
                                            {{$topic->reply_count}}回复
                                            <i class="fa fa-dot-circle-o" aria-hidden="true"></i>
                                           发表于{{$topic->created_at->diffForHumans()}}
                                        </span>
            </li>
        @endforeach
    </ul>
    {!! $topics->links('vendor/pagination/bootstrap-4') !!}

@else
    <div>暂无数据</div>
@endif