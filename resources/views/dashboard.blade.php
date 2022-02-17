@extends('layout')

@section('content')
<section>
<div class="container-fluid">
<h1>Welcome to the editor Dashboard</h1>
<a href="{{ route('admin.churches.create') }}" role="button" class="btn btn-primary mb-2 float-end">Create church</a>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Address</th>
                <th scope="col">Activities</th>
                <th scope="col">Latitude</th>
                <th scope="col">Longitude</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>
            @auth
                @if ($user = Auth::user())
                    @foreach($user->churches as $church)
                        <tr>
                            <th scope="row">{{ $church->id }}</th>
                            <td>{{ $church->name }}</td>
                            <td>{{ $church->address }}</td>
                            <td>{{ Str::limit($church->program, 40) }}</td>
                            <td>{{ $church->latitude }}</td>
                            <td>{{ $church->longitude }}</td>
                            <td><a href="{{ route('admin.churches.show', $church->id) }}" role="button" class="btn btn-info">Show</a></td>
                        </tr>
                    @endforeach
                    </tbody>
        </table>
                    @else
                        <h1><strong>You have no Church in your record, please create a 
                            <a href="{{ route('admin.churches.create') }}">church</a> and link it to your account.
                            </strong>
                        </h1>                  
                    @endelse           
                @endif
            @endauth
       
    </div>
</section>
@endsection