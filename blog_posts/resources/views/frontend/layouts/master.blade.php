<!doctype html>
<html lang="en">

<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Bootstrap demo</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <!-- toastr -->
        <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
</head>

<body>
        <div class="container">
                <div class="row">
                        <div class="col-md-8 offset-md-2">
                                <nav class="navbar bg-body-tertiary">
                                        <div class="container-fluid">
                                                <a class="navbar-brand">Posts</a>
                                                <form class="d-flex">
                                                        @if (auth()->user())
                                                                <h3 style="margin-right: 20px;"> {{auth()->user()->name}}</h3> 
                                                               <a class="btn btn-primary" href="{{ route('logout') }}">Logout</a>
                                                               @else
                                                               <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                                       Login
                                                                </button>
                                                                @endif
                                                </form>
                                        </div>
                                </nav>
                        </div>
                </div>
        </div>
        <!-- Button trigger modal -->

@yield('post')
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel"><b>Login Form</b></h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="{{ route('login') }}" method="post">
                @csrf
                <div class="mb-3">
                        <label for="">Email</label>
                        <input type="email" name="email" class="form-control" placeholder="Enter Email">
                </div>
                <div class="mb-3">
                        <label for="">Password</label>
                        <input type="password" name="password" class="form-control" placeholder="Enter Password">
                </div>
                <button type="submit" class="btn btn-success">Login</button>
        </form>
      </div>
    </div>
  </div>
</div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
        <!-- Toastr -->
        <script src="http://cdn.bootcss.com/jquery/2.2.4/jquery.min.js"></script>
        <script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
        {!! Toastr::message() !!}
</body>

</html>