@extends('layouts.master')

@section('content')
    <div class="container-fluid">
        <!-- .row -->
        <div class="row">
            <div class="col-sm-12">
                <div class="white-box">
                    <h3 class="box-title pull-left">{{ preg_replace('/(?<=[a-z])[A-Z]|[A-Z](?=[a-z])/', ' $0', 'CourtAttendantsNote') }} {{ $courtattendantsnote->id }}</h3>
                    @can('view-'.str_slug('CourtAttendantsNote'))
                        <a class="btn btn-success pull-right" href="{{ url('/courtAttendantsNote/court-attendants-note') }}">
                            <i class="icon-arrow-left-circle" aria-hidden="true"></i> Back</a>
                    @endcan
                    <div class="clearfix"></div>
                    <hr>
                    <div class="table-responsive">
                        <table class="table table">
                            <tbody>
                            <tr>
                                <th>ID</th>
                                <td>{{ $courtattendantsnote->id }}</td>
                            </tr>
                            <tr><th> Case File Id </th><td> {{ $courtattendantsnote->case_file_id }} </td></tr><tr><th> Category Id </th><td> {{ $courtattendantsnote->category_id }} </td></tr><tr><th> Date Time </th><td> {{ $courtattendantsnote->date_time }} </td></tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

