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
                            <h5>Trainings</h5>
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
                            <a href="{{ route('attendances.index') }}">Attendance</a> &nbsp;  / &nbsp;
                            <li class="breadcrumb-item active" aria-current="page">Mark Attendance</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>

        
        {{-- @include ("admin.include.message") --}}

        <div class="card">
            <div class="card-body">
                <div class="dt-responsive">
                    <div id="simpletable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                        <div class="row">
                            <div class="col-md-12">
                                <center><h4><strong>Mark Attendance</strong></h4></center>
                            </div>
                           
                        </div>
                        <hr>
                        

                        @if($traineelist->count() > 0)
                        <form action="{{ route('attendances.store') }}" method="POST">
                            @csrf
                        <input type="hidden" value="{{$training_schedule_id}}" name="training_schedule_id">
                            <table id="simpletable1" class="table table-striped table-bordered nowrap dataTable" role="grid" aria-describedby="simpletable_info">
                                <thead>
                                    <th class="sorting" width="1%" tabindex="0" aria-controls="simpletable">Id</th>
                                    <th class="sorting" width="1%" tabindex="0" aria-controls="simpletable">Trainee Image</th>
                                    <th class="sorting" width="5%" tabindex="0" aria-controls="simpletable">Trainee Name</th>
                                    <th class="sorting" width="5%" tabindex="0" aria-controls="simpletable">Email Id</th>
                                    <th class="sorting" width="1%" tabindex="0" aria-controls="simpletable">Attendance</th>
                                  
                                </thead>
                                
                                <tbody>
                                    
                                    @foreach ($traineelist as $tl)
                                    <tr>
                                        <td class="align-top">{{ $tl->id }}</td>
                                        <td class="align-top"><img src="{{ asset($tl->profile_pic) }}" style="height: 100px"></td>
                                        <td class="align-top">{{ $tl->username }}</td>
                                        <td class="align-top">{{ $tl->email }}</td>
                                        <td><input type="checkbox" name="attendance[]" value="{{$tl->id}}"></td>
                                                       
                                    </tr>
                                    @endforeach

                                   
                                   
                                </tbody>
                               
                                
                            </table>
                            <input type="submit" value="submit">
                        </form>
                               
                        @else
                            Currently no Trainers in this batch
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
