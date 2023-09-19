<?php $__env->startPush('css'); ?>
    <link href="<?php echo e(asset('plugins/components/datatables/jquery.dataTables.min.css')); ?>" rel="stylesheet" type="text/css"/>
    <link href="https://cdn.datatables.net/buttons/1.2.2/css/buttons.dataTables.min.css" rel="stylesheet"
          type="text/css"/>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <div class="container-fluid">
        <!-- .row -->
        <div class="row">
            <div class="col-sm-12">
                <div class="white-box">
                    <h3 class="box-title pull-left"><?php echo e(preg_replace('/(?<=[a-z])[A-Z]|[A-Z](?=[a-z])/', ' $0', 'CaseInvoice')); ?></h3>
                    <a style="margin-left: 10px" href="<?php echo e(url()->previous()); ?>" class="btn btn_black pull-right model_img img-responsive">Back</a>
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('add-'.str_slug('CaseInvoice'))): ?>
                        <a class="btn btn_black pull-right" href="<?php echo e(url('create_invoice', [$caseFileId])); ?>">Add Invoice</a>
                    <?php endif; ?>
                    <div class="clearfix"></div>
                    <hr>
                    <div class="inner_section_table">
                        <div class="table-responsive">
                            <table class="table" id="myTable">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Date</th><th>Case OF Party</th><th>Vat Number</th><th>Invoice Number</th><th>Download</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $__currentLoopData = $caseinvoice; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($loop->iteration); ?></td>
                                        <td><?php echo e($item->date); ?></td><td><?php echo e($item->caseFile->name_of_parties); ?></td><td><?php echo e($item->vat_number); ?></td><td><?php echo e($item->invoice_number); ?></td><td><a href="<?php echo e(route('invoice_pdf')); ?>/<?php echo e($item->id); ?>" target="_blank" class=""><img class="img-fluid" src="<?php echo e(asset('website')); ?>/assets/images/doc-icon.png" alt=""></a></td>
                                        <td>
                                            <div class="dropdown action_dropdown">
                                                <button class="btn dropdown-toggle action_btn" type="button"
                                                        id="dropdownMenuButton" data-toggle="dropdown"
                                                        aria-haspopup="true"
                                                        aria-expanded="false">
                                                    <i class="fa-solid fa-eye"></i>
                                                </button>
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view-'.str_slug('CaseInvoice'))): ?>
                                                        <a href="<?php echo e(url('/caseInvoice/case-invoice/' . $item->id)); ?>" title="View <?php echo e(preg_replace('/(?<=[a-z])[A-Z]|[A-Z](?=[a-z])/', ' $0', 'CaseInvoice')); ?>">
                                                            View
                                                        </a>
                                                    <?php endif; ?>
                                                    
                                                        
                                                            
                                                        
                                                    
                                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete-'.str_slug('CaseInvoice'))): ?>
                                                        <form method="POST" action="<?php echo e(url('/caseInvoice/case-invoice' . '/' . $item->id)); ?>" accept-charset="UTF-8" style="display:inline">
                                                            <?php echo e(method_field('DELETE')); ?>

                                                            <?php echo e(csrf_field()); ?>

                                                            <a><button type="submit" class="" style="border: none;" title="Delete <?php echo e(preg_replace('/(?<=[a-z])[A-Z]|[A-Z](?=[a-z])/', ' $0', 'CaseInvoice')); ?>"  onclick="return confirm(&quot;Confirm delete?&quot;)">
                                                                Delete
                                                            </button></a>
                                                        </form>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> <?php echo $caseinvoice->appends(['search' => Request::get('search')])->render(); ?> </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('js'); ?>
    <script src="<?php echo e(asset('plugins/components/toast-master/js/jquery.toast.js')); ?>"></script>

    <script src="<?php echo e(asset('plugins/components/datatables/jquery.dataTables.min.js')); ?>"></script>
    <!-- start - This is for export functionality only -->
    <!-- end - This is for export functionality only -->
    <script>
        $(document).ready(function () {

            <?php if(\Session::has('message')): ?>
            $.toast({
                heading: 'Success!',
                position: 'top-center',
                text: '<?php echo e(session()->get('message')); ?>',
                loaderBg: '#ff6849',
                icon: 'success',
                hideAfter: 3000,
                stack: 6
            });
            <?php endif; ?>
        })

        $(function () {
            $('#myTable').DataTable({
                'aoColumnDefs': [{
                    'bSortable': false,
                    'aTargets': [-1] /* 1st one, start by the right */
                }]
            });

        });
    </script>

<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home1/backendpro/public_html/usman/lcm/resources/views/caseInvoice/case-invoice/index.blade.php ENDPATH**/ ?>