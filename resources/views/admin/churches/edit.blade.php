@extends('main')

@section('content')
<section style="padding-top:60px;">
<title>Add Church</title>
<div class="container">
    <div class="row">
        <div class="col-md-6 offset-md-3">
        <div class="card">
        <div class="card-head">
            <h2>Add Church</h2>
            <a class="col-md- 6 offset-md-9" href="{{ route('admin.churches.index')}}">Back</a>
            <a class="col-md- 6 offset-md-9" href="{{ url('/home')}}">home</a>
            <div class="card-body">
            @if(Session::has('message_sent'))
                <div class="alert-session" role="alert">
                    {{Session::get('message_sent')}}
                </div>
            @endif
                <form method="POST" action="{{route('admin.churches.update', $church->id)}}" enctype="multipart/form-data">
                    @method('PATCH')
                    @csrf
                    <div class="md-3">
                        <label for="name" class="form-label">Church Name</label>
                        <input type="text" value="{{ old('name') ?? $church->name }}" class="form-control @error('name') is-invalid @enderror"  name="name" autofocus>
                        @error('name')
                            <span role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="address" class="form-label">Address</label>
                        <input type="text" value="{{ old('address') ?? $church->address }}" class="form-control @error('address') is-invalid @enderror" name="address" autofocus>
                        @error('address')
                            <span role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="latitude" class="form-label">Latitude</label>
                        <input type="latitude" value="{{ old('latitude') ?? $church->latitude }}" class="form-control @error('latitude') is-invalid @enderror" name="latitude" autofocus>
                        @error('latitude')
                            <span role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="longitude" class="form-label">Longitude</label>
                        <input type="longitude" value="{{ old('longitude') ?? $church->longitude }}" class="form-control @error('longitude') is-invalid @enderror" name="longitude" autofocus>
                        @error('longitude')
                            <span role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="program" class="form-label">Church Activites</label>
                        <textarea class="form-control @error('program') is-invalid @enderror" name="program" autofocus>{{ old('program') ?? $church->program }}</textarea>
                        @error('program')
                            <span  role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="website" class="form-label">Church Website</label>
                        <input type="website" value="{{ old('website')?? $church->website }}" class="form-control @error('website') is-invalid @enderror" required autocomplete="website" autofocus name="website">
                        @error('website')
                            <span  role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
        </div>
    </div>
</div>
</section>
@endsection('content')

