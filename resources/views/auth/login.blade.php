@extends('template')

@section('content')
    <div class="container">
        <div class="card login-card">
            <div class="row no-gutters">
                <div class="col-md-5">
                    <img src="assets/img/auth/login.jpg" width="900" height="450" alt="login" class="login-card-img image rounded">
                </div>
                <div class="col-md-7">
                    @if($errors->any())
                        @foreach ($errors->all() as $error)
                            <h1 class="text-white">{{ $error }}</h1>
                        @endforeach
                    @endif
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    <div class="card-body">
                        <!--<div class="brand-wrapper">
                            <img src="assets/img/auth/logo.png" alt="" class="logo">
                        </div>-->
                        <p class="login-card-description" class="text-mute">Sign into your account</p>
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="form-group">
                                <label for="email" class="sr-only">Email</label>
                                <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email address" autofocus>
                                @error('email')
                                <span class="invalid-feedback is-invalid" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group mb-4">
                                <label for="password" class="sr-only">Password</label>
                                <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror" placeholder="***********" autofocus>
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <input name="login" id="login" class="btn btn-primary login-btn mb-4" type="submit" value="Login">
                        </form>
                        <a href="{{ url('forgot-password') }}" class="text-white" class="forgot-password-link">Forgot password?</a>
                        <p class="login-card-footer-text text-white">Don't have an account? <a href="{{ route('contact') }}" class="text-reset">Contact Admin</a></p>
                        <nav class="login-card-footer-nav">
                            <a href="#!" class="text-warning">Terms of use.</a>
                            <a href="{{ url('/privacy') }}" class="text-warning">Privacy policy</a>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection