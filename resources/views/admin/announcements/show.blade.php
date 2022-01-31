@extends('main')

@section('content')
<section style="padding-top:60px;">
<title>Announcement</title>
<div class="container">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <a href="{{ route('admin.announcements.edit', $announcement->id) }}"><button type="button" class="btn btn-primary me-mb-2 mb-3">Edit</button></a>
                <button class="btn btn-danger me-mb-2 mb-3"  type="button"
                    onclick="event.preventDefault();
                    document.getElementById('delete-announcement-form{{ $announcement->id }}').submit()">
                        Delete
                </button>
                <form id="delete-announcement-form{{ $announcement->id }}" action="{{ route('admin.announcements.destroy', $announcement->id) }}" method="POST" style="display: none;">
                    @csrf
                    @method('DELETE')
                </form>
            </div>
            <div class="card">
                <div class="card-header">
                    {{ $announcement->title}}
                </div>
                <div class="card-body">
                    {{ $announcement->description }}
                </div>
            </div>
            <div class="card-body text-end">
                <a href="{{ route('admin.announcements.index') }}" class="card-link">Back</a>
            </div>
        </div>
            
        </div>
    </div>
</div>
</section>
@endsection('content')
