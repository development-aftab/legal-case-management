@extends('layouts.master')

@push('css')
<link href="{{asset('plugins/components/bootstrap-select/bootstrap-select.min.css')}}" rel="stylesheet" />
<link href="{{asset('plugins/components/bootstrap-tagsinput/dist/bootstrap-tagsinput.css')}}" rel="stylesheet" />
@endpush

@section('content')
    <section class="">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-9">
                    <form class="form-horizontal row dashboard_form">
                        <div class="col-md-6 col-sm-12 form-group">
                            <input type="number" class="form-control" id="" value="{{rand(11111111,99999999)}}"  placeholder="Case Number" required>
                        </div>
                        <div class="col-md-6 col-sm-12 form-group">
                            <input type="text" class="form-control" id=""  placeholder="Name of Parties" required>
                        </div>
                        <!-- <div class="col-md-6 col-sm-12 form-group">
                            <select class="form-control ">
                                <option disabled selected hidden>Instruction attorney</option>
                                @foreach($attorneyassociates as $attorneyassociate)
                                    <option value="">{{$attorneyassociate->name}}</option>
                                @endforeach
                            </select>
                        </div> -->
                        <div class="col-md-6 col-sm-12 form-group">
                            <select class="form-control ">
                                <option disabled selected hidden>Senior Counsel</option>
                                @foreach($seniorCounsels as $seniorCounsel)
                                    <option value="">{{$seniorCounsel->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6 col-sm-12 form-group">
                            <select class="form-control ">
                                <option disabled selected hidden>Junior Attorney</option>
                                @foreach($attorneyassociates as $attorneyassociate)
                                    <option value="">{{$attorneyassociate->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6 col-sm-12 form-group">
                            <select class="form-control ">
                                <option disabled selected hidden>Senior Counsel</option>
                                @foreach($seniorCounsels as $seniorCounsel)
                                    <option value="">{{$seniorCounsel->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6 col-sm-12 form-group">
                            <select class="form-control ">
                                <option disabled selected hidden>King Counsel</option>
                                @foreach($kingCounsels as $kingCounsel)
                                    <option value="">{{$kingCounsel->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6 col-sm-12 form-group">
                            <input type="text" class="form-control" id="" accept="application/pdf" placeholder="Retainer Agreement">
                        </div>
                        <div class="col-md-6 col-sm-12 form-group">
                            <select class="form-control ">
                                <option disabled selected hidden>Type of Matter</option>
                                @foreach($typeOfMatters as $typeOfMatter)
                                    <option value="">{{$typeOfMatter->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6 col-sm-12 form-group">
                            <textarea class="form-control" placeholder="Case Condition" name="" id="" cols="10" rows="5"></textarea>
                        </div>
                        <div class="col-md-6 col-sm-12 form-group">
                            <!-- <input type="text" class="form-control" id=""  placeholder="Tags ( Trend )" required> -->
                            <input type="text" value="" data-role="tagsinput" class="form-control" placeholder="Tags ( Trend )" /> 
                        </div>
                        <div class="col-md-6 col-sm-12 form-group">
                            <button type="submit" class="btn btn_black btn_block">Create</button>
                        </div>
                    </form>
                </div>
                <div class="col-md-3 d_none">

                </div>
            </div>
        </div>
    </section>
@endsection

@push('js')
<script src="{{asset('plugins/components/bootstrap-select/bootstrap-select.min.js')}}" type="text/javascript"></script>
<script src="{{asset('plugins/components/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js')}}"></script>
@endpush
