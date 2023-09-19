<?php $__env->startPush('css'); ?>
    <link href="<?php echo e(asset('plugins/components/datatables/jquery.dataTables.min.css')); ?>" rel="stylesheet" type="text/css"/>
    <link href="https://cdn.datatables.net/buttons/1.2.2/css/buttons.dataTables.min.css" rel="stylesheet"
          type="text/css"/>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
<section class="attorney_associate_sec">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 col-lg-12 col-xs-12">
                    <div class="inner_section_heading_wrapper">
                        <!-- <div class="top_heading">
                            <h1>Attorney/Associates</h1>
                        </div> -->
                        <div class="pagination"></div>
                        <div class="search_form">
                            <div class="filter_btn">
                                <select name="" aria-controls="" class="filter_select custom_filter">
                                <option value="" <?php if(true): ?>  selected disabled hidden  <?php endif; ?> >Filter</option>
                                    <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($role->name); ?>" <?php if(isset($filter) && $role->name==$filter): ?> selected <?php endif; ?> ><?php echo e(ucwords($role->name)); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <option value="clear_filter">Clear Filter</option>
                                </select>
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('add-'.str_slug('AttorneyAssociate'))): ?>
                                    <a class="btn btn_yellow pull-right btn_icon" href="<?php echo e(url('/attorneyAssociate/attorney-associate/create')); ?>">
                                        <?php echo e(preg_replace('/(?<=[a-z])[A-Z]|[A-Z](?=[a-z])/', ' $0', 'Create')); ?><i class="fa fa-pencil"></i>
                                    </a>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 col-lg-12 col-xs-12">
                    <div class="inner_section_table">
                        <div class="table-responsive">
                            <table class="table table-fixed sticker_table" id='myTable'>
                                <thead>
                                <tr>
                                    <th scope="col">Name</th>
                                    <th scope="col">E-mail</th>
                                    <th scope="col">Title</th>
                                    <th scope="col">Address</th>
                                    <th scope="col">Contact No</th>
                                    <th scope="col">BAR Number</th>
                                    <th scope="col">BIO</th>
                                    <th scope="col">DOB</th>
                                    <th scope="col">Resume (Doc)</th>
                                    <th scope="col">Practicing Certificate</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $__currentLoopData = $attorneyassociate; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($item->name); ?></td>
                                        <td><?php echo e($item->email); ?></td>
                                        <td><?php echo e(ucwords($item->roles[0]->name)); ?></td>
                                        <td><?php echo substr($item->profile->address,0,15).'...'; ?></td>
                                        <td><?php echo e($item->contact); ?></td>
                                        <td>
                                            <?php if(isset($item->roles[0]) && $item->roles[0]->name=='secretary'): ?>
                                            No Data
                                            <?php else: ?>
                                            <?php echo e($item->bar_number); ?>

                                            <?php endif; ?>
                                        </td>
                                        <td><?php echo substr($item->profile->bio,0,15).'...'; ?></td>
                                        <td><?php echo e($item->profile->dob); ?></td>
                                        <td>
                                            <?php if(isset($item->resume) && $item->resume==null): ?>
                                                No File
                                            <?php else: ?>
                                                <a class="btn doc_btn" type="button" href="<?php echo e(asset('website')); ?>/<?php echo e($item->resume); ?>" target="_blank">
                                                    <img class="img-fluid" src="<?php echo e(asset('website')); ?>/assets/images/doc-icon.png" alt="">
                                                </a>
                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            <?php if(isset($item->certificate) && $item->certificate==null): ?>
                                                No File
                                            <?php else: ?>
                                                <a class="btn doc_btn" type="button" href="<?php echo e(asset('website')); ?>/<?php echo e($item->certificate); ?>" target="_blank">
                                                    <img class="img-fluid" src="<?php echo e(asset('website')); ?>/assets/images/doc-icon.png" alt="">
                                                </a>
                                            <?php endif; ?>
                                        </td>
                                        <th><span><?php if($item->status==1): ?> Active <?php else: ?> Deactivate <?php endif; ?></span></th>
                                        <td>
                                            <div class="dropdown action_dropdown">
                                                <button class="btn dropdown-toggle action_btn assign_attorney" type="button"
                                                        id="dropdownMenuButton" value="<?php echo e($item->id); ?>" data-toggle="dropdown"
                                                        aria-haspopup="true"
                                                        aria-expanded="false">
                                                    <i class="fa-solid fa-eye"></i>
                                                </button>
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                    <?php if(isset($item->roles[0]) && $item->roles[0]->name=='attorney'): ?>
                                                       <a class="dropdown-item" href="#" alt="default" data-toggle="modal"data-target="#assign_attorney_modal">Assign To New Attorney</a>
                                                    <?php elseif(isset($item->roles[0]) && $item->roles[0]->name=='associate'): ?>
                                                        <a class="dropdown-item" href="#" alt="default" data-toggle="modal"data-target="#assign_attorney_modal">Assign To New Attorney</a>
                                                    <?php elseif(isset($item->roles[0]) && $item->roles[0]->name=='intern'): ?>
                                                        <a class="dropdown-item" href="#" alt="default" data-toggle="modal"data-target="#assign_attorney_modal">Assign To New Attorney</a>
                                                    <?php endif; ?>
                                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view-'.str_slug('AttorneyAssociate'))): ?>
                                                        <a class="dropdown-item" href="<?php echo e(url('/attorneyAssociate/attorney-associate/' . $item->id)); ?>" title="View <?php echo e(preg_replace('/(?<=[a-z])[A-Z]|[A-Z](?=[a-z])/', ' $0', 'AttorneyAssociate')); ?>">
                                                            View
                                                        </a>
                                                    <?php endif; ?>
                                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('edit-'.str_slug('AttorneyAssociate'))): ?>
                                                        <a class="dropdown-item" href="<?php echo e(url('/attorneyAssociate/attorney-associate/' . $item->id . '/edit')); ?>" title="Edit <?php echo e(preg_replace('/(?<=[a-z])[A-Z]|[A-Z](?=[a-z])/', ' $0', 'AttorneyAssociate')); ?>">
                                                            Edit
                                                        </a>
                                                    <?php endif; ?>
                                                    <!-- <a class="dropdown-item" href="#">Deactivate</a> -->
                                                    <?php if($item->status==1): ?>
                                                        <a class="dropdown-item" href="<?php echo e(route('attorneyAssociate_status',[$item->id, 0])); ?>">Deactivate</a>
                                                    <?php else: ?>
                                                        <a class="dropdown-item" href="<?php echo e(route('attorneyAssociate_status',[$item->id, 1])); ?>">Activate</a>
                                                    <?php endif; ?>
                                                    <?php if($item->delete_status==1): ?>
                                                        <a class="dropdown-item" href="<?php echo e(route('attorneyAssociate_delete',[$item->id, 0])); ?>">Delete</a>
                                                    <?php endif; ?>
                                                    <?php if(isset($item->roles[0]) && $item->roles[0]->name=='attorney'): ?>
                                                        <a class="dropdown-item clients" href="#" value="<?php echo e($item->id); ?>" alt="default" data-toggle="modal">Clients</a>
                                                    <?php elseif(isset($item->roles[0]) && $item->roles[0]->name=='associate'): ?>
                                                        <a class="dropdown-item clients" href="#" value="<?php echo e($item->id); ?>" alt="default" data-toggle="modal">Clients</a>
                                                    <?php elseif(isset($item->roles[0]) && $item->roles[0]->name=='intern'): ?>
                                                        <a class="dropdown-item clients" href="#" value="<?php echo e($item->id); ?>" alt="default" data-toggle="modal">Clients</a>
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
    </section>

    <div id="assign_attorney_modal"  class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog"
         aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×
                    </button>
                    <h1 class="modal-title">Assign Account To New Attorney </h1></div>
                <div class="modal-body">
                    <form method="POST" action="<?php echo e(url('/assignedAttorney/assigned-attorney')); ?>" accept-charset="UTF-8"
                          class="form-horizontal" enctype="multipart/form-data">
                        <?php echo e(csrf_field()); ?>

                        <input type="hidden" name="old_attorney_id" id="old_attorney_id">
                        <input type="hidden" name="status" value="1">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th scope="col">Attorney Name</th>
                                    <th>Email</th>
                                    <th scope="col">Expertise</th>
                                    <th scope="col">Select</th>
                                </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $attorney; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e($item->name??''); ?></td>
                                            <td><?php echo e($item->email??''); ?></td>
                                            <td>
                                                <select class="form-control" name="" id="">
                                                    <?php $__currentLoopData = $item->expertise; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option value=""><?php echo e($value->name??''); ?></option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>
                                            </td>
                                            <td>
                                                
                                                 <div class="custom_check">
                                                    <input type="radio" name="new_attorney_id" value="<?php echo e($item->id); ?>">
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn_black btn_block">Assign Attorney</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <div id="clients"  class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
        
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
            // $('#myTable').DataTable({
            //     'aoColumnDefs': [{
            //         'bSortable': false,
            //         'aTargets': [-1] /* 1st one, start by the right */
            //     }]
            // });
            $('#myTable').dataTable( {
            'columnDefs' : [
                    { 
                       'searchable'    : false, 
                       'targets'       : [8,9,10,11]
                    },
                ],
                "ordering": false, // disable sorting on all columns
                "paging": true, // enable pagination
                "searching": true // enable search
            } );
        });
        $(function () {
});
        // $(document).on('change', '.custom_filter', function() {
            
        // });
    </script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script>
        $(document).on('change', '.custom_filter', function() {
            var role_id = $(this).find(":selected").val();             
            window.location.href = "<?php echo e(route('filter')); ?>/"+role_id;
        });
        $(document).on('click','.assign_attorney',function(e){
            var old_attorney = $(this).attr('value');
            $('#old_attorney_id').val(old_attorney);
        });
        
        $(document).on('click','.clients',function(e){
        e.preventDefault();
        var client_id = $(this).attr('value');
        $.ajax({
            type: 'GET', //THIS NEEDS TO BE GET
            url: "<?php echo e(route('get_client')); ?>/"+client_id,
            success: function (data) {
                $('#clients').html(data);
                $('#clients').modal('show');
            },
            error: function() {
                $('#clients').html('');
                $('#clients').modal('show');

            }
        });
    });
    </script>

<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home1/backendpro/public_html/usman/lcm/resources/views/attorneyAssociate/attorney-associate/index.blade.php ENDPATH**/ ?>