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
            <div class="col-sm-12">
                <div class="white-box">
                    <h3 class="box-title pull-left">{{ preg_replace('/(?<=[a-z])[A-Z]|[A-Z](?=[a-z])/', ' $0', 'CaseInvoice') }}</h3>
                    <a style="margin-left: 10px" href="{{ url()->previous() }}" class="btn btn_black pull-right model_img img-responsive">Back</a>
                    @can('add-'.str_slug('CaseInvoice'))
                        <a class="btn btn_black pull-right" href="{{ url('create_invoice', [$caseFileId]) }}">Add Invoice</a>
                    @endcan
                    <div class="clearfix"></div>
                    <hr>
                    <div class="inner_section_table">
                        <div class="table-responsive">
                            <table class="table" id="myTable">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Date</th><th>Case OF Party</th><th>Vat Number</th><th>Invoice Number</th><th>Download</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($caseinvoice as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->date }}</td><td>{{$item->caseFile->name_of_parties}}</td><td>{{ $item->vat_number }}</td><td>{{ $item->invoice_number }}</td><td><a href="{{route('invoice_pdf')}}/{{$item->id}}" target="_blank" class=""><img class="img-fluid" src="{{asset('website')}}/assets/images/doc-icon.png" alt=""></a></td>
                                        <td>
                                            <div class="dropdown action_dropdown">
                                                <button class="btn dropdown-toggle action_btn" type="button"
                                                        id="dropdownMenuButton" data-toggle="dropdown"
                                                        aria-haspopup="true"
                                                        aria-expanded="false">
                                                    <i class="fa-solid fa-eye"></i>
                                                </button>
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                    @can('view-'.str_slug('CaseInvoice'))
                                                        <a href="{{ url('/caseInvoice/case-invoice/' . $item->id) }}" title="View {{ preg_replace('/(?<=[a-z])[A-Z]|[A-Z](?=[a-z])/', ' $0', 'CaseInvoice') }}">
                                                            View
                                                        </a>
                                                    @endcan
                                                    {{--@can('edit-'.str_slug('CaseInvoice'))--}}
                                                        {{--<a href="{{ url('/caseInvoice/case-invoice/' . $item->id . '/edit') }}" title="Edit {{ preg_replace('/(?<=[a-z])[A-Z]|[A-Z](?=[a-z])/', ' $0', 'CaseInvoice') }}">--}}
                                                            {{--Edit--}}
                                                        {{--</a>--}}
                                                    {{--@endcan--}}
                                                    @can('delete-'.str_slug('CaseInvoice'))
                                                        <form method="POST" action="{{ url('/caseInvoice/case-invoice' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                            {{ method_field('DELETE') }}
                                                            {{ csrf_field() }}
                                                            <a><button type="submit" class="" style="border: none;" title="Delete {{ preg_replace('/(?<=[a-z])[A-Z]|[A-Z](?=[a-z])/', ' $0', 'CaseInvoice') }}"  onclick="return confirm(&quot;Confirm delete?&quot;)">
                                                                Delete
                                                            </button></a>
                                                        </form>
                                                    @endcan
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $caseinvoice->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>
                    </div>
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

@endpush
