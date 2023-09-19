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
                    <h3 class="box-title pull-left">{{ preg_replace('/(?<=[a-z])[A-Z]|[A-Z](?=[a-z])/', ' $0', 'Shortcut') }}</h3>
                    {{--@can('add-'.str_slug('Shortcut'))--}}
                        {{--<a class="btn btn_yellow pull-right" href="{{ url('/shortcut/shortcut/create') }}"><i--}}
                                    {{--class="icon-plus"></i> Add {{ preg_replace('/(?<=[a-z])[A-Z]|[A-Z](?=[a-z])/', ' $0', 'Shortcut') }}</a>--}}
                    {{--@endcan--}}
                    <a class="btn btn_black model_img img-responsive pull-right" data-toggle="modal" data-target="#shortcut_modal">Add Shortcut</a>
                    <div class="clearfix"></div>
                    <hr>
                    <div class="inner_section_table">
                    <div class="table-responsive">
                        <table class="table" id="myTable">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th><th>Url</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($shortcut as $item)
                                <tr>
                                    <td>{{ $loop->iteration??$item->id }}</td>
                                    <td>{{ $item->name }}</td><td>{{ $item->url }}</td>
                                    <td>
                                        {{--@can('view-'.str_slug('Shortcut'))--}}
                                            {{--<a href="{{ url('/shortcut/shortcut/' . $item->id) }}"--}}
                                               {{--title="View {{ preg_replace('/(?<=[a-z])[A-Z]|[A-Z](?=[a-z])/', ' $0', 'Shortcut') }}">--}}
                                                {{--<button class="btn btn-info btn-sm">--}}
                                                    {{--<i class="fa fa-eye" aria-hidden="true"></i> View--}}
                                                {{--</button>--}}
                                            {{--</a>--}}
                                        {{--@endcan--}}

                                        @can('edit-'.str_slug('Shortcut'))
                                            <a href="{{ url('/shortcut/shortcut/' . $item->id . '/edit') }}"
                                               title="Edit {{ preg_replace('/(?<=[a-z])[A-Z]|[A-Z](?=[a-z])/', ' $0', 'Shortcut') }}">
                                                <button class="btn btn-primary btn-sm">
                                                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit
                                                </button>
                                            </a>
                                        @endcan

                                        @can('delete-'.str_slug('Shortcut'))
                                            <form method="POST"
                                                  action="{{ url('/shortcut/shortcut' . '/' . $item->id) }}"
                                                  accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn_black btn-sm" title="Delete {{ preg_replace('/(?<=[a-z])[A-Z]|[A-Z](?=[a-z])/', ' $0', 'Shortcut') }}" onclick="return confirm(&quot;Confirm delete?&quot;)">
                                                    <i style="color: #d5af2a;" class="fa fa-times" aria-hidden="true"></i>
                                                </button>
                                            </form>
                                        @endcan


                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <div class="pagination-wrapper"> {!! $shortcut->appends(['search' => Request::get('search')])->render() !!} </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div id="shortcut_modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×
                    </button>
                        <h4 class="modal-title">Add Shortcut</h4></div>
                <form method="POST" id="shortcut_form" action="{{ url('/shortcut/shortcut') }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="message-text" class="control-label">ShortCut Name</label>
                            <input class="form-control" name="name" id="name">
                        </div>
                        <div class="form-group">
                            <label for="message-text" class="control-label">Shortcut Url</label>
                            <input class="form-control" name="url" type="text" id="url" >
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

        $(document).ready(function(){
            $("#shortcut_form").validate({
                // Specify validation rules
                rules: {
                    name: "required",
                    url: "required",
                },
                messages: {
                    name: {
                        required: "Please Enter Name",
                    },
                    url: {
                        required: "Please Enter URL",
                    },
                },
            });
        });
    </script>

@endpush
