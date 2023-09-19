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
                    <h3 class="box-title pull-left">{{ preg_replace('/(?<=[a-z])[A-Z]|[A-Z](?=[a-z])/', ' $0', 'Allocatur') }}</h3>
                    <!-- @can('add-'.str_slug('Allocatur'))
                        <a class="btn btn-success pull-right" href="{{ url('/allocatur/allocatur/create') }}"><i
                                    class="icon-plus"></i> Add {{ preg_replace('/(?<=[a-z])[A-Z]|[A-Z](?=[a-z])/', ' $0', 'Allocatur') }}</a>
                    @endcan -->
                    <div class="filter_btn pull-right">
                        <a class="btn btn_black model_img img-responsive" data-toggle="modal" data-target="#responsive-modal">Add File</a>
                        <a href="{{ url()->previous() }}" class="btn btn_black model_img img-responsive">Back</a>
                    </div>
                    <div class="clearfix"></div>
                    <hr>
                    <div class="inner_section_table">
                        <div class="table-responsive">
                        <table class="table" id="myTable">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Case Party Name</th><th>Attachment</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($allocatur as $item)
                                <tr>
                                    <td>{{ $loop->iteration??$item->id }}</td>
                                    <td>{{ $item->casefile->name_of_parties }}</td>
                                    <td>
                                        <a class="btn doc_btn" type="button" href="{{asset('website')}}/{{ $item->attachment }}" target="_blank">
                                            <img class="img-fluid" src="{{asset('website')}}/assets/images/doc-icon.png" alt="">
                                        </a>
                                    </td>
                                    </td>
                                    <td>
                                        @can('view-'.str_slug('Allocatur'))
                                            <a href="{{ url('/allocatur/allocatur/' . $item->id) }}"
                                               title="View {{ preg_replace('/(?<=[a-z])[A-Z]|[A-Z](?=[a-z])/', ' $0', 'Allocatur') }}">
                                                <button class="btn btn-info btn-sm">
                                                    <i class="fa fa-eye" aria-hidden="true"></i> View
                                                </button>
                                            </a>
                                        @endcan

                                        @can('edit-'.str_slug('Allocatur'))
                                            <a href="{{ url('/allocatur/allocatur/' . $item->id . '/edit') }}"
                                               title="Edit {{ preg_replace('/(?<=[a-z])[A-Z]|[A-Z](?=[a-z])/', ' $0', 'Allocatur') }}">
                                                <button class="btn btn-primary btn-sm">
                                                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit
                                                </button>
                                            </a>
                                        @endcan

                                        @can('delete-'.str_slug('Allocatur'))
                                            <form method="POST"
                                                  action="{{ url('/allocatur/allocatur' . '/' . $item->id) }}"
                                                  accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn_black btn-sm" title="Delete {{ preg_replace('/(?<=[a-z])[A-Z]|[A-Z](?=[a-z])/', ' $0', 'Allocatur') }}" onclick="return confirm(&quot;Confirm delete?&quot;)">
                                                <i style="color: #d5af2a;" class="fa fa-times" aria-hidden="true"></i>
                                                </button>
                                            </form>
                                        @endcan


                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <div class="pagination-wrapper"> {!! $allocatur->appends(['search' => Request::get('search')])->render() !!} </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="responsive-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×
                    </button>
                    <h4 class="modal-title">Add New</h4></div>
                    <form id="allocatur_form" method="POST" action="{{ url('/allocatur/allocatur') }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="message-text" class="control-label">File:</label>
                                <input class="form-control" name="attachment" type="file" id="file" accept="application/pdf" value="{{ $allocatur->attachment??''}}" >
                                <input type="hidden" name="case_file_id" value="{{$caseFileId}}">
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
        $(document).ready(function(){
            $("#allocatur_form").validate({
                // Specify validation rules
                rules: {
                    attachment: "required",
                },
                messages: {
                    attachment: {
                        required: "Please Put Attachment",
                    },
                },
            });
        });
    </script>
@endpush
