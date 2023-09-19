<?php $__env->startPush('css'); ?>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v6.0.0-beta3/css/all.css">
<?php $__env->stopPush(); ?>
<?php $__env->startSection('content'); ?>

    <section class="detail_view_sec case_detail_sec">
        <div class="container-fluid custom_client_info">
            <div class="row">
            <div class="col-md-12">
                    <div class="white-box ">
                        <div class="row">
                            <div class="col-md-6">
                                <table>
                                    <thead>
                                    <tr>
                                        <th colspan="2" style="border-bottom: 1px solid black;">Client Info<i class="fa-thin fa-user-tie"></i></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <th>Name : </th> <td><?php echo e($client->name??''); ?></td>
                                    </tr>
                                    <tr>
                                        <th>Address : </th> <td><?php echo e($client->profile->address??''); ?></td>
                                    </tr>
                                    <tr>
                                        <th>Next of Kin : </th> <td><?php echo e($client->profile->next_of_kin??''); ?></td>
                                    </tr>
                                    <tr>
                                        <th>Marital Status : </th> <td><?php echo e($client->profile->marital_status??''); ?></td>
                                    </tr>
                                    <tr>
                                        <th>How did you hear about us ?</th> <td><?php echo e(@$client->firm->name); ?></td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-md-6">
                                <table>
                                    <thead>
                                        <tr>
                                            <th colspan="2">&nbsp;</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th>Email : </th><td><?php echo e($client->email??''); ?></td>
                                        </tr>
                                        <tr>
                                            <th>Contact No : </th><td><?php echo e($client->contact??''); ?></td>
                                        </tr>
                                        <tr>
                                            <th>Salary : </th><td>$<?php echo e($client->profile->salary??''); ?></td>
                                        </tr>
                                        <tr>
                                            <th>Payment Detail : </th><td><?php $__currentLoopData = $client->clientPaymentMethods; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $methods): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <?php echo e(@$methods->paymentMethod->name??''); ?><br> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?></td>
                                        </tr>
                                        <tr>
                                            <th>Describe client's attitude : </th><td><?php echo e(@$client->clientAttitude->name??''); ?></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-md-12">
                                <table>
                                    <thead>
                                        <tr>
                                            <th colspan="2">&nbsp;</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th>Original ID : </th><td><a href="<?php echo e(asset('website')); ?>/<?php echo e($client->document??''); ?>" target="_blank"><img class="img-fluid" src="<?php echo e(asset('website')); ?>/assets/images/doc-icon.png"></a></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            
                            
                                
                                
                                
                                
                                
                                
                            
                            
                                
                                
                                
                                
                                
                                
                            
                        </div>
                    </div>
                </div>

                    <?php $__currentLoopData = $client->clientCase; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $clientCase): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-md-12">
                            <div class="white-box ">
                                <div class="row">

                                    <div class="col-md-6">
                                        <table>
                                            <thead>

                                            <tr>
                                                <th colspan="2" style="border-bottom: 1px solid black;">Case Info<i class="fa-thin fa-scale-balanced"></i></th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <th>Case NO# : </th> <td><?php echo e($clientCase->case_number ??''); ?></td>
                                            </tr>
                                            <tr>
                                                <th>Senior Counsel : </th> <td><ul><?php $__currentLoopData = $clientCase->seniorCounsels; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $senior): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><li><?php echo e($senior->caseSeniorCounsel->name ??''); ?></li><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?></ul></td>
                                            </tr>
                                            <tr>
                                                <th>King Counsel : </th> <td><ul><?php $__currentLoopData = $clientCase->kingCounsels; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $senior): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><li><?php echo e($senior->caseKingCounsel->name ??''); ?></li><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?></ul></td>
                                            </tr>
                                            <tr>
                                                <th>Tags ( Trend ): </th> <td><?php $__currentLoopData = $clientCase->tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>#<?php echo e($tag->name ??''); ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?></td>
                                            </tr>
                                            <tr>
                                                <th>Document Center : </th> <td><ul><?php $__currentLoopData = $clientCase->originatingProcess; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $process): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <li><a href="<?php echo e(url('originating_process', [$process->id])); ?>"><?php echo e($process->process->name ??''); ?></a></li><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?></ul></td>
                                            </tr>
                                            </tbody>
                                        </table>

                                        <table class="custom_case_status">
                                            <thead>
                                            <tr>
                                                <th>
                                                    Case Condition
                                                </th>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <?php echo e($clientCase->case_condition ??''); ?>

                                                </td>
                                            </tr>
                                            </thead>
                                        </table>
                                    </div>
                                    <div class="col-md-6">
                                        <table>
                                            <thead>
                                            <tr>
                                                <th colspan="2">&nbsp;</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <th>Name of Parties : </th><td><?php echo e($clientCase->name_of_parties ??''); ?></td>
                                            </tr>
                                            <tr>
                                                <th>Judge Name : </th><td><?php echo e($clientCase->judge_name ??''); ?></td>
                                            </tr>
                                            <tr>
                                                <th>Chambers Manager : </th><td><ul><?php $__currentLoopData = $clientCase->ChambersManagers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $senior): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><li><?php echo e($senior->caseChambersManager->name ??''); ?></li><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?></ul></td>
                                            </tr>
                                            <tr>
                                                <th>Paralegal : </th><td><ul><?php $__currentLoopData = $clientCase->Paralegals; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $king): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><li><?php echo e($king->caseParalegal->name ??''); ?></li><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?></ul></td>
                                            </tr>
                                            <tr>
                                                <th>Junior Counsel : </th><td><ul><?php $__currentLoopData = $clientCase->JuniorCounsel; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $junior): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><li><?php echo e($junior->CaseJuniorCounsel->name ??''); ?></li><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?></ul></td>
                                            </tr>
                                            <tr>
                                                <th>Type of Matter : </th><td><ul><?php $__currentLoopData = $clientCase->typeOfMatters; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $matter): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><li><?php echo e($matter->caseTypeOfMatters->name ??''); ?></li><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?></ul></td>
                                            </tr>
                                            <tr>
                                                <th>Client Retainer Agreement: </th><td><a href="<?php echo e(asset('website')); ?>/<?php echo e($clientCase->retainer_agreement??''); ?>" target="_blank">abc.file</a></td>
                                            </tr>
                                            <tr>
                                                <th>
                                                    <?php if($clientCase): ?>

                                                    <?php else: ?>
                                                        Next Court Date:
                                                    <?php endif; ?>
                                                </th>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    
                                    
                                        
                                        
                                        
                                            
                                                
                                                
                                                
                                            
                                        
                                        
                                        
                                            
                                                
                                            
                                        
                                        
                                            
                                                
                                            
                                        
                                    
                                    
                                        
                                            
                                        
                                            
                                        
                                            
                                        
                                            
                                                
                                                    
                                                
                                            
                                        
                                        
                                            
                                                
                                                    
                                                
                                            
                                        

                                            

                                            
                                                
                                            
                                    
                                    
                                        
                                        
                                        
                                        
                                    
                                </div>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home1/backendpro/public_html/usman/lcm/resources/views/client/client/show.blade.php ENDPATH**/ ?>