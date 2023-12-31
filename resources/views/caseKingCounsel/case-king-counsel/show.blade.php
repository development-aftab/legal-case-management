@extends('layouts.master')

@section('content')
    <div class="container-fluid">
        <!-- .row -->
        <div class="row">
            <div class="col-sm-12">
                <div class="white-box">
                    <h3 class="box-title pull-left">{{ preg_replace('/(?<=[a-z])[A-Z]|[A-Z](?=[a-z])/', ' $0', 'CaseKingCounsel') }} {{ $casekingcounsel->id }}</h3>
                    @can('view-'.str_slug('CaseKingCounsel'))
                        <a class="btn btn-success pull-right" href="{{ url('/caseKingCounsel/case-king-counsel') }}">
                            <i class="icon-arrow-left-circle" aria-hidden="true"></i> Back</a>
                    @endcan
                    <div class="clearfix"></div>
                    <hr>
                    <div class="table-responsive">
                        <table class="table table">
                            <tbody>
                            <tr>
                                <th>ID</th>
                                <td>{{ $casekingcounsel->id }}</td>
                            </tr>
                            <tr><th> Case Id </th><td> {{ $casekingcounsel->case_id }} </td></tr><tr><th> King Counsel Id </th><td> {{ $casekingcounsel->king_counsel_id }} </td></tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

