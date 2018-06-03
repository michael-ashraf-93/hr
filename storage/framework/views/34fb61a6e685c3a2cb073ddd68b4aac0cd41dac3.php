<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/" class="brand-link">
        <img src="<?php echo e(url('admin/dist/img/AdminLTELogo.png')); ?>" alt="AdminLTE Logo"
             class="brand-image img-circle elevation-3"
             style="opacity: .8">
        <span class="brand-text font-weight-light">HR Dashboard</span>
    </a>


    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    

    
    

    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
            data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
            with font-awesome or any other icon font library -->
            <li class="nav-item has-treeview ">
                <div href="#" class="user-panel mt-3 pb-3 mb-3 d-flex nav-link active">
                    <div class="image">
                        <?php if(auth()->user()->gender == 'male'): ?>
                            <img src="<?php echo e(url('admin/dist/img/avatar5.png')); ?>" class="img-circle elevation-2"
                                 alt="User Image">
                        <?php elseif(auth()->user()->gender == 'female'): ?>
                            <img src="<?php echo e(url('admin/dist/img/avatar2.png')); ?>" class="img-circle elevation-2"
                                 alt="User Image">
                        <?php endif; ?>
                    </div>
                    
                    <p class="info">
                        <a href="#" class="d-block">
                            <span style="color:#fff;"><?php echo e(auth()->user()->fname .' '. auth()->user()->lname); ?></span>
                        </a>
                        <i class="right fa fa-angle-left info" style="float: right;"></i>
                    </p>
                    

                </div>
                <ul class="nav nav-treeview">
                    <li class="nav-item has-treeview menu-close">
                        <a href="#" class="nav-link active">
                            <i class="nav-icon fa fa-tasks"></i>
                            <p>
                                Tasks
                                <i class="right fa fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="/task" class="nav-link <?php if (\Illuminate\Support\Facades\Blade::check('checkSegment', 'task')): ?> active <?php endif; ?>">
                                    <i class="fa fa-tasks nav-icon"></i>
                                    <p>View All Tasks</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link"  data-toggle="modal" data-target="#add-new-task">
                                    <i class="fa fa-plus nav-icon"></i>
                                    <p>Add New Task</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="/logout" class="nav-link">
                            <i class="fa fa-sign-out nav-icon"></i>
                            <p>Logout</p>
                        </a>
                    </li>
                </ul>
            </li>

        </ul>
    </nav>


    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
    
    
    
    
    
    
    
    
    

    <!-- Sidebar Menu -->
        
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                with font-awesome or any other icon font library -->
                <li class="nav-item has-treeview menu-open">
                    <a href="#" class="nav-link active">
                        <i class="nav-icon fa  fa-database"></i>
                        <p>
                            Data
                            <i class="right fa fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/managers" class="nav-link <?php if (\Illuminate\Support\Facades\Blade::check('checkSegment', 'managers')): ?> active <?php endif; ?>">
                                <i class="fa fa-user-circle-o nav-icon"></i>
                                <p>Managers</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/user" class="nav-link <?php if (\Illuminate\Support\Facades\Blade::check('checkSegment', 'user')): ?> active <?php endif; ?>">
                                <i class="fa fa-users nav-icon"></i>
                                <p>Employees</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/department"
                               class="nav-link <?php if (\Illuminate\Support\Facades\Blade::check('checkSegment', 'department')): ?> active <?php endif; ?>">
                                <i class="fa  fa-sitemap nav-icon"></i>
                                <p>Department</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/job" class="nav-link <?php if (\Illuminate\Support\Facades\Blade::check('checkSegment', 'job')): ?> active <?php endif; ?>">
                                <i class="fa   fa-briefcase nav-icon"></i>
                                <p>Jobs</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/location" class="nav-link <?php if (\Illuminate\Support\Facades\Blade::check('checkSegment', 'location')): ?> active <?php endif; ?>">
                                <i class="fa  fa-map-marker nav-icon"></i>
                                <p>Locations</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="/country" class="nav-link <?php if (\Illuminate\Support\Facades\Blade::check('checkSegment', 'country')): ?> active <?php endif; ?>">
                                <i class="fa fa-map-o  nav-icon"></i>
                                <p>Countries</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="/region" class="nav-link <?php if (\Illuminate\Support\Facades\Blade::check('checkSegment', 'region')): ?> active <?php endif; ?>">
                                <i class="fa fa-globe  nav-icon"></i>
                                <p>Regions</p>
                            </a>
                        </li>
                    </ul>
                </li>

            </ul>
        </nav>


        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                with font-awesome or any other icon font library -->
                <li class="nav-item has-treeview menu-open">
                    <a href="#" class="nav-link active">
                        <i class="nav-icon fa  fa-database"></i>
                        <p>
                            Add New
                            <i class="right fa fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/department_create"
                               class="nav-link <?php if (\Illuminate\Support\Facades\Blade::check('checkSegment', 'department_create')): ?> active <?php endif; ?>">
                                <i class="fa fa-code-fork nav-icon"></i> Add New Department
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/job_create" class="nav-link <?php if (\Illuminate\Support\Facades\Blade::check('checkSegment', 'job_create')): ?> active <?php endif; ?>">
                                <i class="fa fa-medkit nav-icon"></i> Add New Job
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/location_create"
                               class="nav-link <?php if (\Illuminate\Support\Facades\Blade::check('checkSegment', 'location_create')): ?> active <?php endif; ?>">
                                <i class="fa fa-thumb-tack nav-icon"></i> Add New Location
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/user_create"
                               class="nav-link <?php if (\Illuminate\Support\Facades\Blade::check('checkSegment', 'user_create')): ?> active <?php endif; ?>">
                                <i class="fa fa-user-plus nav-icon"></i> Add New User
                            </a>
                        </li>
                    </ul>
                </li>

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
