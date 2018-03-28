@extends('layouts.app')
@section('title', $topic->title)
@section('description', $topic->excerpt)
@section('content')
    <div class="container">
        <div class="row mt-5">
            <div class="col-md-3">
                <div class="card">
                    <img src="{{\Illuminate\Support\Facades\Storage::url($topic->user->avatar)}}" alt=""
                         class="card-img-top img-thumbnail">
                    <div class="card-body">
                        <a href="{{route('users.show',[$topic->user])}}">
                            <h5 class="card-title text-center">作者:{{$topic->user->name}}</h5>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header text-center article-meta">
                        <h4 class="h2">{{$topic->title}}</h4>
                        <div>发表于 {{$topic->created_at->diffForHumans()}} ⋅ 回复数 {{$topic->reply_count}}</div>
                    </div>
                    <div class="card-body topic-body">
                        {!! $topic->body !!}
                    </div>
                </div>
                <div class="operate">
                    <hr>
                    <a href="{{route('topics.edit',[$topic])}}" class="btn btn-success"><i class="fa fa-pencil-square-o"
                                                                                           aria-hidden="true"></i>
                        编辑</a>
                    <a href="{{route('topics.destroy',[$topic])}}" class="btn btn-danger"><i class="fa fa-times-circle"
                                                                                             aria-hidden="true"></i> 删除</a>
                </div>
            </div>
        </div>

@endsection
