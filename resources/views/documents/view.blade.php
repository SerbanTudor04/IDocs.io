@extends('layouts.app-master')

@section('content')
    <div class="bg-light p-5 rounded">
        @auth
            {{$doc->name}}

        @endauth

        @guest
        <h1>Add document page</h1>
        <p class="lead">You are not authenticated. Log in into your account in order to see the content of this page</p>
        @endguest
    </div>
@endsection

