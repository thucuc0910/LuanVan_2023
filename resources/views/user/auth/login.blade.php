@extends('user.layouts.app_auth')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'User login')
@section('content')

    <div class="login-box bg-white box-shadow border-radius-10">
        <div class="login-title">
            <h2 class="text-center text-primary">User Login</h2>
        </div>
        <form action="{{ url('user/login_handler') }}" method="POST">
            @csrf
            @if (Session::get('fail'))
                <div class="alert alert-danger">
                    {{ Session::get('fail') }}

                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            @if (Session::get('success'))
                <div class="alert alert-success">
                    {{ Session::get('success') }}

                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            <div class="input-group custom">
                <input type="text" class="form-control form-control-lg" placeholder="Email/Username" name="login_id"
                    value="{{ old('login_id') }}">
                <div class="input-group-append custom">
                    <span class="input-group-text"><i class="icon-copy dw dw-user1"></i></span>
                </div>
            </div>
            @error('login_id')
                <div class="d-block text-danger" style="margin-top: 25px; margin-bottom: 15px">
                    {{ $message }}
                </div>
            @enderror

            <div class="input-group custom">
                <input type="password" class="form-control form-control-lg" placeholder="**********" name="password">
                <div class="input-group-append custom">
                    <span class="input-group-text"><i class="dw dw-padlock1"></i></span>
                </div>
            </div>
            @error('password')
                <div class="d-block text-danger" style="margin-top: 25px; margin-bottom: 15px">
                    {{ $message }}
                </div>
            @enderror

            <div class="row pb-30">
                <div class="col-6">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="customCheck1">
                        <label class="custom-control-label" for="customCheck1">Remember</label>
                    </div>
                </div>
                <div class="col-6">
                    <div class="forgot-password">
                        <a href="{{ route('admin.forgot_password') }}">Forgot Password</a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="input-group mb-0">
                        <input class="btn btn-primary btn-lg btn-block" type="submit" value="Sign In">
                        {{-- <a class="btn btn-primary btn-lg btn-block" href="index.html">Sign In</a> --}}
                    </div>
                </div>
            </div>

            
        </form>

        <div class="social-login justify-content-center row pt-20">
            <a href="#" class="fab fa-facebook-f d-flex align-items-center justify-content-center mr-2"
                style="background: #3b5998; text-decoration: none; position: relative; text-align: center; color: #fff; mmargin-bottom: 10px; width: 40px; height: 40px; border-radius: 50%; display: inline-block;">
                <span class="icon-facebook "></span>
            </a>
            <a href="#" class="twitter">
                <span class="fab fa-twitter d-flex align-items-center justify-content-center mr-2"
                    style="background: #1da1f2; text-decoration: none; position: relative; text-align: center; color: #fff; mmargin-bottom: 10px; width: 40px; height: 40px; border-radius: 50%; display: inline-block;"></span>
            </a>
            <a href="{{ asset('/user/auth/google/redirect') }}" class="google">
                <span class="fab fa-google d-flex align-items-center justify-content-center mr-2"
                    style="background: #ea4335; text-decoration: none; position: relative; text-align: center; color: #fff; mmargin-bottom: 10px; width: 40px; height: 40px; border-radius: 50%; display: inline-block;"></span>
            </a>
        </div>
    </div>

@endsection
