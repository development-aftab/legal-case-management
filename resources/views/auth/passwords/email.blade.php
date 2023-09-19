@extends('layouts.app')

@section('content')
    <section id="wrapper" class="login-register ">
        <div class="login-box reset_box">
            <div class="white-box">
                <form class="form-horizontal form-material row" method="POST"  action="{{ route('password.email') }}">
                    @csrf
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="form-group col-xs-12">

                            <h3 class="box-title ">{{ __('Reset Password') }}</h3>
                            <p class="text-muted">Enter your Email and instructions will be sent to you! </p>

                    </div>
                    <div class="form-group col-xs-12">
                            <input id="email" placeholder="Email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                            @if ($errors->has('email'))
                                <span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                            @endif
                    </div>
                    <div class="form-group col-xs-12 ">

                            <button class="btn btn_black btn_block text-uppercase waves-effect waves-light" type="submit">Reset</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
