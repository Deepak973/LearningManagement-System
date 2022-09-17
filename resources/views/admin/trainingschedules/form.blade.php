<form action="{{ $action }}" method="POST" enctype="multipart/form-data">
    @csrf
    @if($type == "edit")
    @method("PUT")
    @endif
    <div class="card">
        <div class="card-body">
            <div class="row">
               
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
                        <label>Venue</label>
                        <input type="text" name="venue" value="{{ old('venue', $trainings->venue) }}" class="form-control" required />
                    </div>
                </div>
               
                <div class="col-md-6 col-xl-4">
                    <div class="form-group">
                        <label>Date</label>
                        <input type="date" name="date" value="{{ old('date', \Carbon\Carbon::parse($trainings->start_time)->format('Y-m-d')) }}" class="form-control" required />
                    </div>
                </div>

                <div class="col-md-6 col-xl-4">
                    <div class="form-group">
                        <label>Start Time</label>
                        <input type="time" name="start_time" value="{{ old('date', \Carbon\Carbon::parse($trainings->start_time)->format('Y-m-d')) }}" class="form-control" required />
                    </div>
                </div>

                <div class="col-md-6 col-xl-4">
                    <div class="form-group">
                        <label>End Time</label>
                        <input type="time" name="end_time" value="{{ old('date', \Carbon\Carbon::parse($trainings->end_time)->format('Y-m-d')) }}" class="form-control" required />
                    </div>
                </div>
                <div class="col-md-6 col-xl-4">
                    <div class="form-group">
                        <label>Trainer</label>
                        <select class="form-control"  name="trainer" required>
                            @foreach($trainer as $item)
                                <option value="{{$item->id}}">{{$item->username}}</option>
                            @endforeach
                        </select>
                        {{-- <input type="text" name="batch_id" value="{{ old('batch_id', $authusers->batch_id) }}" class="form-control" required /> --}}
                    </div>
                </div>
               
                {{-- @if($type == "edit")
                <div class="col-md-6 col-xl-12">
                    <div id="images_preview" class="d-flex flex-wrap form-group">
                        @foreach ($courses->pdfs as $pdf)
                            <div class="form-control bg-light py-2">
                                <a href="{{ asset($pdf->pdf) }}" target="_blank">{{$pdf->pdf}}</a>
                            </div>
                        @endforeach
                    </div>
                </div>
                @endif --}}
               
                
            </div>
            <br>
            <button class="btn btn-primary">{{ $type == "add" ? "Schedule" : "Update" }}</button>
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



            initSelect2();
            initDatepicker();

            function initSelect2 () {
                $("select").select2({
                    closeOnSelect: true,
                    placeholder: "Select",
                    tags: true,
                    allowHtml: true,
                    width: "100%",
                });
            }

            function initDatepicker () {
                $(".date_picker").datepicker({
                    dateFormat: "dd/mm/yy",
                    minDate: "+1D",
                });
            }
           
            // document.getElementById("images").addEventListener("change", function (event) {
            //     var preview = document.getElementById("images_preview");
            //     preview.innerHTML = "";
            //     var files = event.target.files;
                
            //     for (let i=0; i<files.length; i++) {
            //         let file = files[i];
                    
            //         var imgDiv = document.createElement("div");
            //         imgDiv.classList.add("position-relative", "shadow", "border", "mr-2");
            //         imgDiv.style.marginTop = '5px';
            //         preview.appendChild(imgDiv);
                    
            //         var img = document.createElement("a");
            //         img.href = URL.createObjectURL(file);
            //         imgDiv.appendChild(img);
            //     }
            // });
           
        });
    </script>
@endpush
