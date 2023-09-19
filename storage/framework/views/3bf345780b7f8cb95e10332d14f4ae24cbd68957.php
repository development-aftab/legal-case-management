<?php if(count($caseNoti) != 0): ?>
    <h3 style="background-color: #d5af2a; font-size: 20px; color: #fff; padding: 5px;" align="center">New Case Register</h3>
    <?php $__currentLoopData = $caseNoti; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $element): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <a class="anchor" data-id="<?php echo e($element->id); ?>" href="<?php echo e(url('/client/client/' . $element->client->id)); ?>" target="_blank">
            <div class="mail-contnet" align="center">
                <span style="color: #000;">Client Name: <b> <?php echo e($element->client->name??''); ?></b></span>
                <span class="mail-desc">Name Of Party: <b><?php echo e($element->name_of_parties??''); ?></b></span>
                <span class="time">Case Number: <b><?php echo e($element->case_number??''); ?></b></span>
            </div>
        </a>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php else: ?>
   
<?php endif; ?>  
<?php if(count($invoiceNoti) != 0): ?>
    <h3 style="background-color: #d5af2a; font-size: 20px; color: #fff; padding: 5px;" align="center">New Invoice</h3>
        <?php $__currentLoopData = $invoiceNoti; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <a class="anchor" invoice-id="<?php echo e($value->id); ?>" target="_blank" href="<?php echo e(route('invoice_pdf')); ?>/<?php echo e($value->id??''); ?>" target="_blank">
                <div class="mail-contnet" align="center">
                    <span style="color: #000;">Client Name: <b><?php echo e($value->caseFile->name_of_parties??''); ?></b></span>
                    <span class="mail-desc">Invoice Number <b><?php echo e($value->invoice_number??''); ?></b></span>
                    <span class="time">Total <b>$<?php echo e($value->total); ?></b></span>
                </div>
            </a>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php else: ?>
   
<?php endif; ?> 
<?php if(count($billNoti) != 0): ?>
    <h3 style="background-color: #d5af2a; font-size: 20px; color: #fff; padding: 5px;" align="center">New Bill Of Cost</h3>
        <?php $__currentLoopData = $billNoti; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <a class="anchor" cost-id="<?php echo e($item->id); ?>" target="_blank" href="<?php echo e(route('cost_pdf')); ?>/<?php echo e($item->id??''); ?>" target="_blank">
                <div class="mail-contnet" align="center">
                    <span style="color: #000;">This Case: <b><?php echo e($item->caseFile->name_of_parties??''); ?></b></span>
                    <span class="mail-desc">Bill Of Cost Total <b>$<?php echo e($item->total??''); ?></b></span>
                </div>
            </a>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php else: ?>
   
<?php endif; ?> 
<?php if(count($accountingNoti) != 0): ?>
    <h3 style="background-color: #d5af2a; font-size: 20px; color: #fff; padding: 5px;" align="center">New Client Accounting</h3>
        <?php $__currentLoopData = $accountingNoti; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $demo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <a class="anchor" accounting-id="<?php echo e($demo->id); ?>" href="<?php echo e(route('case_accounting')); ?>/<?php echo e($demo->casefile->id??''); ?>" target="_blank">
                <div class="mail-contnet" align="center">
                    <span style="color: #000;">This Client New Accounting <br> <b><?php echo e($demo->casefile->client->name??''); ?></b></span>
                    <span class="mail-desc">Payment Method Process <b><?php echo e($demo->paymentMethod->name??''); ?></b></span>
                    <span class="time">Paid Ammount: <b><?php echo e($demo->paid_ammount??''); ?></b> <br> Balance Ammount: <b><?php echo e($demo->balance_ammount??''); ?></b></span>
                </div>
            </a>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php else: ?>
   
<?php endif; ?><?php /**PATH /home1/backendpro/public_html/usman/lcm/resources/views/website/ajax/case_notification.blade.php ENDPATH**/ ?>