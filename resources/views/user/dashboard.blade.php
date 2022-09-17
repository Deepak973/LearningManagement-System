@extends('user.layouts.main')
@section('title', 'User | Dashboard')
@section('content')
    <!-- push external head elements to head -->
    @push('head')

        <link rel="stylesheet" href="{{ url('dist/admin/plugins/weather-icons/css/weather-icons.min.css') }}">
        <link rel="stylesheet" href="{{ url('dist/admin/plugins/owl.carousel/dist/assets/owl.carousel.min.css') }}">
        <link rel="stylesheet" href="{{ url('dist/admin/plugins/owl.carousel/dist/assets/owl.theme.default.min.css') }}">
        <link rel="stylesheet" href="{{ url('dist/admin/plugins/chartist/dist/chartist.min.css') }}">
    @endpush
   {{-- {{dd(session('user'))}} --}}
    <div class="container-fluid">
    	<div class="row">
    		<div class="col-xl-4 col-md-6">
                 <a href="{{ route('showcourse') }}" class="d-block"> 
                    <div class="card card-yellow text-white">
                        <div class="card-block">
                            <div class="row align-items-center">
                                <div class="col-8">
                                    {{-- <h4 class="mb-0">{{ __($sports)}}</h4> --}}
                                     <p class="mb-0">{{ __('Courses')}}</p> 
                                </div>
                                <div class="col-4 text-right">
                                    <i class="ik ik-book     f-30"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-xl-4 col-md-6">
                <a href="{{ route('show_user_trainings') }}" class="d-block">
                    <div class="card card-yellow text-white">
                        <div class="card-block">
                            <div class="row align-items-center">
                                <div class="col-8">
                                    {{-- <h4 class="mb-0">{{ __($banner)}}</h4> --}}
                                     <p class="mb-0">{{ __('Trainings')}}</p>
                                </div>
                                <div class="col-4 text-right">
                                    <i class="ik ik-calendar f-30"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-xl-4 col-md-6">
                <a href="{{ route('show_trainee_attendance') }}" class="d-block">
                    <div class="card card-blue text-white">
                        <div class="card-block">
                            <div class="row align-items-center">
                                <div class="col-8">
                                    {{-- <h4 class="mb-0">{{ __($users)}}</h4> --}}
                                    <p class="mb-0">{{ __('Attendance')}}</p>
                                </div>
                                <div class="col-4 text-right">
                                    <i class="ik ik-clipboard f-30"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-4 col-md-6">
                <a href="{{ route('show_trainee_assessments') }}" class="d-block">
                    <div class="card card-green text-white">
                        <div class="card-block">
                            <div class="row align-items-center">
                                <div class="col-8">
                                    {{-- <h4 class="mb-0">{{ __($amenities)}}</h4> --}}
                                     <p class="mb-0">{{ __('Assessments')}}</p>
                                </div>
                                <div class="col-4 text-right">
                                    <i class="ik ik-globe f-30"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-xl-4 col-md-6">
                <a href="{{ route('show_trainee_marks') }}" class="d-block">
                    <div class="card card-red text-white">
                        <div class="card-block">
                            <div class="row align-items-center">
                                <div class="col-8">
                                    {{-- <h4 class="mb-0">{{ __($offercodes)}}</h4> --}}
                                    <p class="mb-0">{{ __('Assessments Result')}}</p>
                                </div>
                                <div class="col-4 text-right">
                                    <i class="ik ik-send f-30"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        
        
          
        </div>
        
       
        
    </div>
	<!-- push external js -->
    @push('script')
        <script src="{{ url('dist/admin/plugins/owl.carousel/dist/owl.carousel.min.js') }}"></script>
        <script src="{{ url('dist/admin/plugins/chartist/dist/chartist.min.js') }}"></script>
        <script src="{{ url('dist/admin/plugins/flot-charts/jquery.flot.js') }}"></script>
        <!-- <script src="{{ url('dist/admin/plugins/flot-charts/jquery.flot.categories.js') }}"></script> -->
        <script src="{{ url('dist/admin/plugins/flot-charts/curvedLines.js') }}"></script>
        <script src="{{ url('dist/admin/plugins/flot-charts/jquery.flot.tooltip.min.js') }}"></script>

        <script src="{{ url('dist/admin/plugins/amcharts/amcharts.js') }}"></script>
        <script src="{{ url('dist/admin/plugins/amcharts/serial.js') }}"></script>
        <script src="{{ url('dist/admin/plugins/amcharts/themes/light.js') }}"></script>


        <script src="{{ url('dist/admin/js/widget-statistic.js') }}"></script>
        <script src="{{ url('dist/admin/js/widget-data.js') }}"></script>
        <script src="{{ url('dist/admin/js/dashboard-charts.js') }}"></script>

    @endpush    
@endsection
