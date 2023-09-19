@extends('layouts.master')

@push('css')

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
                        <div class="pagination">
                            <label for="">Pagination</label>
                            <select class="form-control" name="" id="">
                                <option value="">10</option>
                                <option value="">20</option>
                                <option value="">30</option>
                                <option value="">40</option>
                                <option value="">50</option>
                            </select>
                        </div>
                        <div class="search_form">
                            <form action="">
                                <div class="txt_field">
                                    <!-- <i class="fa-solid fa-magnifying-glass"></i> -->
                                    <input class="form-control" type="text" placeholder="Search">
                                </div>
                                <div class="search_btn">
                                    <input class="btn btn_black" type="submit" value="Search">
                                </div>
                            </form>
                            <div class="filter_btn">
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
                            <table class="table table-fixed sticker_table">
                                <thead>
                                <tr>
                                    <th scope="col">Name</th>
                                    <th scope="col">E-mail</th>
                                    <th scope="col">Address</th>
                                    <th scope="col">Contact No</th>
                                    <th scope="col">BAR Number</th>
                                    <th scope="col">Title</th>
                                    <th scope="col">BIO</th>
                                    <th scope="col">DOB</th>
                                    <th scope="col">Resume (Doc)</th>
                                    <th scope="col">Practicing Certificate</th>
                                    <th scope="col">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($roles as $role)
                                    <tr>
                                        <td>{{$role->name??''}}</td>
                                        <td>{{$role->email??''}}</td>
                                        <td>{{$role->profile->address??''}}</td>
                                        <td>{{$role->contact ??''}}</td>
                                        <td>{{$role->bar_number??''}}</td>
                                        <td>Lorem Ipsum</td>
                                        <td>{{$role->profile->bio}}</td>
                                        <td>{{$role->profile->dob}}</td>
                                        <td>
                                            <a class="btn doc_btn" type="button" href="{{asset('website')}}/{{$role->resume}}" target="_blank">
                                                <img class="img-fluid" src="{{asset('website')}}/assets/images/doc-icon.png" alt="">
                                            </a>
                                        </td>
                                        <td>
                                            <a class="btn doc_btn" type="button" href="{{asset('website')}}/{{$role->certificate}}" target="_blank">
                                                <img class="img-fluid" src="{{asset('website')}}/assets/images/doc-icon.png" alt="">
                                            </a>
                                        </td>
                                        <td>
                                            <div class="dropdown action_dropdown">
                                                <button class="btn dropdown-toggle action_btn" type="button"
                                                        id="dropdownMenuButton" data-toggle="dropdown"
                                                        aria-haspopup="true"
                                                        aria-expanded="false">
                                                    <i class="fa-solid fa-eye"></i>
                                                </button>
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                    <a class="dropdown-item" href="#" alt="default" data-toggle="modal"
                                                       data-target="#new_attorney_modal">Assign To New Attorney</a>
                                                    <a class="dropdown-item" href="#">View Detail</a>
                                                    <a class="dropdown-item" href="#">Edit</a>
                                                    @if($role->status==1)
                                                        <a class="dropdown-item" href="{{route('attorneyAssociate_status',[$role->id, 0])}}">Activate</a>
                                                    @else
                                                        <a class="dropdown-item" href="{{route('attorneyAssociate_status',[$role->id, 1])}}">Deactivate</a>
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

    <div id="new_attorney_modal"  class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog"
         aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×
                    </button>
                    <h1 class="modal-title">Assign Account To New Attorney </h1></div>
                <form name="form1">




                </form>


                <div class="modal-body">
                    <form>
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th scope="col">Case ID</th>
                                    <th scope="col">Attorney Name</th>
                                    <th scope="col">Expertise</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Select All
                                        <div class="custom_radio">
                                            <input type="radio" id="selectAll" name="select-all" >
                                            <label for="radio-group1"></label>
                                        </div>
                                    </th>
                                </tr>
                                </thead>
                                <tbody>

                                    <tr>
                                        <td>1234546</td>
                                        <td>John Denly</td>
                                        <td>Lorem Ipsum</td>
                                        <td>Pending</td>
                                        <td>
                                            <div class="custom_radio">
                                            <input type="radio" id="row1" name="slect" >
                                            <label for="row1"></label>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>1234546</td>
                                        <td>John Denly</td>
                                        <td>Lorem Ipsum</td>
                                        <td>Pending</td>
                                        <td>
                                            <div class="custom_radio">
                                                <input type="radio" id="row2" name="slect" >
                                                <label for="row2"></label>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>1234546</td>
                                        <td>John Denly</td>
                                        <td>Lorem Ipsum</td>
                                        <td>Pending</td>
                                        <td>
                                            <div class="custom_radio">
                                                <input type="radio" id="row3" name="slect" >
                                                <label for="row3"></label>
                                            </div>
                                        </td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn_black btn_block">Assign Attorney</button>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('js')


@endpush