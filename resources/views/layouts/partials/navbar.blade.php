<?php
    $caseFileCount = App\CaseFile::where('case_noti', 0)->count();
    $caseInvoiceCount = App\CaseInvoice::where('invoice_noti', 0)->count();
    $caseCostCount = App\BillOfCost::where('bill_noti', 0)->count();
    $caseAccountingCount = App\Accounting::where('noti_status', 0)->count();
    $totalCount = $caseFileCount + $caseInvoiceCount + $caseCostCount + $caseAccountingCount;
    echo "Total count: " . $totalCount;
    $shortcuts = App\Shortcut::orderBy('id','DESC')->get();
    $client =  App\User::where('attorney_associate_id',Auth::id())->where('noti_status', 0)->count();
    $event = App\CaseEventMention::where('user_id',Auth::id())->where('case_event_noti', 0)->count();
    $juniorCounsel = App\CaseJuniorCounsel::where('junior_counsel_id',Auth::id())->where('case_junior_status',0)->count();
    $seniorCounsel = App\CaseSeniorCounsel::where('senior_counsel_id',Auth::id())->where('case_senior_status',0)->count();
    $kingCounsel = App\CaseKingCounsel::where('king_counsel_id',Auth::id())->where('case_king_status',0)->count();
    $paralegalCounsel = App\CaseParalegal::where('paralegal_id',Auth::id())->where('case_paralegal_status',0)->count();
    $total = $client + $event + $juniorCounsel + $seniorCounsel + $kingCounsel + $paralegalCounsel;
    echo "Total Events: " . $total;
?>
<nav class="navbar navbar-default navbar-static-top m-b-0">
    <div class="navbar-header">
        <a class="navbar-toggle font-20 hidden-sm hidden-md hidden-lg " href="javascript:void(0)" data-toggle="collapse"
           data-target=".navbar-collapse">
            <i class="fa fa-bars"></i>
        </a>
        <div class="top-left-part">
            <a class="logo" href="{{url('/')}}">
                <b>
                    <img src="{{asset('')}}{{ App\CommonSetting::first()->dashboard_logo??'' }}" alt="home" style="height: 30px" />
                </b>
                <span>
                    <img src="{{asset('')}}{{ App\CommonSetting::first()->dashboard_logo_text??'' }}" alt="homepage" class="dark-logo" style="height: 50px;width: 73px" />
                </span>
            </a>
        </div>
        <div class="navbar_right">
        <ul class="nav navbar-top-links navbar-left hidden-xs">
            <div class="main_heading">
            @if(auth()->user()->hasRole('user'))
                <h1>Admin Dashboard </h1>
            @elseif(auth()->user()->hasRole('attorney'))
                <h1>Attorney Dashboard </h1>
            @elseif(auth()->user()->hasRole('associate'))
                <h1>Associate Dashboard </h1>
            @elseif(auth()->user()->hasRole('intern'))
                <h1>Intern Dashboard </h1>
            @elseif(auth()->user()->hasRole('secretary'))
                    <h1>Secretary Dashboard </h1>
            @else
                <h1>Dashboard </h1>
            @endif
            </div>
        </ul>
            <!-- <ul class="nav navbar-top-links navbar-left hidden-xs">
                @if(session()->get('theme-layout') != 'fix-header')
                    <li class="sidebar-toggle">
                        <a href="javascript:void(0)" class="sidebartoggler font-20 waves-effect waves-light"><i class="icon-arrow-left-circle"></i></a>
                    </li>
                @endif


                {{--<li>--}}
                    {{--<form role="search" class="app-search hidden-xs">--}}
                        {{--<i class="icon-magnifier"></i>--}}
                        {{--<input type="text" placeholder="Search..." class="form-control">--}}
                    {{--</form>--}}
                {{--</li>--}}
            </ul> -->
                @foreach($shortcuts as $cuts)
                <ul class="nav navbar-top-links navbar-right pull-right">
                    <li>
                        <a href="{{$cuts->url}}" data-toggle="tooltip" class="custom_tooltip" data-placement="bottom" title="{{$cuts->name}}" target="_blank"><img src="{{asset('website')}}/assets/images/Group 7.png" alt=""></a>
                    </li>
                </ul>
                @endforeach

            <ul class="nav navbar-top-links navbar-right pull-right">
                <li class="dropdown">
                    @if(auth()->user()->hasRole('user'))
                        <a class="dropdown-toggle waves-effect waves-light font-20" data-toggle="dropdown" href="javascript:void(0);">
                        <!-- <i class="icon-speech"></i> -->
                            <img src="{{asset('website')}}/assets/images/bell_icon.png" alt="">
                            <span class="badge badge-xs badge-danger" id="case_noti">{{$totalCount}}</span>
                        </a>
                    @elseif(auth()->user()->hasRole('secretary'))
                        <li>
                            <h6>Secretary Dashboard</h6>
                        </li>
                    @elseif(auth()->user()->hasRole('intern'))
                    
                    @elseif(auth()->user()->hasRole('attorney'))
                         {{--<a class="dropdown-toggle waves-effect waves-light font-20" data-toggle="dropdown" href="javascript:void(0);">--}}
                            {{--<i class="icon-speech"></i>--}}
                            {{--<img src="{{asset('website')}}/assets/images/bell_icon.png" alt="">--}}
                            {{--<span class="badge badge-xs badge-danger" id="noti_status"><?php--}}
                            {{--echo  App\User::where('attorney_associate_id',Auth::id())->where('noti_status', 0)->count();--}}
                            {{--?></span>--}}
                        {{--</a>--}}
                        <a class="dropdown-toggle waves-effect waves-light font-20" data-toggle="dropdown" href="javascript:void(0);">
                        <!-- <i class="icon-speech"></i> -->
                            <img src="{{asset('website')}}/assets/images/bell_icon.png" alt="">
                            <span class="badge badge-xs badge-danger" id="noti_status">{{$total}}</span>
                        </a>
                    @else
                    
                    @endif
                <ul class="dropdown-menu mailbox animated bounceInDown">
                   
                    <li>
                        <div class="message-center">
                          {{--   <a href="javascript:void(0);">
                                <div class="user-img">
                                    <img src="{{asset('plugins/images/users/1.jpg')}}" alt="user" class="img-circle">
                                    <span class="profile-status online pull-right"></span>
                                </div>
                                <div class="mail-contnet">
                                    <h5>Pavan kumar</h5>
                                    <span class="mail-desc">Just see the my admin!</span>
                                    <span class="time">9:30 AM</span>
                                </div>
                            </a>
                            <a href="javascript:void(0);">
                                <div class="user-img">
                                    <img src="{{asset('plugins/images/users/2.jpg')}}" alt="user" class="img-circle">
                                    <span class="profile-status busy pull-right"></span>
                                </div>
                                <div class="mail-contnet">
                                    <h5>Sonu Nigam</h5>
                                    <span class="mail-desc">I've sung a song! See you at</span>
                                    <span class="time">9:10 AM</span>
                                </div>
                            </a>
                            <a href="javascript:void(0);">
                                <div class="user-img">
                                    <img src="{{asset('plugins/images/users/3.jpg')}}" alt="user"
                                        class="img-circle"><span class="profile-status away pull-right"></span>
                                </div>
                                <div class="mail-contnet">
                                    <h5>Arijit Sinh</h5>
                                    <span class="mail-desc">I am a singer!</span>
                                    <span class="time">9:08 AM</span>
                                </div>
                            </a>
                            <a href="javascript:void(0);">
                                <div class="user-img">
                                    <img src="{{asset('plugins/images/users/4.jpg')}}" alt="user" class="img-circle">
                                    <span class="profile-status offline pull-right"></span>
                                </div>
                                <div class="mail-contnet">
                                    <h5>Pavan kumar</h5>
                                    <span class="mail-desc">Just see the my admin!</span>
                                    <span class="time">9:02 AM</span>
                                </div>
                            </a> --}}
                        </div>
                    </li>
                    {{-- <li>
                        <a class="text-center" href="javascript:void(0);">
                            <strong>See all notifications</strong>
                            <i class="fa fa-angle-right"></i>
                        </a>
                    </li> --}}
                </ul>
            </li>
                <!-- <li class="dropdown">
                    <a class="dropdown-toggle waves-effect waves-light font-20" data-toggle="dropdown"
                    href="javascript:void(0);"> -->
                        <!-- <i class="icon-calender"></i> -->
                        <!-- <img src="{{asset('website')}}/assets/images/bell_icon.png" alt="">
                        <span class="badge badge-xs badge-danger">3</span>
                    </a>
                    <ul class="dropdown-menu dropdown-tasks animated slideInUp">
                        <li>
                            <a href="javascript:void(0);">
                                <div>
                                    <p>
                                        <strong>Task 1</strong>
                                        <span class="pull-right text-muted">40% Complete</span>
                                    </p>
                                    <div class="progress progress-striped active">
                                        <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40"
                                            aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                                            <span class="sr-only">40% Complete (success)</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="javascript:void(0);">
                                <div>
                                    <p>
                                        <strong>Task 2</strong>
                                        <span class="pull-right text-muted">20% Complete</span>
                                    </p>
                                    <div class="progress progress-striped active">
                                        <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="20"
                                            aria-valuemin="0" aria-valuemax="100" style="width: 20%">
                                            <span class="sr-only">20% Complete</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="javascript:void(0);">
                                <div>
                                    <p>
                                        <strong>Task 3</strong>
                                        <span class="pull-right text-muted">60% Complete</span>
                                    </p>
                                    <div class="progress progress-striped active">
                                        <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="60"
                                            aria-valuemin="0" aria-valuemax="100" style="width: 60%">
                                            <span class="sr-only">60% Complete (warning)</span>
                                        </div>
                                    </div> -->
                                <!-- </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="javascript:void(0);">
                                <div>
                                    <p>
                                        <strong>Task 4</strong>
                                        <span class="pull-right text-muted">80% Complete</span>
                                    </p>
                                    <div class="progress progress-striped active">
                                        <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="80"
                                            aria-valuemin="0" aria-valuemax="100" style="width: 80%">
                                            <span class="sr-only">80% Complete (danger)</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a class="text-center" href="javascript:void(0);">
                                <strong>See All Tasks</strong>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </li>
                    </ul>
                </li>-->
                <li class="dropdown profile_picture">
                    <a class="dropdown-toggle waves-effect waves-light font-20" data-toggle="dropdown" href="javascript:void(0);">
                        <div class="profile-image">
                            @if(auth()->user()->profile->pic == null)
                                <img src="{{asset('storage/uploads/users/no_avatar.jpg')}}" alt="user-img" class="img-circle">
                            @else 
                                <img src="{{asset('storage/uploads/users/'.auth()->user()->profile->pic)}}" alt="user-img" class="img-circle">
                            @endif
                        </div>
                    </a>
                    <ul class="dropdown-menu dropdown-tasks animated slideInUp">
                        <li>
                                <div>
                                    <p>
                                        <a href="{{route('logout')}}">
                                            <i class="fas fa-sign-out-alt"></i>
                                            <strong>Logout</strong>
                                        </a>
                                    </p>
                                    <p>
                                        <a href="{{url('account-settings')}}">
                                            <i class="fas fa-sign-out-alt"></i>
                                            <strong>View Profile</strong>
                                        </a>
                                    </p>
                                </div>
                        </li>
                    </ul>
                </li> 
                <!-- <li class="right-side-toggle">
                    <a class="right-side-toggler waves-effect waves-light b-r-0 font-20" href="javascript:void(0)">
                        <i class="icon-settings"></i>
                    </a>
                </li> -->
                {{--<li class="profile_picture">--}}
                    {{--<div class="profile-image">--}}
                        {{--@if(auth()->user()->profile->pic == null)--}}
                            {{--<img src="{{asset('storage/uploads/users/no_avatar.jpg')}}" alt="user-img" class="img-circle">--}}
                        {{--@else--}}
                            {{--<img src="{{asset('storage/uploads/users/'.auth()->user()->profile->pic)}}" alt="user-img" class="img-circle">--}}
                        {{--@endif--}}
                    {{--</div>--}}
                {{--</li>--}}
            </ul>
        </div>
    </div>
</nav>
@push('js')
    <script>
        $('.custom_tooltip').tooltip(options);
    </script>
@endpush