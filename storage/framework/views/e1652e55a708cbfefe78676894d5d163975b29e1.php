    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×
                </button>
                <h1 class="modal-title">Master File</h1></div>
            <form name="form1">
            </form>
            <div class="modal-body">
                <form method="POST" action="<?php echo e(route('master_file')); ?>">
                    <?php echo csrf_field(); ?>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th scope="col">E-Files Name</th>
                                <th scope="col">E-Files</th>
                                <th scope="col">Doc Pages</th>
                                <th scope="col">Select</th>
                            </tr>
                            </thead>
                            <tbody>

                            <?php $__currentLoopData = $caseOriginates; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php $__currentLoopData = $value->orignatingProcesseds; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $process): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($process->title ??''); ?></td>
                                        <td><a href="<?php echo e(asset('website')); ?>/<?php echo e($process->file ??''); ?>" target="_blank" >abc file.pdf</a></td>
                                        <td><?php echo e(preg_match_all("/\/Page\W/", file_get_contents(public_path('website').'/'.$process->file??''))); ?> Pages</td>
                                        <td>
                                            <div class="custom_check">
                                                <input type="checkbox" name="process_id[]" value="<?php echo e($process->id); ?>" checked>
                                            </div>
                                        </td>
                                    </tr>   
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                            </tbody>
                        </table>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn_black btn_block">Preview</button>
                    </div>
                </form>
            </div>
        </div>
    </div><?php /**PATH /home1/backendpro/public_html/usman/lcm/resources/views/website/ajax/generate_master_file_ajax.blade.php ENDPATH**/ ?>