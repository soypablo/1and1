@extends('layouts.app')
@section('style')
    <link rel="stylesheet" type="text/css" href="{{asset('css/simditor.css')}}">
@stop


@section('content')

    <div class="container">
        <div class="card w-75 mx-auto mt-5">
            <div class="card-header">
                <h1>
                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                    @if($topic->id)
                        编辑话题 #{{$topic->id}}
                    @else
                        新建话题
                    @endif
                </h1>
            </div>

            @include('common.error')

            <div class="card-body">
                @if($topic->id)
                    <form action="{{ route('topics.update', $topic->id) }}" method="POST" accept-charset="UTF-8">
                        <input type="hidden" name="_method" value="PUT">
                        @else
                            <form action="{{ route('topics.store') }}" method="POST" accept-charset="UTF-8">
                                @endif

                                <input type="hidden" name="_token" value="{{ csrf_token() }}">


                                <div class="form-group">
                                    <input class="form-control" type="text" name="title" id="title-field"
                                           value="{{ old('title', $topic->title ) }}" placeholder="请填写标题" required/>
                                </div>
                                <div class="form-group">
                                    <select name="category_id" class="form-control" required>
                                        <option value="" hidden disabled {{ $topic->id ? '' : 'selected' }}>请选择分类</option>
                                        @foreach( $categories as $category )
                                            <option value="{{$category->id}}" {{ $topic->category_id == $category->id ? 'selected' : '' }}>{{$category->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                <textarea class="form-control" name="body" id="editor" rows="5"
                                          placeholder="请输入至少3个字的内容"
                                          required>{{old('body',$topic->body)}}</textarea>
                                </div>
                                <button type="submit" class="btn btn-primary">保存</button>
                                <a class="btn btn-link pull-right" href="{{ route('topics.index') }}"><i
                                            class="fa fa-backward" aria-hidden="true"></i> 返回话题列表</a>
                            </form>
            </div>
        </div>
    </div>


@endsection
@section('script')
    <script type="text/javascript" src="{{ asset('js/module.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/hotkeys.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/uploader.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/simditor.js') }}"></script>
    <script>
        $(document).ready(function()
        {
            var editor = new Simditor({
                textarea : $('#editor') ,
                upload : {
                    url : '{{ route('topics.upload_image') }}' ,
                    params : {_token : '{{ csrf_token() }}'} ,
                    fileKey :'upload_file' ,
                    connectionCount : 3 ,
                    leaveConfirm : '文件上传中，关闭此页面将取消上传。'
                } ,
                pasteImage : true
            });
        });
    </script>
@stop
