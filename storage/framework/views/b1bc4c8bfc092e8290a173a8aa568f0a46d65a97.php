<?php $__env->startPush('css'); ?>
<link href="<?php echo e(asset('plugins/components/datatables/jquery.dataTables.min.css')); ?>" rel="stylesheet" type="text/css"/>
<link href="https://cdn.datatables.net/buttons/1.2.2/css/buttons.dataTables.min.css" rel="stylesheet"
      type="text/css"/>
<style>
    .active_status{
        background: #2ad536;
        /*border: 2px solid #262626;*/
        border: none;
        padding: 8px;
        font-size: 17px;
        color: #fff;
        border-radius: 18px;
    }
    .comp_status{
        background: #d5af2a;
        /*border: 2px solid #262626;*/
        padding: 8px;
        border: none;
        font-size: 17px;
        color: #fff;
        border-radius: 18px;
    }
</style>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <?php use Illuminate\Support\Str; ?>
    <div class="container-fluid">
        <!-- .row -->
        <div class="row">
            <div class="col-sm-12">
                <div class="white-box">
                    <h3 class="box-title pull-left"><?php echo e(preg_replace('/(?<=[a-z])[A-Z]|[A-Z](?=[a-z])/', ' $0', 'CaseManagement')); ?></h3>
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
                                    <?php if(!Auth::user()->hasRole('Senior Counsel') && !Auth::user()->hasRole('King Counsel') && !Auth::user()->hasRole('Paralegal') && !Auth::user()->hasRole('Junior Counsel')): ?>
                                        <th>Case ID</th>
                                        <th>Name Of Parties</th>
                                        <th>Senior Counsel</th>
                                        <th>Junior Counsel</th>
                                        <th>Type Of Matter</th>
                                        <th>Status</th>
                                        <th>Last Attended Court</th>
                                        <th>Next Court Date</th>
                                        <th>Actions</th>
                                    <?php elseif(Auth::user()->hasRole('Chambers Manager')): ?>
                                        <th>Case ID</th>
                                        <th>Client Name</th>
                                        <th>Name Of Parties</th>
                                        <th>Judge Name</th>
                                        <th>Type Of Matter</th>
                                        <th>Status</th>
                                        <th>Last Attended Court</th>
                                        <th>Next Court Date</th>
                                        <th>Action</th>
                                    <?php else: ?>
                                        <th>Case ID</th>
                                        <th>Client Name</th>
                                        <th>Name Of Parties</th>
                                        <th>Judge Name</th>
                                        <th>Type Of Matter</th>
                                        <th>Status</th>
                                        <th>Last Attended Court</th>
                                        <th>Next Court Date</th>
                                    <?php endif; ?>
                                </tr>
                                </thead>
                                <tbody>
                                <?php if(!Auth::user()->hasRole('Senior Counsel') && !Auth::user()->hasRole('King Counsel') && !Auth::user()->hasRole('Chambers Manager') && !Auth::user()->hasRole('Paralegal') && !Auth::user()->hasRole('Junior Counsel')): ?>
                                    <?php $__currentLoopData = $casefile; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if(Auth::user()->hasRole('attorney')): ?>

                                            <?php $__currentLoopData = $item->clientCase; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <tr>
                                                    <td><?php echo e($value->case_number??''); ?></td>
                                                    <td title="<?php echo e($value->name_of_parties??''); ?>"><?php echo e(Str::limit($value->name_of_parties, 30)); ?></td>
                                                    <td>
                                                        <?php $__currentLoopData = $value->seniorCounsels; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $senior): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <?php echo e($senior->caseSeniorCounsel->name??''); ?><br>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </td>
                                                    <td>
                                                        <?php $__currentLoopData = $value->JuniorCounsel; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $senior): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <?php echo e($senior->caseJuniorCounsel->name??''); ?><br>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </td>
                                                    <td>
                                                        <?php $__currentLoopData = $value->typeOfMatters; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $matter): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <?php echo e($matter->caseTypeOfMatters->name??''); ?><br>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </td>
                                                    <td>
                                                        <?php if($value->status == 0): ?>
                                                            <select class="case_status comp_status">
                                                                <option <?php if($value->status == 0): ?> selected <?php endif; ?> data-id="<?php echo e($value->id); ?>" value="0">Complete</option>
                                                                <option <?php if($value->status == 1): ?> selected <?php endif; ?> data-id="<?php echo e($value->id); ?>" value="1">Active</option>
                                                            </select>
                                                        <?php else: ?>
                                                            <select class="case_status active_status">
                                                                <option <?php if($value->status == 0): ?> selected <?php endif; ?> data-id="<?php echo e($value->id); ?>" value="0">Complete</option>
                                                                <option <?php if($value->status == 1): ?> selected <?php endif; ?> data-id="<?php echo e($value->id); ?>" value="1">Active</option>
                                                            </select>
                                                        <?php endif; ?>
                                                    </td>
                                                    
                                                    <td><?php echo e(isset($value->courtAttendantsNote) && $value->courtAttendantsNote->date ? date('d M Y', strtotime($value->courtAttendantsNote->date)) : 'No Data'); ?></td>
                                                    <td><?php echo e(isset($value->courtAttendantsNote) && $value->courtAttendantsNote->next_court_date ? date('d M Y', strtotime($value->courtAttendantsNote->next_court_date)) : 'No Data'); ?></td>
                                                    <td>
                                                    <!-- <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view-'.str_slug('CaseFile'))): ?>
                                                        <a href="<?php echo e(url('/caseFile/case-file/' . $value->id)); ?>"
                                                            title="View <?php echo e(preg_replace('/(?<=[a-z])[A-Z]|[A-Z](?=[a-z])/', ' $0', 'CaseFile')); ?>">
                                                                <button class="btn btn-info btn-sm">
                                                                    <i class="fa fa-eye" aria-hidden="true"></i> View
                                                                </button>
                                                            </a>
                                                        <?php endif; ?>

                                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('edit-'.str_slug('CaseFile'))): ?>
                                                        <a href="<?php echo e(url('/caseFile/case-file/' . $value->id . '/edit')); ?>"
                                                            title="Edit <?php echo e(preg_replace('/(?<=[a-z])[A-Z]|[A-Z](?=[a-z])/', ' $0', 'CaseFile')); ?>">
                                                                <button class="btn btn-primary btn-sm">
                                                                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit
                                                                </button>
                                                            </a>
                                                        <?php endif; ?>

                                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete-'.str_slug('CaseFile'))): ?>
                                                        <form method="POST"
                                                            action="<?php echo e(url('/caseFile/case-file' . '/' . $value->id)); ?>"
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
                                                                <a class="dropdown-item" href="<?php echo e(url('/client/client/' . $value->client_id)); ?>">View Case Detail</a>
                                                                <a class="dropdown-item" href="<?php echo e(route('court_attendants_notes', [$value->id])); ?>">Court Attendance Notes </a>
                                                                <?php $__currentLoopData = $value->originatingProcess; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $process): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                    <a class="dropdown-item" href="<?php echo e(url('originating_process', [$process->id])); ?>"><?php echo e($process->process->name); ?></a>
                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                <a class="dropdown-item generate_master_file" value="<?php echo e($value->id); ?>" >Generate Master File</a>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                        <?php elseif(Auth::user()->hasRole('intern')): ?>

                                            <?php $__currentLoopData = $item->clientCase; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <tr>
                                                    <td><?php echo e($value->case_number??''); ?></td>
                                                    <td title="<?php echo e($value->name_of_parties??''); ?>"><?php echo e(Str::limit($value->name_of_parties, 30)); ?></td>
                                                    <td>
                                                        <?php $__currentLoopData = $value->seniorCounsels; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $senior): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <?php echo e($senior->caseSeniorCounsel->name??''); ?><br>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </td>
                                                    <td>
                                                        <?php $__currentLoopData = $value->JuniorCounsel; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $senior): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <?php echo e($senior->caseJuniorCounsel->name??''); ?><br>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </td>
                                                    <td>
                                                        <?php $__currentLoopData = $value->typeOfMatters; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $matter): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <?php echo e($matter->caseTypeOfMatters->name??''); ?><br>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </td>
                                                    <td>
                                                        <?php if($value->status == 0): ?>
                                                            <select class="case_status comp_status">
                                                                <option <?php if($value->status == 0): ?> selected <?php endif; ?> data-id="<?php echo e($value->id); ?>" value="0">Complete</option>
                                                                <option <?php if($value->status == 1): ?> selected <?php endif; ?> data-id="<?php echo e($value->id); ?>" value="1">Active</option>
                                                            </select>
                                                        <?php else: ?>
                                                            <select class="case_status active_status">
                                                                <option <?php if($value->status == 0): ?> selected <?php endif; ?> data-id="<?php echo e($value->id); ?>" value="0">Complete</option>
                                                                <option <?php if($value->status == 1): ?> selected <?php endif; ?> data-id="<?php echo e($value->id); ?>" value="1">Active</option>
                                                            </select>
                                                        <?php endif; ?>
                                                    </td>
                                                    
                                                    <td><?php echo e(isset($value->courtAttendantsNote) && $value->courtAttendantsNote->date ? date('d M Y', strtotime($value->courtAttendantsNote->date)) : 'No Data'); ?></td>
                                                    <td><?php echo e(isset($value->courtAttendantsNote) && $value->courtAttendantsNote->next_court_date ? date('d M Y', strtotime($value->courtAttendantsNote->next_court_date)) : 'No Data'); ?></td>
                                                    <td>
                                                    <!-- <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view-'.str_slug('CaseFile'))): ?>
                                                        <a href="<?php echo e(url('/caseFile/case-file/' . $value->id)); ?>"
                                                            title="View <?php echo e(preg_replace('/(?<=[a-z])[A-Z]|[A-Z](?=[a-z])/', ' $0', 'CaseFile')); ?>">
                                                                <button class="btn btn-info btn-sm">
                                                                    <i class="fa fa-eye" aria-hidden="true"></i> View
                                                                </button>
                                                            </a>
                                                        <?php endif; ?>

                                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('edit-'.str_slug('CaseFile'))): ?>
                                                        <a href="<?php echo e(url('/caseFile/case-file/' . $value->id . '/edit')); ?>"
                                                            title="Edit <?php echo e(preg_replace('/(?<=[a-z])[A-Z]|[A-Z](?=[a-z])/', ' $0', 'CaseFile')); ?>">
                                                                <button class="btn btn-primary btn-sm">
                                                                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit
                                                                </button>
                                                            </a>
                                                        <?php endif; ?>

                                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete-'.str_slug('CaseFile'))): ?>
                                                        <form method="POST"
                                                            action="<?php echo e(url('/caseFile/case-file' . '/' . $value->id)); ?>"
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
                                                                <a class="dropdown-item" href="<?php echo e(url('/client/client/' . $value->client_id)); ?>">View Case Detail</a>
                                                                <a class="dropdown-item" href="<?php echo e(route('court_attendants_notes', [$value->id])); ?>">Court Attendance Notes </a>
                                                                <?php $__currentLoopData = $value->originatingProcess; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $process): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                    <a class="dropdown-item" href="<?php echo e(url('originating_process', [$process->id])); ?>"><?php echo e($process->process->name); ?></a>
                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                        <?php else: ?>
                                            <tr>
                                                <td><?php echo e($item->case_number??''); ?></td>
                                                <td title="<?php echo e($item->name_of_parties??''); ?>"><?php echo e(Str::limit($item->name_of_parties, 30)); ?></td>
                                                <td>
                                                    <?php $__currentLoopData = $item->seniorCounsels; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $senior): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <?php echo e($senior->caseSeniorCounsel->name??''); ?><br>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </td>
                                                <td>
                                                    <?php $__currentLoopData = $item->JuniorCounsel; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $senior): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <?php echo e($senior->caseJuniorCounsel->name??''); ?><br>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </td>
                                                <td>
                                                    <?php $__currentLoopData = $item->typeOfMatters; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $matter): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <?php echo e($matter->caseTypeOfMatters->name??''); ?><br>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </td>
                                                
                                                <td>
                                                    <?php if($item->status == 0): ?>
                                                        <select class="case_status comp_status">
                                                            <option <?php if($item->status == 0): ?> selected <?php endif; ?> data-id="<?php echo e($item->id); ?>" value="0">Complete</option>
                                                            <option <?php if($item->status == 1): ?> selected <?php endif; ?> data-id="<?php echo e($item->id); ?>" value="1">Active</option>
                                                        </select>
                                                    <?php else: ?>
                                                        <select class="case_status active_status">
                                                            <option <?php if($item->status == 0): ?> selected <?php endif; ?> data-id="<?php echo e($item->id); ?>" value="0">Complete</option>
                                                            <option <?php if($item->status == 1): ?> selected <?php endif; ?> data-id="<?php echo e($item->id); ?>" value="1">Active</option>
                                                        </select>
                                                    <?php endif; ?>
                                                </td>
                                                <td><?php echo e(isset($item->courtAttendantsNote) && $item->courtAttendantsNote->date ? date('d M Y', strtotime($item->courtAttendantsNote->date)) : 'No Data'); ?></td>
                                                
                                                <td><?php echo e(isset($item->courtAttendantsNote) && $item->courtAttendantsNote->next_court_date ? date('d M Y', strtotime($item->courtAttendantsNote->next_court_date)) : 'No Data'); ?></td>
                                                <td>
                                                <!-- <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view-'.str_slug('CaseFile'))): ?>
                                                    <a href="<?php echo e(url('/client/client/' . $item->client_id)); ?>"
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
                                                        <button class="btn dropdown-toggle action_btn assign_attorney" value="<?php echo e($item->attorney_associate_id->attorneyOrAssociate->id??''); ?>" data-id="<?php echo e($item->client->id); ?>" type="button"
                                                                id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                                                aria-expanded="false">
                                                            <i class="fa-solid fa-eye"></i>
                                                        </button>
                                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                            <a class="dropdown-item" href="<?php echo e(url('/client/client/' . $item->client_id)); ?>">View Case Detail</a>
                                                            <a class="dropdown-item" href="<?php echo e(route('edit_case_file', [$item->id])); ?>">Edit Case Detail</a>
                                                            
                                                            <a class="dropdown-item" href="<?php echo e(route('court_attendants_notes', [$item->id])); ?>">Court Attendance Notes </a>
                                                            <?php if(isset($item->billOfCost)  && $item->billOfCost !=null): ?>
                                                                <a class="dropdown-item" href="<?php echo e(url('have_billofcost', [$item->id])); ?>">Have Bill Of Cost</a>
                                                            <?php else: ?>
                                                                <a class="dropdown-item" href="<?php echo e(route('bill_of_cost', [$item->id ,'case'])); ?>">Generate Bill Of Cost</a>
                                                            <?php endif; ?>
                                                            <a class="dropdown-item generate_master_file" value="<?php echo e($item->id); ?>" >Generate Master File</a>
                                                            <a class="dropdown-item" href="<?php echo e(route('case_accounting', [$item->id])); ?>">Accounts</a>
                                                            <?php $__currentLoopData = $item->originatingProcess; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $process): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <a class="dropdown-item" href="<?php echo e(url('originating_process', [$process->id])); ?>"><?php echo e($process->process->name); ?></a>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                            <a class="dropdown-item cases" href="#" value="<?php echo e($item->id); ?>" alt="default" data-toggle="modal">Cases</a>
                                                            <a class="dropdown-item assign_case" data-case-id="<?php echo e($item->id??''); ?>" value="<?php echo e($item->client_id); ?>" alt="default" data-toggle="modal">Assigned Case</a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
                                <?php if(Auth::user()->hasRole('Senior Counsel') || Auth::user()->hasRole('Junior Counsel') || Auth::user()->hasRole('Paralegal') || Auth::user()->hasRole('King Counsel')): ?>
                                    <?php $__currentLoopData = $casefile; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e(@$item->case_number??''); ?></td>
                                            <td><?php echo e(@$item->client->name); ?></td>
                                            <td><?php echo e(@$item->name_of_parties??''); ?></td>
                                            <td><?php echo e(@$item->judge_name??''); ?></td>
                                            <td>
                                                <?php $__currentLoopData = $item->typeOfMatters; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $matter): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <?php echo e(@$matter->caseTypeOfMatters->name??''); ?><br>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </td>
                                            <td>
                                                <?php if($item->status == 0): ?>
                                                    <a class="comp_status">
                                                        Complete
                                                    </a>
                                                <?php else: ?>
                                                    <a class="active_status">
                                                        Active
                                                    </a>
                                                <?php endif; ?>
                                            </td>
                                            <td><?php echo e(isset($item->courtAttendantsNote) && $item->courtAttendantsNote->date ? date('d M Y', strtotime($item->courtAttendantsNote->date)) : 'No Data'); ?></td>
                                            <td><?php echo e(isset($item->courtAttendantsNote) && $item->courtAttendantsNote->next_court_date ? date('d M Y', strtotime($item->courtAttendantsNote->next_court_date)) : 'No Data'); ?></td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php elseif(Auth::user()->hasRole('Chambers Manager')): ?>
                                    <?php $__currentLoopData = $casefile; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e(@$item->case_number??''); ?></td>
                                            <td><?php echo e(@$item->client->name); ?></td>
                                            <td><?php echo e(@$item->name_of_parties??''); ?></td>
                                            <td><?php echo e(@$item->judge_name??''); ?></td>
                                            <td>
                                                <?php $__currentLoopData = $item->typeOfMatters; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $matter): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <?php echo e(@$matter->caseTypeOfMatters->name??''); ?><br>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </td>
                                            <td>
                                                <?php if($item->status == 0): ?>
                                                    <a class="comp_status">
                                                        Complete
                                                    </a>
                                                <?php else: ?>
                                                    <a class="active_status">
                                                        Active
                                                    </a>
                                                <?php endif; ?>
                                            </td>
                                            <td><?php echo e(isset($item->courtAttendantsNote) && $item->courtAttendantsNote->date ? date('d M Y', strtotime($item->courtAttendantsNote->date)) : 'No Data'); ?></td>
                                            <td><?php echo e(isset($item->courtAttendantsNote) && $item->courtAttendantsNote->next_court_date ? date('d M Y', strtotime($item->courtAttendantsNote->next_court_date)) : 'No Data'); ?></td>
                                            <td>
                                                <div class="dropdown action_dropdown">
                                                    <button class="btn dropdown-toggle action_btn" type="button"
                                                            id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                                            aria-expanded="false">
                                                        <i class="fa-solid fa-eye"></i>
                                                    </button>
                                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                        <a class="dropdown-item" href="<?php echo e(url('/client/client/' . $item->client_id)); ?>">View Case Detail</a>
                                                    <!-- <a class="dropdown-item" href="<?php echo e(route('court_attendants_notes', [$item->id])); ?>">Court Attendents Notes </a>
                                                        <?php $__currentLoopData = $item->originatingProcess; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $process): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <a class="dropdown-item" href="<?php echo e(url('originating_process', [$process->id])); ?>"><?php echo e($process->process->name); ?></a>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                            <a class="dropdown-item generate_master_file" value="<?php echo e($item->id); ?>" >Generate Master File</a> -->
                                                        <?php if(isset($item->billOfCost)  && $item->billOfCost !=null): ?>
                                                            <a class="dropdown-item" href="<?php echo e(url('have_billofcost', [$item->id])); ?>">Have Bill Of Cost</a>
                                                        <?php else: ?>
                                                            <a class="dropdown-item" href="<?php echo e(route('bill_of_cost', [$item->id ,'case'])); ?>">Generate Bill Of Cost</a>
                                                        <?php endif; ?>
                                                        <?php if(isset($item->caseInvoice)  && $item->caseInvoice !=null): ?>
                                                            <a class="dropdown-item" href="<?php echo e(url('have_invoice', [$item->id])); ?>">Have Invoice</a>
                                                        <?php else: ?>
                                                            <a class="dropdown-item" href="<?php echo e(url('create_invoice', [$item->id])); ?>">Create Invoice</a>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
                                </tbody>
                            </table>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php if(!Auth::user()->hasRole('Senior Counsel') && !Auth::user()->hasRole('Junior Counsel') && !Auth::user()->hasRole('King Counsel') && !Auth::user()->hasRole('Chambers Manager') && !Auth::user()->hasRole('Paralegal')): ?>
        <div id="assign_attorney_modal"  class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">

        </div>


        <div id="master_file_modal"  class="modal fade bs-example-modal-lg" tabindex="-1"  aria-labelledby="myLargeModalLabel" aria-hidden="true" >

        </div>

        <div id="cases"  class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">

        </div>

    <?php endif; ?>

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

    // $(function () {
    //         $('#myTable').DataTable({
    //             'aoColumnDefs': [{
    //                 'bSortable': false,
    //                 'aTargets': [-1] /* 1st one, start by the right */
    //             }]
    //         });
    //             "ordering": false,
    //     });
    $(function () {
    $('#myTable').DataTable({
        "ordering": false, // disable sorting on all columns
        "paging": true, // enable pagination
        "searching": true // enable search
    });
});
    $(document).on('click','.generate_master_file',function(e){
        e.preventDefault();
        var case_file_id = $(this).attr('value');
        $.ajax({
            type: 'GET', //THIS NEEDS TO BE GET
            url: "<?php echo e(route('generate_master_file')); ?>/"+case_file_id,
            success: function (data) {
                $('#master_file_modal').html(data);
                $('#master_file_modal').modal('show');
            },
            error: function() {
                $('#master_file_modal').html('');
                $('#master_file_modal').modal('show');

            }
        });
    });
    $(document).on('click','.assign_case',function(e){
        e.preventDefault();
        var client_id = $(this).attr('value');
        var case_id = $(this).data('case-id');
        $.ajax({
            type: 'GET',
            url: "<?php echo e(route('assigned_case_attorney')); ?>/" + client_id + "/" + case_id,
            success: function (data) {
                $('#assign_attorney_modal').html(data);
                $('#assign_attorney_modal').modal('show');
            },
            error: function() {
                $('#assign_attorney_modal').html('');
                $('#assign_attorney_modal').modal('show');

            }
        });
    });
</script>
<script>
    $(document).on('change','.case_status',function(e){
        val = $(this).val();
        id = $('option:selected', this).attr('data-id');
        $.ajax({
            type: 'get',
            url: "<?php echo e(route('case_status')); ?>",
            data:{val:val,id:id},
            success: function(result) {
                Swal.fire({
                    title: result.result,
                    html: result.msg,
                    icon:result.result,
                    timer: 5000,
                    buttons: false,
                }).then((value) => {
                    location.reload();
            });
            },
            error : function(error) {
                showSwal('OOPS','Network Problem.','error');
            }
        });
    });

     $(document).on('click','.assign_attorney',function(e){
        var old_attorney = $(this).attr('value');
        var client_id = $(this).attr('data-id');
        $('#old_attorney_id').val(old_attorney);
        $('#client_id').val(client_id);
     });
    $(document).on('click','.cases',function(e){
        e.preventDefault();
        var case_id = $(this).attr('value');
        $.ajax({
            type: 'GET', //THIS NEEDS TO BE GET
            url: "<?php echo e(route('get_case')); ?>/"+case_id,
            success: function (data) {
                $('#cases').html(data);
                $('#cases').modal('show');
            },
            error: function() {
                $('#cases').html('');
                $('#cases').modal('show');

            }
        });
    });
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home1/backendpro/public_html/usman/lcm/resources/views/dashboard/case_management.blade.php ENDPATH**/ ?>