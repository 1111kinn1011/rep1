@extends('layouts.layout1')
<title>Login</title>
    @if ($errors->has('username') || $errors->has('email'))
        <div class="alert alert-danger" style="width: 350px; float: right;">
            <p>These credentials do not match our records.</p>
        </div>
    @endif
@section('content')
<form method="POST" action="{{ route('login') }}" aria-label="{{ __('Login') }}">
    @csrf
    <div class="card" style="border: 1px solid rgb(204, 204, 204); background-color: white; width: 350px; height: 400px; margin: 0px auto; margin-top: 120px;">
        <div class="card-header" style="border-bottom: 1px solid rgb(204, 204, 204); background-color: rgb(245, 248, 250); height: 100px;">
            <img src="/img/Physical_Science image.gif"  alt="Logo" style="width: 346px; height: 99px; position: relative;">
        </div>
        <div class="card-body">
            <div style="margin-top: 10%; margin-left: 8%;">

                <!-- Email or Username Field -->
                <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-user" style="color: rgb(1, 52, 152);"></i></span>
                    <input id="username" type="text" class="form-control{{ $errors->has('email') || $errors->has('username') ? ' is-invalid' : '' }}" name="username" value="{{ old('username') }}" placeholder="Username or Email" required autofocus style="width: 90%;">
                </div>

                <!-- Password Field -->
                <div class="input-group" style="margin-top: 5px;">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-lock" style="color: rgb(1, 52, 152);"></i></span>
                    <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="Password" required style="width: 90%;">
                    
                    @if ($errors->has('password'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>

                <!-- Remember Account Checkbox -->
                <div class="input-group" style="margin-top: 5px;">
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> {{ __('Remember Me') }}
                        </label>
                    </div>
                </div>

            </div>
            <!-- Login Button -->
            <div class="btn-group-md">
                <button type="submit" class="btn btn-primary" style="width: 84%; margin-left: 8%;">Login</button>
            </div>
            
            <div style="margin-top: 70px;">
                <!-- Register Link -->
                <!-- <a class="btn btn-link" href="{{ route('register') }}">Don't have an account?</a> -->
                
                <!-- Forgot Password Link -->
                <a class="btn btn-link" href="{{ route('password.request') }}">{{ __('Forgot your Password?') }}</a>
            </div>

        </div>
    </div>
</form>
@endsection
