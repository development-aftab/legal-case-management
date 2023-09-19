@extends('layouts.master')

@push('css')
    <style>
        .court_inputs{
            margin-top: 20px;
            /*box-shadow: 0 8px 33px rgb(0 0 0 / 5%) !important;*/
            border: 2px solid #d5af2a !important;
        }
        .court_heading {
            font-size: 16px !important;
        }
        .court_notes{
            width: 50%;
            margin: 0 auto;
        }
    </style>
@endpush

@section('content')
    <section class="detail_view_sec court_attendants_sec">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="white-box ">
                        {{-- @can('view-'.str_slug('CourtAttendantsNote')) --}}
                        {{--<a class="btn btn_black pull-right" href="{{ url('court_attendants_notes', [$caseFileId]) }}">--}}
                            {{--Back</a>--}}
                        {{-- @endcan --}}
                        <div class="row">
                                <div class="col-md-12">
                                    <form id="court_attendants_form" method="POST" action="{{ url('/courtAttendantsNote/court-attendants-note') }}" accept-charset="UTF-8"
                                    class="form-horizontal" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                        <input type="hidden" name="case_file_id" value="{{$caseFileId}}">
                                        <div class="detail_top">
                                            <p>
                                                <span class="court_heading">Date:</span>
                                                <input class="form-control court_inputs" type="date" name="date" class="" id="schedule_date">
                                            </p>
                                            <p>
                                                <span class="court_heading">Check-In:</span>
                                                <input class="form-control court_inputs" type="time" name="check_in" class="" id="check-in">
                                            </p>
                                            <p>
                                                <span class="court_heading">Check-Out:</span>
                                                <input class="form-control court_inputs" type="time" name="check_out" class="" id="check-out">
                                            </p>
                                            <p>
                                                <span class="court_heading">Category:</span>
                                                <select class="form-control court_inputs runtime_category" name="category_id">
                                                    <option disabled selected hidden>Select Category</option>
                                                    @foreach($categorys as $category)
                                                        <option value="{{ $category->id }}">{{ $category->title }}</option>
                                                    @endforeach
                                                </select>
                                            </p>
                                            <p>
                                                <span class="court_heading">Attachment:</span>
                                                    <input class="form-control court_inputs" type="file" name="attachment" id="attachment" accept="application/pdf">
                                            </p>
                                            <p class="hide_category">
                                                <span class="court_heading">Next Court Date:</span>
                                                    <input class="form-control court_inputs" type="date" name="next_court_date" id="next_court_date" onfocus="this.min=new Date().toISOString().split('T')[0]">
                                            </p>
                                            <p class="hide_category">
                                                <span class="court_heading">Next Court Category:</span>
                                                <select class="form-control court_inputs" name="next_court_category_id">
                                                    <option disabled selected hidden>Select Category</option>
                                                    @foreach($categorys as $category)
                                                        <option value="{{ $category->id }}">{{ $category->title }}</option>
                                                    @endforeach
                                                </select>
                                            </p>
                                        </div>
                                        <div class="court_notes">
                                            <p><span>Notes:</span>
                                                <textarea class="form-control court_inputs description_para" name="note" rows="10" oninput="validateInput(this)"></textarea>
                                            </p>
                                            <button style="margin-left: 300px;margin-top: 20px;width: 130px;" class="btn btn_yellow" type="submit">Submit</button>
                                        </div>
                                    </form>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('js')
    <script type="text/javascript">
        $(document).ready(function(){
            $("#court_attendants_form").validate({
                // Specify validation rules
                rules: {
                    date: "required",
                    check_in: "required",
                    check_out: "required",
                    category_id: "required",
                    next_court_date: "required",
                    next_court_category_id: "required",
                    note: "required",
                },
                messages: {
                    date: {
                        required: "Please Select Date",
                    },
                    check_in: {
                        required: "Please Select Check-In Time",
                    },
                    check_out: {
                        required: "Please Select Check-Out Time",
                    },
                    category_id: {
                        required: "Please Select A Category",
                    },
                    next_court_date: {
                        required: "Please Select A Next Court Date",
                    },
                    next_court_category_id: {
                        required: "Please Select A Next Category",
                    },
                    note: {
                        required: "Please Fill The Note",
                    },
                },
            });
        });
        $(document).on('change','.runtime_category',function (e) {
            e.preventDefault();
            var category = $(this).val();            
            if(category==4){
                $('.hide_category').hide();
            }else{
                $('.hide_category').show();
            }
        });   
    </script>
<script>
    function validateInput(textarea) {
        textarea.value = textarea.value.replace(/[^A-Za-z\s\n]/g, '');
    }
</script>
@endpush