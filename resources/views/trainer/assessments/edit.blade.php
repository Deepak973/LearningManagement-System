@extends('trainer.layouts.main')
@section('title', 'Edit Assessments')
@section('content')
    <div class="container-fluid">
        <div class="page-header">
            <div class="row align-items-end">
                <div class="col-lg-8">
                    <div class="page-header-title">
                        <i class="ik ik-globe bg-blue"></i>
                        <div class="d-inline">
                            <h5>Edit Assemssment</h5>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <nav class="breadcrumb-container" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ route('trainer_dashboard') }}"><i class="ik ik-home"></i>&nbsp;</a>
                            </li>
                            <a href="{{ route('trainer_dashboard') }}">Dashboard</a> &nbsp;  / &nbsp;
                            <li class="breadcrumb-item active" aria-current="page">Edit Assemssment</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        {{-- {{dd($assessments[0]->assessment_id)}} --}}
        {{-- @include ("admin.include.message") --}}

                @include ("trainer.assessments.form", [ "type" => "edit", "action" => route("assessments.update", $assessments[0]->assessment_id) ])

    </div>
    <!-- push external js -->
    @push('script')
    <script src="{{ asset('js/alert.js')}}"></script>
    <script src="{{ asset('js/preview_image.js')}}"></script>
    <script type="text/javascript">
        
    </script>
    @endpush
@endsection
