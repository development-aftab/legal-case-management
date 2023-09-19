<?php $__env->startPush('css'); ?>
<link href="<?php echo e(asset('plugins/components/custom-select/custom-select.css')); ?>" rel="stylesheet" type="text/css" />
<?php $__env->stopPush(); ?>
<?php $__env->startSection('content'); ?>
<section class="">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="white-box">
                    <h3 class="box-title pull-left">Create New <?php echo e(preg_replace('/(?<=[a-z])[A-Z]|[A-Z](?=[a-z])/', ' $0', 'Client')); ?></h3>
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view-'.str_slug('Client'))): ?>
                    <a  class="btn btn_black pull-right" href="<?php echo e(url('/client/client')); ?>"><i class="icon-arrow-left-circle"></i> <?php echo e(preg_replace('/(?<=[a-z])[A-Z]|[A-Z](?=[a-z])/', ' $0', 'Back')); ?></a>
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

                    <form id="client_form" method="POST" action="<?php echo e(url('/client/client')); ?>" accept-charset="UTF-8"
                          class="form-horizontal row dashboard_form" enctype="multipart/form-data">
                        <?php echo e(csrf_field()); ?>


                        <?php echo $__env->make('client.client.form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('js'); ?>


<script >
    jQuery("input[type='file']").on("change", function(e){
        var fileName = e.target.files[0].name;
        console.log(fileName);
        jQuery(this).next().children().text( fileName );
    });

    $(document).ready(function(){
        $("#client_form").validate({
            // Specify validation rules
            rules: {
                name: "required",
                email: "required",
                address: "required",
                contact: "required",
                next_of_kin: "required",
                salary: "required",
                marital_status: "required",
                id_number: "required",
                payment_method_id: "required",
                attorney_associate_id: "required",
                condition: "required",
            },
            messages: {
                name: {
                    required: "Please enter Name",
                },
                email: {
                    required: "Please enter Email",
                },
                address: {
                    required: "Please enter Address",
                },
                contact: {
                    required: "Please enter Contact",
                },
                next_of_kin: {
                    required: "Please enter Name",
                },
                salary: {
                    required: "Please enter Salary",
                },
                marital_status: {
                    required: "Please Select Marital Status",
                },
                id_number: {
                    required: "Please enter Id-Number",
                },
                payment_method_id: {
                    required: "Please Select Payment Method",
                },
                attorney_associate_id: {
                    required: "Please Select Attorney",
                },
                condition: {
                    required: "Please enter Condition",
                }
            },
        });
    });
</script>


<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home1/backendpro/public_html/usman/lcm/resources/views/client/client/create.blade.php ENDPATH**/ ?>