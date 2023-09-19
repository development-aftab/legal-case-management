<div class="col-md-6 col-sm-12 form-group">
    <input type="text" class="form-control" id="" name="case_number" required placeholder="Case Number">
</div>
<div class="col-md-6 col-sm-12 form-group">
    <input type="number" class="form-control" id="" value="<?php echo e(rand(11111111,99999999)); ?>" readonly name="flc_number" required>
</div>
<div class="col-md-6 col-sm-12 form-group">
    <input type="text" class="form-control" id=""  placeholder="Name of Parties" name="name_of_parties" required>
    <input type="hidden" name="client_id" value="<?php echo e($clientId); ?>">
</div>
<div class="col-md-6 col-sm-12 form-group">
    <input type="text" class="form-control" id="" placeholder="Judge Name" name="judge_name" required>
</div>
<div class="col-md-6 col-sm-12 form-group">
    <select class="select2 form-control select2-multiple" id="senior_counsel_id" name="senior_counsel_id[]" multiple="multiple" data-placeholder="Senior Counsel">
        <option disabled selected hidden>Senior Counsel</option>
        <?php $__currentLoopData = $seniorCounsels; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $seniorCounsel): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <option value="<?php echo e($seniorCounsel->id); ?>"><?php echo e($seniorCounsel->name); ?></option>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </select>
</div>
<div class="col-md-6 col-sm-12 form-group">
    <select class="select2 form-control select2-multiple" id="king_counsel" name="king_counsel_id[]" multiple="multiple" data-placeholder="King Counsel">
        <option disabled selected hidden>King Counsel</option>
        <?php $__currentLoopData = $kingCounsels; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $kingCounsel): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <option value="<?php echo e($kingCounsel->id); ?>"><?php echo e($kingCounsel->name); ?></option>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </select>
</div>
<div class="col-md-6 col-sm-12 form-group">
    <select class="select2 form-control select2-multiple" id="junior_counsel_id" name="junior_counsel_id[]" multiple="multiple" data-placeholder="Junior Counsel">
        <option disabled selected hidden>Junior Counsel</option>
        <?php $__currentLoopData = $juniorCounsels; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $juniorCounsel): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <option value="<?php echo e($juniorCounsel->id); ?>"><?php echo e($juniorCounsel->name); ?></option>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </select>
</div>
<div class="col-md-6 col-sm-12 form-group">
    <select class="select2 form-control select2-multiple" id="ChambersManager" name="chambers_manager_id[]" multiple="multiple" data-placeholder="Chambers Manager">
        <option disabled selected hidden>Chambers Manager</option>
        <?php $__currentLoopData = $ChambersManagers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ChambersManager): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <option value="<?php echo e($ChambersManager->id); ?>"><?php echo e($ChambersManager->name); ?></option>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </select>
</div>
<div class="col-md-6 col-sm-12 form-group">
    <select class="select2 form-control select2-multiple" id="paralegal" name="paralegal_id[]" multiple="multiple" data-placeholder="Paralegal">
        <option disabled selected hidden>Senior xCounsel</option>
        <?php $__currentLoopData = $Paralegals; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $Paralegal): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <option value="<?php echo e($Paralegal->id); ?>"><?php echo e($Paralegal->name); ?></option>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </select>
</div>



     
    

<div class="col-md-6 col-sm-12 form-group file_input">
    <label class="file_input_lable" for="retainer_agreement">
        <h3 class="file_upload">No File</h3>
        <a class="btn btn_black btn_img">
            Upload Retainer Agreement
            <img class="img-fluid " src="<?php echo e(asset('website')); ?>/assets/images/upload.png" alt="">
        </a>
    </label>
    <input type="file" class="form-control-file" name="retainer_agreement" accept="" id="retainer_agreement">
</div>
<div class="col-md-6 col-sm-12 form-group">
    <select class="select2 form-control select2-multiple" id="type_of_matter" name="type_of_matter_id[]" multiple="multiple" data-placeholder="Type Of Matter">
        <option disabled selected hidden>Type of Matter</option>
        <?php $__currentLoopData = $typeOfMatters; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $typeOfMatter): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <option value="<?php echo e($typeOfMatter->id); ?>"><?php echo e($typeOfMatter->name); ?></option>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </select>
</div>

    
        
            
        
    

<div class="col-md-6 col-sm-12 form-group">
    <div class="input-group"><span class="input-group-addon">#</span>
        <!-- <input type="text" class="form-control" id=""  placeholder="Tags ( Trend )" required> -->
        <input type="text" class="form-control" name="tags" data-role="tagsinput"  placeholder="Tags ( Trend )"/>
    </div>
</div>
<div class="col-md-6 col-sm-12 form-group">
    <textarea class="form-control" placeholder="Case Condition" name="case_condition" id="" cols="10" rows="5"></textarea>
</div>
<div class="col-md-6 col-sm-12 form-group">
    <input class="btn btn_black btn_block" type="submit" value="<?php echo e($submitButtonText??'Create'); ?>">
</div>
<?php $__env->startPush('js'); ?>
<script>
    $(document).ready(function() {
        $('#retainer_agreement').on('change', function() {
            var filePath = $(this).val();
            var fileName = filePath.replace(/^.*[\\\/]/, '');
            $('.file_upload').html(fileName);
        });
    });
</script>
<?php $__env->stopPush(); ?><?php /**PATH /home1/backendpro/public_html/usman/lcm/resources/views/caseFile/case-file/form.blade.php ENDPATH**/ ?>