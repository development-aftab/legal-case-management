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
                    <h3 class="box-title pull-left"><?php echo e(preg_replace('/(?<=[a-z])[A-Z]|[A-Z](?=[a-z])/', ' $0', 'Client')); ?></h3>
                    <div class="filter_btn pull-right">
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('add-'.str_slug('Client'))): ?>
                            <a class="btn btn_yellow btn_icon" href="<?php echo e(url('/client/client/create')); ?>"><?php echo e(preg_replace('/(?<=[a-z])[A-Z]|[A-Z](?=[a-z])/', ' $0', 'Create')); ?><i class="fa fa-pencil"></i></a>
                        <?php endif; ?>
                    </div>
                    <div class="clearfix"></div>
                    <hr>
                        <div class="inner_section_table">
                            <div class="table-responsive">
                                <table class="table table-fixed sticker_table" id="myTable">
                                    <thead>
                                    <tr>
                                        <th scope="col">Name</th>
                                        <th scope="col">E-mail</th>
                                        <th scope="col">Address</th>
                                        <th scope="col">Contact No</th>
                                        <th scope="col">Next of Kin</th>
                                        <th scope="col">Salary</th>
                                        <th scope="col">Marital status</th>
                                        <th scope="col">Instructing Attorney</th>
                                        <th scope="col">ID No</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php $__currentLoopData = $client; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e($item->name); ?></td>
                                            <td><?php echo e($item->email); ?></td>
                                            <td><?php echo e($item->profile->address); ?></td>
                                            <td><?php echo e($item->contact); ?></td>
                                            <td><?php echo e($item->profile->next_of_kin); ?></td>
                                            <td><?php echo e($item->profile->salary); ?></td>
                                            <td><?php echo e($item->profile->marital_status); ?></td>
                                            <td><?php echo e($item->attorneyOrAssociate->name??''); ?></td>
                                            <td><?php echo e($item->profile->id_number); ?></td>
                                            <td>
                                                <div class="dropdown action_dropdown">
                                                    <button class="btn dropdown-toggle action_btn" type="button"
                                                            id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                                            aria-expanded="false">
                                                        <i class="fa-solid fa-eye"></i>
                                                    </button>
                                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                        
                                                        
                                                        
                                                            
                                                        
                                                        
                                                        
                                                        <?php if(Auth::user()->hasRole('attorney')): ?>
                                                            <a class="dropdown-item" href="<?php echo e(url('create_case_file', [$item->id])); ?>">Create Case File</a>
                                                        <?php elseif(Auth::user()->hasRole('user')): ?>
                                                            <a class="dropdown-item" href="<?php echo e(url('create_case_file', [$item->id])); ?>">Create Case File</a>
                                                        <?php else: ?>
                                                        <?php endif; ?>
                                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('edit-'.str_slug('Client'))): ?>
                                                            <a class="dropdown-item" href="<?php echo e(url('/client/client/' . $item->id . '/edit')); ?>" title="Edit <?php echo e(preg_replace('/(?<=[a-z])[A-Z]|[A-Z](?=[a-z])/', ' $0', 'Client')); ?>">
                                                                Edit
                                                            </a>
                                                        <?php endif; ?>
                                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view-'.str_slug('Client'))): ?>
                                                            <a class="dropdown-item" href="<?php echo e(url('/client/client/' . $item->id)); ?>" title="View <?php echo e(preg_replace('/(?<=[a-z])[A-Z]|[A-Z](?=[a-z])/', ' $0', 'Client')); ?>">
                                                                View
                                                            </a>
                                                        <?php endif; ?>
                                                        <?php if(Auth::user()->hasRole('user')): ?>
                                                            <?php if($item->delete_status==1): ?>
                                                                <a class="dropdown-item" href="<?php echo e(route('attorneyAssociate_delete',[$item->id, 0])); ?>">Delete</a>
                                                            <?php endif; ?>
                                                        <?php endif; ?>
                                                        <!-- <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete-'.str_slug('Client'))): ?>
                                                            <form method="POST"
                                                                action="<?php echo e(url('/client/client' . '/' . $item->id)); ?>"
                                                                accept-charset="UTF-8" style="display:inline">
                                                                <?php echo e(method_field('DELETE')); ?>

                                                                <?php echo e(csrf_field()); ?>

                                                                <button type="submit" class="btn btn-danger btn-sm"
                                                                        title="Delete <?php echo e(preg_replace('/(?<=[a-z])[A-Z]|[A-Z](?=[a-z])/', ' $0', 'Client')); ?>"
                                                                        onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete
                                                                </button>
                                                            </form>
                                                        <?php endif; ?> -->
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody>
                                </table>
                                <div class="pagination-wrapper"> <?php echo $client->appends(['search' => Request::get('search')])->render(); ?> </div>
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
                "ordering": false, // disable sorting on all columns
                "paging": true, // enable pagination
                "searching": true // enable search
            });
        });
    </script>

<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home1/backendpro/public_html/usman/lcm/resources/views/client/client/index.blade.php ENDPATH**/ ?>