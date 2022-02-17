@extends('layout')

@section('content')
<div class="container">
        <div class="row">
            <div class="col-md-12 offset-md-0">
                <div class="card">
                    <div class="card-header" style="text-align:center;">
                       <strong>List of Users</strong>
                        <a href="{{ route('admin.users.create') }}" role="button" class="btn btn-primary float-end">Add user</a>
                    </div>
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
                                <td><div class="btn btn-group">
                                        <button type="button" class="btn dropdown-toggle btn-lg" data-bs-toggle="dropdown" aria-expanded="true">
                                        list of churches    
                                        </button>
                                        @foreach($user->churches as $church)   
                                        <div class="dropdown-menu">                                           
                                            <ul>
                                               <a href="{{ route('admin.churches.show', $church->id) }}" role="button" class="btn"><li>{{ $church->name }}</li></a> 
                                            </ul>
                                        </div>                                      
                                        @endforeach
                                    </div>
                                </td>
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