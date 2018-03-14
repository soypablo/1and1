@extends('layouts.app')
@section('title','编辑个人资料')

@section('content')
    @include('common._message')

    <div class="card w-75 mx-auto">
        <h5 class="card-header">
            <i class="far fa-edit"></i> 编辑个人资料
        </h5>
        <div class="card-body">
            @include('common.error')
            <form action="{{route('users.update',[Auth::user()])}}" method="post" accept-charset="UTF-8">{{csrf_field()}}{{method_field('PUT')}}
                <div class="form-group">
                    <label for="name-field">用户名</label>
                    <input type="text" class="form-control" name="name" id="name-field" value="{{old('name')}}">
                </div>
                <div class="form-group">
                    <label for="email-field">邮箱</label>
                    <input type="email" class="form-control" name="email" id="email-field" value="{{old('email',Auth::user()->email)}}" disabled>
                </div>
                <div class="form-group">
                    <label for="introduction-field">个人简介</label>
                    <textarea name="introduction" id="introduction-field" class="form-control" rows="3"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">提交修改</button>

            </form>
        </div>
    </div>
@endsection