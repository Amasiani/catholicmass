@extends('main')

@section('content')
<div class="container">
        <div class="row">
            <div class="col-md-12 offset-md-0">
            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <a href="{{ route('admin.users.create') }}"><button class="btn btn-primary me-md-2 mb-2" type="button">Create User</button></a>
                <a href="{{ url('/home') }}"><button class="btn btn-primary mb-2" type="button">Home</button></a>
            </div>
                <div class="card">
                    <div class="card-header" style="text-align:center;">List of Users</div>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Church</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                    <tr>
                        <th scope="row">{{ $user->id}}</th>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        @foreach($user->churches as $church)<td>
                            {{ $church->name }}</td>
                        @endforeach
                        <td>
                            <a href="{{ route('admin.users.show', $user->id) }}"><button type="button" class="btn btn-info">Detail</button></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $users->links() }}
            </div>
            </div>
        </div>
        </div>
    </div>
@endsection('content')