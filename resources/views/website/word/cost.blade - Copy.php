{{--@extends('layouts.master')--}}


{{--@section('content')--}}
    <div style="margin: 20px; float: left;">
        <div style="font-family: monospace;padding-bottom: 40px;width: 100%; justify-content: space-between;">
            <div style="float: left">
                <div style="width: 330px;height: 200px;margin-right: 40px;float: left">
                    {{--<img src="{{asset('website/assets/images/big_logo.png')}}" alt="" style="width: 100%;height:100%;object-fit: contain;object-position: center;">--}}
                    <img style="width:100%; height: 100%; padding-bottom: 20px; object-fit:contain; object-position: center ;" src="data:image/png;base64,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" alt="">
                </div>
                <div style="float: left;margin-right: 130px;margin-left: 30px;">
                    <h6 style="color: white; margin-bottom: 30px; background-color: #333333; border-radius: 10px; padding: 20px 30px; font-size: 17px; font-weight: 400; line-height: 22px;">Legal Case Management</h6>
                    @foreach($lcm as $item)
                        <div style="">
                            <h4 style="font-size:15px;margin: 0px; margin-bottom: -20px;">Address : {{$item->profile->address}}</h4><br>
                            <h4 style="font-size:15px;margin: 0px; margin-bottom: -20px;">Phone : {{$item->contact}}</h4><br>
                            <h4 style="font-size:15px;margin: 0px; margin-bottom: -20px;">Email : {{$item->email}}</h4><br>
                        </div>
                    @endforeach
                </div>
                <div style="float:right; margin-left: 20px;">
                    <h6 style="color: white; background-color: #333333; border-radius: 10px; padding: 20px 30px; font-size: 17px; font-weight: 400; line-height: 22px;">Case Information</h6>
                    <br>
                    <div>
                        <h4 style="font-size:15px;margin: 0px;">Case ID #: {{$billofcost->casefile->case_number}}</h4>
                        <h4 style="font-size:15px;margin: 0px;">Case Name: {{$billofcost->casefile->name_of_parties}}</h4>
                        <h4 style="font-size:15px;margin: 0px;">
                            Trends:
                            @foreach($billofcost->casefile->tags as $tag)
                                <span>#</span>{{ $tag->name }}
                            @endforeach
                        </h4>
                        <h4 style="font-size:15px;margin: 0px;">Assigned Attorney: {{ $billofcost->casefile->attorney_associate_id->attorneyOrAssociate->name}}</h4>
                    </div>
                </div>
            </div>
        </div>
        <div style="float:left;border-top: 2px solid rgba(213, 175, 42,1); margin-top: 20px;">
            <div style="width:100%;float:left;justify-content: space-between;margin-top: 50px;">
            </div>
            <div style="min-width: 1200px">

            </div>
            <table border="1" style="border-color: #D5AF2A;width: 100%">
                <thead style="background: #333333;color: #D5AF2A;height: 50px;">
                <tr>
                    <th style="color: #D5AF2A;text-align: center;">Item</th>
                    <th style="color: #D5AF2A;text-align: center;">E-Files Name</th>
                    <th style="color: #D5AF2A;text-align: center;">Doc Pages</th>
                    <th style="color: #D5AF2A;text-align: center;">E-Files Fees</th>
                </tr>
                </thead>
                <tbody>
                @foreach($billofcost->casefile->originatingProcess as $item)
                    @foreach($item->orignatingProcesseds as $key=>$processed)
                        <tr>
                            <td style="vertical-align: top;text-align: center;font-weight: bold;padding: 10px;">
                                {{$loop->iteration??$processed->id}}
                            </td>
                            <td style="vertical-align: top;text-align: center;padding: 10px;">
                                <p>{{$processed->title}}</p>
                            </td>
                            <td  style="vertical-align: top;text-align: center;padding: 10px;">
                                {{ preg_match_all("/\/Page\W/", file_get_contents(public_path('website').'/'.$processed->file??''))}} Pages
                            </td>
                            <td style="vertical-align: top;text-align: center; padding: 10px;">
                                <p>${{$processed->fees}}</p>
                            </td>
                        </tr>
                    @endforeach
                @endforeach
                </tbody>
            </table>
            <div style="padding-top:20px;margin-top:20px;float: left;">
                <h2 style="font-size:20px;margin:0px;padding: 0;"><b id="total"></b></h2>
            </div>
        </div>
    </div>
{{--@endsection--}}
{{--@push('js')--}}
{{--<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>--}}
{{--<script>--}}
    {{--$(document).ready(function() {--}}
        {{--var total = 0;--}}
        {{--@foreach($billofcost->casefile->originatingProcess as $item)--}}
                {{--@foreach($item->orignatingProcesseds as $processed)--}}
            {{--total += {{ $processed->fees }};--}}
        {{--@endforeach--}}
    {{--@endforeach--}}
{{--$("#total").text('Total: $' + total);--}}
    {{--});--}}
{{--</script>--}}
{{--@endpush--}}