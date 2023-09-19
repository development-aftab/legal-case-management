<?php $__env->startPush('css'); ?>
    <link href="<?php echo e(asset('plugins/components/bootstrap-tagsinput/dist/bootstrap-tagsinput.css')); ?>" rel="stylesheet" />
    <link href="<?php echo e(asset('plugins/components/custom-select/custom-select.css')); ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo e(asset('plugins/components/bootstrap-select/bootstrap-select.min.css')); ?>" rel="stylesheet" />
    <style>
        .error {
            color: red !important;
        }
        .bootstrap-tagsinput {
            border: none !important;
        }
        .bootstrap-tagsinput input {
            height: 80px;
            box-shadow: 0 8px 33px rgb(0 0 0 / 4%);
            border: none;
            border-radius: 10px;
            width: 440px;
            color: #9B9B9B;
            font-size: 18px;
            line-height: 24px;
            padding: 10px 20px;
        }
    </style>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('content'); ?>
<section class="create_user_sec">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="white-box">
                    <h3 class="box-title pull-left">Create New <?php echo e(preg_replace('/(?<=[a-z])[A-Z]|[A-Z](?=[a-z])/', ' $0', 'Attorney / Associate / Secretary')); ?></h3>
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view-'.str_slug('AttorneyAssociate'))): ?>
                    <a  class="btn btn_yellow pull-right btn_icon" href="<?php echo e(url('/attorneyAssociate/attorney-associate')); ?>"> <?php echo e(preg_replace('/(?<=[a-z])[A-Z]|[A-Z](?=[a-z])/', ' $0', 'Back')); ?></a>
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
                        
                    <form method="POST" action="<?php echo e(url('/attorneyAssociate/attorney-associate')); ?>" accept-charset="UTF-8"
                        class="form-horizontal row dashboard_form" id="attorney_associate_form" enctype="multipart/form-data">
                        <?php echo e(csrf_field()); ?>


                        <?php echo $__env->make('attorneyAssociate.attorney-associate.form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<?php $__env->stopSection(); ?>
<?php $__env->startPush('js'); ?>
    <script>
        $(document).ready(function(){
            $("#attorney_associate_form").validate({
                // Specify validation rules
                rules: {
                    name: "required",
                    email: "required",
                    bar_number: "required",
                    address: "required",
                    contact: "required",
                    role_id: "required",
                    dob: "required",
                    resume: "required",
                    certificate: "required",
                    pic: "required",
                    bio: "required",
                    signature: "required",
                },
                messages: {
                    name: {
                        required: "Please enter Name",
                    },
                    email: {
                        required: "Please enter Email",
                    },
                    bar_number: {
                        required: "Please enter Bar Number",
                    },
                    address: {
                        required: "Please enter Address",
                    },
                    contact: {
                        required: "Please enter Contact",
                    },
                    role_id: {
                        required: "Please enter Title",
                    },
                    dob: {
                        required: "Please enter Date of Birth",
                    },
                    resume: {
                        required: "Please put Resume",
                    },
                    certificate: {
                        required: "Please put Certificate",
                    },
                    pic: {
                        required: "Please put Picture",
                    },
                    bio: {
                        required: "Please enter Bio",
                    },
                    signature: {
                        required: "Please Give Signature",
                    },
                },
            });
        });

        $("#case_file_form").submit(function() {
            var expertise = $("#expertise").val();
            if (expertise == null || expertise.length == 0) {
                alert("Please select at least one Expertise.");
                return false;
            }
            var signature = $("#signature").val();
            if (signature == null || signature.length == 0) {
                alert("Please Enter Signature.");
                return false;
            }
            return true;
        });
    </script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home1/backendpro/public_html/usman/lcm/resources/views/attorneyAssociate/attorney-associate/create.blade.php ENDPATH**/ ?>