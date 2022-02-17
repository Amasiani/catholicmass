@extends('layout')

@section('content')
<section style="padding-top:5px;">
<div class="container">
    <div class="col">
        <div class="card" style="max-width: 900px;">
            <div class="card-header">
                <strong> Add Role</strong>
                <a href="{{ route('admin.roles.index') }}" role="button" class="btn float-end">Back</a>
            </div>
            <div class="card-body">
                @if(Session::has('message_sent'))
                <div class="alert-session" role="alert">
                    {{Session::get('message_sent')}}
                </div>
                @endif
                <form method="POST" action="{{route('admin.roles.store')}}" enctype="multipart/form-data">
                    @csrf
                    @include('admin.roles.partials.form')                                     
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
</section>
@endsection('content')
