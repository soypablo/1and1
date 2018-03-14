@extends('layouts.app')
@section('title',$user->name.'的个人中心')

@section('content')
    <div class="row">
        <div class="col-md-3">
            <div class="card">
                <img class="img-thumbnail card-img-top"  src="{{$user->gravatar(200)}}" alt="图像">
                <div class="card-body">
                    <h4 class="card-title">个人简介</h4>
                    <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci animi debitis deserunt dolore hic ipsa laudantium minus, nemo numquam odio, optio, possimus quaerat quisquam sed sequi sint soluta totam voluptatibus.</p>
                    <hr>
                    <h4 class="card-title">注册于</h4>
                    <p class="card-text">2018年1月1日</p>
                </div>
            </div>
        </div>
        <div class="col-md-9">
            <div class="card">
                <div class="card-body">
                    <h1 class="card-title users-show-title">{{$user->name}} <span class="text-muted">{{$user->email}}</span></h1>
                </div>
            </div>
            <hr>
            <div class="card">
                <div class="card-body">暂无数据</div>
            </div>
        </div>


    </div>

@endsection