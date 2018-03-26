@if (count($errors) > 0)
    <div class="alert alert-danger">
        <p>输入信息有误!!!</p>
        <ul>
            @foreach ($errors->all() as $error)
             <li><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> {{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif