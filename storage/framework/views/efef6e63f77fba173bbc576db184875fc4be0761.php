    
        
        
            
                
                    
                    
                        
                            
                    
                    
                    
                    
                        
                            
                            
                                
                                
                            
                            
                            
                        
                    
                
            
        
    



<?php $__env->startPush('css'); ?>
    <style>
        table tr td , table tr  th {
            padding: 10px;
        }
    </style>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <div style="    padding: 30px; width: 100%;">
        <div style="font-family: monospace;padding-bottom: 40px;">
            <div style="float: left">
                <div style="width: 112px;height: 80px;margin-right: 40px;float: left">
                    <img src="<?php echo e(asset('website/assets/images/big_logo.png')); ?>" alt="" style="width: 100%;height:100%;object-fit: contain;object-position: center;">
                </div>
                <div style="float: right;">
                    <h3 style="margin: 0px;padding: 0px;font-size: 20px;font-weight: bold;">Legal Case Management</h5>
                        <div style="">
                            <?php $__currentLoopData = $lcm; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <p><b style="font-size: 15px;">Address : </b><?php echo e($item->profile->address); ?></p>
                                <p><b style="font-size: 15px;">Phone : </b><?php echo e($item->contact); ?></p>
                                <p><b style="font-size: 15px;">Email : </b><?php echo e($item->email); ?></p>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                </div>
            </div>
        </div>
        <div style="float:left;border-top: 2px solid rgba(213, 175, 42,1);width: 100%;">
            <div style="width:100%;float:left;justify-content: space-between;margin-top: 50px;">
                <div style="float:left;border: 2px solid rgba(213, 175, 42,0.3);padding: 10px;">
                    <h4 style="font-size:15px;margin: 0px;">Bill To:</h4>

                    <div>
                        <h4 style="font-size:15px;margin: 0px;"><?php echo e($caseinvoice->caseFile->client->name); ?></h4>
                        <h4 style="font-size:15px;margin: 0px;"><?php echo e($caseinvoice->caseFile->client->profile->address); ?></h4>
                    </div>
                </div>
                <table style="float:right;padding: 10px;text-align: left;">
                    <tr>
                        <th>
                            <h4 style="font-size:15px;margin: 0px;">Date : </h4>
                        </th>
                        <td style="text-align: right;"><span><?php echo e(date('d-m-Y', strtotime($caseinvoice->date))); ?></span></td>
                    </tr>
                    <tr>
                        <th>
                            <h4 style="font-size:15px;margin: 0px;">VAT No : </h4>
                        </th>
                        <td style="text-align: right;"><span><?php echo e($caseinvoice->vat_number); ?></span></td>
                    </tr>
                    <tr>
                        <th>
                            <h4 style="font-size:15px;margin: 0px;">Invoice No : </h4>
                        </th>
                        <td style="text-align: right;"><span> <?php echo e($caseinvoice->invoice_number); ?></span></td>
                    </tr>
                </table>
            </div>
            <div>
                <h4 style="float:left; font-size:15px;display: -webkit-box;-webkit-line-clamp: 1;-webkit-box-orient: vertical;overflow: hidden;text-overflow: ellipsis;text-align: left;">Subject : Re : <?php echo e($caseinvoice->subject); ?> </h4>
            </div>
            <table border="1" style="border-color: #D5AF2A;width: 100%">
                <thead style="background: #333333;color: #D5AF2A;height: 50px;">
                <tr>
                    <th style="color: #D5AF2A;text-align: center;width: 100px;">Item</th>
                    <th style="color: #D5AF2A;text-align: center;">Description</th>
                    <th style="color: #D5AF2A;text-align: center;">Legal Fees</th>
                    <th style="color: #D5AF2A;text-align: center;">Disimbursments</th>
                    <th style="color: #D5AF2A;text-align: center;width: 100px;">Total</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td style="vertical-align: top;text-align: center;">
                        1
                    </td>
                    <td style="vertical-align: top;">
                        <?php echo $caseinvoice->description; ?>

                        <div style="display: inline-block;">
                            <ul style="list-style: none;padding: 0px;">
                                <li>
                                    Senior Counsel:
                                </li>
                                <li>
                                    Junior Counsel:
                                </li>
                                <li>
                                    Instructing Attorney:
                                </li>
                            </ul>
                        </div>
                        <div style="display: inline-block">
                            <ul style="list-style: none;padding: 0px;">
                                <li>
                                    $<?php echo e($caseinvoice->senior_counsel_fees); ?>

                                </li>
                                <li>
                                    $<?php echo e($caseinvoice->junior_counsel_fees); ?>

                                </li>
                                <li>
                                    $<?php echo e($caseinvoice->instructing_attorney_fees); ?>

                                </li>
                            </ul>
                        </div>
                    </td>
                    <td  style="vertical-align: top;text-align: center;">
                        $<?php echo e($caseinvoice->total); ?>

                    </td>
                    <td style="vertical-align: top;">

                    </td>
                    <td style="vertical-align: top;">

                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td colspan="3">VAT % </td>
                    <td style="text-align: center;"><?php echo e($caseinvoice->vat_value); ?>%</td>
                </tr>
                <tr>
                    <td></td>
                    <td colspan="3">Total</td>
                    <td style="text-align: center;">$<?php echo e($caseinvoice->total); ?></td>
                </tr>
                </tbody>
            </table>
            <div style="padding-top:20px;margin-top:80px;float: left; border-bottom: 1px dashed black">
                <img src="<?php echo e($caseinvoice->signature); ?>" style="width: 300px; padding-left: 40px; height: 150px;" alt="">

            </div>
            <div style="padding-top:20px; margin-left: -180px;margin-top:240px;float: left;">
                <p style="font-size:15px;margin:0px;padding: 0;"><b>Issued By : </b></p>
                <p style="font-size:15px;margin:0px;padding: 0;margin-left: 15px;"><b><?php echo e(auth::user()->name); ?></b></p>
            </div>
        </div>
    </div>


    
        
        
            
                
                   
                       
                           
                               
                                   
                               
                               
                                   
                                   
                                       
                                           
                                           
                                           
                                       
                                   
                               
                           
                       
                       
                           
                               
                           
                           
                               
                               
                                   
                                   
                                   
                                   
                                   
                               
                               
                               
                               
                                   
                                       
                                   
                                   
                                       
                                       
                                           
                                               
                                                   
                                               
                                               
                                                   
                                               
                                               
                                                   
                                               
                                           
                                       
                                       
                                           
                                               
                                                   
                                               
                                               
                                                   
                                               
                                               
                                                   
                                               
                                           
                                       
                                   
                                   
                                       
                                   
                                   

                                   
                                   

                                   
                               
                               
                                   
                                   
                                   
                               
                               
                                   
                                   
                                   
                               
                               
                           
                           
                               
                           
                           
                               
                               
                           
                       
                   
                
            
        
    
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home1/backendpro/public_html/usman/lcm/resources/views/caseInvoice/case-invoice/show.blade.php ENDPATH**/ ?>