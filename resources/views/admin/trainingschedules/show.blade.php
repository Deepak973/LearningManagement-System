@extends('admin.layouts.main')
@section('title', 'View Courses')
@section('content')
    <!-- push external head elements to head -->
    @push('head')
    @endpush

    <div class="container-fluid">
        <div class="page-header">
            <div class="row align-items-end">
                <div class="col-lg-8">
                    <div class="page-header-title">
                        <i class="ik ik-clock bg-blue"></i>
                        <div class="d-inline">
                            <h5>View Trainings</h5>
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
                            <a href="{{ route('trainingschedules.index') }}">Course</a> &nbsp;  / &nbsp;
                            <li class="breadcrumb-item active" aria-current="page">Course Details</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <div class="my-3 text-right">
            <a href="{{ route('trainingschedules.edit', $trainingschedules->id) }}" class="btn btn-primary">
                <i class="ik ik-edit"></i>Edit Training Schedules
            </a>
        </div>
        {{-- @include ("admin.include.message") --}}
        <div class="card">
            <div class="card-body">
                
                <div class="row">
                    <div class="col-md-6 col-xl-4">
                        <div class="form-group">
                            <label>Training Id</label>
                            <div class="form-control bg-light py-2">{{ $trainingschedules->id }}</div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-4">
                        <div class="form-group">
                            <label>Batch Name</label>
                            <div class="form-control bg-light py-2">{{ $trainingschedules->batchname }}</div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-4">
                        <div class="form-group">
                            <label>Course Name</label>
                            <div class="form-control bg-light py-2">{{ $trainingschedules->name }}</div>
                        </div>
                    </div> 
                
                     
                    <div class="col-md-6 col-xl-4">
                        <div class="form-group">
                            <label>Training Date</label>
                            <div class="form-control bg-light py-2">{{ $trainingschedules->date }}</div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-4">
                        <div class="form-group">
                            <label>Start Time</label>
                            <div class="form-control bg-light py-2">{{ $trainingschedules->start_time }}</div>
                        </div>
                    </div>

                    <div class="col-md-6 col-xl-4">
                        <div class="form-group">
                            <label>End Time</label>
                            <div class="form-control bg-light py-2">{{ $trainingschedules->end_time }}</div>
                        </div>
                    </div>

                    <div class="col-md-6 col-xl-4">
                        <div class="form-group">
                            <label>Training Venue</label>
                            <div class="form-control bg-light py-2">{{ $trainingschedules->venue }}</div>
                        </div>
                    </div>

                    <div class="col-md-6 col-xl-4">
                        <div class="form-group">
                            <label>Trainer</label>
                            <div class="form-control bg-light py-2">{{ $trainingschedules->username }}</div>
                        </div>
                    </div>

                    <div class="col-md-6 col-xl-4">
                        <div class="form-group">
                            <label>Attendance Status</label>
                            <div class="form-control bg-light py-2">{{ $trainingschedules->attendance_status }}</div>
                        </div>
                    </div>
                </div>    
                    {{-- <div class="col-md-6 col-xl-4">
                        <div class="form-group">
                            <label>Batches</label>
                            @foreach($selectedbatch as $item)
                                <div class="form-control bg-light py-2">
                                    <div class="form-control bg-light py-2">{{ $item }}</div>
                                </div>
                            @endforeach               
                        </div>
                    </div> --}}

                    {{-- <div class="col-md-6 col-xl-4">
                     <div class="form-group">
                        <label>Batches</label>
                            @foreach($batches as $item)
                            <div class="form-control bg-light py-2">
                                <div class="form-control bg-light py-2">@if(in_array($item->id, $selectedbatch))
                                    {{$item->name}}
                                    @endif
                                </div>
                            </div>
                                
                            @endforeach
                       
                        {{-- <input type="text" name="batch_id" value="{{ old('batch_id', $authusers->batch_id) }}" class="form-control" required /> --}}
                      {{-- </div>
                    </div> --}} 
               
              
            </div>
        </div>
    </div>
@endsection
