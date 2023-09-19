<!doctype html>
<html lang="en">
<head>
    <title>Bill Of Cost</title>
    <style>
        #newtable{
            width: 100%;
        }
        #newtable td{
            border: 1px solid black;
        }
        /*@page  {*/
        /*margin: 0;*/
        /*size: 1080px 1080px; !*or width then height 150mm 50mm*!*/
        /*}*/
    </style>
</head>
<body>
<table id="newtable" style="border-collapse: collapse; padding: 20px;">
    <p>{!! $billofcost->demo_1!!}</p>
</table>
<table id="newtable" style="border-collapse: collapse; padding: 20px;">
    <thead style="background: #333333;color: #D5AF2A;height: 50px;">
    <tr>
        <th style="color: #D5AF2A;text-align: center;">Item</th>
        <th style="color: #D5AF2A;text-align: center;">Date</th>
        <th style="color: #D5AF2A;text-align: center;">Description Of Work Done</th>
        <th style="color: #D5AF2A;text-align: center;">Attorney Fees</th>
        <th style="color: #D5AF2A;text-align: center;">Disbursements</th>
    </tr>
    </thead>
    <tbody>
    @php
        $totalFees = 0;
    @endphp
    @foreach($billofcost->casefile->originatingProcess as $item)
        @foreach($item->orignatingProcesseds as $key=>$processed)
            <tr>
                <td style="vertical-align: top;text-align: center;font-weight: bold;padding: 10px;">
                    {{$loop->iteration??$processed->id}}
                </td>
                <td style="vertical-align: top;text-align: center;padding: 10px;">
                    <p>{{$processed->title}}</p>
                </td>
                <td style="vertical-align: top;text-align: center;padding: 10px;">
                    {!! $processed->description_workdone ??''!!}
                </td>
                <td style="vertical-align: top;text-align: center;padding: 10px;">
                    <p> {!! $processed->attorney_fees ??''!!}</p>
                </td>
                <td style="vertical-align: top;text-align: center;padding: 10px;">
                    <p> {!!  $processed->dibursements  ??''!!} </p>
                </td>
            </tr>
            @php
                $totalFees += $processed->fees;
            @endphp
        @endforeach
    @endforeach
    <tr>
        <td colspan="2"></td>
        <td style="color: #000;text-align: center; font-weight: bolder;">Sub Total</td>
        <td style="text-align: center;" colspan="2">
            ${{ $billofcost->sub_total}}
        </td>
    </tr>
    <tr>
        <td colspan="2"></td>
        <td style="color: #000;text-align: center; font-weight: bolder;">Vat 12.5%</td>
        <td style="text-align: center;" colspan="2">
            {{ $billofcost->vat}}%
        </td>
    </tr>
    <tr>
        <td colspan="2"></td>
        <td style="color: #000;text-align: center; font-weight: bolder;"> Total</td>
        <td style="text-align: center;" colspan="2">
            ${{ $billofcost->total}}
        </td>
    </tr>
    </tbody>
</table>
<table id="newtable" style="border-collapse: collapse; padding: 20px;">
    <p>{!! $billofcost->demo_2!!}</p>
</table>
</body>
</html>