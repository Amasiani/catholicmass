@extends('layout')

@section('content')
<div class="container">
    <div class="row">
        <div class="card">
            <div class="card-header">
                Create society
                <a href="{{ route('admin.societies.index') }}" role="button" class="btn btn-sm float-end">Back</a>
            </div>
            <div class="card-body">
                <form method="post" action="{{ route('admin.societies.store') }}">
                    @csrf
                    @include('admin.societies.partials.form', ['create' => true])
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection