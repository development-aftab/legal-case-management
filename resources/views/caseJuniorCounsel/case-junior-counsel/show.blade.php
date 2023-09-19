@extends('layouts.master')

@section('content')
    <div class="container-fluid">
        <!-- .row -->
        <div class="row">
            <div class="col-sm-12">
                <div class="white-box">
                    <h3 class="box-title pull-left">{{ preg_replace('/(?<=[a-z])[A-Z]|[A-Z](?=[a-z])/', ' $0', 'CaseJuniorCounsel') }} {{ $casejuniorcounsel->id }}</h3>
                    @can('view-'.str_slug('CaseJuniorCounsel'))
                        <a class="btn btn-success pull-right" href="{{ url('/caseJuniorCounsel/case-junior-counsel') }}">
                            <i class="icon-arrow-left-circle" aria-hidden="true"></i> Back</a>
                    @endcan
                    <div class="clearfix"></div>
                    <hr>
                    <div class="table-responsive">
                        <table class="table table">
                            <tbody>
                            <tr>
                                <th>ID</th>
                                <td>{{ $casejuniorcounsel->id }}</td>
                            </tr>
                            <tr><th> Junior Counsel Id </th><td> {{ $casejuniorcounsel->junior_counsel_id }} </td></tr><tr><th> Case Id </th><td> {{ $casejuniorcounsel->case_id }} </td></tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

