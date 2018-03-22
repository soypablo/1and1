@extends('layouts.app')
@section('title',$user->name.'的个人中心')

@section('content')
    <div class="container mt-5" id="show-container">
        <div class="row">
            <div class="col-md-3">
                <div class="card">
                    <img class="img-thumbnail card-img-top" src="{{asset($user->avatar)}}" alt="图像">
                    <div class="card-body">
                        <h4 class="card-title">个人简介</h4>
                        <p class="card-text">{{$user->introduction}}</p>
                        <hr>
                        <h4 class="card-title">注册于</h4>
                        <p class="card-text">{{$user->created_at->diffForHumans()}}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                <div class="card">
                    <div class="card-body">
                        <h1 class="card-title users-show-title">{{$user->name}} <span
                                    class="text-muted">{{$user->email}}</span></h1>
                    </div>
                </div>
                <hr>
                <div class="card">
                    <div class="card-body">暂无数据</div>
                </div>
            </div>
        </div>
    </div>

@endsection