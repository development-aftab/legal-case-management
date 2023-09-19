@extends('layouts.master')

@section('content')
    <div class="container-fluid">
        <!-- .row -->
        <div class="row">
            <div class="col-sm-12">
                <div class="white-box">
                    <h3 class="box-title pull-left">{{ preg_replace('/(?<=[a-z])[A-Z]|[A-Z](?=[a-z])/', ' $0', 'CaseJuniorAttorney') }} {{ $casejuniorattorney->id }}</h3>
                    @can('view-'.str_slug('CaseJuniorAttorney'))
                        <a class="btn btn-success pull-right" href="{{ url('/caseJuniorAttorney/case-junior-attorney') }}">
                            <i class="icon-arrow-left-circle" aria-hidden="true"></i> Back</a>
                    @endcan
                    <div class="clearfix"></div>
                    <hr>
                    <div class="table-responsive">
                        <table class="table table">
                            <tbody>
                            <tr>
                                <th>ID</th>
                                <td>{{ $casejuniorattorney->id }}</td>
                            </tr>
                            <tr><th> Case Id </th><td> {{ $casejuniorattorney->case_id }} </td></tr><tr><th> Junior Attorney Id </th><td> {{ $casejuniorattorney->junior_attorney_id }} </td></tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

