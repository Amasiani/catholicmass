@extends('layout')

@section('content')
<div class="container">
    <div class="row">
        <div class="card">
            <div class="card-header">
                Create Adoration
                <a href="{{ url('/home') }}" role="button" class="btn float-end">Back</a>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.adorations.update', $adoration->id) }}" method="post">
                    @csrf
                    @method('PATCH')
                    @include('admin.adorations.partials.form')
                    <button class="btn btn-primary float-end" type="submit">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection