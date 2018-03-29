@if(count($topics))
    @foreach( $topics as $topic  )
        <ul class="list-unstyled media-list">
            <li class="media border-bottom topic-li">
                <img src="{{asset('/storage/'.$topic->user->avatar)}}" alt="" class="mr-3 img-thumbnail align-self-center">
                <div class="media-body">
                    <span class="badge-secondary badge-pill float-right">{{$topic->reply_count}}</span>
                    <h4 class="mt-0 mb-3"><a href="{{route('topics.show',[$topic])}}">{{$topic->title}}</a></h4>
                    <a href="{{route('categories.show',$topic->category->id)}}" title="类别:{{$topic->category->name}}">
                        <span class="text-muted"><i class="fa fa-list-ol"
                                                    aria-hidden="true"></i> {{$topic->category->name}}</span>
                    </a>
                    <span class="text-muted"><i class="fa fa-user-circle" aria-hidden="true"></i> {{$topic->user->name}}</span>
                    <span class="text-muted"><i class="fa fa-clock-o"
                                                aria-hidden="true"></i> {{$topic->created_at->diffForHumans()}}</span>
                </div>
            </li>
        </ul>
    @endforeach
@else
    <div>暂无数据</div>
@endif