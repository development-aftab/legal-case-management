
    <div class="col-md-4 col-sm-12 form-group">
        <input type="text" class="form-control" id="" name="name" value="<?php echo e($client->name??''); ?>" placeholder="Name">
    </div>
    <div class="col-md-4 col-sm-12 form-group">
        

        <input type="email" class="form-control <?php echo e($errors->has('email') ? ' is-invalid' : ''); ?>

                    " name="email" id="email" value="<?php echo e($client->email??''); ?>" placeholder="Email Address">
            <span style="color: red" id="email_exist_msg"></span>
            <?php if($errors->has('email')): ?>
                <span class="invalid-feedback">
                    <strong><?php echo e($errors->first('email')); ?></strong>
                </span>
            <?php endif; ?>
    </div>
    <div class="col-md-4 col-sm-12 form-group">
        <input type="text" class="form-control" id="" name="address" value="<?php echo e($client->profile->address??''); ?>" placeholder="Address">
    </div>
    <div class="col-md-4 col-sm-12 form-group">
        <input type="number" class="form-control" id="" name="contact" value="<?php echo e($client->contact??''); ?>" placeholder="Contact No" min="1">
    </div>
    <div class="col-md-4 col-sm-12 form-group">
        <input type="text" class="form-control" id="" name="next_of_kin" value="<?php echo e($client->profile->next_of_kin??''); ?>" placeholder="Next Of Kin">
    </div>
    <div class="col-md-4 col-sm-12 form-group">
        <input type="number" class="form-control" min="1" id="" name="salary" value="<?php echo e($client->profile->salary??''); ?>" placeholder="Salary">
    </div>
    <div class="col-md-4 col-sm-12 form-group">
        <select class="form-control" name="marital_status">
            <option disabled selected hidden>Marital Status</option>
            <option value="Married" <?php if(isset($client->profile->marital_status) && $client->profile->marital_status=='Married'): ?> selected <?php endif; ?>>Married</option>
            <option value="Single" <?php if(isset($client->profile->marital_status) && $client->profile->marital_status=='Single'): ?> selected <?php endif; ?>>Single</option>
            <option value="Divorced" <?php if(isset($client->profile->marital_status) && $client->profile->marital_status=='Divorced'): ?> selected <?php endif; ?>>Divorced</option>
            <option value="Widowed" <?php if(isset($client->profile->marital_status) && $client->profile->marital_status=='Widowed'): ?> selected <?php endif; ?>>Widowed</option>
            <option value="Separated" <?php if(isset($client->profile->marital_status) && $client->profile->marital_status=='Separated'): ?> selected <?php endif; ?>>Separated</option>
        </select>
    </div>
    <div class="col-md-4 col-sm-12 form-group">
        <input type="tel" class="form-control" id="" value="<?php echo e($client->profile->id_number??rand(11111111,99999999)); ?>" name="id_number" readonly>
    </div>
    <div class="col-md-4 col-sm-12 form-group ">
        <select class="select2 form-control select2-multiple" id="payment_method_id" name="payment_method_id[]" multiple="multiple" data-placeholder="Payment Details">
            <option disabled selected hidden>Payment Details</option>
            <?php $__currentLoopData = $payments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $payment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($payment->id ??''); ?>" <?php if(isset($client) && in_array($payment->id,$client->clientPaymentMethodsIds)): ?> selected <?php endif; ?> ><?php echo e($payment->name); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
        
    </div>

    <div class="col-md-4 col-sm-12 form-group ">
        
        <select class="form-control " name="attorney_associate_id" id="attorney">
            <option disabled selected hidden>Instructing Attorney</option>
            <?php $__currentLoopData = $attorneyassociates; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attorneyassociate): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($attorneyassociate->id ??''); ?>" data_name="<?php echo e($attorneyassociate->name??''); ?>" data_email="<?php echo e($attorneyassociate->email); ?>" <?php if(isset($client->attorney_associate_id) && $client->attorney_associate_id==$attorneyassociate->id): ?> selected <?php endif; ?>><?php echo e($attorneyassociate->name ??""); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
    </div>
    <input type="hidden" id="attorney_email" name="attorney_email" value="">
    <input type="hidden" id="attorney_name" name="attorney_name" value="">

    <div class="col-md-5 col-sm-12 form-group file_input">
        <label class="file_input_lable" for="document">

                <?php if(isset($client->document) && $client->document=="null"): ?>
                    <h2>No File</h2>
                <?php else: ?>
                    <?php if(Route::current()->getName() == 'client.edit'): ?>
                        <a href="<?php echo e(asset('website')); ?>/<?php echo e($client->document??''); ?>" target="_blank"><img class="img-fluid" src="<?php echo e(asset('website')); ?>/assets/images/doc-icon.png">
                        </a>
                    <?php else: ?>
                        <span class="file_upload">Original ID</span>
                    <?php endif; ?>
                <?php endif; ?>
            <a class="btn btn_black btn_img">
                Upload ID
                <img class="img-fluid " src="<?php echo e(asset('website')); ?>/assets/images/upload.png" alt="">
            </a>
        </label>
        <input type="file" class="form-control-file" name="document" accept="" id="document">
    </div>

    <div class="col-md-12 col-sm-12 form-group">
        <textarea class="form-control" id="" name="condition" placeholder="Define Condition..." rows="7"><?php echo e($client->profile->condition ??''); ?></textarea>
    </div>
    <div class="col-md-6 col-sm-12 form-group">
        <h5>How You Came To Know About The Firm ?</h5>
        <?php $__currentLoopData = $firms; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $firm): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="form-check">
                <input class="form-check-input exampleRadios1" type="radio" name="firm_id" id="exampleRadios1" value="<?php echo e($firm->id); ?>" <?php if(isset($client->firm_id) && $client->firm_id==$firm->id): ?> checked <?php endif; ?>>
                <label class="form-check-label" for="exampleRadios1">
                    <?php echo e($firm->name); ?>

                </label>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php if(Route::current()->getName() != 'client.edit'): ?>
            <div class="form-check">
                <input class="form-check-input firm_other_id" name="firm_id" type="radio" id="firm_other_id">
                <label class="form-check-label" for="firm_other_id">
                    Referred by other client (short answer with name of referred client)
                </label>
            </div>
            <input class="form-control firm_other" type="text" name="firm_other" placeholder="Describe Frim">
        <?php endif; ?>
    </div>
    <div class="col-md-6 col-sm-12 form-group">
        <h5>Describe client attitude</h5>
        <?php $__currentLoopData = $client_attitudes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $client_attitude): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="form-check">
                <input class="form-check-input exampleRadios2" type="radio" name="client_attitude_id" id="exampleRadios2" value="<?php echo e($client_attitude->id); ?>" <?php if(isset($client->client_attitude_id) && $client->client_attitude_id==$client_attitude->id): ?> checked <?php endif; ?> >
                <label class="form-check-label" for="exampleRadios2">
                    <?php echo e($client_attitude->name); ?>

                </label>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php if(Route::current()->getName() != 'client.edit'): ?>
            <div class="form-check">
                <input class="form-check-input other" type="radio" name="client_attitude_id" id="other">
                <label class="form-check-label" for="other">
                    Other
                </label>
            </div>
            <input class="form-control client_attitude_other" id="client_attitude_other" type="text" name="client_attitude_other" placeholder="Describe Client Attitude">
        <?php endif; ?>
    </div>
    <div class="col-md-6 col-sm-12 form-group">
        <input class="btn btn_black btn_block" type="submit" value="<?php echo e($submitButtonText??'Create'); ?>">
    </div>
    <div class="form-group">
        <div class="col-md-offset-4 col-md-4">
            
        </div>
    </div>
    <?php $__env->startPush('js'); ?>
    <script src="<?php echo e(asset('plugins/components/custom-select/custom-select.min.js')); ?>" type="text/javascript"></script>
        <script>
            $('#attorney').on('change',function(){
                var attorney = $('option:selected', this).attr('data_email');
                var attorney_name = $('option:selected', this).attr('data_name');
                $('#attorney_email').val(attorney);
                $('#attorney_name').val(attorney_name);
            });

            $("#email").on('keyup paste',function(){
        var email = $(this).val();
        $.ajax({
            url                             : "<?php echo e(route('check_email')); ?>",
            method                          : "POST",
            data                            : {
                '_token': '<?php echo e(csrf_token()); ?>',
                email          :email,
            },
            success: function( data ) {
                console.log(data);
                if(data=='yes'){
                    $('#email_exist_msg').text("This email is already registered");
                    // $('input[type="submit"]').removeAttr('disabled','disabled');
                }else{
                    $('#email_exist_msg').text("");
                    // $('input[type="submit"]').attr('disabled','disabled');
                }
            },

        });
    });
        </script>
        <script >
        
        $(document).ready(function() {
            $('#document').on('change', function() {
                var filePath = $(this).val();
                var fileName = filePath.replace(/^.*[\\\/]/, '');
                $('.file_upload').html(fileName);
            });
        });
        </script>
        <script>
            $(document).ready(function() {
                $('.client_attitude_other').hide();
                    $('.other').on('click', function() {
                    if ($(this).is(':checked')) {
                        $('.client_attitude_other').show();
                    } else {
                        $('.client_attitude_other').hide();
                    }
                });
                $('.firm_other').hide();
                $('.firm_other_id').on('click', function() {
                    if ($(this).is(':checked')) {
                        $('.firm_other').show();
                    } else {
                        $('.firm_other').hide();
                    }
                });
                $('.exampleRadios1').on('click', function() {
                    if ($(this).is(':checked')) {
                        $('.firm_other').hide();
                    }
                });
                $('.exampleRadios2').on('click', function() {
                    if ($(this).is(':checked')) {
                        $('.client_attitude_other').hide();
                    }
                });
            });
        </script>

<script>
        jQuery(document).ready(function() {
            // For select 2
            $(".select2").select2();
            $('.selectpicker').selectpicker();

        });
    </script>
    <?php $__env->stopPush(); ?><?php /**PATH /home1/backendpro/public_html/usman/lcm/resources/views/client/client/form.blade.php ENDPATH**/ ?>