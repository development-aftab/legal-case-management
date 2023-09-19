@extends('layouts.master')

@section('content')
    <div class="container-fluid">
        <!-- .row -->
        <div class="row">
            <div class="col-sm-12">
                <div class="white-box">
                    <h3 class="box-title pull-left">{{ preg_replace('/(?<=[a-z])[A-Z]|[A-Z](?=[a-z])/', ' $0', 'ClientPaymentMethod') }} {{ $clientpaymentmethod->id }}</h3>
                    @can('view-'.str_slug('ClientPaymentMethod'))
                        <a class="btn btn-success pull-right" href="{{ url('/clientPaymentMethod/client-payment-method') }}">
                            <i class="icon-arrow-left-circle" aria-hidden="true"></i> Back</a>
                    @endcan
                    <div class="clearfix"></div>
                    <hr>
                    <div class="table-responsive">
                        <table class="table table">
                            <tbody>
                            <tr>
                                <th>ID</th>
                                <td>{{ $clientpaymentmethod->id }}</td>
                            </tr>
                            <tr><th> Client Id </th><td> {{ $clientpaymentmethod->client_id }} </td></tr><tr><th> Payment Method Id </th><td> {{ $clientpaymentmethod->payment_method_id }} </td></tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

