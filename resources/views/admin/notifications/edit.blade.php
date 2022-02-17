@extends('layout')

@section('content')
<div class="container">
  <div class="col-md-12">
    <div class="card mb-2" style="max-width: 900px;">
      <div class="card-header">
        Edit 
        <a href="{{ route('admin.notifications.index') }}" role="button" class="btn float-end">Back</a>
      </div>
      <div class="card-body">
      <form method="POST" action="{{ route('admin.notifications.update', $notification->id) }}" class="row g-3" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        @include('admin.notifications.partials.form', ['edit'])
        <button type="submit" class="btn btn-primary float-end">Update</button>
      </form>
      </div>
    </div>
  </div>
</div>
@endsection