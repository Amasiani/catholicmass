@extends('template')

@section('content')
<div class="container">
        <div class="col">
        <div class="card login-card">
            <div class="row no-gutters">
                <div class="col">
                    <img src="/assets/img/auth/login.jpg" height="300" alt="login" class="img-fluid image rounded">
                </div>
                <div class="card-img-overlay">
                <div class="col">
                    @if($errors->any())
                        @foreach ($errors->all() as $error)
                            <h1 class="text-danger">{{ $error }}</h1>
                        @endforeach
                    @endif
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    <div class="card-body">
                        <p class="login-card-description text-light fw-bolder">Reset your password</p>
                        <form method="POST" action="{{ route('newLink.send') }}">
                            @csrf
                            <div class="form-group">
                                <label for="email" class="sr-only">Email</label>
                                <input type="email" name="email" id="email" class="form-control">
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
                            <input name="reset" id="reset" class="btn btn-block text-white bg-dark fw-bolder login-btn mb-4" type="submit" value="Update">
                        </form>
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
    </div>
@endsection