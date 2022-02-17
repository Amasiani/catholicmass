@extends('layout')

@section('content')
<section style="padding-top: 5px;">
    <div class="col-md-12">
        <div class="card mb-3" style="max-width: 900px;">
            <div class="card-header">
                <strong>Edit Church</strong>
                <a class="btn float-end" href="{{ url('/home')}}">Back</a>
            </div>
            <div class="card-body">
                @if(Session::has('message_sent'))
                <div class="alert-session" role="alert">
                    {{Session::get('message_sent')}}
                </div>
                @endif
                <form method="POST" action="{{route('admin.churches.update', $church->id)}}" enctype="multipart/form-data" class="row g-3">
                    @method('PATCH')
                    @csrf
                    @include('admin.churches.partials.forms')
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
         </div>
    </div>
</section>
@endsection('content')

