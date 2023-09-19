@extends('layouts.master')

@push('css')
<link href="{{asset('plugins/components/datatables/jquery.dataTables.min.css')}}" rel="stylesheet" type="text/css"/>
<link href="https://cdn.datatables.net/buttons/1.2.2/css/buttons.dataTables.min.css" rel="stylesheet" type="text/css" />
<link href="{{asset('plugins/components/bootstrap-daterangepicker/daterangepicker.css')}}" rel="stylesheet">
<style>
    .active_status{
        background: #2ad536;
        /*border: 2px solid #262626;*/
        border: none;
        padding: 8px;
        font-size: 17px;
        color: #fff;
        border-radius: 18px;
    }
    .comp_status{
        background: #d5af2a;
        /*border: 2px solid #262626;*/
        padding: 8px;
        border: none;
        font-size: 17px;
        color: #fff;
        border-radius: 18px;
    }
    a.dt-button.buttons-html5 {
        background: #d5af2a;
        border: 3px solid #000;
        padding: 10px 20px;
        color: #fff;
        border-radius: 8px;
        margin: 10px;
    }
    a.dt-button.buttons-html5:hover {
        background: #fff !important;
        border: 3px solid #d5af2a !important;
        color: #000 !important;
    }
    a.dt-button.buttons-print {
        background: #d5af2a;
        border: 3px solid #000;
        padding: 10px 20px;
        color: #fff;
        border-radius: 8px;
        margin: 10px;
    }
    a.dt-button.buttons-print:hover {
        background: #fff !important;
        border: 3px solid #d5af2a !important;
        color: #000 !important;
    }
</style>
@endpush

@section('content')
    <div class="container-fluid">
        <!-- .row -->
        <div class="row">
            <div class="col-sm-12">
                <div class="white-box">
                    <h3 class="box-title pull-left">Financial Report</h3>
                    <div class="custom_filter pull-right">
                        <button class="btn custom_filter_btn btn_black" type="button" id="custom_filter_btn" >
                            Filter <i class="fa fa-filter"></i>
                        </button>
                        <div class="custom_filter_box" >
                            <form action="">
                                <div class="form-group">
                                    <input class="form-control input-daterange-datepicker" type="text" name="daterange" value="" placeholder="Start Date - End Date">
                                </div>
                                <div class="form-group">
                                    <select class="form-control" name="currency" id="currency">
                                        <option selected="" disabled="" hidden="">Currency</option>
                                        <option value="$">USD $</option>
                                        <option value="TTD $">TTD $</option>
                                        <option value="£">Pound £</option>
                                        <option value="€">Euro €</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <select class="form-control" name="payment_type_id" id="payment_type_id">
                                        <option selected="" disabled="" hidden="">Payment Type</option>
                                        @foreach($paymentMethod as $type)
                                            <option>{{$type->name??''}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Case ID" name="case_id" id="case_id">
                                </div>
                                <div class="form-group">
                                    <input class="btn btn_black" type="submit" value="Apply">
                                    <button class="btn btn_black close-btn" type="button">Close</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <hr>
                    <div class="inner_section_table">
                        <div class="table-responsive">
                            <table class="table" id="myTable">
                                <thead>
                                <tr>
                                    <th>Case Number</th>
                                    <th>Case Name</th>
                                    <th>Client Name</th>
                                    <th>Invoice Number</th>
                                    <th>Payment Type</th>
                                    <th>Currency</th>
                                    <th>Issue Date</th>
                                    <th>Paid Amount</th>
                                    <th>Total Amount</th>
                                    <th>Balance Amount</th>
                                    {{--<th>Actions</th>--}}
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach($accounting as $account)
                                        <tr>
                                            <td>{{@$account->casefile->case_number??""}}</td>
                                            <td>{{@$account->casefile->name_of_parties??""}}</td>
                                            <td>{{@$account->casefile->client->name??""}}</td>
                                            <td>ncjdncjd</td>
                                            <td>{{@$account->paymentMethod->name??""}}</td>
                                            <td>cjkdjcd</td>
                                            <td>{{@$account->payment_date ? date('d M Y', strtotime($account->payment_date)) : 'Not Avalible' }}</td>
                                            <td>{{$paidAmount = $account->paid_ammount ??''}}</td>
                                            <td>{{$totalAmount = $account->total_ammount ??''}}</td>
                                            <td>{{$balanceAmount = $account->balance_ammount ??''}}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('js')
<script src="{{asset('plugins/components/toast-master/js/jquery.toast.js')}}"></script>

{{--<script src="{{asset('plugins/components/datatables/jquery.dataTables.min.js')}}"></script>--}}

<script src="{{asset('plugins/components/datatables/jquery.dataTables.min.js')}}"></script>
<script src="https://cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
<script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
<script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js"></script>

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
    $('#myTable').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ],
        "ordering": false, // disable sorting on all columns
        "paging": true, // enable pagination
        "searching": true // enable search
    });
</script>
<script src="{{asset('plugins/components/moment/moment.js')}}"></script>
<script src="{{asset('plugins/components/bootstrap-daterangepicker/daterangepicker.js')}}"></script>

<script>
    // Daterange picker
    jQuery('.input-daterange-datepicker').daterangepicker({
        buttonClasses: ['btn', 'btn-sm'],
        applyClass: 'btn-danger',
        cancelClass: 'btn-inverse'
    });
    jQuery(document).ready(function() {
        // Open custom filter box on button click
        jQuery(".custom_filter_btn").click(function() {
            jQuery(".custom_filter_box").fadeIn(300); // Adjust the duration (in milliseconds) for desired speed
        });

        // Close custom filter box on close button click
        jQuery(".custom_filter_box .close-btn").click(function() {
            jQuery(".custom_filter_box").fadeOut(300); // Adjust the duration (in milliseconds) for desired speed
        });
    });
</script>
@endpush
