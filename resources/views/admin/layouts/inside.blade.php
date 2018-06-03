@section('side')
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
                        <a href="/users" class="nav-link">
                            <i class="fa fa-user nav-icon"></i>
                            <p>Employees</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/departments" class="nav-link">
                            <i class="fa fa-sitemap nav-icon"></i>
                            <p>Department</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/jobs" class="nav-link">
                            <i class="fa fa-briefcase nav-icon"></i>
                            <p>Jobs</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/locations" class="nav-link">
                            <i class="fa fa-map-marker nav-icon"></i>
                            <p>Locations</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="/countries" class="nav-link">
                            <i class="fa fa-map-o  nav-icon"></i>
                            <p>Countries</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="/regions" class="nav-link">
                            <i class="fa fa-globe  nav-icon"></i>
                            <p>Regions</p>
                        </a>
                    </li>


                </ul>
            </li>

        </ul>
    </nav>
@endsection