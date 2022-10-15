<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="SerbanTudor">
    
    <title>Internal Docs - Auth</title>

    <!-- Bootstrap core CSS -->
    <link href="{!! url('assets/libs/bootstrap/css/bootstrap.min.css') !!}" rel="stylesheet">
    <link href="{!! url('assets/css/signin.css') !!}" rel="stylesheet">
    
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
      .backBtn{
        position: absolute;
        top: 1%;
        left: 1%;
      }
    </style>

    
    <!-- Custom styles for this template -->
    <link href="signin.css" rel="stylesheet">
</head>
<body class="text-center">
        
    <button onclick="window.history.back();" class="btn btn-outline-primary backBtn hBack btn-lg pull-left">Back</button>
    <main class="container w-50">
        <div class="form-signin">

            @yield('content')
        </div>
        
    </main>



</body>
</html>