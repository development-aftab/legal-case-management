@extends('layouts.master')
@push('css')
    <link href="{{ asset('plugins/components/jasny-bootstrap/css/jasny-bootstrap.css') }}" rel="stylesheet">
    <link href="{{asset('plugins/components/icheck/skins/all.css')}}" rel="stylesheet">
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
                    <h3 class="box-title pull-left">Edit {{ preg_replace('/(?<=[a-z])[A-Z]|[A-Z](?=[a-z])/', ' $0', 'AttorneyAssociate') }} #{{ $attorneyassociate->id }}</h3>
                    @can('view-'.str_slug('AttorneyAssociate'))
                        <a class="btn btn_yellow pull-right btn_icon" href="{{ url('/attorneyAssociate/attorney-associate') }}">
                            Back
                        </a>
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

                    <form method="POST" action="{{ url('/attorneyAssociate/attorney-associate/' . $attorneyassociate->id) }}" accept-charset="UTF-8" class="form-horizontal row dashboard_form" enctype="multipart/form-data">
                        {{ method_field('PATCH') }}
                        {{ csrf_field() }}

                        @include ('attorneyAssociate.attorney-associate.form', ['submitButtonText' => 'Update'])

                    </form>
                </div>
            </div>
        </div>
    </div>
</section>    
@endsection
