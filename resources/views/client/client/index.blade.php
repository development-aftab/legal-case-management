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
                    <h3 class="box-title pull-left">{{ preg_replace('/(?<=[a-z])[A-Z]|[A-Z](?=[a-z])/', ' $0', 'Client') }}</h3>
                    <div class="filter_btn pull-right">
                        @can('add-'.str_slug('Client'))
                            <a class="btn btn_yellow btn_icon" href="{{ url('/client/client/create') }}">{{ preg_replace('/(?<=[a-z])[A-Z]|[A-Z](?=[a-z])/', ' $0', 'Create') }}<i class="fa fa-pencil"></i></a>
                        @endcan
                    </div>
                    <div class="clearfix"></div>
                    <hr>
                        <div class="inner_section_table">
                            <div class="table-responsive">
                                <table class="table table-fixed sticker_table" id="myTable">
                                    <thead>
                                    <tr>
                                        <th scope="col">Name</th>
                                        <th scope="col">E-mail</th>
                                        <th scope="col">Address</th>
                                        <th scope="col">Contact No</th>
                                        <th scope="col">Next of Kin</th>
                                        <th scope="col">Salary</th>
                                        <th scope="col">Marital status</th>
                                        <th scope="col">Instructing Attorney</th>
                                        <th scope="col">ID No</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($client as $item)
                                        <tr>
                                            <td>{{ $item->name }}</td>
                                            <td>{{ $item->email }}</td>
                                            <td>{{ $item->profile->address }}</td>
                                            <td>{{$item->contact}}</td>
                                            <td>{{$item->profile->next_of_kin}}</td>
                                            <td>{{$item->profile->salary}}</td>
                                            <td>{{$item->profile->marital_status}}</td>
                                            <td>{{$item->attorneyOrAssociate->name??''}}</td>
                                            <td>{{$item->profile->id_number}}</td>
                                            <td>
                                                <div class="dropdown action_dropdown">
                                                    <button class="btn dropdown-toggle action_btn" type="button"
                                                            id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                                            aria-expanded="false">
                                                        <i class="fa-solid fa-eye"></i>
                                                    </button>
                                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                        {{--@if(!Auth::user()->hasRole('secretary'))--}}
                                                        {{--@elseif(!Auth::user()->hasRole('Chambers Manager'))--}}
                                                        {{--@elseif(Auth::user()->hasRole('User'))--}}
                                                            {{--<a class="dropdown-item" href="{{ url('create_case_file', [$item->id]) }}">Create Case File</a> --}}
                                                        {{--@elseif(Auth::user()->hasRole('Attorney'))--}}
                                                        {{--<a class="dropdown-item" href="{{ url('create_case_file', [$item->id]) }}">Create Case File</a>--}}
                                                        {{--@endif    --}}
                                                        @if(Auth::user()->hasRole('attorney'))
                                                            <a class="dropdown-item" href="{{ url('create_case_file', [$item->id]) }}">Create Case File</a>
                                                        @elseif(Auth::user()->hasRole('user'))
                                                            <a class="dropdown-item" href="{{ url('create_case_file', [$item->id]) }}">Create Case File</a>
                                                        @else
                                                        @endif
                                                        @can('edit-'.str_slug('Client'))
                                                            <a class="dropdown-item" href="{{ url('/client/client/' . $item->id . '/edit') }}" title="Edit {{ preg_replace('/(?<=[a-z])[A-Z]|[A-Z](?=[a-z])/', ' $0', 'Client') }}">
                                                                Edit
                                                            </a>
                                                        @endcan
                                                        @can('view-'.str_slug('Client'))
                                                            <a class="dropdown-item" href="{{ url('/client/client/' . $item->id) }}" title="View {{ preg_replace('/(?<=[a-z])[A-Z]|[A-Z](?=[a-z])/', ' $0', 'Client') }}">
                                                                View
                                                            </a>
                                                        @endcan
                                                        @if(Auth::user()->hasRole('user'))
                                                            @if($item->delete_status==1)
                                                                <a class="dropdown-item" href="{{route('attorneyAssociate_delete',[$item->id, 0])}}">Delete</a>
                                                            @endif
                                                        @endif
                                                        <!-- @can('delete-'.str_slug('Client'))
                                                            <form method="POST"
                                                                action="{{ url('/client/client' . '/' . $item->id) }}"
                                                                accept-charset="UTF-8" style="display:inline">
                                                                {{ method_field('DELETE') }}
                                                                {{ csrf_field() }}
                                                                <button type="submit" class="btn btn-danger btn-sm"
                                                                        title="Delete {{ preg_replace('/(?<=[a-z])[A-Z]|[A-Z](?=[a-z])/', ' $0', 'Client') }}"
                                                                        onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete
                                                                </button>
                                                            </form>
                                                        @endcan -->
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                <div class="pagination-wrapper"> {!! $client->appends(['search' => Request::get('search')])->render() !!} </div>
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
                "ordering": false, // disable sorting on all columns
                "paging": true, // enable pagination
                "searching": true // enable search
            });
        });
    </script>

@endpush
