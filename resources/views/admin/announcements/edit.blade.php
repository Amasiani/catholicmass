@extends('layout')

@section('content')
<section style="padding-top:5px;">
<title>Add Church</title>
<div class="container">
    <div class="row">
        <div class="col-md-12">
        <div class="card" style="max-width: 900px;">
        <div class="card-header">
            <strong>{{ $announcement->title }}</strong>
            <a href="{{ url('/home') }}" role="button" class="btn float-end">Back</a>
        </div>
            <div class="card-body">
            @if(Session::has('message_sent'))
                <div class="alert-session" role="alert">
                    {{Session::get('message_sent')}}
                </div>
            @endif
                <form method="POST" action="{{route('admin.announcements.update', $announcement->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    @include('admin.announcements.partials.forms')                                        
                    <button type="submit" class="btn btn-primary float-end">Submit</button>
                </form>
            </div>
        </div>
        </div>
    </div>
</div>
</section>
@endsection('content')
