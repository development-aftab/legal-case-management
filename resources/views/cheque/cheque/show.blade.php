@extends('layouts.master')

@section('content')
    <div class="container-fluid">
        <!-- .row -->
        <div class="row">
            <div class="col-sm-12">
                <div class="white-box">
                    <h3 class="box-title pull-left">{{ preg_replace('/(?<=[a-z])[A-Z]|[A-Z](?=[a-z])/', ' $0', 'Cheque') }} {{ $cheque->id }}</h3>
                    @can('view-'.str_slug('Cheque'))
                        <a class="btn btn-success pull-right" href="{{ url('/cheque/cheque') }}">
                            <i class="icon-arrow-left-circle" aria-hidden="true"></i> Back</a>
                    @endcan
                    <div class="clearfix"></div>
                    <hr>
                    <div class="table-responsive">
                        <table class="table table">
                            <tbody>
                            <tr>
                                <th>ID</th>
                                <td>{{ $cheque->id }}</td>
                            </tr>
                            <tr><th> Case File Id </th><td> {{ $cheque->case_file_id }} </td></tr><tr><th> Attachment </th><td> {{ $cheque->attachment }} </td></tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

