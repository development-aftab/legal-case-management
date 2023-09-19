@extends('layouts.master')

@section('content')
    <div class="container-fluid">
        <!-- .row -->
        <div class="row">
            <div class="col-sm-12">
                <div class="white-box">
                    <h3 class="box-title pull-left">{{ preg_replace('/(?<=[a-z])[A-Z]|[A-Z](?=[a-z])/', ' $0', 'CaseFile') }} {{ $casefile->id }}</h3>
                    @can('view-'.str_slug('CaseFile'))
                        <a class="btn btn_black pull-right" href="{{ url('/caseFile/case-file') }}">
                            <i class="icon-arrow-left-circle" aria-hidden="true"></i> Back</a>
                    @endcan
                    <div class="clearfix"></div>
                    <hr>
                    <div class="table-responsive">
                        <table class="table table">
                            <tbody>
                            <tr>
                                <th>ID</th>
                                <td>{{ $casefile->id }}</td>
                            </tr>
                            <tr>
                                <th> Case Number </th>
                                <td> {{ $casefile->case_number }} </td>
                            </tr>
                            <tr>
                                <th> Name Of Parties </th>
                                <td> {{ $casefile->name_of_parties }} </td>
                            </tr>
                            <tr>
                                <th> Instruction Attorney Id </th>
                                <td> {{ $casefile->instruction_attorney_id }} </td>
                            </tr>
                            <tr>
                                <th> Tags </th>
                                <td> 
                                    @foreach($casefile->tags as $tag)
                                        <span class="badge badge-info">{{$tag->name}}</span>
                                    @endforeach 
                                </td>
                            </tr>
                            
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

