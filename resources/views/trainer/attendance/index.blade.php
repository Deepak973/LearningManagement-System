@extends('trainer.layouts.main')
@section('title', 'Trainings')
@section('content')
    <!-- push external head elements to head -->
    @push('head')
    @endpush

    <div class="container-fluid">
        <div class="page-header">
            <div class="row align-items-end">
                <div class="col-lg-8">
                    <div class="page-header-title">
                        <i class="ik ik-clipboard bg-blue"></i>
                        <div class="d-inline">
                            <h5>Mark Attendance</h5>
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
                            <li class="breadcrumb-item active" aria-current="page">Attendance</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
@include ("admin.include.message")
        <div class="card">
            <div class="card-body">
                <div class="dt-responsive">
                    <div id="simpletable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                        <div class="row">
                            <div class="col-md-6">
                                <h4><strong>Todays Trainings</strong></h4>
                            </div>
                            <div class="col-sm-12 col-md-6">
                                {{-- <div id="simpletable_filter" class="dataTables_filter">
                                    <a href="{{ route('courses.create') }}" class="btn btn-primary">
                                        <i class="ik ik-plus"></i>Add Course
                                    </a>
                                </div> --}}
                            </div>
                        </div>
                        <hr>
                        

                        @if($todaystrainings->count() > 0)
                            <table id="" class="table table-striped table-bordered nowrap " role="grid" aria-describedby="simpletable_info">
                                <thead>
                                    <th class="sorting" width="5%" tabindex="0" aria-controls="simpletable">Batch Name</th>
                                    <th class="sorting" width="5%" tabindex="0" aria-controls="simpletable">Course Name</th>
                                    <th class="sorting" width="5%" tabindex="0" aria-controls="simpletable">Training Date</th>
                                    <th class="sorting" width="5%" tabindex="0" aria-controls="simpletable">Timings</th>
                                    <th class="sorting" width="5%" tabindex="0" aria-controls="simpletable">Mark Attendance</th>
                                    
                                    
                                </thead>
                                <tbody>

                                    @foreach ($todaystrainings as $ts)
                                    <tr>
                                        
                                        <td class="align-top">{{ $ts->batch_name }}</td>
                                        <td class="align-top">{{ $ts->name }}</td>
                                        <td class="align-top">{{ \Carbon\Carbon::parse($ts->date)->format('d-m-Y') }}</td>
                                        <td class="align-top">{{ $ts->start_time }} To {{$ts->end_time}}</td>
                                        @if($ts->attendance_status=="pending")
                                            <td class="align-top ">
                                                
                                                <center><a href="{{ route('show_trainee_list',[ 'batch' => $ts->batch_id , 'id'  => $ts->id] ) }}">
                                                    <i class="ik ik-eye f-16 mr-15 text-green"></i>
                                                </a>   </center>
                                            </td>

                                        @else
                                            <td class="align-top" >
                                                Attendance marked
                                            </td>
                                           
                                        @endif
                                       
                                        
                                        
                                    </tr>
                                    @endforeach
                                </tbody>
                                
                            </table>
                        @else
                          No Trainings for today
                        @endif
                    </div>
                </div>
            </div>
        </div>
        {{-- @include ("admin.include.message") --}}

        <div class="card">
            <div class="card-body">
                <div class="dt-responsive">
                    <div id="simpletable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                        <div class="row">
                            <div class="col-md-6">
                                <h4><strong>Previous Trainings</strong></h4>
                            </div>
                            <div class="col-sm-12 col-md-6">
                                {{-- <div id="simpletable_filter" class="dataTables_filter">
                                    <a href="{{ route('courses.create') }}" class="btn btn-primary">
                                        <i class="ik ik-plus"></i>Add Course
                                    </a>
                                </div> --}}
                            </div>
                        </div>
                        <hr>
                        

                        @if($previoustrainings->count() > 0)
                            <table id="simpletable1" class="table table-striped table-bordered nowrap dataTable" role="grid" aria-describedby="simpletable_info">
                                <thead>
                                    <th class="sorting" width="5%" tabindex="0" aria-controls="simpletable">Batch Name</th>
                                    <th class="sorting" width="5%" tabindex="0" aria-controls="simpletable">Course Name</th>
                                    <th class="sorting" width="5%" tabindex="0" aria-controls="simpletable">Training Date</th>
                                    <th class="sorting" width="5%" tabindex="0" aria-controls="simpletable">Timings</th>
                                    <th class="sorting" width="5%" tabindex="0" aria-controls="simpletable">Mark Attendance</th>
                                </thead>
                                <tbody>
                                    {{-- {{ dd($data) }} --}}
                                    @foreach ($previoustrainings as $ts)
                                    <tr>
                                        <td class="align-top">{{ $ts->batch_name }}</td>
                                        <td class="align-top">{{ $ts->name }}</td>
                                        <td class="align-top">{{ \Carbon\Carbon::parse($ts->date)->format('d-m-Y') }}</td>
                                        <td class="align-top">{{ $ts->start_time}} To {{$ts->end_time}}</td>
                                        
                                        @if($ts->attendance_status=="pending")
                                            <td class="align-top ">
                                                
                                                <center><a href="{{ route('show_trainee_list',[ 'batch' => $ts->batch_id , 'id'  => $ts->id] ) }}">
                                                    <i class="ik ik-eye f-16 mr-15 text-green"></i>
                                                </a>   </center>
                                            </td>

                                        @else
                                            <td class="align-top" >
                                                Attendance marked
                                            </td>
                                           
                                        @endif
                                       
                                        
                                        
                                        
                                    </tr>
                                    @endforeach
                                </tbody>
                                
                            </table>
                        @else
                            Currently no Trainings
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- push external js -->
    @push('script')
    <script src="{{ asset('js/alert.js')}}"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('#simpletable').dataTable( {
            } );

            $('#simpletable1').dataTable( {
            } );
            $(".btn-delete").bind("click", function (event) {
                event.preventDefault();
                var _this = $(this); 
                swal({
                    title: 'Are you sure?',
                    text: 'This User will be permanently deleted!',
                    icon: 'warning',
                    buttons: ["Cancel", "Yes"],
                }).then(function (value) {
                    if (value) {
                        _this.parents("form").submit();
                    }
                });
            });
        });
    </script>
    @endpush
@endsection
