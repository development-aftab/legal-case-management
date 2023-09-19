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
    @php
        $currentURL = request()->url();
    @endphp
    <div class="container-fluid">
        <!-- .row -->
        <div class="row">
            <div class="col-sm-12">
                <div class="white-box">
                    @if(str_contains($currentURL, 'case_senior_counsel'))
                        <h3 class="box-title pull-left">Case Senior Counsel</h3>
                    @elseif(str_contains($currentURL, 'case_junior_counsel'))
                        <h3 class="box-title pull-left">Case Junior Counsel</h3>
                    @elseif(str_contains($currentURL, 'case_king_counsel'))
                        <h3 class="box-title pull-left">Case King Counsel</h3>
                    @elseif(str_contains($currentURL, 'case_paralegal'))
                        <h3 class="box-title pull-left">Case Paralegal Counsel</h3>
                    @endif
                    {{--<h3 class="box-title pull-left">{{ preg_replace('/(?<=[a-z])[A-Z]|[A-Z](?=[a-z])/', ' $0', 'Case SeniorCounsel') }}</h3>--}}
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
                                    <th>Client Name</th>
                                    <th>Name Of Parties</th>
                                    <th>Judge Name</th>
                                    <th>Type Of Matter</th>
                                    <th>Status</th>
                                    <th>Last Attended Court</th>
                                    <th>Next Court Date</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @if(isset($casefile) && $casefile!=null)
                                        @foreach($casefile as $item)
                                            <tr>
                                                <td>{{ @$item->case_number??'' }}</td>
                                                <td>{{ @$item->client->name ??''}}</td>
                                                <td>{{ @$item->name_of_parties ??''}}</td>
                                                <td>{{ @$item->judge_name ??''}}</td>
                                                <!-- <td>
                                                    @foreach($item->seniorCounsels as $senior)
                                                        {{$senior->caseSeniorCounsel->name??''}}<br>
                                                    @endforeach
                                                </td>
                                                <td>
                                                    @foreach($item->kingCounsels as $senior)
                                                        {{$senior->caseKingCounsel->name??''}}<br>
                                                    @endforeach
                                                </td> -->
                                                <td>
                                                    @foreach($item->typeOfMatters as $matter)
                                                        {{$matter->caseTypeOfMatters->name??''}}<br>
                                                    @endforeach
                                                </td>
                                                <td>{!! ($item->status==1)?"<badge class='badge badge-success'>Active</badge>":"<badge class='badge badge-warnning'>Inactive</badge>" !!}</td>
                                                <!-- <td>
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
                                                </td> -->
                                                <td>{{ isset($item->courtAttendantsNote) && $item->courtAttendantsNote->date ? date('d M Y', strtotime($item->courtAttendantsNote->date)) : 'No Data' }}</td>
                                                <td>{{ isset($item->courtAttendantsNote) && $item->courtAttendantsNote->next_court_date ? date('d M Y', strtotime($item->courtAttendantsNote->next_court_date)) : 'No Data' }}</td>
                                                <td>
                                                    <div class="dropdown action_dropdown">
                                                        <button class="btn dropdown-toggle action_btn assign_attorney" value="{{$item->attorney_associate_id->attorneyOrAssociate->id??''}}" data-id="{{$item->client->id}}" type="button"
                                                                id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                                                aria-expanded="false">
                                                            <i class="fa-solid fa-eye"></i>
                                                        </button>
                                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                            <a class="dropdown-item" href="{{ url('/client/client/' . $item->client_id) }}">View Case Detail</a>
                                                            <a class="dropdown-item" href="{{route('court_attendants_notes', [$item->id])}}">Court Attendents Notes </a>
                                                            @foreach($item->originatingProcess as $process)
                                                                <a class="dropdown-item" href="{{ url('originating_process', [$process->id]) }}">{{$process->process->name}}</a>
                                                            @endforeach
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


    <div id="master_file_modal"  class="modal fade bs-example-modal-lg" tabindex="-1"  aria-labelledby="myLargeModalLabel" aria-hidden="true" >

    </div>

@endsection

@push('js')
<script src="{{asset('plugins/components/toast-master/js/jquery.toast.js')}}"></script>

<script src="{{asset('plugins/components/datatables/jquery.dataTables.min.js')}}"></script>

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
</script>
@endpush
