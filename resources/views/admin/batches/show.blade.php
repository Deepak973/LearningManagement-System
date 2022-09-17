@extends('admin.layouts.main')
@section('title', 'View Batches')
@section('content')
    <!-- push external head elements to head -->
    @push('head')
    @endpush

    <div class="container-fluid">
        <div class="page-header">
            <div class="row align-items-end">
                <div class="col-lg-8">
                    <div class="page-header-title">
                        <i class="ik ik-box bg-blue"></i>
                        <div class="d-inline">
                            <h5>View Batches</h5>
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
                            <a href="{{ route('batches.index') }}">batch</a> &nbsp;  / &nbsp;
                            <li class="breadcrumb-item active" aria-current="page">Batch Details</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <div class="my-3 text-right">
            <a href="{{ route('batches.edit', $batches->id) }}" class="btn btn-primary">
                <i class="ik ik-edit"></i>Edit Bathces
            </a>
        </div>
        {{-- @include ("admin.include.message") --}}
        <div class="card">
            <div class="card-body">
                <div class="row">
                   
                    <div class="col-md-6 col-xl-4">
                        <div class="form-group">
                            <label>Name</label>
                            <div class="form-control bg-light py-2">{{ $batches->id }}</div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-4">
                        <div class="form-group">
                            <label>Email</label>
                            <div class="form-control bg-light py-2">{{ $batches->name }}</div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-4">
                        <div class="form-group">
                            <label>Address</label>
                            <div class="form-control bg-light py-2">{{ \Carbon\Carbon::parse($batches->date)->format('Y-m-d') }}</div>
                        </div>
                    </div>
                </div> 
                
                <div class="col-md-6 col-xl-4">
                    <div class="form-group">
                        <label>Courses</label>
                            @foreach($courses as $item)
                            @if(in_array($item->id, $selectedcourse))
                            <div class="form-control bg-light py-2">
                                
                                    {{$item->name}}
                                    
                            </div>
                            @endif
                                
                            @endforeach
                       
                        {{-- <input type="text" name="batch_id" value="{{ old('batch_id', $authusers->batch_id) }}" class="form-control" required /> --}}
                    </div>
                </div>    
              
            </div>
        </div>
    </div>
@endsection
