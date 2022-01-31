@extends('main')

@section('content')
<section style="padding-top:60px;">
<title>Announcement</title>
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
            Add Announcement
        </div>
            <div class="card-body">
            @if(Session::has('message_sent'))
                <div class="alert-session" role="alert">
                    {{Session::get('message_sent')}}
                </div>
            @endif
                <form method="POST" action="{{route('admin.announcements.store')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="md-3">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror" placeholder="Title announcement" required autocomplete="TRUE" name="title" autofocus >
                        @error('title')
                            <span role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <input type="text" class="form-control @error('description') is-invalid @enderror" placeholder="Description" required autocomplete="description" name="description" autofocus>
                        @error('description')
                            <span role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="mb-3">                                                                        
                                    <select name="church" id="church" class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">
                                        <option value="">--Select church--</option>
                                    @foreach($churches as $church)                                        
                                        <option value="{{ $church->id }}" @if(old('church') == $church->id) selected @endif>{{ $church->name }}</option>                                   
                                    @endforeach
                                    </select>                                                                         
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
