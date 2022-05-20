@extends('layout')

@section('content')
<div class="col-md-12 offset-0">
        <div class="card" style="max-width: 950px;">
        <div class="card-header" style="text-align:center;">
           <strong>List of churches</strong>
            <a href="{{ route('admin.churches.create') }}" role="button" class="btn btn-primary float-end">Add church</a>
        </div>
        <div class="clearfix">
        <div class="table-responsive"> 
        <div class="card-body">     
            <table class="table table-striped table-hover">            
                <thead>                    
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Address</th>
                        <th scope="col">Latitude</th>
                        <th scope="col">Longitude</th>
                        <th scope="col">Activities</th>
                        <th scope="col">Announcement</th>
                        <th scope="col">Society</th>
                        <th scope="col">Website</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($churches as $church)
                    <tr>
                        <td>{{ Str::limit($church->name, 10) }}</td>
                        <td>{{ Str::limit($church->address, 10) }}</td>
                        <td>{{ Str::limit($church->latitude, 8) }}</td>
                        <td>{{ Str::limit($church->longitude, 8) }}</td>
                        <td>{{ Str::limit($church->program, 10) }}</td>                            
                        <td><div class="dropdown">
                            <a class="btn btn-info dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                                Announcements
                            </a>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                @foreach($church->announcements as $announcement)
                                    <li><a class="dropdown-item" href="{{ route('admin.announcements.show', $announcement->id) }}">{{Str::limit($announcement->title, 10) }}</a></li>
                                @endforeach
                                </ul>
                            </div>
                        </td>
                        <td><div class="dropdown">
                            <a class="btn btn-info dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                                Societies
                            </a>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                @foreach($church->societies as $society)
                                    <li><a class="dropdown-item" href="{{ route('admin.societies.show', $society->id) }}">{{Str::limit($society->name, 10) }}</a></li>
                                @endforeach
                                </ul>
                            </div>
                        </td>               
                        <td><a href="{{ $church->website }}" target="_blank" style="text-decoration: none;">{{ Str::limit($church->website, 10) }}</a></td>                   
                        <div class="d-grid gap-2 d-md-block">
                        <td>
                            <a href="{{ route('admin.churches.show', $church->id) }}"><button type="button" class="btn btn-info">Detail</button></a>                           
                        </td>
                        </div>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            </div>
            {{ $churches->links() }}
        </div>
        </div>            
    </div>
</div>        
@endsection