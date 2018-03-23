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
                    <div class="card-header">
                        <ul class="nav nav-tabs card-header-tabs">
                            <li class="nav-item">
                                <a class="nav-link active" href="#">Ta的话题</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Ta的回复</a>
                            </li>
                        </ul>
                    </div>
                    <div class="card-body">
                        @if(count($topics))
                            <ul class="list-group list-group-flush meta-ul">
                                @foreach( $topics as $topic )
                                    <li class="list-group-item list-group-item-action">
                                        <a href="{{route('topics.show',[$topic])}}">{{$topic->title}}</a>
                                        <span class="float-right meta">
                                            {{$topic->reply_count}}回复
                                            <i class="fa fa-dot-circle-o" aria-hidden="true"></i>
                                           发表于{{$topic->created_at->diffForHumans()}}
                                        </span>
                                    </li>
                                @endforeach
                            </ul>
                            {!! $topics->links('vendor/pagination/bootstrap-4') !!}

                        @else
                            <div>暂无数据</div>
                        @endif
                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection