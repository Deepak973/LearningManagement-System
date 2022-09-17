<form action="{{ $action }}" method="POST" enctype="multipart/form-data">
    @csrf
    @if($type == "edit")
    @method("PUT")
    @endif
    <div class="card">
        <div class="card-body">
            <div class="row">

               @if($type=="add")
                <div class="col-md-6 col-xl-4">
                    <div class="form-group">
                        <label>Batch Name</label>
                        <select class="form-control" id="all_batch" name="batch_name" required>
                            @foreach($batches as $item)
                                <option value="{{$item->id}}" >{{$item->name}}</option>
                            @endforeach
                        </select>
                        {{-- <input type="text" name="batch_id" value="{{ old('batch_id', $authusers->batch_id) }}" class="form-control" required /> --}}
                    </div>
                </div>

                <div class="col-md-6 col-xl-4">
                    <div class="form-group">
                        <label>Course Name</label>
                        <select class="form-control" id="all_course" name="course_name" required>
                        </select>
                        {{-- <input type="text" name="batch_id" value="{{ old('batch_id', $authusers->batch_id) }}" class="form-control" required /> --}}
                    </div>
                </div>

                <div class="col-md-6 col-xl-4">
                    <div class="form-group">
                        <label>Description</label>
                        <input type="text" name="desc" value="" class="form-control" required />
                    </div>
                </div>

                <div class="col-md-6 col-xl-4">
                    <div class="form-group">
                        <label>Assessment Name</label>
                        <input type="text" name="as_name" value="" class="form-control" required />
                    </div>
                </div>
                
                
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Question</label>
                        <input type="text" name="question[]" value="" class="form-control" required />
                    </div>
                </div>
             
                <div class="col-md-6 col-xl-6">
                    <div class="form-group">
                        <label>Option 1</label>
                        <input type="text" name="op1[]" value="" class="form-control" required />
                    </div>
                </div>
                <div class="col-md-6 col-xl-6">
                    <div class="form-group">
                        <label>Option 2</label>
                        <input type="text" name="op2[]" value="" class="form-control" required />
                    </div>
                </div>
                <div class="col-md-6 col-xl-6">
                    <div class="form-group">
                        <label>Option 3</label>
                        <input type="text" name="op3[]" value="" class="form-control" required />
                    </div>
                </div>
                <div class="col-md-6 col-xl-6">
                    <div class="form-group">
                        <label>Option 4</label>
                        <input type="text" name="op4[]" value="" class="form-control" required />
                    </div>
                </div>

                <div class="col-md-12 col-xl-12">
                    <div class="form-group">
                        <label>Answer</label>
                        <input type="text" name="answer[]" value=""  class="form-control" required />
                    </div>
                </div>
                @endif


             @if($type=="edit")
                
             @foreach($assessments as $i => $as)
                 <input type="hidden" value="{{$as->id}}" name="all_ids[]">
             @endforeach
                <div class="col-md-6 col-xl-4">
                    <div class="form-group">
                        <label>Batch Name</label>
                        <select class="form-control" id="all_batch" name="batch_name" required>
                            @foreach($batches as $item)
                                <option value="{{$item->id}}"  @if(in_array($item->id, $selectedbatch)) selected @endif >{{$item->name}}</option>
                            @endforeach
                        </select>
                        {{-- {{dd($selectedbatch)}} --}}
                        {{-- <input type="text" name="batch_id" value="{{ old('batch_id', $authusers->batch_id) }}" class="form-control" required /> --}}
                    </div>
                </div>

                <div class="col-md-6 col-xl-4">
                    <div class="form-group">
                        <label>Course Name</label>
                        <select class="form-control" id="all_course" name="course_name" required>
                            <option value="{{$assessments[0]->course_id}}" @if(in_array($item->id, $selectedcourse)) selected @endif>{{$assessments[0]->course_name}}</option>
                        </select>
                        {{-- <input type="text" name="batch_id" value="{{ old('batch_id', $authusers->batch_id) }}" class="form-control" required /> --}}
                    </div>
                </div>
               

                <div class="col-md-6 col-xl-4">
                    <div class="form-group">
                        <label>Description</label>
                        <input type="text" name="desc" value="{{ old('name', $assessments[0]->assessment_desc) }}" class="form-control" required />
                    </div>
                </div>

                <div class="col-md-6 col-xl-4">
                    <div class="form-group">
                        <label>Assessment Name</label>
                        <input type="text" name="assessment_id" value="{{ old('name', $assessments[0]->assessment_id) }}" class="form-control" required />
                        <input type="hidden" name="original_assessment_id" value="{{$assessments[0]->assessment_id }}" />
                    </div>
                </div>
                
                {{-- {{dd($assessments)}} --}}
                @foreach($assessments as $i => $as)
            <div class='row' id='originallist'>   
                <div class="col-md-12">
                    <div class="form-group">
                       <b> <label>Question {{$i+1}}</label></b>
                        <input type="text" name="question[]" value="{{ old('name', $as->question) }}" class="form-control" required />
                    </div>
                </div>
             
                <div class="col-md-6 col-xl-6">
                    <div class="form-group">
                        <label>Option 1</label>
                        <input type="text" name="op1[]" value="{{ old('name', $as->op1) }}" class="form-control" required />
                    </div>
                </div>
                <div class="col-md-6 col-xl-6">
                    <div class="form-group">
                        <label>Option 2</label>
                        <input type="text" name="op2[]" value="{{ old('name', $as->op2) }}" class="form-control" required />
                    </div>
                </div>
                <div class="col-md-6 col-xl-6">
                    <div class="form-group">
                        <label>Option 3</label>
                        <input type="text" name="op3[]" value="{{ old('name', $as->op3) }}" class="form-control" required />
                    </div>
                </div>
                <div class="col-md-6 col-xl-6">
                    <div class="form-group">
                        <label>Option 4</label>
                        <input type="text" name="op4[]" value="{{ old('name', $as->op4) }}" class="form-control" required />
                    </div>
                </div>

                <div class="col-md-12 col-xl-12">
                    <div class="form-group">
                        <label>Answer</label>
                        <input type="text" name="answer[]" value="{{ old('name', $as->answer) }}"  class="form-control" required />
                    </div>
                </div>
                <div class='col-md-2'> 
                    <div class='form-group'>
                         <input type='button' id='removeoriginal' value='remove'>
                    </div>    
                </div>
                <input type="hidden" value="{{$as->id}}" name="id[]">
            </div>
                @endforeach
                
             
                @endif
            </div>    
            
            <hr style="background-color:black">
            {{-- for extra fields --}}
                <div id="fieldList" class="row">
                    
                </div>
                <br>
               
            {{-- extra fields button --}}
            <input type="button" id="addMore" value="Add more fields">
            <br>
            <br>
            <button class="btn btn-primary">{{ $type == "add" ? "Create" : "Update" }}</button>
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


        $(document).ready(function () {
            
            $('#all_batch').on('change', function() {
                // alert(this.value);
                $.ajax({
                type:'POST',
                url:"{{ route('get_course') }}",
                data:{
                    "_token": "{{ csrf_token() }}",
                    'id':this.value,
                },
                    success:function(data){
                        $( "#all_course" ).empty();
                        $( "#all_course" ).append(data);
                    }
                });
            });        
           
        });

        
        
        $('#addMore').on( 'click',function() {           
             $("#fieldList").append("<div class='row' id='list'> <div class='col-md-12'> <div class='form-group'> <label>Question</label> <input type='text' name='question[]' class='form-control' required/> </div></div><div class='col-md-6 col-xl-6'> <div class='form-group'> <label>Option 1</label> <input type='text' name='op1[]' class='form-control' required/> </div></div><div class='col-md-6 col-xl-6'> <div class='form-group'> <label>Option 2</label> <input type='text' name='op2[]' class='form-control' required/> </div></div><div class='col-md-6 col-xl-6'> <div class='form-group'> <label>Option 3</label> <input type='text' name='op3[]' class='form-control' required/> </div></div><div class='col-md-6 col-xl-6'> <div class='form-group'><label>Option 4</label><input type='text' name='op4[]' class='form-control' required/></div></div><div class='col-md-10'> <div class='form-group'> <label>Answer</label> <input type='text' name='answer[]' class='form-control' required/> </div></div><div class='col-md-2'> <div class='form-group'> <input type='button' id='remove' value='remove'> </div></div></div>");
        }); 

        $(document).on("click", "#remove", function() {
            $(this).parents('#list').remove();
        }); 

        $(document).on("click", "#removeoriginal", function() {
            $(this).parents('#originallist').remove();
        }); 
           
        
        
    </script>
@endpush
