@extends('main')

@section('content')
<div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-2">
            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <a href="{{ route('admin.roles.create') }}"><button class="btn btn-primary me-md-2 mb-2" type="button">Add a Role</button></a>
                <a href="{{ url('/home') }}"><button class="btn btn-primary mb-2" type="button">Home</button></a>
            </div>
                <div class="card">
                    <div class="card-header" style="text-align:center;">List of Users</div>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($roles as $role)
                    <tr>
                        <th scope="row">{{ $role->id}}</th>
                        <td>{{ $role->name }}</td>
                        <td><a href="{{ route('admin.roles.edit', $role->id) }}"><button type="button" class="btn btn-info">Edit</button></a>
                        <a href="{{ route('admin.roles.show', $role->id) }}"><button type="button" class="btn btn-info">show</button></a>
                            <button class="btn btn-danger" type="button"
                                onclick="event.preventDefault();
                                document.getElementById('form-role-delete{{ $role->id}}').submit();">
                                Delete
                            </button>
                            <form id="form-role-delete{{ $role->id }}" action="{{ route('admin.roles.destroy', $role->id) }}" method="POST" style="display: none;">
                                @csrf
                                @method('DELETE')
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $roles->links() }}
            </div>
            </div>
        </div>
    </div>
@endsection('content')