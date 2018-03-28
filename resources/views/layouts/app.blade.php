<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title','易加益')-易加益最牛逼</title>
    <meta name="description" content="@yield('description', '1and1 社区')" />
    <!-- Styles -->
    <link href="{{asset('css/app.css')}}" rel="stylesheet">
    <link href="{{asset('vendor/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('css/home.css')}}" rel="stylesheet">
    @yield('style')

</head>
<body>
<div id="{{route_name()}}-page">
    @include('layouts._header')

    @include('common._message')
    @yield('content')


</div>

<!-- Scripts -->
<script src="{{asset('js/app.js') }}"></script>
@yield('script')
</body>
</html>
