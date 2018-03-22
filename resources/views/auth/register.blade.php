@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-md-center mt-5">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">注册</div>
                    <div class="card-body">
                        <form role="form" method="POST" action="{{ url('/register') }}">
                            {!! csrf_field() !!}

                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label text-lg-right">用户名</label>

                                <div class="col-lg-6">
                                    <input
                                            type="text"
                                            class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                                            name="name"
                                            value="{{ old('name') }}"
                                            required
                                    >
                                    @if ($errors->has('name'))
                                        <div class="invalid-feedback">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label text-lg-right">邮箱地址</label>

                                <div class="col-lg-6">
                                    <input
                                            type="email"
                                            class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                            name="email"
                                            value="{{ old('email') }}"
                                            required
                                    >

                                    @if ($errors->has('email'))
                                        <div class="invalid-feedback">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <fieldset class="form-group">
                                <div class="row">
                                    <legend class="col-form-label col-lg-4 pt-0 text-right">性别</legend>
                                    <div class="col-lg-6">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="gridRadios"
                                                   id="gridRadios1" value="option1" checked>
                                            <label class="form-check-label" for="gridRadios1">
                                                男
                                            </label>

                                            <span class="ml-5">
                                            <input class="form-check-input" type="radio" name="gridRadios"
                                                   id="gridRadios2" value="option2">
                                            <label class="form-check-label" for="gridRadios2">
                                                女
                                            </label></span>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>

                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label text-lg-right">密码</label>

                                <div class="col-lg-6">
                                    <input
                                            type="password"
                                            class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                            name="password"
                                            required
                                    >
                                    @if ($errors->has('password'))
                                        <div class="invalid-feedback">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label text-lg-right">确认密码</label>

                                <div class="col-lg-6">
                                    <input
                                            type="password"
                                            class="form-control{{ $errors->has('password_confirmation') ? ' is-invalid' : '' }}"
                                            name="password_confirmation"
                                            required
                                    >
                                    @if ($errors->has('password_confirmation'))
                                        <div class="invalid-feedback">
                                            <strong>{{ $errors->first('password_confirmation') }}</strong>
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label text-lg-right">验证码</label>

                                <div class="col-lg-6">
                                    <input
                                            type="text"
                                            class="form-control{{ $errors->has('captcha') ? ' is-invalid' : '' }}"
                                            name="captcha"
                                            required
                                    >
                                    <img class="img-thumbnail mt-1 captcha" src="{{captcha_src('flat')}}" alt="验证码"
                                         title="点击图片刷新验证码" onclick="this.src='/captcha/flat?'+Math.random()">
                                    @if ($errors->has('captcha'))
                                        <div class="invalid-feedback">
                                            <strong>{{ $errors->first('captcha') }}</strong>
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-lg-6 offset-lg-4">
                                    <button type="submit" class="btn btn-primary">
                                        注册
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
