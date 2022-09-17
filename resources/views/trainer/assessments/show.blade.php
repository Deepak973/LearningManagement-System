@extends('trainer.layouts.main')
@section('title', 'View Assessments')
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
                            <h5>View Assessments</h5>
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
                            <a href="{{ route('assessments.index') }}">Assessments</a> &nbsp;  / &nbsp;
                            <li class="breadcrumb-item active" aria-current="page">details</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <div class="my-3 text-right">
            <a href="{{ route('assessments.edit', $assessments[0]->assessment_id) }}" class="btn btn-primary">
                <i class="ik ik-edit"></i>Edit Assessment
            </a>
        </div>
        {{-- @include ("admin.include.message") --}}

        <div class="card">
            <div class="card-body">
                <div class="row">

                    <div class="col-md-10" >
                        <div class="form-group" style="font-size: 15pt;">
                           <b> <label>Assessment Description :</label>
                            {{ $assessments[0]->assessment_desc }}</b>
                        </div>
                    </div>

                    <div class="col-md-2">
                        <div class="form-group"  style="font-size: 15pt;">
                            <b><label>Total Marks:</label>
                            {{ $assessments->count() }}</b>
                        </div>
                    </div>

                </div>  

                @foreach($assessments as $index => $as)
                <div class="row">
                    <div class="col-md-12" style="font-size: 15pt;">
                        <div class="form-group">
                            <b><label>Question {{$index+1}}</label>
                             {{ $as->question }}</b>
                        </div>
                    </div>
                </div>    

                <div class="row">
                    <div class="col-md-12" style="font-size: 13pt;">
                        <div class="form-group">
                            Option 1 :  {{ $as->op1 }}
                        </div>
                    </div> 
                </div>  
                
                <div class="row">
                    <div class="col-md-12" style="font-size: 13pt;">
                        <div class="form-group">
                            Option 2 :  {{ $as->op2 }}
                        </div>
                    </div> 
                </div> 
                
                <div class="row">
                    <div class="col-md-12" style="font-size: 13pt;">
                        <div class="form-group">
                            Option 3 :  {{ $as->op3 }}
                        </div>
                    </div> 
                </div>    

                <div class="row">
                    <div class="col-md-12" style="font-size: 13pt;">
                        <div class="form-group">
                            Option 4 :  {{ $as->op4 }}
                        </div>
                    </div> 
                </div> 

                <div class="row">
                    <div class="col-md-12" style="font-size: 13pt;">
                        <div class="form-group">
                            Answer :  {{ $as->answer }}
                        </div>
                    </div> 
                </div> 
                <hr>
                @endforeach
                   
    
                   
              
                        
                    </div>
                    <br>
                       
                    {{-- <div class="mb-3">
                        <input type="button" class="btn btn-success btn-sm btn-add-close-ground-item"  value="add">
                    </div>  
    
                    <div id="accordion_close"></div> --}}
                   
                    
            
            </div>
        </div> 


    </div>
@endsection
