@if($first)
    @foreach( $topics as $topic  )
        <ul class="list-unstyled media-list">
            <li class="media border-bottom topic-li">
                <img src="{{$topic->user->avatar}}" alt="" class="mr-3 img-thumbnail align-self-center">
                <div class="media-body">
                    <span class="badge-secondary badge-pill float-right">{{$topic->reply_count}}</span>

                    <h4 class="mt-0 mb-3">{{$topic->title}}</h4>
                    <a href="{{route('categories.show',$topic->category->id)}}">
                    <span class="text-muted"><i class="fa fa-question-circle-o" aria-hidden="true"></i>{{$topic->category->name}}</span>
                    </a>
                    <span> • </span>
                    <span class="text-muted"><i class="fa fa-user-circle" aria-hidden="true"></i>{{$topic->user->name}}</span>
                    <span class="text-muted"><i class="fa fa-clock-o" aria-hidden="true"></i>{{$topic->created_at->diffForHumans()}}</span>
                </div>
            </li>
        </ul>
    @endforeach
@else
<div>暂无数据</div>
@endif