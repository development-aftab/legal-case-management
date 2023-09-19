<?php $__env->startPush('css'); ?>
<link href="https://cdn.jsdelivr.net/npm/@fullcalendar/core@4.2.0/main.min.css" rel="stylesheet"/>
    <style>
        .info-box .info-count {
            margin-top: 0px !important;
        }
        .highlight {
            background-color: #fff;
        }
        .dim {
            background-color: #dcdcdc;
        }
    </style>
    <link href="<?php echo e(asset('plugins/components/custom-select/custom-select.css')); ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo e(asset('plugins/components/bootstrap-select/bootstrap-select.min.css')); ?>" rel="stylesheet" />


<link href="<?php echo e(asset('plugins/components/bootstrap-daterangepicker/daterangepicker.css')); ?>" rel="stylesheet">


<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <?php $active_cases =  App\User::join('case_files', 'case_files.client_id', '=', 'users.id')
        ->where('attorney_associate_id', Auth::id())->where('case_files.status','=',1)->count();
          $complete_cases =  App\User::join('case_files', 'case_files.client_id', '=', 'users.id')
              ->where('attorney_associate_id', Auth::id())->where('case_files.status','=',0)->count();
    $assigned = App\AssignedAttorney::where('new_attorney_id',Auth::id())->first();
    if(isset($assigned->old_attorney_id ) && $assigned->old_attorney_id!=null){$attorney_id = $assigned->old_attorney_id; }else{ $attorney_id = [];}
    $numberofclients =  App\User::where('attorney_associate_id', Auth::id())->orWhere('attorney_associate_id', $attorney_id)->count();
    ?>
    <?php if(auth()->user()->hasRole('admin')): ?>
        <div class="container-fluid">
            <div class="row ">
                <div class="col-md-12">

                    <div class="custom_filter ">
                        <button class="btn custom_filter_btn btn_black" type="button" id="custom_filter_btn" >
                            Filter <i class="fa fa-filter"></i>
                        </button>
                        <div class="custom_filter_box" >
                            <form action="">
                                <div class="form-group">
                                    <input class="form-control input-daterange-datepicker" type="text" name="daterange" value="" placeholder="Start Date - End Date">
                                </div>
                                <div class="form-group">
                                    <select class="form-control">
                                        <option selected="" disabled="" hidden="">Currency</option>
                                        <option>one</option>
                                        <option>two</option>
                                        <option>three</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <select class="form-control">
                                        <option selected="" disabled="" hidden="">Payment Type</option>
                                        <option>one</option>
                                        <option>two</option>
                                        <option>three</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <input class="btn btn_black" type="submit" value="Apply">
                                    <button class="btn btn_black close-btn" type="button">Close</button>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
                <div class="col-md-3 col-sm-6 ">
                    <div class="info-box">
                        <div class="media">
                            <div class="media-left">
                <span class="icoleaf bg-primary text-white"><i
                            class="mdi mdi-checkbox-marked-circle-outline"></i></span>
                            </div>
                            <div class="media-body">
                                <h3 class="info-count text-blue">154</h3>
                                <p class="info-text font-12">Bookings</p>
                                <span class="hr-line"></span>
                                <p class="info-ot font-15">Target<span
                                            class="label label-rounded label-success">300</span></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 ">
                    <div class="info-box">
                        <div class="media">
                            <div class="media-left">
                                <span class="icoleaf bg-primary text-white"><i class="mdi mdi-comment-text-outline"></i></span>
                            </div>
                            <div class="media-body">
                                <h3 class="info-count text-blue">68</h3>
                                <p class="info-text font-12">Complaints</p>
                                <span class="hr-line"></span>
                                <p class="info-ot font-15">Total Pending<span class="label label-rounded label-danger">154</span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 ">
                    <div class="info-box">
                        <div class="media">
                            <div class="media-left">
                                <span class="icoleaf bg-primary text-white"><i class="mdi mdi-coin"></i></span>
                            </div>
                            <div class="media-body">
                                <h3 class="info-count text-blue">&#36;9475</h3>
                                <p class="info-text font-12">Earning</p>
                                <span class="hr-line"></span>
                                <p class="info-ot font-15">March : <span
                                            class="text-blue font-semibold">&#36;514578</span></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 ">
                    <div class="info-box">
                        <div class="media">
                            <div class="media-left p-r-5">
                                <div id="earning" class="e" data-percent="60">
                                    <div id="pending" class="p" data-percent="55"></div>
                                    <div id="booking" class="b" data-percent="50"></div>
                                </div>
                            </div>
                            <div class="media-body">
                                <h2 class="text-blue font-22 m-t-0">Report</h2>
                                <ul class="p-0 m-b-20">
                                    <li><i class="fa fa-circle m-r-5 text-primary"></i>60% Earnings</li>
                                    <li><i class="fa fa-circle m-r-5 text-primary"></i>55% Pending</li>
                                    <li><i class="fa fa-circle m-r-5 text-info"></i>50% Bookings</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8 col-sm-12">
                    <div class="white-box stat-widget">
                        <div class="row">
                            <div class="col-md-3 col-sm-3">
                                <h4 class="box-title">Statistics</h4>
                            </div>
                            <div class="col-md-9 col-sm-9">
                                <select class="custom-select">
                                    <option selected value="0">Feb 04 - Mar 03</option>
                                    <option value="1">Mar 04 - Apr 03</option>
                                    <option value="2">Apr 04 - May 03</option>
                                    <option value="3">May 04 - Jun 03</option>
                                </select>
                                <ul class="list-inline">
                                    <li>
                                        <h6 class="font-15"><i class="fa fa-circle m-r-5 text-success"></i>New Sales
                                        </h6>
                                    </li>
                                    <li>
                                        <h6 class="font-15"><i class="fa fa-circle m-r-5 text-primary"></i>Existing
                                            Sales</h6>
                                    </li>
                                </ul>
                            </div>
                            <div class="stat chart-pos"></div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-12">
                    <div class="white-box">
                        <h4 class="box-title">Task Progress</h4>
                        <div class="task-widget t-a-c">
                            <div class="task-chart" id="sparklinedashdb"></div>
                            <div class="task-content font-16 t-a-c">
                                <div class="col-sm-6 b-r">
                                    Urgent Tasks
                                    <h1 class="text-primary">05 <span class="font-16 text-muted">Tasks</span></h1>
                                </div>
                                <div class="col-sm-6">
                                    Normal Tasks
                                    <h1 class="text-primary">03 <span class="font-16 text-muted">Tasks</span></h1>
                                </div>
                            </div>
                            <div class="task-assign font-16">
                                Assigned To
                                <ul class="list-inline">
                                    <li class="p-l-0">
                                        <img src="<?php echo e(asset('plugins/images/users/1.png')); ?>" alt="user"
                                             data-toggle="tooltip"
                                             data-placement="top" title="" data-original-title="Steave">
                                    </li>
                                    <li>
                                        <img src="<?php echo e(asset('plugins/images/users/2.png')); ?>" alt="user"
                                             data-toggle="tooltip"
                                             data-placement="top" title="" data-original-title="Steave">
                                    </li>
                                    <li>
                                        <img src="<?php echo e(asset('plugins/images/users/3.png')); ?>" alt="user"
                                             data-toggle="tooltip"
                                             data-placement="top" title="" data-original-title="Steave">
                                    </li>
                                    <li class="p-r-0">
                                        <a href="javascript:void(0);" class="btn btn-success font-16">3+</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 col-sm-12">
                    <div class="white-box bg-primary color-box">
                        <h1 class="text-white font-light">&#36;6547 <span class="font-14">Revenue</span></h1>
                        <div class="ct-revenue chart-pos"></div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6">
                    <div class="white-box bg-success color-box">
                        <h1 class="text-white font-light m-b-0">5247</h1>
                        <span class="hr-line"></span>
                        <p class="cb-text">current visits</p>
                        <h6 class="text-white font-semibold">+25% <span class="font-light">Last Week</span></h6>
                        <div class="chart">
                            <div class="ct-visit chart-pos"></div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6">
                    <div class="white-box bg-danger color-box">
                        <h1 class="text-white font-light m-b-0">25%</h1>
                        <span class="hr-line"></span>
                        <p class="cb-text">Finished Tasks</p>
                        <h6 class="text-white font-semibold">+15% <span class="font-light">Last Week</span></h6>
                        <div class="chart">
                            <input class="knob" data-min="0" data-max="100" data-bgColor="#f86b4a"
                                   data-fgColor="#ffffff"
                                   data-displayInput=false data-width="96" data-height="96" data-thickness=".1"
                                   value="25"
                                   readonly>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="white-box user-table">
                        <div class="row">
                            <div class="col-sm-6">
                                <h4 class="box-title">Table Format/User Data</h4>
                            </div>
                            <div class="col-sm-6">
                                <ul class="list-inline">
                                    <li>
                                        <a href="javascript:void(0);" class="btn btn-default btn-outline font-16"><i
                                                    class="fa fa-trash" aria-hidden="true"></i></a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);" class="btn btn-default btn-outline font-16"><i
                                                    class="fa fa-commenting" aria-hidden="true"></i></a>
                                    </li>
                                </ul>
                                <select class="custom-select">
                                    <option selected>Sort by</option>
                                    <option value="1">Name</option>
                                    <option value="2">Location</option>
                                    <option value="3">Type</option>
                                    <option value="4">Role</option>
                                    <option value="5">Action</option>
                                </select>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>
                                        <div class="checkbox checkbox-info">
                                            <input id="c1" type="checkbox">
                                            <label for="c1"></label>
                                        </div>
                                    </th>
                                    <th>Name</th>
                                    <th>Location</th>
                                    <th>Type</th>
                                    <th>Role</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>
                                        <div class="checkbox checkbox-info">
                                            <input id="c2" type="checkbox">
                                            <label for="c2"></label>
                                        </div>
                                    </td>
                                    <td><a href="javascript:void(0);" class="text-link">Daniel Kristeen</a></td>
                                    <td>Texas, US</td>
                                    <td>Posts 564</td>
                                    <td><span class="label label-success">Admin</span></td>
                                    <td>
                                        <select class="custom-select">
                                            <option value="1">Modulator</option>
                                            <option value="2">Admin</option>
                                            <option value="3">Staff</option>
                                            <option value="4">User</option>
                                            <option value="5">General</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="checkbox checkbox-info">
                                            <input id="c3" type="checkbox">
                                            <label for="c3"></label>
                                        </div>
                                    </td>
                                    <td><a href="javascript:void(0);" class="text-link">Hanna Gover</a></td>
                                    <td>Los Angeles, US</td>
                                    <td>Posts 451</td>
                                    <td><span class="label label-info">Staff</span></td>
                                    <td>
                                        <select class="custom-select">
                                            <option value="1">Modulator</option>
                                            <option value="2">Admin</option>
                                            <option value="3">Staff</option>
                                            <option value="4">User</option>
                                            <option value="5">General</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="checkbox checkbox-info">
                                            <input id="c4" type="checkbox">
                                            <label for="c4"></label>
                                        </div>
                                    </td>
                                    <td><a href="javascript:void(0);" class="text-link">Jeffery Brown</a></td>
                                    <td>Houston, US</td>
                                    <td>Posts 978</td>
                                    <td><span class="label label-danger">User</span></td>
                                    <td>
                                        <select class="custom-select">
                                            <option value="1">Modulator</option>
                                            <option value="2">Admin</option>
                                            <option value="3">Staff</option>
                                            <option value="4">User</option>
                                            <option value="5">General</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="checkbox checkbox-info">
                                            <input id="c5" type="checkbox">
                                            <label for="c5"></label>
                                        </div>
                                    </td>
                                    <td><a href="javascript:void(0);" class="text-link">Elliot Dugteren</a></td>
                                    <td>San Antonio, US</td>
                                    <td>Posts 34</td>
                                    <td><span class="label label-warning">General</span></td>
                                    <td>
                                        <select class="custom-select">
                                            <option value="1">Modulator</option>
                                            <option value="2">Admin</option>
                                            <option value="3">Staff</option>
                                            <option value="4">User</option>
                                            <option value="5">General</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="checkbox checkbox-info">
                                            <input id="c6" type="checkbox">
                                            <label for="c6"></label>
                                        </div>
                                    </td>
                                    <td><a href="javascript:void(0);" class="text-link">Sergio Milardovich</a></td>
                                    <td>Jacksonville, US</td>
                                    <td>Posts 31</td>
                                    <td><span class="label label-primary">Partial</span></td>
                                    <td>
                                        <select class="custom-select">
                                            <option value="1">Modulator</option>
                                            <option value="2">Admin</option>
                                            <option value="3">Staff</option>
                                            <option value="4">User</option>
                                            <option value="5">General</option>
                                        </select>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <ul class="pagination">
                            <li class="disabled"><a href="#">1</a></li>
                            <li class="active"><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><a href="#">4</a></li>
                            <li><a href="#">5</a></li>
                        </ul>
                        <a href="javascript:void(0);" class="btn btn-success pull-right m-t-10 font-20">+</a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-8">
                    <div class="white-box">
                        <div class="task-widget2">
                            <div class="task-image">
                                <img src="<?php echo e(asset('plugins/images/task.jpg')); ?>" alt="task" class="img-responsive">
                                <div class="task-image-overlay"></div>
                                <div class="task-detail">
                                    <h2 class="font-light text-white m-b-0">07 April</h2>
                                    <h4 class="font-normal text-white m-t-5">Your tasks for today</h4>
                                </div>
                                <div class="task-add-btn">
                                    <a href="javascript:void(0);" class="btn btn-success">+</a>
                                </div>
                            </div>
                            <div class="task-total">
                                <p class="font-16 m-b-0"><strong>5</strong> Tasks for <a href="javascript:void(0);"
                                                                                         class="text-link">Jon Doe</a>
                                </p>
                            </div>
                            <div class="task-list">
                                <ul class="list-group">
                                    <li class="list-group-item bl-info">
                                        <div class="checkbox checkbox-success">
                                            <input id="c7" type="checkbox">
                                            <label for="c7">
                                        <span class="font-16">Create invoice for customers and email each
                                            customers.</span>
                                            </label>
                                            <h6 class="p-l-30 font-bold">05:00 PM</h6>
                                        </div>
                                    </li>
                                    <li class="list-group-item bl-warning">
                                        <div class="checkbox checkbox-success">
                                            <input id="c8" type="checkbox" checked>
                                            <label for="c8">
                                        <span class="font-16">Send payment of <strong>&#36;500 invoised</strong> on 23
                                            May to <a href="javascript:void(0);" class="text-link">Daniel Kristeen</a>
                                            via paypal.</span>
                                            </label>
                                            <h6 class="p-l-30 font-bold">03:00 PM</h6>
                                        </div>
                                    </li>
                                    <li class="list-group-item bl-danger">
                                        <div class="checkbox checkbox-success">
                                            <input id="c9" type="checkbox">
                                            <label for="c9">
                                        <span class="font-16">It is a long established fact that a reader will be
                                            distracted by the readable.</span>
                                            </label>
                                            <h6 class="p-l-30 font-bold">04:45 PM</h6>
                                        </div>
                                    </li>
                                    <li class="list-group-item bl-success">
                                        <div class="checkbox checkbox-success">
                                            <input id="c10" type="checkbox">
                                            <label for="c10">
                                        <span class="font-16">It is a long established fact that a reader will be
                                            distracted by the readable.</span>
                                            </label>
                                            <h6 class="p-l-30 font-bold">05:30 PM</h6>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <div class="task-loadmore">
                                <a href="javascript:void(0);" class="btn btn-default btn-outline btn-rounded">Load
                                    More</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="white-box chat-widget">
                        <a href="javascript:void(0);" class="pull-right"><i class="icon-settings"></i></a>
                        <h4 class="box-title">Chat</h4>
                        <ul class="chat-list slimscroll" style="overflow: hidden;" tabindex="5005">
                            <li>
                                <div class="chat-image"><img alt="male"
                                                             src="<?php echo e(asset('plugins/images/users/hanna.jpg')); ?>"></div>
                                <div class="chat-body">
                                    <div class="chat-text">
                                        <p><span class="font-semibold">Hanna Gover</span> Hey Daniel, This is just a
                                            sample chat. </p>
                                    </div>
                                    <span>2 Min ago</span>
                                </div>
                            </li>
                            <li class="odd">
                                <div class="chat-body">
                                    <div class="chat-text">
                                        <p> buddy </p>
                                    </div>
                                    <span>2 Min ago</span>
                                </div>
                            </li>
                            <li>
                                <div class="chat-image"><img alt="male"
                                                             src="<?php echo e(asset('plugins/images/users/hanna.jpg')); ?>"></div>
                                <div class="chat-body">
                                    <div class="chat-text">
                                        <p><span class="font-semibold">Hanna Gover</span> Bye now. </p>
                                    </div>
                                    <span>1 Min ago</span>
                                </div>
                            </li>
                            <li class="odd">
                                <div class="chat-body">
                                    <div class="chat-text">
                                        <p> We have been busy all the day to make your website proposal and finally came
                                            with the super excited offer. </p>
                                    </div>
                                    <span>5 Sec ago</span>
                                </div>
                            </li>
                        </ul>
                        <div class="chat-send">
                            <input type="text" class="form-control" placeholder="Write your message">
                            <i class="fa fa-camera"></i>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ===== Right-Sidebar ===== -->
        
        <!-- ===== Right-Sidebar-End ===== -->
        </div>
    <?php elseif(auth()->user()->hasRole('user')): ?>
        <section class="dash_main_sec_one">
            <div class="container-fluid">
                <div class="row colorbox-group-widget">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="inner_section_dashboard_swiper">
                            <!-- Swiper -->
                            <div class="swiper dashboard_swiper">
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide">
                                        <div class="inner_section_swiper_slide">
                                            <div class="white-box box_shadow">
                                                <div class="media">
                                                    <div class="media-body">
                                                        <a href="http://lcm.thebackendprojects.com/filter/attorney">
                                                            <h3 class="info-count text-left"><?php echo e($allAttorney); ?> <span class="pull-right"><?php echo e($activeAttorney); ?></span>
                                                            </h3>
                                                            <p class="info-text text-left">Attorney</p>
                                                        </a>
                                                        <!-- <p class="info-ot font-15">Target<span class="label label-rounded">198</span></p> -->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="inner_section_swiper_slide">
                                            <div class="white-box box_shadow">
                                                <div class="media">
                                                    <div class="media-body">
                                                        <a href="http://lcm.thebackendprojects.com/filter/associate">
                                                            <h3 class="info-count text-left"><?php echo e($allAssociate); ?> <span class="pull-right"><?php echo e($activeAssociate); ?></span>
                                                            </h3>
                                                            <p class="info-text text-left">Associates</p>
                                                        </a>
                                                        <!-- <p class="info-ot font-15">Target<span class="label label-rounded">198</span></p> -->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="inner_section_swiper_slide">
                                            <div class="white-box box_shadow">
                                                <div class="media">
                                                    <div class="media-body">
                                                        <a href="http://lcm.thebackendprojects.com/client/client">
                                                            <h3 class="info-count text-left"><?php echo e($allClient); ?> <span class="pull-right"><?php echo e($activeClient); ?></span>
                                                            </h3>
                                                            <p class="info-text text-left">Clients</p>
                                                        </a>
                                                        <!-- <p class="info-ot font-15">Target<span class="label label-rounded">198</span></p> -->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="inner_section_swiper_slide">
                                            <div class="white-box box_shadow">
                                                <div class="media">
                                                    <div class="media-body">
                                                        <a href="http://lcm.thebackendprojects.com/case_management">
                                                            <h3 class="info-count text-left"><?php echo  App\CaseFile::where('status', 0)->count(); ?> <span class="pull-right"><?php echo  App\CaseFile::where('status', 0)->count(); ?></span>
                                                            </h3>
                                                            <p class="info-text text-left">Completed Cases</p>
                                                        </a>
                                                        <!-- <p class="info-ot font-15">Target<span class="label label-rounded">198</span></p> -->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="inner_section_swiper_slide">
                                            <div class="white-box box_shadow">
                                                <div class="media">
                                                    <div class="media-body">
                                                        <h3 class="info-count text-left"><?php echo  App\CaseInvoice::count(); ?> <span class="pull-right"><?php echo  App\CaseInvoice::count(); ?></span>
                                                        </h3>
                                                        <p class="info-text text-left">Total Invoice Amount</p>
                                                        <!-- <p class="info-ot font-15">Target<span class="label label-rounded">198</span></p> -->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- <div class="swiper-button-next"></div>
                                    <div class="swiper-button-prev"></div> -->
                                <div class="swiper-pagination"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="dash_main_sec_two">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="white-box padd_top_10 box_shadow account_info">
                            <div class="inner_section_account_info">
                                <div class="heading_edit_wrapper">
                                    <div class="top_heading">
                                        <h5>Account Info</h5>
                                    </div>
                                    <div class="edit_btn">
                                        <a href="<?php echo e(url('account-settings')); ?>">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="user_details_wrapper">
                                    <div class="user_image">
                                        <img src="<?php echo e(asset('storage/uploads/users/')); ?>/<?php echo e(Auth::user()->profile->pic); ?>" alt="">
                                    </div>
                                    <div class="user_details">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="top_heading">
                                                    <h6>Name</h6>
                                                </div>
                                                <div class="content">
                                                    <p><?php echo e(Auth::user()->name); ?></p>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="top_heading">
                                                    <h6>Email Address</h6>
                                                </div>
                                                <div class="content">
                                                    <p><?php echo e(Auth::user()->email); ?></p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="top_heading">
                                                    <h6>Date Of Birth</h6>
                                                </div>
                                                <div class="content">
                                                    <p><?php echo e(Auth::user()->profile->dob); ?></p>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="top_heading">
                                                    <h6>Contact</h6>
                                                </div>
                                                <div class="content">
                                                    <p><?php echo e(Auth::user()->contact); ?></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="description">
                                    <div class="top_heading">
                                        <h6>Description</h6>
                                    </div>
                                    <div class="content">
                                        <p><?php echo e(Auth::user()->profile->bio); ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="white-box padd_top_15 box_shadow calendar">
                            <div class="inner_section_calendar">
                                <div id="calendar"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        
            
                
                    
                        
                            
                                
                            
                            
                                
                                    
                                        
                                    
                                    
                                        
                                    

                                
                                
                                    
                                        
                                        
                                    
                                
                            
                        
                    
                    
                        
                            
                                
                                    
                                    
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                    
                                    
                                    
                                    
                                        
                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                                
                                                    
                                                            
                                                            
                                                            
                                                        
                                                    
                                                    
                                                        
                                                           
                                                        
                                                        
                                                        
                                                    
                                                
                                            
                                        
                                    
                                    
                                
                            
                        
                    
                
            
        

        <section class="attorney_associate_sec">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12 col-lg-12 col-xs-12">
                        <div class="inner_section_heading_wrapper">
                            <!-- <div class="top_heading">
                                <h1>Attorney/Associates</h1>
                            </div> -->
                            <div class="pagination"></div>
                            <div class="search_form">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-12 col-xs-12">
                        <div class="inner_section_table">
                            <div class="table-responsive">
                                <table class="table table-fixed sticker_table">
                                    <thead>
                                    <tr>
                                        <th scope="col">Name</th>
                                        <th scope="col">E-mail</th>
                                        <th scope="col">Address</th>
                                        <th scope="col">Title</th>
                                        <th scope="col">Contact No</th>
                                        <th scope="col">BAR Number</th>
                                        <th scope="col">BIO</th>
                                        <th scope="col">DOB</th>
                                        <th scope="col">Resume (Doc)</th>
                                        <th scope="col">Practicing Certificate</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php $__currentLoopData = $attorneyassociate; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e($item->name); ?></td>
                                            <td><?php echo e($item->email); ?></td>
                                            <td><?php echo substr($item->profile->address,0,15).'...'; ?></td>
                                            <td><?php echo e(ucwords($item->roles[0]->name)); ?></td>
                                            <td><?php echo e($item->contact); ?></td>
                                            <td>
                                                <?php if(isset($item->roles[0]) && $item->roles[0]->name=='secretary'): ?>
                                                    No Data
                                                <?php else: ?>
                                                    <?php echo e($item->bar_number); ?>

                                                <?php endif; ?>
                                            </td>
                                            <td><?php echo substr($item->profile->bio,0,15).'...'; ?></td>
                                            <td><?php echo e($item->profile->dob); ?></td>
                                            <td>
                                                <?php if(isset($item->resume) && $item->resume==null): ?>
                                                    No File
                                                <?php else: ?>
                                                    <a class="btn doc_btn" type="button" href="<?php echo e(asset('website')); ?>/<?php echo e($item->resume); ?>" target="_blank">
                                                        <img class="img-fluid" src="<?php echo e(asset('website')); ?>/assets/images/doc-icon.png" alt="">
                                                    </a>
                                                <?php endif; ?>
                                            </td>
                                            <td>
                                                <?php if(isset($item->certificate) && $item->certificate==null): ?>
                                                    No File
                                                <?php else: ?>
                                                    <a class="btn doc_btn" type="button" href="<?php echo e(asset('website')); ?>/<?php echo e($item->certificate); ?>" target="_blank">
                                                        <img class="img-fluid" src="<?php echo e(asset('website')); ?>/assets/images/doc-icon.png" alt="">
                                                    </a>
                                                <?php endif; ?>
                                            </td>
                                            <td>
                                                <div class="dropdown action_dropdown">
                                                    <button class="btn dropdown-toggle action_btn assign_attorney" type="button"
                                                            id="dropdownMenuButton" value="<?php echo e($item->id); ?>" data-toggle="dropdown"
                                                            aria-haspopup="true"
                                                            aria-expanded="false">
                                                        <i class="fa-solid fa-eye"></i>
                                                    </button>
                                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                        
                                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view-'.str_slug('AttorneyAssociate'))): ?>
                                                            <a class="dropdown-item" href="<?php echo e(url('/attorneyAssociate/attorney-associate/' . $item->id)); ?>" title="View <?php echo e(preg_replace('/(?<=[a-z])[A-Z]|[A-Z](?=[a-z])/', ' $0', 'AttorneyAssociate')); ?>">
                                                                View
                                                            </a>
                                                        <?php endif; ?>
                                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('edit-'.str_slug('AttorneyAssociate'))): ?>
                                                            <a class="dropdown-item" href="<?php echo e(url('/attorneyAssociate/attorney-associate/' . $item->id . '/edit')); ?>" title="Edit <?php echo e(preg_replace('/(?<=[a-z])[A-Z]|[A-Z](?=[a-z])/', ' $0', 'AttorneyAssociate')); ?>">
                                                                Edit
                                                            </a>
                                                        <?php endif; ?>
                                                    <!-- <a class="dropdown-item" href="#">Deactivate</a> -->
                                                        <?php if($item->status==1): ?>
                                                            <a class="dropdown-item" href="<?php echo e(route('attorneyAssociate_status',[$item->id, 0])); ?>">Deactivate</a>
                                                        <?php else: ?>
                                                            <a class="dropdown-item" href="<?php echo e(route('attorneyAssociate_status',[$item->id, 1])); ?>">Activate</a>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <div id="new_attorney_modal"  class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog"
             aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×
                        </button>
                        <h1 class="modal-title">Assign Account To New Attorney </h1></div>
                    <form name="form1">


                    </form>


                    <div class="modal-body">
                        <form>
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th scope="col">Case ID</th>
                                        <th scope="col">Attorney Name</th>
                                        <th scope="col">Expertise</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Select All
                                            <div class="custom_radio">
                                                <input type="radio" id="selectAll" name="select-all" >
                                                <label for="radio-group1"></label>
                                            </div>
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    <tr>
                                        <td>1234546</td>
                                        <td>John Denly</td>
                                        <td>Lorem Ipsum</td>
                                        <td>Pending</td>
                                        <td>
                                            <div class="custom_radio">
                                                <input type="radio" id="row1" name="slect" >
                                                <label for="row1"></label>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>1234546</td>
                                        <td>John Denly</td>
                                        <td>Lorem Ipsum</td>
                                        <td>Pending</td>
                                        <td>
                                            <div class="custom_radio">
                                                <input type="radio" id="row2" name="slect" >
                                                <label for="row2"></label>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>1234546</td>
                                        <td>John Denly</td>
                                        <td>Lorem Ipsum</td>
                                        <td>Pending</td>
                                        <td>
                                            <div class="custom_radio">
                                                <input type="radio" id="row3" name="slect" >
                                                <label for="row3"></label>
                                            </div>
                                        </td>
                                    </tr>

                                    </tbody>
                                </table>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn_black btn_block">Assign Attorney</button>
                    </div>
                </div>
            </div>
        </div>
    <?php else: ?>
    <section class="dash_main_sec_one">
        <div class="container-fluid">
            <div class="row colorbox-group-widget">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="inner_section_dashboard_swiper">
                        <!-- Swiper -->
                        <div class="swiper dashboard_swiper">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <div class="inner_section_swiper_slide">
                                        <div class="white-box box_shadow">
                                            <div class="media">
                                                <div class="media-body">
                                                    
                                                    <h3 class="info-count text-left"><?php echo e($active_cases??'0'); ?><span class="pull-right"></span>
                                                    </h3>
                                                    <p class="info-text text-left">Active Cases</p>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="inner_section_swiper_slide">
                                        <div class="white-box box_shadow">
                                            <div class="media">
                                                <div class="media-body">
                                                    <h3 class="info-count text-left"><?php echo e($complete_cases); ?> <span class="pull-right"><?php echo e($complete_cases); ?></span>
                                                    </h3>
                                                    <p class="info-text text-left">Completed Cases</p>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="inner_section_swiper_slide">
                                        <div class="white-box box_shadow">
                                            <div class="media">
                                                <div class="media-body">
                                                    <h3 class="info-count text-left"><?php echo e(@$numberofclients); ?><span class="pull-right"><?php echo e(@$numberofclients); ?></span>
                                                    </h3>
                                                    <p class="info-text text-left">Number Of Clients</p>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="swiper-pagination"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="dash_main_sec_two attorney_dashboard_calendar ">
        <div class="container-fluid">
            <div class="row dashboard_row_2">
                <div class="col-md-12">
                    <div class="white-box padd_top_15 box_shadow">
                        <div class="inner_section_calendar">
                            <div id="calendar"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
        <?php if(auth()->user()->hasRole('secretary')): ?>
            
        <?php elseif(auth()->user()->hasRole('Chambers Manager')): ?>
        <?php else: ?>
            <section class="dash_main_sec_three">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="white-box">
                                <div class="top_heading">
                                    <h1>Assigned Cases</h1>
                                </div>
                                <div class="clearfix"></div>
                                <hr>
                                <div class="inner_section_table">
                                    <div class="table-responsive">
                                        <table class="table table-fixed sticker_table" id="myTable">
                                            <thead>
                                            <tr>
                                                <th scope="col">Case Id</th>
                                                <th scope="col">Name Of Parties</th>
                                                <th scope="col">Instructing Attorney</th>
                                                <th scope="col">Senior Counsel</th>
                                                <th scope="col">Junior Counsel</th>
                                                <th scope="col">Type Of Matter</th>
                                                <th scope="col">Status</th>
                                                <th scope="col">Last Attended Court</th>
                                                <th scope="col">Next Court Date </th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php $__currentLoopData = $client; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $case): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php $__currentLoopData = $case->clientCase; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <tr>
                                                        <td><?php echo e(@$item->case_number??''); ?></td>
                                                        <td><?php echo e(@$item->name_of_parties??''); ?></td>
                                                        <td><?php echo e(@$item->attorney_associate_id->attorneyOrAssociate->name??''); ?></td>
                                                        <td>
                                                            <?php $__currentLoopData = $item->seniorCounsels; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $senior): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <?php echo e($senior->caseSeniorCounsel->name??''); ?><br>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        </td>
                                                        <td>
                                                            <?php $__currentLoopData = $item->JuniorCounsel; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $senior): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <?php echo e($senior->caseJuniorCounsel->name??''); ?><br>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        </td>
                                                        <td>
                                                            <?php $__currentLoopData = $item->typeOfMatters; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $matter): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <?php echo e(@$matter->caseTypeOfMatters->name??'No Data'); ?><br>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        <td><?php echo (@$item->status??''==1)?"<badge class='label label-success'>Active</badge>":"<badge class='label label-success'>Completed</badge>"; ?></td>
                                                        <td><?php echo e(isset($item->courtAttendantsNote) && $item->courtAttendantsNote->date ? date('d M Y', strtotime($item->courtAttendantsNote->date)) : 'No Data'); ?></td>
                                                        <td><?php echo e(isset($item->courtAttendantsNote) && $item->courtAttendantsNote->next_court_date ? date('d M Y', strtotime($item->courtAttendantsNote->next_court_date)) : 'No Data'); ?></td>
                                                    </tr>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </tbody>
                                        </table>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>



   
        <?php endif; ?>
    <?php endif; ?>

    <?php if(auth()->user()->hasRole('user')): ?>
         <div id="event_modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×
                        </button>
                            <h4 class="modal-title">Add Event</h4></div>
                    <form method="POST" action="<?php echo e(url('/caseEvent/case-event')); ?>" accept-charset="UTF-8"
                              class="form-horizontal" enctype="multipart/form-data">
                        <?php echo e(csrf_field()); ?>

                        <div class="modal-body">
                            <div class="form-group">
                                <label for="message-text" class="control-label">Event Title</label>
                                <input class="form-control" name="name" id="name" required>
                                <input class="form-control" type="hidden" name="date" id="date">
                            </div>
                            <div class="form-group">
                                <label for="message-text" class="control-label">Event Time</label>
                                <input class="form-control" type="time" name="time" id="time" required>
                            </div>
                            <div class="form-group">
                                <label for="message-text" class="control-label">Mention</label>
                                <select class="select2 m-b-10 select2-multiple form-control" id="user_id" name="user_id[]"multiple="multiple">
                                    <option hidden selected disabled>Select Attorney</option>
                                    <?php $__currentLoopData = $attorneies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attorney): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($attorney->id); ?>"><?php echo e($attorney->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="message-text" class="control-label">Event Location</label>
                                <input class="form-control" name="location" id="location" required>
                            </div>
                            <div class="form-group">
                                <label for="message-text" class="control-label">Event Description</label>
                                <textarea class="form-control" name="description" id="description" cols="4" rows="4" required></textarea>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">
                                Close
                            </button>
                            <button type="submit" class="btn btn-danger waves-effect waves-light">Submit
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <?php else: ?>
    <?php endif; ?>
    <?php if(auth()->user()->hasRole('secretary')): ?>
    <div id="event_modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×
                        </button>
                            <h4 class="modal-title">Add Event</h4></div>
                    <form method="POST" action="<?php echo e(url('/caseEvent/case-event')); ?>" accept-charset="UTF-8"
                              class="form-horizontal" enctype="multipart/form-data">
                        <?php echo e(csrf_field()); ?>

                        <div class="modal-body">
                            <div class="form-group">
                                <label for="message-text" class="control-label">Event Title</label>
                                <input class="form-control" name="name" id="name" required>
                                <input class="form-control" type="hidden" name="date" id="date">
                            </div>
                            <div class="form-group">
                                <label for="message-text" class="control-label">Event Time</label>
                                <input class="form-control" type="time" name="time" id="time" required>
                            </div>
                            <div class="form-group">
                                <label for="message-text" class="control-label">Mention</label>
                                <select class="select2 m-b-10 select2-multiple form-control" id="user_id" name="user_id[]"multiple="multiple">
                                    <option hidden selected disabled>Select Attorney</option>
                                    <?php $__currentLoopData = $attorneies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attorney): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($attorney->id); ?>"><?php echo e($attorney->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="message-text" class="control-label">Event Location</label>
                                <input class="form-control" name="location" id="location" required>
                            </div>
                            <div class="form-group">
                                <label for="message-text" class="control-label">Event Description</label>
                                <textarea class="form-control" name="description" id="description" cols="4" rows="4" required></textarea>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">
                                Close
                            </button>
                            <button type="submit" class="btn btn-danger waves-effect waves-light">Submit
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <?php else: ?>
    <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('js'); ?>
    
    <script src="https://unpkg.com/sweetalert@2.1.2/dist/sweetalert.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@fullcalendar/core@4.2.0/main.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@fullcalendar/daygrid@4.2.0/main.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@fullcalendar/interaction@4.2.0/main.js"></script>


    <script>
        var eventsArray = [
            <?php $__currentLoopData = $caseEvent; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                {
                    title: '<?php echo e($item->name); ?>',
                    start: '<?php echo e($item->date ?? ''); ?>',
                    time: '<?php echo e($item->time ??''); ?>',
                    location: '<?php echo e($item->location ??''); ?>',
                    description: '<?php echo e($item->description ??''); ?>'
                },
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            <?php if(auth()->user()->hasRole('secretary')): ?>
                <?php $__currentLoopData = $casefile; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php
                        $nextCourtDate = null;
                        $backgroundColor = '';
                        if (!empty($item->courtAttendantsNote)) {
                            $nextCourtDate = $item->courtAttendantsNote->next_court_date;
                            $description = $item->courtAttendantsNote->note;
                            if ($nextCourtDate) {
                                $diffInDays = Carbon\Carbon::now()->diffInDays($nextCourtDate);
                                if ($diffInDays < 7) {
                                    $backgroundColor = 'red';
                                } else if ($diffInDays >= 7 && $diffInDays <= 30) {
                                    $backgroundColor = '#D5AF2A';
                                } else {
                                    $backgroundColor = 'green';
                                }
                            }
                        }
                    ?>
                    {
                        title: '<?php echo e($item->name_of_parties); ?> ',
                        start: '<?php echo e($nextCourtDate ?? ''); ?>',
                        time: '<?php echo e($item->courtAttendantsNote->check_in ??''); ?>',
                        location: '<?php echo e($item->courtAttendantsNote->category->title ??''); ?>',
                        description: '<?php echo e($description??''); ?>',
                        <?php if(!empty($item->courtAttendantsNote) && $nextCourtDate): ?>
                            backgroundColor: '<?php echo e($backgroundColor); ?>',
                        <?php endif; ?>
                    },
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php elseif(auth()->user()->hasRole('user')): ?>
            <?php $__currentLoopData = $casefile; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php
                $nextCourtDate = null;
                $backgroundColor = '';
                if (!empty($item->courtAttendantsNote)) {
                    $nextCourtDate = $item->courtAttendantsNote->next_court_date;
                    $description = $item->courtAttendantsNote->note;
                    if ($nextCourtDate) {
                        $diffInDays = Carbon\Carbon::now()->diffInDays($nextCourtDate);
                        if ($diffInDays < 7) {
                            $backgroundColor = 'red';
                        } else if ($diffInDays >= 7 && $diffInDays <= 30) {
                            $backgroundColor = '#D5AF2A';
                        } else {
                            $backgroundColor = 'green';
                        }
                    }
                }
            ?>
            {
                title: '<?php echo e($item->name_of_parties); ?> ',
                start: '<?php echo e($nextCourtDate ?? ''); ?>',
                time: '<?php echo e($item->courtAttendantsNote->check_in ??''); ?>',
                        location: '<?php echo e($item->courtAttendantsNote->category->title ??''); ?>',
                        description: '<?php echo e($description??''); ?>',
                <?php if(!empty($item->courtAttendantsNote) && $nextCourtDate): ?>
                    backgroundColor: '<?php echo e($backgroundColor); ?>',
                <?php endif; ?>
            },
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php else: ?>
                <?php $__currentLoopData = $casefile; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php $__currentLoopData = $value->clientCase; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php
                            $nextCourtDate = null;
                            $backgroundColor = '';
                            if (!empty($item->courtAttendantsNote)) {
                                $nextCourtDate = $item->courtAttendantsNote->next_court_date;
                                $description = $item->courtAttendantsNote->note;
                                if ($nextCourtDate) {
                                    $diffInDays = Carbon\Carbon::now()->diffInDays($nextCourtDate);
                                    if ($diffInDays < 7) {
                                        $backgroundColor = 'red';
                                    } else if ($diffInDays >= 7 && $diffInDays <= 30) {
                                        $backgroundColor = '#D5AF2A';
                                    } else {
                                        $backgroundColor = 'green';
                                    }
                                }
                            }
                        ?>
                        {
                            title: '<?php echo e($item->name_of_parties); ?> ',
                            start: '<?php echo e($nextCourtDate ?? ''); ?>',
                            time: '<?php echo e($item->courtAttendantsNote->check_in ??''); ?>',
                            location: '<?php echo e($item->courtAttendantsNote->category->title ??''); ?>',
                            description: '<?php echo e($description??''); ?>',
                            <?php if(!empty($item->courtAttendantsNote) && $nextCourtDate): ?>
                            backgroundColor: '<?php echo e($backgroundColor); ?>',
                            <?php endif; ?>
                        },
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
        ];

        var additionalEvents = [
            {
                title: '',
                start: '',
                time: '',
                location: '',
                description: ''
            },
            {
                title: '',
                start: '',
                time: '',
                location: '',
                description: ''
            }
        ];
        function formatTime(time) {
            var parts = time.split(':');
            var hour = parseInt(parts[0], 10);
            var minute = parts[1];
            var period = hour >= 12 ? 'PM' : 'AM';
            if (hour > 12) {
                hour -= 12;
            } else if (hour === 0) {
                hour = 12;
            }
            return hour + ':' + minute + ' ' + period;
        }
        eventsArray = eventsArray.concat(additionalEvents);
        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                height: 600,
                plugins: [ 'dayGrid', 'weekGrid', 'monthGrid', 'interaction' ],
                initialView: 'dayGridMonth',
                initialDate: new Date(),
                dateClick: function(info) {
                    console.log(info)
                    $('#event_modal').modal('show');
                    $('#date').val(info.dateStr);
                    calendar.refetchEvents();
                },
                eventClick: function(info) {
                    var eventTime = info.event.extendedProps.time;
                    var eventTimeFormatted = formatTime(eventTime);
                    var htmlContent = "<h5>" + info.event.title + "</h5><br><h6>" + info.event.start.toLocaleDateString() + "<br>" + eventTimeFormatted + "</h6><br><h2>" + info.event.extendedProps.location + "</h2><br><p>" + info.event.extendedProps.description + "</p>";

                    Swal.fire({
                        title: 'Event Details',
                        html: htmlContent,
                        icon: 'info',
                    });
                },
                eventRender: function(info) {
                info.el.querySelector('.fc-title').insertAdjacentHTML('afterbegin', '<i class="fa fa-calendar"></i> ');
                },
                events: function(info, successCallback, failureCallback) {
                successCallback(eventsArray);
                },
                dayRender: function(info) {
                    var currentDate = new Date();
                    var date = info.date;
                    var currentMonth = currentDate.getMonth();
                    var renderedMonth = date.getMonth();

                    if (renderedMonth === currentMonth) {
                        info.el.classList.add('highlight'); // Add highlight class
                    } else {
                        info.el.classList.add('dim'); // Add dim class
                    }
                }
            });
            calendar.changeView('dayGridMonth', new Date());
            calendar.render();
        });

</script>


    <script src="<?php echo e(asset('plugins/components/toast-master/js/jquery.toast.js')); ?>"></script>

    <script src="<?php echo e(asset('plugins/components/datatables/jquery.dataTables.min.js')); ?>"></script>
    <!-- start - This is for export functionality only -->
    <!-- end - This is for export functionality only -->
    <script>
        $(function () {
            $('#myTable').DataTable({
                "ordering": false
            });
        });
    </script>
    <script src="<?php echo e(asset('plugins/components/custom-select/custom-select.min.js')); ?>" type="text/javascript"></script>
    <script src="<?php echo e(asset('plugins/components/bootstrap-select/bootstrap-select.min.js')); ?>" type="text/javascript"></script>



    <script type="text/javascript">
        jQuery(document).ready(function() {            
            // For select 2
            $(".select2").select2();
            $('.selectpicker').selectpicker();
        });

    </script>
    <script src="<?php echo e(asset('plugins/components/moment/moment.js')); ?>"></script>

    <!-- Date Picker Plugin JavaScript -->
    
    <!-- Date range Plugin JavaScript -->

    <script src="<?php echo e(asset('plugins/components/bootstrap-daterangepicker/daterangepicker.js')); ?>"></script>
    <script>


        // Daterange picker
        $('.input-daterange-datepicker').daterangepicker({
            buttonClasses: ['btn', 'btn-sm'],
            applyClass: 'btn-danger',
            cancelClass: 'btn-inverse'
        });
        $(document).ready(function() {
            // Open custom filter box on button click
            $(".custom_filter_btn").click(function() {
                $(".custom_filter_box").fadeIn(300); // Adjust the duration (in milliseconds) for desired speed
            });

            // Close custom filter box on close button click
            $(".custom_filter_box .close-btn").click(function() {
                $(".custom_filter_box").fadeOut(300); // Adjust the duration (in milliseconds) for desired speed
            });
        });



    </script>

<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home1/backendpro/public_html/usman/lcm/resources/views/dashboard/index.blade.php ENDPATH**/ ?>