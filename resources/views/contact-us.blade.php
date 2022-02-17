@extends('template')

@section('content')
    <section style="padding-top:60px;">
        <div class="container">
            <div class="row">
                <div class="col-md-6 offset-md-3">
                    <div class="card">
                        <div class="card-header">
                              Contact Us
                        </div>
                            <div class="card-body">
                                @if(Session::has('message_sent'))
                                    <div class="alert-session" role="alert">
                                        {{Session::get('message_sent')}}
                                    </div>
                                @endif
                                <form method="POST" action="{{route('contact.send')}}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="name">Name:</label>
                                        <input type="text" name="name" class="form-control @error('name') is-invalided @enderror" />
                                        @error('name')
                                        <span role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="email">Email:</label>
                                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" />
                                        @error('email')
                                        <span role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="phone">Phone:</label>
                                        <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror" />
                                        @error('phone')
                                        <span role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="message">Message</label>
                                        <textarea name="message" class="form-control @error('message') is-invalid @enderror"></textarea>
                                        @error('message')
                                        <span role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </form>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection   