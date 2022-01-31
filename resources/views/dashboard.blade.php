@extends('template')

@section('content')
<div class="container">
@if (Route::has('login'))
    <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
    @auth
        <p>{{ Auth::user()->name }}</p>
            @if(Auth::user()->usertype==1)
                <a href="{{ url('/admin.dashboard.home') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Home</a>
            @endif
                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                </form>
@else
    <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>
        @if (Route::has('register'))
            <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
        @endif
    @endauth
</div>
@endif
    <h1>Hello this is the editor Dashboard</h1>
    <div class="container-fluid">
        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Church Name</th>
                <th scope="col">Church Address</th>
                <th scope="col">Church Description</th>
                <th scope="col">Church Lat</th>
                <th scope="col">Church Long</th>
            </tr>
            </thead>
            <tbody>
                @auth
                @if ($user = Auth::user())
                    @foreach($user->churches as $church)
                        <tr>
                            <th scope="row">1</th>
                            <td>{{ $church->name }}</td>
                            <td>{{ $church->address }}</td>
                            <td>{{ $church->description }}</td>
                            <td>{{ $church->latitude }}</td>
                            <td>{{ $church->longitude }}</td>
                        </tr>
                    @endforeach
                @else
                    <h1><strong>You have no Church in your record!!!</strong></h1>                    
                @endif
                @endauth
            </tbody>
       </table>
    </div>
</div>
@endsection