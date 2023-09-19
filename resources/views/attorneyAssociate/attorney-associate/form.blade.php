<div class="col-md-9">
    <div class="row">
        <div class="col-md-6 col-sm-12 form-group">
            <input type="text" class="form-control" name="name"  id="name" value="{{ $attorneyassociate->name??'' }}"  placeholder="Name">
            <input type="hidden" value="{{$attorneyassociate->id??''}}">
        </div>
        <!-- <div class="col-md-6 col-sm-12 form-group bar_attorney" @if(isset($attorneyassociate) && $attorneyassociate->roles->first()->name == 'secretary') style='display:none'  @endif> -->
        <div class="col-md-6 col-sm-12 form-group bar_attorney" style="">
            <input type="text" class="form-control" name="bar_number" id="bar_number" value="{{$attorneyassociate->bar_number??''}}" placeholder="Bar Number">
        </div>
        <div class="col-md-6 col-sm-12 form-group">
            <input type="text" class="form-control" name="address" id="address" value="{{$attorneyassociate->profile->address??''}}" placeholder="Address">
        </div>
        <div class="col-md-6 col-sm-12 form-group">
            <input type="text" class="form-control" name="contact" id="contact" value="{{$attorneyassociate->contact??''}}" placeholder="Contact No">
        </div>
        <div class="col-md-6 col-sm-12 form-group">
            <input type="email" class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}
                    " name="email" id="email" value="{{$attorneyassociate->email??''}}" placeholder="Email Address">
            <span style="color: red" id="email_exist_msg"></span>
            @if ($errors->has('email'))
                <span class="invalid-feedback">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
        </div>
        <div class="col-md-6 col-sm-12 form-group">
            @if(isset($attorneyassociate) && $attorneyassociate->roles != null)
                <select class="form-control role_id" name="role_id" disabled>
                    <option selected hidden>Role/Title</option>
                    @foreach($roles as $key => $role)
                        <option value="{{$role->name}}" @if(isset($attorneyassociate) && $role->name== $attorneyassociate->roles->first()->name )  selected @endif >{{ ucwords($role->name) }}</option>
                    @endforeach
                    <option value="custom_role">Other</option>
                </select>
            @else
                <select class="form-control role_id" name="role_id">
                    <option disabled selected hidden>Role/Title</option>
                    @foreach($roles as $key => $role)
                        <option value="{{$role->name}}" @if(isset($attorneyassociate) && $role->name== $attorneyassociate->roles->first()->name )  selected @endif >{{ ucwords($role->name) }}</option>
                    @endforeach
                    <option value="custom_role">Other</option>
                </select>
            @endif
        </div>
        <div class="col-md-6 col-sm-12 form-group">
            <input type="date" class="form-control" name="dob" id="dob" value="{{$attorneyassociate->profile->dob??''}}" placeholder="Date Of Birth">
        </div>
        <div class="col-md-6 col-sm-12 form-group file_input">
            <label class="file_input_lable" for="Resume" >
                @if(isset($attorneyassociate->resume) && $attorneyassociate->resume==null)
                    <h2>No File</h2>
                @else
                    @if(Route::current()->getName() == 'attorney-associate.edit')
                        <a href="{{asset('website')}}/{{$attorneyassociate->resume??''}}" target="_blank"><img class="img-fluid" src="{{asset('website')}}/assets/images/doc-icon.png">
                        </a>
                    @else
                        <span class="file_upload">Resume</span>
                    @endif
                @endif
                <a class="btn btn_black btn_img">
                    Upload Doc
                    <img class="img-fluid " src="{{asset('website')}}/assets/images/upload.png" alt="">
                </a>
            </label>
            <input type="file" class="form-control-file" name="resume" value="{{$attorneyassociate->resume??''}}" accept="application/pdf,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document" id="Resume">

        </div>
        <div class="col-md-6 col-sm-12 form-group file_input hide_feild" @if(isset($attorneyassociate) && $attorneyassociate->roles->first()->name == 'secretary') style='display:none'  @endif>
            <label class="file_input_lable" for="Certificate" >
                @if(isset($attorneyassociate->certificate) && $attorneyassociate->certificate==null)
                    <h2>No File</h2>
                @else
                    @if(Route::current()->getName() == 'attorney-associate.edit')
                        <a href="{{asset('website')}}/{{$attorneyassociate->certificate??''}}" target="_blank"><img class="img-fluid" src="{{asset('website')}}/assets/images/doc-icon.png">
                        </a>
                    @else
                        <span class="certified">Certificate</span>
                    @endif
                @endif

                <a class="btn btn_black btn_img">
                    Upload Doc
                    <img class="img-fluid " src="{{asset('website')}}/assets/images/upload.png" alt="">
                </a>
            </label>
            <input type="file" class="form-control-file" name="certificate"  accept="application/pdf,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document" value="{{$attorneyassociate->certificate??''}}" id="Certificate">

        </div>
        <div class="col-md-6 col-sm-12 form-group hide_feild">
            <!-- <input type="text" class="form-control" id=""  placeholder="Tags ( Trend )" required> -->
            <input type="text" value="" id="expertise" name="expertise" data-role="tagsinput" class="form-control" placeholder="Expertise" />
        </div>
    </div>
</div>
<div class="col-md-3 ">
    <div class="fileinput fileinput-new" data-provides="fileinput">
        <div class="fileinput-new thumbnail">
            <img src="@if(isset($attorneyassociate->profile) && $attorneyassociate->profile->pic !=null ) {{ asset('storage/uploads/users/')}}/{{$attorneyassociate->profile->pic??'' }} @else {{ asset('storage/uploads/users/no_avatar.jpg') }} @endif" alt="profile pic">
        </div>
        <div class="fileinput-preview fileinput-exists thumbnail"></div>
        <div>
            <span class=" btn-file btn btn_black btn_icon">
            <span class="fileinput-new  ">Change Profile <i class="fa fa-image"></i></span>
            <span class="fileinput-exists  ">Change Profile <i class="fa fa-image"></i></span>
            <input id="pic" name="pic" type="file" value="{{$attorneyassociate->profile->pic??''}}" class="form-control" accept="image/png, image/gif, image/jpeg"/>
            {{--<a href="#" class="btn btn-danger fileinput-exists" data-dismiss="fileinput">Remove</a>--}}

        </div>
    </div>
</div>
<div class="col-md-12 col-sm-12 form-group">
    <textarea class="form-control" name="bio" id="bio"  placeholder="Bio" rows="7">{{$attorneyassociate->profile->bio??''}}</textarea>
</div>
<div class="col-md-6 col-sm-12 form-group">
    <h3>E-Signature</h3>
    <canvas id="signature" class="signature" width="500" height="200"></canvas>
    <input type="hidden" class="signature_value" name="signature">
    <br>
    <br>
    <button type="button" class="clear-signature" id="">Clear</button>
</div>
{{--<div class="col-md-6 col-sm-12 form-group">--}}
    {{--<h3>Upload Signature</h3>--}}
    {{--<input type="file" onchange="readURL(this);" class="form-control" accept="image/png, image/gif, image/jpeg">--}}
    {{--<img style="margin-top: 30px;margin-left: 250px; width: 30%;" src="{{$attorneyassociate->signature??''}}" class="picture" alt="">--}}
{{--</div>--}}
<div class="col-md-6 col-sm-12 form-group file_input" @if(isset($attorneyassociate) && $attorneyassociate->roles->first()->name == 'secretary') style='display:none'  @endif>
    <label class="file_input_lable" for="Signature" >
        <a class="btn btn_black btn_img">
            Upload Signature
            <img class="img-fluid " src="{{asset('website')}}/assets/images/upload.png" alt="">
        </a>
    </label>
    <input type="file" onchange="readURL(this);" id="Signature" class="form-control SignatureInput" accept="image/png, image/gif, image/jpeg">
    @if(isset($attorneyassociate->signature) ==null)
        <img style="margin-top: 30px;margin-left: 250px; width: 30%;" src="{{$attorneyassociate->signature??''}}" class="picture" alt="">
    @endif
    <button type="button" class="btn  btn-warning" style="position: absolute" id="clear-signature-file">Clear</button>
</div>
@if(isset($attorneyassociate->signature) !=null)
    <div class="col-md-6">
        <h3>Existing Signature</h3>
        <img src="{{$attorneyassociate->signature}}" class="signature" width="500" height="200" alt="">
    </div>
@else
@endif
<div class="col-md-12 col-sm-12 ">
    <h4>User Permission</h4>
</div>
<div id="permissions_detail_div" class="col-md-12 col-sm-12 ">
</div>
<div  id="roles_div" class="col-md-12 col-sm-12 ">
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
                <li class="five-input" style="display: none;">
                    <div class="icheckbox_square ">
                        <input type="checkbox" checked disabled class="check" name='' value="" id="square-checkbox" data-checkbox="icheckbox_square">
                        <label for="square-checkbox"></label>
                    </div>
                    <label class="five" for="square-checkbox"></label>
                </li>
                {{-- @foreach($permissions as $key=>$permission)
                <li>
                <div class="icheckbox_square ">
                <input type="checkbox" checked disabled class="check" name='premission_id[]' value="{{$permission->id ??''}}" id="square-checkbox-{{$key}}" data-checkbox="icheckbox_square">
                <label for="square-checkbox-{{$key}}"></label>
                </div>
                <label for="square-checkbox-{{$key}}">{{ucwords(str_replace('-',' ',$permission->name ??''))}}</label>
                </li>
                @endforeach --}}
            </ul>
        </div>
    </div>
</div>
<div class="col-md-6 col-sm-12 form-group">
    <input class="btn btn_black btn_block" id="sumbit" type="submit" value="{{ $submitButtonText??'Create' }}">
</div>
@push('js')
    <script src="{{ asset('plugins/components/jasny-bootstrap/js/jasny-bootstrap.js') }}"></script>
    {{--<script src="{{asset('plugins/components/icheck/icheck.min.js')}}"></script>--}}
    {{--<script src="{{asset('plugins/components/icheck/icheck.init.js')}}"></script>--}}
    <script >
        jQuery("input[type='file']").on("change", function(e){
            var fileName = e.target.files[0].name;
            console.log(fileName);
            jQuery(this).next().children(":first").text( fileName );
        });
       
    </script>
    <script>
        // $(document).on('change','.role_id',function (e) {
        //     e.preventDefault();
        //     var role = $(this).val();
        //     if($(this).val() == 'secretary'){
        //         $('.hide_feild').hide();
        //     }else{
        //         $('.hide_feild').show();
        //     }//
        //     if($(this).val() == 'attorney'){
        //         $('#permissions_detail_div').html(' ');
        //         $('#permissions_detail_div').hide();
        //         $('#roles_div').show();
        //         $('.two').html('Case File');
        //         $('.three').html('Document Center');
        //         $('.four').html('Court Attendance Notes');
        //         $('.two-input').css("display", "block");
        //         $('.three-input').css("display", "block");
        //         $('.four-input').css("display", "block");
        //     }else if($(this).val() == 'intern'){
        //         $('#permissions_detail_div').html(' ');
        //         $('#permissions_detail_div').hide();
        //         $('#roles_div').show();
        //         $('.one').html('Clients');
        //         $('.two').html('Case File');
        //         $('.three').html('Document Center');
        //         $('.four').html('Court Attendance Notes');
        //         $('.one-input').css("display", "block");
        //         $('.two-input').css("display", "block");
        //         $('.three-input').css("display", "block");
        //         $('.four-input').css("display", "block");
        //     }else if($(this).val() == 'Senior Counsel'){
        //         $('#permissions_detail_div').html(' ');
        //         $('#permissions_detail_div').hide();
        //         $('#roles_div').show();
        //         $('.five').html('Case Management');
        //         $('.five-input').css("display", "block");
        //     }else if($(this).val() == 'King Counsel'){
        //         $('#permissions_detail_div').html(' ');
        //         $('#permissions_detail_div').hide();
        //         $('#roles_div').show();
        //         $('.five').html('Case Management');
        //         $('.five-input').css("display", "block");
        //     }else if($(this).val() == 'Chambers Manager'){
        //         $('#permissions_detail_div').html(' ');
        //         $('#permissions_detail_div').hide();
        //         $('#roles_div').show();
        //         $('.five').html('Case Management');
        //         $('.five-input').css("display", "block");
        //     }else if($(this).val() == 'Junior Counsel'){
        //         $('#permissions_detail_div').html(' ');
        //         $('#permissions_detail_div').hide();
        //         $('#roles_div').show();
        //         $('.five').html('Case Management');
        //         $('.five-input').css("display", "block");
        //     }else if($(this).val() == 'Paralegal'){
        //         $('#permissions_detail_div').html(' ');
        //         $('#permissions_detail_div').hide();
        //         $('#roles_div').show();
        //         $('.five').html('Case Management');
        //         $('.five-input').css("display", "block");
        //     }else if($(this).val() == 'associate'){
        //         $('#permissions_detail_div').html(' ');
        //         $('#permissions_detail_div').hide();
        //         $('#roles_div').show();
        //         $('.one').html('Clients');
        //         $('.two').html('Case File');
        //         $('.three').html('Document Center');
        //         $('.four').html('Court Attendance Notes');
        //         $('.one-input').css("display", "block");
        //         $('.two-input').css("display", "block");
        //         $('.three-input').css("display", "block");
        //         $('.four-input').css("display", "block");
        //     }else if($(this).val() == 'secretary'){
        //         $('#permissions_detail_div').html(' ');
        //         $('#permissions_detail_div').hide();
        //         $('#roles_div').show();
        //         $('.one').html('Clients');
        //         $('.two').html('Invoice');
        //         $('.three').html('Bill Of Cost');
        //         $('.one-input').css("display", "block");
        //         $('.two-input').css("display", "block");
        //         $('.three-input').css("display", "block");
        //     }else {
        //         $('#roles_div').hide();
        //         $('#permissions_detail_div').show();
        //         $('#permissions_detail_div').html(' ');
        //         $.ajax({
        //             type: "GET",
        //             url: "{{url('get_role_details_attorney')}}/" + role,


        //         success: function (data) {
        //                 $('#permissions_detail_div').html(data)
        //                 console.log(data);
        //             },
        //             error: function (e) {
        //                 console.log(e.status);
        //             }
        //         })
        //     }
        // });
        $(document).on('change','.role_id',function (e) {
            e.preventDefault();
            var role = $(this).val();
            if($(this).val() == 'secretary'){
                $('.hide_feild').hide();
            }else{
                $('.hide_feild').show();
            }//
            if($(this).val() == 'associate'){
                $('.bar_attorney').show();
            }else if($(this).val() == 'attorney'){
                $('.bar_attorney').show();
            }else{
                $('.bar_attorney').hide();
            }
            if($(this).val() == 'attorney'){
                $('#permissions_detail_div').html(' ');
                $('#permissions_detail_div').hide();
                $('#roles_div').show();
                $('.two').html('Case File');
                $('.three').html('Document Center');
                $('.four').html('Court Attendance Notes');
                $('.two-input').css("display", "block");
                $('.three-input').css("display", "block");
                $('.four-input').css("display", "block");
            }else if($(this).val() == 'intern'){
                $('#permissions_detail_div').html(' ');
                $('#permissions_detail_div').hide();
                $('#roles_div').show();
                $('.one').html('Clients');
                $('.two').html('Case File');
                $('.three').html('Document Center');
                $('.four').html('Court Attendance Notes');
                $('.one-input').css("display", "block");
                $('.two-input').css("display", "block");
                $('.three-input').css("display", "block");
                $('.four-input').css("display", "block");
            }else if($(this).val() == 'Chambers Manager'){
                $('#permissions_detail_div').html(' ');
                $('#permissions_detail_div').hide();
                $('#roles_div').show();
                $('.five').html('Case Management');
                $('.five-input').css("display", "block");
            }else if($(this).val() == 'associate'){
                $('#permissions_detail_div').html(' ');
                $('#permissions_detail_div').hide();
                $('#roles_div').show();
                $('.one').html('Clients');
                $('.two').html('Case File');
                $('.three').html('Document Center');
                $('.four').html('Court Attendance Notes');
                $('.one-input').css("display", "block");
                $('.two-input').css("display", "block");
                $('.three-input').css("display", "block");
                $('.four-input').css("display", "block");
            }else if($(this).val() == 'secretary'){
                $('#permissions_detail_div').html(' ');
                $('#permissions_detail_div').hide();
                $('#roles_div').show();
                $('.one').html('Clients');
                $('.two').html('Invoice');
                $('.three').html('Bill Of Cost');
                $('.one-input').css("display", "block");
                $('.two-input').css("display", "block");
                $('.three-input').css("display", "block");
            }else {
                $('#roles_div').hide();
                $('#permissions_detail_div').show();
                $('#permissions_detail_div').html(' ');
                $.ajax({
                    type: "GET",
                    url: "{{url('get_role_details_attorney')}}/" + role,


                success: function (data) {
                        $('#permissions_detail_div').html(data)
                        console.log(data);
                    },
                    error: function (e) {
                        console.log(e.status);
                    }
                })
            }
        });
        $(document).ready(function () {

            $(document).on('click','.form-check-input',function(){
                checked = $("input[type=checkbox]:checked").length;
                console.log(checked)
                if(checked==0) {
                    $('.form-check-input').prop('required',true);
                }else{
                    $('.form-check-input').prop('required',false);
                }

            });
        });
    </script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/signature_pad/1.5.3/signature_pad.min.js"></script>
    <script>
        var  e_signature=true;
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('.picture').attr('src',e.target.result);
                    $('.signature_value').val(e.target.result);
                    e_signature=false;
                    $('.picture').show();
                }

                reader.readAsDataURL(input.files[0]);
            }
        }
        jQuery(document).ready(function($){
            var canvas = document.getElementById("signature");
            var signaturePad = new SignaturePad(canvas);

            $('.clear-signature').on('click', function(){
                signaturePad.clear();
            });
            $('#sumbit').on('click', function(e){
                var canvasData = $('#signature').get(0).toDataURL('image/png');
                console.log(canvasData);
                if(e_signature==true){
                    $('.signature_value').val(canvasData);
                }
            });
            $('#clear-signature-file').click(function(){
                $('.SignatureInput').val('');
                $('.picture').attr('src','');
                $('.picture').hide();
            });
        });
        $(document).ready(function() {
            $('#Resume').on('change', function() {
                var filePath = $(this).val();
                var fileName = filePath.replace(/^.*[\\\/]/, '');
                $('.file_upload').html(fileName);
            });
        });
        $(document).ready(function() {
            $('#Certificate').on('change', function() {
                var filePath = $(this).val();
                var fileName = filePath.replace(/^.*[\\\/]/, '');
                $('.certified').html(fileName);
                console.log(fileName);
            });
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

        $("#email").on('keyup paste',function(){
        var email = $(this).val();
        $.ajax({
            url                             : "{{ route('check_email') }}",
            method                          : "POST",
            data                            : {
                '_token': '{{ csrf_token() }}',
                email          :email,
            },
            success: function( data ) {
                console.log(data);
                if(data=='yes'){
                    $('#email_exist_msg').text("This email is already registered");
                    $('input[type="submit"]').attr('disabled','disabled');
                }else{
                    $('#email_exist_msg').text("");
                    $('input[type="submit"]').removeAttr('disabled','disabled');
                }
            },

        });
    });


    </script>
@endpush