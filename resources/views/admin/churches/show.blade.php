@extends('main')

@section('content')
<section style="padding-top:5px;">
    <div class="container">
        <div class="row">
            <div class="row justify-content-evenly">
                <div class="col-6">
                    <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
                        <div class="btn-group mb-2" role="group" aria-label="first group">
                            <a href="{{ route('admin.announcements.create', $church->id) }}"  class="btn btn-info">Add Announcement</a>
                            <a href="{{ route('admin.societies.create', $church->id) }}"  class="btn btn-info">Add Society</a>
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="btn-toolbar justify-content-end" role="toolbar" aria-label="Toolbar with button groups">
                        <div class="btn-group" role="group" aria-label="second group">
                            <a href="{{ route('admin.churches.edit', $church->id) }}" role="button" class="btn btn-primary">Edit</a>    
                            <button class="btn btn-danger"  
                                onclick="event.preventDefault();
                                document.getElementById('delete-church-form{{ $church->id }}').submit()">
                                Delete
                            </button>
                        </div> 
                    </div>
                </div>
                <form id="delete-church-form{{ $church->id }}" action="{{ route('admin.churches.destroy', $church->id) }}" method="POST" style="display: none;">
                    @csrf
                    @method('DELETE')
                </form>
            </div>
            <div class="row g-3">
                <div class="col">        
                    <div class="card">
                        <div class="col">             
                            <div class="card-header">
                            <strong>{{ $church->name }}</strong>
                            </div>
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
                            @foreach($church->societies as $society)
                            <div class="accordion accordion-flush" id="accordionFlushExample">
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="flush-headingOne">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                                            <strong>{{ $society->name }} Society</strong>
                                        </button>
                                    </h2>
                                    <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                                        <div class="accordion-body"><li class="list-group-item">{{ $society->program }}</li></div>
                                        <a href="{{ route('admin.societies.edit', $society->id) }}" role="button" class="btn ml-2 float-end">Edit</a>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                                <li class="list-group-item"><strong>Website address:</strong><a href="{{ $church->website }}" target="_blank" style="text-decoration: none;">{{ $church->website  }}</a></li>
                                @foreach( $church->users as $user)
                                <li class="list-group-item"><strong>Church editor:</strong><a href="{{ route('admin.users.show', $user->id) }}" style="text-decoration:  none;"><strong>{{ $user->name  }}</strong></a></li>
                            @endforeach
                        </ul>
                        <div class="card-body text-end">
                            <a href="{{ url('/home') }}" class="card-link">Back</a>
                        </div>
                    </div>
                </div>
            </div>            
        </div>
    </div>    
</section>
@endsection('content')