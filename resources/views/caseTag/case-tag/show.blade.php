@extends('layouts.master')

@section('content')
    <div class="container-fluid">
        <!-- .row -->
        <div class="row">
            <div class="col-sm-12">
                <div class="white-box">
                    <h3 class="box-title pull-left">{{ preg_replace('/(?<=[a-z])[A-Z]|[A-Z](?=[a-z])/', ' $0', 'CaseTag') }} {{ $casetag->id }}</h3>
                    @can('view-'.str_slug('CaseTag'))
                        <a class="btn btn-success pull-right" href="{{ url('/caseTag/case-tag') }}">
                            <i class="icon-arrow-left-circle" aria-hidden="true"></i> Back</a>
                    @endcan
                    <div class="clearfix"></div>
                    <hr>
                    <div class="table-responsive">
                        <table class="table table">
                            <tbody>
                            <tr>
                                <th>ID</th>
                                <td>{{ $casetag->id }}</td>
                            </tr>
                            <tr><th> Name </th><td> {{ $casetag->name }} </td></tr><tr><th> Case Id </th><td> {{ $casetag->case_id }} </td></tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

