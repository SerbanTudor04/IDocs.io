@extends('layouts.app-master')

@section('content')
    <div class=" p-5 rounded">
        @auth
        

        <div class="px-4 py-5 my-5 text-center">
            <h1 class="display-5 fw-bold">Shortcuts</h1>
            <div class="col-lg-6 mx-auto">
              <p class="lead mb-4"></p>
              <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
                <a href="{{route('home.results')}}" type="button" class="btn btn-primary btn-lg px-4 gap-3">Search documentation <i class="fa fa-search"></i></a>
                <a href="{{route('documents.add_show')}}" type="button" class="btn btn-outline-secondary btn-lg px-4">Add documentation <i class="fa fa-plus"></i></a>
              </div>
            </div>
          </div>

        <div class="card ">
          <div class="card-body">
            <h1 class="card-title">Top rated docs</h1>
          </div>
        </div>
        @endauth

        @guest
        <h1>Homepage</h1>
        <p class="lead">You are not authenticated. Log in into your account in order to see the content of this page</p>
        @endguest
    </div>
@endsection
