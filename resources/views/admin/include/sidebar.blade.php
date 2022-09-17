<div class="app-sidebar colored">
    <div class="sidebar-header">
        <a class="header-brand" href="">
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
                    <a href="{{route('admin_dashboard')}}"><i class="ik ik-bar-chart-2"></i><span>{{ __('Dashboard')}}</span></a>
                </div>
                <div class="nav-item {{ ($segment2 == 'sports') ? 'active' : '' }}">
                    <a href="{{route('authusers.index')}}"><i class="ik ik-users"></i><span>{{ __('Users')}}</span></a>
                </div>
                <div class="nav-item {{ ($segment2 == 'bannerimages') ? 'active' : '' }} ">
                    <a href="{{route('batches.index')}}"><i class="ik ik-box"></i><span>{{ __('Batches')}}</span></a>
                </div>
                <div class="nav-item {{ ($segment2 == 'contactus') ? 'active' : '' }}">
                    <a href="{{route('courses.index')}}"><i class="ik ik-book"></i><span>{{ __('Courses')}}</span></a>
                </div>
            
                <div class="nav-item {{ ($segment2 == 'users') ? 'active' : '' }}">
                    <a href="{{route('trainingschedules.index')}}"><i class="ik ik-clock"></i><span>{{ __('Schedule Trainings')}}</span></a>
                </div>
                <div class="nav-item {{ ($segment2 == 'amenities') ? 'active' : '' }}">
                    <a href=""><i class="ik ik-file"></i><span>{{ __('Reports')}}</span></a>
                </div>
                
                
               
                <div class="nav-item {{ ($segment1 == 'dashboard') ? 'active' : '' }}">
                    <a href="{{ route('logout') }}"><i class="ik ik-power"></i>
                        <span>{{ __('Logout')}}</span>
                    </a>
                </div>
        </div>
    </div> 
</div>


