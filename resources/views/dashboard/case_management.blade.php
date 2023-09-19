@extends('layouts.master')

@push('css')
<link href="{{asset('plugins/components/datatables/jquery.dataTables.min.css')}}" rel="stylesheet" type="text/css"/>
<link href="https://cdn.datatables.net/buttons/1.2.2/css/buttons.dataTables.min.css" rel="stylesheet"
      type="text/css"/>
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
</style>
@endpush

@section('content')
    <?php use Illuminate\Support\Str; ?>
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
                                    @if (!Auth::user()->hasRole('Senior Counsel') && !Auth::user()->hasRole('King Counsel') && !Auth::user()->hasRole('Paralegal') && !Auth::user()->hasRole('Junior Counsel'))
                                        <th>Case ID</th>
                                        <th>Name Of Parties</th>
                                        <th>Senior Counsel</th>
                                        <th>Junior Counsel</th>
                                        <th>Type Of Matter</th>
                                        <th>Status</th>
                                        <th>Last Attended Court</th>
                                        <th>Next Court Date</th>
                                        <th>Actions</th>
                                    @elseif (Auth::user()->hasRole('Chambers Manager'))
                                        <th>Case ID</th>
                                        <th>Client Name</th>
                                        <th>Name Of Parties</th>
                                        <th>Judge Name</th>
                                        <th>Type Of Matter</th>
                                        <th>Status</th>
                                        <th>Last Attended Court</th>
                                        <th>Next Court Date</th>
                                        <th>Action</th>
                                    @else
                                        <th>Case ID</th>
                                        <th>Client Name</th>
                                        <th>Name Of Parties</th>
                                        <th>Judge Name</th>
                                        <th>Type Of Matter</th>
                                        <th>Status</th>
                                        <th>Last Attended Court</th>
                                        <th>Next Court Date</th>
                                    @endif
                                </tr>
                                </thead>
                                <tbody>
                                @if (!Auth::user()->hasRole('Senior Counsel') && !Auth::user()->hasRole('King Counsel') && !Auth::user()->hasRole('Chambers Manager') && !Auth::user()->hasRole('Paralegal') && !Auth::user()->hasRole('Junior Counsel'))
                                    @foreach($casefile as $item)
                                        @if(Auth::user()->hasRole('attorney'))

                                            @foreach($item->clientCase as $value)
                                                <tr>
                                                    <td>{{ $value->case_number??'' }}</td>
                                                    <td title="{{$value->name_of_parties??''}}">{{ Str::limit($value->name_of_parties, 30) }}</td>
                                                    <td>
                                                        @foreach($value->seniorCounsels as $senior)
                                                            {{$senior->caseSeniorCounsel->name??''}}<br>
                                                        @endforeach
                                                    </td>
                                                    <td>
                                                        @foreach($value->JuniorCounsel as $senior)
                                                            {{$senior->caseJuniorCounsel->name??''}}<br>
                                                        @endforeach
                                                    </td>
                                                    <td>
                                                        @foreach($value->typeOfMatters as $matter)
                                                            {{$matter->caseTypeOfMatters->name??''}}<br>
                                                        @endforeach
                                                    </td>
                                                    <td>
                                                        @if($value->status == 0)
                                                            <select class="case_status comp_status">
                                                                <option @if($value->status == 0) selected @endif data-id="{{ $value->id }}" value="0">Complete</option>
                                                                <option @if($value->status == 1) selected @endif data-id="{{ $value->id }}" value="1">Active</option>
                                                            </select>
                                                        @else
                                                            <select class="case_status active_status">
                                                                <option @if($value->status == 0) selected @endif data-id="{{ $value->id }}" value="0">Complete</option>
                                                                <option @if($value->status == 1) selected @endif data-id="{{ $value->id }}" value="1">Active</option>
                                                            </select>
                                                        @endif
                                                    </td>
                                                    {{--<td>{{date('d-M-Y', strtotime($value->courtAttendantsNote->date??'No Data'))}}</td>--}}
                                                    <td>{{ isset($value->courtAttendantsNote) && $value->courtAttendantsNote->date ? date('d M Y', strtotime($value->courtAttendantsNote->date)) : 'No Data' }}</td>
                                                    <td>{{ isset($value->courtAttendantsNote) && $value->courtAttendantsNote->next_court_date ? date('d M Y', strtotime($value->courtAttendantsNote->next_court_date)) : 'No Data' }}</td>
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
                                                                <a class="dropdown-item" href="{{ url('/client/client/' . $value->client_id) }}">View Case Detail</a>
                                                                <a class="dropdown-item" href="{{route('court_attendants_notes', [$value->id])}}">Court Attendance Notes </a>
                                                                @foreach($value->originatingProcess as $process)
                                                                    <a class="dropdown-item" href="{{ url('originating_process', [$process->id]) }}">{{$process->process->name}}</a>
                                                                @endforeach
                                                                <a class="dropdown-item generate_master_file" value="{{ $value->id }}" >Generate Master File</a>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach

                                        @elseif(Auth::user()->hasRole('intern'))

                                            @foreach($item->clientCase as $value)
                                                <tr>
                                                    <td>{{ $value->case_number??'' }}</td>
                                                    <td title="{{$value->name_of_parties??''}}">{{ Str::limit($value->name_of_parties, 30) }}</td>
                                                    <td>
                                                        @foreach($value->seniorCounsels as $senior)
                                                            {{$senior->caseSeniorCounsel->name??''}}<br>
                                                        @endforeach
                                                    </td>
                                                    <td>
                                                        @foreach($value->JuniorCounsel as $senior)
                                                            {{$senior->caseJuniorCounsel->name??''}}<br>
                                                        @endforeach
                                                    </td>
                                                    <td>
                                                        @foreach($value->typeOfMatters as $matter)
                                                            {{$matter->caseTypeOfMatters->name??''}}<br>
                                                        @endforeach
                                                    </td>
                                                    <td>
                                                        @if($value->status == 0)
                                                            <select class="case_status comp_status">
                                                                <option @if($value->status == 0) selected @endif data-id="{{ $value->id }}" value="0">Complete</option>
                                                                <option @if($value->status == 1) selected @endif data-id="{{ $value->id }}" value="1">Active</option>
                                                            </select>
                                                        @else
                                                            <select class="case_status active_status">
                                                                <option @if($value->status == 0) selected @endif data-id="{{ $value->id }}" value="0">Complete</option>
                                                                <option @if($value->status == 1) selected @endif data-id="{{ $value->id }}" value="1">Active</option>
                                                            </select>
                                                        @endif
                                                    </td>
                                                    {{--<td>{{date('d-M-Y', strtotime($value->courtAttendantsNote->date??'No Data'))}}</td>--}}
                                                    <td>{{ isset($value->courtAttendantsNote) && $value->courtAttendantsNote->date ? date('d M Y', strtotime($value->courtAttendantsNote->date)) : 'No Data' }}</td>
                                                    <td>{{ isset($value->courtAttendantsNote) && $value->courtAttendantsNote->next_court_date ? date('d M Y', strtotime($value->courtAttendantsNote->next_court_date)) : 'No Data' }}</td>
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
                                                                <a class="dropdown-item" href="{{ url('/client/client/' . $value->client_id) }}">View Case Detail</a>
                                                                <a class="dropdown-item" href="{{route('court_attendants_notes', [$value->id])}}">Court Attendance Notes </a>
                                                                @foreach($value->originatingProcess as $process)
                                                                    <a class="dropdown-item" href="{{ url('originating_process', [$process->id]) }}">{{$process->process->name}}</a>
                                                                @endforeach
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach

                                        @else
                                            <tr>
                                                <td>{{ $item->case_number??'' }}</td>
                                                <td title="{{$item->name_of_parties??''}}">{{ Str::limit($item->name_of_parties, 30) }}</td>
                                                <td>
                                                    @foreach($item->seniorCounsels as $senior)
                                                        {{$senior->caseSeniorCounsel->name??''}}<br>
                                                    @endforeach
                                                </td>
                                                <td>
                                                    @foreach($item->JuniorCounsel as $senior)
                                                        {{$senior->caseJuniorCounsel->name??''}}<br>
                                                    @endforeach
                                                </td>
                                                <td>
                                                    @foreach($item->typeOfMatters as $matter)
                                                        {{$matter->caseTypeOfMatters->name??''}}<br>
                                                    @endforeach
                                                </td>
                                                {{--<td>{!! ($item->status==1)?"<badge class='badge badge-success'>Active</badge>":"<badge class='badge badge-warnning'>Inactive</badge>" !!}</td>--}}
                                                <td>
                                                    @if($item->status == 0)
                                                        <select class="case_status comp_status">
                                                            <option @if($item->status == 0) selected @endif data-id="{{ $item->id }}" value="0">Complete</option>
                                                            <option @if($item->status == 1) selected @endif data-id="{{ $item->id }}" value="1">Active</option>
                                                        </select>
                                                    @else
                                                        <select class="case_status active_status">
                                                            <option @if($item->status == 0) selected @endif data-id="{{ $item->id }}" value="0">Complete</option>
                                                            <option @if($item->status == 1) selected @endif data-id="{{ $item->id }}" value="1">Active</option>
                                                        </select>
                                                    @endif
                                                </td>
                                                <td>{{ isset($item->courtAttendantsNote) && $item->courtAttendantsNote->date ? date('d M Y', strtotime($item->courtAttendantsNote->date)) : 'No Data' }}</td>
                                                {{--<td>{{$item->courtAttendantsNote->next_court_date??'No Data'}}</td>--}}
                                                <td>{{ isset($item->courtAttendantsNote) && $item->courtAttendantsNote->next_court_date ? date('d M Y', strtotime($item->courtAttendantsNote->next_court_date)) : 'No Data' }}</td>
                                                <td>
                                                <!-- @can('view-'.str_slug('CaseFile'))
                                                    <a href="{{ url('/client/client/' . $item->client_id) }}"
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
                                                        <button class="btn dropdown-toggle action_btn assign_attorney" value="{{$item->attorney_associate_id->attorneyOrAssociate->id??''}}" data-id="{{$item->client->id}}" type="button"
                                                                id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                                                aria-expanded="false">
                                                            <i class="fa-solid fa-eye"></i>
                                                        </button>
                                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                            <a class="dropdown-item" href="{{ url('/client/client/' . $item->client_id) }}">View Case Detail</a>
                                                            <a class="dropdown-item" href="{{ route('edit_case_file', [$item->id]) }}">Edit Case Detail</a>
                                                            {{--<a class="dropdown-item" href="#" alt="default" data-toggle="modal"data-target="#assign_attorney_modal">Assign To New Attorney</a>--}}
                                                            <a class="dropdown-item" href="{{route('court_attendants_notes', [$item->id])}}">Court Attendance Notes </a>
                                                            @if(isset($item->billOfCost)  && $item->billOfCost !=null)
                                                                <a class="dropdown-item" href="{{ url('have_billofcost', [$item->id]) }}">Have Bill Of Cost</a>
                                                            @else
                                                                <a class="dropdown-item" href="{{route('bill_of_cost', [$item->id ,'case'])}}">Generate Bill Of Cost</a>
                                                            @endif
                                                            <a class="dropdown-item generate_master_file" value="{{ $item->id }}" >Generate Master File</a>
                                                            <a class="dropdown-item" href="{{route('case_accounting', [$item->id])}}">Accounts</a>
                                                            @foreach($item->originatingProcess as $process)
                                                                <a class="dropdown-item" href="{{ url('originating_process', [$process->id]) }}">{{$process->process->name}}</a>
                                                            @endforeach
                                                            <a class="dropdown-item cases" href="#" value="{{$item->id}}" alt="default" data-toggle="modal">Cases</a>
                                                            <a class="dropdown-item assign_case" data-case-id="{{$item->id??''}}" value="{{$item->client_id}}" alt="default" data-toggle="modal">Assigned Case</a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endif
                                    @endforeach
                                @endif
                                @if(Auth::user()->hasRole('Senior Counsel') || Auth::user()->hasRole('Junior Counsel') || Auth::user()->hasRole('Paralegal') || Auth::user()->hasRole('King Counsel'))
                                    @foreach($casefile as $item)
                                        <tr>
                                            <td>{{@$item->case_number??''}}</td>
                                            <td>{{@$item->client->name}}</td>
                                            <td>{{@$item->name_of_parties??''}}</td>
                                            <td>{{@$item->judge_name??''}}</td>
                                            <td>
                                                @foreach($item->typeOfMatters as $matter)
                                                    {{@$matter->caseTypeOfMatters->name??''}}<br>
                                                @endforeach
                                            </td>
                                            <td>
                                                @if($item->status == 0)
                                                    <a class="comp_status">
                                                        Complete
                                                    </a>
                                                @else
                                                    <a class="active_status">
                                                        Active
                                                    </a>
                                                @endif
                                            </td>
                                            <td>{{ isset($item->courtAttendantsNote) && $item->courtAttendantsNote->date ? date('d M Y', strtotime($item->courtAttendantsNote->date)) : 'No Data' }}</td>
                                            <td>{{ isset($item->courtAttendantsNote) && $item->courtAttendantsNote->next_court_date ? date('d M Y', strtotime($item->courtAttendantsNote->next_court_date)) : 'No Data' }}</td>
                                        </tr>
                                    @endforeach
                                @elseif(Auth::user()->hasRole('Chambers Manager'))
                                    @foreach($casefile as $item)
                                        <tr>
                                            <td>{{@$item->case_number??''}}</td>
                                            <td>{{@$item->client->name}}</td>
                                            <td>{{@$item->name_of_parties??''}}</td>
                                            <td>{{@$item->judge_name??''}}</td>
                                            <td>
                                                @foreach($item->typeOfMatters as $matter)
                                                    {{@$matter->caseTypeOfMatters->name??''}}<br>
                                                @endforeach
                                            </td>
                                            <td>
                                                @if($item->status == 0)
                                                    <a class="comp_status">
                                                        Complete
                                                    </a>
                                                @else
                                                    <a class="active_status">
                                                        Active
                                                    </a>
                                                @endif
                                            </td>
                                            <td>{{ isset($item->courtAttendantsNote) && $item->courtAttendantsNote->date ? date('d M Y', strtotime($item->courtAttendantsNote->date)) : 'No Data' }}</td>
                                            <td>{{ isset($item->courtAttendantsNote) && $item->courtAttendantsNote->next_court_date ? date('d M Y', strtotime($item->courtAttendantsNote->next_court_date)) : 'No Data' }}</td>
                                            <td>
                                                <div class="dropdown action_dropdown">
                                                    <button class="btn dropdown-toggle action_btn" type="button"
                                                            id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                                            aria-expanded="false">
                                                        <i class="fa-solid fa-eye"></i>
                                                    </button>
                                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                        <a class="dropdown-item" href="{{ url('/client/client/' . $item->client_id) }}">View Case Detail</a>
                                                    <!-- <a class="dropdown-item" href="{{route('court_attendants_notes', [$item->id])}}">Court Attendents Notes </a>
                                                        @foreach($item->originatingProcess as $process)
                                                        <a class="dropdown-item" href="{{ url('originating_process', [$process->id]) }}">{{$process->process->name}}</a>
                                                        @endforeach
                                                            <a class="dropdown-item generate_master_file" value="{{ $item->id }}" >Generate Master File</a> -->
                                                        @if(isset($item->billOfCost)  && $item->billOfCost !=null)
                                                            <a class="dropdown-item" href="{{ url('have_billofcost', [$item->id]) }}">Have Bill Of Cost</a>
                                                        @else
                                                            <a class="dropdown-item" href="{{route('bill_of_cost', [$item->id ,'case'])}}">Generate Bill Of Cost</a>
                                                        @endif
                                                        @if(isset($item->caseInvoice)  && $item->caseInvoice !=null)
                                                            <a class="dropdown-item" href="{{ url('have_invoice', [$item->id]) }}">Have Invoice</a>
                                                        @else
                                                            <a class="dropdown-item" href="{{ url('create_invoice', [$item->id]) }}">Create Invoice</a>
                                                        @endif
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                                </tbody>
                            </table>
                            {{-- <div class="pagination-wrapper"> {!! $casefile->appends(['search' => Request::get('search')])->render() !!} </div> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @if (!Auth::user()->hasRole('Senior Counsel') && !Auth::user()->hasRole('Junior Counsel') && !Auth::user()->hasRole('King Counsel') && !Auth::user()->hasRole('Chambers Manager') && !Auth::user()->hasRole('Paralegal'))
        <div id="assign_attorney_modal"  class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">

        </div>


        <div id="master_file_modal"  class="modal fade bs-example-modal-lg" tabindex="-1"  aria-labelledby="myLargeModalLabel" aria-hidden="true" >

        </div>

        <div id="cases"  class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">

        </div>

    @endif

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

    // $(function () {
    //         $('#myTable').DataTable({
    //             'aoColumnDefs': [{
    //                 'bSortable': false,
    //                 'aTargets': [-1] /* 1st one, start by the right */
    //             }]
    //         });
    //             "ordering": false,
    //     });
    $(function () {
    $('#myTable').DataTable({
        "ordering": false, // disable sorting on all columns
        "paging": true, // enable pagination
        "searching": true // enable search
    });
});
    $(document).on('click','.generate_master_file',function(e){
        e.preventDefault();
        var case_file_id = $(this).attr('value');
        $.ajax({
            type: 'GET', //THIS NEEDS TO BE GET
            url: "{{ route('generate_master_file') }}/"+case_file_id,
            success: function (data) {
                $('#master_file_modal').html(data);
                $('#master_file_modal').modal('show');
            },
            error: function() {
                $('#master_file_modal').html('');
                $('#master_file_modal').modal('show');

            }
        });
    });
    $(document).on('click','.assign_case',function(e){
        e.preventDefault();
        var client_id = $(this).attr('value');
        var case_id = $(this).data('case-id');
        $.ajax({
            type: 'GET',
            url: "{{ route('assigned_case_attorney') }}/" + client_id + "/" + case_id,
            success: function (data) {
                $('#assign_attorney_modal').html(data);
                $('#assign_attorney_modal').modal('show');
            },
            error: function() {
                $('#assign_attorney_modal').html('');
                $('#assign_attorney_modal').modal('show');

            }
        });
    });
</script>
<script>
    $(document).on('change','.case_status',function(e){
        val = $(this).val();
        id = $('option:selected', this).attr('data-id');
        $.ajax({
            type: 'get',
            url: "{{route('case_status')}}",
            data:{val:val,id:id},
            success: function(result) {
                Swal.fire({
                    title: result.result,
                    html: result.msg,
                    icon:result.result,
                    timer: 5000,
                    buttons: false,
                }).then((value) => {
                    location.reload();
            });
            },
            error : function(error) {
                showSwal('OOPS','Network Problem.','error');
            }
        });
    });

     $(document).on('click','.assign_attorney',function(e){
        var old_attorney = $(this).attr('value');
        var client_id = $(this).attr('data-id');
        $('#old_attorney_id').val(old_attorney);
        $('#client_id').val(client_id);
     });
    $(document).on('click','.cases',function(e){
        e.preventDefault();
        var case_id = $(this).attr('value');
        $.ajax({
            type: 'GET', //THIS NEEDS TO BE GET
            url: "{{ route('get_case') }}/"+case_id,
            success: function (data) {
                $('#cases').html(data);
                $('#cases').modal('show');
            },
            error: function() {
                $('#cases').html('');
                $('#cases').modal('show');

            }
        });
    });
</script>
@endpush
