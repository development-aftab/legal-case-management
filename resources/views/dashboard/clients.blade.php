@extends('layouts.master')

@push('css')

@endpush

@section('content')
    <section class="clients_table_sec">
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
                                <a class="btn btn_black" href="#!">
                                    Filter
                                    <i class="fa-solid fa-filter"></i>
                                </a>
                                <a class="btn btn_yellow btn_icon" href="{{url('create_clients')}}">
                                    Create
                                    <i class="fa fa-pencil"></i>
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
                                    <th scope="col">Name</th>
                                    <th scope="col">E-mail</th>
                                    <th scope="col">Address</th>
                                    <th scope="col">Contact No</th>
                                    <th scope="col">Next of Kin</th>
                                    <th scope="col">Salary</th>
                                    <th scope="col">Marital status</th>
                                    <th scope="col">Assign Attorney</th>
                                    <th scope="col">ID No</th>
                                    <th scope="col">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @for ($x = 0; $x <= 9; $x++)
                                    <tr>
                                        <td>John Denly</td>
                                        <td>john@gmail.com</td>
                                        <td>abcd street, New York</td>
                                        <td>+921 123 456 789</td>
                                        <td>Lorem Ipsum</td>
                                        <td>$2500.00</td>
                                        <td>Lorem Ipsum</td>
                                        <td>John Denly</td>
                                        <td>1234546</td>
                                        <td>
                                            <div class="dropdown action_dropdown">
                                                <button class="btn dropdown-toggle action_btn" type="button"
                                                        id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                                        aria-expanded="false">
                                                    <i class="fa-solid fa-eye"></i>
                                                </button>
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                    <a class="dropdown-item" href="{{url('create_case_file')}}">Create Case File</a>
                                                    <a class="dropdown-item" href="#">Edit</a>
                                                    <a class="dropdown-item" href="#">View Detail</a>
                                                </div>
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