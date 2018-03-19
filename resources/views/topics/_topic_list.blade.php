@if(count($topics))
    @foreach( $topics as $topic  )
        <ul class="list-unstyled">
            <li class="media border-bottom">
                <img src="{{$topic->user->avatar}}" alt="" class="mr-3 img-thumbnail">
                <div class="media-body">
                    <h5 class="mt-0 mb-3">{{$topic->title}}</h5>
                    {{$topic->user->name}}
                </div>
            </li>
        </ul>
    @endforeach
@else

@endif