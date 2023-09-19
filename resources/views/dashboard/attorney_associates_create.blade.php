@extends('layouts.master')

@push('css')

@endpush

@section('content')
    <section class="">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-9">
                    <form class="form-horizontal row dashboard_form">
                        <div class="col-md-6 col-sm-12 form-group">
                            <input type="text" class="form-control" id=""  placeholder="Name" required>
                        </div>
                        <div class="col-md-6 col-sm-12 form-group">
                            <input type="email" class="form-control" id=""  placeholder="Email" required>
                        </div>
                        <div class="col-md-6 col-sm-12 form-group">
                            <input type="text" class="form-control" id=""  placeholder="Address" required>
                        </div>
                        <div class="col-md-6 col-sm-12 form-group">
                            <input type="number" class="form-control" id=""  placeholder="Contact No" required>
                        </div>
                        <div class="col-md-6 col-sm-12 form-group">
                            <input type="number" class="form-control" id=""  placeholder="BAR Number" required>
                        </div>
                        <div class="col-md-6 col-sm-12 form-group">
                            <input type="text" class="form-control" id=""  placeholder="Title" required>
                        </div>
                        <div class="col-md-6 col-sm-12 form-group">
                            <input type="text" class="form-control" id=""  placeholder="BIO" required>
                        </div>
                        <div class="col-md-6 col-sm-12 form-group">
                            <input type="text" class="form-control" id=""  placeholder="DOB" required>
                        </div>
                        <div class="col-md-6 col-sm-12 form-group file_input">
                            <input type="file" class="form-control-file" id="Resume">
                            <label for="Resume" ><span>Upload Resume</span><img class="img-fluid " src="{{asset('website')}}/assets/images/upload-icon.png" alt=""></label>
                        </div>
                        <div class="col-md-6 col-sm-12 form-group file_input">
                            <input type="file" class="form-control-file" id="Certificate">
                            <label for="Certificate" ><span>Practicing Certificate</span><img class="img-fluid " src="{{asset('website')}}/assets/images/upload-icon.png" alt=""></label>
                        </div>
                        <div class="col-md-6 col-sm-12 form-group">
                        <button type="submit" class="btn btn_black btn_block">Create</button>
                        </div>
                    </form>
                </div>
                <div class="col-md-3 d_none">

                </div>
            </div>
        </div>
    </section>
@endsection

@push('js')


@endpush