<meta charset="utf-8">
<meta http-equiv="x-ua-compatible" content="ie=edge">
<meta name="description" content="">
<meta name="keywords" content="">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="csrf-token" content="{{ csrf_token() }}" />

<link rel="icon" href="{{ url('dist/admin/favicon.png')}}" />

<!-- font awesome library -->
<link href="https://fonts.googleapis.com/css?family=Nunito+Sans:300,400,600,700,800" rel="stylesheet">

<script src="{{ url('dist/admin/js/app.js') }}"></script>

<!-- themekit admin template asstes -->
<link rel="stylesheet" href="{{ url('dist/admin/all.css') }}">
<link rel="stylesheet" href="{{ url('dist/admin/dist/css/theme.css') }}">
<link rel="stylesheet" href="{{ url('dist/admin/plugins/fontawesome-free/css/all.min.css') }}">
<link rel="stylesheet" href="{{ url('dist/admin/plugins/icon-kit/dist/css/iconkit.min.css') }}">
<link rel="stylesheet" href="{{ url('dist/admin/plugins/ionicons/dist/css/ionicons.min.css') }}">


<link rel="stylesheet" href="{{ url('dist/admin/plugins/weather-icons/css/weather-icons.min.css') }}">
<link rel="stylesheet" href="{{ url('dist/admin/plugins/owl.carousel/dist/assets/owl.carousel.min.css') }}">
<link rel="stylesheet" href="{{ url('dist/admin/plugins/owl.carousel/dist/assets/owl.theme.default.min.css') }}">

<!--datatbale -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.css">

<!-- swelect 2 -->
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

<!-- swelect 2 -->
<link rel="stylesheet" href="{{ url('dist/admin/plugins/chartist/dist/chartist.min.css') }}">

 <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
<!-- Stack array for including inline css or head elements -->
@stack('head')

<link rel="stylesheet" href="{{ url('dist/admin/css/style.css') }}">

<link href="{{ asset('assets/css/styles.css') }}" rel="stylesheet">

