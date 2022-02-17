@extends('layout')

@section('content')
<section>
  	<div class="container" style="padding-top: 5px;">
	  <div class="col">
		  	<div class="card" style="max-width: 900px;">
			  	<div class="card-header">
					  <strong>Editing...{{ $society->name }}...</strong>
					<a href="{{ route('admin.societies.index') }}" role="button" class="btn float-end">Back</a>
				</div>
				<div class="card-body">
					<form method="post" action="{{ route('admin.societies.update', $society->id) }}">
    					@csrf
    					@method('PATCH')
    					@include('admin.societies.partials.form')
  						<button type="submit" class="btn btn-primary float-end">Update</button>
					</form>
				</div>
			</div>
	  </div>
  	</div>
</section>
@endsection