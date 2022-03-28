@extends('layout')

@section('content')
<section style="padding-top:5px;">
  <div class="container">
    <form method="POST" action="{{ route('admin.notifications.store') }}" class="row g-3" enctype="multipart/form-data">
      @csrf
      @include('admin.notifications.partials.form')
      <div class="col-12">
        <button type="submit" class="btn btn-primary">Create notification</button>
      </div>
    </form>
  </div>
</section>
@endsection