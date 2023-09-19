@extends('layouts.master')

@push('css')
    <link href="{{asset('plugins/components/datatables/jquery.dataTables.min.css')}}" rel="stylesheet" type="text/css"/>
    <link href="https://cdn.datatables.net/buttons/1.2.2/css/buttons.dataTables.min.css" rel="stylesheet"
          type="text/css"/>
@endpush

@section('content')
<section class="detail_view_sec court_attendants_sec">
    <div class="container-fluid">
        <!-- .row -->
        <div class="row">
            <div class="col-sm-12">
                <div class="white-box">
                    <h3 class="box-title pull-left">{{ preg_replace('/(?<=[a-z])[A-Z]|[A-Z](?=[a-z])/', ' $0', 'CourtAttendantsNote') }}</h3>
                    @can('add-'.str_slug('CourtAttendantsNote'))
                        <a class="btn btn_black pull-right" href="{{ url('/courtAttendantsNote/court-attendants-note/create') }}">Add {{ preg_replace('/(?<=[a-z])[A-Z]|[A-Z](?=[a-z])/', ' $0', 'CourtAttendanceNote') }}</a>
                    @endcan
                    {{-- <div class="clearfix"></div>
                    <hr>
                    <div class="table-responsive">
                        <table class="table" id="myTable">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Case File Id</th><th>Category Id</th><th>Date Time</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($courtattendantsnote as $item)
                                <tr>
                                    <td>{{ $loop->iteration??$item->id }}</td>
                                    <td>{{ $item->case_file_id }}</td><td>{{ $item->category_id }}</td><td>{{ $item->date_time }}</td>
                                    <td>
                                        @can('view-'.str_slug('CourtAttendantsNote'))
                                            <a href="{{ url('/courtAttendantsNote/court-attendants-note/' . $item->id) }}"
                                               title="View {{ preg_replace('/(?<=[a-z])[A-Z]|[A-Z](?=[a-z])/', ' $0', 'CourtAttendantsNote') }}">
                                                <button class="btn btn-info btn-sm">
                                                    <i class="fa fa-eye" aria-hidden="true"></i> View
                                                </button>
                                            </a>
                                        @endcan

                                        @can('edit-'.str_slug('CourtAttendantsNote'))
                                            <a href="{{ url('/courtAttendantsNote/court-attendants-note/' . $item->id . '/edit') }}"
                                               title="Edit {{ preg_replace('/(?<=[a-z])[A-Z]|[A-Z](?=[a-z])/', ' $0', 'CourtAttendantsNote') }}">
                                                <button class="btn btn-primary btn-sm">
                                                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit
                                                </button>
                                            </a>
                                        @endcan

                                        @can('delete-'.str_slug('CourtAttendantsNote'))
                                            <form method="POST"
                                                  action="{{ url('/courtAttendantsNote/court-attendants-note' . '/' . $item->id) }}"
                                                  accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-sm"
                                                        title="Delete {{ preg_replace('/(?<=[a-z])[A-Z]|[A-Z](?=[a-z])/', ' $0', 'CourtAttendantsNote') }}"
                                                        onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete
                                                </button>
                                            </form>
                                        @endcan


                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <div class="pagination-wrapper"> {!! $courtattendantsnote->appends(['search' => Request::get('search')])->render() !!} </div>
                    </div> --}}
                    @foreach($courtattendantsnote as $item)
                        <div class="row" style="margin-top: 150px;">
                            <div class="col-md-12">
                                <div class="detail_top">
                                    <p><span>Date & Time:</span>26/10/2022  |  05:40 Pm {{ $item->date_time }}</p>
                                    <p><span>Category:</span>{{ $item->category->title }}</p>
                                    <p><span>Attachment:</span><a href="{{asset('website')}}/{{ $item->attachment }}" target="_blank">{{ $item->attachment }}</a></p>
                                </div>
                                <p><span>Notes:</span></p>
                                <p class="description_para">
                                    <textarea class="form-control description_para" rows="10" >{{ $item->note }}</textarea>
                                </p>
                            </div>
                        </div>
                    @endforeach
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
