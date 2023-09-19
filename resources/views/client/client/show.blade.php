@extends('layouts.master')
@push('css')
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v6.0.0-beta3/css/all.css">
@endpush
@section('content')

    <section class="detail_view_sec case_detail_sec">
        <div class="container-fluid custom_client_info">
            <div class="row">
            <div class="col-md-12">
                    <div class="white-box ">
                        <div class="row">
                            <div class="col-md-6">
                                <table>
                                    <thead>
                                    <tr>
                                        <th colspan="2" style="border-bottom: 1px solid black;">Client Info<i class="fa-thin fa-user-tie"></i></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <th>Name : </th> <td>{{$client->name??''}}</td>
                                    </tr>
                                    <tr>
                                        <th>Address : </th> <td>{{$client->profile->address??''}}</td>
                                    </tr>
                                    <tr>
                                        <th>Next of Kin : </th> <td>{{$client->profile->next_of_kin??''}}</td>
                                    </tr>
                                    <tr>
                                        <th>Marital Status : </th> <td>{{$client->profile->marital_status??''}}</td>
                                    </tr>
                                    <tr>
                                        <th>How did you hear about us ?</th> <td>{{@$client->firm->name}}</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-md-6">
                                <table>
                                    <thead>
                                        <tr>
                                            <th colspan="2">&nbsp;</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th>Email : </th><td>{{$client->email??''}}</td>
                                        </tr>
                                        <tr>
                                            <th>Contact No : </th><td>{{$client->contact??''}}</td>
                                        </tr>
                                        <tr>
                                            <th>Salary : </th><td>${{$client->profile->salary??''}}</td>
                                        </tr>
                                        <tr>
                                            <th>Payment Detail : </th><td>@foreach($client->clientPaymentMethods as $methods) {{@$methods->paymentMethod->name??''}}<br> @endforeach</td>
                                        </tr>
                                        <tr>
                                            <th>Describe client's attitude : </th><td>{{@$client->clientAttitude->name??''}}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-md-12">
                                <table>
                                    <thead>
                                        <tr>
                                            <th colspan="2">&nbsp;</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th>Original ID : </th><td><a href="{{asset('website')}}/{{$client->document??''}}" target="_blank"><img class="img-fluid" src="{{asset('website')}}/assets/images/doc-icon.png"></a></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            {{--<div class="col-md-12"><h4>Client  Info</h4></div>--}}
                            {{--<div class="col-md-7">--}}
                                {{--<p><span>Name:</span>{{$client->name??''}}</p>--}}
                                {{--<p><span>Address:</span>{{$client->profile->address??''}}</p>--}}
                                {{--<p><span>Next Of Kin:</span>{{$client->profile->next_of_kin??''}}</p>--}}
                                {{--<p><span>Marital Status:</span>{{$client->profile->marital_status??''}}</p>--}}
                                {{--<p><span>How You Came To Know About The Firm ? </span></p>--}}
                                {{--<p>{{$client->firm->name}}</p>--}}
                            {{--</div>--}}
                            {{--<div class="col-md-5">--}}
                                {{--<p><span>Email:</span>{{$client->email??''}}</p>--}}
                                {{--<p><span>Contact No:</span>{{$client->contact??''}}</p>--}}
                                {{--<p><span>Salary:</span> ${{$client->profile->salary??''}}</p>--}}
                                {{--<p><span>Payment Detail:</span>{{$client->paymentMethod->name??''}}</p>--}}
                                {{--<p><span>Describe client attitude?</span></p>--}}
                                {{--<p>{{$client->clientAttitude->name??''}}</p>--}}
                            {{--</div>--}}
                        </div>
                    </div>
                </div>

                    @foreach($client->clientCase as $clientCase)
                        <div class="col-md-12">
                            <div class="white-box ">
                                <div class="row">

                                    <div class="col-md-6">
                                        <table>
                                            <thead>

                                            <tr>
                                                <th colspan="2" style="border-bottom: 1px solid black;">Case Info<i class="fa-thin fa-scale-balanced"></i></th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <th>Case NO# : </th> <td>{{$clientCase->case_number ??''}}</td>
                                            </tr>
                                            <tr>
                                                <th>Senior Counsel : </th> <td><ul>@foreach($clientCase->seniorCounsels as $senior)<li>{{$senior->caseSeniorCounsel->name ??''}}</li>@endforeach</ul></td>
                                            </tr>
                                            <tr>
                                                <th>King Counsel : </th> <td><ul>@foreach($clientCase->kingCounsels as $senior)<li>{{$senior->caseKingCounsel->name ??''}}</li>@endforeach</ul></td>
                                            </tr>
                                            <tr>
                                                <th>Tags ( Trend ): </th> <td>@foreach($clientCase->tags as $tag)#{{$tag->name ??''}} @endforeach</td>
                                            </tr>
                                            <tr>
                                                <th>Document Center : </th> <td><ul>@foreach($clientCase->originatingProcess as $process) <li><a href="{{ url('originating_process', [$process->id]) }}">{{$process->process->name ??''}}</a></li>@endforeach</ul></td>
                                            </tr>
                                            </tbody>
                                        </table>

                                        <table class="custom_case_status">
                                            <thead>
                                            <tr>
                                                <th>
                                                    Case Condition
                                                </th>
                                            </tr>
                                            <tr>
                                                <td>
                                                    {{$clientCase->case_condition ??''}}
                                                </td>
                                            </tr>
                                            </thead>
                                        </table>
                                    </div>
                                    <div class="col-md-6">
                                        <table>
                                            <thead>
                                            <tr>
                                                <th colspan="2">&nbsp;</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <th>Name of Parties : </th><td>{{$clientCase->name_of_parties ??''}}</td>
                                            </tr>
                                            <tr>
                                                <th>Judge Name : </th><td>{{$clientCase->judge_name ??''}}</td>
                                            </tr>
                                            <tr>
                                                <th>Chambers Manager : </th><td><ul>@foreach($clientCase->ChambersManagers as $senior)<li>{{$senior->caseChambersManager->name ??''}}</li>@endforeach</ul></td>
                                            </tr>
                                            <tr>
                                                <th>Paralegal : </th><td><ul>@foreach($clientCase->Paralegals as $king)<li>{{$king->caseParalegal->name ??''}}</li>@endforeach</ul></td>
                                            </tr>
                                            <tr>
                                                <th>Junior Counsel : </th><td><ul>@foreach($clientCase->JuniorCounsel as $junior)<li>{{$junior->CaseJuniorCounsel->name ??''}}</li>@endforeach</ul></td>
                                            </tr>
                                            <tr>
                                                <th>Type of Matter : </th><td><ul>@foreach($clientCase->typeOfMatters as $matter)<li>{{$matter->caseTypeOfMatters->name ??''}}</li>@endforeach</ul></td>
                                            </tr>
                                            <tr>
                                                <th>Client Retainer Agreement: </th><td><a href="{{asset('website')}}/{{$clientCase->retainer_agreement??''}}" target="_blank">abc.file</a></td>
                                            </tr>
                                            <tr>
                                                <th>
                                                    @if ($clientCase)

                                                    @else
                                                        Next Court Date:
                                                    @endif
                                                </th>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    {{--<div class="col-md-12"><h4>Case Info </h4></div>--}}
                                    {{--<div class="col-md-7">--}}
                                        {{--<p><span>Case Num#:</span>{{$clientCase->case_number ??''}}</p>--}}
                                        {{--<p><span>Instruction attorney:</span>{{$clientCase->instructionAttorney->name ??''}}</p>--}}
                                        {{--<p><span>Senior Counsel:</span>--}}
                                            {{--<ul>--}}
                                                {{--@foreach($clientCase->seniorCounsels as $senior)--}}
                                                {{--<li>{{$senior->caseSeniorCounsel->name ??''}}</li>--}}
                                                {{--@endforeach--}}
                                            {{--</ul>--}}
                                        {{--</p>--}}
                                        {{--<p><span>Retainer Agreement:</span>{{$clientCase->retainer_agreement ??''}}</p>--}}
                                        {{--<p><span>Tags ( Trend ): </span>--}}
                                            {{--@foreach($clientCase->tags as $tag)--}}
                                                {{--#{{$tag->name ??''}}--}}
                                            {{--@endforeach--}}
                                        {{--</p>--}}
                                        {{--<p><span>Originating Process: </span>--}}
                                            {{--@foreach($clientCase->originatingProcess as $process)--}}
                                                {{--<a href="{{ url('originating_process', [$process->id]) }}">{{$process->process->name ??''}}</a>--}}
                                            {{--@endforeach--}}
                                        {{--</p>--}}
                                    {{--</div>--}}
                                    {{--<div class="col-md-5">--}}
                                        {{--<p><span>Name of Parties:</span>--}}
                                            {{--{{$clientCase->name_of_parties ??''}}</p>--}}
                                        {{--<p><span>Judge Name:</span>--}}
                                            {{--{{$clientCase->judge_name ??''}}</p>--}}
                                        {{--<p><span>Junior Attorney:</span>--}}
                                            {{--{{$clientCase->juniorAttorney->name ??''}}</p>--}}
                                        {{--<p><span>King Counsel:</span>--}}
                                            {{--<ul>--}}
                                                {{--@foreach($clientCase->kingCounsels as $king)--}}
                                                    {{--<li>{{$king->caseKingCounsel->name ??''}}</li>--}}
                                                {{--@endforeach--}}
                                            {{--</ul>--}}
                                        {{--</p>--}}
                                        {{--<p><span>Type of Matter:</span>--}}
                                            {{--<ul>--}}
                                                {{--@foreach($clientCase->typeOfMatters as $matter)--}}
                                                    {{--<li>{{$matter->caseTypeOfMatters->name ??''}}</li>--}}
                                                {{--@endforeach--}}
                                            {{--</ul>--}}
                                        {{--</p>--}}

                                            {{--@if ($clientCase)--}}

                                            {{--@else--}}
                                                {{--<p><span>Next Court Date:</span></p>--}}
                                            {{--@endif--}}
                                    {{--</div>--}}
                                    {{--<div class="col-md-12">--}}
                                        {{--<p><span>Case Status</span></p>--}}
                                        {{--<p class="description_para">--}}
                                        {{--{{$clientCase->case_condition ??''}}--}}
                                        {{--</p>--}}
                                    {{--</div>--}}
                                </div>
                            </div>
                        </div>
                    @endforeach

            </div>
        </div>
    </section>
@endsection

