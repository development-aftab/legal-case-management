<?php $__env->startPush('css'); ?>
<link href="<?php echo e(asset('plugins/components/datatables/jquery.dataTables.min.css')); ?>" rel="stylesheet" type="text/css"/>
    <link href="https://cdn.datatables.net/buttons/1.2.2/css/buttons.dataTables.min.css" rel="stylesheet"
          type="text/css"/>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <section class="accounts_table_sec">
        
        <div class="container-fluid">
        <!-- .row -->
        <div class="row">
            <div class="col-sm-12">
                <div class="white-box">
                    <h3 class="box-title pull-left"><?php echo e(preg_replace('/(?<=[a-z])[A-Z]|[A-Z](?=[a-z])/', ' $0', 'Accounts')); ?></h3>
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('add-'.str_slug('CaseFile'))): ?>
                        <a class="btn btn_black pull-right" href="<?php echo e(url('/caseFile/case-file/create')); ?>"> Add <?php echo e(preg_replace('/(?<=[a-z])[A-Z]|[A-Z](?=[a-z])/', ' $0', 'CaseFile')); ?></a>
                    <?php endif; ?>
                    <div class="clearfix"></div>
                    <hr>
                    <div class="inner_section_table">
                        <div class="table-responsive">
                        <table class="table" id="myTable">
                            <thead>
                            <tr>
                                <th scope="col">Case Id</th>
                                <th scope="col">Party Name</th>
                                <th scope="col">Assign Attorney</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $__currentLoopData = $casefile; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($item->case_number); ?></td><td><?php echo e($item->name_of_parties); ?></td><td><?php echo e($item->attorney_associate_id->attorneyOrAssociate->name??''); ?></td>
                                    <td>
                                        <!-- <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view-'.str_slug('CaseFile'))): ?>
                                            <a href="<?php echo e(url('/caseFile/case-file/' . $item->id)); ?>"
                                               title="View <?php echo e(preg_replace('/(?<=[a-z])[A-Z]|[A-Z](?=[a-z])/', ' $0', 'CaseFile')); ?>">
                                                <button class="btn btn-info btn-sm">
                                                    <i class="fa fa-eye" aria-hidden="true"></i> View
                                                </button>
                                            </a>
                                        <?php endif; ?>

                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('edit-'.str_slug('CaseFile'))): ?>
                                            <a href="<?php echo e(url('/caseFile/case-file/' . $item->id . '/edit')); ?>"
                                               title="Edit <?php echo e(preg_replace('/(?<=[a-z])[A-Z]|[A-Z](?=[a-z])/', ' $0', 'CaseFile')); ?>">
                                                <button class="btn btn-primary btn-sm">
                                                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit
                                                </button>
                                            </a>
                                        <?php endif; ?>

                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete-'.str_slug('CaseFile'))): ?>
                                            <form method="POST"
                                                  action="<?php echo e(url('/caseFile/case-file' . '/' . $item->id)); ?>"
                                                  accept-charset="UTF-8" style="display:inline">
                                                <?php echo e(method_field('DELETE')); ?>

                                                <?php echo e(csrf_field()); ?>

                                                <button type="submit" class="btn btn-danger btn-sm"
                                                        title="Delete <?php echo e(preg_replace('/(?<=[a-z])[A-Z]|[A-Z](?=[a-z])/', ' $0', 'CaseFile')); ?>"
                                                        onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete
                                                </button>
                                            </form>
                                        <?php endif; ?> -->
                                        <div class="dropdown action_dropdown">
                                                <button class="btn dropdown-toggle action_btn" type="button"
                                                        id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                                        aria-expanded="false">
                                                    <i class="fa-solid fa-eye"></i>
                                                </button>
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">                                                    
                                                    <?php if(isset($item->caseInvoice)  && $item->caseInvoice !=null): ?>
                                                        <a class="dropdown-item" href="<?php echo e(url('have_invoice', [$item->id])); ?>">Have Invoice</a>
                                                    <?php else: ?>
                                                        <a class="dropdown-item" href="<?php echo e(url('create_invoice', [$item->id])); ?>">Create Invoice</a>
                                                    <?php endif; ?>
                                                    <a class="dropdown-item" href="<?php echo e(route('case_accounting', [$item->id])); ?>">Accounts</a>
                                                    <a class="dropdown-item" href="<?php echo e(route('case_order', [$item->id])); ?>">Orders</a>
                                                    <a class="dropdown-item" href="<?php echo e(route('case_allocatur', [$item->id])); ?>">Allocatur</a>
                                                    <a class="dropdown-item" href="<?php echo e(route('case_letter', [$item->id])); ?>">Letter</a>
                                                    <a class="dropdown-item" href="<?php echo e(route('case_cheque', [$item->id])); ?>">Cheques</a>
                                                    <?php if(isset($item->billOfCost)  && $item->billOfCost !=null): ?>
                                                        <a class="dropdown-item" href="<?php echo e(url('have_billofcost', [$item->id])); ?>">Have Bill Of Cost</a>
                                                    <?php else: ?>
                                                        <a class="dropdown-item" href="<?php echo e(route('bill_of_cost', [$item->id ,'case'])); ?>">Generate Bill Of Cost</a>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                        
                        </div>
                    </div>    
                </div>
            </div>
        </div>
    </div>
    </section>
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
                "ordering": false, // disable sorting on all columns
                "paging": true, // enable pagination
                "searching": true // enable search
            });
        });
    </script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home1/backendpro/public_html/usman/lcm/resources/views/dashboard/account.blade.php ENDPATH**/ ?>