@extends('layouts.master')
@push('css')
    <link href="{{asset('plugins/components/bootstrap-tagsinput/dist/bootstrap-tagsinput.css')}}" rel="stylesheet" />
    <link href="{{asset('plugins/components/custom-select/custom-select.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('plugins/components/bootstrap-select/bootstrap-select.min.css')}}" rel="stylesheet" />
@endpush
@section('content')
<section class="">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="white-box custom_form_css">
                    <h3 class="box-title pull-left">Create New {{ preg_replace('/(?<=[a-z])[A-Z]|[A-Z](?=[a-z])/', ' $0', 'CaseFile') }}</h3>
                    @can('view-'.str_slug('CaseFile'))
                    <a  class="btn btn_black pull-right" href="{{url('/caseFile/case-file')}}"><i class="icon-arrow-left-circle"></i> {{ preg_replace('/(?<=[a-z])[A-Z]|[A-Z](?=[a-z])/', ' $0', 'Back') }}</a>
                    @endcan

                    <div class="clearfix"></div>
                    <hr>
                    @if ($errors->any())
                        <ul class="alert alert-danger">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    @endif

                    <form method="POST" action="{{ url('/caseFile/case-file') }}" accept-charset="UTF-8"
                          class="form-horizontal row dashboard_form" id="case_file_form" enctype="multipart/form-data">
                        {{ csrf_field() }}

                        @include ('caseFile.case-file.form')
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>        
@endsection
@push('js')
    <script src="{{asset('plugins/components/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js')}}"></script>
    <script src="{{asset('plugins/components/custom-select/custom-select.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('plugins/components/bootstrap-select/bootstrap-select.min.js')}}" type="text/javascript"></script>
    <script>
        $(document).ready(function(){
            $("#case_file_form").validate({
                // Specify validation rules
                rules: {
                    case_number: "required",
                    name_of_parties: "required",
                    judge_name: "required",
                    instruction_attorney_id: "required",
                    junior_attorney_id: "required",
                    senior_counsel_id: "required",
                    king_counsel_id: "required",
                    type_of_matter_id: "required",
                    tags: "required",
                },
                messages: {
                    case_number: {
                        required: "Please enter Case Number",
                    },
                    name_of_parties: {
                        required: "Please enter Name of Parties",
                    },
                    judge_name: {
                        required: "Please enter Judge Name",
                    },
                    instruction_attorney_id: {
                        required: "Please enter Instruction Attorney",
                    },
                    junior_attorney_id: {
                        required: "Please enter Junior Attorney",
                    },
                    senior_counsel_id: {
                        required: "Please enter Senior Counsel",
                    },
                    king_counsel_id: {
                        required: "Please enter King Counsel",
                    },
                    type_of_matter_id: {
                        required: "Please enter Type of Matter",
                    },
                    tags: {
                        required: "Please enter the Tags",
                    },
                },
            });
        });
        // $("#case_file_form").submit(function() {
        //         var juniorAttorney = $("#junior_attorney").val();
        //         var seniorCounsel = $("#senior_counsel").val();
        //         var kingCounsel = $("#king_counsel").val();
        //         var typeOfMatter = $("#type_of_matter").val();
        //         var originating = $("#originating").val();
        //         if (juniorAttorney == null || juniorAttorney.length == 0) {
        //             alert("Please select at least one Junior Attorney.");
        //             return false;
        //         }
        //         if (seniorCounsel == null || seniorCounsel.length == 0) {
        //             alert("Please select at least one Senior Counsel.");
        //             return false;
        //         }
        //         if (kingCounsel == null || kingCounsel.length == 0) {
        //             alert("Please select at least one King Counsel.");
        //             return false;
        //         }
        //         if (typeOfMatter == null || typeOfMatter.length == 0) {
        //             alert("Please select at least one Type Of Matter.");
        //             return false;
        //         }
        //         if (originating == null || originating.length == 0) {
        //             alert("Please select at least one Originating Process.");
        //             return false;
        //         }
        //
        //         return true;
        // });
    </script>
    <script>
        jQuery(document).ready(function() {
            // For select 2
            $(".select2").select2();
            $('.selectpicker').selectpicker();

        });
    </script>
@endpush