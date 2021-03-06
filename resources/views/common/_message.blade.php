@foreach( ['success','info','danger'] as $message )
    @if(Session::has($message))
        <div class="alert alert-{{$message}} alert-dismissible fade show w-50 mx-auto mt-3" role="alert">
            <strong>{{Session::get($message)}}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        
    @endif

@endforeach