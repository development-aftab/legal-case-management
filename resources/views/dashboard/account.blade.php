@extends('layouts.master')

@push('css')
<link href="{{asset('plugins/components/datatables/jquery.dataTables.min.css')}}" rel="stylesheet" type="text/css"/>
    <link href="https://cdn.datatables.net/buttons/1.2.2/css/buttons.dataTables.min.css" rel="stylesheet"
          type="text/css"/>
@endpush

@section('content')
    <section class="accounts_table_sec">
        {{-- <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 col-lg-12 col-xs-12">
                    <div class="inner_section_heading_wrapper">
                        <div class="pagination">
                            <label for="">Pagination</label>
                            <select class="form-control" name="" id="">
                                <option value="">10</option>
                                <option value="">20</option>
                                <option value="">30</option>
                                <option value="">40</option>
                                <option value="">50</option>
                            </select>
                        </div>
                        <div class="search_form">
                            <form action="">
                                <div class="txt_field">
                                    <input class="form-control" type="text" placeholder="Search">
                                </div>
                                <div class="search_btn">
                                    <input class="btn btn_black" type="submit" value="Search">
                                </div>
                            </form>
                            <div class="filter_btn">
                                <a class="btn btn_black" href="#!">
                                    Filter
                                    <i class="fa-solid fa-filter"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 col-lg-12 col-xs-12">
                    <div class="inner_section_table">
                        <div class="table-responsive">
                            <table class="table table-fixed sticker_table">
                                <thead>
                                <tr>
                                    <th scope="col">Court Id</th>
                                    <th scope="col">Party Name</th>
                                    <th scope="col">Assign Attorney</th>
                                    <th scope="col">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @for ($x = 0; $x <= 9; $x++)
                                    <tr>
                                        <td>1234546</td>
                                        <td>Denly Smith</td>
                                        <td>John Denly</td>
                                        <td>
                                            <div class="dropdown action_dropdown">
                                                <button class="btn dropdown-toggle action_btn" type="button"
                                                        id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                                        aria-expanded="false">
                                                    <i class="fa-solid fa-eye"></i>
                                                </button>
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                    <a class="dropdown-item" href="#">Attach Invoice</a>
                                                    <a class="dropdown-item" href="#">Attach State Payment</a>
                                                    <a class="dropdown-item" href="#">Orders</a>
                                                    <a class="dropdown-item" href="{{url('bill_of_cost')}}">Bill Of Cost</a>
                                                    <a class="dropdown-item" href="#">Letter</a>
                                                    <a class="dropdown-item" href="#">Cheques</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endfor
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
        <div class="container-fluid">
        <!-- .row -->
        <div class="row">
            <div class="col-sm-12">
                <div class="white-box">
                    <h3 class="box-title pull-left">{{ preg_replace('/(?<=[a-z])[A-Z]|[A-Z](?=[a-z])/', ' $0', 'Accounts') }}</h3>
                    @can('add-'.str_slug('CaseFile'))
                        <a class="btn btn_black pull-right" href="{{ url('/caseFile/case-file/create') }}"> Add {{ preg_replace('/(?<=[a-z])[A-Z]|[A-Z](?=[a-z])/', ' $0', 'CaseFile') }}</a>
                    @endcan
                    <div class="clearfix"></div>
                    <hr>
                    <div class="inner_section_table">
                        <div class="table-responsive">
                        <table class="table" id="myTable">
                            <thead>
                            <tr>
                                <th scope="col">Case Id</th>
                                <th scope="col">Party Name</th>
                                <th scope="col">Assign Attorney</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($casefile as $item)
                                <tr>
                                    <td>{{$item->case_number}}</td><td>{{ $item->name_of_parties }}</td><td>{{ $item->attorney_associate_id->attorneyOrAssociate->name??'' }}</td>
                                    <td>
                                        <!-- @can('view-'.str_slug('CaseFile'))
                                            <a href="{{ url('/caseFile/case-file/' . $item->id) }}"
                                               title="View {{ preg_replace('/(?<=[a-z])[A-Z]|[A-Z](?=[a-z])/', ' $0', 'CaseFile') }}">
                                                <button class="btn btn-info btn-sm">
                                                    <i class="fa fa-eye" aria-hidden="true"></i> View
                                                </button>
                                            </a>
                                        @endcan

                                        @can('edit-'.str_slug('CaseFile'))
                                            <a href="{{ url('/caseFile/case-file/' . $item->id . '/edit') }}"
                                               title="Edit {{ preg_replace('/(?<=[a-z])[A-Z]|[A-Z](?=[a-z])/', ' $0', 'CaseFile') }}">
                                                <button class="btn btn-primary btn-sm">
                                                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit
                                                </button>
                                            </a>
                                        @endcan

                                        @can('delete-'.str_slug('CaseFile'))
                                            <form method="POST"
                                                  action="{{ url('/caseFile/case-file' . '/' . $item->id) }}"
                                                  accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-sm"
                                                        title="Delete {{ preg_replace('/(?<=[a-z])[A-Z]|[A-Z](?=[a-z])/', ' $0', 'CaseFile') }}"
                                                        onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete
                                                </button>
                                            </form>
                                        @endcan -->
                                        <div class="dropdown action_dropdown">
                                                <button class="btn dropdown-toggle action_btn" type="button"
                                                        id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                                        aria-expanded="false">
                                                    <i class="fa-solid fa-eye"></i>
                                                </button>
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">                                                    
                                                    @if(isset($item->caseInvoice)  && $item->caseInvoice !=null)
                                                        <a class="dropdown-item" href="{{ url('have_invoice', [$item->id]) }}">Have Invoice</a>
                                                    @else
                                                        <a class="dropdown-item" href="{{ url('create_invoice', [$item->id]) }}">Create Invoice</a>
                                                    @endif
                                                    <a class="dropdown-item" href="{{route('case_accounting', [$item->id])}}">Accounts</a>
                                                    <a class="dropdown-item" href="{{route('case_order', [$item->id])}}">Orders</a>
                                                    <a class="dropdown-item" href="{{route('case_allocatur', [$item->id])}}">Allocatur</a>
                                                    <a class="dropdown-item" href="{{route('case_letter', [$item->id])}}">Letter</a>
                                                    <a class="dropdown-item" href="{{route('case_cheque', [$item->id])}}">Cheques</a>
                                                    @if(isset($item->billOfCost)  && $item->billOfCost !=null)
                                                        <a class="dropdown-item" href="{{ url('have_billofcost', [$item->id]) }}">Have Bill Of Cost</a>
                                                    @else
                                                        <a class="dropdown-item" href="{{route('bill_of_cost', [$item->id ,'case'])}}">Generate Bill Of Cost</a>
                                                    @endif
                                                </div>
                                            </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {{-- <div class="pagination-wrapper"> {!! $casefile->appends(['search' => Request::get('search')])->render() !!} </div> --}}
                        </div>
                    </div>    
                </div>
            </div>
        </div>
    </div>
    </section>
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
                "ordering": false, // disable sorting on all columns
                "paging": true, // enable pagination
                "searching": true // enable search
            });
        });
    </script>
@endpush