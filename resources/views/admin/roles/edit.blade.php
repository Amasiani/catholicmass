@extends('layout')

@section('content')
<section style="padding-top:60px;">
<title>Role</title>
<div class="container">
    <div class="col-md-6 offset-md-1">
        <div class="card" style="max-width: 900px;">
            <div class="card-header">
                Add Role
                <a href="{{ route('admin.roles.index') }}" role="button" class="btn">Back</a>
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
                    @include('admin.roles.partials.form')                                      
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>
</section>
@endsection('content')
