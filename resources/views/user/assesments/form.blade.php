<form action="{{ $action }}" method="POST" enctype="multipart/form-data">
    @csrf
 
    <div class="card">
        <div class="card-body">
            <div class="row">

              
               

                <div class="col-md-6 col-xl-4">
                    <div class="form-group">
                        <h3><label>Description</label></h3><br>
                        <h5><b>{{$assessments[0]->assessment_desc}}</b></h5>
                    </div>
                </div>

                <div class="col-md-6 col-xl-6">
                    <div class="form-group">
                        <h3><label>Assessment Name</label></h3><br>
                        <h5><b>{{$assessments[0]->assessment_id}}</b></h5>
                    </div>
                </div>

                <div class="col-md-6 col-xl-2">
                    <div class="form-group">
                        <h5><label>Total Marks :</label>
                        <b>{{$assessments->COUNT()}}</b></h5>
                    </div>
                </div>
                <input type="hidden" name="total_marks" value="{{$assessments->COUNT()}}" class="form-control" required />
                
            
                <br><br><br><br><br><br>
                @foreach($assessments as $i =>$as)
                <div class="col-md-12">
                    <div class="form-group">
                        <b><label>Question {{$i+1}} :</label>
                        <label>{{$as->question}} :</label></b>
                        <input type="hidden" name="question[]" value="{{$as->question}}" class="form-control" required />
                    </div>
                </div>
             
                <div class="col-md-6 col-xl-6">
                    <div class="form-group">
                        <input type="checkbox" name="option{{$i}}[]" value="{{$as->op1}}"/>
                        <label>1: </label>&nbsp;&nbsp;&nbsp;{{$as->op1}}<br>
                        <input type="checkbox" name="option{{$i}}[]" value="{{$as->op2}}"/>
                        <label>2: </label>&nbsp;&nbsp;&nbsp;{{$as->op2}}
                      <br>
                        <input type="checkbox" name="option{{$i}}[]" value="{{$as->op3}}"/>
                        <label>3: </label>&nbsp;&nbsp;&nbsp;{{$as->op3}}
                        <br>
                        <input type="checkbox" name="option{{$i}}[]" value="{{$as->op4}}"/>
                        <label>4: </label>&nbsp;&nbsp;&nbsp;{{$as->op4}}
                        <br>
                        <input type="hidden" name="answer[]" value="{{$as->answer}}" class="form-control" required />
                       
                    </div>
                </div>
                @endforeach
                <input type="hidden" name="assesment_id" value="{{$assessments[0]->assessment_id}}" class="form-control" required />
               
            </div>    
            
            <hr style="background-color:black">
           
            <br>
            <br>
            <button class="btn btn-primary">Submit</button>
        </div>
    </div> 
</form>

@push('head')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css" integrity="sha512-aOG0c6nPNzGk+5zjwyJaoRUgCdOrfSDhmMID2u4+OIslr0GjpLKo7Xm0Ao3xmpM4T8AmIouRkqwj1nrdVsLKEQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<style>
    .select2-container--default .select2-selection--multiple .select2-selection__choice__display {
        cursor: default;
        padding-left: 20px;
        padding-right: 5px;
    }
</style>
@endpush

@push('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js" integrity="sha512-uto9mlQzrs59VwILcLiRYeLKPPbS/bT71da/OEBYEwcdNUk8jYIy+D176RYoop1Da+f9mvkYrmj5MCLZWEtQuA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script type="text/javascript">           
        
    $('input[type="checkbox"]').on('change', function() {
    $('input[name="' + this.name + '"]').not(this).prop('checked', false);
    // $('input[type="checkbox"]').not(this).prop('checked', false);
    }); 
    </script>
@endpush

