@extends('layout')

@section('content')
<section style="padding-top:10px;">
            <div class="col-md-11">
                <a href="{{ route('admin.users.index') }}">
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end mb-3">
                        <button type="button" class="btn btn-primary me-mb-2">Back</button>
                    </div>
                </a>
                <div class="card mb-3" style="max-width: 900px;">
                    <div class="card-header">
                        Add a new user
                    </div>
                    <div class="card-body">
                    @if(Session::has('success'))
                    <div class="alert-session" role="alert">
                        {{Session::get('success')}}
                    </div>
                    @endif
                    <form method="post" action="{{ route('admin.users.store') }}" class="row g-3" enctype="multipart/form-data">
                        @csrf
                        <div class="col-md-6">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" placeholder="User name" required autocomplete="TRUE" name="name" autofocus id="name">
                            @error('name')
                            <span role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email" required autocomplete="TRUE" name="email" autofocus id="email">
                            @error('email')
                            <span role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror"  required autocomplete="TRUE" name="password" autofocus id="password" placeholder="Password">
                            @error('password')
                            <span role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="password_confirmation" class="form-label">Confirm password</label>
                            <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" placeholder="Confirm password" required autocomplete="TRUE" name="password_confirmation" autofocus id="password_confirmation" placeholder="Confirm password">
                            @error('password_confirmation')
                            <span role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="church" class="form-label"></label>
                            <select name="churches[]" class="form-select form-select-lg">
                            
                                <option selected>Choose church...</option>
                            @foreach($churches as $church) 
                                <option value="{{ $church->id }}" id="{{ $church->id }}" @if(old('church') == $church->id) selected @endif>{{ $church->name }}</option>
                            @endforeach    
                            </select>
                        </div>
                        <div class="col-md-6">
                        @foreach($roles as $role)
                            <div class="form-check form-check-inline">                            
                                <input class="form-check-input mt-4" value="{{ $role->id }}" name="roles[]" type="checkbox" id="{{ $role->name }}">
                                <label class="form-check-label mt-4" for="{{ $role->name }}">
                            {{ $role->name }}
                                </label>
                            @endforeach
                            </div>
                        </div>
                            <div class="col-12">
                                <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-4">
                                <button type="submit" class="btn btn-primary">Create</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
</section>
@endsection('content')