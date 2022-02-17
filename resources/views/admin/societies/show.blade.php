@extends('layout')

@section('content')
<section>
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card">                                        
                    <div class="card-header">
                        {{ $society->name}} Society
                        <button class="btn btn-danger btn-sm mr-2 float-end" type="button" onclick="event.preventDefault();
                            document.getElementById('society-delete-form{{ $society->id }}').submit();">
                            Delete
                        </button>
                        <a href="{{ route('admin.societies.edit', $society->id) }}" role="button" class="btn btn-secondary btn-sm mr-2 mb-2 float-end">Edit</a>
                        <form id="society-delete-form{{ $society->id }}" action="{{ route('admin.societies.destroy', $society->id) }}" method="POST" style="display: none;">
                            @csrf    
                            @method('DELETE')
                        </form>
                    </div>
                    <div class="card-body">
                        {{$society->program }}
                    </div>
                    <div class="card-footer">
                    <a href="{{ url('admin/societies') }}" role="button" class="btn btn-sm float-end">Back</a>
                    </div>                   
                </div>
            </div>
        </div>
    </div>
</section>
@endsection