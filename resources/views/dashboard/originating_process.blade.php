@extends('layouts.master')

@push('css')
    <style type="text/css">
        .progressbarWrapper {
            height: 30px;
            width: 500px;
            max-width: 80%;
            display: block;
            margin: auto;
            margin-top: 20vh;
            position: relative;
            background: #555;
            padding: 3px;
            box-shadow: inset 0 -1px 1px rgba(255, 255, 255, 0.3);
        }

        #greenBar {
            display: block;
            height: 100%;
            width: 0px;
            background-color: #D5AE2A;
            background-image: linear-gradient(
                    center bottom,
                    rgb(43, 194, 83) 37%,
                    rgb(84, 240, 84) 69%
            );
            position: relative;
            overflow: hidden;
            font-size: 15px;
            text-align: center;
            color: white;
            transition: all 700ms ease;
        }
    </style>
@endpush

@section('content')
    <section class="detail_view_sec originating_process_sec">
        <div class="container-fluid">
            <div class="row">
                <!-- <div class="col-md-12">
                    <div class="white-box ">
                        <div class="row">
                            <div class="col-md-12"><h4>

                            </h4></div>

                            <div class="col-md-4">
                                <p><span>Application for leave:</span> <a href=""> Abc File.Doc</a></p>
                                <p class="description_para">
                                    <span>Notes</span>
                                    Lorem Ipsum is simply dummy text of the printing and type setting industry...
                                </p>
                            </div>

                        </div>
                    </div>
                </div> -->
                @if(isset($attorney) && $attorney==auth::user()->id)
                    <div class="col-md-1">
                        <div class="filter_btn pull-right">
                            <a href="{{url('case_management')}}" class="btn btn_black model_img img-responsive">Back</a>
                        </div>
                    </div>
                    <div class="col-md-8"></div>
                    <div class="col-md-1">
                        <div class="btns_box pull-right">
                            <button type="button" class="add_new_div btn_black model_img img-responsive" data-id="{{$Originate->id ??''}}">Add</button>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="btns_box pull-right">
                            <button type="button"  class="remove_card btn_yellow model_img img-responsive">Remove</button>
                        </div>
                    </div>
                @elseif(Auth::id()==2)
                    <div class="col-md-1">
                        <div class="filter_btn pull-right">
                            <a href="{{url('case_management')}}" class="btn btn_black model_img img-responsive">Back</a>
                        </div>
                    </div>
                    <div class="col-md-8"></div>
                    <div class="col-md-1">
                        <div class="btns_box pull-right">
                            <button type="button" class="add_new_div btn_black model_img img-responsive" data-id="{{$Originate->id ??''}}">Add</button>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="btns_box pull-right">
                            <button type="button"  class="remove_card btn_yellow model_img img-responsive">Remove</button>
                        </div>
                    </div>
                @endif
                <div class="col-md-12">
                    <div class="white-box ">
                        <div class="row">
                            <div class="col-md-12"><h4>{{$Originate->process->name ??''}}</h4></div>
                            <div class="col-md-12">
                                @if(isset($attorney) && $attorney==auth::user()->id)
                                    <div class="row full_card">
                                        <div class="col-md-4 card_part">
                                            <form class="form-horizontal  dashboard_form originating-process-form" enctype="multipart/form-data">
                                                {{ csrf_field() }}
                                                <div class="originating_process_card">
                                                    <a href="javascript:void(0)" class="multiple">
                                                        <p>
                                                            <span>Title</span>
                                                            <input class="form-control fileInput Applfiles originating_process" data-id="{{$Originate->id ??''}}" data-type="title" type="text" name="title" required>
                                                        </p>
                                                    </a>
                                                    <div class="new_file_div">
                                                        <p class="">
                                                            <span>Files</span>
                                                        </p>
                                                        <a href="javascript:void(0)" class="multiple">
                                                            <label class="z_filelabel">
                                                                <input style="display: none" data-id="{{$Originate->id ??''}}" data-type="file" class="form-control fileInput originating_process Applfiles" id="input" type="file" name="file" accept="application/pdf" required>
                                                                <img src="{{ asset('website/assets/images/formtickbox.png') }}">
                                                                <span>
                                                                    No File Selected.
                                                                </span>
                                                            </label>
                                                        </a>

                                                        <p class="">
                                                            <span>Notes</span>
                                                            <textarea name="description" id="" class="form-control description_para originating_process" data-id="{{$Originate->id ??''}}" data-type="description" cols="40" rows="8"></textarea>
                                                        </p>
                                                        <a href="javascript:void(0)" class="multiple">
                                                            <p>
                                                                <span>Date</span>
                                                                <input type="date" name="date" data-id="{{$Originate->id ??''}}" data-type="date" class="form-control fileInput originating_process Applfiles" required>
                                                                <input type="hidden" name="originate_id" value="{{$Originate->id ??''}}">
                                                            </p>
                                                        </a>
                                                    </div>
                                                    <button type="submit" class="btn btn_black create_orignating submitButton">Save</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                @elseif(Auth::id()==2)
                                    <div class="row full_card">
                                        <div class="col-md-4 card_part">
                                            <form class="form-horizontal  dashboard_form originating-process-form" enctype="multipart/form-data">
                                                {{ csrf_field() }}
                                                <div class="originating_process_card">
                                                    <a href="javascript:void(0)" class="multiple">
                                                        <p>
                                                            <span>Title</span>
                                                            <input class="form-control fileInput Applfiles originating_process" data-id="{{$Originate->id ??''}}" data-type="title" type="text" name="title" required>
                                                        </p>
                                                    </a>
                                                    <div class="new_file_div">
                                                        <p class="">
                                                            <span>Files</span>
                                                        </p>
                                                        <a href="javascript:void(0)" class="multiple">
                                                            <label class="z_filelabel">
                                                                <input style="display: none" data-id="{{$Originate->id ??''}}" data-type="file" class="form-control fileInput originating_process Applfiles" id="input" type="file" name="file" accept="application/pdf" required>
                                                                <img src="{{ asset('website/assets/images/formtickbox.png') }}">
                                                                <span>
                                                                    No File Selected.
                                                                </span>
                                                            </label>
                                                        </a>

                                                        <p class="">
                                                            <span>Notes</span>
                                                            <textarea name="description" id="" class="form-control description_para originating_process" data-id="{{$Originate->id ??''}}" data-type="description" cols="40" rows="8"></textarea>
                                                        </p>
                                                        <a href="javascript:void(0)" class="multiple">
                                                            <p>
                                                                <span>Date</span>
                                                                <input type="date" name="date" data-id="{{$Originate->id ??''}}" data-type="date" class="form-control fileInput originating_process Applfiles" required>
                                                                <input type="hidden" name="originate_id" value="{{$Originate->id ??''}}">
                                                            </p>
                                                        </a>
                                                    </div>
                                                    <button type="submit" class="btn btn_black create_orignating submitButton">Save</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                @endif
                                <div class="row">
                                    @if(isset($attorney) && $attorney==auth::user()->id)
                                        @foreach($Processed as $process)
                                            <div class="col-md-4">
                                                <form class="form-horizontal dashboard_form" action="{{route('originating_update_ajax')}}" method="post">
                                                    {{ csrf_field() }}
                                                    <div class="originating_process_card">
                                                        <a href="javascript:void(0)" class="multiple">
                                                            <p>
                                                                <span>{{$process->title}}</span>
                                                                <input class="form-control fileInput Applfiles originating_process" data-type="title" type="text" name="title" value="{{$process->title}}">
                                                            </p>
                                                        </a>
                                                        <div class="new_file_div">
                                                            <p class="">
                                                                <a data-title="{{@$process->title??''}}" data-file="{{asset('website')}}/{{ @$process->file }}" data-case="{{@$Originate->getCaseDetail->name_of_parties??''}}" class="share_btn pull-right" style="padding: 10px 0px 10px 0px;"><img style="cursor: pointer; width: 70%;" src="{{asset('website')}}/assets/images/share.png"></a>
                                                                <a class="pull-right" href="{{asset('website')}}/{{ $process->file }}" target="_blank" style="padding: 10px 0px 10px 0px;"><img style="width: 90%;" src="{{asset('website')}}/assets/images/pdf.png"></a>
                                                            </p>
                                                            <a href="javascript:void(0)" class="multiple">
                                                                <label class="z_filelabel">
                                                                    <input style="display: none" data-type="file" class="form-control fileInput originating_process Applfiles" id="input" type="file" name="file" accept="application/pdf">
                                                                    <img src="{{ asset('website/assets/images/formtickbox.png') }}">
                                                                    <span>
                                                                        Change Selected File
                                                                    </span>
                                                                </label>
                                                            </a>

                                                            <p class="">
                                                                <span>Notes</span>
                                                                <textarea name="description" id="" class="form-control description_para originating_process" data-type="description" cols="40" rows="8">{{@$process->description??''}}</textarea>
                                                            </p>
                                                            <a href="javascript:void(0)" class="multiple">
                                                                <p>
                                                                    <span>Date</span>
                                                                    <input type="date" name="date" data-type="date" class="form-control fileInput originating_process Applfiles" value="{{$process->date??''}}">
                                                                    <input type="hidden" class="id" name="id" id="id" value="{{@$process->id ??''}}">
                                                                </p>
                                                            </a>
                                                        </div>
                                                        <button type="submit" class="btn btn_black submitButton">Save</button>
                                                        <a class="btn btn_yellow pull-right" href="{{ route('originating_processed_destory' , [$process->id??'']) }}"
                                                        title="Delete {{ preg_replace('/(?<=[a-z])[A-Z]|[A-Z](?=[a-z])/', ' $0', 'Document Center') }}" onclick="return confirm(&quot;Confirm delete?&quot;)">
                                                            Delete
                                                        </a>
                                                    </div>
                                                </form>
                                            </div>
                                        @endforeach
                                    @elseif(Auth::id()==2)
                                        @foreach($Processed as $process)
                                            <div class="col-md-4">
                                                <form class="form-horizontal dashboard_form" action="{{route('originating_update_ajax')}}" method="post">
                                                    {{ csrf_field() }}
                                                    <div class="originating_process_card">
                                                        <a href="javascript:void(0)" class="multiple">
                                                            <p>
                                                                <span>{{$process->title}}</span>
                                                                <input class="form-control fileInput Applfiles originating_process" data-type="title" type="text" name="title" value="{{$process->title}}">
                                                            </p>
                                                        </a>
                                                        <div class="new_file_div">
                                                            <p class="">
                                                                <a data-title="{{@$process->title??''}}" data-case="{{@$Originate->getCaseDetail->name_of_parties??''}}" data-file="{{asset('website')}}/{{ @$process->file }}" class="share_btn pull-right" style="padding: 10px 0px 10px 0px;"><img style="cursor: pointer; width: 70%;" src="{{asset('website')}}/assets/images/share.png"></a>
                                                                <a class="pull-right" href="{{asset('website')}}/{{ $process->file }}" target="_blank" style="padding: 10px 0px 10px 0px;"><img style="width: 90%;" src="{{asset('website')}}/assets/images/pdf.png"></a>
                                                            </p>
                                                            <a href="javascript:void(0)" class="multiple">
                                                                <label class="z_filelabel">
                                                                    <input style="display: none" data-type="file" class="form-control fileInput originating_process Applfiles" id="input" type="file" name="file" accept="application/pdf">
                                                                    <img src="{{ asset('website/assets/images/formtickbox.png') }}">
                                                                    <span>
                                                                        Change Selected File
                                                                    </span>
                                                                </label>
                                                            </a>

                                                            <p class="">
                                                                <span>Notes</span>
                                                                <textarea name="description" id="" class="form-control description_para originating_process" data-type="description" cols="40" rows="8">{{@$process->description??''}}</textarea>
                                                            </p>
                                                            <a href="javascript:void(0)" class="multiple">
                                                                <p>
                                                                    <span>Date</span>
                                                                    <input type="date" name="date" data-type="date" class="form-control fileInput originating_process Applfiles" value="{{$process->date??''}}">
                                                                    <input type="hidden" class="id" name="id" id="id" value="{{@$process->id ??''}}">
                                                                </p>
                                                            </a>
                                                        </div>
                                                        <button type="submit" class="btn btn_black submitButton">Save</button>
                                                        <a class="btn btn_yellow pull-right" href="{{ route('originating_processed_destory' , [$process->id??'']) }}"
                                                        title="Delete {{ preg_replace('/(?<=[a-z])[A-Z]|[A-Z](?=[a-z])/', ' $0', 'Document Center') }}" onclick="return confirm(&quot;Confirm delete?&quot;)">
                                                            Delete
                                                        </a>
                                                    </div>
                                                </form>
                                            </div>
                                        @endforeach
                                    @else
                                        @foreach($Processed as $process)
                                            <div class="col-md-4">
                                                <form class="form-horizontal dashboard_form">
                                                    <div class="originating_process_card">
                                                        <a href="javascript:void(0)" class="multiple">
                                                            <p>
                                                                <span>Title</span>
                                                                <input class="form-control fileInput Applfiles originating_process" disabled data-type="title" type="text" name="title" value="{{$process->title}}">
                                                            </p>
                                                        </a>
                                                        <div class="new_file_div">
                                                            <p class="">
{{--                                                                <a data-title="{{@$process->title??''}}" data-file="{{asset('website')}}/{{ @$process->file }}" class="share_btn pull-right" style="padding: 10px 0px 10px 0px;"><img style="cursor: pointer; width: 70%;" src="{{asset('website')}}/assets/images/share.png"></a>--}}
                                                                <a class="pull-right" href="{{asset('website')}}/{{ $process->file }}" target="_blank" style="padding: 10px 0px 10px 0px;"><img style="width: 90%;" src="{{asset('website')}}/assets/images/pdf.png"></a>
                                                            </p>
                                                            <p class="">
                                                                <span>Notes</span>
                                                                <textarea name="description" disabled id="" class="form-control description_para originating_process" data-type="description" cols="40" rows="8">{{@$process->description??''}}</textarea>
                                                            </p>
                                                            <a href="javascript:void(0)" class="multiple">
                                                                <p>
                                                                    <span>Date</span>
                                                                    <input type="date" name="date" disabled data-type="date" class="form-control fileInput originating_process Applfiles" value="{{$process->date??''}}">
                                                                    <input type="hidden" class="id" name="id" id="id" value="{{@$process->id ??''}}">
                                                                </p>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                       </div>
                    </div>
                </div>
                <!-- <div class="col-md-12">
                    <div class="white-box ">
                        <div class="row">
                            <div class="col-md-12"><h4>{{$Originate->process->name ??''}}</h4></div>
                            <form action="" method="" class="form-horizontal row dashboard_form" enctype="multipart/form-data">
                                {{-- Application for leave/Affidavit in Support (Start) --}}
                                <div class="col-md-4">
                                    <div class="originating_process_card">
                                        {{-- @if(isset($Originate->originate_id) $Originate->originate_id==1)
                                            <span>Application for leave/Affidavit in Support</span>
                                        @else
                                            <span>No Data</span>
                                        @endif --}}
                                        @if(isset($Originate->originate_id) && $Originate->originate_id=='1')
                                            @php $name1 = "Application for leave Affidavit in Support"; @endphp
                                            @php $name2 = "Submission on leave application"; @endphp
                                            @php $name3 = "Order granting leave"; @endphp
                                            @php $name4 = "Fix Date Claim Form FDCF Affidavit in Support"; @endphp
                                            @php $name5 = "Saff in Reply"; @endphp
                                            @php $name6 = "Claimant’s Saff in response"; @endphp
                                            @php $name7 = "Evidential objections"; @endphp
                                            @php $name8 = "Cross examination application"; @endphp
                                            @php $name9 = "Application for specific disclosure"; @endphp
                                            @php $name10 = "Legal Submissions"; @endphp
                                            @php $name11 = "Judgement"; @endphp
                                            @php $name12 = "Notice of Appeal"; @endphp
                                            @php $name13 = "Record of Appeal"; @endphp
                                            @php $name14 = "Submissions"; @endphp
                                            @php $name15 = "Judgment"; @endphp
                                            @php $name16 = "Order of COA"; @endphp
                                            @php $name17 = "Application for conditional leave to PC"; @endphp
                                            @php $name18 = "Notice of Appeal in PC"; @endphp
                                            @php $name19 = "Certified Record to PC"; @endphp
                                            @php $name20 = "Reproduced Record to PC"; @endphp
                                            @php $name21 = "SFI Chrono Precis"; @endphp
                                            @php $name22 = "Case for Appellant"; @endphp
                                            @php $name23 = "Case for Respondent"; @endphp
                                            @php $name24 = "Updated Record with JBA"; @endphp
                                            @php $name25 = "Judgment from PC"; @endphp
                                            @php $name26 = "Order of PC"; @endphp
                                            @php $name27 = "Ongoing letters"; @endphp
                                            @php $name28 = "CMC orders"; @endphp
                                            @php $name29 = "Filed Bill of Costs"; @endphp
                                            <span class="sub_heading">Application for leave Affidavit in Support</span>
                                        @elseif(isset($Originate->originate_id) && $Originate->originate_id=='2')
                                            @php $name1 = "FDCF Affidavit in support "; @endphp
                                            @php $name2 = "Aff in Reply"; @endphp
                                            @php $name3 = "Claimant’s aff in response "; @endphp
                                            @php $name4 = "Evidential objections"; @endphp
                                            @php $name5 = "Cross examination application"; @endphp
                                            @php $name6 = "Application for specific disclosure"; @endphp
                                            @php $name7 = "Legal Submissions"; @endphp
                                            @php $name8 = "Judgement"; @endphp
                                            @php $name9 = "Order of HC"; @endphp
                                            @php $name10 = "Notice of Appeal"; @endphp
                                            @php $name11 = "Record of Appeal"; @endphp
                                            @php $name12 = "Submissions"; @endphp
                                            @php $name13 = "Judgment"; @endphp
                                            @php $name14 = "Order of COA"; @endphp
                                            @php $name15 = "Application for conditional leave to PC"; @endphp
                                            @php $name16 = "Application for final leave to PC "; @endphp
                                            @php $name17 = "Notice of Appeal in PC"; @endphp
                                            @php $name18 = "Certified Record to PC"; @endphp
                                            @php $name19 = "Reproduced Record to PC"; @endphp
                                            @php $name20 = "SFI Chrono Precis"; @endphp
                                            @php $name21 = "Case for Appellant"; @endphp
                                            @php $name22 = "Case for Respondent"; @endphp
                                            @php $name23 = "Updated Record with JBA"; @endphp
                                            @php $name24 = "Judgment from PC"; @endphp
                                            @php $name25 = "Order of PC"; @endphp
                                            @php $name26 = "Ongoing letters"; @endphp
                                            @php $name27 = "CMC orders"; @endphp
                                            @php $name28 = "Filed Bill of Costs"; @endphp
                                            @php $name29 = "Cross examination application"; @endphp
                                            <span class="sub_heading">FDCF Affidavit in support</span>
                                        @elseif(isset($Originate->originate_id) && $Originate->originate_id=='3')
                                            @php $name1 = "Claim form/Statement of Case"; @endphp
                                            @php $name2 = "Defence"; @endphp
                                            @php $name3 = "Cost Budget"; @endphp
                                            @php $name4 = "Reply to Defence"; @endphp
                                            @php $name5 = "List of Documents"; @endphp
                                            @php $name6 = "Pretrial applications"; @endphp
                                            @php $name7 = "Claimants Witness Statements"; @endphp
                                            @php $name8 = "Defendant Witness Statements"; @endphp
                                            @php $name9 = "Evidential Objections"; @endphp
                                            @php $name10 = "Notes from Trial"; @endphp
                                            @php $name11 = "Legal Submissions"; @endphp
                                            @php $name12 = "Judgement"; @endphp
                                            @php $name13 = "Order of HC"; @endphp
                                            @php $name14 = "Notice of Appeal"; @endphp
                                            @php $name15 = "Record of Appeal"; @endphp
                                            @php $name16 = "Submissions"; @endphp
                                            @php $name17 = "Judgment"; @endphp
                                            @php $name18 = "Application for final leave to PC "; @endphp
                                            @php $name19 = "Notice of Appeal in PC"; @endphp
                                            @php $name20 = "Certified Record to PC"; @endphp
                                            @php $name21 = "Reproduced Record to PC"; @endphp
                                            @php $name22 = "SFI/Chrono/Precis"; @endphp
                                            @php $name23 = "Case for Appellant"; @endphp
                                            @php $name24 = "Case for Respondent"; @endphp
                                            @php $name25 = "Order of PC"; @endphp
                                            @php $name26 = "Ongoing letters"; @endphp
                                            @php $name27 = "CMC orders"; @endphp
                                            @php $name28 = "Filed Bill of Costs"; @endphp
                                            @php $name29 = "Cross examination application"; @endphp
                                            <span class="sub_heading">Claim form Statement of Case</span>
                                        @endif
                                        <div class="new_file_div">
                                            @if ($Processed->where('form_id','1')->count() == 0)
                                                <a href="javascript:void(0)" class="multiple">
                                                    <label class="z_filelabel">
                                                        <input style="display: none" class="form-control fileInput Applfiles"   data-case_originates="{{ $Originate->id}}" data-filrname="Applfiles" data-index="0" id="input" type="file" name="Applfiles[0][file]" accept="application/pdf">
                                                        <img src="{{ asset('website/assets/images/formtickbox.png') }}">
                                                        <span>
                                                                No file selected.
                                                            </span>
                                                    </label>
                                                </a>

                                                <p class="">
                                                    <span>Notes</span>
                                                    <input type="hidden" name="Applfiles[0][case_originates]" value="{{ $Originate->id}}">
                                                    <textarea name="Applfiles[0][note]" id="" class="form-control description_para" cols="40" rows="8"></textarea>
                                                    <input type="date" name="Applfiles[0][date]" class="form-control " value="">
                                                </p>
                                                <div class="btns_box">
                                                    <button type="button"  class="add_new_div btn_yellow" data-case_originates="{{ $Originate->id}}" data-filrname="Applfiles" data-index="0" >Add More Files</button>
                                                </div>
                                            @else
                                                <?php $count = 0;?>
                                                @foreach ($Processed->where('form_id','1') as $keyz=>$element)
                                                    <a href="" class="multiple">
                                                        <label class="z_filelabel">
                                                            <input type="hidden" name="Applfiles[{{ $count }}][id]" value="{{ $element->id }}">
                                                            <input style="display: none" class="form-control fileInput Applfiles"  data-case_originates="{{ $element->originate_id }}" data-filrname="Applfiles" data-index="{{ $count }}" id="input" type="file" name="Applfiles[{{ $count }}][file]" accept="application/pdf">
                                                            <img src="{{ asset('website/assets/images/formcheckbox.svg') }}">
                                                        </label>
                                                    </a>
                                                    @if ($count == 0)
                                                        <button type="button"  class="add_new_div btn_yellow" data-case_originates="{{ $element->originate_id }}" data-filrname="Applfiles" data-index="{{ $Processed->where('form_id','1')->count()-1 }}" >Add More Files</button>
                                                    @endif
                                                    <p class="">
                                                        <span>Notes</span>
                                                        <input type="hidden" name="Applfiles[{{ $count }}][case_originates]" value="{{ $element->originate_id }}">
                                                        <textarea name="Applfiles[{{ $count }}][note]" id="" class="form-control description_para" cols="40" rows="8">{{ $element->description }}</textarea>
                                                        <input type="date" name="Applfiles[0][date]" class="form-control " value="{{ $element->date }}">
                                                    </p>
                                                    <a class="btn btn_yellow pull-right" href="{{ route('originating_processed_destory' , [$element->id??'']) }}"
                                                       title="Delete {{ preg_replace('/(?<=[a-z])[A-Z]|[A-Z](?=[a-z])/', ' $0', 'OriginatingProcessed') }}" onclick="return confirm(&quot;Confirm delete?&quot;)">
                                                        Delete
                                                    </a>
                                                    <?php $count++ ?>
                                                @endforeach
                                            @endif

                                        </div>
                                        <button type="button" data-form="1" class="btn btn_black submitButton" data-title="{{ $name1 }}" data-case_originates="{{ $Originate->id}}" data-filrname="Applfiles">Save</button>
                                    </div>
                                </div>
                                {{-- Application for leave/Affidavit in Support (End) --}}
                                {{-- Submission on leave application (Start) --}}
                                <div class="col-md-4">
                                    <div class="originating_process_card">
                                        <span class="sub_heading">{{ $name2 }}</span>


                                        <div class="new_file_div">
                                            @if ($Processed->where('form_id','2')->count() == 0)
                                                <a href="javascript:void(0)" class="multiple">

                                                    <label class="z_filelabel">
                                                        <input style="display: none" class="form-control fileInput Submissions" data-case_originates="{{ $Originate->id}}" data-filrname="Submissions" data-index="0" id="input" type="file" name="Submissions[0][file]" accept="application/pdf">
                                                        <img src="{{ asset('website/assets/images/formtickbox.png') }}">
                                                        <span>
                                                                No file selected.
                                                            </span>
                                                    </label>
                                                </a>

                                                <p class="">
                                                    <span>Notes</span>
                                                    <input type="hidden" name="Submissions[0][case_originates]" value="{{ $Originate->id}}">
                                                    <textarea name="Submissions[0][note]" id="" class="form-control description_para" cols="40" rows="8"></textarea>
                                                    <input type="date" name="Submissions[0][date]" class="form-control " value="" >
                                                </p>
                                                <div class="btns_box">
                                                    <button type="button"  class="add_new_div btn_yellow" data-case_originates="{{ $Originate->id}}" data-filrname="Submissions" data-index="0" >Add More Files</button>
                                                </div>
                                            @else
                                                <?php $count = 0;?>
                                                @foreach ($Processed->where('form_id','2') as $keyz=>$element)
                                                    <a href="" class="multiple">
                                                        <label class="z_filelabel">
                                                            <input type="hidden" name="Submissions[{{ $count }}][id]" value="{{ $element->id }}">
                                                            <input style="display: none" class="form-control fileInput Submissions" data-case_originates="{{ $element->originate_id }}" data-filrname="Submissions" data-index="{{ $count }}" id="input" type="file" name="Submissions[{{ $count }}][file]" accept="application/pdf">
                                                            <img src="{{ asset('website/assets/images/formcheckbox.svg') }}">

                                                        </label>

                                                    </a>
                                                    @if ($count == 0)
                                                        <button type="button"  class="add_new_div btn_yellow" data-case_originates="{{ $element->originate_id }}" data-filrname="Submissions" data-index="{{ $Processed->where('form_id','2')->count()-1 }}" >Add More Files</button>
                                                    @endif

                                                    <p class="">
                                                        <span>Notes</span>
                                                        <input type="hidden" name="Submissions[{{ $count }}][case_originates]" value="{{ $element->originate_id }}">
                                                        <textarea name="Submissions[{{ $count }}][note]" id="" class="form-control description_para" cols="40" rows="8">{{ $element->description }}</textarea>
                                                        <input type="date" name="Submissions[0][date]" class="form-control " class="form-control " value="{{ $element->date }}">
                                                    </p>
                                                    <a class="btn btn_yellow pull-right" href="{{ route('originating_processed_destory' , [$element->id??'']) }}"
                                                       title="Delete {{ preg_replace('/(?<=[a-z])[A-Z]|[A-Z](?=[a-z])/', ' $0', 'OriginatingProcessed') }}" onclick="return confirm(&quot;Confirm delete?&quot;)">
                                                        Delete
                                                    </a>
                                                    <?php $count++ ?>
                                                @endforeach
                                            @endif
                                        </div>
                                        <button type="button" data-form="2" class="btn btn_black submitButton" data-title="{{ $name2 }}" data-case_originates="{{ $Originate->id}}" data-filrname="Submissions">Save</button>
                                    </div>
                                </div>
                                {{-- Submission on leave application (End) --}}
                                {{-- Order granting leave (Start) --}}
                                <div class="col-md-4">
                                    <div class="originating_process_card">
                                        <span class="sub_heading">{{ $name3 }}</span>
                                        <div class="new_file_div">
                                            @if ($Processed->where('form_id','3')->count() == 0)
                                                <a href="javascript:void(0)" class="multiple">

                                                    <label class="z_filelabel">
                                                        <input style="display: none" class="form-control fileInput Orders" da ta-case_originates="{{ $Originate->id}}" data-filrname="Orders" data-index="0" id="input" type="file" name="Orders[0][file]" accept="application/pdf">
                                                        <img src="{{ asset('website/assets/images/formtickbox.png') }}">
                                                        <span>
                                                                No file selected.
                                                            </span>
                                                    </label>
                                                </a>

                                                <p class="">
                                                    <span>Notes</span>
                                                    <input type="hidden" name="Orders[0][case_originates]" value="{{ $Originate->id}}">
                                                    <textarea name="Orders[0][note]" id="" class="form-control description_para" cols="40" rows="8"></textarea>
                                                    <input type="date" name="Orders[0][date]" class="form-control " class="form-control " value="">
                                                </p>

                                                <div class="btns_box">
                                                    <button type="button"  class="add_new_div btn_yellow" data-case_originates="{{ $Originate->id}}" data-filrname="Orders" data-index="0" >Add More Files</button> </div>

                                            @else
                                                <?php $count = 0;?>
                                                @foreach ($Processed->where('form_id','3') as $keyz=>$element)
                                                    <a href="" class="multiple">
                                                        <label class="z_filelabel">
                                                            <input type="hidden" name="Orders[{{ $count }}][id]" value="{{ $element->id }}">
                                                            <input style="display: none" class="form-control fileInput Orders" da ta-case_originates="{{ $element->originate_id }}" data-filrname="Orders" data-index="{{ $count }}" id="input" type="file" name="Orders[{{ $count }}][file]" accept="application/pdf">
                                                            <img src="{{ asset('website/assets/images/formcheckbox.svg') }}">

                                                        </label>

                                                    </a>
                                                    @if ($count == 0)
                                                        <button type="button"  class="add_new_div btn_yellow" data-case_originates="{{ $element->originate_id }}" data-filrname="Orders" data-index="{{ $Processed->where('form_id','3')->count()-1 }}" >Add More Files</button>
                                                    @endif

                                                    <p class="">
                                                        <span>Notes</span>
                                                        <input type="hidden" name="Orders[{{ $count }}][case_originates]" value="{{ $element->originate_id }}">
                                                        <textarea name="Orders[{{ $count }}][note]" id="" class="form-control description_para" cols="40" rows="8">{{ $element->description }}</textarea>
                                                        <input type="date" name="Orders[0][date]" class="form-control " class="form-control " value="{{ $element->date }}">
                                                    </p>
                                                    <a class="btn btn_yellow pull-right" href="{{ route('originating_processed_destory' , [$element->id??'']) }}"
                                                       title="Delete {{ preg_replace('/(?<=[a-z])[A-Z]|[A-Z](?=[a-z])/', ' $0', 'OriginatingProcessed') }}" onclick="return confirm(&quot;Confirm delete?&quot;)">
                                                        Delete
                                                    </a>
                                                    <?php $count++ ?>
                                                @endforeach
                                            @endif
                                        </div>
                                        <button type="button" data-form="3" class="btn btn_black submitButton" data-title="{{ $name3 }}" data-case_originates="{{ $Originate->id}}" data-filrname="Orders">Save</button>
                                    </div>
                                </div>
                                {{-- Order granting leave (End) --}}
                                {{-- Fix Date Claim Form (FDCF)/Affidavit in Support (Start) --}}
                                <div class="col-md-4">
                                    <div class="originating_process_card">
                                        <span class="sub_heading">{{ $name4 }}</span>
                                        <div class="new_file_div">
                                            @if ($Processed->where('form_id','4')->count() == 0)
                                                <a href="javascript:void(0)" class="multiple">

                                                    <label class="z_filelabel">
                                                        <input style="display: none" class="form-control fileInput claimFiles " data-case_originates="{{ $Originate->id}}" data-filrname="claimFiles" data-index="0" id="input" type="file" name="claimFiles[0][file]" accept="application/pdf">
                                                        <img src="{{ asset('website/assets/images/formtickbox.png') }}">
                                                        <span>
                                                                No file selected.
                                                            </span>
                                                    </label>
                                                </a>

                                                <p class="">
                                                    <span>Notes</span>
                                                    <input type="hidden" name="claimFiles[0][case_originates]" value="{{ $Originate->id}}">
                                                    <textarea name="claimFiles[0][note]" id="" class="form-control description_para" cols="40" rows="8"></textarea>
                                                    <input type="date" name="claimFiles[0][date]" class="form-control " class="form-control " value="">
                                                </p>
                                                <div class="btns_box">
                                                <button type="button"  class="add_new_div btn_yellow" data-case_originates="{{ $Originate->id}}" data-filrname="claimFiles" data-index="0" >Add More Files</button> </div>
                                            @else
                                                <?php $count = 0;?>
                                                @foreach ($Processed->where('form_id','4') as $keyz=>$element)
                                                    <a href="" class="multiple">
                                                        <label class="z_filelabel">
                                                            <input type="hidden" name="claimFiles[{{ $count }}][id]" value="{{ $element->id }}">
                                                            <input style="display: none" class="form-control fileInput claimFiles " data-case_originates="{{ $element->originate_id }}" data-filrname="claimFiles" data-index="{{ $count }}" id="input" type="file" name="claimFiles[{{ $count }}][file]" accept="application/pdf">
                                                            <img src="{{ asset('website/assets/images/formcheckbox.svg') }}">

                                                        </label>

                                                    </a>
                                                    @if ($count == 0)
                                                        <button type="button"  class="add_new_div btn_yellow" data-case_originates="{{ $element->originate_id }}" data-filrname="claimFiles" data-index="{{ $Processed->where('form_id','4')->count()-1 }}" >Add More Files</button>
                                                    @endif

                                                    <p class="">
                                                        <span>Notes</span>
                                                        <input type="hidden" name="claimFiles[{{ $count }}][case_originates]" value="{{ $element->originate_id }}">
                                                        <textarea name="claimFiles[{{ $count }}][note]" id="" class="form-control description_para" cols="40" rows="8">{{ $element->description }}</textarea>
                                                        <input type="date" name="claimFiles[0][date]" class="form-control " class="form-control " value="{{ $element->date }}">
                                                    </p>
                                                    <a class="btn btn_yellow pull-right" href="{{ route('originating_processed_destory' , [$element->id??'']) }}"
                                                       title="Delete {{ preg_replace('/(?<=[a-z])[A-Z]|[A-Z](?=[a-z])/', ' $0', 'OriginatingProcessed') }}" onclick="return confirm(&quot;Confirm delete?&quot;)">
                                                        Delete
                                                    </a>
                                                    <?php $count++ ?>
                                                @endforeach
                                            @endif
                                        </div>
                                        <button type="button" data-form="4" class="btn btn_black submitButton" data-title="{{ $name4 }}" data-case_originates="{{ $Originate->id}}" data-filrname="claimFiles">Save</button>
                                    </div>
                                </div>
                                {{-- Fix Date Claim Form (FDCF)/Affidavit in Support (End) --}}
                                {{-- Saff in Reply (Start) --}}
                                <div class="col-md-4">
                                    <div class="originating_process_card">
                                        <span class="sub_heading">{{ $name5 }}</span>
                                        <div class="new_file_div">
                                            @if ($Processed->where('form_id','5')->count() == 0)
                                                <a href="javascript:void(0)" class="multiple">

                                                    <label class="z_filelabel">
                                                        <input style="display: none" class="form-control fileInput staffReply " data-case_originates="{{ $Originate->id}}" data-filrname="staffReply" data-index="0" id="input" type="file" name="staffReply[0][file]" accept="application/pdf">
                                                        <img src="{{ asset('website/assets/images/formtickbox.png') }}">
                                                        <span>
                                                                No file selected.
                                                            </span>
                                                    </label>
                                                </a>

                                                <p class="">
                                                    <span>Notes</span>
                                                    <input type="hidden" name="staffReply[0][case_originates]" value="{{ $Originate->id}}">
                                                    <textarea name="staffReply[0][note]" id="" class="form-control description_para" cols="40" rows="8"></textarea>
                                                    <input type="date" name="staffReply[0][date]" class="form-control " class="form-control " value="">
                                                </p>
                                                <div class="btns_box">
                                                    <button type="button"  class="add_new_div btn_yellow" data-case_originates="{{ $Originate->id}}" data-filrname="staffReply" data-index="0" >Add More Files</button>
                                                </div>
                                            @else
                                                <?php $count = 0;?>
                                                @foreach ($Processed->where('form_id','5') as $keyz=>$element)
                                                    <a href="" class="multiple">
                                                        <label class="z_filelabel">
                                                            <input type="hidden" name="staffReply[{{ $count }}][id]" value="{{ $element->id }}">
                                                            <input style="display: none" class="form-control fileInput staffReply " data-case_originates="{{ $element->originate_id }}" data-filrname="staffReply" data-index="{{ $count }}" id="input" type="file" name="staffReply[{{ $count }}][file]" accept="application/pdf">
                                                            <img src="{{ asset('website/assets/images/formcheckbox.svg') }}">

                                                        </label>

                                                    </a>
                                                    @if ($count == 0)
                                                        <button type="button"  class="add_new_div btn_yellow" data-case_originates="{{ $element->originate_id }}" data-filrname="staffReply" data-index="{{ $Processed->where('form_id','5')->count()-1 }}" >Add More Files</button>
                                                    @endif

                                                    <p class="">
                                                        <span>Notes</span>
                                                        <input type="hidden" name="staffReply[{{ $count }}][case_originates]" value="{{ $element->originate_id }}">
                                                        <textarea name="staffReply[{{ $count }}][note]" id="" class="form-control description_para" cols="40" rows="8">{{ $element->description }}</textarea>
                                                        <input type="date" name="staffReply[0][date]" class="form-control " class="form-control " value="{{ $element->date }}">
                                                    </p>
                                                    <a class="btn btn_yellow pull-right" href="{{ route('originating_processed_destory' , [$element->id??'']) }}"
                                                       title="Delete {{ preg_replace('/(?<=[a-z])[A-Z]|[A-Z](?=[a-z])/', ' $0', 'OriginatingProcessed') }}" onclick="return confirm(&quot;Confirm delete?&quot;)">
                                                        Delete
                                                    </a>
                                                    <?php $count++ ?>
                                                @endforeach
                                            @endif
                                        </div>
                                        <button type="button" data-form="5" class="btn btn_black submitButton" data-title="{{ $name5 }}" data-case_originates="{{ $Originate->id}}" data-filrname="staffReply">Save</button>
                                    </div>
                                </div>
                                {{-- Saff in Reply (End) --}}
                                {{-- Claimant’s Saff in response (Start) --}}
                                <div class="col-md-4">
                                    <div class="originating_process_card">
                                        <span class="sub_heading">{{ $name6 }}</span>
                                        <div class="new_file_div">
                                            @if ($Processed->where('form_id','6')->count() == 0)
                                                <a href="javascript:void(0)" class="multiple">

                                                    <label class="z_filelabel">
                                                        <input style="display: none" class="form-control fileInput staffResponse" data-case_originates="{{ $Originate->id}}" data-filrname="staffResponse" data-index="0" id="input" type="file" name="staffResponse[0][file]" accept="application/pdf">
                                                        <img src="{{ asset('website/assets/images/formtickbox.png') }}">
                                                        <span>
                                                                No file selected.
                                                            </span>
                                                    </label>
                                                </a>

                                                <p class="">
                                                    <span>Notes</span>
                                                    <input type="hidden" name="staffResponse[0][case_originates]" value="{{ $Originate->id}}">
                                                    <textarea name="staffResponse[0][note]" id="" class="form-control description_para" cols="40" rows="8"></textarea>
                                                    <input type="date" name="staffResponse[0][date]" class="form-control " class="form-control " value="">
                                                </p>
                                                <div class="btns_box">
                                                <button type="button"  class="add_new_div btn_yellow" data-case_originates="{{ $Originate->id}}" data-filrname="staffResponse" data-index="0" >Add More Files</button> </div>
                                            @else
                                                <?php $count = 0;?>
                                                @foreach ($Processed->where('form_id','6') as $keyz=>$element)
                                                    <a href="" class="multiple">
                                                        <label class="z_filelabel">
                                                            <input type="hidden" name="staffResponse[{{ $count }}][id]" value="{{ $element->id }}">
                                                            <input style="display: none" class="form-control fileInput staffResponse" data-case_originates="{{ $element->originate_id }}" data-filrname="staffResponse" data-index="{{ $count }}" id="input" type="file" name="staffResponse[{{ $count }}][file]" accept="application/pdf">
                                                            <img src="{{ asset('website/assets/images/formcheckbox.svg') }}">

                                                        </label>

                                                    </a>
                                                    @if ($count == 0)
                                                        <button type="button"  class="add_new_div btn_yellow" data-case_originates="{{ $element->originate_id }}" data-filrname="staffResponse" data-index="{{ $Processed->where('form_id','6')->count()-1 }}" >Add More Files</button>
                                                    @endif

                                                    <p class="">
                                                        <span>Notes</span>
                                                        <input type="hidden" name="staffResponse[{{ $count }}][case_originates]" value="{{ $element->originate_id }}">
                                                        <textarea name="staffResponse[{{ $count }}][note]" id="" class="form-control description_para" cols="40" rows="8">{{ $element->description }}</textarea>
                                                        <input type="date" name="staffResponse[0][date]" class="form-control " class="form-control " value="{{ $element->date }}">
                                                    </p>
                                                    <a class="btn btn_yellow pull-right" href="{{ route('originating_processed_destory' , [$element->id??'']) }}"
                                                       title="Delete {{ preg_replace('/(?<=[a-z])[A-Z]|[A-Z](?=[a-z])/', ' $0', 'OriginatingProcessed') }}" onclick="return confirm(&quot;Confirm delete?&quot;)">
                                                        Delete
                                                    </a>
                                                    <?php $count++ ?>
                                                @endforeach
                                            @endif
                                        </div>
                                        <button type="button" data-form="6" class="btn btn_black submitButton" data-title="{{ $name6 }}" data-case_originates="{{ $Originate->id}}" data-filrname="staffResponse">Save</button>
                                    </div>
                                </div>
                                {{-- Claimant’s Saff in response (End) --}}
                                {{-- Evidential objections (Start) --}}
                                <div class="col-md-4">
                                    <div class="originating_process_card">
                                        <span class="sub_heading">{{ $name7 }}</span>
                                        <div class="new_file_div">
                                            @if ($Processed->where('form_id','7')->count() == 0)
                                                <a href="javascript:void(0)" class="multiple">

                                                    <label class="z_filelabel">
                                                        <input style="display: none" class="form-control fileInput objectionFiles" data-case_originates="{{ $Originate->id}}" data-filrname="objectionFiles" data-index="0" id="input" type="file" name="objectionFiles[0][file]" accept="application/pdf">
                                                        <img src="{{ asset('website/assets/images/formtickbox.png') }}">
                                                        <span>
                                                                No file selected.
                                                            </span>
                                                    </label>
                                                </a>

                                                <p class="">
                                                    <span>Notes</span>
                                                    <input type="hidden" name="objectionFiles[0][case_originates]" value="{{ $Originate->id}}">
                                                    <textarea name="objectionFiles[0][note]" id="" class="form-control description_para" cols="40" rows="8"></textarea>
                                                    <input type="date" name="objectionFiles[0][date]" class="form-control " class="form-control " value="">
                                                </p>
                                                <div class="btns_box">
                                                    <button type="button"  class="add_new_div btn_yellow" data-case_originates="{{ $Originate->id}}" data-filrname="objectionFiles" data-index="0" >Add More Files</button>
                                                </div>
                                            @else
                                                <?php $count = 0;?>
                                                @foreach ($Processed->where('form_id','7') as $keyz=>$element)
                                                    <a href="" class="multiple">
                                                        <label class="z_filelabel">
                                                            <input type="hidden" name="objectionFiles[{{ $count }}][id]" value="{{ $element->id }}">
                                                            <input style="display: none" class="form-control fileInput objectionFiles" data-case_originates="{{ $element->originate_id }}" data-filrname="objectionFiles" data-index="{{ $count }}" id="input" type="file" name="objectionFiles[{{ $count }}][file]" accept="application/pdf">
                                                            <img src="{{ asset('website/assets/images/formcheckbox.svg') }}">

                                                        </label>

                                                    </a>
                                                    @if ($count == 0)
                                                        <button type="button"  class="add_new_div btn_yellow" data-case_originates="{{ $element->originate_id }}" data-filrname="objectionFiles" data-index="{{ $Processed->where('form_id','7')->count()-1 }}" >Add More Files</button>
                                                    @endif

                                                    <p class="">
                                                        <span>Notes</span>
                                                        <input type="hidden" name="objectionFiles[{{ $count }}][case_originates]" value="{{ $element->originate_id }}">
                                                        <textarea name="objectionFiles[{{ $count }}][note]" id="" class="form-control description_para" cols="40" rows="8">{{ $element->description }}</textarea>
                                                        <input type="date" name="objectionFiles[0][date]" class="form-control " class="form-control " value="{{ $element->date }}">
                                                    </p>
                                                    <a class="btn btn_yellow pull-right" href="{{ route('originating_processed_destory' , [$element->id??'']) }}"
                                                       title="Delete {{ preg_replace('/(?<=[a-z])[A-Z]|[A-Z](?=[a-z])/', ' $0', 'OriginatingProcessed') }}" onclick="return confirm(&quot;Confirm delete?&quot;)">
                                                        Delete
                                                    </a>
                                                    <?php $count++ ?>
                                                @endforeach
                                            @endif
                                        </div>
                                        <button type="button" data-form="7" class="btn btn_black submitButton" data-title="{{ $name7 }}" data-case_originates="{{ $Originate->id}}" data-filrname="objectionFiles">Save</button>
                                    </div>
                                </div>
                                {{-- Evidential objections (End) --}}
                                {{-- Cross examination application (Start) --}}
                                <div class="col-md-4">
                                    <div class="originating_process_card">
                                        <span class="sub_heading">{{ $name8 }}</span>
                                        <div class="new_file_div">
                                            @if ($Processed->where('form_id','8')->count() == 0)
                                                <a href="javascript:void(0)" class="multiple">

                                                    <label class="z_filelabel">
                                                        <input style="display: none" class="form-control fileInput examinationFiles" data-case_originates="{{ $Originate->id}}" data-filrname="examinationFiles" data-index="0" id="input" type="file" name="examinationFiles[0][file]" accept="application/pdf">
                                                        <img src="{{ asset('website/assets/images/formtickbox.png') }}">
                                                        <span>
                                                                No file selected.
                                                            </span>
                                                    </label>
                                                </a>

                                                <p class="">
                                                    <span>Notes</span>
                                                    <input type="hidden" name="examinationFiles[0][case_originates]" value="{{ $Originate->id}}">
                                                    <textarea name="examinationFiles[0][note]" id="" class="form-control description_para" cols="40" rows="8"></textarea>
                                                    <input type="date" name="examinationFiles[0][date]" class="form-control " class="form-control " value="">
                                                </p>
                                                <div class="btns_box">   <button type="button"  class="add_new_div btn_yellow" data-case_originates="{{ $Originate->id}}" data-filrname="examinationFiles" data-index="0" >Add More Files</button> </div>
                                            @else
                                                <?php $count = 0;?>
                                                @foreach ($Processed->where('form_id','8') as $keyz=>$element)
                                                    <a href="" class="multiple">
                                                        <label class="z_filelabel">
                                                            <input type="hidden" name="examinationFiles[{{ $count }}][id]" value="{{ $element->id }}">
                                                            <input style="display: none" class="form-control fileInput examinatio nFiles" data-case_originates="{{ $element->originate_id }}" data-filrname="examinationFiles" data-index="{{ $count }}" id="input" type="file" name="examinationFiles[{{ $count }}][file]" accept="application/pdf">
                                                            <img src="{{ asset('website/assets/images/formcheckbox.svg') }}">

                                                        </label>

                                                    </a>
                                                    @if ($count == 0)
                                                        <button type="button"  class="add_new_div btn_yellow" data-case_originates="{{ $element->originate_id }}" data-filrname="examinationFiles" data-index="{{ $Processed->where('form_id','8')->count()-1 }}" >Add More Files</button>
                                                    @endif

                                                    <p class="">
                                                        <span>Notes</span>
                                                        <input type="hidden" name="examinationFiles[{{ $count }}][case_originates]" value="{{ $element->originate_id }}">
                                                        <textarea name="examinationFiles[{{ $count }}][note]" id="" class="form-control description_para" cols="40" rows="8">{{ $element->description }}</textarea>
                                                        <input type="date" name="examinationFiles[0][date]" class="form-control " class="form-control " value="{{ $element->date }}">
                                                    </p>
                                                    <a class="btn btn_yellow pull-right" href="{{ route('originating_processed_destory' , [$element->id??'']) }}"
                                                       title="Delete {{ preg_replace('/(?<=[a-z])[A-Z]|[A-Z](?=[a-z])/', ' $0', 'OriginatingProcessed') }}" onclick="return confirm(&quot;Confirm delete?&quot;)">
                                                        Delete
                                                    </a>
                                                    <?php $count++ ?>
                                                @endforeach
                                            @endif
                                        </div>
                                        <button type="button" data-form="8" class="btn btn_black submitButton" data-title="{{ $name8 }}" data-case_originates="{{ $Originate->id}}" data-filrname="examinationFiles">Save</button>
                                    </div>
                                </div>
                                {{-- Cross examination application (End) --}}
                                {{-- Application for specific disclosure (Start) --}}
                                <div class="col-md-4">
                                    <div class="originating_process_card">
                                        <span class="sub_heading">{{ $name9 }}</span>
                                        <div class="new_file_div">
                                            @if ($Processed->where('form_id','9')->count() == 0)
                                                <a href="javascript:void(0)" class="multiple">

                                                    <label class="z_filelabel">
                                                        <input style="display: none" class="form-control fileInput disclosureFiles" data-case_originates="{{ $Originate->id}}" data-filrname="disclosureFiles" data-index="0" id="input" type="file" name="disclosureFiles[0][file]" accept="application/pdf">
                                                        <img src="{{ asset('website/assets/images/formtickbox.png') }}">
                                                        <span>
                                                                No file selected.
                                                            </span>
                                                    </label>
                                                </a>

                                                <p class="">
                                                    <span>Notes</span>
                                                    <input type="hidden" name="disclosureFiles[0][case_originates]" value="{{ $Originate->id}}">
                                                    <textarea name="disclosureFiles[0][note]" id="" class="form-control description_para" cols="40" rows="8"></textarea>
                                                    <input type="date" name="disclosureFiles[0][date]" class="form-control " class="form-control " value="">
                                                </p>
                                                <div class="btns_box">   <button type="button"  class="add_new_div btn_yellow" data-case_originates="{{ $Originate->id}}" data-filrname="disclosureFiles" data-index="0" >Add More Files</button> </div>
                                            @else
                                                <?php $count = 0;?>
                                                @foreach ($Processed->where('form_id','9') as $keyz=>$element)
                                                    <a href="" class="multiple">
                                                        <label class="z_filelabel">
                                                            <input type="hidden" name="disclosureFiles[{{ $count }}][id]" value="{{ $element->id }}">
                                                            <input style="display: none" class="form-control fileInput disclosure Files" data-case_originates="{{ $element->originate_id }}" data-filrname="disclosureFiles" data-index="{{ $count }}" id="input" type="file" name="disclosureFiles[{{ $count }}][file]" accept="application/pdf">
                                                            <img src="{{ asset('website/assets/images/formcheckbox.svg') }}">

                                                        </label>

                                                    </a>
                                                    @if ($count == 0)
                                                        <button type="button"  class="add_new_div btn_yellow" data-case_originates="{{ $element->originate_id }}" data-filrname="disclosureFiles" data-index="{{ $Processed->where('form_id','9')->count()-1 }}" >Add More Files</button>
                                                    @endif

                                                    <p class="">
                                                        <span>Notes</span>
                                                        <input type="hidden" name="disclosureFiles[{{ $count }}][case_originates]" value="{{ $element->originate_id }}">
                                                        <textarea name="disclosureFiles[{{ $count }}][note]" id="" class="form-control description_para" cols="40" rows="8">{{ $element->description }}</textarea>
                                                        <input type="date" name="disclosureFiles[0][date]" class="form-control " class="form-control " value="{{ $element->date }}">
                                                    </p>
                                                    <a class="btn btn_yellow pull-right" href="{{ route('originating_processed_destory' , [$element->id??'']) }}"
                                                       title="Delete {{ preg_replace('/(?<=[a-z])[A-Z]|[A-Z](?=[a-z])/', ' $0', 'OriginatingProcessed') }}" onclick="return confirm(&quot;Confirm delete?&quot;)">
                                                        Delete
                                                    </a>
                                                    <?php $count++ ?>
                                                @endforeach
                                            @endif
                                        </div>
                                        <button type="button" data-form="9" class="btn btn_black submitButton" data-title="{{ $name9 }}" data-case_originates="{{ $Originate->id}}" data-filrname="disclosureFiles">Save</button>
                                    </div>
                                </div>
                                {{-- Application for specific disclosure (End) --}}
                                {{-- Legal Submissions (Start) --}}
                                <div class="col-md-4">
                                    <div class="originating_process_card">
                                        <span class="sub_heading">{{ $name10 }}</span>
                                        <div class="new_file_div">
                                            @if ($Processed->where('form_id','10')->count() == 0)
                                                <a href="javascript:void(0)" class="multiple">

                                                    <label class="z_filelabel">
                                                        <input style="display: none" class="form-control fileInput legalSubmissions" data-case_originates="{{ $Originate->id}}" data-filrname="legalSubmissions" data-index="0" id="input" type="file" name="legalSubmissions[0][file]" accept="application/pdf">
                                                        <img src="{{ asset('website/assets/images/formtickbox.png') }}">
                                                        <span>
                                                                No file selected.
                                                            </span>
                                                    </label>
                                                </a>
                                                <div class="btns_box">
                                                <button type="button"  class="add_new_div btn_yellow" data-case_originates="{{ $Originate->id}}" data-filrname="legalSubmissions" data-index="0" >Add More Files</button> </div>
                                                <p class="">
                                                    <span>Notes</span>
                                                    <input type="hidden" name="legalSubmissions[0][case_originates]" value="{{ $Originate->id}}">
                                                    <textarea name="legalSubmissions[0][note]" id="" class="form-control description_para" cols="40" rows="8"></textarea>
                                                    <input type="date" name="legalSubmissions[0][date]" class="form-control " class="form-control " value="">
                                                </p>
                                            @else
                                                <?php $count = 0;?>
                                                @foreach ($Processed->where('form_id','10') as $keyz=>$element)
                                                    <a href="" class="multiple">
                                                        <label class="z_filelabel">
                                                            <input type="hidden" name="legalSubmissions[{{ $count }}][id]" value="{{ $element->id }}">
                                                            <input style="display: none" class="form-control fileInput legalSubmi ssions" data-case_originates="{{ $element->originate_id }}" data-filrname="legalSubmissions" data-index="{{ $count }}" id="input" type="file" name="legalSubmissions[{{ $count }}][file]" accept="application/pdf">
                                                            <img src="{{ asset('website/assets/images/formcheckbox.svg') }}">

                                                        </label>

                                                    </a>
                                                    @if ($count == 0)
                                                        <button type="button"  class="add_new_div btn_yellow" data-case_originates="{{ $element->originate_id }}" data-filrname="legalSubmissions" data-index="{{ $Processed->where('form_id','10')->count()-1 }}" >Add More Files</button>
                                                    @endif

                                                    <p class="">
                                                        <span>Notes</span>
                                                        <input type="hidden" name="legalSubmissions[{{ $count }}][case_originates]" value="{{ $element->originate_id }}">
                                                        <textarea name="legalSubmissions[{{ $count }}][note]" id="" class="form-control description_para" cols="40" rows="8">{{ $element->description }}</textarea>
                                                        <input type="date" name="legalSubmissions[0][date]" class="form-control " class="form-control " value="{{ $element->date }}">
                                                    </p>
                                                    <a class="btn btn_yellow pull-right" href="{{ route('originating_processed_destory' , [$element->id??'']) }}"
                                                       title="Delete {{ preg_replace('/(?<=[a-z])[A-Z]|[A-Z](?=[a-z])/', ' $0', 'OriginatingProcessed') }}" onclick="return confirm(&quot;Confirm delete?&quot;)">
                                                        Delete
                                                    </a>
                                                    <?php $count++ ?>
                                                @endforeach
                                            @endif
                                        </div>
                                        <button type="button" data-form="10" class="btn btn_black submitButton" data-title="{{ $name10 }}" data-case_originates="{{ $Originate->id}}" data-filrname="legalSubmissions">Save</button>
                                    </div>
                                </div>
                                {{-- Legal Submissions (End) --}}
                                {{-- Judgement (Start) --}}
                                <div class="col-md-4">
                                    <div class="originating_process_card">
                                        <span class="sub_heading"> {{ $name11 }}</span>
                                        <div class="new_file_div">
                                            @if ($Processed->where('form_id','11')->count() == 0)
                                                <a href="javascript:void(0)" class="multiple">

                                                    <label class="z_filelabel">
                                                        <input style="display: none" class="form-control fileInput judgementFiles" data-case_originates="{{ $Originate->id}}" data-filrname="judgementFiles" data-index="0" id="input" type="file" name="judgementFiles[0][file]" accept="application/pdf">
                                                        <img src="{{ asset('website/assets/images/formtickbox.png') }}">
                                                        <span>
                                                                No file selected.
                                                            </span>
                                                    </label>
                                                </a>

                                                <p class="">
                                                    <span>Notes</span>
                                                    <input type="hidden" name="judgementFiles[0][case_originates]" value="{{ $Originate->id}}">
                                                    <textarea name="judgementFiles[0][note]" id="" class="form-control description_para" cols="40" rows="8"></textarea>
                                                    <input type="date" name="judgementFiles[0][date]" class="form-control " class="form-control " value="">
                                                </p>
                                                <div class="btns_box">  <button type="button"  class="add_new_div btn_yellow" data-case_originates="{{ $Originate->id}}" data-filrname="judgementFiles" data-index="0" >Add More Files</button></div>
                                            @else
                                                <?php $count = 0;?>
                                                @foreach ($Processed->where('form_id','11') as $keyz=>$element)
                                                    <a href="" class="multiple">
                                                        <label class="z_filelabel">
                                                            <input type="hidden" name="judgementFiles[{{ $count }}][id]" value="{{ $element->id }}">
                                                            <input style="display: none" class="form-control fileInput judgementFiles" data-case_originates="{{ $element->originate_id }}" data-filrname="judgementFiles" data-index="{{ $count }}" id="input" type="file" name="judgementFiles[{{ $count }}][file]" accept="application/pdf">
                                                            <img src="{{ asset('website/assets/images/formcheckbox.svg') }}">

                                                        </label>

                                                    </a>
                                                    @if ($count == 0)
                                                        <button type="button"  class="add_new_div btn_yellow" data-case_originates="{{ $element->originate_id }}" data-filrname="judgementFiles" data-index="{{ $Processed->where('form_id','11')->count()-1 }}" >Add More Files</button>
                                                    @endif

                                                    <p class="">
                                                        <span>Notes</span>
                                                        <input type="hidden" name="judgementFiles[{{ $count }}][case_originates]" value="{{ $element->originate_id }}">
                                                        <textarea name="judgementFiles[{{ $count }}][note]" id="" class="form-control description_para" cols="40" rows="8">{{ $element->description }}</textarea>
                                                        <input type="date" name="judgementFiles[0][date]" class="form-control " class="form-control " value="{{ $element->date }}">
                                                    </p>
                                                    <a class="btn btn_yellow pull-right" href="{{ route('originating_processed_destory' , [$element->id??'']) }}"
                                                       title="Delete {{ preg_replace('/(?<=[a-z])[A-Z]|[A-Z](?=[a-z])/', ' $0', 'OriginatingProcessed') }}" onclick="return confirm(&quot;Confirm delete?&quot;)">
                                                        Delete
                                                    </a>
                                                    <?php $count++ ?>
                                                @endforeach
                                            @endif
                                        </div>
                                        <button type="button" data-form="11" class="btn btn_black submitButton" data-title="{{ $name11 }}" data-case_originates="{{ $Originate->id}}" data-filrname="judgementFiles">Save</button>
                                    </div>
                                </div>
                                {{-- Judgement (End) --}}
                                {{-- Notice of Appeal (Start) --}}
                                <div class="col-md-4">
                                    <div class="originating_process_card">
                                        <span class="sub_heading">{{ $name12 }}</span>
                                        <div class="new_file_div">
                                            @if ($Processed->where('form_id','12')->count() == 0)
                                                <a href="javascript:void(0)" class="multiple">

                                                    <label class="z_filelabel">
                                                        <input style="display: none" class="form-control fileInput noticeAppeal" data-case_originates="{{ $Originate->id}}" data-filrname="noticeAppeal" data-index="0" id="input" type="file" name="noticeAppeal[0][file]" accept="application/pdf">
                                                        <img src="{{ asset('website/assets/images/formtickbox.png') }}">
                                                        <span>
                                                                No file selected.
                                                            </span>
                                                    </label>
                                                </a>

                                                <p class="">
                                                    <span>Notes</span>
                                                    <input type="hidden" name="noticeAppeal[0][case_originates]" value="{{ $Originate->id}}">
                                                    <textarea name="noticeAppeal[0][note]" id="" class="form-control description_para" cols="40" rows="8"></textarea>
                                                    <input type="date" name="noticeAppeal[0][date]" class="form-control " class="form-control " value="">
                                                </p>
                                                <div class="btns_box">  <button type="button"  class="add_new_div btn_yellow" data-case_originates="{{ $Originate->id}}" data-filrname="noticeAppeal" data-index="0" >Add More Files</button></div>
                                            @else
                                                <?php $count = 0;?>
                                                @foreach ($Processed->where('form_id','12') as $keyz=>$element)
                                                    <a href="" class="multiple">
                                                        <label class="z_filelabel">
                                                            <input type="hidden" name="noticeAppeal[{{ $count }}][id]" value="{{ $element->id }}">
                                                            <input style="display: none" class="form-control fileInput noticeAppeal" data-case_originates="{{ $element->originate_id }}" data-filrname="noticeAppeal" data-index="{{ $count }}" id="input" type="file" name="noticeAppeal[{{ $count }}][file]" accept="application/pdf">
                                                            <img src="{{ asset('website/assets/images/formcheckbox.svg') }}">

                                                        </label>

                                                    </a>
                                                    @if ($count == 0)
                                                        <button type="button"  class="add_new_div btn_yellow" data-case_originates="{{ $element->originate_id }}" data-filrname="noticeAppeal" data-index="{{ $Processed->where('form_id','12')->count()-1 }}" >Add More Files</button>
                                                    @endif

                                                    <p class="">
                                                        <span>Notes</span>
                                                        <input type="hidden" name="noticeAppeal[{{ $count }}][case_originates]" value="{{ $element->originate_id }}">
                                                        <textarea name="noticeAppeal[{{ $count }}][note]" id="" class="form-control description_para" cols="40" rows="8">{{ $element->description }}</textarea>
                                                        <input type="date" name="noticeAppeal[0][date]" class="form-control " value="{{ $element->date }}">
                                                    </p>
                                                    <a class="btn btn_yellow pull-right" href="{{ route('originating_processed_destory' , [$element->id??'']) }}"
                                                       title="Delete {{ preg_replace('/(?<=[a-z])[A-Z]|[A-Z](?=[a-z])/', ' $0', 'OriginatingProcessed') }}" onclick="return confirm(&quot;Confirm delete?&quot;)">
                                                        Delete
                                                    </a>
                                                    <?php $count++ ?>
                                                @endforeach
                                            @endif
                                        </div>
                                        <button type="button" data-form="12" class="btn btn_black submitButton" data-title="{{ $name12 }}" data-case_originates="{{ $Originate->id}}" data-filrname="noticeAppeal">Save</button>
                                    </div>
                                </div>
                                {{-- Notice of Appeal (End) --}}
                                {{-- Record of Appeal (Start) --}}
                                <div class="col-md-4">
                                    <div class="originating_process_card">
                                        <span class="sub_heading">{{ $name13 }}</span>
                                        <div class="new_file_div">
                                            @if ($Processed->where('form_id','13')->count() == 0)
                                                <a href="javascript:void(0)" class="multiple">

                                                    <label class="z_filelabel">
                                                        <input style="display: none" class="form-control fileInput recordAppeal" data-case_originates="{{ $Originate->id}}" data-filrname="recordAppeal" data-index="0" id="input" type="file" name="recordAppeal[0][file]" accept="application/pdf">
                                                        <img src="{{ asset('website/assets/images/formtickbox.png') }}">
                                                        <span>
                                                                No file selected.
                                                            </span>
                                                    </label>
                                                </a>


                                                <p class="">
                                                    <span>Notes</span>
                                                    <input type="hidden" name="recordAppeal[0][case_originates]" value="{{ $Originate->id}}">
                                                    <textarea name="recordAppeal[0][note]" id="" class="form-control description_para" cols="40" rows="8"></textarea>
                                                    <input type="date" name="recordAppeal[0][date]" class="form-control " value="">
                                                </p>
                                                <div class="btns_box">
                                                <button type="button"  class="add_new_div btn_yellow" data-case_originates="{{ $Originate->id}}" data-filrname="recordAppeal" data-index="0" >Add More Files</button></div>
                                            @else
                                                <?php $count = 0;?>
                                                @foreach ($Processed->where('form_id','13') as $keyz=>$element)
                                                    <a href="" class="multiple">
                                                        <label class="z_filelabel">
                                                            <input type="hidden" name="recordAppeal[{{ $count }}][id]" value="{{ $element->id }}">
                                                            <input style="display: none" class="form-control fileInput recordAppeal" data-case_originates="{{ $element->originate_id }}" data-filrname="recordAppeal" data-index="{{ $count }}" id="input" type="file" name="recordAppeal[{{ $count }}][file]" accept="application/pdf">
                                                            <img src="{{ asset('website/assets/images/formcheckbox.svg') }}">

                                                        </label>

                                                    </a>
                                                    @if ($count == 0)
                                                        <button type="button"  class="add_new_div btn_yellow" data-case_originates="{{ $element->originate_id }}" data-filrname="recordAppeal" data-index="{{ $Processed->where('form_id','13')->count()-1 }}" >Add More Files</button>
                                                    @endif

                                                    <p class="">
                                                        <span>Notes</span>
                                                        <input type="hidden" name="recordAppeal[{{ $count }}][case_originates]" value="{{ $element->originate_id }}">
                                                        <textarea name="recordAppeal[{{ $count }}][note]" id="" class="form-control description_para" cols="40" rows="8">{{ $element->description }}</textarea>
                                                        <input type="date" name="recordAppeal[0][date]" class="form-control " value="{{ $element->date }}">
                                                    </p>
                                                    <a class="btn btn_yellow pull-right" href="{{ route('originating_processed_destory' , [$element->id??'']) }}"
                                                       title="Delete {{ preg_replace('/(?<=[a-z])[A-Z]|[A-Z](?=[a-z])/', ' $0', 'OriginatingProcessed') }}" onclick="return confirm(&quot;Confirm delete?&quot;)">
                                                        Delete
                                                    </a>
                                                    <?php $count++ ?>
                                                @endforeach
                                            @endif
                                        </div>
                                        <button type="button" data-form="13" class="btn btn_black submitButton" data-title="{{ $name13 }}" data-case_originates="{{ $Originate->id}}" data-filrname="recordAppeal">Save</button>
                                    </div>
                                </div>
                                {{-- Record of Appeal (End) --}}
                                {{-- Submissions (Start) --}}
                                <div class="col-md-4">
                                    <div class="originating_process_card">
                                        <span class="sub_heading">{{ $name14 }}</span>
                                        <div class="new_file_div">
                                            @if ($Processed->where('form_id','14')->count() == 0)
                                                <a href="javascript:void(0)" class="multiple">

                                                    <label class="z_filelabel">
                                                        <input style="display: none" class="form-control fileInput SubmissionFiles" data-case_originates="{{ $Originate->id}}" data-filrname="SubmissionFiles" data-index="0" id="input" type="file" name="SubmissionFiles[0][file]" accept="application/pdf">
                                                        <img src="{{ asset('website/assets/images/formtickbox.png') }}">
                                                        <span>
                                                                No file selected.
                                                            </span>
                                                    </label>
                                                </a>

                                                <p class="">
                                                    <span>Notes</span>
                                                    <input type="hidden" name="SubmissionFiles[0][case_originates]" value="{{ $Originate->id}}">
                                                    <textarea name="SubmissionFiles[0][note]" id="" class="form-control description_para" cols="40" rows="8"></textarea>
                                                    <input type="date" name="SubmissionFiles[0][date]" class="form-control " value="">
                                                </p>
                                                <div class="btns_box">      <button type="button"  class="add_new_div btn_yellow" data-case_originates="{{ $Originate->id}}" data-filrname="SubmissionFiles" data-index="0" >Add More Files</button></div>
                                            @else
                                                <?php $count = 0;?>
                                                @foreach ($Processed->where('form_id','14') as $keyz=>$element)
                                                    <a href="" class="multiple">
                                                        <label class="z_filelabel">
                                                            <input type="hidden" name="SubmissionFiles[{{ $count }}][id]" value="{{ $element->id }}">
                                                            <input style="display: none" class="form-control fileInput Submission Files" data-case_originates="{{ $element->originate_id }}" data-filrname="SubmissionFiles" data-index="{{ $count }}" id="input" type="file" name="SubmissionFiles[{{ $count }}][file]" accept="application/pdf">
                                                            <img src="{{ asset('website/assets/images/formcheckbox.svg') }}">

                                                        </label>

                                                    </a>
                                                    @if ($count == 0)
                                                        <button type="button"  class="add_new_div btn_yellow" data-case_originates="{{ $element->originate_id }}" data-filrname="SubmissionFiles" data-index="{{ $Processed->where('form_id','14')->count()-1 }}" >Add More Files</button>
                                                    @endif

                                                    <p class="">
                                                        <span>Notes</span>
                                                        <input type="hidden" name="SubmissionFiles[{{ $count }}][case_originates]" value="{{ $element->originate_id }}">
                                                        <textarea name="SubmissionFiles[{{ $count }}][note]" id="" class="form-control description_para" cols="40" rows="8">{{ $element->description }}</textarea>
                                                        <input type="date" name="SubmissionFiles[0][date]" class="form-control " value="{{ $element->date }}">
                                                    </p>
                                                    <a class="btn btn_yellow pull-right" href="{{ route('originating_processed_destory' , [$element->id??'']) }}"
                                                       title="Delete {{ preg_replace('/(?<=[a-z])[A-Z]|[A-Z](?=[a-z])/', ' $0', 'OriginatingProcessed') }}" onclick="return confirm(&quot;Confirm delete?&quot;)">
                                                        Delete
                                                    </a>
                                                    <?php $count++ ?>
                                                @endforeach
                                            @endif
                                        </div>
                                        <button type="button" data-form="14" class="btn btn_black submitButton" data-title="{{ $name14 }}" data-case_originates="{{ $Originate->id}}" data-filrname="SubmissionFiles">Save</button>
                                    </div>
                                </div>
                                {{-- Submissions (End) --}}
                                {{-- Judgment (Start) --}}
                                <div class="col-md-4">
                                    <div class="originating_process_card">
                                        <span class="sub_heading">{{ $name15 }}</span>
                                        <div class="new_file_div">
                                            @if ($Processed->where('form_id','15')->count() == 0)
                                                <a href="javascript:void(0)" class="multiple">

                                                    <label class="z_filelabel">
                                                        <input style="display: none" class="form-control fileInput JudgmentFiles" data-case_originates="{{ $Originate->id}}" data-filrname="JudgmentFiles" data-index="0" id="input" type="file" name="JudgmentFiles[0][file]" accept="application/pdf">
                                                        <img src="{{ asset('website/assets/images/formtickbox.png') }}">
                                                        <span>
                                                                No file selected.
                                                            </span>
                                                    </label>
                                                </a>

                                                <p class="">
                                                    <span>Notes</span>
                                                    <input type="hidden" name="JudgmentFiles[0][case_originates]" value="{{ $Originate->id}}">
                                                    <textarea name="JudgmentFiles[0][note]" id="" class="form-control description_para" cols="40" rows="8"></textarea>
                                                    <input type="date" name="JudgmentFiles[0][date]" class="form-control " value="">
                                                </p>
                                                <div class="btns_box">   <button type="button"  class="add_new_div btn_yellow" data-case_originates="{{ $Originate->id}}" data-filrname="JudgmentFiles" data-index="0" >Add More Files</button></div>
                                            @else
                                                <?php $count = 0;?>
                                                @foreach ($Processed->where('form_id','15') as $keyz=>$element)
                                                    <a href="" class="multiple">
                                                        <label class="z_filelabel">
                                                            <input type="hidden" name="JudgmentFiles[{{ $count }}][id]" value="{{ $element->id }}">
                                                            <input style="display: none" class="form-control fileInput JudgmentFiles" data-case_originates="{{ $element->originate_id }}" data-filrname="JudgmentFiles" data-index="{{ $count }}" id="input" type="file" name="JudgmentFiles[{{ $count }}][file]" accept="application/pdf">
                                                            <img src="{{ asset('website/assets/images/formcheckbox.svg') }}">

                                                        </label>

                                                    </a>
                                                    @if ($count == 0)
                                                        <button type="button"  class="add_new_div btn_yellow" data-case_originates="{{ $element->originate_id }}" data-filrname="JudgmentFiles" data-index="{{ $Processed->where('form_id','15')->count()-1 }}" >Add More Files</button>
                                                    @endif

                                                    <p class="">
                                                        <span>Notes</span>
                                                        <input type="hidden" name="JudgmentFiles[{{ $count }}][case_originates]" value="{{ $element->originate_id }}">
                                                        <textarea name="JudgmentFiles[{{ $count }}][note]" id="" class="form-control description_para" cols="40" rows="8">{{ $element->description }}</textarea>
                                                        <input type="date" name="JudgmentFiles[0][date]" class="form-control " value="{{ $element->date }}">
                                                    </p>
                                                    <a class="btn btn_yellow pull-right" href="{{ route('originating_processed_destory' , [$element->id??'']) }}"
                                                       title="Delete {{ preg_replace('/(?<=[a-z])[A-Z]|[A-Z](?=[a-z])/', ' $0', 'OriginatingProcessed') }}" onclick="return confirm(&quot;Confirm delete?&quot;)">
                                                        Delete
                                                    </a>
                                                    <?php $count++ ?>
                                                @endforeach
                                            @endif
                                        </div>
                                        <button type="button" data-form="15" class="btn btn_black submitButton" data-title="{{ $name15 }}" data-case_originates="{{ $Originate->id}}" data-filrname="JudgmentFiles">Save</button>
                                    </div>
                                </div>
                                {{-- Judgment (End) --}}
                                {{-- Order of COA (Start) --}}
                                <div class="col-md-4">
                                    <div class="originating_process_card">
                                        <span class="sub_heading">{{ $name16 }}</span>
                                        <div class="new_file_div">
                                            @if ($Processed->where('form_id','16')->count() == 0)
                                                <a href="javascript:void(0)" class="multiple">

                                                    <label class="z_filelabel">
                                                        <input style="display: none" class="form-control fileInput orderCOA"  data-case_originates="{{ $Originate->id}}" data-filrname="orderCOA" data-index="0" id="input" type="file" name="orderCOA[0][file]" accept="application/pdf">
                                                        <img src="{{ asset('website/assets/images/formtickbox.png') }}">
                                                        <span>
                                                                No file selected.
                                                            </span>
                                                    </label>
                                                </a>

                                                <p class="">
                                                    <span>Notes</span>
                                                    <input type="hidden" name="orderCOA[0][case_originates]" value="{{ $Originate->id}}">
                                                    <textarea name="orderCOA[0][note]" id="" class="form-control description_para" cols="40" rows="8"></textarea>
                                                    <input type="date" name="orderCOA[0][date]" class="form-control " value="">
                                                </p>
                                                <div class="btns_box">  <button type="button"  class="add_new_div btn_yellow" data-case_originates="{{ $Originate->id}}" data-filrname="orderCOA" data-index="0" >Add More Files</button></div>
                                            @else
                                                <?php $count = 0;?>
                                                @foreach ($Processed->where('form_id','16') as $keyz=>$element)
                                                    <a href="" class="multiple">
                                                        <label class="z_filelabel">
                                                            <input type="hidden" name="orderCOA[{{ $count }}][id]" value="{{ $element->id }}">
                                                            <input style="display: none" class="form-control fileInput orderCOA"  data-case_originates="{{ $element->originate_id }}" data-filrname="orderCOA" data-index="{{ $count }}" id="input" type="file" name="orderCOA[{{ $count }}][file]" accept="application/pdf">
                                                            <img src="{{ asset('website/assets/images/formcheckbox.svg') }}">

                                                        </label>

                                                    </a>
                                                    @if ($count == 0)
                                                        <button type="button"  class="add_new_div btn_yellow" data-case_originates="{{ $element->originate_id }}" data-filrname="orderCOA" data-index="{{ $Processed->where('form_id','16')->count()-1 }}" >Add More Files</button>
                                                    @endif

                                                    <p class="">
                                                        <span>Notes</span>
                                                        <input type="hidden" name="orderCOA[{{ $count }}][case_originates]" value="{{ $element->originate_id }}">
                                                        <textarea name="orderCOA[{{ $count }}][note]" id="" class="form-control description_para" cols="40" rows="8">{{ $element->description }}</textarea>
                                                        <input type="date" name="orderCOA[0][date]" class="form-control " value="{{ $element->date }}">
                                                    </p>
                                                    <a class="btn btn_yellow pull-right" href="{{ route('originating_processed_destory' , [$element->id??'']) }}"
                                                       title="Delete {{ preg_replace('/(?<=[a-z])[A-Z]|[A-Z](?=[a-z])/', ' $0', 'OriginatingProcessed') }}" onclick="return confirm(&quot;Confirm delete?&quot;)">
                                                        Delete
                                                    </a>
                                                    <?php $count++ ?>
                                                @endforeach
                                            @endif
                                        </div>
                                        <button type="button" data-form="16" class="btn btn_black submitButton" data-title="{{ $name16 }}" data-case_originates="{{ $Originate->id}}" data-filrname="orderCOA">Save</button>
                                    </div>
                                </div>
                                {{-- Order of COA (End) --}}
                                {{-- Application for conditional leave to PC (Start) --}}
                                <div class="col-md-4">
                                    <div class="originating_process_card">
                                        <span class="sub_heading">{{ $name17 }}</span>
                                        <div class="new_file_div">
                                            @if ($Processed->where('form_id','17')->count() == 0)
                                                <a href="javascript:void(0)" class="multiple">

                                                    <label class="z_filelabel">
                                                        <input style="display: none" class="form-control fileInput conditionalLeaves" data-case_originates="{{ $Originate->id}}" data-filrname="conditionalLeaves" data-index="0" id="input" type="file" name="conditionalLeaves[0][file]" accept="application/pdf">
                                                        <img src="{{ asset('website/assets/images/formtickbox.png') }}">
                                                        <span>
                                                                No file selected.
                                                            </span>
                                                    </label>
                                                </a>

                                                <p class="">
                                                    <span>Notes</span>
                                                    <input type="hidden" name="conditionalLeaves[0][case_originates]" value="{{ $Originate->id}}">
                                                    <textarea name="conditionalLeaves[0][note]" id="" class="form-control description_para" cols="40" rows="8"></textarea>
                                                    <input type="date" name="conditionalLeaves[0][date]" class="form-control " value="">
                                                </p>
                                                <div class="btns_box">     <button type="button"  class="add_new_div btn_yellow" data-case_originates="{{ $Originate->id}}" data-filrname="conditionalLeaves" data-index="0" >Add More Files</button></div>
                                            @else
                                                <?php $count = 0;?>
                                                @foreach ($Processed->where('form_id','17') as $keyz=>$element)
                                                    <a href="" class="multiple">
                                                        <label class="z_filelabel">
                                                            <input type="hidden" name="conditionalLeaves[{{ $count }}][id]" value="{{ $element->id }}">
                                                            <input style="display: none" class="form-control fileInput conditionalLeaves" data-case_originates="{{ $element->originate_id }}" data-filrname="conditionalLeaves" data-index="{{ $count }}" id="input" type="file" name="conditionalLeaves[{{ $count }}][file]" accept="application/pdf">
                                                            <img src="{{ asset('website/assets/images/formcheckbox.svg') }}">

                                                        </label>

                                                    </a>
                                                    @if ($count == 0)
                                                        <button type="button"  class="add_new_div btn_yellow" data-case_originates="{{ $element->originate_id }}" data-filrname="conditionalLeaves" data-index="{{ $Processed->where('form_id','17')->count()-1 }}" >Add More Files</button>
                                                    @endif

                                                    <p class="">
                                                        <span>Notes</span>
                                                        <input type="hidden" name="conditionalLeaves[{{ $count }}][case_originates]" value="{{ $element->originate_id }}">
                                                        <textarea name="conditionalLeaves[{{ $count }}][note]" id="" class="form-control description_para" cols="40" rows="8">{{ $element->description }}</textarea>
                                                        <input type="date" name="conditionalLeaves[0][date]" class="form-control " value="{{ $element->date }}">
                                                    </p>
                                                    <a class="btn btn_yellow pull-right" href="{{ route('originating_processed_destory' , [$element->id??'']) }}"
                                                       title="Delete {{ preg_replace('/(?<=[a-z])[A-Z]|[A-Z](?=[a-z])/', ' $0', 'OriginatingProcessed') }}" onclick="return confirm(&quot;Confirm delete?&quot;)">
                                                        Delete
                                                    </a>
                                                    <?php $count++ ?>
                                                @endforeach
                                            @endif
                                        </div>
                                        <button type="button" data-form="17" class="btn btn_black submitButton" data-title="{{ $name17 }}" data-case_originates="{{ $Originate->id}}" data-filrname="conditionalLeaves">Save</button>
                                    </div>
                                </div>
                                {{-- Application for conditional leave to PC (End) --}}
                                {{-- Notice of Appeal in PC (Start) --}}
                                <div class="col-md-4">
                                    <div class="originating_process_card">
                                        <span class="sub_heading">{{ $name18 }}</span>
                                        <div class="new_file_div">
                                            @if ($Processed->where('form_id','18')->count() == 0)
                                                <a href="javascript:void(0)" class="multiple">

                                                    <label class="z_filelabel">
                                                        <input style="display: none" class="form-control fileInput noticeAppealFiles" data-case_originates="{{ $Originate->id}}" data-filrname="noticeAppealFiles" data-index="0" id="input" type="file" name="noticeAppealFiles[0][file]" accept="application/pdf">
                                                        <img src="{{ asset('website/assets/images/formtickbox.png') }}">
                                                        <span>
                                                                No file selected.
                                                            </span>
                                                    </label>
                                                </a>

                                                <p class="">
                                                    <span>Notes</span>
                                                    <input type="hidden" name="noticeAppealFiles[0][case_originates]" value="{{ $Originate->id}}">
                                                    <textarea name="noticeAppealFiles[0][note]" id="" class="form-control description_para" cols="40" rows="8"></textarea>
                                                    <input type="date" name="noticeAppealFiles[0][date]" class="form-control " value="">
                                                </p>

                                                <div class="btns_box"> <button type="button"  class="add_new_div btn_yellow" data-case_originates="{{ $Originate->id}}" data-filrname="noticeAppealFiles" data-index="0" >Add More Files</button></div>
                                            @else
                                                <?php $count = 0;?>
                                                @foreach ($Processed->where('form_id','18') as $keyz=>$element)
                                                    <a href="" class="multiple">
                                                        <label class="z_filelabel">
                                                            <input type="hidden" name="noticeAppealFiles[{{ $count }}][id]" value="{{ $element->id }}">
                                                            <input style="display: none" class="form-control fileInput noticeAppealFiles" data-case_originates="{{ $element->originate_id }}" data-filrname="noticeAppealFiles" data-index="{{ $count }}" id="input" type="file" name="noticeAppealFiles[{{ $count }}][file]" accept="application/pdf">
                                                            <img src="{{ asset('website/assets/images/formcheckbox.svg') }}">

                                                        </label>

                                                    </a>
                                                    @if ($count == 0)
                                                        <button type="button"  class="add_new_div btn_yellow" data-case_originates="{{ $element->originate_id }}" data-filrname="noticeAppealFiles" data-index="{{ $Processed->where('form_id','18')->count()-1 }}" >Add More Files</button>
                                                    @endif

                                                    <p class="">
                                                        <span>Notes</span>
                                                        <input type="hidden" name="noticeAppealFiles[{{ $count }}][case_originates]" value="{{ $element->originate_id }}">
                                                        <textarea name="noticeAppealFiles[{{ $count }}][note]" id="" class="form-control description_para" cols="40" rows="8">{{ $element->description }}</textarea>
                                                        <input type="date" name="noticeAppealFiles[0][date]" class="form-control " value="{{ $element->date }}">
                                                    </p>
                                                    <a class="btn btn_yellow pull-right" href="{{ route('originating_processed_destory' , [$element->id??'']) }}"
                                                       title="Delete {{ preg_replace('/(?<=[a-z])[A-Z]|[A-Z](?=[a-z])/', ' $0', 'OriginatingProcessed') }}" onclick="return confirm(&quot;Confirm delete?&quot;)">
                                                        Delete
                                                    </a>
                                                    <?php $count++ ?>
                                                @endforeach
                                            @endif
                                        </div>
                                        <button type="button" data-form="18" class="btn btn_black submitButton" data-title="{{ $name18 }}" data-case_originates="{{ $Originate->id}}" data-filrname="noticeAppealFiles">Save</button>
                                    </div>
                                </div>
                                {{-- Notice of Appeal in PC (End) --}}
                                {{-- Certified Record to PC (Start) --}}
                                <div class="col-md-4">
                                    <div class="originating_process_card">
                                        <span class="sub_heading">{{ $name19 }}</span>
                                        <div class="new_file_div">
                                            @if ($Processed->where('form_id','19')->count() == 0)
                                                <a href="javascript:void(0)" class="multiple">

                                                    <label class="z_filelabel">
                                                        <input style="display: none" class="form-control fileInput CertifiedFiles" data-case_originates="{{ $Originate->id}}" data-filrname="CertifiedFiles" data-index="0" id="input" type="file" name="CertifiedFiles[0][file]" accept="application/pdf">
                                                        <img src="{{ asset('website/assets/images/formtickbox.png') }}">
                                                        <span>
                                                                No file selected.
                                                            </span>
                                                    </label>
                                                </a>

                                                <p class="">
                                                    <span>Notes</span>
                                                    <input type="hidden" name="CertifiedFiles[0][case_originates]" value="{{ $Originate->id}}">
                                                    <textarea name="CertifiedFiles[0][note]" id="" class="form-control description_para" cols="40" rows="8"></textarea>
                                                    <input type="date" name="CertifiedFiles[0][date]" class="form-control " value="">
                                                </p>
                                                <div class="btns_box"><button type="button"  class="add_new_div btn_yellow" data-case_originates="{{ $Originate->id}}" data-filrname="CertifiedFiles" data-index="0" >Add More Files</button></div>
                                            @else
                                                <?php $count = 0;?>
                                                @foreach ($Processed->where('form_id','19') as $keyz=>$element)
                                                    <a href="" class="multiple">
                                                        <label class="z_filelabel">
                                                            <input type="hidden" name="CertifiedFiles[{{ $count }}][id]" value="{{ $element->id }}">
                                                            <input style="display: none" class="form-control fileInput CertifiedFiles" data-case_originates="{{ $element->originate_id }}" data-filrname="CertifiedFiles" data-index="{{ $count }}" id="input" type="file" name="CertifiedFiles[{{ $count }}][file]" accept="application/pdf">
                                                            <img src="{{ asset('website/assets/images/formcheckbox.svg') }}">

                                                        </label>

                                                    </a>
                                                    @if ($count == 0)
                                                        <button type="button"  class="add_new_div btn_yellow" data-case_originates="{{ $element->originate_id }}" data-filrname="CertifiedFiles" data-index="{{ $Processed->where('form_id','19')->count()-1 }}" >Add More Files</button>
                                                    @endif

                                                    <p class="">
                                                        <span>Notes</span>
                                                        <input type="hidden" name="CertifiedFiles[{{ $count }}][case_originates]" value="{{ $element->originate_id }}">
                                                        <textarea name="CertifiedFiles[{{ $count }}][note]" id="" class="form-control description_para" cols="40" rows="8">{{ $element->description }}</textarea>
                                                        <input type="date" name="CertifiedFiles[0][date]" class="form-control " value="{{ $element->date }}">
                                                    </p>
                                                    <a class="btn btn_yellow pull-right" href="{{ route('originating_processed_destory' , [$element->id??'']) }}"
                                                       title="Delete {{ preg_replace('/(?<=[a-z])[A-Z]|[A-Z](?=[a-z])/', ' $0', 'OriginatingProcessed') }}" onclick="return confirm(&quot;Confirm delete?&quot;)">
                                                        Delete
                                                    </a>
                                                    <?php $count++ ?>
                                                @endforeach
                                            @endif
                                        </div>
                                        <button type="button" data-form="19" class="btn btn_black submitButton" data-title="{{ $name19 }}" data-case_originates="{{ $Originate->id}}" data-filrname="CertifiedFiles">Save</button>
                                    </div>
                                </div>
                                {{-- Certified Record to PC (End) --}}
                                {{-- Reproduced Record to PC (Start) --}}
                                <div class="col-md-4">
                                    <div class="originating_process_card">
                                        <span class="sub_heading">{{ $name20 }}</span>
                                        <div class="new_file_div">
                                            @if ($Processed->where('form_id','20')->count() == 0)
                                                <a href="javascript:void(0)" class="multiple">

                                                    <label class="z_filelabel">
                                                        <input style="display: none" class="form-control fileInput ReproducedFiles" data-case_originates="{{ $Originate->id}}" data-filrname="ReproducedFiles" data-index="0" id="input" type="file" name="ReproducedFiles[0][file]" accept="application/pdf">
                                                        <img src="{{ asset('website/assets/images/formtickbox.png') }}">
                                                        <span>
                                                                No file selected.
                                                            </span>
                                                    </label>
                                                </a>

                                                <p class="">
                                                    <span>Notes</span>
                                                    <input type="hidden" name="ReproducedFiles[0][case_originates]" value="{{ $Originate->id}}">
                                                    <textarea name="ReproducedFiles[0][note]" id="" class="form-control description_para" cols="40" rows="8"></textarea>
                                                    <input type="date" name="ReproducedFiles[0][date]" class="form-control " value="">
                                                </p>

                                                <div class="btns_box">   <button type="button"  class="add_new_div btn_yellow" data-case_originates="{{ $Originate->id}}" data-filrname="ReproducedFiles" data-index="0" >Add More Files</button></div>
                                            @else
                                                <?php $count = 0;?>
                                                @foreach ($Processed->where('form_id','20') as $keyz=>$element)
                                                    <a href="" class="multiple">
                                                        <label class="z_filelabel">
                                                            <input type="hidden" name="ReproducedFiles[{{ $count }}][id]" value="{{ $element->id }}">
                                                            <input style="display: none" class="form-control fileInput ReproducedFiles" data-case_originates="{{ $element->originate_id }}" data-filrname="ReproducedFiles" data-index="{{ $count }}" id="input" type="file" name="ReproducedFiles[{{ $count }}][file]" accept="application/pdf">
                                                            <img src="{{ asset('website/assets/images/formcheckbox.svg') }}">

                                                        </label>

                                                    </a>
                                                    @if ($count == 0)
                                                        <button type="button"  class="add_new_div btn_yellow" data-case_originates="{{ $element->originate_id }}" data-filrname="ReproducedFiles" data-index="{{ $Processed->where('form_id','20')->count()-1 }}" >Add More Files</button>
                                                    @endif

                                                    <p class="">
                                                        <span>Notes</span>
                                                        <input type="hidden" name="ReproducedFiles[{{ $count }}][case_originates]" value="{{ $element->originate_id }}">
                                                        <textarea name="ReproducedFiles[{{ $count }}][note]" id="" class="form-control description_para" cols="40" rows="8">{{ $element->description }}</textarea>
                                                        <input type="date" name="ReproducedFiles[0][date]" class="form-control " value="{{ $element->date }}">
                                                    </p>
                                                    <a class="btn btn_yellow pull-right" href="{{ route('originating_processed_destory' , [$element->id??'']) }}"
                                                       title="Delete {{ preg_replace('/(?<=[a-z])[A-Z]|[A-Z](?=[a-z])/', ' $0', 'OriginatingProcessed') }}" onclick="return confirm(&quot;Confirm delete?&quot;)">
                                                        Delete
                                                    </a>
                                                    <?php $count++ ?>
                                                @endforeach
                                            @endif
                                        </div>
                                        <button type="button" data-form="20" class="btn btn_black submitButton" data-title="{{ $name20 }}" data-case_originates="{{ $Originate->id}}" data-filrname="ReproducedFiles">Save</button>
                                    </div>
                                </div>
                                {{-- Reproduced Record to PC (End) --}}
                                {{-- SFI/Chrono/Precis (Start) --}}
                                <div class="col-md-4">
                                    <div class="originating_process_card">
                                        <span class="sub_heading">{{ $name21 }}</span>
                                        <div class="new_file_div">
                                            @if ($Processed->where('form_id','21')->count() == 0)
                                                <a href="javascript:void(0)" class="multiple">

                                                    <label class="z_filelabel">
                                                        <input style="display: none" class="form-control fileInput SFIFiles"  data-case_originates="{{ $Originate->id}}" data-filrname="SFIFiles" data-index="0" id="input" type="file" name="SFIFiles[0][file]" accept="application/pdf">
                                                        <img src="{{ asset('website/assets/images/formtickbox.png') }}">
                                                        <span>
                                                                No file selected.
                                                            </span>
                                                    </label>
                                                </a>

                                                <p class="">
                                                    <span>Notes</span>
                                                    <input type="hidden" name="SFIFiles[0][case_originates]" value="{{ $Originate->id}}">
                                                    <textarea name="SFIFiles[0][note]" id="" class="form-control description_para" cols="40" rows="8"></textarea>
                                                    <input type="date" name="SFIFiles[0][date]" class="form-control " value="">
                                                </p>
                                                <div class="btns_box">   <button type="button"  class="add_new_div btn_yellow" data-case_originates="{{ $Originate->id}}" data-filrname="SFIFiles" data-index="0" >Add More Files</button></div>
                                            @else
                                                <?php $count = 0;?>
                                                @foreach ($Processed->where('form_id','21') as $keyz=>$element)
                                                    <a href="" class="multiple">
                                                        <label class="z_filelabel">
                                                            <input type="hidden" name="SFIFiles[{{ $count }}][id]" value="{{ $element->id }}">
                                                            <input style="display: none" class="form-control fileInput SFIFiles"  data-case_originates="{{ $element->originate_id }}" data-filrname="SFIFiles" data-index="{{ $count }}" id="input" type="file" name="SFIFiles[{{ $count }}][file]" accept="application/pdf">
                                                            <img src="{{ asset('website/assets/images/formcheckbox.svg') }}">

                                                        </label>

                                                    </a>
                                                    @if ($count == 0)
                                                        <button type="button"  class="add_new_div btn_yellow" data-case_originates="{{ $element->originate_id }}" data-filrname="SFIFiles" data-index="{{ $Processed->where('form_id','21')->count()-1 }}" >Add More Files</button>
                                                    @endif

                                                    <p class="">
                                                        <span>Notes</span>
                                                        <input type="hidden" name="SFIFiles[{{ $count }}][case_originates]" value="{{ $element->originate_id }}">
                                                        <textarea name="SFIFiles[{{ $count }}][note]" id="" class="form-control description_para" cols="40" rows="8">{{ $element->description }}</textarea>
                                                        <input type="date" name="SFIFiles[0][date]" class="form-control " value="{{ $element->date }}">
                                                    </p>
                                                    <a class="btn btn_yellow pull-right" href="{{ route('originating_processed_destory' , [$element->id??'']) }}"
                                                       title="Delete {{ preg_replace('/(?<=[a-z])[A-Z]|[A-Z](?=[a-z])/', ' $0', 'OriginatingProcessed') }}" onclick="return confirm(&quot;Confirm delete?&quot;)">
                                                        Delete
                                                    </a>
                                                    <?php $count++ ?>
                                                @endforeach
                                            @endif
                                        </div>
                                        <button type="button" data-form="21" class="btn btn_black submitButton" data-title="{{ $name21 }}" data-case_originates="{{ $Originate->id}}" data-filrname="SFIFiles">Save</button>
                                    </div>
                                </div>
                                {{-- SFI/Chrono/Precis (End) --}}
                                {{-- Case for Appellant (Start) --}}
                                <div class="col-md-4">
                                    <div class="originating_process_card">
                                        <span class="sub_heading">{{ $name22 }}</span>
                                        <div class="new_file_div">
                                            @if ($Processed->where('form_id','22')->count() == 0)
                                                <a href="javascript:void(0)" class="multiple">

                                                    <label class="z_filelabel">
                                                        <input style="display: none" class="form-control fileInput caseAppellantFiles" data-case_originates="{{ $Originate->id}}" data-filrname="caseAppellantFiles" data-index="0" id="input" type="file" name="caseAppellantFiles[0][file]" accept="application/pdf">
                                                        <img src="{{ asset('website/assets/images/formtickbox.png') }}">
                                                        <span>
                                                                No file selected.
                                                            </span>
                                                    </label>
                                                </a>

                                                <p class="">
                                                    <span>Notes</span>
                                                    <input type="hidden" name="caseAppellantFiles[0][case_originates]" value="{{ $Originate->id}}">
                                                    <textarea name="caseAppellantFiles[0][note]" id="" class="form-control description_para" cols="40" rows="8"></textarea>
                                                    <input type="date" name="caseAppellantFiles[0][date]" class="form-control " value="">
                                                </p>
                                                <div class="btns_box">     <button type="button"  class="add_new_div btn_yellow" data-case_originates="{{ $Originate->id}}" data-filrname="caseAppellantFiles" data-index="0" >Add More Files</button></div>
                                            @else
                                                <?php $count = 0;?>
                                                @foreach ($Processed->where('form_id','22') as $keyz=>$element)
                                                    <a href="" class="multiple">
                                                        <label class="z_filelabel">
                                                            <input type="hidden" name="caseAppellantFiles[{{ $count }}][id]" value="{{ $element->id }}">
                                                            <input style="display: none" class="form-control fileInput caseAppellantFiles" data-case_originates="{{ $element->originate_id }}" data-filrname="caseAppellantFiles" data-index="{{ $count }}" id="input" type="file" name="caseAppellantFiles[{{ $count }}][file]" accept="application/pdf">
                                                            <img src="{{ asset('website/assets/images/formcheckbox.svg') }}">

                                                        </label>

                                                    </a>
                                                    @if ($count == 0)
                                                        <button type="button"  class="add_new_div btn_yellow" data-case_originates="{{ $element->originate_id }}" data-filrname="caseAppellantFiles" data-index="{{ $Processed->where('form_id','22')->count()-1 }}" >Add More Files</button>
                                                    @endif

                                                    <p class="">
                                                        <span>Notes</span>
                                                        <input type="hidden" name="caseAppellantFiles[{{ $count }}][case_originates]" value="{{ $element->originate_id }}">
                                                        <textarea name="caseAppellantFiles[{{ $count }}][note]" id="" class="form-control description_para" cols="40" rows="8">{{ $element->description }}</textarea>
                                                        <input type="date" name="caseAppellantFiles[0][date]" class="form-control " value="{{ $element->date }}">
                                                    </p>
                                                    <a class="btn btn_yellow pull-right" href="{{ route('originating_processed_destory' , [$element->id??'']) }}"
                                                       title="Delete {{ preg_replace('/(?<=[a-z])[A-Z]|[A-Z](?=[a-z])/', ' $0', 'OriginatingProcessed') }}" onclick="return confirm(&quot;Confirm delete?&quot;)">
                                                        Delete
                                                    </a>
                                                    <?php $count++ ?>
                                                @endforeach
                                            @endif
                                        </div>
                                        <button type="button" data-form="22" class="btn btn_black submitButton" data-title="{{ $name22 }}" data-case_originates="{{ $Originate->id}}" data-filrname="caseAppellantFiles">Save</button>
                                    </div>
                                </div>
                                {{-- Case for Appellant (End) --}}
                                {{-- Case for Respondent (Start) --}}
                                <div class="col-md-4">
                                    <div class="originating_process_card">
                                        <span class="sub_heading">{{ $name23 }}</span>
                                        <div class="new_file_div">
                                            @if ($Processed->where('form_id','23')->count() == 0)
                                                <a href="javascript:void(0)" class="multiple">

                                                    <label class="z_filelabel">
                                                        <input style="display: none" class="form-control fileInput caseRespondentFiles" data-case_originates="{{ $Originate->id}}" data-filrname="caseRespondentFiles" data-index="0" id="input" type="file" name="caseRespondentFiles[0][file]" accept="application/pdf">
                                                        <img src="{{ asset('website/assets/images/formtickbox.png') }}">
                                                        <span>
                                                                No file selected.
                                                            </span>
                                                    </label>
                                                </a>

                                                <p class="">
                                                    <span>Notes</span>
                                                    <input type="hidden" name="caseRespondentFiles[0][case_originates]" value="{{ $Originate->id}}">
                                                    <textarea name="caseRespondentFiles[0][note]" id="" class="form-control description_para" cols="40" rows="8"></textarea>
                                                    <input type="date" name="caseRespondentFiles[0][date]" class="form-control " value="">
                                                </p>
                                                <div class="btns_box">                       <button type="button"  class="add_new_div btn_yellow" data-case_originates="{{ $Originate->id}}" data-filrname="caseRespondentFiles" data-index="0" >Add More Files</button></div>
                                            @else
                                                <?php $count = 0;?>
                                                @foreach ($Processed->where('form_id','23') as $keyz=>$element)
                                                    <a href="" class="multiple">
                                                        <label class="z_filelabel">
                                                            <input type="hidden" name="caseRespondentFiles[{{ $count }}][id]" value="{{ $element->id }}">
                                                            <input style="display: none" class="form-control fileInput caseRespondentFiles" data-case_originates="{{ $element->originate_id }}" data-filrname="caseRespondentFiles" data-index="{{ $count }}" id="input" type="file" name="caseRespondentFiles[{{ $count }}][file]" accept="application/pdf">
                                                            <img src="{{ asset('website/assets/images/formcheckbox.svg') }}">

                                                        </label>

                                                    </a>
                                                    @if ($count == 0)
                                                        <button type="button"  class="add_new_div btn_yellow" data-case_originates="{{ $element->originate_id }}" data-filrname="caseRespondentFiles" data-index="{{ $Processed->where('form_id','23')->count()-1 }}" >Add More Files</button>
                                                    @endif

                                                    <p class="">
                                                        <span>Notes</span>
                                                        <input type="hidden" name="caseRespondentFiles[{{ $count }}][case_originates]" value="{{ $element->originate_id }}">
                                                        <textarea name="caseRespondentFiles[{{ $count }}][note]" id="" class="form-control description_para" cols="40" rows="8">{{ $element->description }}</textarea>
                                                        <input type="date" name="caseRespondentFiles[0][date]" class="form-control " value="{{ $element->date }}">
                                                    </p>
                                                    <a class="btn btn_yellow pull-right" href="{{ route('originating_processed_destory' , [$element->id??'']) }}"
                                                       title="Delete {{ preg_replace('/(?<=[a-z])[A-Z]|[A-Z](?=[a-z])/', ' $0', 'OriginatingProcessed') }}" onclick="return confirm(&quot;Confirm delete?&quot;)">
                                                        Delete
                                                    </a>
                                                    <?php $count++ ?>
                                                @endforeach
                                            @endif
                                        </div>
                                        <button type="button" data-form="23" class="btn btn_black submitButton" data-title="{{ $name23 }}" data-case_originates="{{ $Originate->id}}" data-filrname="caseRespondentFiles">Save</button>
                                    </div>
                                </div>
                                {{-- Case for Respondent (End) --}}
                                {{-- Updated Record with JBA (Start) --}}
                                <div class="col-md-4">
                                    <div class="originating_process_card">
                                        <span class="sub_heading">{{ $name24 }}</span>
                                        <div class="new_file_div">
                                            @if ($Processed->where('form_id','24')->count() == 0)
                                                <a href="javascript:void(0)" class="multiple">

                                                    <label class="z_filelabel">
                                                        <input style="display: none" class="form-control fileInput updateRecordFiles" data-case_originates="{{ $Originate->id}}" data-filrname="updateRecordFiles" data-index="0" id="input" type="file" name="updateRecordFiles[0][file]" accept="application/pdf">
                                                        <img src="{{ asset('website/assets/images/formtickbox.png') }}">
                                                        <span>
                                                                No file selected.
                                                            </span>
                                                    </label>
                                                </a>

                                                <p class="">
                                                    <span>Notes</span>
                                                    <input type="hidden" name="updateRecordFiles[0][case_originates]" value="{{ $Originate->id}}">
                                                    <textarea name="updateRecordFiles[0][note]" id="" class="form-control description_para" cols="40" rows="8"></textarea>
                                                    <input type="date" name="updateRecordFiles[0][date]" class="form-control " value="">
                                                </p>
                                                <div class="btns_box">     <button type="button"  class="add_new_div btn_yellow" data-case_originates="{{ $Originate->id}}" data-filrname="updateRecordFiles" data-index="0" >Add More Files</button></div>
                                            @else
                                                <?php $count = 0;?>
                                                @foreach ($Processed->where('form_id','24') as $keyz=>$element)
                                                    <a href="" class="multiple">
                                                        <label class="z_filelabel">
                                                            <input type="hidden" name="updateRecordFiles[{{ $count }}][id]" value="{{ $element->id }}">
                                                            <input style="display: none" class="form-control fileInput updateRecordFiles" data-case_originates="{{ $element->originate_id }}" data-filrname="updateRecordFiles" data-index="{{ $count }}" id="input" type="file" name="updateRecordFiles[{{ $count }}][file]" accept="application/pdf">
                                                            <img src="{{ asset('website/assets/images/formcheckbox.svg') }}">

                                                        </label>

                                                    </a>
                                                    @if ($count == 0)
                                                        <button type="button"  class="add_new_div btn_yellow" data-case_originates="{{ $element->originate_id }}" data-filrname="updateRecordFiles" data-index="{{ $Processed->where('form_id','24')->count()-1 }}" >Add More Files</button>
                                                    @endif

                                                    <p class="">
                                                        <span>Notes</span>
                                                        <input type="hidden" name="updateRecordFiles[{{ $count }}][case_originates]" value="{{ $element->originate_id }}">
                                                        <textarea name="updateRecordFiles[{{ $count }}][note]" id="" class="form-control description_para" cols="40" rows="8">{{ $element->description }}</textarea>
                                                        <input type="date" name="updateRecordFiles[0][date]" class="form-control " value="{{ $element->date }}">
                                                    </p>
                                                    <a class="btn btn_yellow pull-right" href="{{ route('originating_processed_destory' , [$element->id??'']) }}"
                                                       title="Delete {{ preg_replace('/(?<=[a-z])[A-Z]|[A-Z](?=[a-z])/', ' $0', 'OriginatingProcessed') }}" onclick="return confirm(&quot;Confirm delete?&quot;)">
                                                        Delete
                                                    </a>
                                                    <?php $count++ ?>
                                                @endforeach
                                            @endif
                                        </div>
                                        <button type="button" data-form="24" class="btn btn_black submitButton" data-title="{{ $name24 }}" data-case_originates="{{ $Originate->id}}" data-filrname="updateRecordFiles">Save</button>
                                    </div>
                                </div>
                                {{-- Updated Record with JBA (End) --}}
                                {{-- Judgment from PC (Start) --}}
                                <div class="col-md-4">
                                    <div class="originating_process_card">
                                        <span class="sub_heading">{{ $name25 }}</span>
                                        <div class="new_file_div">
                                            @if ($Processed->where('form_id','25')->count() == 0)
                                                <a href="javascript:void(0)" class="multiple">

                                                    <label class="z_filelabel">
                                                        <input style="display: none" class="form-control fileInput judgementPCFiles" data-case_originates="{{ $Originate->id}}" data-filrname="judgementPCFiles" data-index="0" id="input" type="file" name="judgementPCFiles[0][file]" accept="application/pdf">
                                                        <img src="{{ asset('website/assets/images/formtickbox.png') }}">
                                                        <span>
                                                                No file selected.
                                                            </span>
                                                    </label>
                                                </a>

                                                <p class="">
                                                    <span>Notes</span>
                                                    <input type="hidden" name="judgementPCFiles[0][case_originates]" value="{{ $Originate->id}}">
                                                    <textarea name="judgementPCFiles[0][note]" id="" class="form-control description_para" cols="40" rows="8"></textarea>
                                                    <input type="date" name="judgementPCFiles[0][date]" class="form-control " value="">
                                                </p>
                                                <div class="btns_box">      <button type="button"  class="add_new_div btn_yellow" data-case_originates="{{ $Originate->id}}" data-filrname="judgementPCFiles" data-index="0" >Add More Files</button></div>
                                            @else
                                                <?php $count = 0;?>
                                                @foreach ($Processed->where('form_id','25') as $keyz=>$element)
                                                    <a href="" class="multiple">
                                                        <label class="z_filelabel">
                                                            <input type="hidden" name="judgementPCFiles[{{ $count }}][id]" value="{{ $element->id }}">
                                                            <input style="display: none" class="form-control fileInput judgementPCFiles" data-case_originates="{{ $element->originate_id }}" data-filrname="judgementPCFiles" data-index="{{ $count }}" id="input" type="file" name="judgementPCFiles[{{ $count }}][file]" accept="application/pdf">
                                                            <img src="{{ asset('website/assets/images/formcheckbox.svg') }}">

                                                        </label>

                                                    </a>
                                                    @if ($count == 0)
                                                        <button type="button"  class="add_new_div btn_yellow" data-case_originates="{{ $element->originate_id }}" data-filrname="judgementPCFiles" data-index="{{ $Processed->where('form_id','25')->count()-1 }}" >Add More Files</button>
                                                    @endif

                                                    <p class="">
                                                        <span>Notes</span>
                                                        <input type="hidden" name="judgementPCFiles[{{ $count }}][case_originates]" value="{{ $element->originate_id }}">
                                                        <textarea name="judgementPCFiles[{{ $count }}][note]" id="" class="form-control description_para" cols="40" rows="8">{{ $element->description }}</textarea>
                                                        <input type="date" name="judgementPCFiles[0][date]" class="form-control " value="{{ $element->date }}">
                                                    </p>
                                                    <a class="btn btn_yellow pull-right" href="{{ route('originating_processed_destory' , [$element->id??'']) }}"
                                                       title="Delete {{ preg_replace('/(?<=[a-z])[A-Z]|[A-Z](?=[a-z])/', ' $0', 'OriginatingProcessed') }}" onclick="return confirm(&quot;Confirm delete?&quot;)">
                                                        Delete
                                                    </a>
                                                    <?php $count++ ?>
                                                @endforeach
                                            @endif
                                        </div>
                                        <button type="button" data-form="25" class="btn btn_black submitButton" data-title="{{ $name25 }}" data-case_originates="{{ $Originate->id}}" data-filrname="judgementPCFiles">Save</button>
                                    </div>
                                </div>
                                {{-- Judgment from PC (End) --}}
                                {{-- Order of PC (Start) --}}
                                <div class="col-md-4">
                                    <div class="originating_process_card">
                                        <span class="sub_heading">{{ $name26 }}</span>
                                        <div class="new_file_div">
                                            @if ($Processed->where('form_id','26')->count() == 0)
                                                <a href="javascript:void(0)" class="multiple">

                                                    <label class="z_filelabel">
                                                        <input style="display: none" class="form-control fileInput orderPcFil es" data-case_originates="{{ $Originate->id}}" data-filrname="orderPcFiles" data-index="0" id="input" type="file" name="orderPcFiles[0][file]" accept="application/pdf">
                                                        <img src="{{ asset('website/assets/images/formtickbox.png') }}">
                                                        <span>
                                                                No file selected.
                                                            </span>
                                                    </label>
                                                </a>

                                                <p class="">
                                                    <span>Notes</span>
                                                    <input type="hidden" name="orderPcFiles[0][case_originates]" value="{{ $Originate->id}}">
                                                    <textarea name="orderPcFiles[0][note]" id="" class="form-control description_para" cols="40" rows="8"></textarea>
                                                    <input type="date" name="orderPcFiles[0][date]" class="form-control " value="">
                                                </p>
                                                <div class="btns_box">    <button type="button"  class="add_new_div btn_yellow" data-case_originates="{{ $Originate->id}}" data-filrname="orderPcFiles" data-index="0" >Add More Files</button></div>
                                            @else
                                                <?php $count = 0;?>
                                                @foreach ($Processed->where('form_id','26') as $keyz=>$element)
                                                    <a href="" class="multiple">
                                                        <label class="z_filelabel">
                                                            <input type="hidden" name="orderPcFiles[{{ $count }}][id]" value="{{ $element->id }}">
                                                            <input style="display: none" class="form-control fileInput orderPcFiles" data-case_originates="{{ $element->originate_id }}" data-filrname="orderPcFiles" data-index="{{ $count }}" id="input" type="file" name="orderPcFiles[{{ $count }}][file]" accept="application/pdf">
                                                            <img src="{{ asset('website/assets/images/formcheckbox.svg') }}">

                                                        </label>

                                                    </a>
                                                    @if ($count == 0)
                                                        <button type="button"  class="add_new_div btn_yellow" data-case_originates="{{ $element->originate_id }}" data-filrname="orderPcFiles" data-index="{{ $Processed->where('form_id','26')->count()-1 }}" >Add More Files</button>
                                                    @endif

                                                    <p class="">
                                                        <span>Notes</span>
                                                        <input type="hidden" name="orderPcFiles[{{ $count }}][case_originates]" value="{{ $element->originate_id }}">
                                                        <textarea name="orderPcFiles[{{ $count }}][note]" id="" class="form-control description_para" cols="40" rows="8">{{ $element->description }}</textarea>
                                                        <input type="date" name="orderPcFiles[0][date]" class="form-control " value="{{ $element->date }}">
                                                    </p>
                                                    <a class="btn btn_yellow pull-right" href="{{ route('originating_processed_destory' , [$element->id??'']) }}"
                                                       title="Delete {{ preg_replace('/(?<=[a-z])[A-Z]|[A-Z](?=[a-z])/', ' $0', 'OriginatingProcessed') }}" onclick="return confirm(&quot;Confirm delete?&quot;)">
                                                        Delete
                                                    </a>
                                                    <?php $count++ ?>
                                                @endforeach
                                            @endif
                                        </div>
                                        <button type="button" data-form="26" class="btn btn_black submitButton" data-title="{{ $name26 }}" data-case_originates="{{ $Originate->id}}" data-filrname="orderPcFiles">Save</button>
                                    </div>
                                </div>
                                {{-- Order of PC (End) --}}
                                {{-- Ongoing letters (Start) --}}
                                <div class="col-md-4">
                                    <div class="originating_process_card">
                                        <span class="sub_heading">{{ $name27 }}</span>
                                        <div class="new_file_div">
                                            @if ($Processed->where('form_id','27')->count() == 0)
                                                <a href="javascript:void(0)" class="multiple">

                                                    <label class="z_filelabel">
                                                        <input style="display: none" class="form-control fileInput OngoingFil es" data-case_originates="{{ $Originate->id}}" data-filrname="OngoingFiles" data-index="0" id="input" type="file" name="OngoingFiles[0][file]" accept="application/pdf">
                                                        <img src="{{ asset('website/assets/images/formtickbox.png') }}">
                                                        <span>
                                                                No file selected.
                                                            </span>
                                                    </label>
                                                </a>

                                                <p class="">
                                                    <span>Notes</span>
                                                    <input type="hidden" name="OngoingFiles[0][case_originates]" value="{{ $Originate->id}}">
                                                    <textarea name="OngoingFiles[0][note]" id="" class="form-control description_para" cols="40" rows="8"></textarea>
                                                    <input type="date" name="OngoingFiles[0][date]" class="form-control " value="">
                                                </p>
                                                <div class="btns_box">                         <button type="button"  class="add_new_div btn_yellow" data-case_originates="{{ $Originate->id}}" data-filrname="OngoingFiles" data-index="0" >Add More Files</button></div>
                                            @else
                                                <?php $count = 0;?>
                                                @foreach ($Processed->where('form_id','27') as $keyz=>$element)
                                                    <a href="" class="multiple">
                                                        <label class="z_filelabel">
                                                            <input type="hidden" name="OngoingFiles[{{ $count }}][id]" value="{{ $element->id }}">
                                                            <input style="display: none" class="form-control fileInput OngoingFil es" data-case_originates="{{ $element->originate_id }}" data-filrname="OngoingFiles" data-index="{{ $count }}" id="input" type="file" name="OngoingFiles[{{ $count }}][file]" accept="application/pdf">
                                                            <img src="{{ asset('website/assets/images/formcheckbox.svg') }}">

                                                        </label>

                                                    </a>
                                                    @if ($count == 0)
                                                        <button type="button"  class="add_new_div btn_yellow" data-case_originates="{{ $element->originate_id }}" data-filrname="OngoingFiles" data-index="{{ $Processed->where('form_id','27')->count()-1 }}" >Add More Files</button>
                                                    @endif

                                                    <p class="">
                                                        <span>Notes</span>
                                                        <input type="hidden" name="OngoingFiles[{{ $count }}][case_originates]" value="{{ $element->originate_id }}">
                                                        <textarea name="OngoingFiles[{{ $count }}][note]" id="" class="form-control description_para" cols="40" rows="8">{{ $element->description }}</textarea>
                                                        <input type="date" name="OngoingFiles[0][date]" class="form-control " value="{{ $element->date }}">
                                                    </p>
                                                    <a class="btn btn_yellow pull-right" href="{{ route('originating_processed_destory' , [$element->id??'']) }}"
                                                       title="Delete {{ preg_replace('/(?<=[a-z])[A-Z]|[A-Z](?=[a-z])/', ' $0', 'OriginatingProcessed') }}" onclick="return confirm(&quot;Confirm delete?&quot;)">
                                                        Delete
                                                    </a>
                                                    <?php $count++ ?>
                                                @endforeach
                                            @endif
                                        </div>
                                        <button type="button" data-form="27" class="btn btn_black submitButton" data-title="{{ $name27 }}" data-case_originates="{{ $Originate->id}}" data-filrname="OngoingFiles">Save</button>
                                    </div>
                                </div>
                                {{-- Ongoing letters (End) --}}
                                {{-- CMC orders (Start) --}}
                                <div class="col-md-4">
                                    <div class="originating_process_card">
                                        <span class="sub_heading">{{ $name28 }}</span>
                                        <div class="new_file_div">
                                            @if ($Processed->where('form_id','28')->count() == 0)
                                                <a href="javascript:void(0)" class="multiple">

                                                    <label class="z_filelabel">
                                                        <input style="display: none" class="form-control fileInput CMCodersFiles" data-case_originates="{{ $Originate->id}}" data-filrname="CMCodersFiles" data-index="0" id="input" type="file" name="CMCodersFiles[0][file]" accept="application/pdf">
                                                        <img src="{{ asset('website/assets/images/formtickbox.png') }}">
                                                        <span>
                                                                No file selected.
                                                            </span>
                                                    </label>
                                                </a>

                                                <p class="">
                                                    <span>Notes</span>
                                                    <input type="hidden" name="CMCodersFiles[0][case_originates]" value="{{ $Originate->id}}">
                                                    <textarea name="CMCodersFiles[0][note]" id="" class="form-control description_para" cols="40" rows="8"></textarea>
                                                    <input type="date" name="CMCodersFiles[0][date]" class="form-control " value="">
                                                </p>

                                                <div class="btns_box">                         <button type="button"  class="add_new_div btn_yellow" data-case_originates="{{ $Originate->id}}" data-filrname="CMCodersFiles" data-index="0" >Add More Files</button></div>
                                            @else
                                                <?php $count = 0;?>
                                                @foreach ($Processed->where('form_id','28') as $keyz=>$element)
                                                    <a href="" class="multiple">
                                                        <label class="z_filelabel">
                                                            <input type="hidden" name="CMCodersFiles[{{ $count }}][id]" value="{{ $element->id }}">
                                                            <input style="display: none" class="form-control fileInput CMCodersFiles" data-case_originates="{{ $element->originate_id }}" data-filrname="CMCodersFiles" data-index="{{ $count }}" id="input" type="file" name="CMCodersFiles[{{ $count }}][file]" accept="application/pdf">
                                                            <img src="{{ asset('website/assets/images/formcheckbox.svg') }}">

                                                        </label>

                                                    </a>
                                                    @if ($count == 0)
                                                        <button type="button"  class="add_new_div btn_yellow" data-case_originates="{{ $element->originate_id }}" data-filrname="CMCodersFiles" data-index="{{ $Processed->where('form_id','28')->count()-1 }}" >Add More Files</button>
                                                    @endif

                                                    <p class="">
                                                        <span>Notes</span>
                                                        <input type="hidden" name="CMCodersFiles[{{ $count }}][case_originates]" value="{{ $element->originate_id }}">
                                                        <textarea name="CMCodersFiles[{{ $count }}][note]" id="" class="form-control description_para" cols="40" rows="8">{{ $element->description }}</textarea>
                                                        <input type="date" name="CMCodersFiles[0][date]" class="form-control " value="{{ $element->date }}">
                                                    </p>
                                                    <a class="btn btn_yellow pull-right" href="{{ route('originating_processed_destory' , [$element->id??'']) }}"
                                                       title="Delete {{ preg_replace('/(?<=[a-z])[A-Z]|[A-Z](?=[a-z])/', ' $0', 'OriginatingProcessed') }}" onclick="return confirm(&quot;Confirm delete?&quot;)">
                                                        Delete
                                                    </a>
                                                    <?php $count++ ?>
                                                @endforeach
                                            @endif
                                        </div>
                                        <button type="button" data-form="28" class="btn btn_black submitButton" data-title="{{ $name28 }}" data-case_originates="{{ $Originate->id}}" data-filrname="CMCodersFiles">Save</button>
                                    </div>
                                </div>
                                {{-- CMC orders (End) --}}
                                {{-- Filed Bill of Costs (Start) --}}
                                <div class="col-md-4">
                                    <div class="originating_process_card">
                                        <span class="sub_heading">{{ $name29 }}</span>
                                        <div class="new_file_div">
                                            @if ($Processed->where('form_id','29')->count() == 0)
                                                <a href="javascript:void(0)" class="multiple">

                                                    <label class="z_filelabel">
                                                        <input style="display: none" class="form-control fileInput CostFiles"  data-case_originates="{{ $Originate->id}}" data-filrname="CostFiles" data-index="0" id="input" type="file" name="CostFiles[0][file]" accept="application/pdf">
                                                        <img src="{{ asset('website/assets/images/formtickbox.png') }}">
                                                        <span>
                                                                No file selected.
                                                            </span>
                                                    </label>
                                                </a>

                                                <p class="">
                                                    <span>Notes</span>
                                                    <input type="hidden" name="CostFiles[0][case_originates]" value="{{ $Originate->id}}">
                                                    <textarea name="CostFiles[0][note]" id="" class="form-control description_para" cols="40" rows="8"></textarea>
                                                    <input type="date" name="CostFiles[0][date]" class="form-control " value="">
                                                </p>
                                                <div class="btns_box">       <button type="button"  class="add_new_div btn_yellow" data-case_originates="{{ $Originate->id}}" data-filrname="CostFiles" data-index="0" >Add More Files</button></div>
                                            @else
                                                <?php $count = 0;?>
                                                @foreach ($Processed->where('form_id','29') as $keyz=>$element)
                                                    <a href="" class="multiple">
                                                        <label class="z_filelabel">
                                                            <input type="hidden" name="CostFiles[{{ $count }}][id]" value="{{ $element->id }}">
                                                            <input style="display: none" class="form-control fileInput CostFiles"  data-case_originates="{{ $element->originate_id }}" data-filrname="CostFiles" data-index="{{ $count }}" id="input" type="file" name="CostFiles[{{ $count }}][file]" accept="application/pdf">
                                                            <img src="{{ asset('website/assets/images/formcheckbox.svg') }}">

                                                        </label>

                                                    </a>
                                                    @if ($count == 0)
                                                        <button type="button"  class="add_new_div btn_yellow" data-case_originates="{{ $element->originate_id }}" data-filrname="CostFiles" data-index="{{ $Processed->where('form_id','29')->count()-1 }}" >Add More Files</button>
                                                    @endif

                                                    <p class="">
                                                        <span>Notes</span>
                                                        <input type="hidden" name="CostFiles[{{ $count }}][case_originates]" value="{{ $element->originate_id }}">
                                                        <textarea name="CostFiles[{{ $count }}][note]" id="" class="form-control description_para" cols="40" rows="8">{{ $element->description }}</textarea>
                                                        <input type="date" name="CostFiles[0][date]" class="form-control " value="{{ $element->date }}">
                                                    </p>
                                                    <a class="btn btn_yellow pull-right" href="{{ route('originating_processed_destory' , [$element->id??'']) }}"
                                                       title="Delete {{ preg_replace('/(?<=[a-z])[A-Z]|[A-Z](?=[a-z])/', ' $0', 'OriginatingProcessed') }}" onclick="return confirm(&quot;Confirm delete?&quot;)">
                                                        Delete
                                                    </a>
                                                    <?php $count++ ?>
                                                @endforeach
                                            @endif
                                        </div>
                                        <button type="button" data-form="29" class="btn btn_black submitButton" data-title="{{ $name29 }}" data-case_originates="{{ $Originate->id}}" data-filrname="CostFiles">Save</button>
                                    </div>
                                </div>
                                {{-- Filed Bill of Costs (End) --}}
                            </form>
                        </div>
                    </div>
                </div> -->

            </div>
        </div>
    </section>


    <div id="share_modal"  class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog"
         aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×
                    </button>
                    <h1 class="modal-title">File Share</h1></div>
                <div class="modal-body">
                    <form method="POST" action="{{route('file_mail')}}" accept-charset="UTF-8"
                          class="form-horizontal" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <input type="hidden" name="file" class="file" id="file">
                        <input type="hidden" name="title" class="title" id="title">
                        <input type="hidden" name="case_name" class="case_name" id="case_name">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th scope="col">Attorney Name</th>
                                    <th>Email</th>
                                    <th scope="col">Select</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach($attorneyassociates as $item)
                                        <tr>
                                            <td>{{$item->name??''}}</td>
                                            <td>{{$item->email??''}}</td>
                                            <td>
                                                <div class="checkbox checkbox-warning">
                                                    <input id="checkbox33" name="user_id[]" value="{{@$item->id}}" type="checkbox">
                                                    <label for="checkbox33"></label>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn_black btn_block">Send File</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{--<section class="detail_view_sec originating_process_sec">--}}
    {{--<div class="container-fluid">--}}
    {{--<div class="row">--}}
    {{--<div class="col-md-12">--}}
    {{--<div class="white-box ">--}}
    {{--<div class="row">--}}
    {{--<div class="col-md-12"><h4>Originating Process 01</h4></div>--}}
    {{--@for ($x = 0; $x <= 11; $x++)--}}
    {{--<div class="col-md-4">--}}
    {{--<p><span>Application for leave:</span> <a href=""> Abc File.Doc</a></p>--}}
    {{--<p class="description_para">--}}
    {{--<span>Notes</span>--}}
    {{--Lorem Ipsum is simply dummy text of the printing and type setting industry...--}}
    {{--</p>--}}
    {{--</div>--}}
    {{--@endfor--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--<div class="col-md-12">--}}
    {{--<div class="white-box ">--}}
    {{--<div class="row">--}}
    {{--<div class="col-md-12"><h4>Originating Process 02</h4></div>--}}
    {{--@for ($x = 0; $x <= 11; $x++)--}}
    {{--<div class="col-md-4">--}}
    {{--<p><span>Submission on leave :</span> <a href=""> Abc File.Doc</a></p>--}}
    {{--<p class="description_para">--}}
    {{--<span>Notes</span>--}}
    {{--Lorem Ipsum is simply dummy text of the printing and type setting industry...--}}
    {{--</p>--}}
    {{--</div>--}}
    {{--@endfor--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</section>--}}
@endsection

@push('js')
    {{-- <script src="//github.com/fyneworks/multifile/blob/master/jQuery.MultiFile.min.js" type="text/javascript" language="javascript"></script> --}}
    <script type="text/javascript">
    // Define a counter variable to keep track of the number of cards
    var cardCount = 1;

    // Add a click event listener to the "Add More Files" button
    $('.add_new_div').click(function() {
        // Clone the existing card HTML
        var newCard = $('.card_part').first().clone();

        // Add a "Remove Card" button to the cloned card HTML
        //   var removeButton = $('<button type="button" class="btn btn-danger remove_card">-</button>');
        newCard.find('.new_file_div').append();

        // Update the name and ID attributes of the cloned input fields
        newCard.find('input, textarea').each(function() {
            var newName = $(this).attr('name').replace('[0]', '[' + cardCount + ']');
            var newId = $(this).attr('id') + '_' + cardCount;
            var OriginateId = $(this).attr('value') + '_' + cardCount;

            $(this).attr('name', newName);
            $(this).attr('id', newId);
            $('.originate_id').val(OriginateId);
        });

        // Increment the counter variable
        cardCount++;

        // Append the new card to the parent container
        $('.full_card').append(newCard);

        // Initialize the form validation plugin for the new form
        newCard.find('.originating-process-form').validate();

        // Set the validation rules for the new form fields
        newCard.find('.originating-process-form').validate({
            rules: {
                title: {
                    required: true
                },
                file: {
                    required: true
                },
                description: {
                    required: true
                },
                date: {
                    required: true
                }
            },

            // Add error classes to the form fields and show/hide error messages
            highlight: function(element) {
                $(element).addClass('is-invalid');
                $(element).siblings('.invalid-feedback').show();
            },
            unhighlight: function(element) {
                $(element).removeClass('is-invalid');
                $(element).siblings('.invalid-feedback').hide();
            },

            // Submit the form with AJAX when it is valid
            submitHandler: function(form) {
                var formData = new FormData(form);
                $.ajax({
                    url: "{{route('originating_ajax')}}",
                    type: "POST",
                    data: formData,
                    cache: false,
                    contentType: false,
                    processData: false,
                    beforeSend: function() {
                        $('.submitButton').attr('disabled', true);
                    },
                    success: function(response) {
                        console.log(response);
                    },
                    error: function(xhr) {
                        console.log(xhr.responseText);
                    },
                    complete: function() {
                        $('.submitButton').attr('disabled', false);
                    }
                });
            }
        });
    });

    // Add a click event listener to the "Remove Card" button
    $(document).on('click', '.remove_card', function() {
        // Remove the last card element from the parent container
        $('.card_part').last().remove();

        // Decrement the counter variable
        cardCount--;
    });

    $(document).on('change', 'input', function() {
        $(this).siblings('img').attr('src','{{ asset('website/assets/images/formcheckbox.svg') }}');
        let documentTitle = $(this).val();
        let docFilter = documentTitle.replace(/^.*\\/, "");
        var cacheValue = $(this).siblings('span').text(docFilter);

        var file = this.files[0];
        var maxSize = 2 * 1024 * 1024 * 1024;
        if (file.size > maxSize) {
            alert('File size exceeds the maximum limit of 2GB.');
            this.value = '';
            $(this).siblings('img').attr('src','{{ asset('website/assets/images/formtickbox.png') }}');
            var cacheValue = $(this).siblings('span').text("No File Selected.");

        }
    });
    $(document).on('click', '.share_btn', function() {
        $('#share_modal').modal('show');
        var file = $(this).attr('data-file');
        var casename = $(this).attr('data-case');
        var title = $(this).attr('data-title');
        $('.file').val(file);
        $('.case_name').val(casename);
        $('.title').val(title);
    });

    $(document).ready(function() {
        $('.originating-process-form').on('submit', function(e) {
            e.preventDefault(); // Prevent the form from submitting normally

            var formData = new FormData(this); // Create FormData object to store form data
            var url = "{{route('originating_ajax')}}"; // Get the form action URL

            var token = $('meta[name="csrf-token"]').attr('content'); // Get the CSRF token value

            var progressBar = $('<div class="progressbarWrapper"><span id="greenBar"></span></div>');

            Swal.fire({
                title: 'Processing',
                html: progressBar,
                allowOutsideClick: false,
                allowEscapeKey: false,
                showConfirmButton: false,
                didOpen: function() {
                    Swal.showLoading();
                }
            });

            function move() {
                let elem = document.getElementById("greenBar");
                let stepValue = 0;
                let id = setInterval(frame, 500);

                function frame() {
                    if (stepValue >= 100) {
                        clearInterval(id);
                    } else {
                        elem.style.width = (stepValue + 10) + "%";
                        elem.innerHTML = (stepValue + 10) + "%";
                        stepValue = (stepValue + 10);
                    }
                }
            }

            move(); // Start the progress animation

            $.ajax({
                url: url,
                type: 'POST',
                data: formData,
                dataType: 'json',
                processData: false,
                contentType: false,
                headers: {
                    'X-CSRF-TOKEN': token // Include the CSRF token in the headers
                },
                xhr: function() {
                    var xhr = new window.XMLHttpRequest();
                    xhr.upload.addEventListener("progress", function(evt) {
                        if (evt.lengthComputable) {
                            var percentComplete = (evt.loaded / evt.total) * 100;
                            var progressBarElem = document.getElementById("greenBar");
                            progressBarElem.style.width = percentComplete + "%";
                            progressBarElem.innerHTML = Math.round(percentComplete) + "%";
                        }
                    }, false);
                    return xhr;
                },
                success: function(response) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Success',
                        text: 'Form submitted successfully!',
                    });
                    location.reload();
                },
                error: function(xhr, status, error) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'An error occurred while submitting the form.'
                    });
                },
                complete: function() {
                    progressBar.remove(); // Remove the progress bar element
                }
            });
        });
    });
    </script>

@endpush