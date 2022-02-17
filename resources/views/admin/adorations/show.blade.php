@extends('layout')

@section('content')
<div class="container">
    <div class="row">
        <div class="card" style="max-width: 900px;">
            <div class="card-header">
                {{ $adoration->name }}
                <button class="btn btn-danger float-end" type="button" onclick="event.preventDefault();
                    document.getElementById('adoration-delete-form{{ $adoration->id }}').submit();">
                    Delete
                </button>
                <a href="{{ route('admin.adorations.edit', $adoration->id) }}" role="button" class="btn btn-primary mb-2 mr-2 float-end">Edit</a>
                <form id="adoration-delete-form{{ $adoration->id }}" action="{{ route('admin.adorations.destroy', $adoration->id) }}" method="post" style="display: none;">
                    @csrf
                    @method('DELETE')
                </form>
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item">Activities: {{ $adoration->program }}</li>
                 <li class="list-group-item">Address: {{ $adoration->address }}</li>
             </ul>
              <div class="card-footer">
                <a href="{{ route('admin.adorations.index') }}" role="button" class="btn float-end">Back</a>
            </div>
        </div>
    </div>
</div>
@endsection