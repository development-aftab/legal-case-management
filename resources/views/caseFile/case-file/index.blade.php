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
                    <h3 class="box-title pull-left">{{ preg_replace('/(?<=[a-z])[A-Z]|[A-Z](?=[a-z])/', ' $0', 'CaseManagement') }}</h3>
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
                                <th>Case ID</th>
                                <th>Name Of Parties</th>
                                <th>Instruction Attorney</th>
                                <th>Junior Counsel</th>
                                <th>Type Of Matter</th>
                                <th>Status</th>
                                <th>Last Attended Court</th>
                                <th>Next Court Date</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($casefile as $item)
                                    @if(Auth::user()->hasRole('attorney'))
                                        @foreach($item->clientCase as $value)
                                        <tr>
                                            <td>{{ $value->case_number??'' }}</td>
                                            <td>{{$value->name_of_parties??''}}</td>
                                            <td>{{$value->instructionAttorney->name??''}}</td>
                                            <td>{{$value->juniorAttorney->name??''}}</td>
                                            <td>{{$value->typeOfMatter->name??''}}</td>
                                            <td>{!! ($value->status??''==1)?"<badge class='badge badge-success'>Active</badge>":"<badge class='badge badge-warnning'>Inactive</badge>" !!}</td>
                                            <td>No Data</td><td>No Data</td>
                                            <td>
                                                <!-- @can('view-'.str_slug('CaseFile'))
                                                    <a href="{{ url('/caseFile/case-file/' . $value->id) }}"
                                                       title="View {{ preg_replace('/(?<=[a-z])[A-Z]|[A-Z](?=[a-z])/', ' $0', 'CaseFile') }}">
                                                        <button class="btn btn-info btn-sm">
                                                            <i class="fa fa-eye" aria-hidden="true"></i> View
                                                        </button>
                                                    </a>
                                                @endcan

                                                @can('edit-'.str_slug('CaseFile'))
                                                    <a href="{{ url('/caseFile/case-file/' . $value->id . '/edit') }}"
                                                       title="Edit {{ preg_replace('/(?<=[a-z])[A-Z]|[A-Z](?=[a-z])/', ' $0', 'CaseFile') }}">
                                                        <button class="btn btn-primary btn-sm">
                                                            <i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit
                                                        </button>
                                                    </a>
                                                @endcan

                                                @can('delete-'.str_slug('CaseFile'))
                                                    <form method="POST"
                                                          action="{{ url('/caseFile/case-file' . '/' . $value->id) }}"
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
                                                            <a class="dropdown-item" href="{{ url('/caseFile/case-file/' . $value->id) }}">View Case Detail</a>
                                                            <a class="dropdown-item" href="{{url('court_attendants_notes')}}">Court Attendance Notes </a>
                                                        </div>
                                                    </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                        <td>{{ $item->case_number??'' }}</td>
                                        <td>{{ $item->name_of_parties }}</td>
                                        <td>{{ $item->instructionAttorney->name??'' }}</td>
                                        <td>{{$item->seniorCounsel->name??''}}</td>
                                        <td>{{$item->typeOfMatter->name}}</td>
                                        <td>{!! ($item->status==1)?"<badge class='badge badge-success'>Active</badge>":"<badge class='badge badge-warnning'>Inactive</badge>" !!}</td>
                                        <td>No Data</td><td>No Data</td>
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
                                                        <a class="dropdown-item" href="{{ url('/caseFile/case-file/' . $item->id) }}">View Case Detail</a>
                                                        <a class="dropdown-item" href="{{url('court_attendants_notes')}}">Court Attendance Notes </a>
                                                    </div>
                                                </div>
                                        </td>
                                    @endif         
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
