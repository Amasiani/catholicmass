@extends('template')
@csrf
<div class="col col-md-9 offset-2">
<div class="card">
    <div class="card-header">Edit</div>
    <div class="card-body">
    <div class="mb-3">
    <label for="name">Name:</label>
    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
        value="{{ old('name') }} @isset($user) {{ $user->name }} @endisset"  />
    @error('name')
        <span role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>
<div class="mb-3">
    <label for="email">Email:</label>
    <input type="text" name="email" class="form-control @error('email') is-invalid @enderror"
        value="{{ old('email') }} @isset($user) {{ $user->email }} @endisset" />
@error('email')
    <span role="alert">
        <strong>{{ $message }}</strong>
    </span>
@enderror
</div>
@isset($create)
<div class="mb-3">
    <label for="password">Password:</label>
    <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" />
@error('password')
    <span role="alert">
        <strong>{{ $message }}</strong>
    </span>
@enderror
</div>
<div class="mb-3">
    <label for="password_confirmation">Confirm password:</label>
    <input type="password" name="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror" />
@error('password_confirmation')
    <span role="alert">
        <strong>{{ $message }}</strong>
    </span>
@enderror
</div>
@endisset
<div class="mb-3">                                                                        
<select name="church" id="church" class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">
    <option value="">--Select church--</option>
@foreach($churches as $church)                                        
    <option value="{{ $church->id }}" id="{{ $church->name }}" @isset($user) @if(in_array($church->id, $user->churches->pluck('id')->toArray())) selected @endif @endisset>{{ $church->name }}</option>                                   
@endforeach
</select>                                                                         
</div>
<button type="submit" class="btn btn-primary">Submit</button>
</div>
    </div>
</div>
