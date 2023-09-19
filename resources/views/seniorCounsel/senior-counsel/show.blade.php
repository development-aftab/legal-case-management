@extends('layouts.master')

@section('content')
    <div class="container-fluid">
        <!-- .row -->
        <div class="row">
            <div class="col-sm-12">
                <div class="white-box">
                    <h3 class="box-title pull-left">{{ preg_replace('/(?<=[a-z])[A-Z]|[A-Z](?=[a-z])/', ' $0', 'SeniorCounsel') }} {{ $seniorcounsel->id }}</h3>
                    @can('view-'.str_slug('SeniorCounsel'))
                        <a class="btn btn_black pull-right" href="{{ url('/seniorCounsel/senior-counsel') }}">
                            <i class="icon-arrow-left-circle" aria-hidden="true"></i> Back</a>
                    @endcan
                    <div class="clearfix"></div>
                    <hr>
                    <div class="table-responsive">
                        <table class="table table">
                            <tbody>
                            <tr>
                                <th>ID</th>
                                <td>{{ $seniorcounsel->id }}</td>
                            </tr>
                            <tr><th> Name </th><td> {{ $seniorcounsel->name }} </td></tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

