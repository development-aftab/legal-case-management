@extends('layouts.master')
@push('css')

@endpush

@section('content')
    <form id="invoice_form" class="container-fluid z_form" method="POST" action="{{ url('/caseInvoice/case-invoice') }}" accept-charset="UTF-8" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="row">
            <div class="col-md-1">
                <div class="img-wrapper"><img src="{{asset('website/assets/images/Group 7.svg')}}" alt="LCM Icon"></div>
            </div>
            <div class="col-md-9" style="margin-left: 25px;">
                <div class="z_flex z_column" style="gap:10px;">
                    <p>Freedom Law Chambers</p>
                    <div>
                        @foreach($lcm as $item)
                            <p>Address : {{$item->profile->address}}</p>
                            <p>Phone : {{$item->contact}}</p>
                            <p>Email : {{$item->email}}</p>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <hr style="margin-bottom: 20px;border-color: #D5AF2A;border-width: 2px;">
        <div class="row">
            <div class="col-sm-12 form-group">
                <div class="z_flex z_between">
                    <div class="add_box">
                        <p>Bill To:</p>
                        <br>
                        @foreach($casefile as $item)
                            <p><span>Name:</span> {{$item->client->name}}</p>
                            <p><span>Address:</span> {{$item->client->profile->address}}</p>
                            <p><span>Email:</span> {{$item->client->email}}</p>
                        @endforeach
                    </div>
                    <div>
                        <table>
                            <tbody>
                            <tr>
                                <td><p>Date:&nbsp;&nbsp;</p></td>
                                <td><input type="date" name="date" id="dateInput" class="form-control"></td>
                            </tr>
                            <tr>
                                <td><p>VAT No:&nbsp;&nbsp;</p></td>
                                <td><input type="tel" class="form-control" name="vat_number" value="{{rand(111111,999999)}}" readonly></td>
                            </tr>
                            <tr>
                                <td><p>Invoice No:&nbsp;&nbsp;</p></td>
                                <td><input type="tel" class="form-control" name="invoice_number" value="{{rand(111111,999999)}}" readonly></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="row invoice_fields_wrapper form-group">
                            <div class="col-sm-6">
                                <input class="form-control" type="text" name="subject" placeholder="Subject">
                                <input type="hidden" value="{{$caseFileId}}" name="case_file_id">
                                <input type="hidden" value="{{auth::user()->signature}}" name="signature">
                            </div>
                            <div class="col-sm-6">
                                <select class="form-control" name="currency" id="currency">
                                    <option selected hidden>Currency</option>
                                    <option value="$">USD $</option>
                                    <option value="TTD $">TTD $</option>
                                    <option value="£">Pound £</option>
                                    <option value="€">Euro €</option>
                                </select>
                            </div>
                        </div>
                        <div class="row invoice_fields_wrapper form-group">
                            <div class="col-sm-6">
                                <input class="form-control fees" type="number" min="1" name="senior_counsel_fees" placeholder="Senior Counsel Fees" id="num1">
                            </div>
                            <div class="col-sm-6">
                                <input class="form-control fees" type="number" min="1" name="junior_counsel_fees" placeholder="Junior Counsel Fees" id="num2">
                            </div>
                        </div>
                        <div class="row invoice_fields_wrapper form-group">
                            <div class="col-sm-6">
                                <input class="form-control fees" type="number" min="1" name="instructing_attorney_fees" placeholder="Instructing Attorney Fees" id="num3">
                            </div>
                            <div class="col-sm-6">
                                <input class="form-control vatValue" type="number" min="0" name="vat_value" placeholder="VAT 12.5%" id="">
                            </div>
                        </div>
                        <div class="row invoice_fields_wrapper form-group">
                            <div class="col-sm-6">
                                <input class="form-control sum" type="text" name="total" placeholder="Total" readonly>
                            </div>
                        </div>
                        <div class="row invoice_fields_wrapper form-group">
                            <div class="col-sm-12 col-xs-12">
                                <textarea placeholder="Description" name="description" id="description" cols="30" rows="10" class="form-control w-100 description"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            {{--<p aria-label="UploadSignature" class="form-group">Upload Signature</p>--}}
                            {{--<input style="display: none;" type="file" name="invoice_signature" id="invoice_signature">--}}
                            {{--<canvas id="signature" width="450" height="150" style="border: 1px solid #ddd;"></canvas>--}}
                            {{--<br>--}}
                            {{--<button type="button" class="btn btn_black clear-signature" id="">Clear</button>--}}
                            {{--<label for="invoice_signature">+</label>--}}
                            @if(auth::user()->signature!=null)
                                <div class="col-md-6">
                                    <h3>Signature</h3>
                                    <img src="{{auth::user()->signature??''}}" class="signature" width="500" height="200" alt="">
                                </div>
                            @endif
                        </div>
                    </div>
                    {{--<div class="col-md-12">--}}
                        {{--<br>--}}
                        {{--<h3>Issued By: {{auth::user()->name}}</h3>--}}
                        {{--<br>--}}
                        {{--<a type="submit" class="btn btn_black" href="{{route('download_invoice')}}">Download</a>--}}
                    {{--</div>--}}
                        <div class="col-md-6 form-group">
                            <br>
                            <p>Issued By: {{auth::user()->name}}</p>
                            <br>
                            <input class="btn btn_black" type="submit" value="{{ $submitButtonText??'Create' }}">
                        </div>
                </div>
            </div>
        </div>
    </form>
@endsection
@push('js')

    <script type="text/javascript">
        $(document).ready(function(){
            $("#invoice_form").validate({
                // Specify validation rules
                rules: {
                    subject: "required",
                    senior_counsel_fees: "required",
                    junior_counsel_fees: "required",
                    instructing_attorney_fees: "required",
                    vat_value: "required",
                    total: "required",
                    description: "required",
                },
                messages: {
                    subject: {
                        required: "Please Enter A Subject",
                    },
                    senior_counsel_fees: {
                        required: "Please Enter A Senior Counsel Fees",
                    },
                    junior_counsel_fees: {
                        required: "Please Enter A Junior Counsel Fees",
                    },
                    instructing_attorney_fees: {
                        required: "Please Enter A Instructing Attorney Fees",
                    },
                    vat_value: {
                        required: "Please Enter A Vat Value",
                    },
                    total: {
                        required: "Please Enter A Total",
                    },
                    description: {
                        required: "Please Enter A Description",
                    },
                },
            });
        });
    </script>
    <script src="https://cdn.ckeditor.com/4.15.0/standard/ckeditor.js"></script>
    <script type="text/javascript">
        CKEDITOR.replace('description',{
            height:300,
            filebrowserUploadUrl: url,
            filebrowserUploadMethod: 'form'
        });
    </script>

        <script>
            const input = document.getElementById("dateInput");
            const today = new Date();

            input.valueAsDate = today;
        </script>

    <script>
        // $(document).ready(function() {
        //    var sum = 0;
        //     $(".fees").change(function() {
        //         var fees = parseInt($(this).val()) || 0;
        //         sum = parseInt(sum) + parseInt(fees);
        //         $(".sum").val(sum);
        //     });
        //     $(".vatValue").change(function() {
        //         var val = parseInt($(this).val());
        //         vat_val = sum * val/100;
        //         final =  vat_val + sum;
        //         $(".sum").val(final);
        //     });
        // });

        $(document).ready(function() {
            var sum = 0;
            $(".fees").change(function() {
                var fees = parseFloat($(this).val()) || 0;
                sum = parseFloat(sum) + parseFloat(fees);
                $(".sum").val(sum.toFixed(2));
            });
            $(".vatValue").change(function() {
                var val = parseFloat($(this).val());
                vat_val = sum * val/100;
                final =  vat_val + sum;
                $(".sum").val(final.toFixed(2));
            });
        });

    </script>
<script src="//cdnjs.cloudflare.com/ajax/libs/signature_pad/1.5.3/signature_pad.min.js"></script>
    <script>
        jQuery(document).ready(function($){

            var canvas = document.getElementById("signature");
            var signaturePad = new SignaturePad(canvas);

            $('.clear-signature').on('click', function(){
                signaturePad.clear();
            });

        });
    </script>
@endpush