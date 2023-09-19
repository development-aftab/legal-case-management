@extends('layouts.master')
@push('css')
    <link href="{{ asset('plugins/components/jasny-bootstrap/css/jasny-bootstrap.css') }}" rel="stylesheet">
    <link href="{{asset('plugins/components/icheck/skins/all.css')}}" rel="stylesheet">
    <style>
        .error {
            color: red !important;
        }
    </style>
@endpush
@section('content')
<section class="create_user_sec">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="white-box">
                    <!-- <h3 class="box-title pull-left">{{ preg_replace('/(?<=[a-z])[A-Z]|[A-Z](?=[a-z])/', ' $0', 'AttorneyAssociate') }}</h3> -->
                    @can('view-'.str_slug('AttorneyAssociate'))
                        <a  class="btn btn_yellow pull-right btn_icon" href="{{url('/attorneyAssociate/attorney-associate')}}"><i class="icon-arrow-left-circle"></i>{{ preg_replace('/(?<=[a-z])[A-Z]|[A-Z](?=[a-z])/', ' $0', 'Back') }}</a>
                    @endcan

                    <div class="clearfix"></div>
                    <hr>
                    @if ($errors->any())
                        <ul class="alert alert-danger">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    @endif
                    <form action="#" accept-charset="UTF-8" class="form-horizontal row dashboard_form" id="#" enctype="multipart/form-data">
                        <div class="col-md-9">
                            <div class="row">
                                <div class="col-md-6 col-sm-12 form-group">
                                    <label for="">Name</label>
                                    <input type="text" class="form-control" name="name" id="name" value="{{ $attorneyassociate->name??'' }}"  placeholder="Name" disabled>
                                </div>
                                <div class="col-md-6 col-sm-12 form-group hide_feild" @if(isset($attorneyassociate) && $attorneyassociate->roles->first()->name == 'secretary') style='display:none'  @endif>
                                    <label for="">Bar Number</label>
                                    <input type="number" class="form-control" name="bar_number" id="bar_number" value="{{$attorneyassociate->bar_number??''}}" placeholder="Bar Number" disabled>
                                </div>
                                <div class="col-md-6 col-sm-12 form-group">
                                    <label for="">Address</label>
                                    <input type="text" class="form-control" name="address" id="address" value="{{$attorneyassociate->profile->address??''}}" placeholder="Address" disabled>
                                </div>
                                <div class="col-md-6 col-sm-12 form-group">
                                    <label for="">Contact No</label>
                                    <input type="number" class="form-control" name="contact" id="contact" value="{{$attorneyassociate->contact??''}}" placeholder="Contact No" disabled>
                                </div>
                                <div class="col-md-6 col-sm-12 form-group">
                                    <label for="">Email Address</label>
                                    <input type="email" class="form-control" name="email" id="email" value="{{$attorneyassociate->email??''}}" placeholder="Email Address" disabled>
                                </div>
                                <div class="col-md-6 col-sm-12 form-group">
                                    <label for="">Role</label>
                                    <select class="form-control role_id" name="role" id="role_title" disabled>
                                        @foreach($roles as $key => $role)
                                        <option value="{{$role->name}}" @if(isset($attorneyassociate) && $role->name== $attorneyassociate->roles->first()->name ) selected disabled @endif >{{ ucwords($role->name) }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-6 col-sm-12 form-group">
                                    <label for="">Date Of Birth</label>
                                    <input type="date" class="form-control" name="dob" id="dob" value="{{$attorneyassociate->profile->dob??''}}" placeholder="Date Of Birth" disabled>
                                </div>
                                <div class="col-md-6 col-sm-12 form-group file_input">
                                    <label for="">Resume</label>   
                                    @if(isset($attorneyassociate->resume) && $attorneyassociate->resume==null)
                                            <label class="file_input_lable" for="Resume" >
                                                <!-- <span>Resume</span>
                                                <a  class="btn btn_black btn_img">Upload Doc <img class="img-fluid " src="{{asset('website')}}/assets/images/upload.png" alt=""></a>
                                                    <input type="file" class="form-control-file" name="resume" value="{{$attorneyassociate->resume??''}}" id="Resume" disabled> -->
                                                <!-- <a class="btn doc_btn" type="button" href="{{asset('website')}}/{{$attorneyassociate->resume}}" target="_blank"> -->
                                                    <h2>No File</h2>
                                                <!-- </a> -->
                                            </label>
                                        </a>
                                    @else
                                        <a href="{{asset('website')}}/{{$attorneyassociate->resume}}" target="_blank">
                                            <label class="file_input_lable" for="Resume" >
                                                <!-- <span>Resume</span>
                                                <a  class="btn btn_black btn_img">Upload Doc <img class="img-fluid " src="{{asset('website')}}/assets/images/upload.png" alt=""></a>
                                                    <input type="file" class="form-control-file" name="resume" value="{{$attorneyassociate->resume??''}}" id="Resume" disabled> -->
                                                <!-- <a class="btn doc_btn" type="button" href="{{asset('website')}}/{{$attorneyassociate->resume}}" target="_blank"> -->
                                                    <img class="img-fluid" src="{{asset('website')}}/assets/images/doc-icon.png" alt="">
                                                <!-- </a> -->
                                            </label>
                                        </a>
                                    @endif
                                    
                                </div>
                                <div class="col-md-6 col-sm-12 form-group file_input hide_feild" @if(isset($attorneyassociate) && $attorneyassociate->roles->first()->name == 'secretary') style='display:none'  @endif>
                                    <label for="">Practicing Certificate</label>
                                    @if(isset($attorneyassociate->certificate) && $attorneyassociate->certificate==null)
                                            <label class="file_input_lable" for="certificate" >
                                                <!-- <span>certificate</span>
                                                <a  class="btn btn_black btn_img">Upload Doc <img class="img-fluid " src="{{asset('website')}}/assets/images/upload.png" alt=""></a>
                                                    <input type="file" class="form-control-file" name="certificate" value="{{$attorneyassociate->certificate??''}}" id="certificate" disabled> -->
                                                <!-- <a class="btn doc_btn" type="button" href="{{asset('website')}}/{{$attorneyassociate->certificate}}" target="_blank"> -->
                                                    <h2>No File</h2>
                                                <!-- </a> -->
                                            </label>
                                        </a>
                                    @else
                                        <a href="{{asset('website')}}/{{$attorneyassociate->certificate}}" target="_blank">
                                            <label class="file_input_lable" for="Certificate">
                                                    <!-- <span>Practicing Certificate</span>
                                                    <a  class="btn btn_black btn_img">Upload Doc <img class="img-fluid " src="{{asset('website')}}/assets/images/upload.png" alt=""></a>
                                                    <input type="file" class="form-control-file" name="certificate" value="{{$attorneyassociate->certificate??''}}" id="Certificate" disabled>  -->
                                                    <img class="img-fluid" src="{{asset('website')}}/assets/images/doc-icon.png" alt="">
                                            </label>
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 ">
                            <label for="">Profile</label>
                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                <div class="fileinput-new thumbnail">
                                    <img src="@if(isset($attorneyassociate->profile) && $attorneyassociate->profile->pic !=null ) {{ asset('storage/uploads/users/')}}/{{$attorneyassociate->profile->pic??'' }} @else {{ asset('storage/uploads/users/no_avatar.jpg') }} @endif" alt="profile pic">
                                </div>
                                <div class="fileinput-preview fileinput-exists thumbnail"></div>
                                <div>
                                    {{--<a href="#" class="btn btn-danger fileinput-exists" data-dismiss="fileinput">Remove</a>--}}
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 col-sm-12 form-group">
                            <label for="">Bio</label>
                            <textarea class="form-control" name="bio" id="bio" disabled  placeholder="Bio" rows="7">{{$attorneyassociate->profile->bio??''}}</textarea>
                        </div>
                        <div class="col-md-12 col-sm-12 ">
                            <h4>User Permission</h4>
                        </div>
                        <div id="permissions_detail_div" class="col-md-12 col-sm-12 ">
                            <div class="create_user_sec">
                                <div class="input-group">
                                    <ul class="icheck-list">
                                        <li class="one-input" style="display: none;">
                                            <div class="icheckbox_square ">
                                                <input type="checkbox" checked disabled class="check" name='' value="" id="square-checkbox" data-checkbox="icheckbox_square">
                                                <label for="square-checkbox"></label>
                                            </div>
                                            <label class="one" for="square-checkbox"></label>
                                        </li>
                                        <li class="two-input" style="display: none;">
                                            <div class="icheckbox_square ">
                                                <input type="checkbox" checked disabled class="check" name='' value="" id="square-checkbox" data-checkbox="icheckbox_square">
                                                <label for="square-checkbox"></label>
                                            </div>
                                            <label class="two" for="square-checkbox"></label>
                                        </li>
                                        <li class="three-input" style="display: none;">
                                            <div class="icheckbox_square ">
                                                <input type="checkbox" checked disabled class="check" name='' value="" id="square-checkbox" data-checkbox="icheckbox_square">
                                                <label for="square-checkbox"></label>
                                            </div>
                                            <label class="three" for="square-checkbox"></label>
                                        </li>
                                        <li class="four-input" style="display: none;">
                                            <div class="icheckbox_square ">
                                                <input type="checkbox" checked disabled class="check" name='' value="" id="square-checkbox" data-checkbox="icheckbox_square">
                                                <label for="square-checkbox"></label>
                                            </div>
                                            <label class="four" for="square-checkbox"></label>
                                        </li>
                                        {{--@foreach($permissions as $key=>$permission)--}}
                                        {{--<li>--}}
                                        {{--<div class="icheckbox_square ">--}}
                                        {{--<input type="checkbox" checked disabled class="check" name='premission_id[]' value="{{$permission->id ??''}}" id="square-checkbox-{{$key}}" data-checkbox="icheckbox_square">--}}
                                        {{--<label for="square-checkbox-{{$key}}"></label>--}}
                                        {{--</div>--}}
                                        {{--<label for="square-checkbox-{{$key}}">{{ucwords(str_replace('-',' ',$permission->name ??''))}}</label>--}}
                                        {{--</li>--}}
                                        {{--@endforeach--}}
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- <div class="col-md-6 col-sm-12 form-group">
                            <button type="submit" class="btn btn_black btn_block">Create</button>
                        </div> -->
                    </form>
                </div>
            </div>
        </div>
    </div>        
</section>   
@endsection
@push('js')
{{--    <script src="{{ asset('plugins/components/jasny-bootstrap/js/jasny-bootstrap.js') }}"></script>--}}
    {{--<script src="{{asset('plugins/components/icheck/icheck.min.js')}}"></script>--}}
    {{--<script src="{{asset('plugins/components/icheck/icheck.init.js')}}"></script>--}}
    <script >
        jQuery("input[type='file']").on("change", function(e){
            var fileName = e.target.files[0].name;
            console.log(fileName);
            jQuery(this).next().children(":first").text( fileName );
        });
        $(document).on('change','#role_title', function() {
            if($(this).val() == 'secretary'){
                $('.hide_feild').hide();
            }else{
                
                $('.hide_feild').show();
            }
        });
    </script>
    <script>
        $(document).ready(function(){
            $("#attorney_associate_form").validate({
                // Specify validation rules
                rules: {
                    name: "required",
                    bar_number: "required",
                    address: "required",
                    contact: "required",
                    email: "required",
                    dob: "required",
                    resume: "required",
                    certificate: "required",
                    pic: "required",
                    bio: "required",
                },
                messages: {
                    name: {
                        required: "Please enter Name",
                    },
                    bar_number: {
                        required: "Please enter Bar Number",
                    },
                    address: {
                        required: "Please enter Address",
                    },
                    contact: {
                        required: "Please enter Contact Number",
                    },
                    email: {
                        required: "Please enter Email Address",
                    },
                    dob: {
                        required: "Please enter Birth Date",
                    },
                    resume: {
                        required: "Please enter Resume",
                    },
                    certificate: {
                        required: "Please enter Certificate",
                    },
                    pic: {
                        required: "Please Put the Image",
                    },
                    bio: {
                        required: "Please enter Bio",
                    },
                },
            });
        });

        // $(document).ready('.role_id', function() {
        //     if($('option:selected',this).text() == 'attorney'){
        //         $('.one').html('Clients');
        //         $('.two').html('Case File');
        //         $('.three').html('Orignating Process');
        //         $('.four').html('Court Attendance Notes');
        //         $('.one-input').css("display", "block");
        //         $('.two-input').css("display", "block");
        //         $('.three-input').css("display", "block");
        //         $('.four-input').css("display", "block");
        //     }if($('option:selected',this).text() == 'associate'){
        //         $('.one').html('Clients');
        //         $('.two').html('Case File');
        //         $('.three').html('Orignating Process');
        //         $('.four').html('Court Attendance Notes');
        //         $('.one-input').css("display", "block");
        //         $('.two-input').css("display", "block");
        //         $('.three-input').css("display", "block");
        //         $('.four-input').css("display", "block");
        //     }if($('option:selected',this).text() == 'secretary'){
        //         $('.one').html('Clients');
        //         $('.two').html('Invoice');
        //         $('.three').html('Bill Of Cost');
        //         $('.four').html('Master File');
        //         $('.one-input').css("display", "block");
        //         $('.two-input').css("display", "block");
        //         $('.three-input').css("display", "block");
        //         $('.four-input').css("display", "block");
        //     }else {
        //
        //     }
        // });
    </script>
<script>
    $(document).ready(function() {
        $('.role_id').ready(function() {
            if($('option:selected',this).val() == 'attorney'){
                $('.one').html('Clients');
                $('.two').html('Case File');
                $('.three').html('Orignating Process');
                $('.four').html('Court Attendance Notes');
                $('.one-input').css("display", "block");
                $('.two-input').css("display", "block");
                $('.three-input').css("display", "block");
                $('.four-input').css("display", "block");
            } else if($('option:selected',this).val() == 'associate'){
                $('.one').html('Clients');
                $('.two').html('Case File');
                $('.three').html('Orignating Process');
                $('.four').html('Court Attendance Notes');
                $('.one-input').css("display", "block");
                $('.two-input').css("display", "block");
                $('.three-input').css("display", "block");
                $('.four-input').css("display", "block");
            } else if($('option:selected',this).val() == 'secretary'){
                $('.one').html('Clients');
                $('.two').html('Invoice');
                $('.three').html('Bill Of Cost');
                $('.four').html('Master File');
                $('.one-input').css("display", "block");
                $('.two-input').css("display", "block");
                $('.three-input').css("display", "block");
                $('.four-input').css("display", "block");
            } else {
                // Handle other cases if needed
            }
        });
    });
</script>
@endpush
