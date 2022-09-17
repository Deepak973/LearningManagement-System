@if(session('user')==null)
{{dd(session('user'))}}
{{ Redirect::to('/') }}
@endif


<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" >
<head>
	<title>@yield('title','') | Learning Management</title>
	<!-- initiate head with meta tags, css and script -->
	@include('trainer.include.head')

</head>
<body id="app" >
    <div class="wrapper">
    	<!-- initiate header-->
    	@include('trainer.include.header')
    	<div class="page-wrap">
	    	<!-- initiate sidebar-->
	    	@include('trainer.include.sidebar')

	    	<div class="main-content">
	    		<!-- yeild contents here -->
	    		@yield('content')
	    	</div>

	    	<!-- initiate chat section-->
	    	@include('trainer.include.chat')


	    	<!-- initiate footer section-->
	    	@include('trainer.include.footer')

    	</div>
    </div>

	<!-- initiate modal menu section-->
	@include('trainer.include.modalmenu')

	<!-- initiate scripts-->
	@include('trainer.include.script')
</body>
</html>
