@extends('main')

@section('content')
    <section style="padding-top:60px;">
        <div class="container">
            <div class="row">
                <div class="col-md-6 offset-md-3">
                    <a href="{{ route('admin.users.index') }}">
                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <button type="button" class="btn btn-primary me-mb-2 mb-3">Back</button>
                        </div>
                    </a>
                    <div class="card">
                        <div class="card-header">
                            Add a new user
                        </div>
                            <div class="card-body">
                                @if(Session::has('success'))
                                    <div class="alert-session" role="alert">
                                        {{Session::get('success')}}
                                    </div>
                                @endif
                                <form method="POST" action="{{route('admin.users.store')}}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="namer">Name:</label>
                                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"  />
                                        @error('name')
                                            <span role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="email">Email:</label>
                                        <input type="text" name="email" class="form-control @error('email') is-invalid @enderror" />
                                    @error('email')
                                        <span role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    </div>
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
                                    <div class="mb-3">                                                                        
                                    <select name="churches[]" id="church" class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">
                                        <option value="">--Select church--</option>
                                    @foreach($churches as $church)                                        
                                        <option value="{{ $church->id }}" @if(old('church') == $church->id) selected @endif>{{ $church->name }}</option>                                   
                                    @endforeach
                                    </select>                                                                         
                                    </div>
                                    
                                        <div class="mb-3">                                                                        
                                            <div class="form-check-input"> 
                                            @foreach($roles as $role)                                          
                                                <input value="{{ $role->id }}" name="roles[]"
                                                    type="checkbox" value="{{ $role->id }}" id="{{ $role->name }}">
                                                                                                                               
                                                <label value="form-check-label" for="{{ $role->name }}">
                                                    {{ $role->name }}
                                                </label> 
                                                @endforeach                                           
                                            </div>                            
                                        </div>
                                                                                                             
                            </div>
                                    <button type="submit" class="btn btn-primary">Create</button>
                                </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection('content')