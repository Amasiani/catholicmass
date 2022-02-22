@extends('layout')

@section('content')
<section style="padding-top:5px;">
    <div class="container">
        <div class="col">
            <div class="card mb-3" style="max-width: 900px;">
                <div class="card-header">
                    <strong>Add Church</strong>
                    <a href="{{ url('/home') }}" role="button" class="btn me-mb-2 mb-3 float-end">Back</a>
                </div>
                <div class="card-body">
                        @if(Session::has('message_sent'))
                        <div class="alert-session" role="alert">
                            {{Session::get('message_sent')}}
                        </div>
                        @endif
                        <form method="POST" action="{{route('admin.churches.store')}}" class="row g-3">
                            @csrf
                            @include('admin.churches.partials.forms', ['create' => true])
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
