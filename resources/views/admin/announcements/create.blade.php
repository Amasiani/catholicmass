@extends('layout')

@section('content')
<section style="padding-top:5px;">
<title>Announcement</title>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card" style="max-width: 900px;">
                <div class="card-header">
                    <strong>Add Announcement</strong>
                    <a href="{{ url('/home') }}" role="button" class="btn float-end">Back</a>
                </div>
                <div class="card-body">
                @if(Session::has('message_sent'))
                <div class="alert-session" role="alert">
                    {{Session::get('message_sent')}}
                </div>
                @endif
                <form method="POST" action="{{route('admin.announcements.store')}}" enctype="multipart/form-data">
                    @csrf
                    @include('admin.announcements.partials.forms', ['create' => true])                    
                    <button type="submit" class="btn btn-primary float-end">Submit</button>
                </form>
            </div>
        </div>
        </div>
    </div>
</div>
</section>
@endsection('content')
