@if(count($attorneyNoti) != 0)        
    <h2 style="background-color: #d5af2a; font-size: 20px; color: #fff; padding: 5px;" align="center">Your New Client</h2>
    @foreach ($attorneyNoti as $element)
        <a class="attorney" data-id="{{ $element->id }}" href="{{ url('/client/client/' . $element->id) }}" target="_blank">
            <div class="mail-contnet" align="center">
                <span style="color: #000;">Client Name: <b> {{$element->name}}</b></span>
                <span class="mail-desc">Client Email: <b>{{$element->email??''}}</b></span>
                <span class="time">Client Contact: <b>{{$element->contact??''}}</b></span>
            </div>
        </a>
    @endforeach
@else
    <a class="text-center">
        <strong>No Client Notification</strong>
        <i class="fa fa-angle-right"></i>
    </a>
@endif
@if(count($attorneyEventNoti) != 0)
    <h2 style="background-color: #d5af2a; font-size: 20px; color: #fff; padding: 5px;" align="center">Your New Events</h2>
    @foreach ($attorneyEventNoti as $element)
        <a class="event" data-id="{{ $element->id }}" href="{{ url('dashboard') }}" target="_blank">
            <div class="mail-contnet" align="center">
                <span style="color: #000;">Event Title: <b> {{$element->caseEvent->name??''}}</b></span>
                <span class="mail-desc">Event Date: <b>{{$element->caseEvent->date??''}}</b></span>
                <span class="time">Event Location: <b>{{$element->caseEvent->location??''}}</b></span>
            </div>
        </a>
    @endforeach
@else
    <a class="text-center">
        <strong>No Event Notification</strong>
        <i class="fa fa-angle-right"></i>
    </a>
@endif
@if(count($juniorCounsels) != 0)
    <h2 style="background-color: #d5af2a; font-size: 20px; color: #fff; padding: 5px;" align="center">Case Junior Counsel</h2>
    @foreach ($juniorCounsels as $element)
        <a class="junior_counsel" data-id="{{ $element->id }}" href="{{ url('case_junior_counsel') }}" target="_blank">
            <div class="mail-contnet" align="center">
                <span style="color: #000;">Case Party Name: <b> {{$element->getCaseDetail->name_of_parties??''}}</b></span>
                <span class="mail-desc">Case Judge Name: <b>{{$element->getCaseDetail->judge_name??''}}</b></span>
                <span class="time">Case Number: <b>{{$element->getCaseDetail->case_number??''}}</b></span>
            </div>
        </a>
    @endforeach
@else
    <a class="text-center">
        <strong>No Junior Counsel Notification</strong>
        <i class="fa fa-angle-right"></i>
    </a>
@endif
@if(count($seniorCounsel) != 0)
    <h2 style="background-color: #d5af2a; font-size: 20px; color: #fff; padding: 5px;" align="center">Case Senior Counsel</h2>
    @foreach ($seniorCounsel as $element)
        <a class="senior_counsel" data-id="{{ $element->id }}" href="{{ url('case_senior_counsel') }}" target="_blank">
            <div class="mail-contnet" align="center">
                <span style="color: #000;">Case Party Name: <b> {{$element->getCaseDetail->name_of_parties??''}}</b></span>
                <span class="mail-desc">Case Judge Name: <b>{{$element->getCaseDetail->judge_name??''}}</b></span>
                <span class="time">Case Number: <b>{{$element->getCaseDetail->case_number??''}}</b></span>
            </div>
        </a>
    @endforeach
@else
    <a class="text-center">
        <strong>No Senior Counsel Notification</strong>
        <i class="fa fa-angle-right"></i>
    </a>
@endif
@if(count($kingCounsel) != 0)
    <h2 style="background-color: #d5af2a; font-size: 20px; color: #fff; padding: 5px;" align="center">Case King Counsel</h2>
    @foreach ($kingCounsel as $element)
        <a class="king_counsel" data-id="{{ $element->id }}" href="{{ url('case_king_counsel') }}" target="_blank">
            <div class="mail-contnet" align="center">
                <span style="color: #000;">Case Party Name: <b> {{$element->getCaseDetail->name_of_parties??''}}</b></span>
                <span class="mail-desc">Case Judge Name: <b>{{$element->getCaseDetail->judge_name??''}}</b></span>
                <span class="time">Case Number: <b>{{$element->getCaseDetail->case_number??''}}</b></span>
            </div>
        </a>
    @endforeach
@else
    <a class="text-center">
        <strong>No King Counsel Notification</strong>
        <i class="fa fa-angle-right"></i>
    </a>
@endif
@if(count($paralegalCounsel) != 0)
    <h2 style="background-color: #d5af2a; font-size: 20px; color: #fff; padding: 5px;" align="center">Case Paralegal</h2>
    @foreach ($paralegalCounsel as $element)
        <a class="paralegal" data-id="{{ $element->id }}" href="{{ url('case_paralegal') }}" target="_blank">
            <div class="mail-contnet" align="center">
                <span style="color: #000;">Case Party Name: <b> {{$element->getCaseDetail->name_of_parties??''}}</b></span>
                <span class="mail-desc">Case Judge Name: <b>{{$element->getCaseDetail->judge_name??''}}</b></span>
                <span class="time">Case Number: <b>{{$element->getCaseDetail->case_number??''}}</b></span>
            </div>
        </a>
    @endforeach
@else
    <a class="text-center">
        <strong>No Paralegal Notification</strong>
        <i class="fa fa-angle-right"></i>
    </a>
@endif