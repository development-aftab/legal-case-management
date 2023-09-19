@extends('layouts.master')

@section('content')
    <div class="container-fluid">
        <!-- .row -->
        <div class="row">
            <div class="col-sm-12">
                <div class="white-box">
                    <h3 class="box-title pull-left">{{ preg_replace('/(?<=[a-z])[A-Z]|[A-Z](?=[a-z])/', ' $0', 'CaseEvent') }} {{ $caseevent->id }}</h3>
                    @can('view-'.str_slug('CaseEvent'))
                        <a class="btn btn-success pull-right" href="{{ url('/caseEvent/case-event') }}">
                            <i class="icon-arrow-left-circle" aria-hidden="true"></i> Back</a>
                    @endcan
                    <div class="clearfix"></div>
                    <hr>
                    <div class="table-responsive">
                        <table class="table table">
                            <tbody>
                            <tr>
                                <th>ID</th>
                                <td>{{ $caseevent->id }}</td>
                            </tr>
                            <tr><th> Name </th><td> {{ $caseevent->name }} </td></tr><tr><th> Description </th><td> {{ $caseevent->description }} </td></tr><tr><th> User Id </th><td> {{ $caseevent->user_id }} </td></tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

