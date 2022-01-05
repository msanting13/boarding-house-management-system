@extends('admin.layouts.auth-app')
@section('page-title', 'Admin Login')
@section('content')
    <div class="card card-outline card-primary">
        <div class="card-header text-center">
        <a href="../../index2.html" class="h1"><b>Admin</b>Login</a>
        </div>
        <div class="card-body">
        <p class="login-box-msg">Login to start your session</p>

        <form action="{{ route('admin.auth.loginAdmin') }}" method="post">
            @csrf
            <div class="form-group  mb-3">
                <div class="input-group">
                    <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Email">
                    <div class="input-group-append">
                        <div class="input-group-text">
                        <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                </div>
                @error('email')
                    <span class="feedback-invalid">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group  mb-3">
                <div class="input-group">
                    <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Password">
                    <div class="input-group-append">
                        <div class="input-group-text">
                        <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                @error('password')
                    <span class="feedback-invalid" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="row">
            <div class="col-8">
                <div class="icheck-primary">
                <input type="checkbox" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                <label for="remember">
                    Remember Me
                </label>
                </div>
            </div>
            <!-- /.col -->
            <div class="col-4">
                <button type="submit" class="btn btn-primary btn-block">Login</button>
            </div>
            <!-- /.col -->
            </div>
        </form>

        {{-- <div class="social-auth-links text-center mt-2 mb-3">
            <a href="#" class="btn btn-block btn-primary">
            <i class="fab fa-facebook mr-2"></i> Sign in using Facebook
            </a>
            <a href="#" class="btn btn-block btn-danger">
            <i class="fab fa-google-plus mr-2"></i> Sign in using Google+
            </a>
        </div> --}}
        <!-- /.social-auth-links -->

        <p class="mb-1">
            <a href="{{ route('admin.password.request') }}">I forgot my password</a>
        </p>
        {{-- <p class="mb-0">
            <a href="register.html" class="text-center">Register a new membership</a>
        </p> --}}
        </div>
        <!-- /.card-body -->
    </div>
@endsection