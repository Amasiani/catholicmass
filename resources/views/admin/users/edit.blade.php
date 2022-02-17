@extends('layout')

@section('content')
    <section style="padding-top:10px;">
        <div class="container">
            <div class="col-md-11">
                <div class="card" style="max-width: 900px;">
                    <div class="card-header">
                       <strong>Edit</strong>
                        <a href="{{ route('admin.users.index') }}" role="button" class="btn float-end mb-2">Back</a>
                    </div>
                    <div class="card-body">
                        @if(Session::has('success'))
                            <div class="alert-session" role="alert">
                                {{Session::get('success')}}
                            </div>
                        @endif
                       <form method="POST" action="{{route('admin.users.update', $user->id )}}" enctype="multipart/form-data" class="row g-3">
                            @csrf
                            @method('PATCH')
                            @include('admin.users.partials.form')
                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection('content')