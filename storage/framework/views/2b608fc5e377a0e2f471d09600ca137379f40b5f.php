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
                    <form class="form-horizontal row dashboard_form" action="<?php echo e(route('update_case_file')); ?>" method="post" enctype="multipart/form-data">
                        <?php echo e(csrf_field()); ?>

                        <div class="col-md-6 col-sm-12 form-group">
                            <input type="number" class="form-control" id="" value="<?php echo e($casefile->case_number??''); ?>" name="case_number" required placeholder="Case Number">
                        </div>
                        <div class="col-md-6 col-sm-12 form-group">
                            <input type="number" class="form-control" id="" value="<?php echo e(rand(11111111,99999999)); ?>" readonly name="flc_number" required>
                        </div>
                        <div class="col-md-6 col-sm-12 form-group">
                            <input type="text" class="form-control" id=""  value="<?php echo e($casefile->name_of_parties??''); ?>" placeholder="Name of Parties" name="name_of_parties" required>
                            <input type="hidden" name="id" value="<?php echo e($casefile->id??''); ?>">
                        </div>
                        <div class="col-md-6 col-sm-12 form-group">
                            <input type="text" class="form-control" id="" value="<?php echo e($casefile->judge_name??''); ?>" placeholder="Judge Name" name="judge_name" required>
                        </div>
                        <div class="col-md-6 col-sm-12 form-group">
                            <select class="select2 form-control select2-multiple" id="senior_counsel" name="senior_counsel_id[]" multiple="multiple" data-placeholder="Senior Counsel">
                                <?php $__currentLoopData = $seniorCounsels; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $seniorCounsel): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($seniorCounsel->id); ?>" <?php if(isset($casefile) && in_array($seniorCounsel->id,$casefile->caseSeniorCounselIds)): ?> selected <?php endif; ?>><?php echo e($seniorCounsel->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                        <div class="col-md-6 col-sm-12 form-group">
                            <select class="select2 form-control select2-multiple" id="king_counsel" name="king_counsel_id[]" multiple="multiple" data-placeholder="King Counsel">
                                <?php $__currentLoopData = $kingCounsels; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $kingCounsel): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($kingCounsel->id); ?>" <?php if(isset($casefile) && in_array($kingCounsel->id,$casefile->caseKingCounselIds)): ?> selected <?php endif; ?>><?php echo e($kingCounsel->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                        <div class="col-md-6 col-sm-12 form-group">
                            <select class="select2 form-control select2-multiple" id="junior_counsel" name="junior_counsel_id[]" multiple="multiple" data-placeholder="Junior Counsel">
                                <?php $__currentLoopData = $juniorCounsels; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $juniorCounsel): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($juniorCounsel->id); ?>" <?php if(isset($casefile) && in_array($juniorCounsel->id,$casefile->caseJuniorCounselIds)): ?> selected <?php endif; ?>><?php echo e($juniorCounsel->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                        <div class="col-md-6 col-sm-12 form-group">
                            <select class="select2 form-control select2-multiple" id="chamber_manager" name="chamber_manager_id[]" multiple="multiple" data-placeholder="Chamber Manager">
                                <?php $__currentLoopData = $ChambersManagers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ChambersManager): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($ChambersManager->id); ?>" <?php if(isset($casefile) && in_array($ChambersManager->id,$casefile->caseChambersManagerIds)): ?> selected <?php endif; ?>><?php echo e($ChambersManager->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                        <div class="col-md-6 col-sm-12 form-group">
                            <select class="select2 form-control select2-multiple" id="paralegal" name="paralegal_id[]" multiple="multiple" data-placeholder="Paralegal">
                                <?php $__currentLoopData = $Paralegals; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $Paralegal): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($Paralegal->id); ?>" <?php if(isset($casefile) && in_array($Paralegal->id,$casefile->caseParalegalIds)): ?> selected <?php endif; ?>><?php echo e($Paralegal->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                        <div class="col-md-6 col-sm-12 form-group">
                            <input type="file" class="form-control" id="" name="retainer_agreement"  placeholder="Retainer Agreement" accept="application/pdf">
                        </div>
                        <div class="col-md-6 col-sm-12 form-group">
                            <select class="select2 form-control select2-multiple" id="type_of_matter" name="type_of_matter_id[]" multiple="multiple" data-placeholder="Type Of Matter">
                                <?php $__currentLoopData = $typeOfMatters; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $typeOfMatter): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($typeOfMatter->id); ?>" <?php if(isset($casefile) && in_array($typeOfMatter->id,$casefile->caseTypeOfMatterIds)): ?> selected <?php endif; ?>><?php echo e($typeOfMatter->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                        
                            
                                
                                    
                                        
                                    
                                
                            
                        
                        <div class="col-md-6 col-sm-12 form-group">
                        <div class="input-group">
                                <span class="input-group-addon">#</span>
                                <div class="bootstrap-tagsinput">
                                    <?php $__currentLoopData = $casetags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if(isset($casefile) && in_array($tag->id,$casefile->caseTagIds)): ?>
                                            <span class="tag label label-info"><?php echo e($tag->name??''); ?></span>
                                        <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12 form-group">
                            <textarea class="form-control" placeholder="Case Condition" name="case_condition" id="" cols="10" rows="5"><?php echo e($casefile->case_condition??''); ?></textarea>
                        </div>
                        <div class="col-md-6 col-sm-12 form-group">
                            <input class="btn btn_black btn_block" type="submit" value="Update">
                        </div>
                    </form>
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
    </script>
    <script src="<?php echo e(asset('plugins/components/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js')); ?>"></script>
    <script src="<?php echo e(asset('plugins/components/custom-select/custom-select.min.js')); ?>" type="text/javascript"></script>
    <script src="<?php echo e(asset('plugins/components/bootstrap-select/bootstrap-select.min.js')); ?>" type="text/javascript"></script>
    <script>
        jQuery(document).ready(function() {
            // For select 2
            $(".select2").select2();
            $('.selectpicker').selectpicker();

        });
    </script>

<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home1/backendpro/public_html/usman/lcm/resources/views/dashboard/edit_casefile.blade.php ENDPATH**/ ?>