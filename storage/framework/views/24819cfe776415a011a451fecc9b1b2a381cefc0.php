<?php $__env->startPush('css'); ?>
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
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
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
                <?php if(isset($attorney) && $attorney==auth::user()->id): ?>
                    <div class="col-md-1">
                        <div class="filter_btn pull-right">
                            <a href="<?php echo e(url('case_management')); ?>" class="btn btn_black model_img img-responsive">Back</a>
                        </div>
                    </div>
                    <div class="col-md-8"></div>
                    <div class="col-md-1">
                        <div class="btns_box pull-right">
                            <button type="button" class="add_new_div btn_black model_img img-responsive" data-id="<?php echo e($Originate->id ??''); ?>">Add</button>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="btns_box pull-right">
                            <button type="button"  class="remove_card btn_yellow model_img img-responsive">Remove</button>
                        </div>
                    </div>
                <?php elseif(Auth::id()==2): ?>
                    <div class="col-md-1">
                        <div class="filter_btn pull-right">
                            <a href="<?php echo e(url('case_management')); ?>" class="btn btn_black model_img img-responsive">Back</a>
                        </div>
                    </div>
                    <div class="col-md-8"></div>
                    <div class="col-md-1">
                        <div class="btns_box pull-right">
                            <button type="button" class="add_new_div btn_black model_img img-responsive" data-id="<?php echo e($Originate->id ??''); ?>">Add</button>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="btns_box pull-right">
                            <button type="button"  class="remove_card btn_yellow model_img img-responsive">Remove</button>
                        </div>
                    </div>
                <?php endif; ?>
                <div class="col-md-12">
                    <div class="white-box ">
                        <div class="row">
                            <div class="col-md-12"><h4><?php echo e($Originate->process->name ??''); ?></h4></div>
                            <div class="col-md-12">
                                <?php if(isset($attorney) && $attorney==auth::user()->id): ?>
                                    <div class="row full_card">
                                        <div class="col-md-4 card_part">
                                            <form class="form-horizontal  dashboard_form originating-process-form" enctype="multipart/form-data">
                                                <?php echo e(csrf_field()); ?>

                                                <div class="originating_process_card">
                                                    <a href="javascript:void(0)" class="multiple">
                                                        <p>
                                                            <span>Title</span>
                                                            <input class="form-control fileInput Applfiles originating_process" data-id="<?php echo e($Originate->id ??''); ?>" data-type="title" type="text" name="title" required>
                                                        </p>
                                                    </a>
                                                    <div class="new_file_div">
                                                        <p class="">
                                                            <span>Files</span>
                                                        </p>
                                                        <a href="javascript:void(0)" class="multiple">
                                                            <label class="z_filelabel">
                                                                <input style="display: none" data-id="<?php echo e($Originate->id ??''); ?>" data-type="file" class="form-control fileInput originating_process Applfiles" id="input" type="file" name="file" accept="application/pdf" required>
                                                                <img src="<?php echo e(asset('website/assets/images/formtickbox.png')); ?>">
                                                                <span>
                                                                    No File Selected.
                                                                </span>
                                                            </label>
                                                        </a>

                                                        <p class="">
                                                            <span>Notes</span>
                                                            <textarea name="description" id="" class="form-control description_para originating_process" data-id="<?php echo e($Originate->id ??''); ?>" data-type="description" cols="40" rows="8"></textarea>
                                                        </p>
                                                        <a href="javascript:void(0)" class="multiple">
                                                            <p>
                                                                <span>Date</span>
                                                                <input type="date" name="date" data-id="<?php echo e($Originate->id ??''); ?>" data-type="date" class="form-control fileInput originating_process Applfiles" required>
                                                                <input type="hidden" name="originate_id" value="<?php echo e($Originate->id ??''); ?>">
                                                            </p>
                                                        </a>
                                                    </div>
                                                    <button type="submit" class="btn btn_black create_orignating submitButton">Save</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                <?php elseif(Auth::id()==2): ?>
                                    <div class="row full_card">
                                        <div class="col-md-4 card_part">
                                            <form class="form-horizontal  dashboard_form originating-process-form" enctype="multipart/form-data">
                                                <?php echo e(csrf_field()); ?>

                                                <div class="originating_process_card">
                                                    <a href="javascript:void(0)" class="multiple">
                                                        <p>
                                                            <span>Title</span>
                                                            <input class="form-control fileInput Applfiles originating_process" data-id="<?php echo e($Originate->id ??''); ?>" data-type="title" type="text" name="title" required>
                                                        </p>
                                                    </a>
                                                    <div class="new_file_div">
                                                        <p class="">
                                                            <span>Files</span>
                                                        </p>
                                                        <a href="javascript:void(0)" class="multiple">
                                                            <label class="z_filelabel">
                                                                <input style="display: none" data-id="<?php echo e($Originate->id ??''); ?>" data-type="file" class="form-control fileInput originating_process Applfiles" id="input" type="file" name="file" accept="application/pdf" required>
                                                                <img src="<?php echo e(asset('website/assets/images/formtickbox.png')); ?>">
                                                                <span>
                                                                    No File Selected.
                                                                </span>
                                                            </label>
                                                        </a>

                                                        <p class="">
                                                            <span>Notes</span>
                                                            <textarea name="description" id="" class="form-control description_para originating_process" data-id="<?php echo e($Originate->id ??''); ?>" data-type="description" cols="40" rows="8"></textarea>
                                                        </p>
                                                        <a href="javascript:void(0)" class="multiple">
                                                            <p>
                                                                <span>Date</span>
                                                                <input type="date" name="date" data-id="<?php echo e($Originate->id ??''); ?>" data-type="date" class="form-control fileInput originating_process Applfiles" required>
                                                                <input type="hidden" name="originate_id" value="<?php echo e($Originate->id ??''); ?>">
                                                            </p>
                                                        </a>
                                                    </div>
                                                    <button type="submit" class="btn btn_black create_orignating submitButton">Save</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                <?php endif; ?>
                                <div class="row">
                                    <?php if(isset($attorney) && $attorney==auth::user()->id): ?>
                                        <?php $__currentLoopData = $Processed; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $process): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <div class="col-md-4">
                                                <form class="form-horizontal dashboard_form" action="<?php echo e(route('originating_update_ajax')); ?>" method="post">
                                                    <?php echo e(csrf_field()); ?>

                                                    <div class="originating_process_card">
                                                        <a href="javascript:void(0)" class="multiple">
                                                            <p>
                                                                <span><?php echo e($process->title); ?></span>
                                                                <input class="form-control fileInput Applfiles originating_process" data-type="title" type="text" name="title" value="<?php echo e($process->title); ?>">
                                                            </p>
                                                        </a>
                                                        <div class="new_file_div">
                                                            <p class="">
                                                                <a data-title="<?php echo e(@$process->title??''); ?>" data-file="<?php echo e(asset('website')); ?>/<?php echo e(@$process->file); ?>" data-case="<?php echo e(@$Originate->getCaseDetail->name_of_parties??''); ?>" class="share_btn pull-right" style="padding: 10px 0px 10px 0px;"><img style="cursor: pointer; width: 70%;" src="<?php echo e(asset('website')); ?>/assets/images/share.png"></a>
                                                                <a class="pull-right" href="<?php echo e(asset('website')); ?>/<?php echo e($process->file); ?>" target="_blank" style="padding: 10px 0px 10px 0px;"><img style="width: 90%;" src="<?php echo e(asset('website')); ?>/assets/images/pdf.png"></a>
                                                            </p>
                                                            <a href="javascript:void(0)" class="multiple">
                                                                <label class="z_filelabel">
                                                                    <input style="display: none" data-type="file" class="form-control fileInput originating_process Applfiles" id="input" type="file" name="file" accept="application/pdf">
                                                                    <img src="<?php echo e(asset('website/assets/images/formtickbox.png')); ?>">
                                                                    <span>
                                                                        Change Selected File
                                                                    </span>
                                                                </label>
                                                            </a>

                                                            <p class="">
                                                                <span>Notes</span>
                                                                <textarea name="description" id="" class="form-control description_para originating_process" data-type="description" cols="40" rows="8"><?php echo e(@$process->description??''); ?></textarea>
                                                            </p>
                                                            <a href="javascript:void(0)" class="multiple">
                                                                <p>
                                                                    <span>Date</span>
                                                                    <input type="date" name="date" data-type="date" class="form-control fileInput originating_process Applfiles" value="<?php echo e($process->date??''); ?>">
                                                                    <input type="hidden" class="id" name="id" id="id" value="<?php echo e(@$process->id ??''); ?>">
                                                                </p>
                                                            </a>
                                                        </div>
                                                        <button type="submit" class="btn btn_black submitButton">Save</button>
                                                        <a class="btn btn_yellow pull-right" href="<?php echo e(route('originating_processed_destory' , [$process->id??''])); ?>"
                                                        title="Delete <?php echo e(preg_replace('/(?<=[a-z])[A-Z]|[A-Z](?=[a-z])/', ' $0', 'Document Center')); ?>" onclick="return confirm(&quot;Confirm delete?&quot;)">
                                                            Delete
                                                        </a>
                                                    </div>
                                                </form>
                                            </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php elseif(Auth::id()==2): ?>
                                        <?php $__currentLoopData = $Processed; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $process): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <div class="col-md-4">
                                                <form class="form-horizontal dashboard_form" action="<?php echo e(route('originating_update_ajax')); ?>" method="post">
                                                    <?php echo e(csrf_field()); ?>

                                                    <div class="originating_process_card">
                                                        <a href="javascript:void(0)" class="multiple">
                                                            <p>
                                                                <span><?php echo e($process->title); ?></span>
                                                                <input class="form-control fileInput Applfiles originating_process" data-type="title" type="text" name="title" value="<?php echo e($process->title); ?>">
                                                            </p>
                                                        </a>
                                                        <div class="new_file_div">
                                                            <p class="">
                                                                <a data-title="<?php echo e(@$process->title??''); ?>" data-case="<?php echo e(@$Originate->getCaseDetail->name_of_parties??''); ?>" data-file="<?php echo e(asset('website')); ?>/<?php echo e(@$process->file); ?>" class="share_btn pull-right" style="padding: 10px 0px 10px 0px;"><img style="cursor: pointer; width: 70%;" src="<?php echo e(asset('website')); ?>/assets/images/share.png"></a>
                                                                <a class="pull-right" href="<?php echo e(asset('website')); ?>/<?php echo e($process->file); ?>" target="_blank" style="padding: 10px 0px 10px 0px;"><img style="width: 90%;" src="<?php echo e(asset('website')); ?>/assets/images/pdf.png"></a>
                                                            </p>
                                                            <a href="javascript:void(0)" class="multiple">
                                                                <label class="z_filelabel">
                                                                    <input style="display: none" data-type="file" class="form-control fileInput originating_process Applfiles" id="input" type="file" name="file" accept="application/pdf">
                                                                    <img src="<?php echo e(asset('website/assets/images/formtickbox.png')); ?>">
                                                                    <span>
                                                                        Change Selected File
                                                                    </span>
                                                                </label>
                                                            </a>

                                                            <p class="">
                                                                <span>Notes</span>
                                                                <textarea name="description" id="" class="form-control description_para originating_process" data-type="description" cols="40" rows="8"><?php echo e(@$process->description??''); ?></textarea>
                                                            </p>
                                                            <a href="javascript:void(0)" class="multiple">
                                                                <p>
                                                                    <span>Date</span>
                                                                    <input type="date" name="date" data-type="date" class="form-control fileInput originating_process Applfiles" value="<?php echo e($process->date??''); ?>">
                                                                    <input type="hidden" class="id" name="id" id="id" value="<?php echo e(@$process->id ??''); ?>">
                                                                </p>
                                                            </a>
                                                        </div>
                                                        <button type="submit" class="btn btn_black submitButton">Save</button>
                                                        <a class="btn btn_yellow pull-right" href="<?php echo e(route('originating_processed_destory' , [$process->id??''])); ?>"
                                                        title="Delete <?php echo e(preg_replace('/(?<=[a-z])[A-Z]|[A-Z](?=[a-z])/', ' $0', 'Document Center')); ?>" onclick="return confirm(&quot;Confirm delete?&quot;)">
                                                            Delete
                                                        </a>
                                                    </div>
                                                </form>
                                            </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php else: ?>
                                        <?php $__currentLoopData = $Processed; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $process): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <div class="col-md-4">
                                                <form class="form-horizontal dashboard_form">
                                                    <div class="originating_process_card">
                                                        <a href="javascript:void(0)" class="multiple">
                                                            <p>
                                                                <span>Title</span>
                                                                <input class="form-control fileInput Applfiles originating_process" disabled data-type="title" type="text" name="title" value="<?php echo e($process->title); ?>">
                                                            </p>
                                                        </a>
                                                        <div class="new_file_div">
                                                            <p class="">

                                                                <a class="pull-right" href="<?php echo e(asset('website')); ?>/<?php echo e($process->file); ?>" target="_blank" style="padding: 10px 0px 10px 0px;"><img style="width: 90%;" src="<?php echo e(asset('website')); ?>/assets/images/pdf.png"></a>
                                                            </p>
                                                            <p class="">
                                                                <span>Notes</span>
                                                                <textarea name="description" disabled id="" class="form-control description_para originating_process" data-type="description" cols="40" rows="8"><?php echo e(@$process->description??''); ?></textarea>
                                                            </p>
                                                            <a href="javascript:void(0)" class="multiple">
                                                                <p>
                                                                    <span>Date</span>
                                                                    <input type="date" name="date" disabled data-type="date" class="form-control fileInput originating_process Applfiles" value="<?php echo e($process->date??''); ?>">
                                                                    <input type="hidden" class="id" name="id" id="id" value="<?php echo e(@$process->id ??''); ?>">
                                                                </p>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
                                </div>
                            </div>
                       </div>
                    </div>
                </div>
                <!-- <div class="col-md-12">
                    <div class="white-box ">
                        <div class="row">
                            <div class="col-md-12"><h4><?php echo e($Originate->process->name ??''); ?></h4></div>
                            <form action="" method="" class="form-horizontal row dashboard_form" enctype="multipart/form-data">
                                
                                <div class="col-md-4">
                                    <div class="originating_process_card">
                                        
                                        <?php if(isset($Originate->originate_id) && $Originate->originate_id=='1'): ?>
                                            <?php $name1 = "Application for leave Affidavit in Support"; ?>
                                            <?php $name2 = "Submission on leave application"; ?>
                                            <?php $name3 = "Order granting leave"; ?>
                                            <?php $name4 = "Fix Date Claim Form FDCF Affidavit in Support"; ?>
                                            <?php $name5 = "Saff in Reply"; ?>
                                            <?php $name6 = "Claimant’s Saff in response"; ?>
                                            <?php $name7 = "Evidential objections"; ?>
                                            <?php $name8 = "Cross examination application"; ?>
                                            <?php $name9 = "Application for specific disclosure"; ?>
                                            <?php $name10 = "Legal Submissions"; ?>
                                            <?php $name11 = "Judgement"; ?>
                                            <?php $name12 = "Notice of Appeal"; ?>
                                            <?php $name13 = "Record of Appeal"; ?>
                                            <?php $name14 = "Submissions"; ?>
                                            <?php $name15 = "Judgment"; ?>
                                            <?php $name16 = "Order of COA"; ?>
                                            <?php $name17 = "Application for conditional leave to PC"; ?>
                                            <?php $name18 = "Notice of Appeal in PC"; ?>
                                            <?php $name19 = "Certified Record to PC"; ?>
                                            <?php $name20 = "Reproduced Record to PC"; ?>
                                            <?php $name21 = "SFI Chrono Precis"; ?>
                                            <?php $name22 = "Case for Appellant"; ?>
                                            <?php $name23 = "Case for Respondent"; ?>
                                            <?php $name24 = "Updated Record with JBA"; ?>
                                            <?php $name25 = "Judgment from PC"; ?>
                                            <?php $name26 = "Order of PC"; ?>
                                            <?php $name27 = "Ongoing letters"; ?>
                                            <?php $name28 = "CMC orders"; ?>
                                            <?php $name29 = "Filed Bill of Costs"; ?>
                                            <span class="sub_heading">Application for leave Affidavit in Support</span>
                                        <?php elseif(isset($Originate->originate_id) && $Originate->originate_id=='2'): ?>
                                            <?php $name1 = "FDCF Affidavit in support "; ?>
                                            <?php $name2 = "Aff in Reply"; ?>
                                            <?php $name3 = "Claimant’s aff in response "; ?>
                                            <?php $name4 = "Evidential objections"; ?>
                                            <?php $name5 = "Cross examination application"; ?>
                                            <?php $name6 = "Application for specific disclosure"; ?>
                                            <?php $name7 = "Legal Submissions"; ?>
                                            <?php $name8 = "Judgement"; ?>
                                            <?php $name9 = "Order of HC"; ?>
                                            <?php $name10 = "Notice of Appeal"; ?>
                                            <?php $name11 = "Record of Appeal"; ?>
                                            <?php $name12 = "Submissions"; ?>
                                            <?php $name13 = "Judgment"; ?>
                                            <?php $name14 = "Order of COA"; ?>
                                            <?php $name15 = "Application for conditional leave to PC"; ?>
                                            <?php $name16 = "Application for final leave to PC "; ?>
                                            <?php $name17 = "Notice of Appeal in PC"; ?>
                                            <?php $name18 = "Certified Record to PC"; ?>
                                            <?php $name19 = "Reproduced Record to PC"; ?>
                                            <?php $name20 = "SFI Chrono Precis"; ?>
                                            <?php $name21 = "Case for Appellant"; ?>
                                            <?php $name22 = "Case for Respondent"; ?>
                                            <?php $name23 = "Updated Record with JBA"; ?>
                                            <?php $name24 = "Judgment from PC"; ?>
                                            <?php $name25 = "Order of PC"; ?>
                                            <?php $name26 = "Ongoing letters"; ?>
                                            <?php $name27 = "CMC orders"; ?>
                                            <?php $name28 = "Filed Bill of Costs"; ?>
                                            <?php $name29 = "Cross examination application"; ?>
                                            <span class="sub_heading">FDCF Affidavit in support</span>
                                        <?php elseif(isset($Originate->originate_id) && $Originate->originate_id=='3'): ?>
                                            <?php $name1 = "Claim form/Statement of Case"; ?>
                                            <?php $name2 = "Defence"; ?>
                                            <?php $name3 = "Cost Budget"; ?>
                                            <?php $name4 = "Reply to Defence"; ?>
                                            <?php $name5 = "List of Documents"; ?>
                                            <?php $name6 = "Pretrial applications"; ?>
                                            <?php $name7 = "Claimants Witness Statements"; ?>
                                            <?php $name8 = "Defendant Witness Statements"; ?>
                                            <?php $name9 = "Evidential Objections"; ?>
                                            <?php $name10 = "Notes from Trial"; ?>
                                            <?php $name11 = "Legal Submissions"; ?>
                                            <?php $name12 = "Judgement"; ?>
                                            <?php $name13 = "Order of HC"; ?>
                                            <?php $name14 = "Notice of Appeal"; ?>
                                            <?php $name15 = "Record of Appeal"; ?>
                                            <?php $name16 = "Submissions"; ?>
                                            <?php $name17 = "Judgment"; ?>
                                            <?php $name18 = "Application for final leave to PC "; ?>
                                            <?php $name19 = "Notice of Appeal in PC"; ?>
                                            <?php $name20 = "Certified Record to PC"; ?>
                                            <?php $name21 = "Reproduced Record to PC"; ?>
                                            <?php $name22 = "SFI/Chrono/Precis"; ?>
                                            <?php $name23 = "Case for Appellant"; ?>
                                            <?php $name24 = "Case for Respondent"; ?>
                                            <?php $name25 = "Order of PC"; ?>
                                            <?php $name26 = "Ongoing letters"; ?>
                                            <?php $name27 = "CMC orders"; ?>
                                            <?php $name28 = "Filed Bill of Costs"; ?>
                                            <?php $name29 = "Cross examination application"; ?>
                                            <span class="sub_heading">Claim form Statement of Case</span>
                                        <?php endif; ?>
                                        <div class="new_file_div">
                                            <?php if($Processed->where('form_id','1')->count() == 0): ?>
                                                <a href="javascript:void(0)" class="multiple">
                                                    <label class="z_filelabel">
                                                        <input style="display: none" class="form-control fileInput Applfiles"   data-case_originates="<?php echo e($Originate->id); ?>" data-filrname="Applfiles" data-index="0" id="input" type="file" name="Applfiles[0][file]" accept="application/pdf">
                                                        <img src="<?php echo e(asset('website/assets/images/formtickbox.png')); ?>">
                                                        <span>
                                                                No file selected.
                                                            </span>
                                                    </label>
                                                </a>

                                                <p class="">
                                                    <span>Notes</span>
                                                    <input type="hidden" name="Applfiles[0][case_originates]" value="<?php echo e($Originate->id); ?>">
                                                    <textarea name="Applfiles[0][note]" id="" class="form-control description_para" cols="40" rows="8"></textarea>
                                                    <input type="date" name="Applfiles[0][date]" class="form-control " value="">
                                                </p>
                                                <div class="btns_box">
                                                    <button type="button"  class="add_new_div btn_yellow" data-case_originates="<?php echo e($Originate->id); ?>" data-filrname="Applfiles" data-index="0" >Add More Files</button>
                                                </div>
                                            <?php else: ?>
                                                <?php $count = 0;?>
                                                <?php $__currentLoopData = $Processed->where('form_id','1'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $keyz=>$element): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <a href="" class="multiple">
                                                        <label class="z_filelabel">
                                                            <input type="hidden" name="Applfiles[<?php echo e($count); ?>][id]" value="<?php echo e($element->id); ?>">
                                                            <input style="display: none" class="form-control fileInput Applfiles"  data-case_originates="<?php echo e($element->originate_id); ?>" data-filrname="Applfiles" data-index="<?php echo e($count); ?>" id="input" type="file" name="Applfiles[<?php echo e($count); ?>][file]" accept="application/pdf">
                                                            <img src="<?php echo e(asset('website/assets/images/formcheckbox.svg')); ?>">
                                                        </label>
                                                    </a>
                                                    <?php if($count == 0): ?>
                                                        <button type="button"  class="add_new_div btn_yellow" data-case_originates="<?php echo e($element->originate_id); ?>" data-filrname="Applfiles" data-index="<?php echo e($Processed->where('form_id','1')->count()-1); ?>" >Add More Files</button>
                                                    <?php endif; ?>
                                                    <p class="">
                                                        <span>Notes</span>
                                                        <input type="hidden" name="Applfiles[<?php echo e($count); ?>][case_originates]" value="<?php echo e($element->originate_id); ?>">
                                                        <textarea name="Applfiles[<?php echo e($count); ?>][note]" id="" class="form-control description_para" cols="40" rows="8"><?php echo e($element->description); ?></textarea>
                                                        <input type="date" name="Applfiles[0][date]" class="form-control " value="<?php echo e($element->date); ?>">
                                                    </p>
                                                    <a class="btn btn_yellow pull-right" href="<?php echo e(route('originating_processed_destory' , [$element->id??''])); ?>"
                                                       title="Delete <?php echo e(preg_replace('/(?<=[a-z])[A-Z]|[A-Z](?=[a-z])/', ' $0', 'OriginatingProcessed')); ?>" onclick="return confirm(&quot;Confirm delete?&quot;)">
                                                        Delete
                                                    </a>
                                                    <?php $count++ ?>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php endif; ?>

                                        </div>
                                        <button type="button" data-form="1" class="btn btn_black submitButton" data-title="<?php echo e($name1); ?>" data-case_originates="<?php echo e($Originate->id); ?>" data-filrname="Applfiles">Save</button>
                                    </div>
                                </div>
                                
                                
                                <div class="col-md-4">
                                    <div class="originating_process_card">
                                        <span class="sub_heading"><?php echo e($name2); ?></span>


                                        <div class="new_file_div">
                                            <?php if($Processed->where('form_id','2')->count() == 0): ?>
                                                <a href="javascript:void(0)" class="multiple">

                                                    <label class="z_filelabel">
                                                        <input style="display: none" class="form-control fileInput Submissions" data-case_originates="<?php echo e($Originate->id); ?>" data-filrname="Submissions" data-index="0" id="input" type="file" name="Submissions[0][file]" accept="application/pdf">
                                                        <img src="<?php echo e(asset('website/assets/images/formtickbox.png')); ?>">
                                                        <span>
                                                                No file selected.
                                                            </span>
                                                    </label>
                                                </a>

                                                <p class="">
                                                    <span>Notes</span>
                                                    <input type="hidden" name="Submissions[0][case_originates]" value="<?php echo e($Originate->id); ?>">
                                                    <textarea name="Submissions[0][note]" id="" class="form-control description_para" cols="40" rows="8"></textarea>
                                                    <input type="date" name="Submissions[0][date]" class="form-control " value="" >
                                                </p>
                                                <div class="btns_box">
                                                    <button type="button"  class="add_new_div btn_yellow" data-case_originates="<?php echo e($Originate->id); ?>" data-filrname="Submissions" data-index="0" >Add More Files</button>
                                                </div>
                                            <?php else: ?>
                                                <?php $count = 0;?>
                                                <?php $__currentLoopData = $Processed->where('form_id','2'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $keyz=>$element): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <a href="" class="multiple">
                                                        <label class="z_filelabel">
                                                            <input type="hidden" name="Submissions[<?php echo e($count); ?>][id]" value="<?php echo e($element->id); ?>">
                                                            <input style="display: none" class="form-control fileInput Submissions" data-case_originates="<?php echo e($element->originate_id); ?>" data-filrname="Submissions" data-index="<?php echo e($count); ?>" id="input" type="file" name="Submissions[<?php echo e($count); ?>][file]" accept="application/pdf">
                                                            <img src="<?php echo e(asset('website/assets/images/formcheckbox.svg')); ?>">

                                                        </label>

                                                    </a>
                                                    <?php if($count == 0): ?>
                                                        <button type="button"  class="add_new_div btn_yellow" data-case_originates="<?php echo e($element->originate_id); ?>" data-filrname="Submissions" data-index="<?php echo e($Processed->where('form_id','2')->count()-1); ?>" >Add More Files</button>
                                                    <?php endif; ?>

                                                    <p class="">
                                                        <span>Notes</span>
                                                        <input type="hidden" name="Submissions[<?php echo e($count); ?>][case_originates]" value="<?php echo e($element->originate_id); ?>">
                                                        <textarea name="Submissions[<?php echo e($count); ?>][note]" id="" class="form-control description_para" cols="40" rows="8"><?php echo e($element->description); ?></textarea>
                                                        <input type="date" name="Submissions[0][date]" class="form-control " class="form-control " value="<?php echo e($element->date); ?>">
                                                    </p>
                                                    <a class="btn btn_yellow pull-right" href="<?php echo e(route('originating_processed_destory' , [$element->id??''])); ?>"
                                                       title="Delete <?php echo e(preg_replace('/(?<=[a-z])[A-Z]|[A-Z](?=[a-z])/', ' $0', 'OriginatingProcessed')); ?>" onclick="return confirm(&quot;Confirm delete?&quot;)">
                                                        Delete
                                                    </a>
                                                    <?php $count++ ?>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php endif; ?>
                                        </div>
                                        <button type="button" data-form="2" class="btn btn_black submitButton" data-title="<?php echo e($name2); ?>" data-case_originates="<?php echo e($Originate->id); ?>" data-filrname="Submissions">Save</button>
                                    </div>
                                </div>
                                
                                
                                <div class="col-md-4">
                                    <div class="originating_process_card">
                                        <span class="sub_heading"><?php echo e($name3); ?></span>
                                        <div class="new_file_div">
                                            <?php if($Processed->where('form_id','3')->count() == 0): ?>
                                                <a href="javascript:void(0)" class="multiple">

                                                    <label class="z_filelabel">
                                                        <input style="display: none" class="form-control fileInput Orders" da ta-case_originates="<?php echo e($Originate->id); ?>" data-filrname="Orders" data-index="0" id="input" type="file" name="Orders[0][file]" accept="application/pdf">
                                                        <img src="<?php echo e(asset('website/assets/images/formtickbox.png')); ?>">
                                                        <span>
                                                                No file selected.
                                                            </span>
                                                    </label>
                                                </a>

                                                <p class="">
                                                    <span>Notes</span>
                                                    <input type="hidden" name="Orders[0][case_originates]" value="<?php echo e($Originate->id); ?>">
                                                    <textarea name="Orders[0][note]" id="" class="form-control description_para" cols="40" rows="8"></textarea>
                                                    <input type="date" name="Orders[0][date]" class="form-control " class="form-control " value="">
                                                </p>

                                                <div class="btns_box">
                                                    <button type="button"  class="add_new_div btn_yellow" data-case_originates="<?php echo e($Originate->id); ?>" data-filrname="Orders" data-index="0" >Add More Files</button> </div>

                                            <?php else: ?>
                                                <?php $count = 0;?>
                                                <?php $__currentLoopData = $Processed->where('form_id','3'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $keyz=>$element): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <a href="" class="multiple">
                                                        <label class="z_filelabel">
                                                            <input type="hidden" name="Orders[<?php echo e($count); ?>][id]" value="<?php echo e($element->id); ?>">
                                                            <input style="display: none" class="form-control fileInput Orders" da ta-case_originates="<?php echo e($element->originate_id); ?>" data-filrname="Orders" data-index="<?php echo e($count); ?>" id="input" type="file" name="Orders[<?php echo e($count); ?>][file]" accept="application/pdf">
                                                            <img src="<?php echo e(asset('website/assets/images/formcheckbox.svg')); ?>">

                                                        </label>

                                                    </a>
                                                    <?php if($count == 0): ?>
                                                        <button type="button"  class="add_new_div btn_yellow" data-case_originates="<?php echo e($element->originate_id); ?>" data-filrname="Orders" data-index="<?php echo e($Processed->where('form_id','3')->count()-1); ?>" >Add More Files</button>
                                                    <?php endif; ?>

                                                    <p class="">
                                                        <span>Notes</span>
                                                        <input type="hidden" name="Orders[<?php echo e($count); ?>][case_originates]" value="<?php echo e($element->originate_id); ?>">
                                                        <textarea name="Orders[<?php echo e($count); ?>][note]" id="" class="form-control description_para" cols="40" rows="8"><?php echo e($element->description); ?></textarea>
                                                        <input type="date" name="Orders[0][date]" class="form-control " class="form-control " value="<?php echo e($element->date); ?>">
                                                    </p>
                                                    <a class="btn btn_yellow pull-right" href="<?php echo e(route('originating_processed_destory' , [$element->id??''])); ?>"
                                                       title="Delete <?php echo e(preg_replace('/(?<=[a-z])[A-Z]|[A-Z](?=[a-z])/', ' $0', 'OriginatingProcessed')); ?>" onclick="return confirm(&quot;Confirm delete?&quot;)">
                                                        Delete
                                                    </a>
                                                    <?php $count++ ?>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php endif; ?>
                                        </div>
                                        <button type="button" data-form="3" class="btn btn_black submitButton" data-title="<?php echo e($name3); ?>" data-case_originates="<?php echo e($Originate->id); ?>" data-filrname="Orders">Save</button>
                                    </div>
                                </div>
                                
                                
                                <div class="col-md-4">
                                    <div class="originating_process_card">
                                        <span class="sub_heading"><?php echo e($name4); ?></span>
                                        <div class="new_file_div">
                                            <?php if($Processed->where('form_id','4')->count() == 0): ?>
                                                <a href="javascript:void(0)" class="multiple">

                                                    <label class="z_filelabel">
                                                        <input style="display: none" class="form-control fileInput claimFiles " data-case_originates="<?php echo e($Originate->id); ?>" data-filrname="claimFiles" data-index="0" id="input" type="file" name="claimFiles[0][file]" accept="application/pdf">
                                                        <img src="<?php echo e(asset('website/assets/images/formtickbox.png')); ?>">
                                                        <span>
                                                                No file selected.
                                                            </span>
                                                    </label>
                                                </a>

                                                <p class="">
                                                    <span>Notes</span>
                                                    <input type="hidden" name="claimFiles[0][case_originates]" value="<?php echo e($Originate->id); ?>">
                                                    <textarea name="claimFiles[0][note]" id="" class="form-control description_para" cols="40" rows="8"></textarea>
                                                    <input type="date" name="claimFiles[0][date]" class="form-control " class="form-control " value="">
                                                </p>
                                                <div class="btns_box">
                                                <button type="button"  class="add_new_div btn_yellow" data-case_originates="<?php echo e($Originate->id); ?>" data-filrname="claimFiles" data-index="0" >Add More Files</button> </div>
                                            <?php else: ?>
                                                <?php $count = 0;?>
                                                <?php $__currentLoopData = $Processed->where('form_id','4'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $keyz=>$element): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <a href="" class="multiple">
                                                        <label class="z_filelabel">
                                                            <input type="hidden" name="claimFiles[<?php echo e($count); ?>][id]" value="<?php echo e($element->id); ?>">
                                                            <input style="display: none" class="form-control fileInput claimFiles " data-case_originates="<?php echo e($element->originate_id); ?>" data-filrname="claimFiles" data-index="<?php echo e($count); ?>" id="input" type="file" name="claimFiles[<?php echo e($count); ?>][file]" accept="application/pdf">
                                                            <img src="<?php echo e(asset('website/assets/images/formcheckbox.svg')); ?>">

                                                        </label>

                                                    </a>
                                                    <?php if($count == 0): ?>
                                                        <button type="button"  class="add_new_div btn_yellow" data-case_originates="<?php echo e($element->originate_id); ?>" data-filrname="claimFiles" data-index="<?php echo e($Processed->where('form_id','4')->count()-1); ?>" >Add More Files</button>
                                                    <?php endif; ?>

                                                    <p class="">
                                                        <span>Notes</span>
                                                        <input type="hidden" name="claimFiles[<?php echo e($count); ?>][case_originates]" value="<?php echo e($element->originate_id); ?>">
                                                        <textarea name="claimFiles[<?php echo e($count); ?>][note]" id="" class="form-control description_para" cols="40" rows="8"><?php echo e($element->description); ?></textarea>
                                                        <input type="date" name="claimFiles[0][date]" class="form-control " class="form-control " value="<?php echo e($element->date); ?>">
                                                    </p>
                                                    <a class="btn btn_yellow pull-right" href="<?php echo e(route('originating_processed_destory' , [$element->id??''])); ?>"
                                                       title="Delete <?php echo e(preg_replace('/(?<=[a-z])[A-Z]|[A-Z](?=[a-z])/', ' $0', 'OriginatingProcessed')); ?>" onclick="return confirm(&quot;Confirm delete?&quot;)">
                                                        Delete
                                                    </a>
                                                    <?php $count++ ?>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php endif; ?>
                                        </div>
                                        <button type="button" data-form="4" class="btn btn_black submitButton" data-title="<?php echo e($name4); ?>" data-case_originates="<?php echo e($Originate->id); ?>" data-filrname="claimFiles">Save</button>
                                    </div>
                                </div>
                                
                                
                                <div class="col-md-4">
                                    <div class="originating_process_card">
                                        <span class="sub_heading"><?php echo e($name5); ?></span>
                                        <div class="new_file_div">
                                            <?php if($Processed->where('form_id','5')->count() == 0): ?>
                                                <a href="javascript:void(0)" class="multiple">

                                                    <label class="z_filelabel">
                                                        <input style="display: none" class="form-control fileInput staffReply " data-case_originates="<?php echo e($Originate->id); ?>" data-filrname="staffReply" data-index="0" id="input" type="file" name="staffReply[0][file]" accept="application/pdf">
                                                        <img src="<?php echo e(asset('website/assets/images/formtickbox.png')); ?>">
                                                        <span>
                                                                No file selected.
                                                            </span>
                                                    </label>
                                                </a>

                                                <p class="">
                                                    <span>Notes</span>
                                                    <input type="hidden" name="staffReply[0][case_originates]" value="<?php echo e($Originate->id); ?>">
                                                    <textarea name="staffReply[0][note]" id="" class="form-control description_para" cols="40" rows="8"></textarea>
                                                    <input type="date" name="staffReply[0][date]" class="form-control " class="form-control " value="">
                                                </p>
                                                <div class="btns_box">
                                                    <button type="button"  class="add_new_div btn_yellow" data-case_originates="<?php echo e($Originate->id); ?>" data-filrname="staffReply" data-index="0" >Add More Files</button>
                                                </div>
                                            <?php else: ?>
                                                <?php $count = 0;?>
                                                <?php $__currentLoopData = $Processed->where('form_id','5'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $keyz=>$element): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <a href="" class="multiple">
                                                        <label class="z_filelabel">
                                                            <input type="hidden" name="staffReply[<?php echo e($count); ?>][id]" value="<?php echo e($element->id); ?>">
                                                            <input style="display: none" class="form-control fileInput staffReply " data-case_originates="<?php echo e($element->originate_id); ?>" data-filrname="staffReply" data-index="<?php echo e($count); ?>" id="input" type="file" name="staffReply[<?php echo e($count); ?>][file]" accept="application/pdf">
                                                            <img src="<?php echo e(asset('website/assets/images/formcheckbox.svg')); ?>">

                                                        </label>

                                                    </a>
                                                    <?php if($count == 0): ?>
                                                        <button type="button"  class="add_new_div btn_yellow" data-case_originates="<?php echo e($element->originate_id); ?>" data-filrname="staffReply" data-index="<?php echo e($Processed->where('form_id','5')->count()-1); ?>" >Add More Files</button>
                                                    <?php endif; ?>

                                                    <p class="">
                                                        <span>Notes</span>
                                                        <input type="hidden" name="staffReply[<?php echo e($count); ?>][case_originates]" value="<?php echo e($element->originate_id); ?>">
                                                        <textarea name="staffReply[<?php echo e($count); ?>][note]" id="" class="form-control description_para" cols="40" rows="8"><?php echo e($element->description); ?></textarea>
                                                        <input type="date" name="staffReply[0][date]" class="form-control " class="form-control " value="<?php echo e($element->date); ?>">
                                                    </p>
                                                    <a class="btn btn_yellow pull-right" href="<?php echo e(route('originating_processed_destory' , [$element->id??''])); ?>"
                                                       title="Delete <?php echo e(preg_replace('/(?<=[a-z])[A-Z]|[A-Z](?=[a-z])/', ' $0', 'OriginatingProcessed')); ?>" onclick="return confirm(&quot;Confirm delete?&quot;)">
                                                        Delete
                                                    </a>
                                                    <?php $count++ ?>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php endif; ?>
                                        </div>
                                        <button type="button" data-form="5" class="btn btn_black submitButton" data-title="<?php echo e($name5); ?>" data-case_originates="<?php echo e($Originate->id); ?>" data-filrname="staffReply">Save</button>
                                    </div>
                                </div>
                                
                                
                                <div class="col-md-4">
                                    <div class="originating_process_card">
                                        <span class="sub_heading"><?php echo e($name6); ?></span>
                                        <div class="new_file_div">
                                            <?php if($Processed->where('form_id','6')->count() == 0): ?>
                                                <a href="javascript:void(0)" class="multiple">

                                                    <label class="z_filelabel">
                                                        <input style="display: none" class="form-control fileInput staffResponse" data-case_originates="<?php echo e($Originate->id); ?>" data-filrname="staffResponse" data-index="0" id="input" type="file" name="staffResponse[0][file]" accept="application/pdf">
                                                        <img src="<?php echo e(asset('website/assets/images/formtickbox.png')); ?>">
                                                        <span>
                                                                No file selected.
                                                            </span>
                                                    </label>
                                                </a>

                                                <p class="">
                                                    <span>Notes</span>
                                                    <input type="hidden" name="staffResponse[0][case_originates]" value="<?php echo e($Originate->id); ?>">
                                                    <textarea name="staffResponse[0][note]" id="" class="form-control description_para" cols="40" rows="8"></textarea>
                                                    <input type="date" name="staffResponse[0][date]" class="form-control " class="form-control " value="">
                                                </p>
                                                <div class="btns_box">
                                                <button type="button"  class="add_new_div btn_yellow" data-case_originates="<?php echo e($Originate->id); ?>" data-filrname="staffResponse" data-index="0" >Add More Files</button> </div>
                                            <?php else: ?>
                                                <?php $count = 0;?>
                                                <?php $__currentLoopData = $Processed->where('form_id','6'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $keyz=>$element): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <a href="" class="multiple">
                                                        <label class="z_filelabel">
                                                            <input type="hidden" name="staffResponse[<?php echo e($count); ?>][id]" value="<?php echo e($element->id); ?>">
                                                            <input style="display: none" class="form-control fileInput staffResponse" data-case_originates="<?php echo e($element->originate_id); ?>" data-filrname="staffResponse" data-index="<?php echo e($count); ?>" id="input" type="file" name="staffResponse[<?php echo e($count); ?>][file]" accept="application/pdf">
                                                            <img src="<?php echo e(asset('website/assets/images/formcheckbox.svg')); ?>">

                                                        </label>

                                                    </a>
                                                    <?php if($count == 0): ?>
                                                        <button type="button"  class="add_new_div btn_yellow" data-case_originates="<?php echo e($element->originate_id); ?>" data-filrname="staffResponse" data-index="<?php echo e($Processed->where('form_id','6')->count()-1); ?>" >Add More Files</button>
                                                    <?php endif; ?>

                                                    <p class="">
                                                        <span>Notes</span>
                                                        <input type="hidden" name="staffResponse[<?php echo e($count); ?>][case_originates]" value="<?php echo e($element->originate_id); ?>">
                                                        <textarea name="staffResponse[<?php echo e($count); ?>][note]" id="" class="form-control description_para" cols="40" rows="8"><?php echo e($element->description); ?></textarea>
                                                        <input type="date" name="staffResponse[0][date]" class="form-control " class="form-control " value="<?php echo e($element->date); ?>">
                                                    </p>
                                                    <a class="btn btn_yellow pull-right" href="<?php echo e(route('originating_processed_destory' , [$element->id??''])); ?>"
                                                       title="Delete <?php echo e(preg_replace('/(?<=[a-z])[A-Z]|[A-Z](?=[a-z])/', ' $0', 'OriginatingProcessed')); ?>" onclick="return confirm(&quot;Confirm delete?&quot;)">
                                                        Delete
                                                    </a>
                                                    <?php $count++ ?>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php endif; ?>
                                        </div>
                                        <button type="button" data-form="6" class="btn btn_black submitButton" data-title="<?php echo e($name6); ?>" data-case_originates="<?php echo e($Originate->id); ?>" data-filrname="staffResponse">Save</button>
                                    </div>
                                </div>
                                
                                
                                <div class="col-md-4">
                                    <div class="originating_process_card">
                                        <span class="sub_heading"><?php echo e($name7); ?></span>
                                        <div class="new_file_div">
                                            <?php if($Processed->where('form_id','7')->count() == 0): ?>
                                                <a href="javascript:void(0)" class="multiple">

                                                    <label class="z_filelabel">
                                                        <input style="display: none" class="form-control fileInput objectionFiles" data-case_originates="<?php echo e($Originate->id); ?>" data-filrname="objectionFiles" data-index="0" id="input" type="file" name="objectionFiles[0][file]" accept="application/pdf">
                                                        <img src="<?php echo e(asset('website/assets/images/formtickbox.png')); ?>">
                                                        <span>
                                                                No file selected.
                                                            </span>
                                                    </label>
                                                </a>

                                                <p class="">
                                                    <span>Notes</span>
                                                    <input type="hidden" name="objectionFiles[0][case_originates]" value="<?php echo e($Originate->id); ?>">
                                                    <textarea name="objectionFiles[0][note]" id="" class="form-control description_para" cols="40" rows="8"></textarea>
                                                    <input type="date" name="objectionFiles[0][date]" class="form-control " class="form-control " value="">
                                                </p>
                                                <div class="btns_box">
                                                    <button type="button"  class="add_new_div btn_yellow" data-case_originates="<?php echo e($Originate->id); ?>" data-filrname="objectionFiles" data-index="0" >Add More Files</button>
                                                </div>
                                            <?php else: ?>
                                                <?php $count = 0;?>
                                                <?php $__currentLoopData = $Processed->where('form_id','7'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $keyz=>$element): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <a href="" class="multiple">
                                                        <label class="z_filelabel">
                                                            <input type="hidden" name="objectionFiles[<?php echo e($count); ?>][id]" value="<?php echo e($element->id); ?>">
                                                            <input style="display: none" class="form-control fileInput objectionFiles" data-case_originates="<?php echo e($element->originate_id); ?>" data-filrname="objectionFiles" data-index="<?php echo e($count); ?>" id="input" type="file" name="objectionFiles[<?php echo e($count); ?>][file]" accept="application/pdf">
                                                            <img src="<?php echo e(asset('website/assets/images/formcheckbox.svg')); ?>">

                                                        </label>

                                                    </a>
                                                    <?php if($count == 0): ?>
                                                        <button type="button"  class="add_new_div btn_yellow" data-case_originates="<?php echo e($element->originate_id); ?>" data-filrname="objectionFiles" data-index="<?php echo e($Processed->where('form_id','7')->count()-1); ?>" >Add More Files</button>
                                                    <?php endif; ?>

                                                    <p class="">
                                                        <span>Notes</span>
                                                        <input type="hidden" name="objectionFiles[<?php echo e($count); ?>][case_originates]" value="<?php echo e($element->originate_id); ?>">
                                                        <textarea name="objectionFiles[<?php echo e($count); ?>][note]" id="" class="form-control description_para" cols="40" rows="8"><?php echo e($element->description); ?></textarea>
                                                        <input type="date" name="objectionFiles[0][date]" class="form-control " class="form-control " value="<?php echo e($element->date); ?>">
                                                    </p>
                                                    <a class="btn btn_yellow pull-right" href="<?php echo e(route('originating_processed_destory' , [$element->id??''])); ?>"
                                                       title="Delete <?php echo e(preg_replace('/(?<=[a-z])[A-Z]|[A-Z](?=[a-z])/', ' $0', 'OriginatingProcessed')); ?>" onclick="return confirm(&quot;Confirm delete?&quot;)">
                                                        Delete
                                                    </a>
                                                    <?php $count++ ?>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php endif; ?>
                                        </div>
                                        <button type="button" data-form="7" class="btn btn_black submitButton" data-title="<?php echo e($name7); ?>" data-case_originates="<?php echo e($Originate->id); ?>" data-filrname="objectionFiles">Save</button>
                                    </div>
                                </div>
                                
                                
                                <div class="col-md-4">
                                    <div class="originating_process_card">
                                        <span class="sub_heading"><?php echo e($name8); ?></span>
                                        <div class="new_file_div">
                                            <?php if($Processed->where('form_id','8')->count() == 0): ?>
                                                <a href="javascript:void(0)" class="multiple">

                                                    <label class="z_filelabel">
                                                        <input style="display: none" class="form-control fileInput examinationFiles" data-case_originates="<?php echo e($Originate->id); ?>" data-filrname="examinationFiles" data-index="0" id="input" type="file" name="examinationFiles[0][file]" accept="application/pdf">
                                                        <img src="<?php echo e(asset('website/assets/images/formtickbox.png')); ?>">
                                                        <span>
                                                                No file selected.
                                                            </span>
                                                    </label>
                                                </a>

                                                <p class="">
                                                    <span>Notes</span>
                                                    <input type="hidden" name="examinationFiles[0][case_originates]" value="<?php echo e($Originate->id); ?>">
                                                    <textarea name="examinationFiles[0][note]" id="" class="form-control description_para" cols="40" rows="8"></textarea>
                                                    <input type="date" name="examinationFiles[0][date]" class="form-control " class="form-control " value="">
                                                </p>
                                                <div class="btns_box">   <button type="button"  class="add_new_div btn_yellow" data-case_originates="<?php echo e($Originate->id); ?>" data-filrname="examinationFiles" data-index="0" >Add More Files</button> </div>
                                            <?php else: ?>
                                                <?php $count = 0;?>
                                                <?php $__currentLoopData = $Processed->where('form_id','8'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $keyz=>$element): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <a href="" class="multiple">
                                                        <label class="z_filelabel">
                                                            <input type="hidden" name="examinationFiles[<?php echo e($count); ?>][id]" value="<?php echo e($element->id); ?>">
                                                            <input style="display: none" class="form-control fileInput examinatio nFiles" data-case_originates="<?php echo e($element->originate_id); ?>" data-filrname="examinationFiles" data-index="<?php echo e($count); ?>" id="input" type="file" name="examinationFiles[<?php echo e($count); ?>][file]" accept="application/pdf">
                                                            <img src="<?php echo e(asset('website/assets/images/formcheckbox.svg')); ?>">

                                                        </label>

                                                    </a>
                                                    <?php if($count == 0): ?>
                                                        <button type="button"  class="add_new_div btn_yellow" data-case_originates="<?php echo e($element->originate_id); ?>" data-filrname="examinationFiles" data-index="<?php echo e($Processed->where('form_id','8')->count()-1); ?>" >Add More Files</button>
                                                    <?php endif; ?>

                                                    <p class="">
                                                        <span>Notes</span>
                                                        <input type="hidden" name="examinationFiles[<?php echo e($count); ?>][case_originates]" value="<?php echo e($element->originate_id); ?>">
                                                        <textarea name="examinationFiles[<?php echo e($count); ?>][note]" id="" class="form-control description_para" cols="40" rows="8"><?php echo e($element->description); ?></textarea>
                                                        <input type="date" name="examinationFiles[0][date]" class="form-control " class="form-control " value="<?php echo e($element->date); ?>">
                                                    </p>
                                                    <a class="btn btn_yellow pull-right" href="<?php echo e(route('originating_processed_destory' , [$element->id??''])); ?>"
                                                       title="Delete <?php echo e(preg_replace('/(?<=[a-z])[A-Z]|[A-Z](?=[a-z])/', ' $0', 'OriginatingProcessed')); ?>" onclick="return confirm(&quot;Confirm delete?&quot;)">
                                                        Delete
                                                    </a>
                                                    <?php $count++ ?>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php endif; ?>
                                        </div>
                                        <button type="button" data-form="8" class="btn btn_black submitButton" data-title="<?php echo e($name8); ?>" data-case_originates="<?php echo e($Originate->id); ?>" data-filrname="examinationFiles">Save</button>
                                    </div>
                                </div>
                                
                                
                                <div class="col-md-4">
                                    <div class="originating_process_card">
                                        <span class="sub_heading"><?php echo e($name9); ?></span>
                                        <div class="new_file_div">
                                            <?php if($Processed->where('form_id','9')->count() == 0): ?>
                                                <a href="javascript:void(0)" class="multiple">

                                                    <label class="z_filelabel">
                                                        <input style="display: none" class="form-control fileInput disclosureFiles" data-case_originates="<?php echo e($Originate->id); ?>" data-filrname="disclosureFiles" data-index="0" id="input" type="file" name="disclosureFiles[0][file]" accept="application/pdf">
                                                        <img src="<?php echo e(asset('website/assets/images/formtickbox.png')); ?>">
                                                        <span>
                                                                No file selected.
                                                            </span>
                                                    </label>
                                                </a>

                                                <p class="">
                                                    <span>Notes</span>
                                                    <input type="hidden" name="disclosureFiles[0][case_originates]" value="<?php echo e($Originate->id); ?>">
                                                    <textarea name="disclosureFiles[0][note]" id="" class="form-control description_para" cols="40" rows="8"></textarea>
                                                    <input type="date" name="disclosureFiles[0][date]" class="form-control " class="form-control " value="">
                                                </p>
                                                <div class="btns_box">   <button type="button"  class="add_new_div btn_yellow" data-case_originates="<?php echo e($Originate->id); ?>" data-filrname="disclosureFiles" data-index="0" >Add More Files</button> </div>
                                            <?php else: ?>
                                                <?php $count = 0;?>
                                                <?php $__currentLoopData = $Processed->where('form_id','9'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $keyz=>$element): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <a href="" class="multiple">
                                                        <label class="z_filelabel">
                                                            <input type="hidden" name="disclosureFiles[<?php echo e($count); ?>][id]" value="<?php echo e($element->id); ?>">
                                                            <input style="display: none" class="form-control fileInput disclosure Files" data-case_originates="<?php echo e($element->originate_id); ?>" data-filrname="disclosureFiles" data-index="<?php echo e($count); ?>" id="input" type="file" name="disclosureFiles[<?php echo e($count); ?>][file]" accept="application/pdf">
                                                            <img src="<?php echo e(asset('website/assets/images/formcheckbox.svg')); ?>">

                                                        </label>

                                                    </a>
                                                    <?php if($count == 0): ?>
                                                        <button type="button"  class="add_new_div btn_yellow" data-case_originates="<?php echo e($element->originate_id); ?>" data-filrname="disclosureFiles" data-index="<?php echo e($Processed->where('form_id','9')->count()-1); ?>" >Add More Files</button>
                                                    <?php endif; ?>

                                                    <p class="">
                                                        <span>Notes</span>
                                                        <input type="hidden" name="disclosureFiles[<?php echo e($count); ?>][case_originates]" value="<?php echo e($element->originate_id); ?>">
                                                        <textarea name="disclosureFiles[<?php echo e($count); ?>][note]" id="" class="form-control description_para" cols="40" rows="8"><?php echo e($element->description); ?></textarea>
                                                        <input type="date" name="disclosureFiles[0][date]" class="form-control " class="form-control " value="<?php echo e($element->date); ?>">
                                                    </p>
                                                    <a class="btn btn_yellow pull-right" href="<?php echo e(route('originating_processed_destory' , [$element->id??''])); ?>"
                                                       title="Delete <?php echo e(preg_replace('/(?<=[a-z])[A-Z]|[A-Z](?=[a-z])/', ' $0', 'OriginatingProcessed')); ?>" onclick="return confirm(&quot;Confirm delete?&quot;)">
                                                        Delete
                                                    </a>
                                                    <?php $count++ ?>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php endif; ?>
                                        </div>
                                        <button type="button" data-form="9" class="btn btn_black submitButton" data-title="<?php echo e($name9); ?>" data-case_originates="<?php echo e($Originate->id); ?>" data-filrname="disclosureFiles">Save</button>
                                    </div>
                                </div>
                                
                                
                                <div class="col-md-4">
                                    <div class="originating_process_card">
                                        <span class="sub_heading"><?php echo e($name10); ?></span>
                                        <div class="new_file_div">
                                            <?php if($Processed->where('form_id','10')->count() == 0): ?>
                                                <a href="javascript:void(0)" class="multiple">

                                                    <label class="z_filelabel">
                                                        <input style="display: none" class="form-control fileInput legalSubmissions" data-case_originates="<?php echo e($Originate->id); ?>" data-filrname="legalSubmissions" data-index="0" id="input" type="file" name="legalSubmissions[0][file]" accept="application/pdf">
                                                        <img src="<?php echo e(asset('website/assets/images/formtickbox.png')); ?>">
                                                        <span>
                                                                No file selected.
                                                            </span>
                                                    </label>
                                                </a>
                                                <div class="btns_box">
                                                <button type="button"  class="add_new_div btn_yellow" data-case_originates="<?php echo e($Originate->id); ?>" data-filrname="legalSubmissions" data-index="0" >Add More Files</button> </div>
                                                <p class="">
                                                    <span>Notes</span>
                                                    <input type="hidden" name="legalSubmissions[0][case_originates]" value="<?php echo e($Originate->id); ?>">
                                                    <textarea name="legalSubmissions[0][note]" id="" class="form-control description_para" cols="40" rows="8"></textarea>
                                                    <input type="date" name="legalSubmissions[0][date]" class="form-control " class="form-control " value="">
                                                </p>
                                            <?php else: ?>
                                                <?php $count = 0;?>
                                                <?php $__currentLoopData = $Processed->where('form_id','10'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $keyz=>$element): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <a href="" class="multiple">
                                                        <label class="z_filelabel">
                                                            <input type="hidden" name="legalSubmissions[<?php echo e($count); ?>][id]" value="<?php echo e($element->id); ?>">
                                                            <input style="display: none" class="form-control fileInput legalSubmi ssions" data-case_originates="<?php echo e($element->originate_id); ?>" data-filrname="legalSubmissions" data-index="<?php echo e($count); ?>" id="input" type="file" name="legalSubmissions[<?php echo e($count); ?>][file]" accept="application/pdf">
                                                            <img src="<?php echo e(asset('website/assets/images/formcheckbox.svg')); ?>">

                                                        </label>

                                                    </a>
                                                    <?php if($count == 0): ?>
                                                        <button type="button"  class="add_new_div btn_yellow" data-case_originates="<?php echo e($element->originate_id); ?>" data-filrname="legalSubmissions" data-index="<?php echo e($Processed->where('form_id','10')->count()-1); ?>" >Add More Files</button>
                                                    <?php endif; ?>

                                                    <p class="">
                                                        <span>Notes</span>
                                                        <input type="hidden" name="legalSubmissions[<?php echo e($count); ?>][case_originates]" value="<?php echo e($element->originate_id); ?>">
                                                        <textarea name="legalSubmissions[<?php echo e($count); ?>][note]" id="" class="form-control description_para" cols="40" rows="8"><?php echo e($element->description); ?></textarea>
                                                        <input type="date" name="legalSubmissions[0][date]" class="form-control " class="form-control " value="<?php echo e($element->date); ?>">
                                                    </p>
                                                    <a class="btn btn_yellow pull-right" href="<?php echo e(route('originating_processed_destory' , [$element->id??''])); ?>"
                                                       title="Delete <?php echo e(preg_replace('/(?<=[a-z])[A-Z]|[A-Z](?=[a-z])/', ' $0', 'OriginatingProcessed')); ?>" onclick="return confirm(&quot;Confirm delete?&quot;)">
                                                        Delete
                                                    </a>
                                                    <?php $count++ ?>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php endif; ?>
                                        </div>
                                        <button type="button" data-form="10" class="btn btn_black submitButton" data-title="<?php echo e($name10); ?>" data-case_originates="<?php echo e($Originate->id); ?>" data-filrname="legalSubmissions">Save</button>
                                    </div>
                                </div>
                                
                                
                                <div class="col-md-4">
                                    <div class="originating_process_card">
                                        <span class="sub_heading"> <?php echo e($name11); ?></span>
                                        <div class="new_file_div">
                                            <?php if($Processed->where('form_id','11')->count() == 0): ?>
                                                <a href="javascript:void(0)" class="multiple">

                                                    <label class="z_filelabel">
                                                        <input style="display: none" class="form-control fileInput judgementFiles" data-case_originates="<?php echo e($Originate->id); ?>" data-filrname="judgementFiles" data-index="0" id="input" type="file" name="judgementFiles[0][file]" accept="application/pdf">
                                                        <img src="<?php echo e(asset('website/assets/images/formtickbox.png')); ?>">
                                                        <span>
                                                                No file selected.
                                                            </span>
                                                    </label>
                                                </a>

                                                <p class="">
                                                    <span>Notes</span>
                                                    <input type="hidden" name="judgementFiles[0][case_originates]" value="<?php echo e($Originate->id); ?>">
                                                    <textarea name="judgementFiles[0][note]" id="" class="form-control description_para" cols="40" rows="8"></textarea>
                                                    <input type="date" name="judgementFiles[0][date]" class="form-control " class="form-control " value="">
                                                </p>
                                                <div class="btns_box">  <button type="button"  class="add_new_div btn_yellow" data-case_originates="<?php echo e($Originate->id); ?>" data-filrname="judgementFiles" data-index="0" >Add More Files</button></div>
                                            <?php else: ?>
                                                <?php $count = 0;?>
                                                <?php $__currentLoopData = $Processed->where('form_id','11'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $keyz=>$element): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <a href="" class="multiple">
                                                        <label class="z_filelabel">
                                                            <input type="hidden" name="judgementFiles[<?php echo e($count); ?>][id]" value="<?php echo e($element->id); ?>">
                                                            <input style="display: none" class="form-control fileInput judgementFiles" data-case_originates="<?php echo e($element->originate_id); ?>" data-filrname="judgementFiles" data-index="<?php echo e($count); ?>" id="input" type="file" name="judgementFiles[<?php echo e($count); ?>][file]" accept="application/pdf">
                                                            <img src="<?php echo e(asset('website/assets/images/formcheckbox.svg')); ?>">

                                                        </label>

                                                    </a>
                                                    <?php if($count == 0): ?>
                                                        <button type="button"  class="add_new_div btn_yellow" data-case_originates="<?php echo e($element->originate_id); ?>" data-filrname="judgementFiles" data-index="<?php echo e($Processed->where('form_id','11')->count()-1); ?>" >Add More Files</button>
                                                    <?php endif; ?>

                                                    <p class="">
                                                        <span>Notes</span>
                                                        <input type="hidden" name="judgementFiles[<?php echo e($count); ?>][case_originates]" value="<?php echo e($element->originate_id); ?>">
                                                        <textarea name="judgementFiles[<?php echo e($count); ?>][note]" id="" class="form-control description_para" cols="40" rows="8"><?php echo e($element->description); ?></textarea>
                                                        <input type="date" name="judgementFiles[0][date]" class="form-control " class="form-control " value="<?php echo e($element->date); ?>">
                                                    </p>
                                                    <a class="btn btn_yellow pull-right" href="<?php echo e(route('originating_processed_destory' , [$element->id??''])); ?>"
                                                       title="Delete <?php echo e(preg_replace('/(?<=[a-z])[A-Z]|[A-Z](?=[a-z])/', ' $0', 'OriginatingProcessed')); ?>" onclick="return confirm(&quot;Confirm delete?&quot;)">
                                                        Delete
                                                    </a>
                                                    <?php $count++ ?>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php endif; ?>
                                        </div>
                                        <button type="button" data-form="11" class="btn btn_black submitButton" data-title="<?php echo e($name11); ?>" data-case_originates="<?php echo e($Originate->id); ?>" data-filrname="judgementFiles">Save</button>
                                    </div>
                                </div>
                                
                                
                                <div class="col-md-4">
                                    <div class="originating_process_card">
                                        <span class="sub_heading"><?php echo e($name12); ?></span>
                                        <div class="new_file_div">
                                            <?php if($Processed->where('form_id','12')->count() == 0): ?>
                                                <a href="javascript:void(0)" class="multiple">

                                                    <label class="z_filelabel">
                                                        <input style="display: none" class="form-control fileInput noticeAppeal" data-case_originates="<?php echo e($Originate->id); ?>" data-filrname="noticeAppeal" data-index="0" id="input" type="file" name="noticeAppeal[0][file]" accept="application/pdf">
                                                        <img src="<?php echo e(asset('website/assets/images/formtickbox.png')); ?>">
                                                        <span>
                                                                No file selected.
                                                            </span>
                                                    </label>
                                                </a>

                                                <p class="">
                                                    <span>Notes</span>
                                                    <input type="hidden" name="noticeAppeal[0][case_originates]" value="<?php echo e($Originate->id); ?>">
                                                    <textarea name="noticeAppeal[0][note]" id="" class="form-control description_para" cols="40" rows="8"></textarea>
                                                    <input type="date" name="noticeAppeal[0][date]" class="form-control " class="form-control " value="">
                                                </p>
                                                <div class="btns_box">  <button type="button"  class="add_new_div btn_yellow" data-case_originates="<?php echo e($Originate->id); ?>" data-filrname="noticeAppeal" data-index="0" >Add More Files</button></div>
                                            <?php else: ?>
                                                <?php $count = 0;?>
                                                <?php $__currentLoopData = $Processed->where('form_id','12'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $keyz=>$element): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <a href="" class="multiple">
                                                        <label class="z_filelabel">
                                                            <input type="hidden" name="noticeAppeal[<?php echo e($count); ?>][id]" value="<?php echo e($element->id); ?>">
                                                            <input style="display: none" class="form-control fileInput noticeAppeal" data-case_originates="<?php echo e($element->originate_id); ?>" data-filrname="noticeAppeal" data-index="<?php echo e($count); ?>" id="input" type="file" name="noticeAppeal[<?php echo e($count); ?>][file]" accept="application/pdf">
                                                            <img src="<?php echo e(asset('website/assets/images/formcheckbox.svg')); ?>">

                                                        </label>

                                                    </a>
                                                    <?php if($count == 0): ?>
                                                        <button type="button"  class="add_new_div btn_yellow" data-case_originates="<?php echo e($element->originate_id); ?>" data-filrname="noticeAppeal" data-index="<?php echo e($Processed->where('form_id','12')->count()-1); ?>" >Add More Files</button>
                                                    <?php endif; ?>

                                                    <p class="">
                                                        <span>Notes</span>
                                                        <input type="hidden" name="noticeAppeal[<?php echo e($count); ?>][case_originates]" value="<?php echo e($element->originate_id); ?>">
                                                        <textarea name="noticeAppeal[<?php echo e($count); ?>][note]" id="" class="form-control description_para" cols="40" rows="8"><?php echo e($element->description); ?></textarea>
                                                        <input type="date" name="noticeAppeal[0][date]" class="form-control " value="<?php echo e($element->date); ?>">
                                                    </p>
                                                    <a class="btn btn_yellow pull-right" href="<?php echo e(route('originating_processed_destory' , [$element->id??''])); ?>"
                                                       title="Delete <?php echo e(preg_replace('/(?<=[a-z])[A-Z]|[A-Z](?=[a-z])/', ' $0', 'OriginatingProcessed')); ?>" onclick="return confirm(&quot;Confirm delete?&quot;)">
                                                        Delete
                                                    </a>
                                                    <?php $count++ ?>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php endif; ?>
                                        </div>
                                        <button type="button" data-form="12" class="btn btn_black submitButton" data-title="<?php echo e($name12); ?>" data-case_originates="<?php echo e($Originate->id); ?>" data-filrname="noticeAppeal">Save</button>
                                    </div>
                                </div>
                                
                                
                                <div class="col-md-4">
                                    <div class="originating_process_card">
                                        <span class="sub_heading"><?php echo e($name13); ?></span>
                                        <div class="new_file_div">
                                            <?php if($Processed->where('form_id','13')->count() == 0): ?>
                                                <a href="javascript:void(0)" class="multiple">

                                                    <label class="z_filelabel">
                                                        <input style="display: none" class="form-control fileInput recordAppeal" data-case_originates="<?php echo e($Originate->id); ?>" data-filrname="recordAppeal" data-index="0" id="input" type="file" name="recordAppeal[0][file]" accept="application/pdf">
                                                        <img src="<?php echo e(asset('website/assets/images/formtickbox.png')); ?>">
                                                        <span>
                                                                No file selected.
                                                            </span>
                                                    </label>
                                                </a>


                                                <p class="">
                                                    <span>Notes</span>
                                                    <input type="hidden" name="recordAppeal[0][case_originates]" value="<?php echo e($Originate->id); ?>">
                                                    <textarea name="recordAppeal[0][note]" id="" class="form-control description_para" cols="40" rows="8"></textarea>
                                                    <input type="date" name="recordAppeal[0][date]" class="form-control " value="">
                                                </p>
                                                <div class="btns_box">
                                                <button type="button"  class="add_new_div btn_yellow" data-case_originates="<?php echo e($Originate->id); ?>" data-filrname="recordAppeal" data-index="0" >Add More Files</button></div>
                                            <?php else: ?>
                                                <?php $count = 0;?>
                                                <?php $__currentLoopData = $Processed->where('form_id','13'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $keyz=>$element): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <a href="" class="multiple">
                                                        <label class="z_filelabel">
                                                            <input type="hidden" name="recordAppeal[<?php echo e($count); ?>][id]" value="<?php echo e($element->id); ?>">
                                                            <input style="display: none" class="form-control fileInput recordAppeal" data-case_originates="<?php echo e($element->originate_id); ?>" data-filrname="recordAppeal" data-index="<?php echo e($count); ?>" id="input" type="file" name="recordAppeal[<?php echo e($count); ?>][file]" accept="application/pdf">
                                                            <img src="<?php echo e(asset('website/assets/images/formcheckbox.svg')); ?>">

                                                        </label>

                                                    </a>
                                                    <?php if($count == 0): ?>
                                                        <button type="button"  class="add_new_div btn_yellow" data-case_originates="<?php echo e($element->originate_id); ?>" data-filrname="recordAppeal" data-index="<?php echo e($Processed->where('form_id','13')->count()-1); ?>" >Add More Files</button>
                                                    <?php endif; ?>

                                                    <p class="">
                                                        <span>Notes</span>
                                                        <input type="hidden" name="recordAppeal[<?php echo e($count); ?>][case_originates]" value="<?php echo e($element->originate_id); ?>">
                                                        <textarea name="recordAppeal[<?php echo e($count); ?>][note]" id="" class="form-control description_para" cols="40" rows="8"><?php echo e($element->description); ?></textarea>
                                                        <input type="date" name="recordAppeal[0][date]" class="form-control " value="<?php echo e($element->date); ?>">
                                                    </p>
                                                    <a class="btn btn_yellow pull-right" href="<?php echo e(route('originating_processed_destory' , [$element->id??''])); ?>"
                                                       title="Delete <?php echo e(preg_replace('/(?<=[a-z])[A-Z]|[A-Z](?=[a-z])/', ' $0', 'OriginatingProcessed')); ?>" onclick="return confirm(&quot;Confirm delete?&quot;)">
                                                        Delete
                                                    </a>
                                                    <?php $count++ ?>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php endif; ?>
                                        </div>
                                        <button type="button" data-form="13" class="btn btn_black submitButton" data-title="<?php echo e($name13); ?>" data-case_originates="<?php echo e($Originate->id); ?>" data-filrname="recordAppeal">Save</button>
                                    </div>
                                </div>
                                
                                
                                <div class="col-md-4">
                                    <div class="originating_process_card">
                                        <span class="sub_heading"><?php echo e($name14); ?></span>
                                        <div class="new_file_div">
                                            <?php if($Processed->where('form_id','14')->count() == 0): ?>
                                                <a href="javascript:void(0)" class="multiple">

                                                    <label class="z_filelabel">
                                                        <input style="display: none" class="form-control fileInput SubmissionFiles" data-case_originates="<?php echo e($Originate->id); ?>" data-filrname="SubmissionFiles" data-index="0" id="input" type="file" name="SubmissionFiles[0][file]" accept="application/pdf">
                                                        <img src="<?php echo e(asset('website/assets/images/formtickbox.png')); ?>">
                                                        <span>
                                                                No file selected.
                                                            </span>
                                                    </label>
                                                </a>

                                                <p class="">
                                                    <span>Notes</span>
                                                    <input type="hidden" name="SubmissionFiles[0][case_originates]" value="<?php echo e($Originate->id); ?>">
                                                    <textarea name="SubmissionFiles[0][note]" id="" class="form-control description_para" cols="40" rows="8"></textarea>
                                                    <input type="date" name="SubmissionFiles[0][date]" class="form-control " value="">
                                                </p>
                                                <div class="btns_box">      <button type="button"  class="add_new_div btn_yellow" data-case_originates="<?php echo e($Originate->id); ?>" data-filrname="SubmissionFiles" data-index="0" >Add More Files</button></div>
                                            <?php else: ?>
                                                <?php $count = 0;?>
                                                <?php $__currentLoopData = $Processed->where('form_id','14'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $keyz=>$element): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <a href="" class="multiple">
                                                        <label class="z_filelabel">
                                                            <input type="hidden" name="SubmissionFiles[<?php echo e($count); ?>][id]" value="<?php echo e($element->id); ?>">
                                                            <input style="display: none" class="form-control fileInput Submission Files" data-case_originates="<?php echo e($element->originate_id); ?>" data-filrname="SubmissionFiles" data-index="<?php echo e($count); ?>" id="input" type="file" name="SubmissionFiles[<?php echo e($count); ?>][file]" accept="application/pdf">
                                                            <img src="<?php echo e(asset('website/assets/images/formcheckbox.svg')); ?>">

                                                        </label>

                                                    </a>
                                                    <?php if($count == 0): ?>
                                                        <button type="button"  class="add_new_div btn_yellow" data-case_originates="<?php echo e($element->originate_id); ?>" data-filrname="SubmissionFiles" data-index="<?php echo e($Processed->where('form_id','14')->count()-1); ?>" >Add More Files</button>
                                                    <?php endif; ?>

                                                    <p class="">
                                                        <span>Notes</span>
                                                        <input type="hidden" name="SubmissionFiles[<?php echo e($count); ?>][case_originates]" value="<?php echo e($element->originate_id); ?>">
                                                        <textarea name="SubmissionFiles[<?php echo e($count); ?>][note]" id="" class="form-control description_para" cols="40" rows="8"><?php echo e($element->description); ?></textarea>
                                                        <input type="date" name="SubmissionFiles[0][date]" class="form-control " value="<?php echo e($element->date); ?>">
                                                    </p>
                                                    <a class="btn btn_yellow pull-right" href="<?php echo e(route('originating_processed_destory' , [$element->id??''])); ?>"
                                                       title="Delete <?php echo e(preg_replace('/(?<=[a-z])[A-Z]|[A-Z](?=[a-z])/', ' $0', 'OriginatingProcessed')); ?>" onclick="return confirm(&quot;Confirm delete?&quot;)">
                                                        Delete
                                                    </a>
                                                    <?php $count++ ?>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php endif; ?>
                                        </div>
                                        <button type="button" data-form="14" class="btn btn_black submitButton" data-title="<?php echo e($name14); ?>" data-case_originates="<?php echo e($Originate->id); ?>" data-filrname="SubmissionFiles">Save</button>
                                    </div>
                                </div>
                                
                                
                                <div class="col-md-4">
                                    <div class="originating_process_card">
                                        <span class="sub_heading"><?php echo e($name15); ?></span>
                                        <div class="new_file_div">
                                            <?php if($Processed->where('form_id','15')->count() == 0): ?>
                                                <a href="javascript:void(0)" class="multiple">

                                                    <label class="z_filelabel">
                                                        <input style="display: none" class="form-control fileInput JudgmentFiles" data-case_originates="<?php echo e($Originate->id); ?>" data-filrname="JudgmentFiles" data-index="0" id="input" type="file" name="JudgmentFiles[0][file]" accept="application/pdf">
                                                        <img src="<?php echo e(asset('website/assets/images/formtickbox.png')); ?>">
                                                        <span>
                                                                No file selected.
                                                            </span>
                                                    </label>
                                                </a>

                                                <p class="">
                                                    <span>Notes</span>
                                                    <input type="hidden" name="JudgmentFiles[0][case_originates]" value="<?php echo e($Originate->id); ?>">
                                                    <textarea name="JudgmentFiles[0][note]" id="" class="form-control description_para" cols="40" rows="8"></textarea>
                                                    <input type="date" name="JudgmentFiles[0][date]" class="form-control " value="">
                                                </p>
                                                <div class="btns_box">   <button type="button"  class="add_new_div btn_yellow" data-case_originates="<?php echo e($Originate->id); ?>" data-filrname="JudgmentFiles" data-index="0" >Add More Files</button></div>
                                            <?php else: ?>
                                                <?php $count = 0;?>
                                                <?php $__currentLoopData = $Processed->where('form_id','15'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $keyz=>$element): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <a href="" class="multiple">
                                                        <label class="z_filelabel">
                                                            <input type="hidden" name="JudgmentFiles[<?php echo e($count); ?>][id]" value="<?php echo e($element->id); ?>">
                                                            <input style="display: none" class="form-control fileInput JudgmentFiles" data-case_originates="<?php echo e($element->originate_id); ?>" data-filrname="JudgmentFiles" data-index="<?php echo e($count); ?>" id="input" type="file" name="JudgmentFiles[<?php echo e($count); ?>][file]" accept="application/pdf">
                                                            <img src="<?php echo e(asset('website/assets/images/formcheckbox.svg')); ?>">

                                                        </label>

                                                    </a>
                                                    <?php if($count == 0): ?>
                                                        <button type="button"  class="add_new_div btn_yellow" data-case_originates="<?php echo e($element->originate_id); ?>" data-filrname="JudgmentFiles" data-index="<?php echo e($Processed->where('form_id','15')->count()-1); ?>" >Add More Files</button>
                                                    <?php endif; ?>

                                                    <p class="">
                                                        <span>Notes</span>
                                                        <input type="hidden" name="JudgmentFiles[<?php echo e($count); ?>][case_originates]" value="<?php echo e($element->originate_id); ?>">
                                                        <textarea name="JudgmentFiles[<?php echo e($count); ?>][note]" id="" class="form-control description_para" cols="40" rows="8"><?php echo e($element->description); ?></textarea>
                                                        <input type="date" name="JudgmentFiles[0][date]" class="form-control " value="<?php echo e($element->date); ?>">
                                                    </p>
                                                    <a class="btn btn_yellow pull-right" href="<?php echo e(route('originating_processed_destory' , [$element->id??''])); ?>"
                                                       title="Delete <?php echo e(preg_replace('/(?<=[a-z])[A-Z]|[A-Z](?=[a-z])/', ' $0', 'OriginatingProcessed')); ?>" onclick="return confirm(&quot;Confirm delete?&quot;)">
                                                        Delete
                                                    </a>
                                                    <?php $count++ ?>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php endif; ?>
                                        </div>
                                        <button type="button" data-form="15" class="btn btn_black submitButton" data-title="<?php echo e($name15); ?>" data-case_originates="<?php echo e($Originate->id); ?>" data-filrname="JudgmentFiles">Save</button>
                                    </div>
                                </div>
                                
                                
                                <div class="col-md-4">
                                    <div class="originating_process_card">
                                        <span class="sub_heading"><?php echo e($name16); ?></span>
                                        <div class="new_file_div">
                                            <?php if($Processed->where('form_id','16')->count() == 0): ?>
                                                <a href="javascript:void(0)" class="multiple">

                                                    <label class="z_filelabel">
                                                        <input style="display: none" class="form-control fileInput orderCOA"  data-case_originates="<?php echo e($Originate->id); ?>" data-filrname="orderCOA" data-index="0" id="input" type="file" name="orderCOA[0][file]" accept="application/pdf">
                                                        <img src="<?php echo e(asset('website/assets/images/formtickbox.png')); ?>">
                                                        <span>
                                                                No file selected.
                                                            </span>
                                                    </label>
                                                </a>

                                                <p class="">
                                                    <span>Notes</span>
                                                    <input type="hidden" name="orderCOA[0][case_originates]" value="<?php echo e($Originate->id); ?>">
                                                    <textarea name="orderCOA[0][note]" id="" class="form-control description_para" cols="40" rows="8"></textarea>
                                                    <input type="date" name="orderCOA[0][date]" class="form-control " value="">
                                                </p>
                                                <div class="btns_box">  <button type="button"  class="add_new_div btn_yellow" data-case_originates="<?php echo e($Originate->id); ?>" data-filrname="orderCOA" data-index="0" >Add More Files</button></div>
                                            <?php else: ?>
                                                <?php $count = 0;?>
                                                <?php $__currentLoopData = $Processed->where('form_id','16'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $keyz=>$element): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <a href="" class="multiple">
                                                        <label class="z_filelabel">
                                                            <input type="hidden" name="orderCOA[<?php echo e($count); ?>][id]" value="<?php echo e($element->id); ?>">
                                                            <input style="display: none" class="form-control fileInput orderCOA"  data-case_originates="<?php echo e($element->originate_id); ?>" data-filrname="orderCOA" data-index="<?php echo e($count); ?>" id="input" type="file" name="orderCOA[<?php echo e($count); ?>][file]" accept="application/pdf">
                                                            <img src="<?php echo e(asset('website/assets/images/formcheckbox.svg')); ?>">

                                                        </label>

                                                    </a>
                                                    <?php if($count == 0): ?>
                                                        <button type="button"  class="add_new_div btn_yellow" data-case_originates="<?php echo e($element->originate_id); ?>" data-filrname="orderCOA" data-index="<?php echo e($Processed->where('form_id','16')->count()-1); ?>" >Add More Files</button>
                                                    <?php endif; ?>

                                                    <p class="">
                                                        <span>Notes</span>
                                                        <input type="hidden" name="orderCOA[<?php echo e($count); ?>][case_originates]" value="<?php echo e($element->originate_id); ?>">
                                                        <textarea name="orderCOA[<?php echo e($count); ?>][note]" id="" class="form-control description_para" cols="40" rows="8"><?php echo e($element->description); ?></textarea>
                                                        <input type="date" name="orderCOA[0][date]" class="form-control " value="<?php echo e($element->date); ?>">
                                                    </p>
                                                    <a class="btn btn_yellow pull-right" href="<?php echo e(route('originating_processed_destory' , [$element->id??''])); ?>"
                                                       title="Delete <?php echo e(preg_replace('/(?<=[a-z])[A-Z]|[A-Z](?=[a-z])/', ' $0', 'OriginatingProcessed')); ?>" onclick="return confirm(&quot;Confirm delete?&quot;)">
                                                        Delete
                                                    </a>
                                                    <?php $count++ ?>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php endif; ?>
                                        </div>
                                        <button type="button" data-form="16" class="btn btn_black submitButton" data-title="<?php echo e($name16); ?>" data-case_originates="<?php echo e($Originate->id); ?>" data-filrname="orderCOA">Save</button>
                                    </div>
                                </div>
                                
                                
                                <div class="col-md-4">
                                    <div class="originating_process_card">
                                        <span class="sub_heading"><?php echo e($name17); ?></span>
                                        <div class="new_file_div">
                                            <?php if($Processed->where('form_id','17')->count() == 0): ?>
                                                <a href="javascript:void(0)" class="multiple">

                                                    <label class="z_filelabel">
                                                        <input style="display: none" class="form-control fileInput conditionalLeaves" data-case_originates="<?php echo e($Originate->id); ?>" data-filrname="conditionalLeaves" data-index="0" id="input" type="file" name="conditionalLeaves[0][file]" accept="application/pdf">
                                                        <img src="<?php echo e(asset('website/assets/images/formtickbox.png')); ?>">
                                                        <span>
                                                                No file selected.
                                                            </span>
                                                    </label>
                                                </a>

                                                <p class="">
                                                    <span>Notes</span>
                                                    <input type="hidden" name="conditionalLeaves[0][case_originates]" value="<?php echo e($Originate->id); ?>">
                                                    <textarea name="conditionalLeaves[0][note]" id="" class="form-control description_para" cols="40" rows="8"></textarea>
                                                    <input type="date" name="conditionalLeaves[0][date]" class="form-control " value="">
                                                </p>
                                                <div class="btns_box">     <button type="button"  class="add_new_div btn_yellow" data-case_originates="<?php echo e($Originate->id); ?>" data-filrname="conditionalLeaves" data-index="0" >Add More Files</button></div>
                                            <?php else: ?>
                                                <?php $count = 0;?>
                                                <?php $__currentLoopData = $Processed->where('form_id','17'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $keyz=>$element): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <a href="" class="multiple">
                                                        <label class="z_filelabel">
                                                            <input type="hidden" name="conditionalLeaves[<?php echo e($count); ?>][id]" value="<?php echo e($element->id); ?>">
                                                            <input style="display: none" class="form-control fileInput conditionalLeaves" data-case_originates="<?php echo e($element->originate_id); ?>" data-filrname="conditionalLeaves" data-index="<?php echo e($count); ?>" id="input" type="file" name="conditionalLeaves[<?php echo e($count); ?>][file]" accept="application/pdf">
                                                            <img src="<?php echo e(asset('website/assets/images/formcheckbox.svg')); ?>">

                                                        </label>

                                                    </a>
                                                    <?php if($count == 0): ?>
                                                        <button type="button"  class="add_new_div btn_yellow" data-case_originates="<?php echo e($element->originate_id); ?>" data-filrname="conditionalLeaves" data-index="<?php echo e($Processed->where('form_id','17')->count()-1); ?>" >Add More Files</button>
                                                    <?php endif; ?>

                                                    <p class="">
                                                        <span>Notes</span>
                                                        <input type="hidden" name="conditionalLeaves[<?php echo e($count); ?>][case_originates]" value="<?php echo e($element->originate_id); ?>">
                                                        <textarea name="conditionalLeaves[<?php echo e($count); ?>][note]" id="" class="form-control description_para" cols="40" rows="8"><?php echo e($element->description); ?></textarea>
                                                        <input type="date" name="conditionalLeaves[0][date]" class="form-control " value="<?php echo e($element->date); ?>">
                                                    </p>
                                                    <a class="btn btn_yellow pull-right" href="<?php echo e(route('originating_processed_destory' , [$element->id??''])); ?>"
                                                       title="Delete <?php echo e(preg_replace('/(?<=[a-z])[A-Z]|[A-Z](?=[a-z])/', ' $0', 'OriginatingProcessed')); ?>" onclick="return confirm(&quot;Confirm delete?&quot;)">
                                                        Delete
                                                    </a>
                                                    <?php $count++ ?>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php endif; ?>
                                        </div>
                                        <button type="button" data-form="17" class="btn btn_black submitButton" data-title="<?php echo e($name17); ?>" data-case_originates="<?php echo e($Originate->id); ?>" data-filrname="conditionalLeaves">Save</button>
                                    </div>
                                </div>
                                
                                
                                <div class="col-md-4">
                                    <div class="originating_process_card">
                                        <span class="sub_heading"><?php echo e($name18); ?></span>
                                        <div class="new_file_div">
                                            <?php if($Processed->where('form_id','18')->count() == 0): ?>
                                                <a href="javascript:void(0)" class="multiple">

                                                    <label class="z_filelabel">
                                                        <input style="display: none" class="form-control fileInput noticeAppealFiles" data-case_originates="<?php echo e($Originate->id); ?>" data-filrname="noticeAppealFiles" data-index="0" id="input" type="file" name="noticeAppealFiles[0][file]" accept="application/pdf">
                                                        <img src="<?php echo e(asset('website/assets/images/formtickbox.png')); ?>">
                                                        <span>
                                                                No file selected.
                                                            </span>
                                                    </label>
                                                </a>

                                                <p class="">
                                                    <span>Notes</span>
                                                    <input type="hidden" name="noticeAppealFiles[0][case_originates]" value="<?php echo e($Originate->id); ?>">
                                                    <textarea name="noticeAppealFiles[0][note]" id="" class="form-control description_para" cols="40" rows="8"></textarea>
                                                    <input type="date" name="noticeAppealFiles[0][date]" class="form-control " value="">
                                                </p>

                                                <div class="btns_box"> <button type="button"  class="add_new_div btn_yellow" data-case_originates="<?php echo e($Originate->id); ?>" data-filrname="noticeAppealFiles" data-index="0" >Add More Files</button></div>
                                            <?php else: ?>
                                                <?php $count = 0;?>
                                                <?php $__currentLoopData = $Processed->where('form_id','18'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $keyz=>$element): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <a href="" class="multiple">
                                                        <label class="z_filelabel">
                                                            <input type="hidden" name="noticeAppealFiles[<?php echo e($count); ?>][id]" value="<?php echo e($element->id); ?>">
                                                            <input style="display: none" class="form-control fileInput noticeAppealFiles" data-case_originates="<?php echo e($element->originate_id); ?>" data-filrname="noticeAppealFiles" data-index="<?php echo e($count); ?>" id="input" type="file" name="noticeAppealFiles[<?php echo e($count); ?>][file]" accept="application/pdf">
                                                            <img src="<?php echo e(asset('website/assets/images/formcheckbox.svg')); ?>">

                                                        </label>

                                                    </a>
                                                    <?php if($count == 0): ?>
                                                        <button type="button"  class="add_new_div btn_yellow" data-case_originates="<?php echo e($element->originate_id); ?>" data-filrname="noticeAppealFiles" data-index="<?php echo e($Processed->where('form_id','18')->count()-1); ?>" >Add More Files</button>
                                                    <?php endif; ?>

                                                    <p class="">
                                                        <span>Notes</span>
                                                        <input type="hidden" name="noticeAppealFiles[<?php echo e($count); ?>][case_originates]" value="<?php echo e($element->originate_id); ?>">
                                                        <textarea name="noticeAppealFiles[<?php echo e($count); ?>][note]" id="" class="form-control description_para" cols="40" rows="8"><?php echo e($element->description); ?></textarea>
                                                        <input type="date" name="noticeAppealFiles[0][date]" class="form-control " value="<?php echo e($element->date); ?>">
                                                    </p>
                                                    <a class="btn btn_yellow pull-right" href="<?php echo e(route('originating_processed_destory' , [$element->id??''])); ?>"
                                                       title="Delete <?php echo e(preg_replace('/(?<=[a-z])[A-Z]|[A-Z](?=[a-z])/', ' $0', 'OriginatingProcessed')); ?>" onclick="return confirm(&quot;Confirm delete?&quot;)">
                                                        Delete
                                                    </a>
                                                    <?php $count++ ?>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php endif; ?>
                                        </div>
                                        <button type="button" data-form="18" class="btn btn_black submitButton" data-title="<?php echo e($name18); ?>" data-case_originates="<?php echo e($Originate->id); ?>" data-filrname="noticeAppealFiles">Save</button>
                                    </div>
                                </div>
                                
                                
                                <div class="col-md-4">
                                    <div class="originating_process_card">
                                        <span class="sub_heading"><?php echo e($name19); ?></span>
                                        <div class="new_file_div">
                                            <?php if($Processed->where('form_id','19')->count() == 0): ?>
                                                <a href="javascript:void(0)" class="multiple">

                                                    <label class="z_filelabel">
                                                        <input style="display: none" class="form-control fileInput CertifiedFiles" data-case_originates="<?php echo e($Originate->id); ?>" data-filrname="CertifiedFiles" data-index="0" id="input" type="file" name="CertifiedFiles[0][file]" accept="application/pdf">
                                                        <img src="<?php echo e(asset('website/assets/images/formtickbox.png')); ?>">
                                                        <span>
                                                                No file selected.
                                                            </span>
                                                    </label>
                                                </a>

                                                <p class="">
                                                    <span>Notes</span>
                                                    <input type="hidden" name="CertifiedFiles[0][case_originates]" value="<?php echo e($Originate->id); ?>">
                                                    <textarea name="CertifiedFiles[0][note]" id="" class="form-control description_para" cols="40" rows="8"></textarea>
                                                    <input type="date" name="CertifiedFiles[0][date]" class="form-control " value="">
                                                </p>
                                                <div class="btns_box"><button type="button"  class="add_new_div btn_yellow" data-case_originates="<?php echo e($Originate->id); ?>" data-filrname="CertifiedFiles" data-index="0" >Add More Files</button></div>
                                            <?php else: ?>
                                                <?php $count = 0;?>
                                                <?php $__currentLoopData = $Processed->where('form_id','19'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $keyz=>$element): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <a href="" class="multiple">
                                                        <label class="z_filelabel">
                                                            <input type="hidden" name="CertifiedFiles[<?php echo e($count); ?>][id]" value="<?php echo e($element->id); ?>">
                                                            <input style="display: none" class="form-control fileInput CertifiedFiles" data-case_originates="<?php echo e($element->originate_id); ?>" data-filrname="CertifiedFiles" data-index="<?php echo e($count); ?>" id="input" type="file" name="CertifiedFiles[<?php echo e($count); ?>][file]" accept="application/pdf">
                                                            <img src="<?php echo e(asset('website/assets/images/formcheckbox.svg')); ?>">

                                                        </label>

                                                    </a>
                                                    <?php if($count == 0): ?>
                                                        <button type="button"  class="add_new_div btn_yellow" data-case_originates="<?php echo e($element->originate_id); ?>" data-filrname="CertifiedFiles" data-index="<?php echo e($Processed->where('form_id','19')->count()-1); ?>" >Add More Files</button>
                                                    <?php endif; ?>

                                                    <p class="">
                                                        <span>Notes</span>
                                                        <input type="hidden" name="CertifiedFiles[<?php echo e($count); ?>][case_originates]" value="<?php echo e($element->originate_id); ?>">
                                                        <textarea name="CertifiedFiles[<?php echo e($count); ?>][note]" id="" class="form-control description_para" cols="40" rows="8"><?php echo e($element->description); ?></textarea>
                                                        <input type="date" name="CertifiedFiles[0][date]" class="form-control " value="<?php echo e($element->date); ?>">
                                                    </p>
                                                    <a class="btn btn_yellow pull-right" href="<?php echo e(route('originating_processed_destory' , [$element->id??''])); ?>"
                                                       title="Delete <?php echo e(preg_replace('/(?<=[a-z])[A-Z]|[A-Z](?=[a-z])/', ' $0', 'OriginatingProcessed')); ?>" onclick="return confirm(&quot;Confirm delete?&quot;)">
                                                        Delete
                                                    </a>
                                                    <?php $count++ ?>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php endif; ?>
                                        </div>
                                        <button type="button" data-form="19" class="btn btn_black submitButton" data-title="<?php echo e($name19); ?>" data-case_originates="<?php echo e($Originate->id); ?>" data-filrname="CertifiedFiles">Save</button>
                                    </div>
                                </div>
                                
                                
                                <div class="col-md-4">
                                    <div class="originating_process_card">
                                        <span class="sub_heading"><?php echo e($name20); ?></span>
                                        <div class="new_file_div">
                                            <?php if($Processed->where('form_id','20')->count() == 0): ?>
                                                <a href="javascript:void(0)" class="multiple">

                                                    <label class="z_filelabel">
                                                        <input style="display: none" class="form-control fileInput ReproducedFiles" data-case_originates="<?php echo e($Originate->id); ?>" data-filrname="ReproducedFiles" data-index="0" id="input" type="file" name="ReproducedFiles[0][file]" accept="application/pdf">
                                                        <img src="<?php echo e(asset('website/assets/images/formtickbox.png')); ?>">
                                                        <span>
                                                                No file selected.
                                                            </span>
                                                    </label>
                                                </a>

                                                <p class="">
                                                    <span>Notes</span>
                                                    <input type="hidden" name="ReproducedFiles[0][case_originates]" value="<?php echo e($Originate->id); ?>">
                                                    <textarea name="ReproducedFiles[0][note]" id="" class="form-control description_para" cols="40" rows="8"></textarea>
                                                    <input type="date" name="ReproducedFiles[0][date]" class="form-control " value="">
                                                </p>

                                                <div class="btns_box">   <button type="button"  class="add_new_div btn_yellow" data-case_originates="<?php echo e($Originate->id); ?>" data-filrname="ReproducedFiles" data-index="0" >Add More Files</button></div>
                                            <?php else: ?>
                                                <?php $count = 0;?>
                                                <?php $__currentLoopData = $Processed->where('form_id','20'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $keyz=>$element): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <a href="" class="multiple">
                                                        <label class="z_filelabel">
                                                            <input type="hidden" name="ReproducedFiles[<?php echo e($count); ?>][id]" value="<?php echo e($element->id); ?>">
                                                            <input style="display: none" class="form-control fileInput ReproducedFiles" data-case_originates="<?php echo e($element->originate_id); ?>" data-filrname="ReproducedFiles" data-index="<?php echo e($count); ?>" id="input" type="file" name="ReproducedFiles[<?php echo e($count); ?>][file]" accept="application/pdf">
                                                            <img src="<?php echo e(asset('website/assets/images/formcheckbox.svg')); ?>">

                                                        </label>

                                                    </a>
                                                    <?php if($count == 0): ?>
                                                        <button type="button"  class="add_new_div btn_yellow" data-case_originates="<?php echo e($element->originate_id); ?>" data-filrname="ReproducedFiles" data-index="<?php echo e($Processed->where('form_id','20')->count()-1); ?>" >Add More Files</button>
                                                    <?php endif; ?>

                                                    <p class="">
                                                        <span>Notes</span>
                                                        <input type="hidden" name="ReproducedFiles[<?php echo e($count); ?>][case_originates]" value="<?php echo e($element->originate_id); ?>">
                                                        <textarea name="ReproducedFiles[<?php echo e($count); ?>][note]" id="" class="form-control description_para" cols="40" rows="8"><?php echo e($element->description); ?></textarea>
                                                        <input type="date" name="ReproducedFiles[0][date]" class="form-control " value="<?php echo e($element->date); ?>">
                                                    </p>
                                                    <a class="btn btn_yellow pull-right" href="<?php echo e(route('originating_processed_destory' , [$element->id??''])); ?>"
                                                       title="Delete <?php echo e(preg_replace('/(?<=[a-z])[A-Z]|[A-Z](?=[a-z])/', ' $0', 'OriginatingProcessed')); ?>" onclick="return confirm(&quot;Confirm delete?&quot;)">
                                                        Delete
                                                    </a>
                                                    <?php $count++ ?>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php endif; ?>
                                        </div>
                                        <button type="button" data-form="20" class="btn btn_black submitButton" data-title="<?php echo e($name20); ?>" data-case_originates="<?php echo e($Originate->id); ?>" data-filrname="ReproducedFiles">Save</button>
                                    </div>
                                </div>
                                
                                
                                <div class="col-md-4">
                                    <div class="originating_process_card">
                                        <span class="sub_heading"><?php echo e($name21); ?></span>
                                        <div class="new_file_div">
                                            <?php if($Processed->where('form_id','21')->count() == 0): ?>
                                                <a href="javascript:void(0)" class="multiple">

                                                    <label class="z_filelabel">
                                                        <input style="display: none" class="form-control fileInput SFIFiles"  data-case_originates="<?php echo e($Originate->id); ?>" data-filrname="SFIFiles" data-index="0" id="input" type="file" name="SFIFiles[0][file]" accept="application/pdf">
                                                        <img src="<?php echo e(asset('website/assets/images/formtickbox.png')); ?>">
                                                        <span>
                                                                No file selected.
                                                            </span>
                                                    </label>
                                                </a>

                                                <p class="">
                                                    <span>Notes</span>
                                                    <input type="hidden" name="SFIFiles[0][case_originates]" value="<?php echo e($Originate->id); ?>">
                                                    <textarea name="SFIFiles[0][note]" id="" class="form-control description_para" cols="40" rows="8"></textarea>
                                                    <input type="date" name="SFIFiles[0][date]" class="form-control " value="">
                                                </p>
                                                <div class="btns_box">   <button type="button"  class="add_new_div btn_yellow" data-case_originates="<?php echo e($Originate->id); ?>" data-filrname="SFIFiles" data-index="0" >Add More Files</button></div>
                                            <?php else: ?>
                                                <?php $count = 0;?>
                                                <?php $__currentLoopData = $Processed->where('form_id','21'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $keyz=>$element): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <a href="" class="multiple">
                                                        <label class="z_filelabel">
                                                            <input type="hidden" name="SFIFiles[<?php echo e($count); ?>][id]" value="<?php echo e($element->id); ?>">
                                                            <input style="display: none" class="form-control fileInput SFIFiles"  data-case_originates="<?php echo e($element->originate_id); ?>" data-filrname="SFIFiles" data-index="<?php echo e($count); ?>" id="input" type="file" name="SFIFiles[<?php echo e($count); ?>][file]" accept="application/pdf">
                                                            <img src="<?php echo e(asset('website/assets/images/formcheckbox.svg')); ?>">

                                                        </label>

                                                    </a>
                                                    <?php if($count == 0): ?>
                                                        <button type="button"  class="add_new_div btn_yellow" data-case_originates="<?php echo e($element->originate_id); ?>" data-filrname="SFIFiles" data-index="<?php echo e($Processed->where('form_id','21')->count()-1); ?>" >Add More Files</button>
                                                    <?php endif; ?>

                                                    <p class="">
                                                        <span>Notes</span>
                                                        <input type="hidden" name="SFIFiles[<?php echo e($count); ?>][case_originates]" value="<?php echo e($element->originate_id); ?>">
                                                        <textarea name="SFIFiles[<?php echo e($count); ?>][note]" id="" class="form-control description_para" cols="40" rows="8"><?php echo e($element->description); ?></textarea>
                                                        <input type="date" name="SFIFiles[0][date]" class="form-control " value="<?php echo e($element->date); ?>">
                                                    </p>
                                                    <a class="btn btn_yellow pull-right" href="<?php echo e(route('originating_processed_destory' , [$element->id??''])); ?>"
                                                       title="Delete <?php echo e(preg_replace('/(?<=[a-z])[A-Z]|[A-Z](?=[a-z])/', ' $0', 'OriginatingProcessed')); ?>" onclick="return confirm(&quot;Confirm delete?&quot;)">
                                                        Delete
                                                    </a>
                                                    <?php $count++ ?>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php endif; ?>
                                        </div>
                                        <button type="button" data-form="21" class="btn btn_black submitButton" data-title="<?php echo e($name21); ?>" data-case_originates="<?php echo e($Originate->id); ?>" data-filrname="SFIFiles">Save</button>
                                    </div>
                                </div>
                                
                                
                                <div class="col-md-4">
                                    <div class="originating_process_card">
                                        <span class="sub_heading"><?php echo e($name22); ?></span>
                                        <div class="new_file_div">
                                            <?php if($Processed->where('form_id','22')->count() == 0): ?>
                                                <a href="javascript:void(0)" class="multiple">

                                                    <label class="z_filelabel">
                                                        <input style="display: none" class="form-control fileInput caseAppellantFiles" data-case_originates="<?php echo e($Originate->id); ?>" data-filrname="caseAppellantFiles" data-index="0" id="input" type="file" name="caseAppellantFiles[0][file]" accept="application/pdf">
                                                        <img src="<?php echo e(asset('website/assets/images/formtickbox.png')); ?>">
                                                        <span>
                                                                No file selected.
                                                            </span>
                                                    </label>
                                                </a>

                                                <p class="">
                                                    <span>Notes</span>
                                                    <input type="hidden" name="caseAppellantFiles[0][case_originates]" value="<?php echo e($Originate->id); ?>">
                                                    <textarea name="caseAppellantFiles[0][note]" id="" class="form-control description_para" cols="40" rows="8"></textarea>
                                                    <input type="date" name="caseAppellantFiles[0][date]" class="form-control " value="">
                                                </p>
                                                <div class="btns_box">     <button type="button"  class="add_new_div btn_yellow" data-case_originates="<?php echo e($Originate->id); ?>" data-filrname="caseAppellantFiles" data-index="0" >Add More Files</button></div>
                                            <?php else: ?>
                                                <?php $count = 0;?>
                                                <?php $__currentLoopData = $Processed->where('form_id','22'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $keyz=>$element): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <a href="" class="multiple">
                                                        <label class="z_filelabel">
                                                            <input type="hidden" name="caseAppellantFiles[<?php echo e($count); ?>][id]" value="<?php echo e($element->id); ?>">
                                                            <input style="display: none" class="form-control fileInput caseAppellantFiles" data-case_originates="<?php echo e($element->originate_id); ?>" data-filrname="caseAppellantFiles" data-index="<?php echo e($count); ?>" id="input" type="file" name="caseAppellantFiles[<?php echo e($count); ?>][file]" accept="application/pdf">
                                                            <img src="<?php echo e(asset('website/assets/images/formcheckbox.svg')); ?>">

                                                        </label>

                                                    </a>
                                                    <?php if($count == 0): ?>
                                                        <button type="button"  class="add_new_div btn_yellow" data-case_originates="<?php echo e($element->originate_id); ?>" data-filrname="caseAppellantFiles" data-index="<?php echo e($Processed->where('form_id','22')->count()-1); ?>" >Add More Files</button>
                                                    <?php endif; ?>

                                                    <p class="">
                                                        <span>Notes</span>
                                                        <input type="hidden" name="caseAppellantFiles[<?php echo e($count); ?>][case_originates]" value="<?php echo e($element->originate_id); ?>">
                                                        <textarea name="caseAppellantFiles[<?php echo e($count); ?>][note]" id="" class="form-control description_para" cols="40" rows="8"><?php echo e($element->description); ?></textarea>
                                                        <input type="date" name="caseAppellantFiles[0][date]" class="form-control " value="<?php echo e($element->date); ?>">
                                                    </p>
                                                    <a class="btn btn_yellow pull-right" href="<?php echo e(route('originating_processed_destory' , [$element->id??''])); ?>"
                                                       title="Delete <?php echo e(preg_replace('/(?<=[a-z])[A-Z]|[A-Z](?=[a-z])/', ' $0', 'OriginatingProcessed')); ?>" onclick="return confirm(&quot;Confirm delete?&quot;)">
                                                        Delete
                                                    </a>
                                                    <?php $count++ ?>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php endif; ?>
                                        </div>
                                        <button type="button" data-form="22" class="btn btn_black submitButton" data-title="<?php echo e($name22); ?>" data-case_originates="<?php echo e($Originate->id); ?>" data-filrname="caseAppellantFiles">Save</button>
                                    </div>
                                </div>
                                
                                
                                <div class="col-md-4">
                                    <div class="originating_process_card">
                                        <span class="sub_heading"><?php echo e($name23); ?></span>
                                        <div class="new_file_div">
                                            <?php if($Processed->where('form_id','23')->count() == 0): ?>
                                                <a href="javascript:void(0)" class="multiple">

                                                    <label class="z_filelabel">
                                                        <input style="display: none" class="form-control fileInput caseRespondentFiles" data-case_originates="<?php echo e($Originate->id); ?>" data-filrname="caseRespondentFiles" data-index="0" id="input" type="file" name="caseRespondentFiles[0][file]" accept="application/pdf">
                                                        <img src="<?php echo e(asset('website/assets/images/formtickbox.png')); ?>">
                                                        <span>
                                                                No file selected.
                                                            </span>
                                                    </label>
                                                </a>

                                                <p class="">
                                                    <span>Notes</span>
                                                    <input type="hidden" name="caseRespondentFiles[0][case_originates]" value="<?php echo e($Originate->id); ?>">
                                                    <textarea name="caseRespondentFiles[0][note]" id="" class="form-control description_para" cols="40" rows="8"></textarea>
                                                    <input type="date" name="caseRespondentFiles[0][date]" class="form-control " value="">
                                                </p>
                                                <div class="btns_box">                       <button type="button"  class="add_new_div btn_yellow" data-case_originates="<?php echo e($Originate->id); ?>" data-filrname="caseRespondentFiles" data-index="0" >Add More Files</button></div>
                                            <?php else: ?>
                                                <?php $count = 0;?>
                                                <?php $__currentLoopData = $Processed->where('form_id','23'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $keyz=>$element): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <a href="" class="multiple">
                                                        <label class="z_filelabel">
                                                            <input type="hidden" name="caseRespondentFiles[<?php echo e($count); ?>][id]" value="<?php echo e($element->id); ?>">
                                                            <input style="display: none" class="form-control fileInput caseRespondentFiles" data-case_originates="<?php echo e($element->originate_id); ?>" data-filrname="caseRespondentFiles" data-index="<?php echo e($count); ?>" id="input" type="file" name="caseRespondentFiles[<?php echo e($count); ?>][file]" accept="application/pdf">
                                                            <img src="<?php echo e(asset('website/assets/images/formcheckbox.svg')); ?>">

                                                        </label>

                                                    </a>
                                                    <?php if($count == 0): ?>
                                                        <button type="button"  class="add_new_div btn_yellow" data-case_originates="<?php echo e($element->originate_id); ?>" data-filrname="caseRespondentFiles" data-index="<?php echo e($Processed->where('form_id','23')->count()-1); ?>" >Add More Files</button>
                                                    <?php endif; ?>

                                                    <p class="">
                                                        <span>Notes</span>
                                                        <input type="hidden" name="caseRespondentFiles[<?php echo e($count); ?>][case_originates]" value="<?php echo e($element->originate_id); ?>">
                                                        <textarea name="caseRespondentFiles[<?php echo e($count); ?>][note]" id="" class="form-control description_para" cols="40" rows="8"><?php echo e($element->description); ?></textarea>
                                                        <input type="date" name="caseRespondentFiles[0][date]" class="form-control " value="<?php echo e($element->date); ?>">
                                                    </p>
                                                    <a class="btn btn_yellow pull-right" href="<?php echo e(route('originating_processed_destory' , [$element->id??''])); ?>"
                                                       title="Delete <?php echo e(preg_replace('/(?<=[a-z])[A-Z]|[A-Z](?=[a-z])/', ' $0', 'OriginatingProcessed')); ?>" onclick="return confirm(&quot;Confirm delete?&quot;)">
                                                        Delete
                                                    </a>
                                                    <?php $count++ ?>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php endif; ?>
                                        </div>
                                        <button type="button" data-form="23" class="btn btn_black submitButton" data-title="<?php echo e($name23); ?>" data-case_originates="<?php echo e($Originate->id); ?>" data-filrname="caseRespondentFiles">Save</button>
                                    </div>
                                </div>
                                
                                
                                <div class="col-md-4">
                                    <div class="originating_process_card">
                                        <span class="sub_heading"><?php echo e($name24); ?></span>
                                        <div class="new_file_div">
                                            <?php if($Processed->where('form_id','24')->count() == 0): ?>
                                                <a href="javascript:void(0)" class="multiple">

                                                    <label class="z_filelabel">
                                                        <input style="display: none" class="form-control fileInput updateRecordFiles" data-case_originates="<?php echo e($Originate->id); ?>" data-filrname="updateRecordFiles" data-index="0" id="input" type="file" name="updateRecordFiles[0][file]" accept="application/pdf">
                                                        <img src="<?php echo e(asset('website/assets/images/formtickbox.png')); ?>">
                                                        <span>
                                                                No file selected.
                                                            </span>
                                                    </label>
                                                </a>

                                                <p class="">
                                                    <span>Notes</span>
                                                    <input type="hidden" name="updateRecordFiles[0][case_originates]" value="<?php echo e($Originate->id); ?>">
                                                    <textarea name="updateRecordFiles[0][note]" id="" class="form-control description_para" cols="40" rows="8"></textarea>
                                                    <input type="date" name="updateRecordFiles[0][date]" class="form-control " value="">
                                                </p>
                                                <div class="btns_box">     <button type="button"  class="add_new_div btn_yellow" data-case_originates="<?php echo e($Originate->id); ?>" data-filrname="updateRecordFiles" data-index="0" >Add More Files</button></div>
                                            <?php else: ?>
                                                <?php $count = 0;?>
                                                <?php $__currentLoopData = $Processed->where('form_id','24'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $keyz=>$element): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <a href="" class="multiple">
                                                        <label class="z_filelabel">
                                                            <input type="hidden" name="updateRecordFiles[<?php echo e($count); ?>][id]" value="<?php echo e($element->id); ?>">
                                                            <input style="display: none" class="form-control fileInput updateRecordFiles" data-case_originates="<?php echo e($element->originate_id); ?>" data-filrname="updateRecordFiles" data-index="<?php echo e($count); ?>" id="input" type="file" name="updateRecordFiles[<?php echo e($count); ?>][file]" accept="application/pdf">
                                                            <img src="<?php echo e(asset('website/assets/images/formcheckbox.svg')); ?>">

                                                        </label>

                                                    </a>
                                                    <?php if($count == 0): ?>
                                                        <button type="button"  class="add_new_div btn_yellow" data-case_originates="<?php echo e($element->originate_id); ?>" data-filrname="updateRecordFiles" data-index="<?php echo e($Processed->where('form_id','24')->count()-1); ?>" >Add More Files</button>
                                                    <?php endif; ?>

                                                    <p class="">
                                                        <span>Notes</span>
                                                        <input type="hidden" name="updateRecordFiles[<?php echo e($count); ?>][case_originates]" value="<?php echo e($element->originate_id); ?>">
                                                        <textarea name="updateRecordFiles[<?php echo e($count); ?>][note]" id="" class="form-control description_para" cols="40" rows="8"><?php echo e($element->description); ?></textarea>
                                                        <input type="date" name="updateRecordFiles[0][date]" class="form-control " value="<?php echo e($element->date); ?>">
                                                    </p>
                                                    <a class="btn btn_yellow pull-right" href="<?php echo e(route('originating_processed_destory' , [$element->id??''])); ?>"
                                                       title="Delete <?php echo e(preg_replace('/(?<=[a-z])[A-Z]|[A-Z](?=[a-z])/', ' $0', 'OriginatingProcessed')); ?>" onclick="return confirm(&quot;Confirm delete?&quot;)">
                                                        Delete
                                                    </a>
                                                    <?php $count++ ?>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php endif; ?>
                                        </div>
                                        <button type="button" data-form="24" class="btn btn_black submitButton" data-title="<?php echo e($name24); ?>" data-case_originates="<?php echo e($Originate->id); ?>" data-filrname="updateRecordFiles">Save</button>
                                    </div>
                                </div>
                                
                                
                                <div class="col-md-4">
                                    <div class="originating_process_card">
                                        <span class="sub_heading"><?php echo e($name25); ?></span>
                                        <div class="new_file_div">
                                            <?php if($Processed->where('form_id','25')->count() == 0): ?>
                                                <a href="javascript:void(0)" class="multiple">

                                                    <label class="z_filelabel">
                                                        <input style="display: none" class="form-control fileInput judgementPCFiles" data-case_originates="<?php echo e($Originate->id); ?>" data-filrname="judgementPCFiles" data-index="0" id="input" type="file" name="judgementPCFiles[0][file]" accept="application/pdf">
                                                        <img src="<?php echo e(asset('website/assets/images/formtickbox.png')); ?>">
                                                        <span>
                                                                No file selected.
                                                            </span>
                                                    </label>
                                                </a>

                                                <p class="">
                                                    <span>Notes</span>
                                                    <input type="hidden" name="judgementPCFiles[0][case_originates]" value="<?php echo e($Originate->id); ?>">
                                                    <textarea name="judgementPCFiles[0][note]" id="" class="form-control description_para" cols="40" rows="8"></textarea>
                                                    <input type="date" name="judgementPCFiles[0][date]" class="form-control " value="">
                                                </p>
                                                <div class="btns_box">      <button type="button"  class="add_new_div btn_yellow" data-case_originates="<?php echo e($Originate->id); ?>" data-filrname="judgementPCFiles" data-index="0" >Add More Files</button></div>
                                            <?php else: ?>
                                                <?php $count = 0;?>
                                                <?php $__currentLoopData = $Processed->where('form_id','25'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $keyz=>$element): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <a href="" class="multiple">
                                                        <label class="z_filelabel">
                                                            <input type="hidden" name="judgementPCFiles[<?php echo e($count); ?>][id]" value="<?php echo e($element->id); ?>">
                                                            <input style="display: none" class="form-control fileInput judgementPCFiles" data-case_originates="<?php echo e($element->originate_id); ?>" data-filrname="judgementPCFiles" data-index="<?php echo e($count); ?>" id="input" type="file" name="judgementPCFiles[<?php echo e($count); ?>][file]" accept="application/pdf">
                                                            <img src="<?php echo e(asset('website/assets/images/formcheckbox.svg')); ?>">

                                                        </label>

                                                    </a>
                                                    <?php if($count == 0): ?>
                                                        <button type="button"  class="add_new_div btn_yellow" data-case_originates="<?php echo e($element->originate_id); ?>" data-filrname="judgementPCFiles" data-index="<?php echo e($Processed->where('form_id','25')->count()-1); ?>" >Add More Files</button>
                                                    <?php endif; ?>

                                                    <p class="">
                                                        <span>Notes</span>
                                                        <input type="hidden" name="judgementPCFiles[<?php echo e($count); ?>][case_originates]" value="<?php echo e($element->originate_id); ?>">
                                                        <textarea name="judgementPCFiles[<?php echo e($count); ?>][note]" id="" class="form-control description_para" cols="40" rows="8"><?php echo e($element->description); ?></textarea>
                                                        <input type="date" name="judgementPCFiles[0][date]" class="form-control " value="<?php echo e($element->date); ?>">
                                                    </p>
                                                    <a class="btn btn_yellow pull-right" href="<?php echo e(route('originating_processed_destory' , [$element->id??''])); ?>"
                                                       title="Delete <?php echo e(preg_replace('/(?<=[a-z])[A-Z]|[A-Z](?=[a-z])/', ' $0', 'OriginatingProcessed')); ?>" onclick="return confirm(&quot;Confirm delete?&quot;)">
                                                        Delete
                                                    </a>
                                                    <?php $count++ ?>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php endif; ?>
                                        </div>
                                        <button type="button" data-form="25" class="btn btn_black submitButton" data-title="<?php echo e($name25); ?>" data-case_originates="<?php echo e($Originate->id); ?>" data-filrname="judgementPCFiles">Save</button>
                                    </div>
                                </div>
                                
                                
                                <div class="col-md-4">
                                    <div class="originating_process_card">
                                        <span class="sub_heading"><?php echo e($name26); ?></span>
                                        <div class="new_file_div">
                                            <?php if($Processed->where('form_id','26')->count() == 0): ?>
                                                <a href="javascript:void(0)" class="multiple">

                                                    <label class="z_filelabel">
                                                        <input style="display: none" class="form-control fileInput orderPcFil es" data-case_originates="<?php echo e($Originate->id); ?>" data-filrname="orderPcFiles" data-index="0" id="input" type="file" name="orderPcFiles[0][file]" accept="application/pdf">
                                                        <img src="<?php echo e(asset('website/assets/images/formtickbox.png')); ?>">
                                                        <span>
                                                                No file selected.
                                                            </span>
                                                    </label>
                                                </a>

                                                <p class="">
                                                    <span>Notes</span>
                                                    <input type="hidden" name="orderPcFiles[0][case_originates]" value="<?php echo e($Originate->id); ?>">
                                                    <textarea name="orderPcFiles[0][note]" id="" class="form-control description_para" cols="40" rows="8"></textarea>
                                                    <input type="date" name="orderPcFiles[0][date]" class="form-control " value="">
                                                </p>
                                                <div class="btns_box">    <button type="button"  class="add_new_div btn_yellow" data-case_originates="<?php echo e($Originate->id); ?>" data-filrname="orderPcFiles" data-index="0" >Add More Files</button></div>
                                            <?php else: ?>
                                                <?php $count = 0;?>
                                                <?php $__currentLoopData = $Processed->where('form_id','26'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $keyz=>$element): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <a href="" class="multiple">
                                                        <label class="z_filelabel">
                                                            <input type="hidden" name="orderPcFiles[<?php echo e($count); ?>][id]" value="<?php echo e($element->id); ?>">
                                                            <input style="display: none" class="form-control fileInput orderPcFiles" data-case_originates="<?php echo e($element->originate_id); ?>" data-filrname="orderPcFiles" data-index="<?php echo e($count); ?>" id="input" type="file" name="orderPcFiles[<?php echo e($count); ?>][file]" accept="application/pdf">
                                                            <img src="<?php echo e(asset('website/assets/images/formcheckbox.svg')); ?>">

                                                        </label>

                                                    </a>
                                                    <?php if($count == 0): ?>
                                                        <button type="button"  class="add_new_div btn_yellow" data-case_originates="<?php echo e($element->originate_id); ?>" data-filrname="orderPcFiles" data-index="<?php echo e($Processed->where('form_id','26')->count()-1); ?>" >Add More Files</button>
                                                    <?php endif; ?>

                                                    <p class="">
                                                        <span>Notes</span>
                                                        <input type="hidden" name="orderPcFiles[<?php echo e($count); ?>][case_originates]" value="<?php echo e($element->originate_id); ?>">
                                                        <textarea name="orderPcFiles[<?php echo e($count); ?>][note]" id="" class="form-control description_para" cols="40" rows="8"><?php echo e($element->description); ?></textarea>
                                                        <input type="date" name="orderPcFiles[0][date]" class="form-control " value="<?php echo e($element->date); ?>">
                                                    </p>
                                                    <a class="btn btn_yellow pull-right" href="<?php echo e(route('originating_processed_destory' , [$element->id??''])); ?>"
                                                       title="Delete <?php echo e(preg_replace('/(?<=[a-z])[A-Z]|[A-Z](?=[a-z])/', ' $0', 'OriginatingProcessed')); ?>" onclick="return confirm(&quot;Confirm delete?&quot;)">
                                                        Delete
                                                    </a>
                                                    <?php $count++ ?>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php endif; ?>
                                        </div>
                                        <button type="button" data-form="26" class="btn btn_black submitButton" data-title="<?php echo e($name26); ?>" data-case_originates="<?php echo e($Originate->id); ?>" data-filrname="orderPcFiles">Save</button>
                                    </div>
                                </div>
                                
                                
                                <div class="col-md-4">
                                    <div class="originating_process_card">
                                        <span class="sub_heading"><?php echo e($name27); ?></span>
                                        <div class="new_file_div">
                                            <?php if($Processed->where('form_id','27')->count() == 0): ?>
                                                <a href="javascript:void(0)" class="multiple">

                                                    <label class="z_filelabel">
                                                        <input style="display: none" class="form-control fileInput OngoingFil es" data-case_originates="<?php echo e($Originate->id); ?>" data-filrname="OngoingFiles" data-index="0" id="input" type="file" name="OngoingFiles[0][file]" accept="application/pdf">
                                                        <img src="<?php echo e(asset('website/assets/images/formtickbox.png')); ?>">
                                                        <span>
                                                                No file selected.
                                                            </span>
                                                    </label>
                                                </a>

                                                <p class="">
                                                    <span>Notes</span>
                                                    <input type="hidden" name="OngoingFiles[0][case_originates]" value="<?php echo e($Originate->id); ?>">
                                                    <textarea name="OngoingFiles[0][note]" id="" class="form-control description_para" cols="40" rows="8"></textarea>
                                                    <input type="date" name="OngoingFiles[0][date]" class="form-control " value="">
                                                </p>
                                                <div class="btns_box">                         <button type="button"  class="add_new_div btn_yellow" data-case_originates="<?php echo e($Originate->id); ?>" data-filrname="OngoingFiles" data-index="0" >Add More Files</button></div>
                                            <?php else: ?>
                                                <?php $count = 0;?>
                                                <?php $__currentLoopData = $Processed->where('form_id','27'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $keyz=>$element): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <a href="" class="multiple">
                                                        <label class="z_filelabel">
                                                            <input type="hidden" name="OngoingFiles[<?php echo e($count); ?>][id]" value="<?php echo e($element->id); ?>">
                                                            <input style="display: none" class="form-control fileInput OngoingFil es" data-case_originates="<?php echo e($element->originate_id); ?>" data-filrname="OngoingFiles" data-index="<?php echo e($count); ?>" id="input" type="file" name="OngoingFiles[<?php echo e($count); ?>][file]" accept="application/pdf">
                                                            <img src="<?php echo e(asset('website/assets/images/formcheckbox.svg')); ?>">

                                                        </label>

                                                    </a>
                                                    <?php if($count == 0): ?>
                                                        <button type="button"  class="add_new_div btn_yellow" data-case_originates="<?php echo e($element->originate_id); ?>" data-filrname="OngoingFiles" data-index="<?php echo e($Processed->where('form_id','27')->count()-1); ?>" >Add More Files</button>
                                                    <?php endif; ?>

                                                    <p class="">
                                                        <span>Notes</span>
                                                        <input type="hidden" name="OngoingFiles[<?php echo e($count); ?>][case_originates]" value="<?php echo e($element->originate_id); ?>">
                                                        <textarea name="OngoingFiles[<?php echo e($count); ?>][note]" id="" class="form-control description_para" cols="40" rows="8"><?php echo e($element->description); ?></textarea>
                                                        <input type="date" name="OngoingFiles[0][date]" class="form-control " value="<?php echo e($element->date); ?>">
                                                    </p>
                                                    <a class="btn btn_yellow pull-right" href="<?php echo e(route('originating_processed_destory' , [$element->id??''])); ?>"
                                                       title="Delete <?php echo e(preg_replace('/(?<=[a-z])[A-Z]|[A-Z](?=[a-z])/', ' $0', 'OriginatingProcessed')); ?>" onclick="return confirm(&quot;Confirm delete?&quot;)">
                                                        Delete
                                                    </a>
                                                    <?php $count++ ?>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php endif; ?>
                                        </div>
                                        <button type="button" data-form="27" class="btn btn_black submitButton" data-title="<?php echo e($name27); ?>" data-case_originates="<?php echo e($Originate->id); ?>" data-filrname="OngoingFiles">Save</button>
                                    </div>
                                </div>
                                
                                
                                <div class="col-md-4">
                                    <div class="originating_process_card">
                                        <span class="sub_heading"><?php echo e($name28); ?></span>
                                        <div class="new_file_div">
                                            <?php if($Processed->where('form_id','28')->count() == 0): ?>
                                                <a href="javascript:void(0)" class="multiple">

                                                    <label class="z_filelabel">
                                                        <input style="display: none" class="form-control fileInput CMCodersFiles" data-case_originates="<?php echo e($Originate->id); ?>" data-filrname="CMCodersFiles" data-index="0" id="input" type="file" name="CMCodersFiles[0][file]" accept="application/pdf">
                                                        <img src="<?php echo e(asset('website/assets/images/formtickbox.png')); ?>">
                                                        <span>
                                                                No file selected.
                                                            </span>
                                                    </label>
                                                </a>

                                                <p class="">
                                                    <span>Notes</span>
                                                    <input type="hidden" name="CMCodersFiles[0][case_originates]" value="<?php echo e($Originate->id); ?>">
                                                    <textarea name="CMCodersFiles[0][note]" id="" class="form-control description_para" cols="40" rows="8"></textarea>
                                                    <input type="date" name="CMCodersFiles[0][date]" class="form-control " value="">
                                                </p>

                                                <div class="btns_box">                         <button type="button"  class="add_new_div btn_yellow" data-case_originates="<?php echo e($Originate->id); ?>" data-filrname="CMCodersFiles" data-index="0" >Add More Files</button></div>
                                            <?php else: ?>
                                                <?php $count = 0;?>
                                                <?php $__currentLoopData = $Processed->where('form_id','28'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $keyz=>$element): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <a href="" class="multiple">
                                                        <label class="z_filelabel">
                                                            <input type="hidden" name="CMCodersFiles[<?php echo e($count); ?>][id]" value="<?php echo e($element->id); ?>">
                                                            <input style="display: none" class="form-control fileInput CMCodersFiles" data-case_originates="<?php echo e($element->originate_id); ?>" data-filrname="CMCodersFiles" data-index="<?php echo e($count); ?>" id="input" type="file" name="CMCodersFiles[<?php echo e($count); ?>][file]" accept="application/pdf">
                                                            <img src="<?php echo e(asset('website/assets/images/formcheckbox.svg')); ?>">

                                                        </label>

                                                    </a>
                                                    <?php if($count == 0): ?>
                                                        <button type="button"  class="add_new_div btn_yellow" data-case_originates="<?php echo e($element->originate_id); ?>" data-filrname="CMCodersFiles" data-index="<?php echo e($Processed->where('form_id','28')->count()-1); ?>" >Add More Files</button>
                                                    <?php endif; ?>

                                                    <p class="">
                                                        <span>Notes</span>
                                                        <input type="hidden" name="CMCodersFiles[<?php echo e($count); ?>][case_originates]" value="<?php echo e($element->originate_id); ?>">
                                                        <textarea name="CMCodersFiles[<?php echo e($count); ?>][note]" id="" class="form-control description_para" cols="40" rows="8"><?php echo e($element->description); ?></textarea>
                                                        <input type="date" name="CMCodersFiles[0][date]" class="form-control " value="<?php echo e($element->date); ?>">
                                                    </p>
                                                    <a class="btn btn_yellow pull-right" href="<?php echo e(route('originating_processed_destory' , [$element->id??''])); ?>"
                                                       title="Delete <?php echo e(preg_replace('/(?<=[a-z])[A-Z]|[A-Z](?=[a-z])/', ' $0', 'OriginatingProcessed')); ?>" onclick="return confirm(&quot;Confirm delete?&quot;)">
                                                        Delete
                                                    </a>
                                                    <?php $count++ ?>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php endif; ?>
                                        </div>
                                        <button type="button" data-form="28" class="btn btn_black submitButton" data-title="<?php echo e($name28); ?>" data-case_originates="<?php echo e($Originate->id); ?>" data-filrname="CMCodersFiles">Save</button>
                                    </div>
                                </div>
                                
                                
                                <div class="col-md-4">
                                    <div class="originating_process_card">
                                        <span class="sub_heading"><?php echo e($name29); ?></span>
                                        <div class="new_file_div">
                                            <?php if($Processed->where('form_id','29')->count() == 0): ?>
                                                <a href="javascript:void(0)" class="multiple">

                                                    <label class="z_filelabel">
                                                        <input style="display: none" class="form-control fileInput CostFiles"  data-case_originates="<?php echo e($Originate->id); ?>" data-filrname="CostFiles" data-index="0" id="input" type="file" name="CostFiles[0][file]" accept="application/pdf">
                                                        <img src="<?php echo e(asset('website/assets/images/formtickbox.png')); ?>">
                                                        <span>
                                                                No file selected.
                                                            </span>
                                                    </label>
                                                </a>

                                                <p class="">
                                                    <span>Notes</span>
                                                    <input type="hidden" name="CostFiles[0][case_originates]" value="<?php echo e($Originate->id); ?>">
                                                    <textarea name="CostFiles[0][note]" id="" class="form-control description_para" cols="40" rows="8"></textarea>
                                                    <input type="date" name="CostFiles[0][date]" class="form-control " value="">
                                                </p>
                                                <div class="btns_box">       <button type="button"  class="add_new_div btn_yellow" data-case_originates="<?php echo e($Originate->id); ?>" data-filrname="CostFiles" data-index="0" >Add More Files</button></div>
                                            <?php else: ?>
                                                <?php $count = 0;?>
                                                <?php $__currentLoopData = $Processed->where('form_id','29'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $keyz=>$element): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <a href="" class="multiple">
                                                        <label class="z_filelabel">
                                                            <input type="hidden" name="CostFiles[<?php echo e($count); ?>][id]" value="<?php echo e($element->id); ?>">
                                                            <input style="display: none" class="form-control fileInput CostFiles"  data-case_originates="<?php echo e($element->originate_id); ?>" data-filrname="CostFiles" data-index="<?php echo e($count); ?>" id="input" type="file" name="CostFiles[<?php echo e($count); ?>][file]" accept="application/pdf">
                                                            <img src="<?php echo e(asset('website/assets/images/formcheckbox.svg')); ?>">

                                                        </label>

                                                    </a>
                                                    <?php if($count == 0): ?>
                                                        <button type="button"  class="add_new_div btn_yellow" data-case_originates="<?php echo e($element->originate_id); ?>" data-filrname="CostFiles" data-index="<?php echo e($Processed->where('form_id','29')->count()-1); ?>" >Add More Files</button>
                                                    <?php endif; ?>

                                                    <p class="">
                                                        <span>Notes</span>
                                                        <input type="hidden" name="CostFiles[<?php echo e($count); ?>][case_originates]" value="<?php echo e($element->originate_id); ?>">
                                                        <textarea name="CostFiles[<?php echo e($count); ?>][note]" id="" class="form-control description_para" cols="40" rows="8"><?php echo e($element->description); ?></textarea>
                                                        <input type="date" name="CostFiles[0][date]" class="form-control " value="<?php echo e($element->date); ?>">
                                                    </p>
                                                    <a class="btn btn_yellow pull-right" href="<?php echo e(route('originating_processed_destory' , [$element->id??''])); ?>"
                                                       title="Delete <?php echo e(preg_replace('/(?<=[a-z])[A-Z]|[A-Z](?=[a-z])/', ' $0', 'OriginatingProcessed')); ?>" onclick="return confirm(&quot;Confirm delete?&quot;)">
                                                        Delete
                                                    </a>
                                                    <?php $count++ ?>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php endif; ?>
                                        </div>
                                        <button type="button" data-form="29" class="btn btn_black submitButton" data-title="<?php echo e($name29); ?>" data-case_originates="<?php echo e($Originate->id); ?>" data-filrname="CostFiles">Save</button>
                                    </div>
                                </div>
                                
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
                    <form method="POST" action="<?php echo e(route('file_mail')); ?>" accept-charset="UTF-8"
                          class="form-horizontal" enctype="multipart/form-data">
                        <?php echo e(csrf_field()); ?>

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
                                    <?php $__currentLoopData = $attorneyassociates; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e($item->name??''); ?></td>
                                            <td><?php echo e($item->email??''); ?></td>
                                            <td>
                                                <div class="checkbox checkbox-warning">
                                                    <input id="checkbox33" name="user_id[]" value="<?php echo e(@$item->id); ?>" type="checkbox">
                                                    <label for="checkbox33"></label>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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

    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
<?php $__env->stopSection(); ?>

<?php $__env->startPush('js'); ?>
    
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
                    url: "<?php echo e(route('originating_ajax')); ?>",
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
        $(this).siblings('img').attr('src','<?php echo e(asset('website/assets/images/formcheckbox.svg')); ?>');
        let documentTitle = $(this).val();
        let docFilter = documentTitle.replace(/^.*\\/, "");
        var cacheValue = $(this).siblings('span').text(docFilter);

        var file = this.files[0];
        var maxSize = 2 * 1024 * 1024 * 1024;
        if (file.size > maxSize) {
            alert('File size exceeds the maximum limit of 2GB.');
            this.value = '';
            $(this).siblings('img').attr('src','<?php echo e(asset('website/assets/images/formtickbox.png')); ?>');
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
            var url = "<?php echo e(route('originating_ajax')); ?>"; // Get the form action URL

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

<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home1/backendpro/public_html/usman/lcm/resources/views/dashboard/originating_process.blade.php ENDPATH**/ ?>