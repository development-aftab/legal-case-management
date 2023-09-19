@extends('layouts.master')

@push('css')
    <link href="{{asset('plugins/components/bootstrap-tagsinput/dist/bootstrap-tagsinput.css')}}" rel="stylesheet" />
    <link href="{{asset('plugins/components/custom-select/custom-select.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('plugins/components/bootstrap-select/bootstrap-select.min.css')}}" rel="stylesheet" />
@endpush

@section('content')
    <section class="">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <form class="form-horizontal row dashboard_form" action="{{route('update_case_file')}}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="col-md-6 col-sm-12 form-group">
                            <input type="number" class="form-control" id="" value="{{$casefile->case_number??''}}" name="case_number" required placeholder="Case Number">
                        </div>
                        <div class="col-md-6 col-sm-12 form-group">
                            <input type="number" class="form-control" id="" value="{{rand(11111111,99999999)}}" readonly name="flc_number" required>
                        </div>
                        <div class="col-md-6 col-sm-12 form-group">
                            <input type="text" class="form-control" id=""  value="{{$casefile->name_of_parties??''}}" placeholder="Name of Parties" name="name_of_parties" required>
                            <input type="hidden" name="id" value="{{$casefile->id??''}}">
                        </div>
                        <div class="col-md-6 col-sm-12 form-group">
                            <input type="text" class="form-control" id="" value="{{$casefile->judge_name??''}}" placeholder="Judge Name" name="judge_name" required>
                        </div>
                        <div class="col-md-6 col-sm-12 form-group">
                            <select class="select2 form-control select2-multiple" id="senior_counsel" name="senior_counsel_id[]" multiple="multiple" data-placeholder="Senior Counsel">
                                @foreach($seniorCounsels as $seniorCounsel)
                                    <option value="{{$seniorCounsel->id}}" @if(isset($casefile) && in_array($seniorCounsel->id,$casefile->caseSeniorCounselIds)) selected @endif>{{$seniorCounsel->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6 col-sm-12 form-group">
                            <select class="select2 form-control select2-multiple" id="king_counsel" name="king_counsel_id[]" multiple="multiple" data-placeholder="King Counsel">
                                @foreach($kingCounsels as $kingCounsel)
                                    <option value="{{$kingCounsel->id}}" @if(isset($casefile) && in_array($kingCounsel->id,$casefile->caseKingCounselIds)) selected @endif>{{$kingCounsel->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6 col-sm-12 form-group">
                            <select class="select2 form-control select2-multiple" id="junior_counsel" name="junior_counsel_id[]" multiple="multiple" data-placeholder="Junior Counsel">
                                @foreach($juniorCounsels as $juniorCounsel)
                                    <option value="{{$juniorCounsel->id}}" @if(isset($casefile) && in_array($juniorCounsel->id,$casefile->caseJuniorCounselIds)) selected @endif>{{$juniorCounsel->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6 col-sm-12 form-group">
                            <select class="select2 form-control select2-multiple" id="chamber_manager" name="chamber_manager_id[]" multiple="multiple" data-placeholder="Chamber Manager">
                                @foreach($ChambersManagers as $ChambersManager)
                                    <option value="{{$ChambersManager->id}}" @if(isset($casefile) && in_array($ChambersManager->id,$casefile->caseChambersManagerIds)) selected @endif>{{$ChambersManager->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6 col-sm-12 form-group">
                            <select class="select2 form-control select2-multiple" id="paralegal" name="paralegal_id[]" multiple="multiple" data-placeholder="Paralegal">
                                @foreach($Paralegals as $Paralegal)
                                    <option value="{{$Paralegal->id}}" @if(isset($casefile) && in_array($Paralegal->id,$casefile->caseParalegalIds)) selected @endif>{{$Paralegal->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6 col-sm-12 form-group">
                            <input type="file" class="form-control" id="" name="retainer_agreement"  placeholder="Retainer Agreement" accept="application/pdf">
                        </div>
                        <div class="col-md-6 col-sm-12 form-group">
                            <select class="select2 form-control select2-multiple" id="type_of_matter" name="type_of_matter_id[]" multiple="multiple" data-placeholder="Type Of Matter">
                                @foreach($typeOfMatters as $typeOfMatter)
                                    <option value="{{$typeOfMatter->id}}" @if(isset($casefile) && in_array($typeOfMatter->id,$casefile->caseTypeOfMatterIds)) selected @endif>{{$typeOfMatter->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        {{--<div class="col-md-6 col-sm-12 form-group">--}}
                            {{--<select class="select2 form-control select2-multiple" id="originating" name="originating[]" disabled multiple="multiple" data-placeholder="Originating Process">--}}
                                {{--@foreach($casefile->originatingProcess as $originates)--}}
                                    {{--<option selected>--}}
                                        {{--{{$originates->process->name ??''}}--}}
                                    {{--</option>--}}
                                {{--@endforeach--}}
                            {{--</select>--}}
                        {{--</div>--}}
                        <div class="col-md-6 col-sm-12 form-group">
                        <div class="input-group">
                                <span class="input-group-addon">#</span>
                                <div class="bootstrap-tagsinput">
                                    @foreach($casetags as $tag)
                                        @if(isset($casefile) && in_array($tag->id,$casefile->caseTagIds))
                                            <span class="tag label label-info">{{$tag->name??''}}</span>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12 form-group">
                            <textarea class="form-control" placeholder="Case Condition" name="case_condition" id="" cols="10" rows="5">{{$casefile->case_condition??''}}</textarea>
                        </div>
                        <div class="col-md-6 col-sm-12 form-group">
                            <input class="btn btn_black btn_block" type="submit" value="Update">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

@endsection

@push('js')
    <script >
        jQuery("input[type='file']").on("change", function(e){
            var fileName = e.target.files[0].name;
            console.log(fileName);
            jQuery(this).next().children().text( fileName );
        });
    </script>
    <script src="{{asset('plugins/components/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js')}}"></script>
    <script src="{{asset('plugins/components/custom-select/custom-select.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('plugins/components/bootstrap-select/bootstrap-select.min.js')}}" type="text/javascript"></script>
    <script>
        jQuery(document).ready(function() {
            // For select 2
            $(".select2").select2();
            $('.selectpicker').selectpicker();

        });
    </script>

@endpush