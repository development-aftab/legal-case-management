@extends('layouts.master')

@push('css')
    <link href="{{asset('plugins/components/datatables/jquery.dataTables.min.css')}}" rel="stylesheet" type="text/css"/>
    <link href="https://cdn.datatables.net/buttons/1.2.2/css/buttons.dataTables.min.css" rel="stylesheet"
          type="text/css"/>
@endpush

@section('content')
<section class="attorney_associate_sec">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 col-lg-12 col-xs-12">
                    <div class="inner_section_heading_wrapper">
                        <!-- <div class="top_heading">
                            <h1>Attorney/Associates</h1>
                        </div> -->
                        <div class="pagination"></div>
                        <div class="search_form">
                            <div class="filter_btn">
                                <select name="" aria-controls="" class="filter_select custom_filter">
                                <option value="" @if(true)  selected disabled hidden  @endif >Filter</option>
                                    @foreach($roles as $key => $role)
                                        <option value="{{$role->name}}" @if(isset($filter) && $role->name==$filter) selected @endif >{{ ucwords($role->name) }}</option>
                                    @endforeach
                                    <option value="clear_filter">Clear Filter</option>
                                </select>
                                @can('add-'.str_slug('AttorneyAssociate'))
                                    <a class="btn btn_yellow pull-right btn_icon" href="{{ url('/attorneyAssociate/attorney-associate/create') }}">
                                        {{ preg_replace('/(?<=[a-z])[A-Z]|[A-Z](?=[a-z])/', ' $0', 'Create') }}<i class="fa fa-pencil"></i>
                                    </a>
                                @endcan
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 col-lg-12 col-xs-12">
                    <div class="inner_section_table">
                        <div class="table-responsive">
                            <table class="table table-fixed sticker_table" id='myTable'>
                                <thead>
                                <tr>
                                    <th scope="col">Name</th>
                                    <th scope="col">E-mail</th>
                                    <th scope="col">Title</th>
                                    <th scope="col">Address</th>
                                    <th scope="col">Contact No</th>
                                    <th scope="col">BAR Number</th>
                                    <th scope="col">BIO</th>
                                    <th scope="col">DOB</th>
                                    <th scope="col">Resume (Doc)</th>
                                    <th scope="col">Practicing Certificate</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($attorneyassociate as $item)
                                    <tr>
                                        <td>{{$item->name}}</td>
                                        <td>{{$item->email}}</td>
                                        <td>{{ucwords($item->roles[0]->name)}}</td>
                                        <td>{!! substr($item->profile->address,0,15).'...' !!}</td>
                                        <td>{{$item->contact}}</td>
                                        <td>
                                            @if(isset($item->roles[0]) && $item->roles[0]->name=='secretary')
                                            No Data
                                            @else
                                            {{$item->bar_number}}
                                            @endif
                                        </td>
                                        <td>{!! substr($item->profile->bio,0,15).'...' !!}</td>
                                        <td>{{$item->profile->dob}}</td>
                                        <td>
                                            @if(isset($item->resume) && $item->resume==null)
                                                No File
                                            @else
                                                <a class="btn doc_btn" type="button" href="{{asset('website')}}/{{$item->resume}}" target="_blank">
                                                    <img class="img-fluid" src="{{asset('website')}}/assets/images/doc-icon.png" alt="">
                                                </a>
                                            @endif
                                        </td>
                                        <td>
                                            @if(isset($item->certificate) && $item->certificate==null)
                                                No File
                                            @else
                                                <a class="btn doc_btn" type="button" href="{{asset('website')}}/{{$item->certificate}}" target="_blank">
                                                    <img class="img-fluid" src="{{asset('website')}}/assets/images/doc-icon.png" alt="">
                                                </a>
                                            @endif
                                        </td>
                                        <th><span>@if($item->status==1) Active @else Deactivate @endif</span></th>
                                        <td>
                                            <div class="dropdown action_dropdown">
                                                <button class="btn dropdown-toggle action_btn assign_attorney" type="button"
                                                        id="dropdownMenuButton" value="{{ $item->id }}" data-toggle="dropdown"
                                                        aria-haspopup="true"
                                                        aria-expanded="false">
                                                    <i class="fa-solid fa-eye"></i>
                                                </button>
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                    @if(isset($item->roles[0]) && $item->roles[0]->name=='attorney')
                                                       <a class="dropdown-item" href="#" alt="default" data-toggle="modal"data-target="#assign_attorney_modal">Assign To New Attorney</a>
                                                    @elseif(isset($item->roles[0]) && $item->roles[0]->name=='associate')
                                                        <a class="dropdown-item" href="#" alt="default" data-toggle="modal"data-target="#assign_attorney_modal">Assign To New Attorney</a>
                                                    @elseif(isset($item->roles[0]) && $item->roles[0]->name=='intern')
                                                        <a class="dropdown-item" href="#" alt="default" data-toggle="modal"data-target="#assign_attorney_modal">Assign To New Attorney</a>
                                                    @endif
                                                    @can('view-'.str_slug('AttorneyAssociate'))
                                                        <a class="dropdown-item" href="{{ url('/attorneyAssociate/attorney-associate/' . $item->id) }}" title="View {{ preg_replace('/(?<=[a-z])[A-Z]|[A-Z](?=[a-z])/', ' $0', 'AttorneyAssociate') }}">
                                                            View
                                                        </a>
                                                    @endcan
                                                    @can('edit-'.str_slug('AttorneyAssociate'))
                                                        <a class="dropdown-item" href="{{ url('/attorneyAssociate/attorney-associate/' . $item->id . '/edit') }}" title="Edit {{ preg_replace('/(?<=[a-z])[A-Z]|[A-Z](?=[a-z])/', ' $0', 'AttorneyAssociate') }}">
                                                            Edit
                                                        </a>
                                                    @endcan
                                                    <!-- <a class="dropdown-item" href="#">Deactivate</a> -->
                                                    @if($item->status==1)
                                                        <a class="dropdown-item" href="{{route('attorneyAssociate_status',[$item->id, 0])}}">Deactivate</a>
                                                    @else
                                                        <a class="dropdown-item" href="{{route('attorneyAssociate_status',[$item->id, 1])}}">Activate</a>
                                                    @endif
                                                    @if($item->delete_status==1)
                                                        <a class="dropdown-item" href="{{route('attorneyAssociate_delete',[$item->id, 0])}}">Delete</a>
                                                    @endif
                                                    @if(isset($item->roles[0]) && $item->roles[0]->name=='attorney')
                                                        <a class="dropdown-item clients" href="#" value="{{$item->id}}" alt="default" data-toggle="modal">Clients</a>
                                                    @elseif(isset($item->roles[0]) && $item->roles[0]->name=='associate')
                                                        <a class="dropdown-item clients" href="#" value="{{$item->id}}" alt="default" data-toggle="modal">Clients</a>
                                                    @elseif(isset($item->roles[0]) && $item->roles[0]->name=='intern')
                                                        <a class="dropdown-item clients" href="#" value="{{$item->id}}" alt="default" data-toggle="modal">Clients</a>
                                                    @endif
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div id="assign_attorney_modal"  class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog"
         aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×
                    </button>
                    <h1 class="modal-title">Assign Account To New Attorney </h1></div>
                <div class="modal-body">
                    <form method="POST" action="{{ url('/assignedAttorney/assigned-attorney') }}" accept-charset="UTF-8"
                          class="form-horizontal" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <input type="hidden" name="old_attorney_id" id="old_attorney_id">
                        <input type="hidden" name="status" value="1">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th scope="col">Attorney Name</th>
                                    <th>Email</th>
                                    <th scope="col">Expertise</th>
                                    <th scope="col">Select</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach($attorney as $item)
                                        <tr>
                                            <td>{{$item->name??''}}</td>
                                            <td>{{$item->email??''}}</td>
                                            <td>
                                                <select class="form-control" name="" id="">
                                                    @foreach($item->expertise as $value)
                                                        <option value="">{{$value->name??''}}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td>
                                                {{-- <div class="custom_radio">
                                                <input type="radio" id="row1" name="" >
                                                <label for="row1"></label>
                                                </div> --}}
                                                 <div class="custom_check">
                                                    <input type="radio" name="new_attorney_id" value="{{ $item->id }}">
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn_black btn_block">Assign Attorney</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <div id="clients"  class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
        
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
            // $('#myTable').DataTable({
            //     'aoColumnDefs': [{
            //         'bSortable': false,
            //         'aTargets': [-1] /* 1st one, start by the right */
            //     }]
            // });
            $('#myTable').dataTable( {
            'columnDefs' : [
                    { 
                       'searchable'    : false, 
                       'targets'       : [8,9,10,11]
                    },
                ],
                "ordering": false, // disable sorting on all columns
                "paging": true, // enable pagination
                "searching": true // enable search
            } );
        });
        $(function () {
});
        // $(document).on('change', '.custom_filter', function() {
            
        // });
    </script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script>
        $(document).on('change', '.custom_filter', function() {
            var role_id = $(this).find(":selected").val();             
            window.location.href = "{{route('filter')}}/"+role_id;
        });
        $(document).on('click','.assign_attorney',function(e){
            var old_attorney = $(this).attr('value');
            $('#old_attorney_id').val(old_attorney);
        });
        
        $(document).on('click','.clients',function(e){
        e.preventDefault();
        var client_id = $(this).attr('value');
        $.ajax({
            type: 'GET', //THIS NEEDS TO BE GET
            url: "{{ route('get_client') }}/"+client_id,
            success: function (data) {
                $('#clients').html(data);
                $('#clients').modal('show');
            },
            error: function() {
                $('#clients').html('');
                $('#clients').modal('show');

            }
        });
    });
    </script>

@endpush
