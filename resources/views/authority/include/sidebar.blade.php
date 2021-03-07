<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fa fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">SB Authority</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="{{route('authority_dashboard_page')}}">
            <i class="fa fa-fw fa-tachometer"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading text-center">
        Management
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
            aria-expanded="true" aria-controls="collapseTwo">
            <i class="fa fa-fw fa-university"></i>
            <span>College Info</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Management</h6>
                @php
                    $authority_id=Session::get('authority_id');
                @endphp
                <a class="collapse-item" href="{{route('college_info_page',['authority_id'=>$authority_id])}}">College Inforamtions</a>
                {{-- <a class="collapse-item" href="{{route('manage_authority_page')}}">Manage Authority</a> --}}
            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseSurvey"
            aria-expanded="true" aria-controls="collapseTwo">
            <i class="fa fa-fw fa-university"></i>
            <span>Survey Management</span>
        </a>
        <div id="collapseSurvey" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Survey Management</h6>
                <a class="collapse-item" href="{{route('create_survey_page')}}">Create Survey</a>
                @php
                    $authority_id=Session::get('authority_id');
                @endphp
                <a class="collapse-item" href="{{route('get_previous_survey_list',['authority_id'=>encrypt($authority_id)])}}">Previous Survey</a>
                {{-- <a class="collapse-item" href="{{route('survey_result_page')}}">Survey Result</a> --}}
            </div>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTeacher"
            aria-expanded="true" aria-controls="collapseTwo">
            <i class="fa fa-fw fa-users"></i>
            <span>Teacher Management</span>
        </a>
        <div id="collapseTeacher" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Teacher Management</h6>
                <a class="collapse-item" href="{{route('add_teacher_page')}}"><i class="fa fa-plus"></i> Add Teacher</a>
                <a class="collapse-item" href="{{route('manage_teacher_page')}}"><i class="fa fa-cog"></i> Manage Teacher</a>
            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseGallery"
            aria-expanded="true" aria-controls="collapseTwo">
            <i class="fa fa-fw fa-image"></i>
            <span>Institution Gallery</span>
        </a>
        <div id="collapseGallery" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Gallery Management</h6>
                <a class="collapse-item" href="{{route('add_image_page')}}">Add Image</a>
                <a class="collapse-item" href="{{route('gallery_management_page')}}">Gallery Management</a>
            </div>
        </div>
    </li>


    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"><i style="color: white" class="fa fa-arrow-left"></i></button>
    </div>

</ul>