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
                            Edit
                        </div>
                            <div class="card-body">
                                @if(Session::has('success'))
                                    <div class="alert-session" role="alert">
                                        {{Session::get('success')}}
                                    </div>
                                @endif
                                <form method="POST" action="{{route('admin.users.update', $user->id )}}" enctype="multipart/form-data">
                                    @csrf
                                    @method('PATCH')
                                    <div class="mb-3">
                                        <label for="namer">Name:</label>
                                        <input type="text" value="{{ old('name') ?? $user->name }}" name="name" class="form-control @error('name') is-invalid @enderror"  />
                                        @error('name')
                                            <span role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="email">Email:</label>
                                        <input type="text" value="{{ old('email') ?? $user->email }}" name="email" class="form-control @error('email') is-invalid @enderror" />
                                    @error('email')
                                        <span role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    </div>
                                    <div class="mb-3">                                                                        
                                        <select name="churches[]" id="church" class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">
                                            <option>--Select church--</option>
                                        @foreach($churches as $church)                                        
                                            <option value="{{ $church->id }}" id="{{ $church->name }}" @isset($user) @if(in_array($church->id, $user->churches->pluck('id')->toArray())) selected @endif @endisset>{{ $church->name }}</option>                                   
                                        @endforeach
                                        </select>                                                                         
                                        </div>                                                                       
                                    </div>
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </form>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection('content')