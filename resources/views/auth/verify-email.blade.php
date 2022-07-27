@extends('layout')

@section('content')
    <div class="container">
        <div class="card login-card">
            <div class="row">
                <div class="col">
                    <div class="brand-wrapper">
                        <img src="/assets/img/gallery/logo.png" alt="logo" class="img-fluid rounded float-start">
                    </div>
                </div>
                    <div class="col">
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
                            @if(session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif
                            <p class="login-card-description">You must verify your email address. Please check your email for a verification link</p>
                            <form method="POST" action="{{ route('verification.send') }}">
                                @csrf
                                <input name="login" id="login" class="btn btn-block login-btn mb-4" type="submit" value="Resend email">
                            </form>
                        </div>
                    </div>            
            </div>
        </div>
    </div>
@endsection