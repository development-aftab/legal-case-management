{{--@extends('layouts.app')--}}

{{--@section('content')--}}
{{--<section id="wrapper" class="login-register">--}}
    {{--<div class="login-box">--}}
        {{--<div class="white-box">--}}
            {{--<form class="form-horizontal form-material" id="loginform" method="POST" action="{{ route('register') }}">--}}
                {{--{{csrf_field()}}--}}
                {{--<div class="col-md-12">--}}
                {{--<h3 class="box-title ">Sign Up</h3>--}}
                {{--</div>--}}
                {{--<div class="form-group col-md-12">--}}
                        {{--<input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="Name" name="name" value="{{ old('name') }}" required autofocus>--}}

                        {{--@if ($errors->has('name'))--}}
                            {{--<span class="invalid-feedback">--}}
                                        {{--<strong>{{ $errors->first('name') }}</strong>--}}
                                    {{--</span>--}}
                        {{--@endif--}}
                {{--</div>--}}
                {{--<div class="form-group col-md-12">--}}

                        {{--<input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" placeholder="Email" value="{{ old('email') }}" required>--}}

                        {{--@if ($errors->has('email'))--}}
                            {{--<span class="invalid-feedback">--}}
                                        {{--<strong>{{ $errors->first('email') }}</strong>--}}
                                    {{--</span>--}}
                        {{--@endif--}}
                {{--</div>--}}
                {{--<div class="form-group col-md-12">--}}
                        {{--<input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="Password" name="password" required>--}}

                        {{--@if ($errors->has('password'))--}}
                            {{--<span class="invalid-feedback">--}}
                                        {{--<strong>{{ $errors->first('password') }}</strong>--}}
                                    {{--</span>--}}
                        {{--@endif--}}
                {{--</div>--}}
                {{--<div class="form-group col-md-12">--}}

                        {{--<input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password" required>--}}

                {{--</div>--}}
                {{--<div class="form-group col-md-12">--}}
                        {{--<div class="checkbox checkbox-primary p-t-0">--}}
                            {{--<input id="checkbox-signup" type="checkbox">--}}
                            {{--<label for="checkbox-signup"> I agree to all <a href="#">Terms</a></label>--}}
                        {{--</div>--}}
                {{--</div>--}}
                {{--<div class="form-group col-md-12">--}}
                        {{--<button class="btn btn_black btn_block text-uppercase waves-effect waves-light" type="submit">Sign Up</button>--}}
                {{--</div>--}}
                {{--<div class="col-md-12 form-group m-b-0 text-center">--}}

                        {{--<p>Already have an account? <a href="{{route('login')}}" class=" m-l-5"><b>Sign In</b></a></p>--}}

                {{--</div>--}}
            {{--</form>--}}
        {{--</div>--}}
    {{--</div>--}}
{{--</section>--}}

{{--@endsection--}}



@extends('layouts.app')

@section('content')
    <section id="wrapper" class="login-register">
        <div class="login-box">
            <div class="white-box">
                <form class="form-horizontal form-material row" id="loginform" method="post" action="{{ route('login') }}">
                    {{csrf_field()}}
                    <div class="col-md-12">
                        <h3 class="box-title ">Sign In</h3>
                    </div>
                    <div class="form-group col-md-12">

                        <input id="email" placeholder="Email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>
                        @if ($errors->has('email'))
                            <span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                        @endif

                    </div>
                    <div class="form-group col-md-12">

                        <input id="password"  type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required placeholder="Password">
                        <div class="input_icon">
                            <a href="javascript:void(0);" class="password_btn2"><i class="fa fa-eye-slash" aria-hidden="true"></i></a>
                        </div>
                        @if ($errors->has('password'))
                            <span class="invalid-feedback">
                                        <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif

                    </div>
                    <div class="form-group col-md-12">

                        <div class="checkbox checkbox-primary pull-left p-t-0">
                            <input type="checkbox" id="checkbox-signup" name="remember" {{ old('remember') ? 'checked' : '' }}>
                            <label for="checkbox-signup"> Remember me </label>
                        </div>
                        <a href="{{ route('password.request') }}" id="to-recover" class="text-dark pull-right"><i class="fa fa-lock m-r-5"></i> Forgot pwd?</a>
                    </div>
                    <div class="form-group col-md-12 ">

                        <button class="btn btn_black btn_block text-uppercase waves-effect waves-light" type="submit"> Log In
                        </button>

                    </div>
                    {{-- use for social auth --}}
                    {{-- <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 m-t-10 text-center">
                            <div class="social">
                                <a href="{{url('auth/facebook')}}" class="btn  btn-facebook" data-toggle="tooltip" title="Login with Facebook"> <i aria-hidden="true" class="fa fa-facebook"></i> </a>
                                <a href="{{url('auth/google')}}" class="btn btn-googleplus" data-toggle="tooltip" title="Login with Google"> <i aria-hidden="true" class="fa fa-google-plus"></i> </a>
                            </div>
                        </div>
                    </div> --}}
                    {{--<div class="col-md-12 form-group m-b-0 text-center">--}}
                    {{--<p>Don't have an account? <a href="{{url('register')}}" class=" m-l-5"><b>Sign Up</b></a></p>--}}

                    {{--</div>--}}

                </form>
            </div>
        </div>
    </section>
@endsection
@push('js')
    <script>
        $(function(){
            $('.password_btn2').click(function(){
                if($('.password_btn2 i').hasClass('fa-eye-slash')){
                    $('.password_btn2 i').removeClass('fa-eye-slash');
                    $('.password_btn2 i').addClass('fa-eye');
                    $('#password').attr('type','text');
                }else{
                    $('.password_btn2 i').removeClass('fa-eye');
                    $('.password_btn2 i').addClass('fa-eye-slash');
                    $('#password').attr('type','password');
                }
            });
        });
    </script>
@endpush
