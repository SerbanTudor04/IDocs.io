@extends('layouts.app-master')

@section('content')
    <div class=" p-5 rounded">
        @auth
        <h1>About application</h1>
        @endauth

        @guest
        <h1>Homepage</h1>
        <p class="lead">You are not authenticated. Log in into your account in order to see the content of this page</p>
        @endguest
    </div>
@endsection
