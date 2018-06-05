<nav class="main-header navbar navbar-expand bg-white navbar-light border-bottom">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#"><span class="badge badge-dark">Menu <i
                            class="fa fa-bars"></i></span></a>
        </li>
        <div style="overflow: hidden">
        <li class="nav-item dropdown">
            <a href="/" class="nav-link"><span class="badge badge-dark">Home <i class="fa fa-home"></i></span></a>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <span class="badge badge-dark">Add New <i class="fa fa-plus"></i></span>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-left">
                <span class="dropdown-item dropdown-header">Add New</span>
                <div class="dropdown-divider"></div>
                <a href="/add_department" class="dropdown-item">
                    <i class="fa fa-code-fork mr-2"></i> Add New Department
                </a>
                <div class="dropdown-divider"></div>
                <a href="/add_job" class="dropdown-item">
                    <i class="fa fa-medkit mr-2"></i> Add New Job
                </a>
                <div class="dropdown-divider"></div>
                <a href="/add_location" class="dropdown-item">
                    <i class="fa fa-thumb-tack mr-2"></i> Add New Location
                </a>
                <div class="dropdown-divider"></div>
                <a href="/add_employee" class="dropdown-item">
                    <i class="fa fa-user-plus mr-2"></i> Add New User
                </a>
                <div class="dropdown-divider"></div>
                {{--<a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>--}}
            </div>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="modal" data-target="#add-new-task"><span class="badge badge-dark">Add New Task <i
                            class="fa fa-calendar-plus-o"></i></span></a>
        </li>
        </div>
    </ul>

<!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <li class="nav-item">
            @if(app()->getLocale() == 'ar')
                <a class="nav-link"  href="{{ url('lang/en') }}">
                    <i class="fa fa-globe"></i> en
                </a>
            @else
                {{--{{ __('file.key') }}--}}
                <a class="nav-link" href="{{ url('lang/ar') }}">
                    <i class="fa fa-globe"></i> ar
                </a>
            @endif
        </li>
    </ul>
</nav>
