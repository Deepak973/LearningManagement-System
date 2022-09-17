@extends('admin.layouts.main')
@section('title', 'View User')
@section('content')
    <!-- push external head elements to head -->
    @push('head')
    @endpush

    <div class="container-fluid">
        <div class="page-header">
            <div class="row align-items-end">
                <div class="col-lg-8">
                    <div class="page-header-title">
                        <i class="ik ik-users bg-blue"></i>
                        <div class="d-inline">
                            <h5>View Users</h5>
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
                            <a href="{{ route('authusers.index') }}">User</a> &nbsp;  / &nbsp;
                            <li class="breadcrumb-item active" aria-current="page">User Details</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <div class="my-3 text-right">
            <a href="{{ route('authusers.edit', $authusers->id) }}" class="btn btn-primary">
                <i class="ik ik-edit"></i>Edit User
            </a>
        </div>
        {{-- @include ("admin.include.message") --}}
        <div class="card">
            <div class="card-body">
                <div class="row">
                   
                    <div class="col-md-6 col-xl-4">
                        <div class="form-group">
                            <label></label>
                            
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-4">
                        <div class="form-group">
                            <label></label>
                            <div class="form-control bg-light py-2"><img src="{{ asset($users->profile_pic) }}" height="150px" width="255px"></div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-4">
                        <div class="form-group">
                            <label></label>
                        </div>
                    </div>
                    
                </div> 
                <div class="row">
                   
                    <div class="col-md-6 col-xl-4">
                        <div class="form-group">
                            <label>User Name</label>
                            <div class="form-control bg-light py-2">{{ $users->username }}</div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-4">
                        <div class="form-group">
                            <label>Email</label>
                            <div class="form-control bg-light py-2">{{ $users->email }}</div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-4">
                        <div class="form-group">
                            <label>Gender</label>
                            <div class="form-control bg-light py-2">{{ $users->gender }}</div>
                        </div>
                    </div>
                </div>    
                
                <div class="row">
                   
                    <div class="col-md-6 col-xl-4">
                        <div class="form-group">
                            <label>Phone No</label>
                            <div class="form-control bg-light py-2">{{ $users->phone_no }}</div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-4">
                        <div class="form-group">
                            <label>Address</label>
                            <div class="form-control bg-light py-2">{{ $users->address }}</div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-4">
                        <div class="form-group">
                            <label>user Type</label>
                            <div class="form-control bg-light py-2">{{ $users->user_type }}</div>
                        </div>
                    </div>
                </div> 
                 
                <div class="row">
                   
                    <div class="col-md-6 col-xl-4">
                        <div class="form-group">
                            <label>Status</label>
                            <div class="form-control bg-light py-2">{{ $users->status }}</div>
                        </div>
                    </div>
                    {{-- <div class="col-md-6 col-xl-4">
                        <div class="form-group">
                            <label>Profile Pic</label>
                            <div class="form-control bg-light py-2"><img src="{{ asset($users->profile_pic) }}"></div>
                        </div>
                    </div> --}}
                    <div class="col-md-6 col-xl-4">
                        <div class="form-group">
                            <label>Batch Id</label>
                            <div class="form-control bg-light py-2">{{ $users->batch_id }}</div>
                        </div>
                    </div>
                </div> 

            </div>
        </div>
    </div>
@endsection
