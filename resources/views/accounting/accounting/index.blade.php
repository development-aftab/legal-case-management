@extends('layouts.master')

@push('css')
<link href="{{asset('plugins/components/datatables/jquery.dataTables.min.css')}}" rel="stylesheet" type="text/css"/>
<link href="https://cdn.datatables.net/buttons/1.2.2/css/buttons.dataTables.min.css" rel="stylesheet"
      type="text/css"/>
@endpush

@section('content')
    <div class="container-fluid">
        <!-- .row -->
        <div class="row">
            <div class="col-md-12">
                <h3 class="btn btn_yellow pull-right add_other">Add Other</h3>
            </div>
        </div>
        <div class="row table_part">
        @php
            $caseAccounting = collect($caseAccounting);
        @endphp
            @foreach($caseAccounting as $value) 
                <div class="row table_part">
                    <div class="col-sm-12 new_table_box">
                        <div class="white-box">                
                            <h3 class="box-title pull-left">{{ preg_replace('/(?<=[a-z])[A-Z]|[A-Z](?=[a-z])/', ' $0', 'Accounting Case ') }}</h3>
                            @can('add-'.str_slug('Accounting'))
                                <a class="btn btn-success pull-right" href="{{ url('/accounting/accounting/create') }}"><i
                                            class="icon-plus"></i> Add {{ preg_replace('/(?<=[a-z])[A-Z]|[A-Z](?=[a-z])/', ' $0', 'Accounting') }}</a>
                            @endcan
                            <a class="btn btn_black model_img img-responsive pull-right add_payment" data-table-id="{{$value}}">Add Payment</a>
                            <div class="clearfix"></div>
                            <hr>
                            <div id="table-container">
                                <div class="table-responsive">
                                    <table class="table" id="myTable">
                                        <thead>
                                        <tr>
                                            <th>Case ID</th><th>Client Name</th>
                                            <th>Payment Method</th><th>Payment Receipt</th><th>Payment Date</th><th>Total Amount</th><th>Paid Amount</th><th>Balance Amount</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @if(isset($accounting) && is_array($accounting) && count($accounting) == 0)
                                            <tr>
                                                <td colspan="10">No records found.</td>
                                            </tr>
                                        @else
                                            @foreach($accounting->where('table_id', $value) as $item)
                                                @foreach($casefile as $value)
                                                        <tr>
                                                            <td>{{ $value->case_number ??''}}</td>
                                                            <td>{{$value->client->name??''}}</td>
                                                            <td>
                                                                {{@$item->paymentMethod->name??''}}
                                                            </td>
                                                            <td>
                                                                @if(isset($item->upload_receipt) && $item->upload_receipt==null)
                                                                    No File
                                                                @else
                                                                    <a class="btn doc_btn" type="button" href="{{asset('website')}}/{{$item->upload_receipt}}" target="_blank">
                                                                        <img class="img-fluid" src="{{asset('website')}}/assets/images/doc-icon.png" alt="">
                                                                    </a>
                                                                @endif
                                                            </td>
                                                            <td>{{ $item->payment_date ??''}}</td>
                                                            <td>{{$totalAmount = $item->total_ammount ??''}}</td>
                                                            <td>{{$paidAmount = $item->paid_ammount ??''}}</td>
                                                            <td>{{$balanceAmount = $item->balance_ammount ??''}}</td>
                                                            <td>
                                                                @can('view-'.str_slug('Accounting'))
                                                                    <a href="{{ url('/accounting/accounting/' . $item->id) }}"
                                                                    title="View {{ preg_replace('/(?<=[a-z])[A-Z]|[A-Z](?=[a-z])/', ' $0', 'Accounting') }}">
                                                                        <button class="btn btn-info btn-sm">
                                                                            <i class="fa fa-eye" aria-hidden="true"></i> View
                                                                        </button>
                                                                    </a>
                                                                @endcan

                                                                @can('edit-'.str_slug('Accounting'))
                                                                    <a href="{{ url('/accounting/accounting/' . $item->id . '/edit') }}"
                                                                    title="Edit {{ preg_replace('/(?<=[a-z])[A-Z]|[A-Z](?=[a-z])/', ' $0', 'Accounting') }}">
                                                                        <button class="btn btn-primary btn-sm">
                                                                            <i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit
                                                                        </button>
                                                                    </a>
                                                                @endcan

                                                                @can('delete-'.str_slug('Accounting'))
                                                                    <form method="POST"
                                                                        action="{{ url('/accounting/accounting' . '/' . $item->id) }}"
                                                                        accept-charset="UTF-8" style="display:inline">
                                                                        {{ method_field('DELETE') }}
                                                                        {{ csrf_field() }}
                                                                        <button type="submit" class="btn btn-danger btn-sm"
                                                                                title="Delete {{ preg_replace('/(?<=[a-z])[A-Z]|[A-Z](?=[a-z])/', ' $0', 'Accounting') }}"
                                                                                onclick="return confirm(&quot;Confirm delete?&quot;)">
                                                                            <i class="fa fa-trash-o" aria-hidden="true"></i> Delete
                                                                        </button>
                                                                    </form>
                                                                @endcan
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                @endforeach
                                            @endif
                                        </tbody>
                                    </table>
                                    {{-- @if(isset($accounting) && $accounting->isEmpty())
                                    @else
                                    <div class="pagination-wrapper"> {!! $accounting->appends(['search' => Request::get('search')])->render() !!} </div>
                                    @endif --}}
                                </div>
                            <div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="appended-content"></div>
    </div>
    <div id="accounting_modal" class="modal fade accounting_modal" tabindex="-1" role="dialog"
         aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×
                    </button>
                    <h4 class="modal-title">Add Payment</h4></div>
                <form id="accounting_form" method="POST" action="{{ route('case_accounts') }}" enctype="multipart/form-data">
                    <div class="modal-body">
                        @csrf
                        <input type="hidden" value="{{$caseFileId}}" name="case_file_id">
                        <input type="hidden" value="" class="table_id" name="table_id">
                        <div class="form-group">
                            <label for="recipient-name" class="control-label">Payment Method:</label>
                            <select class="form-control" name="payment_method_id" id="" required>
                                <option value="" selected hidden readonly>Payment Method</option>
                                @foreach($casefile as $item)
                                    @foreach($item->client->clientPaymentMethods as $methods)
                                        <option value="{{@$methods->paymentMethod->id}}">{{@$methods->paymentMethod->name}}</option>
                                    @endforeach
                                @endforeach
                            </select>
                            {{--<input class="form-control" name="title" type="text" id="title" value="" >--}}
                        </div>
                        <div class="form-group">
                            <label for="message-text" class="control-label">Payment Date:</label>
                            <input class="form-control" name="payment_date" type="date" id="payment_date" value="" required>
                        </div>
                        <div class="form-group">
                            <label for="message-text" class="control-label">Total Amount:</label>
                            <input class="form-control total_ammount" name="total_ammount" min="-1" type="number" id="total_ammount" step="0.01" value="{{@$balanceAmount??''}}" >
                        </div>
                        <div class="form-group">
                            <label for="message-text" class="control-label">Paid Amount:</label>
                            <input class="form-control paid_ammount" name="paid_ammount" min="-1" type="number" id="paid_ammount" step="0.01" value="" required>
                        </div>
                        <div class="form-group">
                            <label for="message-text" class="control-label">Balance Amount:</label>
                            <input class="form-control balance_ammount" readonly name="balance_ammount" min="-1" type="number" id="balance_ammount" value="" required>
                        </div>
                        <div class="form-group">
                            <label for="message-text" class="control-label">Upload Receipt:</label>
                            <input class="form-control" name="upload_receipt" type="file" id="upload_receipt" value=""  required>
                        </div>
                        <div class="form-group">
                            <label for="message-text" class="control-label">Description:</label>
                            <textarea class="form-control description" name="description" id="description"></textarea>
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
    $('.add_payment').on('click', function() {
        var tableId = $(this).attr('data-table-id');
        $('.table_id').val(tableId);
        $('.accounting_modal').modal('show');
    });
    $(document).ready(function() {
        var paymentButtonIndex = {{$caseAccounting->count()}} + 1; // Start paymentButtonIndex from the count of $caseAccounting + 1
        $('.add_other').on('click', function() {
            var content = '<div class="white-box"><h3 class="box-title pull-left">Accounting Case</h3> <a class="btn btn_black model_img img-responsive pull-right add_payment" data-toggle="modal" data-target="#accounting_modal" data-table-id="' + paymentButtonIndex + '">Add Payment</a><div class="clearfix"></div><hr><div class="table-responsive"><table class="table" id="myTable"><thead><tr><th>Case ID</th><th>Client Name</th><th>Payment Method</th><th>Payment Receipt</th><th>Payment Date</th><th>Total Amount</th><th>Paid Amount</th><th>Balance Amount</th></tr></thead><tbody><tr><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr></tbody></table></div>';
            $(".appended-content").append(content);
            $('.table_id').val(paymentButtonIndex);
            paymentButtonIndex++;
        });
    });


</script>
<script>
    $('.paid_ammount').on('change', function() {
        var totalAmount = parseFloat($('.total_ammount').val()) || 0;
        var paidAmount = parseFloat($('.paid_ammount').val()) || 0;
        var balanceAmount = (totalAmount - paidAmount).toFixed(2);
        $('.balance_ammount').val(balanceAmount);
    });
</script>
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

    $(document).ready(function(){
        $("#accounting_form").validate({
            // Specify validation rules
            rules: {
                payment_date: "required",
                total_ammount: "required",
                paid_ammount: "required",
                balance_ammount: "required",
                upload_receipt: "required",
            },
            messages: {
                payment_date: {
                    required: "Please Enter A Payment Date",
                },
                total_ammount: {
                    required: "Please Enter A Total Amount",
                },
                paid_ammount: {
                    required: "Please Enter A Paid Amount",
                },
                balance_ammount: {
                    required: "Please Enter A Balance Amount",
                },
                upload_receipt: {
                    required: "Please Put The Receipt",
                },
            },
        });
    });
    $(document).on('change', '#upload_receipt', function() {
        var file = this.files[0];
        var maxSize = 2 * 1024 * 1024 * 1024;
        if (file.size > maxSize) {
            alert('File size exceeds the maximum limit of 2GB.');
            this.value = '';
        }
    });
</script>
{{--<script type="text/javascript">--}}
    {{--$(document).ready(function() {--}}
        {{--var paymentButtonIndex = 2;--}}
        {{--$('.add_other').click(function() {--}}
            {{--var tablePart = '<div class="col-sm-12 new_table_box"><div class="white-box"><h3 class="box-title pull-left">Accounting Case</h3> <a class="btn btn_black model_img img-responsive pull-right add_payment" data-toggle="modal" data-target="#accounting_modal" data-table-id="' + paymentButtonIndex + '">Add Payment</a><div class="clearfix"></div><hr><div class="table-responsive"><table class="table" id="myTable"><thead><tr><th>Case ID</th><th>Client Name</th><th>Payment Method</th><th>Payment Receipt</th><th>Payment Date</th><th>Total Amount</th><th>Paid Amount</th><th>Balance Amount</th></tr></thead><tbody><tr><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr></tbody></table></div></div>';    --}}
            {{--$('.table_part').append(tablePart);--}}
            {{--paymentButtonIndex++;--}}
            {{--$('.add_payment').on('click', function() {--}}
                {{--var tableId = $(this).data('table-id');--}}
                {{--$('.table_id').val(tableId);--}}
                {{--$('.accounting_modal').show();--}}
            {{--});--}}
        {{--});--}}
    {{--});--}}
{{--</script>--}}

@endpush
