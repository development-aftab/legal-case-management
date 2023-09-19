@extends('layouts.master')

@push('css')

@endpush

@section('content')
    <section class="assigned_cases_sec">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 col-lg-12 col-xs-12">
                    <div class="inner_section_heading_wrapper">
                        <div class="top_heading">
                            <h1>Assigned Cases</h1>
                        </div>
                        <div class="search_form">
                            <form action="">
                                <div class="txt_field">
                                    <input class="form-control" type="text" placeholder="Search">
                                </div>
                                <div class="search_btn">
                                    <input class="btn btn_black" type="submit" value="Search">
                                </div>

                            </form>
                            <div class="filter_btn">
                                <a class="btn btn_black" href="#!">
                                    Filter
                                    <i class="fa-solid fa-filter"></i>
                                </a>
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
                                    <th scope="col">Court Id</th>
                                    <th scope="col">Name Of Parties</th>
                                    <th scope="col">Instructing Attorney</th>
                                    <th scope="col">Junior Counsel</th>
                                    <th scope="col">Type Of Matter</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Last Attended Court</th>
                                    <th scope="col">Next Court Date </th>
                                    <th scope="col">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @for ($x = 0; $x <= 9; $x++)
                                    <tr>
                                        <td>1234546</td>
                                        <td>Denly Smith</td>
                                        <td>Denly Smith</td>
                                        <td>Denly Smith</td>
                                        <td>John Denly</td>
                                        <td><span class="label label-success">Completed</span></td>
                                        <td>24/10/2022</td>
                                        <td>25/11/2022</td>
                                        <td>
                                            <div class="dropdown action_dropdown">
                                                <button class="btn dropdown-toggle action_btn" type="button"
                                                        id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                                        aria-expanded="false">
                                                    <i class="fa-solid fa-eye"></i>
                                                </button>
                                                {{--<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">--}}
                                                {{--<a class="dropdown-item" href="{{url('create_case_file')}}">Create Case File</a>--}}
                                                {{--<a class="dropdown-item" href="#">Edit</a>--}}
                                                {{--<a class="dropdown-item" href="#">View Detail</a>--}}
                                                {{--</div>--}}
                                            </div>
                                        </td>
                                    </tr>
                                @endfor
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>



@endsection

@push('js')


@endpush