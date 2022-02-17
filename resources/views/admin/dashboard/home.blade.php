@extends('layout')

@section('content')
<section style="padding-top: 5px;"></section>
    <div class="container">
        <div class="col-md-9 offset-1">    
            <div class="card" style="max-width: 900px;">
                <div class="card-header">
                    <a href="{{ route('admin.roles.create') }}" class="btn btn-primary me-md-2 mb-2 float-end" role="button">Add a Role</a>
                </div>
                <div class="card-body">
                    <table class="table caption-top table-striped table-hover">
                        <caption>List of available roles</caption>
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
                                <td colspan="2"><a href="{{ route('admin.roles.edit', $role->id) }}"><button type="button" class="btn btn-info">Edit</button></a>
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
                </div>                
            {{ $roles->links() }}
            </div>
        </div>
    </div>
</section>
@endsection('content')