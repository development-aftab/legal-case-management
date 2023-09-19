<aside class="sidebar">
    <div class="scroll-sidebar">

    <?php if(session()->get('theme-layout') != 'fix-header'): ?>
        <!-- <div class="user-profile">
                <div class="dropdown user-pro-body ">
                    <div class="profile-image">
                        <?php if(auth()->user()->profile->pic == null): ?>
            <img src="<?php echo e(asset('storage/uploads/users/no_avatar.jpg')); ?>" alt="user-img" class="img-circle">
                        <?php else: ?>
            <img src="<?php echo e(asset('storage/uploads/users/'.auth()->user()->profile->pic)); ?>" alt="user-img" class="img-circle">
                        <?php endif; ?>


                <a href="javascript:void(0);" class="dropdown-toggle u-dropdown text-blue"
                   data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                <span class="badge badge-danger">
                    <i class="fa fa-angle-down"></i>
                </span>
                </a>
                <ul class="dropdown-menu animated flipInY">
<li><a href="<?php echo e(url('profile')); ?>"><i class="fa fa-user"></i> Profile</a></li>
        <li><a href="javascript:void(0);"><i class="fa fa-inbox"></i> Inbox</a></li>
                <li role="separator" class="divider"></li>
                <li><a href="<?php echo e(url('account-settings')); ?>"><i class="fa fa-cog"></i> Account Settings</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="<?php echo e(url('logout')); ?>"><i class="fa fa-power-off"></i> Logout</a></li>
                        </ul>
                    </div>
                    <p class="profile-text m-t-15 font-16">
                        <a href="javascript:void(0);">
                            <?php if(auth()->user()->name=='Admin'): ?>
            Developer
<?php elseif(auth()->user()->name=='User'): ?>
            Admint
<?php else: ?>
            <?php echo e(auth()->user() ->name); ?>

        <?php endif; ?>
                </a>
            </p>
        </div>
    </div> -->
        <?php endif; ?>
        
        <nav class="sidebar-nav">

            <ul id="side-menu">
                <!-- <?php if(auth()->user()->hasRole('attorney')): ?>
                    <li>
                        <h6>Attorney Dashboard</h6>
                    </li>
                <?php elseif(auth()->user()->hasRole('secretary')): ?>
                    <li>
                        <h6>Secretary Dashboard</h6>
                    </li>
                <?php elseif(auth()->user()->hasRole('associate')): ?>
                    <li>
                        <h6>Associate Dashboard</h6>
                    </li>
                <?php else: ?>
                    <li>
                        <h6>Admin Dashboard</h6>
                    </li>
                <?php endif; ?> -->
                <li>
                    <?php if(!Auth::user()->hasRole('Senior Counsel') && !Auth::user()->hasRole('Junior Counsel') && !Auth::user()->hasRole('King Counsel') && !Auth::user()->hasRole('Paralegal')): ?>
                        <a class=" waves-effect" href="<?php echo e(url('dashboard')); ?>" aria-expanded="false">
                            <!-- <i class="icon-screen-desktop fa-fw"></i>  -->
                            <span class="hide-menu"> Dashboard </span></a>
                    <?php endif; ?>
                    <?php if(auth()->user()->isAdmin() == true): ?>
                        <ul aria-expanded="false" class="collapse">
                            <li><a href="<?php echo e(asset('dashboard')); ?>">Modern Version</a></li>
                            <li><a href="<?php echo e(asset('index2')); ?>">Clean Version</a></li>
                            <li><a href="<?php echo e(asset('index3')); ?>">Analytical Version</a></li>
                            <li>
                                <a class="waves-effect" href="javascript:void(0);" aria-expanded="false"><span
                                            class="hide-menu"> eCommerce </span></a>
                                <ul aria-expanded="false" class="collapse">
                                    <li><a href="<?php echo e(asset('index4')); ?>">Dashboard</a></li>
                                    <li><a href="<?php echo e(asset('products')); ?>">Products</a></li>
                                    <li><a href="<?php echo e(asset('product-detail')); ?>">Product Detail</a></li>
                                    <li><a href="<?php echo e(asset('product-edit')); ?>">Product Edit</a></li>
                                    <li><a href="<?php echo e(asset('product-orders')); ?>">Product Orders</a></li>
                                    <li><a href="<?php echo e(asset('product-cart')); ?>">Product Cart</a></li>
                                    <li><a href="<?php echo e(asset('product-checkout')); ?>">Product Checkout</a></li>
                                </ul>
                            </li>
                        </ul>
                    <?php endif; ?>
                </li>
                <?php if(auth()->user()->isAdmin() == true): ?>

                    <li><a class="waves-effect" href="<?php echo e(asset('role-management')); ?>">
                            <i class=" icon-layers fa-fw"></i><span class="hide-menu"> Roles </span></a>
                    </li>
                    <li class="two-column">
                        <a class="waves-effect" href="javascript:void(0);" aria-expanded="false"><i
                                    class="icon-user fa-fw"></i> <span class="hide-menu"> Users</span></a>
                        <ul aria-expanded="false" class="collapse">
                            <li><a href="<?php echo e(asset('users')); ?>">Manage Users</a></li>
                            <li><a href="<?php echo e(asset('user/create')); ?>">Add New User</a></li>
                            <li><a href="<?php echo e(asset('user/deleted')); ?>">Deleted Users</a></li>

                        </ul>
                    </li>
                    <li>
                        <hr/>
                    </li>
                    
                    
                    <li><a class="waves-effect" href="<?php echo e(asset('crud-generator')); ?>">
                            <i class="icon-drawar fa-fw"></i><span class="hide-menu"> CRUD Generator</span></a>
                    </li>
                    <li class="two-column">
                        <a class="waves-effect" href="javascript:void(0);" aria-expanded="false"><i
                                    class="icon-eye fa-fw"></i> <span class="hide-menu"> Logs</span></a>
                        <ul aria-exzpanded="false" class="collapse">
                            <li><a href="<?php echo e(asset('log-viewer')); ?>">Laravel Log</a></li>
                            <li><a href="<?php echo e(asset('activity-log')); ?>">Activity Log</a></li>

                        </ul>
                    </li>

                <?php endif; ?>
                <?php $__currentLoopData = $laravelAdminMenus->menus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $section): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if(count(collect($section->items)) > 0): ?>
                        <?php $__currentLoopData = $section->items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view-'.str_slug($menu->title))): ?>
                                <?php if($menu->title == 'AttorneyAssociate'): ?>
                                    <li>
                                        <a class="waves-effect" href="<?php echo e(url($menu->url)); ?>">
                                            <span class="hide-menu">Members</span>
                                        </a>
                                    </li>
                                <?php elseif($menu->title == 'PaymentMethod'): ?>
                                <?php elseif($menu->title == 'SeniorCounsel'): ?>
                                <?php elseif($menu->title == 'KingCounsel'): ?>
                                <?php elseif($menu->title == 'TypeOfMatter'): ?>
                                <?php elseif($menu->title == 'Client'): ?>
                                <?php elseif($menu->title == 'CaseInvoice'): ?>
                                <?php elseif($menu->title == 'BillOfCost'): ?>
                                <?php elseif($menu->title == 'Shortcut'): ?>
                                <?php else: ?>
                                    <li>
                                        <a class="waves-effect" href="<?php echo e(url($menu->url)); ?>">
                                            <span class="hide-menu"><?php echo e(preg_replace('/(?<=[a-z])[A-Z]|[A-Z](?=[a-z])/', ' $0', $menu->title)); ?></span>
                                        </a>
                                    </li>
                                <?php endif; ?>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php if(auth()->user()->hasRole('secretary')): ?>
                                <li>
                                    <a class="waves-effect" href="<?php echo e(url('client/client')); ?>">
                                        <span class="hide-menu"> Clients</span>
                                    </a>
                                </li>
                                <li>
                                    <a class="waves-effect" href="<?php echo e(url('account')); ?>">
                                        <span class="hide-menu">Accounts</span>
                                    </a>
                                </li>
                                <li>
                                    <a class="waves-effect" href="<?php echo e(url('account-settings')); ?>">
                                        <span class="hide-menu"> Account Setting</span>
                                    </a>
                                </li>
                                <li>
                                    <a class="waves-effect" href="<?php echo e(url('logout')); ?>">
                                        <span class="hide-menu">Logout</span>
                                    </a>
                                </li>
                            <?php endif; ?>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php if(auth()->user()->hasRole('attorney')): ?>
                    <li>
                        <a class="waves-effect" href="<?php echo e(url('client/client')); ?>">
                            <span class="hide-menu"> Clients</span>
                        </a>
                    </li>
                    <li>
                        <a class="waves-effect" href="<?php echo e(url('case_management')); ?>">
                            <span class="hide-menu">Case Management</span>
                        </a>
                    </li>
                    <li>
                        <a class="waves-effect" href="javascript:void(0);" aria-expanded="false"><i
                                    class="icon-notebook fa-fw"></i> <span class="hide-menu"> Joint Cases </span></a>
                        <ul aria-expanded="false" class="collapse">
                            <li><a href="<?php echo e(url('case_senior_counsel')); ?>">Senior Counsel</a></li>
                            <li><a href="<?php echo e(url('case_junior_counsel')); ?>">Junior Counsel</a></li>
                            <li><a href="<?php echo e(url('case_king_counsel')); ?>">King Counsel</a></li>
                            <li><a href="<?php echo e(url('case_paralegal')); ?>">Paralegal</a></li>
                        </ul>
                    </li>
                    <li>
                        <a class="waves-effect" href="<?php echo e(url('account-settings')); ?>">
                            <span class="hide-menu"> Account Setting</span>
                        </a>
                    </li>
                    <li>
                        <a class="waves-effect" href="<?php echo e(url('logout')); ?>">
                            <span class="hide-menu">Logout</span>
                        </a>
                    </li>
                <?php endif; ?>

                <?php if(auth()->user()->hasRole('intern')): ?>
                    <li>
                        <a class="waves-effect" href="<?php echo e(url('client/client')); ?>">
                            <span class="hide-menu"> Clients</span>
                        </a>
                    </li>
                    <li>
                        <a class="waves-effect" href="<?php echo e(url('case_management')); ?>">
                            <span class="hide-menu">Case Management</span>
                        </a>
                    </li>
                    <li>
                        <a class="waves-effect" href="<?php echo e(url('case_senior_counsel')); ?>">
                            <span class="hide-menu">Case Senior Counsel</span>
                        </a>
                    </li>
                    <li>
                        <a class="waves-effect" href="<?php echo e(url('case_junior_counsel')); ?>">
                            <span class="hide-menu">Case Junior Counsel</span>
                        </a>
                    </li>
                    <li>
                        <a class="waves-effect" href="<?php echo e(url('case_king_counsel')); ?>">
                            <span class="hide-menu">Case King Counsel</span>
                        </a>
                    </li>
                    <li>
                        <a class="waves-effect" href="<?php echo e(url('case_paralegal')); ?>">
                            <span class="hide-menu">Case Paralegal</span>
                        </a>
                    </li>
                    <li>
                        <a class="waves-effect" href="<?php echo e(url('account-settings')); ?>">
                            <span class="hide-menu"> Account Setting</span>
                        </a>
                    </li>
                    <li>
                        <a class="waves-effect" href="<?php echo e(url('logout')); ?>">
                            <span class="hide-menu">Logout</span>
                        </a>
                    </li>
                <?php endif; ?>

                <?php if(auth()->user()->hasRole('Senior Counsel')): ?>
                    <li>
                        <a class="waves-effect" href="<?php echo e(url('case_management')); ?>">
                            <span class="hide-menu">Case Management</span>
                        </a>
                    </li>
                <?php endif; ?>

                <?php if(auth()->user()->hasRole('King Counsel')): ?>
                    <li>
                        <a class="waves-effect" href="<?php echo e(url('case_management')); ?>">
                            <span class="hide-menu">Case Management</span>
                        </a>
                    </li>
                <?php endif; ?>

                <?php if(auth()->user()->hasRole('Junior Counsel')): ?>
                    <li>
                        <a class="waves-effect" href="<?php echo e(url('case_management')); ?>">
                            <span class="hide-menu">Case Management</span>
                        </a>
                    </li>
                <?php endif; ?>

                <?php if(auth()->user()->hasRole('Chambers Manager')): ?>
                    <li>
                        <a class="waves-effect" href="<?php echo e(url('client/client')); ?>">
                            <span class="hide-menu"> Clients</span>
                        </a>
                    </li>
                    <li>
                    <li>
                        <a class="waves-effect" href="<?php echo e(url('case_management')); ?>">
                            <span class="hide-menu">Case Management</span>
                        </a>
                    </li>
                <?php endif; ?>
                
                <?php if(auth()->user()->hasRole('Paralegal')): ?>
                    <li>
                        <a class="waves-effect" href="<?php echo e(url('case_management')); ?>">
                            <span class="hide-menu">Case Management</span>
                        </a>
                    </li>
                <?php endif; ?>

                <?php if(auth()->user()->hasRole('user')): ?>
                    
                        
                            
                        
                    
                    
                        
                            
                        
                    
                    
                        
                            
                        
                    
                    
                        
                            
                        
                    
                    <li>
                        <a class="waves-effect" href="<?php echo e(url('client/client')); ?>">
                            <span class="hide-menu"> Clients</span>
                        </a>
                    </li>
                    <li>
                        <a class="waves-effect" href="<?php echo e(url('case_management')); ?>">
                            <span class="hide-menu">Case Management</span>
                        </a>
                    </li>
                    <li>
                        <a class="waves-effect" href="<?php echo e(url('users')); ?>">
                            <span class="hide-menu">Manage Users</span>
                        </a>
                    </li>
                    
                        
                            
                        
                    
                    
                    <li>
                        <a class="waves-effect" href="<?php echo e(url('account')); ?>">
                            <span class="hide-menu"> Accounts</span>
                        </a>
                    </li>
                        
                            
                                
                            
                        
                    
                    <li>
                        <a class="waves-effect" href="javascript:void(0);" aria-expanded="false"><i
                                        class="icon-notebook fa-fw"></i> <span class="hide-menu"> Others </span></a>
                        <ul aria-expanded="false" class="collapse">
                            <li><a href="<?php echo e(url('paymentMethod/payment-method')); ?>">Payment Method</a></li>
                            
                            
                            <li><a href="<?php echo e(url('typeOfMatter/type-of-matter')); ?>">Type Of Matter</a></li>
                            <li><a href="<?php echo e(url('shortcut/shortcut')); ?>">Shortcut</a></li>
                        </ul>
                    </li>
                    <li>
                        <a class="waves-effect" href="javascript:void(0);" aria-expanded="false"><i
                                    class="icon-notebook fa-fw"></i> <span class="hide-menu"> Reports </span></a>
                        <ul aria-expanded="false" class="collapse">
                            <li><a href="<?php echo e(url('financial_report')); ?>">Financial Report</a></li>
                            
                            
                            <li><a href="<?php echo e(url('typeOfMatter/type-of-matter')); ?>">Operational Report</a></li>
                        </ul>
                    </li>
                    <li>
                        <a class="waves-effect" href="<?php echo e(url('account-settings')); ?>">
                            <span class="hide-menu"> Account Setting</span>
                        </a>
                    </li>
                    
                    <li><a href="<?php echo e(url('logout')); ?>">  <span class="hide-menu"> Logout</span> </a></li>

                <?php endif; ?>
                <?php if(auth()->user()->isAdmin() == true): ?>
                    <li>
                        <hr/>
                    </li>

                    <li class="two-column">
                        <a class="waves-effect" href="javascript:void(0);" aria-expanded="false"><i
                                    class="icon-equalizer fa-fw"></i> <span class="hide-menu"> UI Elements</span></a>
                        <ul aria-expanded="false" class="collapse">
                            <li><a href="<?php echo e(asset('panels-wells')); ?>">Panels and Wells</a></li>
                            <li><a href="<?php echo e(asset('panel-ui-block')); ?>">Panels With BlockUI</a></li>
                            <li><a href="<?php echo e(asset('portlet-draggable')); ?>">Draggable Portlet</a></li>
                            <li><a href="<?php echo e(asset('buttons')); ?>">Buttons</a></li>
                            <li><a href="<?php echo e(asset('tabs')); ?>">Tabs</a></li>
                            <li><a href="<?php echo e(asset('modals')); ?>">Modals</a></li>
                            <li><a href="<?php echo e(asset('progressbars')); ?>">Progress Bars</a></li>
                            <li><a href="<?php echo e(asset('notification')); ?>">Notifications</a></li>
                            <li><a href="<?php echo e(asset('carousel')); ?>">Carousel</a></li>
                            <li><a href="<?php echo e(asset('user-cards')); ?>">User Cards</a></li>
                            <li><a href="<?php echo e(asset('timeline')); ?>">Timeline</a></li>
                            <li><a href="<?php echo e(asset('timeline-horizontal')); ?>">Horizontal Timeline</a></li>
                            <li><a href="<?php echo e(asset('range-slider')); ?>">Range Slider</a></li>
                            <li><a href="<?php echo e(asset('ribbons')); ?>">Ribbons</a></li>
                            <li><a href="<?php echo e(asset('steps')); ?>">Steps</a></li>
                            <li><a href="<?php echo e(asset('session-idle-timeout')); ?>">Session Idle Timeout</a></li>
                            <li><a href="<?php echo e(asset('session-timeout')); ?>">Session Timeout</a></li>
                            <li><a href="<?php echo e(asset('bootstrap-ui')); ?>">Bootstrap UI</a></li>
                        </ul>
                    </li>
                    <li class="two-column">
                        <a class="waves-effect" href="javascript:void(0);" aria-expanded="false"><i
                                    class="icon-docs fa-fw"></i> <span class="hide-menu"> Pages</span></a>
                        <ul aria-expanded="false" class="collapse">
                            <li><a href="<?php echo e(asset('starter-page')); ?>">Starter Page</a></li>
                            <li><a href="<?php echo e(asset('blank')); ?>">Blank Page</a></li>
                            <li><a href="<?php echo e(asset('search-result')); ?>">Search Result</a></li>
                            <li><a href="<?php echo e(asset('custom-scroll')); ?>">Custom Scrolls</a></li>
                            <li><a href="<?php echo e(asset('login')); ?>">Login Page</a></li>
                            <li><a href="<?php echo e(asset('lock-screen')); ?>">Lock Screen</a></li>
                            <li><a href="<?php echo e(asset('recoverpw')); ?>">Recover Password</a></li>
                            <li><a href="<?php echo e(asset('animation')); ?>">Animations</a></li>
                            <li><a href="<?php echo e(asset('profile')); ?>">Profile</a></li>
                            <li><a href="<?php echo e(asset('invoice')); ?>">Invoice</a></li>
                            <li><a href="<?php echo e(asset('gallery')); ?>">Gallery</a></li>
                            <li><a href="<?php echo e(asset('pricing')); ?>">Pricing</a></li>
                            <li><a href="<?php echo e(asset('register')); ?>">Register</a></li>
                            <li><a href="<?php echo e(asset('400')); ?>">Error-400</a></li>
                            <li><a href="<?php echo e(asset('403')); ?>">Error-403</a></li>
                            <li><a href="<?php echo e(asset('404')); ?>">Error-404</a></li>
                            <li><a href="<?php echo e(asset('500')); ?>">Error-500</a></li>
                            <li><a href="<?php echo e(asset('503')); ?>">Error-503</a></li>
                        </ul>
                    </li>
                    <li>
                        <a class="waves-effect" href="javascript:void(0);" aria-expanded="false"><i
                                    class="icon-notebook fa-fw"></i> <span class="hide-menu"> Forms </span></a>
                        <ul aria-expanded="false" class="collapse">
                            <li><a href="<?php echo e(asset('form-basic')); ?>">Basic Forms</a></li>
                            <li><a href="<?php echo e(asset('form-layout')); ?>">Form Layout</a></li>
                            <li><a href="<?php echo e(asset('icheck-control')); ?>">Icheck Control</a></li>
                            <li><a href="<?php echo e(asset('form-advanced')); ?>">Form Addons</a></li>
                            <li><a href="<?php echo e(asset('form-upload')); ?>">File Upload</a></li>
                            <li><a href="<?php echo e(asset('form-dropzone')); ?>">File Dropzone</a></li>
                            <li><a href="<?php echo e(asset('form-pickers')); ?>">Form-pickers</a></li>
                        </ul>
                    </li>
                    <li>
                        <a class="waves-effect" href="javascript:void(0);" aria-expanded="false"><i
                                    class="icon-grid fa-fw"></i> <span class="hide-menu"> Tables</span></a>
                        <ul aria-expanded="false" class="collapse">
                            <li><a href="<?php echo e(asset('basic-table')); ?>">Basic Tables</a></li>
                            <li><a href="<?php echo e(asset('table-layouts')); ?>">Table Layouts</a></li>
                            <li><a href="<?php echo e(asset('data-table')); ?>">Data Table</a></li>
                            <li><a href="<?php echo e(asset('bootstrap-tables')); ?>">Bootstrap Tables</a></li>
                            <li><a href="<?php echo e(asset('responsive-tables')); ?>">Responsive Tables</a></li>
                            <li><a href="<?php echo e(asset('editable-tables')); ?>">Editable Tables</a></li>
                        </ul>
                    </li>
                    <li>
                        <a class="waves-effect" href="javascript:void(0);" aria-expanded="false"><i
                                    class="icon-layers fa-fw"></i> <span class="hide-menu"> Extra</span></a>
                        <ul aria-expanded="false" class="collapse extra">
                            <li>
                                <a class="waves-effect" href="javascript:void(0);" aria-expanded="false"><span
                                            class="hide-menu"> Inbox </span></a>
                                <ul aria-expanded="false" class="collapse">
                                    <li><a href="<?php echo e(asset('inbox')); ?>">Mail Box</a></li>
                                    <li><a href="<?php echo e(asset('inbox-detail')); ?>">Mail Details</a></li>
                                    <li><a href="<?php echo e(asset('compose')); ?>">Compose Mail</a></li>
                                    <li><a href="<?php echo e(asset('contact')); ?>">Contact</a></li>
                                    <li><a href="<?php echo e(asset('contact-detail')); ?>">Contact Detail</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="<?php echo e(asset('calendar')); ?>" aria-expanded="false"><span
                                            class="hide-menu">Calendar</span></a>
                            </li>
                            <li>
                                <a href="<?php echo e(asset('widgets')); ?>" aria-expanded="false"><span
                                            class="hide-menu"> Widgets </span></a>
                            </li>
                            <li>
                                <a class="waves-effect" href="javascript:void(0);" aria-expanded="false"><span
                                            class="hide-menu"> Charts</span></a>
                                <ul aria-expanded="false" class="collapse">
                                    <li><a href="<?php echo e(asset('morris-chart')); ?>">Morris Chart</a></li>
                                    <li><a href="<?php echo e(asset('peity-chart')); ?>">Peity Charts</a></li>
                                    <li><a href="<?php echo e(asset('knob-chart')); ?>">Knob Charts</a></li>
                                    <li><a href="<?php echo e(asset('sparkline-chart')); ?>">Sparkline charts</a></li>
                                </ul>
                            </li>
                            <li>
                                <a class="waves-effect" href="javascript:void(0);" aria-expanded="false"><span
                                            class="hide-menu"> Icons</span></a>
                                <ul aria-expanded="false" class="collapse">
                                    <li><a href="<?php echo e(asset('simple-line')); ?>">Simple Line</a></li>
                                    <li><a href="<?php echo e(asset('fontawesome')); ?>">Fontawesome</a></li>
                                </ul>
                            </li>
                            <li>
                                <a class="waves-effect" href="javascript:void(0);" aria-expanded="false"><span
                                            class="hide-menu"> Maps</span></a>
                                <ul aria-expanded="false" class="collapse">
                                    <li><a href="<?php echo e(asset('map-google')); ?>">Google Map</a></li>
                                    <li><a href="<?php echo e(asset('map-vector')); ?>">Vector Map</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                <?php endif; ?>
                <?php if(in_array(Auth::user()->roles[0]->name, App\Role::whereNotIn('name',['admin','user','client','attorney','secretary','associate','intern'])->pluck('name')->toArray())): ?>
                    <li>
                        <a class="waves-effect" href="<?php echo e(url('account-settings')); ?>">
                            <span class="hide-menu"> Account Setting</span>
                        </a>
                    </li>
                    <li><a href="<?php echo e(url('logout')); ?>">  <span class="hide-menu"> Logout</span> </a></li>
                <?php else: ?>
                    
                <?php endif; ?>

            </ul>
        </nav>
    </div>
</aside><?php /**PATH /home1/backendpro/public_html/usman/lcm/resources/views/layouts/partials/sidebar.blade.php ENDPATH**/ ?>