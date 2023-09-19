<?php if(count($attorneyNoti) != 0): ?>        
    <h2 style="background-color: #d5af2a; font-size: 20px; color: #fff; padding: 5px;" align="center">Your New Client</h2>
    <?php $__currentLoopData = $attorneyNoti; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $element): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <a class="attorney" data-id="<?php echo e($element->id); ?>" href="<?php echo e(url('/client/client/' . $element->id)); ?>" target="_blank">
            <div class="mail-contnet" align="center">
                <span style="color: #000;">Client Name: <b> <?php echo e($element->name); ?></b></span>
                <span class="mail-desc">Client Email: <b><?php echo e($element->email??''); ?></b></span>
                <span class="time">Client Contact: <b><?php echo e($element->contact??''); ?></b></span>
            </div>
        </a>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php else: ?>
    <a class="text-center">
        <strong>No Client Notification</strong>
        <i class="fa fa-angle-right"></i>
    </a>
<?php endif; ?>
<?php if(count($attorneyEventNoti) != 0): ?>
    <h2 style="background-color: #d5af2a; font-size: 20px; color: #fff; padding: 5px;" align="center">Your New Events</h2>
    <?php $__currentLoopData = $attorneyEventNoti; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $element): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <a class="event" data-id="<?php echo e($element->id); ?>" href="<?php echo e(url('dashboard')); ?>" target="_blank">
            <div class="mail-contnet" align="center">
                <span style="color: #000;">Event Title: <b> <?php echo e($element->caseEvent->name??''); ?></b></span>
                <span class="mail-desc">Event Date: <b><?php echo e($element->caseEvent->date??''); ?></b></span>
                <span class="time">Event Location: <b><?php echo e($element->caseEvent->location??''); ?></b></span>
            </div>
        </a>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php else: ?>
    <a class="text-center">
        <strong>No Event Notification</strong>
        <i class="fa fa-angle-right"></i>
    </a>
<?php endif; ?>
<?php if(count($juniorCounsels) != 0): ?>
    <h2 style="background-color: #d5af2a; font-size: 20px; color: #fff; padding: 5px;" align="center">Case Junior Counsel</h2>
    <?php $__currentLoopData = $juniorCounsels; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $element): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <a class="junior_counsel" data-id="<?php echo e($element->id); ?>" href="<?php echo e(url('case_junior_counsel')); ?>" target="_blank">
            <div class="mail-contnet" align="center">
                <span style="color: #000;">Case Party Name: <b> <?php echo e($element->getCaseDetail->name_of_parties??''); ?></b></span>
                <span class="mail-desc">Case Judge Name: <b><?php echo e($element->getCaseDetail->judge_name??''); ?></b></span>
                <span class="time">Case Number: <b><?php echo e($element->getCaseDetail->case_number??''); ?></b></span>
            </div>
        </a>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php else: ?>
    <a class="text-center">
        <strong>No Junior Counsel Notification</strong>
        <i class="fa fa-angle-right"></i>
    </a>
<?php endif; ?>
<?php if(count($seniorCounsel) != 0): ?>
    <h2 style="background-color: #d5af2a; font-size: 20px; color: #fff; padding: 5px;" align="center">Case Senior Counsel</h2>
    <?php $__currentLoopData = $seniorCounsel; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $element): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <a class="senior_counsel" data-id="<?php echo e($element->id); ?>" href="<?php echo e(url('case_senior_counsel')); ?>" target="_blank">
            <div class="mail-contnet" align="center">
                <span style="color: #000;">Case Party Name: <b> <?php echo e($element->getCaseDetail->name_of_parties??''); ?></b></span>
                <span class="mail-desc">Case Judge Name: <b><?php echo e($element->getCaseDetail->judge_name??''); ?></b></span>
                <span class="time">Case Number: <b><?php echo e($element->getCaseDetail->case_number??''); ?></b></span>
            </div>
        </a>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php else: ?>
    <a class="text-center">
        <strong>No Senior Counsel Notification</strong>
        <i class="fa fa-angle-right"></i>
    </a>
<?php endif; ?>
<?php if(count($kingCounsel) != 0): ?>
    <h2 style="background-color: #d5af2a; font-size: 20px; color: #fff; padding: 5px;" align="center">Case King Counsel</h2>
    <?php $__currentLoopData = $kingCounsel; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $element): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <a class="king_counsel" data-id="<?php echo e($element->id); ?>" href="<?php echo e(url('case_king_counsel')); ?>" target="_blank">
            <div class="mail-contnet" align="center">
                <span style="color: #000;">Case Party Name: <b> <?php echo e($element->getCaseDetail->name_of_parties??''); ?></b></span>
                <span class="mail-desc">Case Judge Name: <b><?php echo e($element->getCaseDetail->judge_name??''); ?></b></span>
                <span class="time">Case Number: <b><?php echo e($element->getCaseDetail->case_number??''); ?></b></span>
            </div>
        </a>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php else: ?>
    <a class="text-center">
        <strong>No King Counsel Notification</strong>
        <i class="fa fa-angle-right"></i>
    </a>
<?php endif; ?>
<?php if(count($paralegalCounsel) != 0): ?>
    <h2 style="background-color: #d5af2a; font-size: 20px; color: #fff; padding: 5px;" align="center">Case Paralegal</h2>
    <?php $__currentLoopData = $paralegalCounsel; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $element): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <a class="paralegal" data-id="<?php echo e($element->id); ?>" href="<?php echo e(url('case_paralegal')); ?>" target="_blank">
            <div class="mail-contnet" align="center">
                <span style="color: #000;">Case Party Name: <b> <?php echo e($element->getCaseDetail->name_of_parties??''); ?></b></span>
                <span class="mail-desc">Case Judge Name: <b><?php echo e($element->getCaseDetail->judge_name??''); ?></b></span>
                <span class="time">Case Number: <b><?php echo e($element->getCaseDetail->case_number??''); ?></b></span>
            </div>
        </a>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php else: ?>
    <a class="text-center">
        <strong>No Paralegal Notification</strong>
        <i class="fa fa-angle-right"></i>
    </a>
<?php endif; ?><?php /**PATH /home1/backendpro/public_html/usman/lcm/resources/views/website/ajax/attorney_notification.blade.php ENDPATH**/ ?>