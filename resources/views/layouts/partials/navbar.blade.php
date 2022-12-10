<header class="p-3 bg-dark text-white">
    <div class="container">
      <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
        @auth
        <div class="flex-shrink-0">
          @include('layouts.partials.mega_menu')
        </div>
        
        @endauth
          
        <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
          InternalDocs
        </a>
  
        <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
        </ul>
        @guest
          <a href="{{route('login.show')}}" target="" rel="noopener noreferrer" class="btn btn-dark">Login <i class="fa fa-arrow-right-to-bracket"></i></a>  
        @endguest

        @auth
        <div class="flex-shrink-0">
          @include('layouts.partials.users_menu')
        </div>

        @endauth
      </div>
    </div>
  </header>