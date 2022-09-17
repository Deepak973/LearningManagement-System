@extends('user.layouts.main')
@section('title', 'Assessments')
@section('content')
    <!-- push external head elements to head -->
    @push('head')
    @endpush

    <div class="container-fluid">
        <div class="page-header">
            <div class="row align-items-end">
                <div class="col-lg-8">
                    <div class="page-header-title">
                        <i class="ik ik-globe bg-blue"></i>
                        <div class="d-inline">
                            <h5>Assessments</h5>
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
                            <li class="breadcrumb-item active" aria-current="page">Assessments</li>
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
                                <h4><strong>Assessments</strong></h4>
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <div id="simpletable_filter" class="dataTables_filter">
                                  
                                </div>
                            </div>
                        </div>
                        <hr>
                        @if($assessments->count() > 0)
                            <table id="simpletable" class="table table-striped table-bordered nowrap dataTable" role="grid" aria-describedby="simpletable_info">
                                <thead>
                                    <th class="sorting_asc" width="5%" tabindex="0" aria-controls="simpletable">Sr.</th>
                                    <th class="sorting" width="5%" tabindex="0" aria-controls="simpletable">Course Name</th>
                                    <th class="sorting" width="5%" tabindex="0" aria-controls="simpletable">Assessment Name</th>
                                    <th class="sorting" width="5%" tabindex="0" aria-controls="simpletable">Total Marks</th>
                                    <th class="sorting" width="5%" tabindex="0" aria-controls="simpletable">Obtained Marks</th>

                                </thead>
                                <tbody>
                    
                                    @foreach ($assessments as $index => $as)
                                  
                                    <tr>
                                        
                                        
                                        <td class="align-top">{{$index+1}}</td>
                                        <td class="align-top">{{$as->name}}</td>
                                        <td class="align-top">{{$as->assessment_id}}</td>
                                        <td class="align-top">{{$as->total_marks}}</td>
                                        <td class="align-top">{{$as->obtained_marks}}</td>

                                        

                            
                                      
                                    </tr>
                                    @endforeach
                                </tbody>
                                
                            </table>
                        @else
                            No Assessments Marks
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
           
        });
    </script>
    @endpush
@endsection
