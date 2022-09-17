@if(session('user')==null)
{{dd(session('user'))}}
{{ Redirect::to('/') }}
@endif


<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" >
<head>
	<title>@yield('title','') | Learning Management</title>
	<!-- initiate head with meta tags, css and script -->
	@include('user.include.head')

</head>
<body id="app" >
    <div class="wrapper">
    	<!-- initiate header-->
    	@include('user.include.header')
    	<div class="page-wrap">
	    	<!-- initiate sidebar-->
	    	@include('user.include.sidebar')

	    	<div class="main-content">
	    		<!-- yeild contents here -->
	    		@yield('content')
	    	</div>

	    	<!-- initiate chat section-->
	    	@include('user.include.chat')


	    	<!-- initiate footer section-->
	    	@include('user.include.footer')

    	</div>
    </div>

	<!-- initiate modal menu section-->
	@include('user.include.modalmenu')

	<!-- initiate scripts-->
	@include('user.include.script')
</body>
</html>
