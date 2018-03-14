@if(count($errors)>0)
    <div class="alert alert-danger">
        <h4>输入错误</h4>
        <ul>
            @foreach( $errors->all() as $error )
                <li><i class="fas fa-cut"></i>{{$error}}</li>

            @endforeach
        </ul>
    </div>

@endif