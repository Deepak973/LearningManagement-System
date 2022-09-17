<div class="app-sidebar colored">
    <div class="sidebar-header">
        <a class="header-brand" href="{{route('user_dashboard')}}">
            <div class="logo-img">
               <!-- <img height="30" src="{{ url('dist/admin/img/logo_white.png')}}" class="header-brand-img" title="RADMIN">  -->
            <h3 class="header-brand-img" style="text-overflow: ellipsis">LMS</h3>
            </div>
        </a>
        <div class="sidebar-action"><i class="ik ik-arrow-left-circle"></i></div>
        <button id="sidebarClose" class="nav-close"><i class="ik ik-x"></i></button>
    </div>

    @php
        $segment1 = request()->segment(1);
        $segment2 = request()->segment(2);
    @endphp

    <div class="sidebar-content">
        <div class="nav-container">
            <nav id="main-menu-navigation" class="navigation-main">
                <div class="nav-item {{ ($segment2 == 'dashboard') ? 'active' : '' }} ">
                    <a href="{{route('trainer_dashboard')}}"><i class="ik ik-bar-chart-2"></i><span>{{ __('Dashboard')}}</span></a>
                </div>
                <div class="nav-item {{ ($segment2 == 'sports') ? 'active' : '' }}">
                    <a href="{{route('show_trainer_trainings')}}"><i class="ik ik-calendar"></i><span>{{ __('Trainings')}}</span></a>
                </div>
                <div class="nav-item {{ ($segment2 == 'bannerimages') ? 'active' : '' }} ">
                    <a href="{{route('attendances.index')}}"><i class="ik ik-calendar"></i><span>{{ __('Attendance')}}</span></a>
                </div>
                <div class="nav-item {{ ($segment2 == 'contactus') ? 'active' : '' }}">
                    <a href="{{ route('assessments.index') }}"><i class="ik ik-globe"></i><span>{{ __('Assessments')}}</span></a>
                </div>
                
               
                <div class="nav-item {{ ($segment1 == 'dashboard') ? 'active' : '' }}">
                    <a href="{{ route('logout') }}"><i class="ik ik-power"></i>
                        <span>{{ __('Logout')}}</span>
                    </a>
                </div>
        </div>
    </div> 
</div>
