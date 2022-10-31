@extends('layouts.app-master')
@section('content')
<div class="bg-light p-5 rounded">
    @auth
        @inject('provider', 'App\Http\Controllers\UtilsController')
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


            {{-- posted on  and by infromationms--}}
        <small>
            <div class="row">
                    Posted on: {{$doc->created_at }} <br>
                    By: {{$provider::get_username($doc->created_by) }}
            </div>

        </small>
        {{-- Comments of the document --}}
        <hr>
        {{-- rating --}}
        <div class="row">
            <div class="col-12">
                <form action="">
                    
                </form>
            </div>
        </div>

        <br><br>
        {{-- Add comment --}}
        <div  class="add__comment__document">
            <form action="{{ route('documents.add_comment') }}"  method="POST">
                {{ csrf_field() }}
                <input type="hidden" name="document_id" value="{{$doc->id}}">
                <textarea name="comment" class="form-control" placeholder="Add comment" rows="3" required></textarea>
                <button type="submit" class="btn btn-primary w-100 mt-3">Add</button>
            </form>
        </div>
        <br><br>
        {{-- Iterate comments --}}
        @foreach($comments as $comment)
        {{-- comment structure--}}
        <div class="row card mb-2">
            <div class="card-body">
                <div class="row">
                    <div class="col-xl">
                        {{$comment->content}}
                    </div>

                </div>
                <div class="row mt-5 align-content-end">
                    <small class="text-secondary">
                        Posted on:{{$comment->created_at}}<br>
                        By:{{$provider::get_username($comment->created_by)}}

                    </small>
                </div>
            </div>
        </div>
        @endforeach
        {{-- Total comments --}}

        <small>Total comments: {{count($comments)}}</small>
        @endauth

        @guest
        <h1>Add document page</h1>
        <p class="lead">You are not authenticated. Log in into your account in order to see the content of this page</p>
        @endguest
    </div>
@endsection

