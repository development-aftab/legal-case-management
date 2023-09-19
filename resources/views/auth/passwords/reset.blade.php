@extends('layouts.app')

@section('content')

    <section id="wrapper" class="login-register">
        <div class="login-box ">
            <div class="white-box">
                <form class="form-horizontal form-material row" method="post" action="{{ route('password.request') }}">
                    {{csrf_field()}}
                    <input type="hidden" name="token" value="{{ $token }}">

                    <div class="form-group col-xs-12">

                            <h3 class="box-title ">{{ __('Reset Password') }}</h3>

                    </div>

                    <div class="form-group col-xs-12">
                            <input placeholder="Email" id="email" type="email"
                                   class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email"
                                   value="{{ $email ?: old('email') }}" required autofocus>

                            @if ($errors->has('email'))
                                <span class="invalid-feedback">
{{--                                        <strong>{{ password/reset$errors->first('email') }}</strong>--}}
                                    </span>
                            @endif
                    </div>
                    <div class="form-group col-xs-12">
                            <input id="password" placeholder="Password" type="password"
                                   class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                   name="password" required>

                            @if ($errors->has('password'))
                                <span class="invalid-feedback">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                            @endif
                    </div>

                    <div class="form-group col-xs-12">
                            <input placeholder="Confirm Password" id="password-confirm" type="password" class="form-control"
                                   name="password_confirmation" required>
                    </div>
                    <div class="form-group col-xs-12">
                            <button class="btn btn_black btn_block text-uppercase waves-effect waves-light"
                                    type="submit">Reset
                            </button>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
