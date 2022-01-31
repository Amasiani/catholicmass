@extends('main')

@section('content')
        <div class="row">
            <div class="col">
            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <a href="{{ url('/') }}"><button class="btn btn-primary me-md-2 mb-2" type="button">Home</button></a>
                <button class="btn btn-primary mb-2" type="button">Button</button>
            </div>
            <div class="card">
                    <div class="card-header" style="text-align:center;">List of churches</div>
            <table class="table table-sm">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Address</th>
                        <th scope="col">Latitude</th>
                        <th scope="col">Longitude</th>
                        <th scope="col">Activities</th>
                        <th scope="col">Announcement</th>
                        <th scope="col">Website</th>
                        <th scope="col">Editor</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($churches as $church)
                    <tr>
                        <th scope="row">{{ $church->id}}</th>
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
                            </div></td>
            
                        <td>{{ Str::limit($church->website, 10) }}</td>
                        @foreach($church->users as $user)<td>
                            {{ Str::limit($user->name, 10) }}</td>
                        @endforeach
                        <div class="d-grid gap-2 d-md-block">
                        <td>
                            <a href="{{ route('admin.churches.show', $church->id) }}"><button type="button" class="btn btn-info">Detail</button></a>                           
                        </td>
                        </div>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $churches->links() }}
            </div>
            </div>
        </div>
@endsection('content')