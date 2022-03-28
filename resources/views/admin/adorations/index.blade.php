@extends('layout')

@section('content')
<div class="container">
    <div class="row">
        <div class="card">
            <div class="card-header">
                Catholic Adorations ministry
                <a href="{{ route('admin.adorations.create') }}" role="button" class="btn btn-primary btn-sm mb-2 float-end">Add adoration</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th scope="col">Name</th>
                            <th scope="col">Program</th>
                            <th scope="col">Address</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                        <tbody>
                            @foreach($adorations as $adoration)
                            <tr>
                                <td scope="row">{{ $adoration->name }}</td>
                                <td>{{Str::limit($adoration->program, 50) }}</td>
                                <td>{{ $adoration->address }}</td>
                                <td><a href="{{ route('admin.adorations.show', $adoration->id) }}" role="button" class="btn btn-info btn-sm">Detail</a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        {{ $adorations->links()}}
    </div>
</div>
@endsection