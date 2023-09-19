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
                    <h3 class="box-title pull-left">{{ preg_replace('/(?<=[a-z])[A-Z]|[A-Z](?=[a-z])/', ' $0', 'PaymentMethod') }}</h3>
                    @can('add-'.str_slug('PaymentMethod'))
                        <a class="btn btn_black pull-right" href="{{ url('/paymentMethod/payment-method/create') }}">
                         Add {{ preg_replace('/(?<=[a-z])[A-Z]|[A-Z](?=[a-z])/', ' $0', 'PaymentMethod') }}</a>
                    @endcan
                    <div class="clearfix"></div>
                    <hr>
                    <div class="inner_section_table">
                        <div class="table-responsive">
                            <table class="table" id="myTable">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th><th>Description</th><th>Status</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($paymentmethod as $item)
                                    <tr>
                                        <td>{{ $loop->iteration??$item->id }}</td>
                                        <td>{{ $item->name }}</td><td>{{ $item->description }}</td>
                                        <td>{!! ($item->status==1)?"<badge class='badge badge-success'>Active</badge>":"<badge class='badge badge-warnning'>Inactive</badge>" !!}</td>
                                        <td>
                                            <div class="dropdown action_dropdown">
                                                <button class="btn dropdown-toggle action_btn" type="button"
                                                        id="dropdownMenuButton" data-toggle="dropdown"
                                                        aria-haspopup="true"
                                                        aria-expanded="false">
                                                    <i class="fa-solid fa-eye"></i>
                                                </button>
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                    @can('view-'.str_slug('PaymentMethod'))
                                                        <a href="{{ url('/paymentMethod/payment-method/' . $item->id) }}"
                                                           title="View {{ preg_replace('/(?<=[a-z])[A-Z]|[A-Z](?=[a-z])/', ' $0', 'PaymentMethod') }}">
                                                                <i class="fa fa-eye" aria-hidden="true"></i> View
                                                        </a>
                                                    @endcan

                                                    @can('edit-'.str_slug('PaymentMethod'))
                                                        <a href="{{ url('/paymentMethod/payment-method/' . $item->id . '/edit') }}"
                                                           title="Edit {{ preg_replace('/(?<=[a-z])[A-Z]|[A-Z](?=[a-z])/', ' $0', 'PaymentMethod') }}">
                                                                <i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit
                                                        </a>
                                                    @endcan

                                                    @can('delete-'.str_slug('PaymentMethod'))
                                                        <form method="POST"
                                                              action="{{ url('/paymentMethod/payment-method' . '/' . $item->id) }}"
                                                              accept-charset="UTF-8" style="display:inline">
                                                            {{ method_field('DELETE') }}
                                                            {{ csrf_field() }}
                                                            <button type="submit" class="" style="border: none;"
                                                                    title="Delete {{ preg_replace('/(?<=[a-z])[A-Z]|[A-Z](?=[a-z])/', ' $0', 'PaymentMethod') }}"
                                                                    onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete
                                                            </button>
                                                        </form>
                                                    @endcan
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $paymentmethod->appends(['search' => Request::get('search')])->render() !!} </div>
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
