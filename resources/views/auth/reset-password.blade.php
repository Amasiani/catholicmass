@extends('layout')

@section('content')
    <div class="container">
        <div class="card login-card">
            <div class="row no-gutters">
                <!--<div class="col-md-5">
                    <img src="assets/img/auth/login.jpg" width="900" height="450" alt="login" class="image rounded login-card-img">
                </div>-->
                <div class="col-md-7">
                    @if($errors->any())
                        @foreach ($errors->all() as $error)
                            <h1>{{ $error }}</h1>
                        @endforeach
                    @endif
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    <div class="card-body">
                        <div class="brand-wrapper">
                            <a class="navbar-brand d-flex align-items-center fw-bolder fs-2 fst-italic" href="{{ url('/') }}">
                                <img src="/assets/img/gallery/logo.png" class="rounded-circle" alt="logo">
                                <div class="col md-6 px-1">Catholic Clock</div>           
                            </a>
                        </div>
                        <p class="login-card-description">Sign into your account</p>
                        <form method="POST" action="{{ route('password.update') }}">
                            @csrf
                            <input type="hidden" name="token" value="{{ $request->route('token') }}">
                            <div class="form-group">
                                <label for="email" class="sr-only">Email</label>
                                <input type="email" name="email" id="email" class="form-control" value="{{ $request->email }}">
                                @error('email')
                                <span class="invalid-feedback is-invalid" role="alert">
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
                            <input name="reset" id="reset" class="btn btn-block login-btn mb-4" type="submit" value="Update">
                        </form>
                        <!--<p class="login-card-footer-text">Request for another token? <a href="{{ route('password.reset', $request->token) }}" class="text-reset">Reset password</a></p>-->
                        <nav class="login-card-footer-nav">
                            <a href="#!">Terms of use.</a>
                            <a href="#!">Privacy policy</a>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection