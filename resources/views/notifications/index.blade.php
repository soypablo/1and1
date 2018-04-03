@extends('layouts.app')
@section('title','我的通知')

@section('content')
    <div class="card w-50 mx-auto mt-3">
        <div class="card-header">
            <h3 class="text-center"><i class="fa fa-bell-o" aria-hidden="true"></i> 我 的 通 知
                <form class="d-inline" action="{{route('notifications.destroy',[Auth::id()])}}" method="post">{{csrf_field()}}{{method_field('DELETE')}}
                    <button class="btn btn-sm btn-danger" type="submit"><i class="fa fa-trash-o" aria-hidden="true"></i> 清空</button>
                </form>

            </h3>

        </div>
        <div class="card-body">
            @if($notifications->count())
                <div class="notification-list">
                    <ul class="list-unstyled">

                        @foreach( $notifications as $notification )
                            @include('notifications.types._'.snake_case(class_basename($notification->type)))
                        @endforeach
                    </ul>
                    {!! $notifications->links('vendor/pagination/bootstrap-4') !!}
                </div>
            @else
                没有消息通知
            @endif

        </div>
    </div>
@endsection