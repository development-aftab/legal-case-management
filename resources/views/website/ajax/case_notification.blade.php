@if(count($caseNoti) != 0)
    <h3 style="background-color: #d5af2a; font-size: 20px; color: #fff; padding: 5px;" align="center">New Case Register</h3>
    @foreach ($caseNoti as $element)
        <a class="anchor" data-id="{{ $element->id }}" href="{{ url('/client/client/' . $element->client->id) }}" target="_blank">
            <div class="mail-contnet" align="center">
                <span style="color: #000;">Client Name: <b> {{$element->client->name??''}}</b></span>
                <span class="mail-desc">Name Of Party: <b>{{$element->name_of_parties??''}}</b></span>
                <span class="time">Case Number: <b>{{$element->case_number??''}}</b></span>
            </div>
        </a>
    @endforeach
@else
   
@endif  
@if(count($invoiceNoti) != 0)
    <h3 style="background-color: #d5af2a; font-size: 20px; color: #fff; padding: 5px;" align="center">New Invoice</h3>
        @foreach ($invoiceNoti as $value)
            <a class="anchor" invoice-id="{{ $value->id }}" target="_blank" href="{{route('invoice_pdf')}}/{{$value->id??''}}" target="_blank">
                <div class="mail-contnet" align="center">
                    <span style="color: #000;">Client Name: <b>{{$value->caseFile->name_of_parties??''}}</b></span>
                    <span class="mail-desc">Invoice Number <b>{{$value->invoice_number??''}}</b></span>
                    <span class="time">Total <b>${{$value->total}}</b></span>
                </div>
            </a>
        @endforeach
@else
   
@endif 
@if(count($billNoti) != 0)
    <h3 style="background-color: #d5af2a; font-size: 20px; color: #fff; padding: 5px;" align="center">New Bill Of Cost</h3>
        @foreach ($billNoti as $item)
            <a class="anchor" cost-id="{{ $item->id }}" target="_blank" href="{{route('cost_pdf')}}/{{$item->id??''}}" target="_blank">
                <div class="mail-contnet" align="center">
                    <span style="color: #000;">This Case: <b>{{$item->caseFile->name_of_parties??''}}</b></span>
                    <span class="mail-desc">Bill Of Cost Total <b>${{$item->total??''}}</b></span>
                </div>
            </a>
        @endforeach
@else
   
@endif 
@if(count($accountingNoti) != 0)
    <h3 style="background-color: #d5af2a; font-size: 20px; color: #fff; padding: 5px;" align="center">New Client Accounting</h3>
        @foreach ($accountingNoti as $demo)
            <a class="anchor" accounting-id="{{ $demo->id }}" href="{{route('case_accounting')}}/{{$demo->casefile->id??''}}" target="_blank">
                <div class="mail-contnet" align="center">
                    <span style="color: #000;">This Client New Accounting <br> <b>{{$demo->casefile->client->name??''}}</b></span>
                    <span class="mail-desc">Payment Method Process <b>{{$demo->paymentMethod->name??''}}</b></span>
                    <span class="time">Paid Ammount: <b>{{$demo->paid_ammount??''}}</b> <br> Balance Ammount: <b>{{$demo->balance_ammount??''}}</b></span>
                </div>
            </a>
        @endforeach
@else
   
@endif