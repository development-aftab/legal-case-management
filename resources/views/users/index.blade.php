@extends('layouts.master')

@push('css')
    <link href="{{asset('plugins/components/datatables/jquery.dataTables.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="https://cdn.datatables.net/buttons/1.2.2/css/buttons.dataTables.min.css" rel="stylesheet" type="text/css" />
@endpush

@section('content')
    <div class="container-fluid">
        <!-- .row -->
        <div class="row">
            <div class="col-sm-12">
                <div class="white-box">
                    <h3 class="box-title pull-left">Users List</h3>
                            <div class="filter_btn pull-right">
                                <select name="" aria-controls="" class="filter_select custom_filter">
                                    <option value="" @if(true)  selected disabled hidden  @endif >Filter</option>
                                        @foreach($roles as $key => $role)
                                            <option value="{{$role->name}}" @if(isset($filter) && $role->name==$filter) selected @endif >{{ ucwords($role->name) }}</option>
                                        @endforeach
                                    <option value="clear_filter">Clear Filter</option>
                                </select>
                            </div>
                    <div class="clearfix"></div>
                    <hr>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="inner_section_table">
                                <div class="table-responsive">
                                <table class="table table-striped" id="myTable">
                                    <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Role</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($users as $key=>$user)
                                        <tr>
                                            <td>{{$key+1}}</td>
                                            <td>{{$user->name ??''}}</td>
                                            <td>{{ $user->email??'' }}</td>
                                            <td>{{ ucwords($user->roles()->pluck('name')->implode(', '))}}</td>
                                             <th>
                                                <a href="{{url('user/edit/'.$user->id)}}"><i class="icon-pencil"></i> Edit</a> &nbsp;&nbsp;
                                                {{--<a class="delete" href="{{url('user/delete/'.$user->id)}}"><i class="icon-trash"></i> Delete</a>--}}
                                            </th>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @include('layouts.partials.right-sidebar')
    </div>
@endsection

@push('js')
    <script src="{{asset('plugins/components/toast-master/js/jquery.toast.js')}}"></script>
    <script src="{{asset('plugins/components/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>
    <script>
        $(document).ready(function () {
            $(document).on('click','.delete',function (e) {
                if(confirm('Are you sure want to delete?'))
                {
                }
                else
                {
                    return false;
                }
            });
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

        // $(function() {
        //     $('#myTable').DataTable({
        //         "columns": [
        //             null, null,null, {"orderable": false}
        //         ]
        //     });

        // });
        $(function () {
            $('#myTable').DataTable({
                "ordering": false, // disable sorting on all columns
                "paging": true, // enable pagination
                "searching": true // enable search
            });
        });
    </script>
    <script>
        $(document).on('change', '.custom_filter', function() {
            var role_id = $(this).find(":selected").val();
            window.location.href = "{{route('all_filter')}}/"+role_id;
        });
    </script>
@endpush