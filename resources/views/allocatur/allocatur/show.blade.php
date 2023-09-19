@extends('layouts.master')

@section('content')
    <div class="container-fluid">
        <!-- .row -->
        <div class="row">
            <div class="col-sm-12">
                <div class="white-box">
                    <h3 class="box-title pull-left">{{ preg_replace('/(?<=[a-z])[A-Z]|[A-Z](?=[a-z])/', ' $0', 'Allocatur') }} {{ $allocatur->id }}</h3>
                    @can('view-'.str_slug('Allocatur'))
                        <a class="btn btn-success pull-right" href="{{ url('/allocatur/allocatur') }}">
                            <i class="icon-arrow-left-circle" aria-hidden="true"></i> Back</a>
                    @endcan
                    <div class="clearfix"></div>
                    <hr>
                    <div class="table-responsive">
                        <table class="table table">
                            <tbody>
                            <tr>
                                <th>ID</th>
                                <td>{{ $allocatur->id }}</td>
                            </tr>
                            <tr><th> Case File Id </th><td> {{ $allocatur->case_file_id }} </td></tr><tr><th> Attachment </th><td> {{ $allocatur->attachment }} </td></tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

