@extends('layouts.app')
@section('title',$user->name.'的个人中心')

@section('content')
    <div class="container mt-5" id="show-container">
        <div class="row">
            <div class="col-md-3">
                <div class="card">
                    <img class="img-thumbnail card-img-top" src="{{asset('storage/'.$user->avatar)}}" alt="图像">
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
                    <div class="card-header">
                        <ul class="nav nav-tabs card-header-tabs">
                            <li class="nav-item">
                                <a class="nav-link {{active_class(if_query('tab',null))}}"
                                   href="{{route('users.show',[$user])}}">Ta的话题</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{active_class(if_query('tab','replies'))}}"
                                   href="{{route('users.show',[$user->id,'tab'=>'replies'])}}">Ta的回复</a>
                            </li>
                        </ul>
                    </div>
                    <div class="card-body">
                        @if(if_query('tab','replies'))
                            @include('users._replies',['replies'=>$replies])
                        @else
                            @include('users._topics',['topics'=>$topics])

                        @endif
                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection