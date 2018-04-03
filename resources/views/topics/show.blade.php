@extends('layouts.app')
@section('title', $topic->title)
@section('description', $topic->excerpt)
@section('content')
    <div class="container">
        <div class="row mt-5">
            <div class="col-md-3">
                <div class="card">
                    <img src="{{asset('storage/'.$topic->user->avatar) }}" alt=""
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
                @can('update',$topic)
                    <div class="operate w-25 mx-auto mt-3">
                        <form action="{{route('topics.destroy',[$topic])}}" method="POST">
                            {{csrf_field()}}
                            {{method_field('DELETE')}}
                            <a href="{{route('topics.edit',[$topic])}}" class="btn btn-success"><i
                                        class="fa fa-pencil-square-o" aria-hidden="true"></i> 编辑</a>

                            <button type="submit" class="btn btn-danger float-right"><i class="fa fa-times-circle"
                                                                                        aria-hidden="true"></i> 删除
                            </button>
                        </form>
                    </div>
                @endcan
                <hr>
                <div class="card">
                    <div class="card-header">
                        @cannot('update',$topic)
                            @includeWhen(Auth::check(),'replies._reply_box',['topic'=>$topic])
                        @endcannot
                    </div>
                    <div class="card-body">
                        @include('replies._reply_list',['replies' =>$replies,'topic'=>$topic])
                    </div>
                </div>
            </div>
        </div>

@endsection
