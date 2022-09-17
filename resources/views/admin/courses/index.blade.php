@extends('admin.layouts.main')
@section('title', 'Manage Courses')
@section('content')
    <!-- push external head elements to head -->
    @push('head')
    @endpush

    <div class="container-fluid">
        <div class="page-header">
            <div class="row align-items-end">
                <div class="col-lg-8">
                    <div class="page-header-title">
                        <i class="ik ik-book bg-blue"></i>
                        <div class="d-inline">
                            <h5>Courses</h5>
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
                            <li class="breadcrumb-item active" aria-current="page">Courses</li>
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
                                <h4><strong>courses</strong></h4>
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <div id="simpletable_filter" class="dataTables_filter">
                                    <a href="{{ route('courses.create') }}" class="btn btn-primary">
                                        <i class="ik ik-plus"></i>Add Course
                                    </a>
                                </div>
                            </div>
                        </div>
                        <hr>
                        @if($courses->count() > 0)
                            <table id="simpletable" class="table table-striped table-bordered nowrap dataTable" role="grid" aria-describedby="simpletable_info">
                                <thead>
                                    <th class="sorting_asc" width="5%" tabindex="0" aria-controls="simpletable">Sr.</th>
                                    <th class="sorting" width="5%" tabindex="0" aria-controls="simpletable">Course Id</th>
                                    <th class="sorting" width="5%" tabindex="0" aria-controls="simpletable">Course Name</th>
                                    <th class="sorting" width="5%" tabindex="0" aria-controls="simpletable">Status</th>
                                    <th class="sorting" width="5%" tabindex="0" aria-controls="simpletable">Action</th>
                                </thead>
                                <tbody>
                                    @foreach ($courses as $index => $course)
                                    <tr>
                                        <td class="align-top">{{ $index + 1 }}</td>
                                        <td class="align-top">{{ $course->id }}</td>
                                        <td class="align-top">{{ $course->name}}</td>
                                        <td class="align-top">{{ $course->status }}</td>
                                        <td class="align-top">
                                            <form action="{{ route('courses.destroy', [ 'course' => $course->id ]) }}" method="POST">
                                                @csrf
                                                @method("DELETE")
                                                <a href="{{ route('courses.show', $course->id) }}">
                                                    <i class="ik ik-eye f-16 mr-15 text-green"></i>
                                                </a>
                                                <a href="{{ route('courses.edit', $course->id) }}">
                                                    <i class="ik ik-edit f-16 mr-15 text-blue"></i>
                                                </a>
                                                <a href="#" class="btn-delete">
                                                    <i class="ik ik-trash-2 f-16 text-red"></i>
                                                </a>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                
                            </table>
                        @else
                            No Courses added
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
