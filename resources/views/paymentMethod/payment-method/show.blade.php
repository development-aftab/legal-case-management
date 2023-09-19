@extends('layouts.master')

@section('content')
    <div class="container-fluid">
        <!-- .row -->
        <div class="row">
            <div class="col-sm-12">
                <div class="white-box">
                    <h3 class="box-title pull-left">{{ preg_replace('/(?<=[a-z])[A-Z]|[A-Z](?=[a-z])/', ' $0', 'PaymentMethod') }} {{ $paymentmethod->id }}</h3>
                    @can('view-'.str_slug('PaymentMethod'))
                        <a class="btn btn_black pull-right" href="{{ url('/paymentMethod/payment-method') }}">
                            <i class="icon-arrow-left-circle" aria-hidden="true"></i> Back</a>
                    @endcan
                    <div class="clearfix"></div>
                    <hr>
                    <div class="table-responsive">
                        <table class="table table">
                            <tbody>
                            <tr>
                                <th>ID</th>
                                <td>{{ $paymentmethod->id }}</td>
                            </tr>
                            <tr><th> Name </th><td> {{ $paymentmethod->name }} </td></tr><tr><th> Description </th><td> {{ $paymentmethod->description }} </td></tr>
                            <tr>
                                <th> Status </th>
                                <td>{!! ($paymentmethod->status==1)?"<badge class='badge badge-success'>Active</badge>":"<badge class='badge badge-warnning'>Inactive</badge>" !!}</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

