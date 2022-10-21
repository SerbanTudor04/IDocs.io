@extends('layouts.app-master')

@section('content')
    <div class="bg-light p-5 rounded">
        @auth
            <div class="document__view">
                <h1 class="text-primary">
                    {{$doc->name}}
                </h1>
                <small class="text-secondary">
                    {{$doc->short_description}}

                </small>
            </div>
            <br><br>
            <h5>Content:</h5>
            <div id="document__content container">
                {!! html_entity_decode($doc->content) !!}
            </div>


        @endauth

        @guest
        <h1>Add document page</h1>
        <p class="lead">You are not authenticated. Log in into your account in order to see the content of this page</p>
        @endguest
    </div>
@endsection

