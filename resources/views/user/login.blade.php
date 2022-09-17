<!doctype html>
<html class="no-js" lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Login | Learning management</title>
        <meta name="description" content="">
        <meta name="keywords" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="icon" href="" type="image/x-icon" />

        <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:300,400,600,700,800" rel="stylesheet">

        <link rel="stylesheet" href="{{ url('dist/admin/plugins/bootstrap/dist/css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ url('dist/admin/plugins/fontawesome-free/css/all.min.css') }}">
        <link rel="stylesheet" href="{{ url('dist/admin/plugins/ionicons/dist/css/ionicons.min.css') }}">
        <link rel="stylesheet" href="{{ url('dist/admin/plugins/icon-kit/dist/css/iconkit.min.css') }}">
        <link rel="stylesheet" href="{{ url('dist/admin/plugins/perfect-scrollbar/css/perfect-scrollbar.css') }}">
        <link rel="stylesheet" href="{{ url('dist/admin/dist/css/theme.min.css') }}">
        <link rel="stylesheet" href="{{ url('dist/admin/style.css') }}">
        <script src="{{ url('dist/admin/src/js/vendor/modernizr-2.8.3.min.js') }}"></script>
    </head>

    <body>
        <div class="auth-wrapper">
            <div class="container-fluid h-100">
                <div class="row flex-row h-100">
                    <div class="col-xl-4 col-lg-4 col-md-4 m-auto">
                        <div class="authentication-form mx-auto">
                            <div class="logo-centered">
                                
                                <img height="100" src="{{asset('dist/img/logoo.png')}}" alt="LMS" >
                                {{-- <img height="40" src="{{url('dist/admin/img/logoo.png') }}" alt="LMS" > --}}
                            <h2><b>Learning management</b></h2>
                            </div>
                            

                            @if (\Session::has('message'))
                            <?php
                            list($type, $message) = explode('|', Session::get('message'));
                             echo sprintf('<div style="border-radius: 25px; height:60px;"class="alert alert-%s">%s</div>', $type, $message);
                                ?>
                            @endif

                            <form method="POST" action="{{route('users.store')}}">
                            {!! csrf_field() !!}

                                <div class="form-group">
                                    <input id="email" type="email" placeholder="Email" class="form-control" name="email" required>
                                    <i class="ik ik-user"></i>
                                    
                                </div>
                                <div class="form-group">
                                    <input id="password" type="password" placeholder="Password" class="form-control" name="pwd" required>
                                    <i class="ik ik-lock"></i>
                                   
                                </div>
      
                                <div class="sign-btn text-center">
                                    <button name="submit" value="login" class="btn btn-custom">Sign In</button>
                                </div><br>
                                <center><a href="">Forgot Password?</a></center>
                            </form>
                            <form method="POST" action="{{route('users.store')}}">
                                {!! csrf_field() !!}
                            <div class="sign-btn text-center">
                                <button name="submit" value="register" class="btn btn-custom">Register</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script src="{{ url('dist/admin/src/js/vendor/jquery-3.3.1.min.js') }}"></script>
        <script src="{{ url('dist/admin/plugins/popper.js/dist/umd/popper.min.js') }}"></script>
        <script src="{{ url('dist/admin/plugins/bootstrap/dist/js/bootstrap.min.js') }}"></script>
        <script src="{{ url('dist/admin/plugins/perfect-scrollbar/dist/perfect-scrollbar.min.js') }}"></script>
        <script src="{{ url('dist/admin/plugins/screenfull/dist/screenfull.js') }}"></script>

    </body>
</html>







{{-- @extends('layouts.app')

@section('content')



<form method="POST" action="{{route('users.store')}}">
    @csrf
Email Id    :<input type="text" name="email" required><br><br>
Password:<input type="password" name="pwd" required><br><br>
@error('name')
<p style="color: red">{{ $message }}</p>
@enderror

<input type="submit" value="login">
</form>

<a href="registers">Register Now</a>

@endsection --}}


