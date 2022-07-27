@extends('template')

@section('content')
    <div class="container">
    <div class="container">
        <div class="card login-card" max-width="780px">
            <div class="col">
                    <img src="assets/img/auth/login.jpg" width="900" height="650"  alt="login" class="card-img login-card-img image rounded">
                <div class="card-img-overlay">
                    <div class="card-body">
                        <div class="brand-wrapper">
                            <img src="/img/logo.png" alt="" class="logo">
                        </div>
                        <p class="login-card-description">Register a new account</p>
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            <div class="form-group">
                                <label for="name" class="sr-only">Name</label>
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Name">

                            </div>
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                            <div class="form-group">
                                <label for="email" class="sr-only">Email</label>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Email address">
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group mb-4">
                                <label for="password" class="sr-only">Password</label>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group mb-4">
                                <label for="password" class="sr-only">Password</label>
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm password">
                            </div>
                            <input name="register" id="register" class="btn btn-primary login-btn mb-4" type="submit" value="Register">
                        </form>
                        <a href="#!" class="text-muted" class="forgot-password-link">Forgot password?</a>
                        <p class="login-card-footer-text">Already have an account? <a href="{{ route('login') }}" class="text-reset">Login here</a></p>
                        <nav class="login-card-footer-nav">
                            <a href="#!">Terms of use.</a>
                            <a href="#!">Privacy policy</a>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection