@extends('layout')

@section('content')
<section style="padding-top: 5px;">
    <div class="container">
        <div class="col-md-12">
            <div class="card" style="max-width: 900px;">
                <div class="card-header" style="text-align:center;">
                    List of Announcements
                        <a href="{{ route('admin.announcements.create') }}" role="button" class="btn btn-primary float-end">Add Announcement</a>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">Title</th>
                                        <th scope="col">Description</th>
                                        <th scope="col">Church</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($announcements as $announcement)
                                    <tr>
                                        <td scope="row">{{ $announcement->title }}</td>
                                        <td>{{Str::limit($announcement->description, 20) }}</td>
                                        <td>{{ $announcement->church->name }}</td>                      
                                        <td>
                                            <a href="{{ route('admin.announcements.show', $announcement->id) }}" role="button" class="btn btn-info">Detail</a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                {{ $announcements->links() }}
            </div>
        </div>
    </div>
</section>
@endsection('content')