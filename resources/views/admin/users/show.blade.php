@extends('main')

@section('content')
<section style="padding-top:60px;">
        <div class="row">
            <div class="col-md-10 offset-md-2">
                
                <div class="card" style="width: 45rem;">
                    <div class="card-header">                        
                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <a href="{{ route('admin.users.edit', $user->id) }}"><button class="btn btn-primary me-md-2" type="button">Edit</button></a>
                            <button class="btn btn-danger"  type="button"
                                onclick="event.preventDefault();
                                document.getElementById('delete-user-form{{ $user->id }}').submit()">
                                Delete
                            </button>
                            <form id="delete-user-form{{ $user->id }}" action="{{ route('admin.users.destroy', $user->id) }}" method="POST" style="display: none;">
                                @csrf
                                @method('DELETE')
                            </form>
                        </div>
                        <strong>{{ $user->name }} </strong>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><strong>Email:</strong> {{ $user->email }}</li>
                        @foreach($user->churches as $church)
                        <li class="list-group-item"><strong>Church:</strong>  {{ $church->name }}</li>
                        @endforeach
                    </ul>
                    <div class="card-body text-end">
                        <a href="{{ route('admin.users.index') }}" class="card-link">Back</a>
                    </div>
                </div>
            </div>
        </div>
</section>
@endsection('content')