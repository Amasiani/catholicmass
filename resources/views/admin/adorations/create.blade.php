@extends('layout')

@section('content')
<div class="container">
    <div class="row">
        <div class="card" style="max-width: 850px;">
            <div class="card-header">
                <strong>Create Adoration</strong>
                <a href="{{ route('admin.adorations.index') }}" role="button" class="btn float-end">Back</a>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.adorations.store') }}" method="post">
                    @csrf
                    @include('admin.adorations.partials.form')
                    <button class="btn btn-primary float-end" type="submit">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection