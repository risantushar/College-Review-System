<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fa fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">SB ADMIN</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="{{route('admin_dashboard_page')}}">
            <i class="fa fa-fw fa-tachometer"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading text-center">
        Management
    </div>
    
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseInstitution"
            aria-expanded="true" aria-controls="collapseTwo">
            <i class="fa fa-fw fa-university"></i>
            <span>Institutions</span>
        </a>
        <div id="collapseInstitution" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{route('add_institution_page')}}"><i class="fa fa-plus"></i> Add Institution</a>
                {{-- <a class="collapse-item" href="">Manage Institution</a> --}}
            </div>
        </div>
    </li>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
            aria-expanded="true" aria-controls="collapseTwo">
            <i class="fa fa-fw fa-user-circle-o"></i>
            <span>Authority</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{route('add_authority_page')}}"><i class="fa fa-plus"></i> Add Authority</a>
                <a class="collapse-item" href="{{route('manage_authority_page')}}"><i class="fa fa-cog"></i> Manage Authority</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Utilities Collapse Menu -->
    <li class="nav-item">
        <a href="" class="nav-link collapsed" data-toggle="collapse" data-target="#collapseStudent"
        aria-expanded="true" aria-controls="collapseTwo">
            <i class="fa fa-fw fa-user"></i>
            <span>Student Management</span>
        </a>
        <div id="collapseStudent" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Management</h6>
                <a class="collapse-item" href="{{route('all_students_page')}}"><i class="fa fa-graduation-cap"></i> Students Lists</a>
                <a class="collapse-item" href="{{route('student_management_page')}}"><i style="color: green" class="fa fa-check-circle"></i> Verify Students</a>
            </div>
        </div>
    </li>
    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"><i style="color: white" class="fa fa-arrow-left"></i></button>
    </div>
</ul>