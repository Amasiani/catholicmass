@extends('main')

@section('content')
<section style="padding-top:60px;">
<title>Add Church</title>
<div class="container">
    <div class="row">
        <div class="col-md-6 offset-md-3">
        <a href="{{ route('admin.churches.index') }}">
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <button type="button" class="btn btn-primary me-mb-2 mb-3">Back</button>
                    </div>
                </a>
        <div class="card">
        <div class="card-header">
            Add Church
        </div>
            <div class="card-body">
            @if(Session::has('message_sent'))
                <div class="alert-session" role="alert">
                    {{Session::get('message_sent')}}
                </div>
            @endif
                <form method="POST" action="{{route('admin.churches.store')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="md-3">
                        <label for="name" class="form-label">Church Name</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" placeholder="Church name" required autocomplete="TRUE" name="name" autofocus >
                        @error('name')
                            <span role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="address" class="form-label">Address</label>
                        <input type="text" class="form-control @error('address') is-invalid @enderror" placeholder="Church address" required autocomplete="address" name="address" autofocus>
                        @error('address')
                            <span role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="latitude" class="form-label">Latitude</label>
                        <input type="latitude" class="form-control @error('latitude') is-invalid @enderror" placeholder="Church Latitude" required autocomplete="True" name="latitude" autofocus>
                        @error('latitude')
                            <span role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="longitude" class="form-label">Longitude</label>
                        <input type="longitude" class="form-control @error('longitude') is-invalid @enderror" placeholder="Church Longtitude" required autocomplete="TRUE" name="longitude" autofocus>
                        @error('longitude')
                            <span role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="program" class="form-label">Church Activites</label>
                        <textarea class="form-control @error('program') is-invalid @enderror" placeholder="Church activites" autocomplete="TRUE" name="program" autofocus></textarea>
                        @error('program')
                            <span  role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="website" class="form-label">Church Website</label>
                        <input type="website" class="form-control @error('website') is-invalid @enderror" placeholder="Church website" required autocomplete="TRUE" name="website" autofocus>
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
</section>
@endsection('content')
