@extends('layouts.master')

@push('css')

@endpush

@section('content')
    <section class="">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <form class="form-horizontal row dashboard_form">
                        <div class="col-md-4 col-sm-12 form-group">
                            <input type="text" class="form-control" id="" name="name" placeholder="Name" required>
                        </div>
                        <div class="col-md-4 col-sm-12 form-group">
                            <input type="email" class="form-control" id="" name="email" placeholder="Email" required>
                        </div>
                        <div class="col-md-4 col-sm-12 form-group">
                            <input type="text" class="form-control" id="" name="address" placeholder="Address" required>
                        </div>
                        <div class="col-md-4 col-sm-12 form-group">
                            <input type="number" class="form-control" id="" name="contact" placeholder="Contact No" required>
                        </div>
                        <div class="col-md-4 col-sm-12 form-group">
                            <input type="text" class="form-control" id="" name="next_of_kin" placeholder="Next Of Kin" required>
                        </div>
                        <div class="col-md-4 col-sm-12 form-group">
                            <input type="number" class="form-control" id="" name="salary" placeholder="Salary" required>
                        </div>
                        <div class="col-md-4 col-sm-12 form-group">
                        <div class="custom_select">
                            <select class="form-control " name="marital_status">
                                <option disabled selected hidden>Marital Status</option>
                                <option value="Married">Married</option>
                                <option value="Never Married">Never Married</option>
                                <option value="Divorced">Divorced</option>
                                <option value="Widowed">Widowed</option>
                                <option value="Separated">Separated</option>
                            </select>
                        </div>
                        </div>
                        <div class="col-md-4 col-sm-12 form-group">
                            <input type="tel" class="form-control" id="" value="{{rand(11111111,99999999)}}" name="id_number" readonly>
                        </div>
                        <div class="col-md-4 col-sm-12 form-group ">
                            <div class="custom_select">
                            <select class="form-control " name="payment_method">
                                <option disabled selected hidden>Payment Details </option>
                                @foreach($payments as $payment)
                                <option value="{{$payment->id}}">{{$payment->name}}</option>
                                @endforeach
                            </select>
                            </div>
                        </div>

                        <div class="col-md-4 col-sm-12 form-group ">
                            <div class="custom_select">
                            <select class="form-control " name="assign_attorney">
                                <option disabled selected hidden>Assign Attorney</option>
                                @foreach($attorneyassociates as $attorneyassociate)
                                    <option value="{{$attorneyassociate->id}}">{{$attorneyassociate->name}}</option>
                                @endforeach
                            </select>
                            </div>
                        </div>
                        <div class="col-md-12 col-sm-12 form-group">
                            <textarea class="form-control" id="" name="condition" placeholder="Define Condition..." rows="7"></textarea>
                        </div>
                        <div class="col-md-6 col-sm-12 form-group">
                            <h5>How You Came To Know About The Firm ?</h5>
                            @foreach($firms as $firm)
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="frim_id" id="exampleRadios1" value="{{$firm->id}}" >
                                    <label class="form-check-label" for="exampleRadios1">
                                        {{$firm->name}}
                                    </label>
                                </div>
                            @endforeach
                            <textarea class="form-control" id="" name="frim_description" placeholder="Define Condition..." rows="6"></textarea>
                        </div>
                        <div class="col-md-6 col-sm-12 form-group">
                            <h5>Describe client attitude</h5>
                            @foreach($client_attitudes as $client_attitude)
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="client_attitude_id" id="exampleRadios2" value="{{$client_attitude->id}}" >
                                    <label class="form-check-label" for="exampleRadios2">
                                        {{$client_attitude->name}}
                                    </label>
                                </div>
                            @endforeach
                            <textarea class="form-control" id="" name="client_attitude_description" placeholder="Define Condition..." rows="7"></textarea>
                        </div>
                        <div class="col-md-6 col-sm-12 form-group">
                            <button type="submit" class="btn btn_black btn_block">Create</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

@endsection

@push('js')
<script >
    jQuery("input[type='file']").on("change", function(e){
        var fileName = e.target.files[0].name;
        console.log(fileName);
        jQuery(this).next().children().text( fileName );
    });
</script>


@endpush