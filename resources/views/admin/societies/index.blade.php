@extends('layout')

@section('content')
<section>
    <div class="container">
        <div class="col">
            <div class="card mb-3" style="max-width: 900px;">
                <div class="card-header">
                    <strong>List of societies</strong>
                    <a href="{{ route('admin.societies.create') }}" role="button" class="btn btn-primary btn-sm float-end">Add society</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                    <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">Name</th>
                                <th scope="col">Program</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>            
                            <tbody>
                            @foreach($societies as $society)
                            <tr>   
                                <td scope="row">{{ $society->name }}</td>
                                <td>{{Str::limit($society->program, 50) }}</td>
                                <td><a href="{{ route('admin.societies.show', $society->id) }}" role="button" class="btn btn-info btn-sm">Detail</a></td>                
                            </tr>
                            @endforeach
                            </tbody>           
                        </table>
                    </div>
                </div>
            {{ $societies->links() }}      
        </div>
    </div>
</section>
@endsection