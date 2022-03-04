@extends('template')

@section('content')
    <div class="container">
        <div class="card login-card">
            <div class="row no-gutters">
                <div class="col-md-5">
                    <img src="/assets/img/auth/login.jpg" alt="login" width="900" height="400" class="login-card-img image rounded">
                </div>
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
                            <img src="/img/logo.png" alt="" class="logo">
                        </div>
                        <p class="login-card-description">Sign into your account</p>
                        @if(session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <form method="POST" action="{{ route('password.request') }}">
                            @csrf
                            <div class="form-group">
                                <label for="email" class="sr-only">Email</label>
                                <input type="email" name="email" id="email" class="form-control mb-2" placeholder="Email address">
                                @error('email')
                                <span class="invalid-feedback is-invalid" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <input name="reset" id="reset" class="btn btn-primary login-btn mb-4" type="submit" value="Reset">
                        </form>
                        <p class="login-card-footer-text" class="">Don't have an account? <a href="{{ route('register') }}" class="text-reset">Register here</a></p>
                        <nav class="login-card-footer-nav">
                            <a href="#!" class="text-warning">Terms of use.</a>
                            <a href="#!" class="text-warning">Privacy policy</a>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
@endsection