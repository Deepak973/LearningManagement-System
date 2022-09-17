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
            <div class="container-fluid h-200">
                <div class="row flex-row h-100">
                    <div class="col-xl-4 col-lg-4 col-md-4 m-auto">
                        <div class="authentication-form mx-auto">
                            <div class="logo-centered">
                               
                            <h2><b>Learning management</b></h2>
                            </div>
                         

                            @if (\Session::has('message'))
                            <?php
                           
                            list($type, $message) = explode('|', Session::get('message'));
                             echo sprintf('<div style="border-radius: 25px; height:40px;"class="alert alert-%s">%s</div>', $type, $message);
                                ?>
                            @endif

                            <form method="POST" action="{{route('users.register')}}" enctype="multipart/form-data" >
                            {!! csrf_field() !!}
                            @if(!isset($request))
                                <div class="form-group">
                                    <input id="email" type="email" placeholder="Email" class="form-control"  name="email" required >
                                    <i class="ik ik-mail"></i>
                                  
                                </div>
                            @endif

                            @if(isset($request))

                                <div class="form-group">
                                    <input id="email" type="email" placeholder="Email" class="form-control"  name="" value="{{$request->email}}" disabled >
                                    <i class="ik ik-mail"></i>
                                
                                </div>
                                <div class="form-group">
                                    <input id="email" type="hidden" placeholder="Email" class="form-control"  name="email" value="{{$request->email}}" >
                                    <i class="ik ik-mail"></i>
                                
                                </div>
                                <div class="form-group">
                                    <input id="email" type="text" placeholder="Full Name" class="form-control @error('email') is-invalid @enderror" name="uname"  required autocomplete="email" autofocus>
                                    <i class="ik ik-user"></i>
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <input id="password" type="password" placeholder="Password" class="form-control @error('password') is-invalid @enderror" name="pwd" required>
                                    <i class="ik ik-lock"></i>
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>

                                <div class="form-group">
                                    <input id="password" type="password" placeholder="Confirm Password" class="form-control @error('password') is-invalid @enderror" name="cpwd" required>
                                    <i class="ik ik-lock"></i>
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>

                                <div class="form-group">
                                    Gender : &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                                        <input class="form-check-input" type="radio" name="gender"  value="male">
                                        <label class="form-check-label" for="gender">
                                          Male
                                        </label>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                                        <input class="form-check-input" type="radio" name="gender"  value="male">
                                        <label class="form-check-label" for="gender">
                                          Female
                                        </label>
                                </div>

                                <div class="form-group">
                                    <input id="password" type="text" placeholder="Phone no" class="form-control @error('password') is-invalid @enderror" name="pno" required>
                                    <i class="ik ik-phone"></i>
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>

                                <div class="form-group">
                                    <input id="password" type="text" placeholder="Address" class="form-control @error('password') is-invalid @enderror" name="add" required>
                                    <i class="ik ik-home"></i>
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>

                                {{-- <div class="form-group">
                                    <input id="password" type="text" placeholder="Profile pic" class="form-control @error('password') is-invalid @enderror" name="pp" required>
                                    <i class="ik ik-user"></i>
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div> --}}
                                
                                <div class="form-group">
                                    <label>Profile pic</label>
                                    <div class="custom-file">
                                        <input type="file" accept="image/png,image/jpg,image/jpeg" class="custom-file-input" id="images" name="pp">
                                        <label class="custom-file-label" for="image">Choose file</label>
                                    </div>
                                </div>
                                <div id="images_preview" class="d-flex flex-wrap form-group">
                                    <div class="position-relative shadow border mr-3" style="margin-top: 15px;">
                                        {{-- <img src="{{ asset($image->image) }}" style="height: 100%; width: 300px;"> --}}
                                    </div>
                                </div>
      
                                @endif
                                <div class="sign-btn text-center">
                                    <button name="submit"  class="btn btn-custom">Register</button>
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
        <script>
            document.getElementById("images").addEventListener("change", function (event) {
                var preview = document.getElementById("images_preview");
                preview.innerHTML = "";
                var files = event.target.files;
                
                for (let i=0; i<files.length; i++) {
                    let file = files[i];
                    
                    var imgDiv = document.createElement("div");
                    imgDiv.classList.add("position-relative", "shadow", "border", "mr-2");
                    imgDiv.style.marginTop = '5px';
                    preview.appendChild(imgDiv);
                    
                    var img = document.createElement("img");
                    img.src = URL.createObjectURL(file);
                    img.style.height = "100%";
                    img.style.width = "300px";
                    imgDiv.appendChild(img);
                }
            });
        </script>
    </body>
</html>







{{-- @extends('layouts.app')

@section('content')


<form method="POST" action="{{route('users.register')}}">
    @csrf
@if(!isset($request))
Email Id:<input type="text" name="email" required><br>
@endif
@error('name')
<p style="color: red">{{ $message }}</p>
@enderror
@if(isset($request))
Email Id:<input type="text" name="email" value="{{$request->email}}" disabled><br>
User Name:<input type="text" name="uname" required><br>
Password :<input type="password" name="pwd" required><br> 
Confirm Password :<input type="password" name="cpwd" required><br>
Gender:  Male <input type="radio" name="gender" value="male"> Female <input type="radio" name="gender" value="female"><br>
phone no: <input type="text" name="pno" required><br>
Address: <input type="text" name="add" required><br>
Profile pic: <input type="text" name="pp" required><br>
@endif
<input type="submit" value="register">
</form>

@endsection --}}