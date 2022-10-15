<header class="p-3 bg-dark text-white">
    <div class="container">
      <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
        <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
          InternalDocs
        </a>
  
        <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
        </ul>
  

  
        @auth
          <div class="me-2">Hi, {{auth()->user()->name}}</div>
          <div class="text-end">
            <a href="{{ route('documents.add_show') }}" class="btn btn-outline-primary me-2">Add document <i class="fa-solid fa-plus"></i></a>
            <a href="{{ route('logout.perform') }}" class="btn btn-outline-light me-2">Logout <i class="fa-solid fa-right-from-bracket"></i></a>
          </div>
        @endauth
  
        @guest
          <div class="text-end">
            <a href="{{ route('login.perform') }}" class="btn btn-outline-light me-2">Login</a>
            <a href="{{ route('register.perform') }}" class="btn btn-warning">Sign-up</a>
          </div>
        @endguest
      </div>
    </div>
  </header>