@extends('admin.layouts.main')
@section('title', 'Edit User')
@section('content')
    <div class="container-fluid">
        <div class="page-header">
            <div class="row align-items-end">
                <div class="col-lg-8">
                    <div class="page-header-title">
                        <i class="ik ik-users bg-blue"></i>
                        <div class="d-inline">
                            <h5>Edit Batch</h5>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <nav class="breadcrumb-container" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ route('admin_dashboard') }}"><i class="ik ik-home"></i>&nbsp;</a>
                            </li>
                            <a href="{{ route('admin_dashboard') }}">Dashboard</a> &nbsp;  / &nbsp;
                            <li class="breadcrumb-item active" aria-current="page">Edit Batch</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        {{-- @include ("admin.include.message") --}}

                @include ("admin.authuser.form", [ "type" => "edit", "action" => route("authusers.update", $authusers->id) ])

    </div>
    <!-- push external js -->
    @push('script')
    <script src="{{ asset('js/alert.js')}}"></script>
    <script src="{{ asset('js/preview_image.js')}}"></script>
    <script type="text/javascript">
        
    </script>
    @endpush
@endsection
