@extends('layout')

@section('content')
<section style="padding-top:5px;">
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <strong>{{ $announcement->title}}</strong>
                    <button class="btn btn-danger me-mb-2 ml-2 float-end"  type="button"
                        onclick="event.preventDefault();
                        document.getElementById('delete-announcement-form{{ $announcement->id }}').submit()">
                            Delete
                    </button>
                    <a href="{{ route('admin.announcements.edit', $announcement->id) }}" role="button" class="btn btn-primary float-end">Edit</a>
                    <form id="delete-announcement-form{{ $announcement->id }}" action="{{ route('admin.announcements.destroy', $announcement->id) }}" method="POST" style="display: none;">
                        @csrf
                        @method('DELETE')
                    </form>
                </div>
                <div class="card-body">
                    {{ $announcement->description }}
                </div>
            </div>
            <div class="card-body">
                <a href="{{ url('/home') }}" class="card-link float-end">Back</a>
            </div>
        </div>
            
        </div>
    </div>
</div>
</section>
@endsection('content')
