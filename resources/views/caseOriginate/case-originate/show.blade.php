@extends('layouts.master')

@section('content')
    <div class="container-fluid">
        <!-- .row -->
        <div class="row">
            <div class="col-sm-12">
                <div class="white-box">
                    <h3 class="box-title pull-left">{{ preg_replace('/(?<=[a-z])[A-Z]|[A-Z](?=[a-z])/', ' $0', 'CaseOriginate') }} {{ $caseoriginate->id }}</h3>
                    @can('view-'.str_slug('CaseOriginate'))
                        <a class="btn btn-success pull-right" href="{{ url('/caseOriginate/case-originate') }}">
                            <i class="icon-arrow-left-circle" aria-hidden="true"></i> Back</a>
                    @endcan
                    <div class="clearfix"></div>
                    <hr>
                    <div class="table-responsive">
                        <table class="table table">
                            <tbody>
                            <tr>
                                <th>ID</th>
                                <td>{{ $caseoriginate->id }}</td>
                            </tr>
                            <tr><th> Case Id </th><td> {{ $caseoriginate->case_id }} </td></tr><tr><th> Originate Id </th><td> {{ $caseoriginate->originate_id }} </td></tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

