@extends('layouts.app')
@section('title',$category->name??'话题列表')

@section('content')
    <div class="container mt-5">
        <div class="row topic-list">
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">
                        <ul class="nav nav-pills">
                            <li class="nav-item">
                                <a id="nava" href="{{ Request::url() }}?order=default"
                                   class="nav-link {{active_class( !if_query('order', 'recent') ) }}">最后回复</a>
                            </li>
                            <li>
                                <a href="{{ Request::url() }}?order=recent"
                                   class="nav-link {{active_class(if_query('order', 'recent'))}}">最新发布</a>
                            </li>
                        </ul>
                    </div>
                    <div class="card-body">
                        @if(isset($category))
                            <div class="alert alert-info">
                                <i class="fa fa-folder-open" aria-hidden="true"></i>当前栏目 <i
                                        class="fa fa-hand-pointer-o fa-rotate-90"
                                        aria-hidden="true"></i> {{$category->name}},{{$category->description}}。
                            </div>
                        @endif
                        @include('topics._topic_list',['topics'=>$topics])
                        {!! $topics->links('vendor/pagination/bootstrap-4') !!}
                    </div>

                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body">
                        <a href="{{route('topics.create')}}" class="btn btn-success btn-block text-light"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> 新建话题</a>
                    </div>
                </div>
            </div>


        </div>
    </div>
    </div>

@endsection