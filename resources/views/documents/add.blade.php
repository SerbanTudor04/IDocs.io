@extends('layouts.app-master')

@section('content')
    <div class="bg-light p-5 rounded">
        @auth
        @include('components.head.text-editor')
        <form action="{{ route('documents.add_perform') }}" method="post" >
            @include('layouts.partials.messages')
            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                

            <h1 class="h3 mb-3 fw-normal">Add a documentation</h1>

            <div class="form-group form-floating mb-3">
                <input type="text" class="form-control" name="name" value="{{ old('username') }}" placeholder="Title" required="required" autofocus>
              
                <label for="floatingName">Title</label>
                @if ($errors->has('name'))
                    <span class="text-danger text-left">{{ $errors->first('name') }}</span>
                @endif
            </div>
            <div class="form-group form-floating mb-3">
                <input type="text" class="form-control" name="short_description" value="{{ old('short_description') }}" placeholder="Enter a short description" required="required" autofocus>

              
                <label for="floatingName">Short description</label>
                @if ($errors->has('short_description'))
                    <span class="text-danger text-left">{{ $errors->first('short_description') }}</span>
                @endif
            </div>


            
            <textarea name="content" id="myeditorinstance"></textarea>

            <button class="w-100 mt-2 btn btn-lg btn-primary" type="submit">Add <i class="fa-solid fa-plus"></i></button>

        </form>

      

        @endauth

        @guest
        <h1>Add document page</h1>
        <p class="lead">You are not authenticated. Log in into your account in order to see the content of this page</p>
        @endguest
    </div>
@endsection

