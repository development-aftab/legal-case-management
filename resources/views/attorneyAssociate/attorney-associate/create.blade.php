@extends('layouts.master')
@push('css')
    <link href="{{asset('plugins/components/bootstrap-tagsinput/dist/bootstrap-tagsinput.css')}}" rel="stylesheet" />
    <link href="{{asset('plugins/components/custom-select/custom-select.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('plugins/components/bootstrap-select/bootstrap-select.min.css')}}" rel="stylesheet" />
    <style>
        .error {
            color: red !important;
        }
        .bootstrap-tagsinput {
            border: none !important;
        }
        .bootstrap-tagsinput input {
            height: 80px;
            box-shadow: 0 8px 33px rgb(0 0 0 / 4%);
            border: none;
            border-radius: 10px;
            width: 440px;
            color: #9B9B9B;
            font-size: 18px;
            line-height: 24px;
            padding: 10px 20px;
        }
    </style>
@endpush
@section('content')
<section class="create_user_sec">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="white-box">
                    <h3 class="box-title pull-left">Create New {{ preg_replace('/(?<=[a-z])[A-Z]|[A-Z](?=[a-z])/', ' $0', 'Attorney / Associate / Secretary') }}</h3>
                    @can('view-'.str_slug('AttorneyAssociate'))
                    <a  class="btn btn_yellow pull-right btn_icon" href="{{url('/attorneyAssociate/attorney-associate')}}"> {{ preg_replace('/(?<=[a-z])[A-Z]|[A-Z](?=[a-z])/', ' $0', 'Back') }}</a>
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
                        
                    <form method="POST" action="{{ url('/attorneyAssociate/attorney-associate') }}" accept-charset="UTF-8"
                        class="form-horizontal row dashboard_form" id="attorney_associate_form" enctype="multipart/form-data">
                        {{ csrf_field() }}

                        @include ('attorneyAssociate.attorney-associate.form')
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
@push('js')
    <script>
        $(document).ready(function(){
            $("#attorney_associate_form").validate({
                // Specify validation rules
                rules: {
                    name: "required",
                    email: "required",
                    bar_number: "required",
                    address: "required",
                    contact: "required",
                    role_id: "required",
                    dob: "required",
                    resume: "required",
                    certificate: "required",
                    pic: "required",
                    bio: "required",
                    signature: "required",
                },
                messages: {
                    name: {
                        required: "Please enter Name",
                    },
                    email: {
                        required: "Please enter Email",
                    },
                    bar_number: {
                        required: "Please enter Bar Number",
                    },
                    address: {
                        required: "Please enter Address",
                    },
                    contact: {
                        required: "Please enter Contact",
                    },
                    role_id: {
                        required: "Please enter Title",
                    },
                    dob: {
                        required: "Please enter Date of Birth",
                    },
                    resume: {
                        required: "Please put Resume",
                    },
                    certificate: {
                        required: "Please put Certificate",
                    },
                    pic: {
                        required: "Please put Picture",
                    },
                    bio: {
                        required: "Please enter Bio",
                    },
                    signature: {
                        required: "Please Give Signature",
                    },
                },
            });
        });

        $("#case_file_form").submit(function() {
            var expertise = $("#expertise").val();
            if (expertise == null || expertise.length == 0) {
                alert("Please select at least one Expertise.");
                return false;
            }
            var signature = $("#signature").val();
            if (signature == null || signature.length == 0) {
                alert("Please Enter Signature.");
                return false;
            }
            return true;
        });
    </script>
@endpush