@extends('layouts.master')
@push('css')
<link href="{{asset('plugins/components/custom-select/custom-select.css')}}" rel="stylesheet" type="text/css" />
@endpush
@section('content')
<section class="">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="white-box">
                    <h3 class="box-title pull-left">Create New {{ preg_replace('/(?<=[a-z])[A-Z]|[A-Z](?=[a-z])/', ' $0', 'Client') }}</h3>
                    @can('view-'.str_slug('Client'))
                    <a  class="btn btn_black pull-right" href="{{url('/client/client')}}"><i class="icon-arrow-left-circle"></i> {{ preg_replace('/(?<=[a-z])[A-Z]|[A-Z](?=[a-z])/', ' $0', 'Back') }}</a>
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

                    <form id="client_form" method="POST" action="{{ url('/client/client') }}" accept-charset="UTF-8"
                          class="form-horizontal row dashboard_form" enctype="multipart/form-data">
                        {{ csrf_field() }}

                        @include ('client.client.form')
                    </form>
                </div>
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

    $(document).ready(function(){
        $("#client_form").validate({
            // Specify validation rules
            rules: {
                name: "required",
                email: "required",
                address: "required",
                contact: "required",
                next_of_kin: "required",
                salary: "required",
                marital_status: "required",
                id_number: "required",
                payment_method_id: "required",
                attorney_associate_id: "required",
                condition: "required",
            },
            messages: {
                name: {
                    required: "Please enter Name",
                },
                email: {
                    required: "Please enter Email",
                },
                address: {
                    required: "Please enter Address",
                },
                contact: {
                    required: "Please enter Contact",
                },
                next_of_kin: {
                    required: "Please enter Name",
                },
                salary: {
                    required: "Please enter Salary",
                },
                marital_status: {
                    required: "Please Select Marital Status",
                },
                id_number: {
                    required: "Please enter Id-Number",
                },
                payment_method_id: {
                    required: "Please Select Payment Method",
                },
                attorney_associate_id: {
                    required: "Please Select Attorney",
                },
                condition: {
                    required: "Please enter Condition",
                }
            },
        });
    });
</script>


@endpush