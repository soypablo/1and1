@extends('layouts.app')
@section('title','编辑个人资料')

@section('content')
    @include('common._message')
    <div class="container mt-5">
        <div class="card w-75 mx-auto">
            <h5 class="card-header">
                <i class="fa fa-pencil-square-o" aria-hidden="true"></i> 编辑个人资料
            </h5>
            <div class="card-body">
                @include('common.error')
                <form action="{{route('users.update',[Auth::user()])}}" method="post" accept-charset="UTF-8"
                      enctype="multipart/form-data">{{csrf_field()}}{{method_field('PUT')}}
                    <div class="form-group">
                        <label for="name-field">用户名</label>
                        <input type="text" class="form-control" name="name" id="name-field" value="{{old('name')}}">
                    </div>
                    <div class="form-group">
                        <label for="email-field">邮箱</label>
                        <input type="email" class="form-control" name="email" id="email-field"
                               value="{{old('email',Auth::user()->email)}}" disabled>
                    </div>
                    <div class="form-group">
                        <label for="introduction-field">个人简介</label>
                        <textarea name="introduction" id="introduction-field" class="form-control"
                                  rows="3">{{Auth::user()->introduction}}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="avatar" class="avatar-label">用户头像</label>
                        <input type="file" name="avatar" class="form-control-file">
                        @if($user->avatar)
                            <br>
                            <img src="{{$user->avatar}}" width="200" alt="">
                        @endif
                    </div>
                    <button type="submit" class="btn btn-primary">提交修改</button>

                </form>
            </div>
        </div>
    </div>
@endsection