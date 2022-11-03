<!doctype html>
<html lang="en">
    <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.87.0">
    <title>Internal Docs</title>

    <!-- Bootstrap core CSS -->
    <link href="{!! url('assets/libs/bootstrap/css/bootstrap.min.css') !!}" rel="stylesheet">
    <link href="{!! url('assets/libs/fontawesome/css/all.min.css') !!}" rel="stylesheet">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
      .position__middle{
        position: absolute;
        top: 10%;
        left: 50%;
        transform: translate(-50%,0%);
      }
    </style>

    
    <!-- Custom styles for this template -->
    <link href="{!! url('assets/css/app.css') !!}" rel="stylesheet">
</head>
  <body class="d-flex flex-column h-100">
  
  @include('layouts.partials.navbar')
  @include('layouts.partials.messages')

    <main class="app__content position__middle ">
      <div class="container">

          @yield('content')
      </div>
    </main>
    <script src="{!! url('assets/libs/bootstrap/js/bootstrap.bundle.min.js') !!}"></script>
    <script src="{!! url('assets/libs/fontawesome/js/all.min.js') !!}"></script>
  </body>
</html>