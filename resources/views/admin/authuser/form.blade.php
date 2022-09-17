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
                        <label>Email id</label>
                        <input type="Email" name="email" value="{{ old('email', $authusers->email) }}" class="form-control" required />
                    </div>
                </div>
                <div class="col-md-6 col-xl-4">
                    <div class="form-group">
                        <label>User Type</label>
                        <select name="user_type" placeholder="{{$authusers->user_type}}">
                         {{-- <option value="{{ old('user_type', $authusers->user_type) }}">{{$authusers->user_type}}</option> --}}
                        <option>{{$authusers->user_type}}</option>
                        <option value="Trainer">Trainer</option>
                        <option value="Trainee">Trainee</option>
                        </select>
                        {{-- <input type="text" name="user_type" value="{{ old('user_type', $authusers->user_type) }}" class="form-control" required /> --}}
                    </div>
                </div>
                <div class="col-md-6 col-xl-4">
                    <div class="form-group">
                        <label>Batch Id</label>
                        <select class="form-control" id="all_cities" name="batch_id"  required>
                            @foreach($batches as $item)
                                <option value="{{$item->id}}" @if(in_array($item->id, $selectedbatch)) selected @endif>{{$item->name}}</option>
                            @endforeach
                        </select>
                        {{-- <input type="text" name="batch_id" value="{{ old('batch_id', $authusers->batch_id) }}" class="form-control" required /> --}}
                    </div>
                </div>
            </div>
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
           
           
        });
    </script>
@endpush
