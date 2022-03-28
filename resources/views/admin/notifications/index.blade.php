@extends('layout')

@section('content')
<section style="padding-top:5px;">
    <div class="col">
        <div class="card" style="max-width: 900px;">
            <div class="card-header">
                <strong>List of Notifications</strong>
                <a href="{{ route('admin.notifications.create') }}" class="btn btn-primary float-end"  tabindex="-1" role="button" aria-disabled="true">Create Notification</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Title</th>
                                <th scope="col">Description</th>
                                <th scope="col">Image</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($notifications as $notification)
                            <tr>
                                <td>{{ $notification->title }}</td>
                                <td>{{Str::limit($notification->description, 50) }}</td>
                                <td><img src="{{ asset('images/' . $notification->img) }}" width="50px" heigth="50px" class="img-fluid" alt="notification_image"></td>
                                <td><a href="{{ route('admin.notifications.show', $notification->id) }}" class="btn btn-info" tabindex="-1" role="button" aria-disabled="false">show</a></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div> 
{{ $notifications->links() }}
</section>
@endsection