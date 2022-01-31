@extends('main')

@section('content')
<section style="padding-top:60px;">
<title>Role</title>
<div class="container">
    <div class="row">
        <div class="col-md-6 offset-md-3">
        <a href="{{ route('admin.roles.index') }}">
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <button type="button" class="btn btn-primary me-mb-2 mb-3">Back</button>
                    </div>
                </a>
        <div class="card">
        <div class="card-header">
            Add Role
        </div>
            <div class="card-body">
            @if(Session::has('message_sent'))
                <div class="alert-session" role="alert">
                    {{Session::get('message_sent')}}
                </div>
            @endif
                <form method="POST" action="{{route('admin.roles.update', $role->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="md-3 py-2">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" value="{{ old('name') ?? $role->name}}" class="form-control @error('name') is-invalid @enderror" placeholder="Role name" required autocomplete="TRUE" name="name" autofocus >
                        @error('title')
                            <span role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
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
