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
            <table class="table">            
                <thead>                    
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Address</th>
                        <th scope="col">Latitude</th>
                        <th scope="col">Longitude</th>
                        <th scope="col">Activities</th>
                        <th scope="col">Announcement</th>
                        <th scope="col">Website</th>
                        <th scope="col" colspan="1">Editor</th>
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
                        <td>{{ Str::limit($church->website, 10) }}</td>                            
                        <td><div class="btn btn-group">
                                <button type="button" class="btn dropdown-toggle btn-lg" data-bs-toggle="dropdown" aria-expanded="true">
                                    list of users    
                                </button>
                                @foreach($church->users as $user)  
                                <div class="dropdown-menu">                                           
                                    <ul>
                                        <a href="{{ route('admin.churches.show', $church->id) }}" role="button" class="btn"><li>{{ Str::limit($user->name, 10) }}</li></a> 
                                    </ul>
                                </div>                                      
                                @endforeach
                        </td></div>                       
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
        </div>
        </div>            
            {{ $churches->links() }}
    </div>
</div>        
@endsection