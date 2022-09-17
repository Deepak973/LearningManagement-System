@extends('user.layouts.main')
@section('title', 'Attendance')
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
                            <h5>Users</h5>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <nav class="breadcrumb-container" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ route('user_dashboard') }}"><i class="ik ik-home"></i>&nbsp;</a>
                            </li>
                            <a href="{{ route('user_dashboard') }}">Dashboard</a> &nbsp;  / &nbsp;
                            <li class="breadcrumb-item active" aria-current="page">Attendance</li>
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
                            <div class="col-md-6">
                                <h4><strong>Attendance</strong></h4>
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
                        @if($total_trainings->count() > 0)
                            <table id="simpletable" class="table table-striped table-bordered nowrap dataTable" role="grid" aria-describedby="simpletable_info">
                                <thead>
                                    
                                    <th class="sorting" width="5%" tabindex="0" aria-controls="simpletable">Course Name</th>
                                    <th class="sorting" width="5%" tabindex="0" aria-controls="simpletable">Total Sessions</th>
                                    <th class="sorting" width="5%" tabindex="0" aria-controls="simpletable">Attended Sessions</th>
                                    <th class="sorting" width="5%" tabindex="0" aria-controls="simpletable">Total Percentage</th>
                                </thead>
                                <tbody>
                                    {{-- {{ dd($data) }} --}}
                                     @foreach ($total_trainings as $t)  {{--css-1, html-5 ,js-1 --}}
                                    @foreach ($attended_trainings as $at)  {{--css-1, html-4, --}}
                                    @if($t->name==$at->name)
                                    <tr>
                                        <input type="hidden" value="{{ $perc =number_format(round(($at->total_count/$t->total_count)*100),2)}}">
                                        <td class="align-top" >{{ $t->name}}</td>
                                        <td class="align-top" align="center">{{ $t->total_count}}</td>
                                        <td class="align-top" align="center">{{ $at->total_count}}</td>
                                        <td class="align-top"align="center" @if ($perc<60) bgcolor="red"
                                                              @else bgcolor="lightgreen"
                                            
                                        @endif>{{$perc}} %</td>
                                        
                                        
                                       
                                        
                                    </tr>
                                    {{-- @elseif($t->total_count>0 $at->total_count)
                                   
                                    
                                    <tr>

                                        
                                        <td class="align-top" >{{ $t->name}} </td>
                                        <td class="align-top" align="center">{{ $t->total_count}}</td>
                                        <td class="align-top" align="center">0</td>
                                        <td class="align-top" align="center" bgcolor="#ff4d4d">0 %</td>
                                        
                                       
                                        
                                    <tr> --}}

                                    @endif
                                    @endforeach
                                    @endforeach

                                   
                                </tbody>
                                
                            </table>
                        @else
                            No Attendance marked
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
