<?php $__env->startPush('css'); ?>
    <link href="<?php echo e(asset('plugins/components/bootstrap-tagsinput/dist/bootstrap-tagsinput.css')); ?>" rel="stylesheet" />
    <link href="<?php echo e(asset('plugins/components/custom-select/custom-select.css')); ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo e(asset('plugins/components/bootstrap-select/bootstrap-select.min.css')); ?>" rel="stylesheet" />
<?php $__env->stopPush(); ?>
<?php $__env->startSection('content'); ?>
<section class="">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="white-box custom_form_css">
                    <h3 class="box-title pull-left">Create New <?php echo e(preg_replace('/(?<=[a-z])[A-Z]|[A-Z](?=[a-z])/', ' $0', 'CaseFile')); ?></h3>
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view-'.str_slug('CaseFile'))): ?>
                    <a  class="btn btn_black pull-right" href="<?php echo e(url('/caseFile/case-file')); ?>"><i class="icon-arrow-left-circle"></i> <?php echo e(preg_replace('/(?<=[a-z])[A-Z]|[A-Z](?=[a-z])/', ' $0', 'Back')); ?></a>
                    <?php endif; ?>

                    <div class="clearfix"></div>
                    <hr>
                    <?php if($errors->any()): ?>
                        <ul class="alert alert-danger">
                            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li><?php echo e($error); ?></li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    <?php endif; ?>

                    <form method="POST" action="<?php echo e(url('/caseFile/case-file')); ?>" accept-charset="UTF-8"
                          class="form-horizontal row dashboard_form" id="case_file_form" enctype="multipart/form-data">
                        <?php echo e(csrf_field()); ?>


                        <?php echo $__env->make('caseFile.case-file.form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>        
<?php $__env->stopSection(); ?>
<?php $__env->startPush('js'); ?>
    <script src="<?php echo e(asset('plugins/components/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js')); ?>"></script>
    <script src="<?php echo e(asset('plugins/components/custom-select/custom-select.min.js')); ?>" type="text/javascript"></script>
    <script src="<?php echo e(asset('plugins/components/bootstrap-select/bootstrap-select.min.js')); ?>" type="text/javascript"></script>
    <script>
        $(document).ready(function(){
            $("#case_file_form").validate({
                // Specify validation rules
                rules: {
                    case_number: "required",
                    name_of_parties: "required",
                    judge_name: "required",
                    instruction_attorney_id: "required",
                    junior_attorney_id: "required",
                    senior_counsel_id: "required",
                    king_counsel_id: "required",
                    type_of_matter_id: "required",
                    tags: "required",
                },
                messages: {
                    case_number: {
                        required: "Please enter Case Number",
                    },
                    name_of_parties: {
                        required: "Please enter Name of Parties",
                    },
                    judge_name: {
                        required: "Please enter Judge Name",
                    },
                    instruction_attorney_id: {
                        required: "Please enter Instruction Attorney",
                    },
                    junior_attorney_id: {
                        required: "Please enter Junior Attorney",
                    },
                    senior_counsel_id: {
                        required: "Please enter Senior Counsel",
                    },
                    king_counsel_id: {
                        required: "Please enter King Counsel",
                    },
                    type_of_matter_id: {
                        required: "Please enter Type of Matter",
                    },
                    tags: {
                        required: "Please enter the Tags",
                    },
                },
            });
        });
        // $("#case_file_form").submit(function() {
        //         var juniorAttorney = $("#junior_attorney").val();
        //         var seniorCounsel = $("#senior_counsel").val();
        //         var kingCounsel = $("#king_counsel").val();
        //         var typeOfMatter = $("#type_of_matter").val();
        //         var originating = $("#originating").val();
        //         if (juniorAttorney == null || juniorAttorney.length == 0) {
        //             alert("Please select at least one Junior Attorney.");
        //             return false;
        //         }
        //         if (seniorCounsel == null || seniorCounsel.length == 0) {
        //             alert("Please select at least one Senior Counsel.");
        //             return false;
        //         }
        //         if (kingCounsel == null || kingCounsel.length == 0) {
        //             alert("Please select at least one King Counsel.");
        //             return false;
        //         }
        //         if (typeOfMatter == null || typeOfMatter.length == 0) {
        //             alert("Please select at least one Type Of Matter.");
        //             return false;
        //         }
        //         if (originating == null || originating.length == 0) {
        //             alert("Please select at least one Originating Process.");
        //             return false;
        //         }
        //
        //         return true;
        // });
    </script>
    <script>
        jQuery(document).ready(function() {
            // For select 2
            $(".select2").select2();
            $('.selectpicker').selectpicker();

        });
    </script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home1/backendpro/public_html/usman/lcm/resources/views/caseFile/case-file/create.blade.php ENDPATH**/ ?>