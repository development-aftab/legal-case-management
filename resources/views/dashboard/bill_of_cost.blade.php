@extends('layouts.master')

@push('css')
    <link href="{{asset('plugins/components/datatables/jquery.dataTables.min.css')}}" rel="stylesheet" type="text/css"/>
    <link href="https://cdn.datatables.net/buttons/1.2.2/css/buttons.dataTables.min.css" rel="stylesheet"type="text/css"/>
    <style>
        #myTable_filter{
            margin-right: 160px;
        }
        .ck-blurred.ck.ck-content.ck-editor__editable.ck-rounded-corners.ck-editor__editable_inline {
            height: 300px;
        }
        .table th, td {
            text-align: center;
        }
    </style>
@endpush

@section('content')
    <section class="bill_cost_sec">
        <div class="container-fluid">
        <!-- .row -->
        <form id="billOfCost_form" method="POST" action="{{ url('/billOfCost/bill-of-cost') }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="row">
                <div class="col-md-12" style="margin-bottom: 20px;">
                    <div class="filter_btn pull-right">
                        <a href="{{ url()->previous() }}" class="btn btn_black model_img img-responsive">Back</a>
                    </div>
                </div>
            </div>
        <div class="row">
            {{-- <div class="col-md-3">
                   <div>
                    @foreach($casefile as $item)
                       <h6>Case Information</h6>
                       <ul>
                           <li>Case ID#: {{ $item->case_number??'' }}</li>
                           <li>Case Name: {{ $item->name_of_parties }} </li>
                           <li>Trend:
                               @foreach($item->tags as $tag)
                                   <span>#</span>{{ $tag->name }}
                               @endforeach
                           </li>
                           <li>Assigned Attorney: {{ $item->attorney_associate_id->attorneyOrAssociate->name}}</li>
                       </ul>
                    @endforeach
                   </div>
                </div> --}}
                {{-- <div class="col-md-6"></div>
                <div class="col-md-3">
                    <div>
                        <h6>Legal Case Management</h6>
                        <ul>
                            @foreach($lcm as $item)
                                <li>Address: {{$item->profile->address}}</li>
                                <li>Tel: {{$item->contact}}</li>
                                <li>Mail: {{$item->email}}</li>
                            @endforeach
                        </ul>
                    </div>
            </div> --}}
            <div class="col-sm-10" align="center" style="margin: 0 auto; margin-top: 30px; margin-bottom: 30px;">
                <textarea class="demo_1" name="demo_1" id="" required></textarea>
            </div>
            <div class="col-sm-12">
                <!-- <div class="white-box"> -->
                    <!-- <h3 class="box-title pull-left">{{ preg_replace('/(?<=[a-z])[A-Z]|[A-Z](?=[a-z])/', ' $0', 'Bill Of Cost') }}</h3> -->
                            <div class="filter_btn pull-right">
                                <a class="btn btn_black model_img img-responsive" data-toggle="modal" data-target="#responsive-modal">Add File</a>
                            </div>
                    <div class="clearfix"></div>
                    <hr>
                    <div class="inner_section_table">
                        <div class="table-responsive">
                            <table class="table table-fixed sticker_table" id="myTable">
                                <thead>
                                <tr>
                                    <th scope="col">Item</th>
                                    <th scope="col">Date</th>
                                    <th scope="col">Document</th>
                                    <th scope="col">Page Counts</th>
                                    <th scope="col">Description Of WorkDone</th>
                                    <th scope="col">Attorney Fees</th>
                                    <th scope="col">Disbursements</th>
                                    <th scope="col">Delete</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $sortedCaseFile = $casefile->sortBy(function($item) {
                                            return $item->originatingProcess->max('date');
                                        });
                                    @endphp

                                @foreach($sortedCaseFile as $item)
                                    @foreach($item->originatingProcess as $value)
                                        @foreach($value->orignatingProcesseds->sortBy('date') as $process)
                                            <tr>
                                            <td>{{ $loop->iteration??$item->id }}</td>
                                                <td>{{ $process->date ? date('d M Y', strtotime($process->date)) : '' }}</td>
                                                <td>{{$process->title??''}}</td>
                                                <td>{{ preg_match_all("/\/Page\W/", file_get_contents(public_path('website').'/'.$process->file??''))}} Pages</td>
                                                <td><textarea class="form-control files_fees" data-type="workdone" data-id="{{$process->id??''}}" name="workdone">{!! $process->description_workdone??'' !!}</textarea></td>
                                                <td><textarea class="form-control files_fees" data-type="attorney_fees" data-id="{{$process->id??''}}" name="attorney_fees" id="">{!! $process->attorney_fees??'' !!}</textarea></td>
                                                <td><textarea class="form-control files_fees" data-type="disbursements" data-id="{{$process->id??''}}" name="disbursements" id="">{!! $process->dibursements??'' !!}</textarea></td>
                                                <td>
                                                    <a href="{{ route('originating_processed_destory' , [$process->id??'']) }}"
                                                       title="Delete {{ preg_replace('/(?<=[a-z])[A-Z]|[A-Z](?=[a-z])/', ' $0', 'Document Center') }}">
                                                        <i style="color: red;" class="fa fa-times" aria-hidden="true"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endforeach
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
            </div>
            <div class="col-md-3"></div>
            <div class="col-md-2 calculation">
                <h3>Sub Total</h3>
                <input class="form-control" name="sub_total" type="number" min="1">
            </div>
            <div class="col-md-2 calculation">
                <h3>Vat 12.5%</h3>
                <input class="form-control" name="vat" type="number" min="1">
            </div>
            <div class="col-md-2 calculation">
                <h3>Total</h3>
                <input class="form-control" name="total" type="number" min="1">
            </div>
            <div class="col-md-3"></div>
            <div class="col-sm-10" align="center" style="margin: 0 auto; margin-top: 50px; margin-bottom: 30px;">
                <textarea class="demo_2" name="demo_2" id="" required></textarea>
            </div>
            <div class="col-md-12" style="text-align: center; margin-top: 30px; margin-bottom: 30px;">
                <div class="bill_of_cost">
                        <input type="hidden" name="case_id" value="{{$caseFileId}}">
                        <button type="submit" class="btn btn_black submit">Submit</button>
                </div>
            </div>
        </div>
        </form>
        </div>
    </section>

                    <div id="responsive-modal" class="modal fade" tabindex="-1" role="dialog"
                         aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×
                                    </button>
                                    <h4 class="modal-title">Add New</h4></div>
                                <form id="process_form" method="post" action="{{route('process_bill_of_cost')}}" enctype="multipart/form-data">
                                    <div class="modal-body">
                                        @csrf
                                        <div class="form-group">
                                            <label for="recipient-name" class="control-label">Title:</label>
                                            <input class="form-control" name="title" type="text" id="title" value="{{ $originatingprocessed->title??''}}" >
                                            <input type="hidden" name="case_id" value="{{$caseFileId}}">
                                        </div>
                                        <div class="form-group">
                                            <label for="message-text" class="control-label">File:</label>
                                            <input class="form-control" name="file" type="file" id="file" accept="application/pdf" value="{{ $originatingprocessed->file??''}}" >
                                        </div>
                                        <div class="form-group">
                                            <label for="message-text" class="control-label">Date:</label>
                                            <input class="form-control" name="date" type="date" id="date" value="{{ $originatingprocessed->date??''}}" >
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">
                                            Close
                                        </button>
                                        <button type="submit" class="btn btn-danger waves-effect waves-light">Submit
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

@endsection

@push('js')
    <script src="{{asset('plugins/components/toast-master/js/jquery.toast.js')}}"></script>

    <script src="{{asset('plugins/components/datatables/jquery.dataTables.min.js')}}"></script>
    <!-- start - This is for export functionality only -->
    <!-- end - This is for export functionality only -->
    <script>
        $(document).ready(function () {

            @if(\Session::has('message'))
            $.toast({
                heading: 'Success!',
                position: 'top-center',
                text: '{{session()->get('message')}}',
                loaderBg: '#ff6849',
                icon: 'success',
                hideAfter: 3000,
                stack: 6
            });
            @endif
        })

        $(function () {
            $('#myTable').DataTable({
                'aoColumnDefs': [{
                    'bSortable': false,
                    'aTargets': [-1] /* 1st one, start by the right */
                }]
            });

        });
    </script>
     <script>
        $(document).on('keyup','.files_fees',function(e){
            var id = $(this).attr('data-id');
            var type = $(this).attr('data-type');
            var attorney_fees = $(this).val();
            // var new_val = attorney_fees.replace('\n', "<br>");
            // console.log(new_val);
            // attorney_fees  = new_val;
            $.ajax({
                type: 'get',
                data:{id:id,attorney_fees:attorney_fees,type:type},
                url: "{{route('bill_of_cost_ajax')}}",
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            // Disable the button initially
            // $(".submit").prop("disabled", true);

            // Check if all required fields are filled
            $(".fees").on("input", function() {
                var allFilled = true;
                $(".fees").each(function() {
                    if ($(this).val() === '') {
                        allFilled = false;
                        return false;
                    }
                });
                // if (allFilled) {
                //     $(".submit").prop("disabled", false);
                // } else {
                //     $(".submit").prop("disabled", true);
                // }
            });
        });

        $(document).ready(function(){
            $("#billOfCost_form").validate({
                // Specify validation rules
                rules: {
                    demo_1: "required",
                    sub_total: "required",
                    vat: "required",
                    total: "required",
                    demo_2: "required",
                },
                messages: {
                    demo_1: {
                        required: "Please enter Text",
                    },
                    demo_2: {
                        required: "Please enter Text",
                    },
                    sub_total: {
                        required: "Please enter Sub Total",
                    },
                    vat: {
                        required: "Please enter Vat",
                    },
                    total: {
                        required: "Please enter Total",
                    },
                },
            });
        });

        $(document).ready(function(){
            $("#process_form").validate({
                // Specify validation rules
                rules: {
                    title: "required",
                    date: "required",
                    file: "required",
                },
                messages: {
                    title: {
                        required: "Please enter Title",
                    },
                    date: {
                        required: "Please enter Date",
                    },
                    file: {
                        required: "Please put File",
                    },
                },
            });
        });
        $(document).on('change', '#file', function() {
            var file = this.files[0];
            var maxSize = 2 * 1024 * 1024 * 1024;
            if (file.size > maxSize) {
                alert('File size exceeds the maximum limit of 2GB.');
                this.value = '';
            }
        });
    </script>
    <script src="https://cdn.ckeditor.com/4.15.0/standard/ckeditor.js"></script>
    <script type="text/javascript">
        CKEDITOR.replace('demo_1',{
            height:300,
            filebrowserUploadUrl: url,
            filebrowserUploadMethod: 'form'
        });
    </script>
    <script type="text/javascript">
        CKEDITOR.replace('demo_2',{
            height:300,
            filebrowserUploadUrl: url,
            filebrowserUploadMethod: 'form'
        });
    </script>
@endpush
