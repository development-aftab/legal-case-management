@extends('layouts.master')

@push('css')
    <link href="{{asset('plugins/components/datatables/jquery.dataTables.min.css')}}" rel="stylesheet" type="text/css"/>
    <link href="https://cdn.datatables.net/buttons/1.2.2/css/buttons.dataTables.min.css" rel="stylesheet"
          type="text/css"/>
@endpush

@section('content')
    <section class="bill_cost_sec">
        <div class="container-fluid">
        <!-- .row -->
        <div class="row">
            <div class="col-sm-12">
                <div class="white-box">
                    <h3 class="box-title pull-left">{{ preg_replace('/(?<=[a-z])[A-Z]|[A-Z](?=[a-z])/', ' $0', 'BillOfCost') }}</h3>
                    <a style="margin-left: 10px" href="{{ url()->previous() }}" class="btn btn_black pull-right model_img img-responsive">Back</a>
                    @can('add-'.str_slug('BillOfCost'))
                        <a class="btn btn_black pull-right" href="{{route('bill_of_cost', [$billofcost[0]->casefile->id ,'case'])}}">Add {{ preg_replace('/(?<=[a-z])[A-Z]|[A-Z](?=[a-z])/', ' $0', 'New') }}</a>
                    @endcan
                    <div class="clearfix"></div>
                    <hr>
                    <div class="inner_section_table">
                        <div class="table-responsive">
                            <table class="table" id="myTable">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Case Name</th>
                                    <th>Download</th>
                                    <th>Active</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($billofcost as $item)
                                    <tr>
                                        <td>{{ $loop->iteration??$item->id }}</td>
                                        <td>{{ $item->casefile->name_of_parties }}</td>
                                        <td><a href="{{route('cost_pdf')}}/{{$item->id}}" target="_blank" class=""><img class="img-fluid" src="{{asset('website')}}/assets/images/doc-icon.png" alt=""></a></td>
                                        <td>
                                            {{--@can('view-'.str_slug('BillOfCost'))--}}
                                                {{--<a href="{{ url('/billOfCost/bill-of-cost/' . $item->id) }}"--}}
                                                   {{--title="View {{ preg_replace('/(?<=[a-z])[A-Z]|[A-Z](?=[a-z])/', ' $0', 'BillOfCost') }}">--}}
                                                    {{--<button class="btn btn-info btn-sm">--}}
                                                        {{--<i class="fa fa-eye" aria-hidden="true"></i> View--}}
                                                    {{--</button>--}}
                                                {{--</a>--}}
                                            {{--@endcan--}}

                                            {{--@can('edit-'.str_slug('BillOfCost'))--}}
                                                {{--<a href="{{ url('/billOfCost/bill-of-cost/' . $item->id . '/edit') }}"--}}
                                                   {{--title="Edit {{ preg_replace('/(?<=[a-z])[A-Z]|[A-Z](?=[a-z])/', ' $0', 'BillOfCost') }}">--}}
                                                    {{--<button class="btn btn-primary btn-sm">--}}
                                                        {{--<i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit--}}
                                                    {{--</button>--}}
                                                {{--</a>--}}
                                            {{--@endcan--}}

                                            @can('delete-'.str_slug('BillOfCost'))
                                                <form method="POST"
                                                      action="{{ url('/billOfCost/bill-of-cost' . '/' . $item->id) }}"
                                                      accept-charset="UTF-8" style="display:inline">
                                                    {{ method_field('DELETE') }}
                                                    {{ csrf_field() }}
                                                    <button type="submit" class="btn btn_black btn-sm"
                                                            title="Delete {{ preg_replace('/(?<=[a-z])[A-Z]|[A-Z](?=[a-z])/', ' $0', 'BillOfCost') }}"
                                                            onclick="return confirm(&quot;Confirm delete?&quot;)">
                                                        <i style="color: red;" class="fa fa-times" aria-hidden="true"></i>
                                                    </button>
                                                </form>
                                            @endcan
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $billofcost->appends(['search' => Request::get('search')])->render() !!} </div>
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
                'aoColumnDefs': [{
                    'bSortable': false,
                    'aTargets': [-1] /* 1st one, start by the right */
                }]
            });

        });
    </script>

@endpush
