@extends('layouts.master')

@push('css')
    <link href="{{ asset('plugins/components/jasny-bootstrap/css/jasny-bootstrap.css') }}" rel="stylesheet">
    <link href="{{asset('plugins/components/icheck/skins/all.css')}}" rel="stylesheet">
@endpush

@section('content')
    <section class="create_user_sec">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <form class="form-horizontal row dashboard_form">
                        <div class="col-md-9">
                            <div class="row">
                        <div class="col-md-12 col-sm-12 ">
                            <h4>Create User</h4>
                        </div>
                        <div class="col-md-6 col-sm-12 form-group">
                            <input type="text" class="form-control" id=""  placeholder="Name" required>
                        </div>
                        <div class="col-md-6 col-sm-12 form-group">
                            <input type="number" class="form-control" id=""  placeholder="Bar Number" required>
                        </div>
                        <div class="col-md-6 col-sm-12 form-group">
                            <input type="text" class="form-control" id=""  placeholder="Address" required>
                        </div>
                        <div class="col-md-6 col-sm-12 form-group">
                            <input type="number" class="form-control" id=""  placeholder="Contact No" required>
                        </div>
                        <div class="col-md-6 col-sm-12 form-group">
                            <input type="email" class="form-control" id=""  placeholder="Email Address" required>
                        </div>
                        <div class="col-md-6 col-sm-12 form-group">
                            <select class="form-control ">
                                <option disabled selected hidden>Role/Title</option>
                                <option>One</option>
                                <option>Two</option>
                            </select>
                        </div>
                        <div class="col-md-6 col-sm-12 form-group">
                            <input type="date" class="form-control" id=""  placeholder="Date Of Birth" required>
                        </div>
                        <div class="col-md-6 col-sm-12 form-group file_input">
                            <input type="file" class="form-control-file" id="Resume">
                            <label for="Resume" >
                                <span>Practicing Certificate</span>
                                <a  class="btn btn_black btn_img">Upload Doc <img class="img-fluid " src="{{asset('website')}}/assets/images/upload.png" alt=""></a></label>
                        </div>
                        <div class="col-md-6 col-sm-12 form-group file_input">
                            <input type="file" class="form-control-file" id="Certificate">
                            <label for="Certificate" >
                                <span>Practicing Certificate</span>
                                <a  class="btn btn_black btn_img">Upload Doc <img class="img-fluid " src="{{asset('website')}}/assets/images/upload.png" alt=""></a></label>
                        </div>
                            </div>
                        </div>
                        <div class="col-md-3 ">
                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                <div class="fileinput-new thumbnail">
                                    <img src="{{asset('storage/uploads/users/no_avatar.jpg')}}" alt="profile pic">
                                </div>
                                <div class="fileinput-preview fileinput-exists thumbnail"></div>
                                <div>
                                    <span class=" btn-file btn btn_black btn_icon">
                                                    <span class="fileinput-new  ">Change Profile <i class="fa fa-image"></i></span>
                                                    <span class="fileinput-exists  ">Change Profile <i class="fa fa-image"></i></span>
                                                    <input id="pic" name="pic_file" type="file" class="form-control"/>
                                                </span>
                                    {{--<a href="#" class="btn btn-danger fileinput-exists" data-dismiss="fileinput">Remove</a>--}}
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 col-sm-12 form-group">
                            <textarea class="form-control" id=""  placeholder="Bio" rows="7"></textarea>
                        </div>
                        <div class="col-md-12 col-sm-12 ">
                            <h4>User Permission</h4>
                        </div>
                        <div class="col-md-12 col-sm-12 ">
                            <div class="input-group">
                                <ul class="icheck-list">
                                    <li>
                                        <input type="checkbox" class="check" id="square-checkbox-1" data-checkbox="icheckbox_square">
                                        <label for="square-checkbox-1">Customer</label>
                                    </li>
                                    <li>
                                        <input type="checkbox" class="check" id="square-checkbox-2" checked data-checkbox="icheckbox_square">
                                        <label for="square-checkbox-2">Cases</label>
                                    </li>
                                    <li>
                                        <input type="checkbox" class="check" id="square-checkbox-3" data-checkbox="icheckbox_square">
                                        <label for="square-checkbox-3">Accounts/Invoice</label>
                                    </li>
                                    <li>
                                        <input type="checkbox" class="check" id="square-checkbox-4" checked data-checkbox="icheckbox_square">
                                        <label for="square-checkbox-4">Accounts Setting</label>
                                    </li>
                                    <li>
                                        <input type="checkbox" class="check" id="square-checkbox-5" data-checkbox="icheckbox_square">
                                        <label for="square-checkbox-5">Invoice</label>
                                    </li>
                                    <li>
                                        <input type="checkbox" class="check" id="square-checkbox-6" checked data-checkbox="icheckbox_square">
                                        <label for="square-checkbox-6">State Payment</label>
                                    </li>
                                    <li>
                                        <input type="checkbox" class="check" id="square-checkbox-7" data-checkbox="icheckbox_square">
                                        <label for="square-checkbox-7">Orders</label>
                                    </li>
                                    <li>
                                        <input type="checkbox" class="check" id="square-checkbox-8" checked data-checkbox="icheckbox_square">
                                        <label for="square-checkbox-8">Bill Of Cost</label>
                                    </li>
                                    <li>
                                        <input type="checkbox" class="check" id="square-checkbox-9" data-checkbox="icheckbox_square">
                                        <label for="square-checkbox-9">Letter</label>
                                    </li>
                                    <li>
                                        <input type="checkbox" class="check" id="square-checkbox-10" checked data-checkbox="icheckbox_square">
                                        <label for="square-checkbox-10">Cheuques</label>
                                    </li>
                                    <li>
                                        <input type="checkbox" class="check" id="square-checkbox-11" data-checkbox="icheckbox_square">
                                        <label for="square-checkbox-11">Expenses</label>
                                    </li>
                                    <li>
                                        <input type="checkbox" class="check" id="square-checkbox-12" checked data-checkbox="icheckbox_square">
                                        <label for="square-checkbox-12">Library</label>
                                    </li>
                                    <li>
                                        <input type="checkbox" class="check" id="square-checkbox-13" data-checkbox="icheckbox_square">
                                        <label for="square-checkbox-13">Payment Way</label>
                                    </li>


                                </ul>

                            </div>
                        </div>

                        <div class="col-md-6 col-sm-12 form-group">
                            <button type="submit" class="btn btn_black btn_block">Create</button>
                        </div>
                    </form>

                </div>

            </div>
        </div>
    </section>
@endsection

@push('js')
    <script src="{{ asset('plugins/components/jasny-bootstrap/js/jasny-bootstrap.js') }}"></script>
    <script src="{{asset('plugins/components/icheck/icheck.min.js')}}"></script>
    <script src="{{asset('plugins/components/icheck/icheck.init.js')}}"></script>
    <script >
        jQuery("input[type='file']").on("change", function(e){
            var fileName = e.target.files[0].name;
            console.log(fileName);
            jQuery(this).next().children(":first").text( fileName );
        });
    </script>
@endpush