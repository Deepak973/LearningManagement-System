@section('content')

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
	<link href="http://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">
</head>
<body style="background-size: cover;
    background-color:lightblue;
    background-position: center;">
	<nav class="navbar navbar-default navbar-fixed-top" style="height: 60px;">
  <div class="container-fluid">
    <div class="navbar-header">
     
      <a class="navbar-brand" href="/" style="margin-top: 5%;"><b>Learning Management</b></a>
    </div>
    <div id="navbar" class="collapse navbar-collapse">
      <ul class="nav navbar-nav">
        
      </ul>  
    </div>
  </div>
 </nav>
 
 <main class="py-4">
    <br><br><br><br><br><br><br><br><br>
    <center>
    @yield('content')
    </center>
  </main>



<div style="position: fixed;
   left: 0;
   bottom: 0;
   width: 100%;
   background-color: rgba(0,0,0,0.7);
   color: white;
   text-align: center;">
  <h4 style="color: white;">&copy <b>Learning Management </b></h4>
</div>


</body>
</html>