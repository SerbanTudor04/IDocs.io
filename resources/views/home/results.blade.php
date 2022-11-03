@extends('layouts.app-master')

@section('content')
    <div class="bg-light p-5 rounded">
        @auth
        @include('home.partials.search')
        <small>Total results: {{count($response)}} </small>

        <hr>
            @if(count($response)==0)
                <small>No results found!</small>


            @endif

            @foreach ($response as $r )
                {{-- <li>{{$r['_source']['name']}}</li> --}}
                <a class="results__link" href="/doc/view/{{$r['_id']}}">
                    <div class="card w-100 mt-4 border-0" style="width: 18rem;">
                        <div class="card-body results__card__body ">
                            <div>
                              <h5 class="card-title text-primary">{{$r['_source']['name']}}</h5>
                              <small class="text-secondary">{{$r['_source']['short_description']}}</small>
    
                            </div>
                        </div>
                      </div>
                </a>
            
            @endforeach
      
        @endauth

        @guest
        <h1>Results page</h1>
        <p class="lead">You are not authenticated. Log in into your account in order to see the content of this page</p>
        @endguest
    </div>
@endsection

<style>
    .results__card__body{
        display: flex;
        
    }
    .results__card__body  .btn__view{
        position: absolute;
        right: 2%;
    }
    .results__card__body a, .results__link{
        text-decoration: none;
    }

</style>