@extends('layouts.master')

@section('content')
    <div class="container-fluid">
        <!-- .row -->
        <div class="row">
            <div class="col-sm-12">
                <div class="white-box">
                    <h3 class="box-title pull-left">{{ preg_replace('/(?<=[a-z])[A-Z]|[A-Z](?=[a-z])/', ' $0', 'CaseTypeOfMatter') }} {{ $casetypeofmatter->id }}</h3>
                    @can('view-'.str_slug('CaseTypeOfMatter'))
                        <a class="btn btn-success pull-right" href="{{ url('/caseTypeOfMatter/case-type-of-matter') }}">
                            <i class="icon-arrow-left-circle" aria-hidden="true"></i> Back</a>
                    @endcan
                    <div class="clearfix"></div>
                    <hr>
                    <div class="table-responsive">
                        <table class="table table">
                            <tbody>
                            <tr>
                                <th>ID</th>
                                <td>{{ $casetypeofmatter->id }}</td>
                            </tr>
                            <tr><th> Case Id </th><td> {{ $casetypeofmatter->case_id }} </td></tr><tr><th> Type Of Matter Id </th><td> {{ $casetypeofmatter->type_of_matter_id }} </td></tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

