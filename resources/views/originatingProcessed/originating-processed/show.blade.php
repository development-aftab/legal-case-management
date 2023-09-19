@extends('layouts.master')

@section('content')
    <div class="container-fluid">
        <!-- .row -->
        <div class="row">
            <div class="col-sm-12">
                <div class="white-box">
                    <h3 class="box-title pull-left">{{ preg_replace('/(?<=[a-z])[A-Z]|[A-Z](?=[a-z])/', ' $0', 'OriginatingProcessed') }} {{ $originatingprocessed->id }}</h3>
                    @can('view-'.str_slug('OriginatingProcessed'))
                        <a class="btn btn-success pull-right" href="{{ url('/originatingProcessed/originating-processed') }}">
                            <i class="icon-arrow-left-circle" aria-hidden="true"></i> Back</a>
                    @endcan
                    <div class="clearfix"></div>
                    <hr>
                    <div class="table-responsive">
                        <table class="table table">
                            <tbody>
                            <tr>
                                <th>ID</th>
                                <td>{{ $originatingprocessed->id }}</td>
                            </tr>
                            <tr><th> Originate Id </th><td> {{ $originatingprocessed->originate_id }} </td></tr><tr><th> Title </th><td> {{ $originatingprocessed->title }} </td></tr><tr><th> File </th><td> {{ $originatingprocessed->file }} </td></tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

