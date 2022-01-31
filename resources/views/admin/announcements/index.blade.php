@extends('main')

@section('content')
<div class="container">
        <div class="row">
            <div class="col-md-12 offset-md-0">
            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <a href="{{ route('admin.announcements.create') }}"><button class="btn btn-primary me-md-2 mb-2" type="button">Add Announcement</button></a>
                <a href="{{ url('/home') }}"><button class="btn btn-primary mb-2" type="button">Home</button></a>
            </div>
                <div class="card">
                    <div class="card-header" style="text-align:center;">List of Announcements</div>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Title</th>
                        <th scope="col">Description</th>
                        <th scope="col">Church</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($announcements as $announcement)
                    <tr>
                        <th scope="row">{{ $announcement->id}}</th>
                        <td>{{ $announcement->title }}</td>
                        <td>{{Str::limit($announcement->description, 20) }}</td>
                        <td>{{ $announcement->church->name }}</td>                      
                        <td>
                            <a href="{{ route('admin.announcements.show', $announcement->id) }}"><button type="button" class="btn btn-info">Detail</button></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $announcements->links() }}
            </div>
            </div>
        </div>
    </div>
@endsection('content')