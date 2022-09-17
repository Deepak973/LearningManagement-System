<!doctype html>
<html class="no-js" lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Login | Admin - Learning management</title>
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
                                <!-- <a href="http://Advoiz.rakibhstu.com"><img height="40" src="{{ url('dist/admin/img/logo.png') }}" alt="Advoiz" ></a> -->
                            <h2><b>Learning management</b></h2>
                            </div>
                            

                         
                            <form method="POST" action="{{route('users_verifyotp')}}">
                            {!! csrf_field() !!}

                                <div class="form-group">
                                    <input id="email" type="text" placeholder="Enter OTP" class="form-control" name="userotp" required>
                                    
                                    
                                </div>
                                <center>@if(isset($data['errors']))
                                <p style="color: red">{{ $data['errors'] }}</p>
                                @endif
                                </center>
    
                                <div class="form-group">
                                    <input id="email" type="hidden"  class="form-control" name="email" value="{{$data['email']}}" required>
                                    
                                    
                                </div>

                                <div class="form-group">
                                    <input id="email" type="hidden"  class="form-control" name="otp" value="{{$data['otp']}}" required>
                                
                                    
                                </div>
                                
      
                                <div class="sign-btn text-center">
                                    <button name="submit"  class="btn btn-custom">Verify OTP</button>
                                </div>
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

<form method="POST" action="{{route('users.verifyotp')}}">
    @csrf
Enter OTP<input type="text" name="userotp"><br>
<input type="hidden" value="{{$data['email']}}" name="email"><br>
<input type="hidden" value="{{$data['otp']}}" name="otp"><br>
<input type="submit" value="submit">

@if(isset($data['errors']))
<p style="color: red">{{ $data['errors'] }}</p>
@endif

</form>

@endsection --}}