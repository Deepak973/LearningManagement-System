@extends('admin.layouts.main')
@section('title', 'Admin | Dashboard')
@section('content')
    <!-- push external head elements to head -->
    @push('head')

        <link rel="stylesheet" href="{{ url('dist/admin/plugins/weather-icons/css/weather-icons.min.css') }}">
        <link rel="stylesheet" href="{{ url('dist/admin/plugins/owl.carousel/dist/assets/owl.carousel.min.css') }}">
        <link rel="stylesheet" href="{{ url('dist/admin/plugins/owl.carousel/dist/assets/owl.theme.default.min.css') }}">
        <link rel="stylesheet" href="{{ url('dist/admin/plugins/chartist/dist/chartist.min.css') }}">
    @endpush

    <div class="container-fluid">
    	<div class="row">
    		<div class="col-xl-4 col-md-6">
                 <a href="{{ route('authusers.index') }}" class="d-block"> 
                    <div class="card card-yellow text-white">
                        <div class="card-block">
                            <div class="row align-items-center">
                                <div class="col-8">
                                    {{-- <h4 class="mb-0">{{ __($sports)}}</h4> --}}
                                     <p class="mb-0">{{ __('Users')}}</p> 
                                </div>
                                <div class="col-4 text-right">
                                    <i class="ik ik-users f-30"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-xl-4 col-md-6">
                <a href="{{ route('batches.index') }}" class="d-block">
                    <div class="card card-yellow text-white">
                        <div class="card-block">
                            <div class="row align-items-center">
                                <div class="col-8">
                                    {{-- <h4 class="mb-0">{{ __($banner)}}</h4> --}}
                                     <p class="mb-0">{{ __('Batches')}}</p>
                                </div>
                                <div class="col-4 text-right">
                                    <i class="ik ik-box f-30"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-xl-4 col-md-6">
                <a href="{{ route('courses.index') }}" class="d-block">
                    <div class="card card-blue text-white">
                        <div class="card-block">
                            <div class="row align-items-center">
                                <div class="col-8">
                                    {{-- <h4 class="mb-0">{{ __($users)}}</h4> --}}
                                    <p class="mb-0">{{ __('Courses')}}</p>
                                </div>
                                <div class="col-4 text-right">
                                    <i class="ik ik-book f-30"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-4 col-md-6">
                <a href="{{ route('trainingschedules.index') }}" class="d-block">
                    <div class="card card-blue text-white">
                        <div class="card-block">
                            <div class="row align-items-center">
                                <div class="col-8">
                                    {{-- <h4 class="mb-0">{{ __($skills)}}</h4> --}}
                                    <p class="mb-0">{{ __('Schedule Trainings')}}</p>
                                </div>
                                <div class="col-4 text-right">
                                    <i class="ik ik-clock f-30"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-xl-4 col-md-6">
                {{-- <a href="{{ route('offercode.index') }}" class="d-block"> --}}
                    <div class="card card-red text-white">
                        <div class="card-block">
                            <div class="row align-items-center">
                                <div class="col-8">
                                    {{-- <h4 class="mb-0">{{ __($offercodes)}}</h4> --}}
                                    <p class="mb-0">{{ __('Reports')}}</p>
                                </div>
                                <div class="col-4 text-right">
                                    <i class="ik ik-file f-30"></i>
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
