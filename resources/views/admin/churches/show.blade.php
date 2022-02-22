@extends('layout')

@section('content')
<section style="padding-top:20px;">
    <div class="container">
        <div class="col-md-10 offset-1">
            <div class="card" style="width: 45rem;">
                <div class="card-header">                        
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                       <a href="{{ route('admin.churches.edit', $church->id) }}"><button class="btn btn-primary me-md-2" type="button">Edit</button></a>
                        <a href="{{ route('admin.announcements.create', $church->id) }}"><button type="button" class="btn btn-info mx-2">Add Announcement</button></a>
                        <button class="btn btn-danger"  type="button"
                            onclick="event.preventDefault();
                            document.getElementById('delete-church-form{{ $church->id }}').submit()">
                                Delete
                        </button>
                        <form id="delete-church-form{{ $church->id }}" action="{{ route('admin.churches.destroy', $church->id) }}" method="POST" style="display: none;">
                            @csrf
                            @method('DELETE')
                        </form>
                    </div>
                    <strong>{{ $church->name }}</strong>
                </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><strong>Address:</strong> {{ $church->address }}</li>
                        <li class="list-group-item"><strong>Laitude:</strong>  {{ $church->latitude }}</li>
                        <li class="list-group-item"><strong>Longitude:</strong> {{ $church->longitude }}</li>
                        <li class="list-group-item"><strong>Activties:</strong>  {{ $church->program }}</li>
                        @foreach($church->announcements as $announcement)
                        <div class="accordion accordion-flush" id="accordionFlushExample">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="flush-headingOne">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                                        <strong>{{ $announcement->title}} Announcement</strong>
                                    </button>
                                 </h2>
                                <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                                <div class="accordion-body"><li class="list-group-item">{{ $announcement->description }}</li></div>
                                <a href="{{ route('admin.announcements.edit', $announcement->id) }}" role="button" class="btn ml-2 float-end">Edit</a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        <li class="list-group-item"><strong>Website address:</strong><a href="{{ $church->website }}" target="_blank" style="text-decoration: none;">      {{ $church->website  }}</a></li>
                        @foreach( $church->users as $user)
                        <li class="list-group-item"><strong>Church editor:  </strong><a href="{{ route('admin.users.show', $user->id) }}" style="text-decoration:  none;"><strong>   {{ $user->name  }}</strong></a></li>
                        @endforeach
                    </ul>
                    <div class="card-body text-end">
                        <a href="{{ url('/home') }}" class="card-link">Back</a>
                    </div>
                </div>
            </div>
        </div>
</section>
@endsection('content')