@extends('layouts.app-master')

@section('content')
    <div class="bg-light p-5 rounded">
        @auth
        @include('home.partials.search')

        <ul>
            @foreach ($response as $r )
                <li>{{$r['_source']['name']}}</li>
            @endforeach
        </ul>



      
      
        @endauth

        @guest
        <h1>Results page</h1>
        <p class="lead">You are not authenticated. Log in into your account in order to see the content of this page</p>
        @endguest
    </div>
@endsection
