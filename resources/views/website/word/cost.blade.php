

    <div>
    {!! $billofcost->demo_1!!}
<table style="border: 2px solid black;">
    <thead>
    <tr>
        <th style="font-size: 18px; font-weight: bold; font-family: serif; text-align: center;">Item</th>
        <th style="font-size: 18px; font-weight: bold; font-family: serif; text-align: center;">Date</th>
        <th style="font-size: 18px; font-weight: bold; font-family: serif; text-align: center;">Description Of Work Done</th>
        <th style="font-size: 18px; font-weight: bold; font-family: serif; text-align: center;">Pages</th>
        <th style="font-size: 18px; font-weight: bold; font-family: serif; text-align: center;">Attorney Fees</th>
        <th style="font-size: 18px; font-weight: bold; font-family: serif; text-align: center;">Disbursements</th>
    </tr>
    </thead>
    <tbody>
    @php
        $totalFees = 0;
    @endphp
    @foreach($billofcost->casefile->originatingProcess as $item)
        @foreach($item->orignatingProcesseds as $key=>$processed)
            {{ $date = $processed->date ? date('d M Y', strtotime($processed->date)) : ''}}
            <tr>
                <td style="text-align: center;">
                    {{$loop->iteration??$processed->id}}.
                </td>
                <td style="text-align: center;">
                    {{$date}}
                </td>
                <td style="text-align: center;">
                    {!! $processed->description_workdone ??''!!}
                </td>
                <td style="text-align: center;">
                    {{$processed->pdfPageCount}}Pages
                </td>
                <td style="text-align: center;">
                     {!! $processed->attorney_fees ??''!!}
                </td>
                <td style="text-align: center;">
                     {!!  $processed->dibursements  ??''!!} 
                </td>
            </tr>
            @php
                $totalFees += $processed->fees;
            @endphp
        @endforeach
    @endforeach
    <tr>
        <td colspan="4"></td>
        <td>Sub Total</td>
        <td>
            ${{ $billofcost->sub_total}}
        </td>
    </tr>
    <tr>
        <td colspan="4"></td>
        <td>Vat 12.5%</td>
        <td>
            {{ $billofcost->vat}}%
        </td>
    </tr>
    <tr>
        <td colspan="4"></td>
        <td> Total</td>
        <td>
            ${{ $billofcost->total}}
        </td>
    </tr>
    </tbody>
</table>
{!! $billofcost->demo_2!!}
    
</div>


