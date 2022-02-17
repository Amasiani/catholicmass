@extends('layout')

@section('content')
<section style="padding-top:5px;">
  <div class="container">
    <div class="col-md-12">      
      	<div class="card" style="width: 900px;">
        	<div class="card-header">
        		<button class="btn btn-danger ml-2 mb-1 float-end"
        			onclick="event.preventDefault();
        			document.getElementById('notification-delete-form{{ $notification->id }}').submit()">
          				Delete
      			</button>
      			<a href="{{ route('admin.notifications.edit', $notification->id) }}" role="button" class="btn btn-primary float-end">Edit</a>
      				<strong>{{ $notification->title }}</strong>
      			<form method="post" id="notification-delete-form{{ $notification->id }}" action="{{ route('admin.notifications.destroy', $notification->id ) }}" style="display: none;">
        			@csrf
        			@method('DELETE')
      			</form>
        	</div>
        	<div class="card-body">
          		<hr class="card-divider">
          		<p class="card-text">{{ $notification->description }}</p>
          		<p class="card-text"><small class="text-muted"></small></p>
        	</div>
        	<img src="{{ asset('images/' . $notification->img) }}" class="card-img-bottom img-fluid" style="height: 300px;" alt="notification_detail">
        	<a href="{{ url('admin/notifications') }}" class="btn float-end" role="button">back</a>
      	</div>
    </div>
  </div>
</section>
@endsection