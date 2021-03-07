<header class="top-header">
    <nav class="navbar header-nav navbar-expand-lg">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.html"><img src="{{asset('/front_end/interface/images/logo.png')}}" alt="image"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-wd" aria-controls="navbar-wd" aria-expanded="false" aria-label="Toggle navigation">
                <span></span>
                <span></span>
                <span></span>
            </button>
        @php
            $student_id=Session::get('student_id');
            $student_info=DB::table('students')
            ->where('student_id',$student_id)
            ->first();
            $institutionInfo=DB::table('institutions')
            ->where('institution_id',$student_info->institution_id)
            ->first();
        @endphp
        @if($student_info->institution_id==0)
        <div class="collapse navbar-collapse justify-content-end" id="navbar-wd">
            <ul class="navbar-nav">
                <li><a class="nav-link active" href="{{route('student_dashboard')}}">Home</a></li>
                <li><a class="nav-link" href="{{route('top_rated_college_page')}}">Top Colleges</a></li>
                <li><a class="nav-link" href="{{route('student_profile_page',['student_id'=>encrypt($student_id)])}}">Profile</a></li>
                <li><a href="{{route('student_logout')}}" style="cursor: pointer" class="nav-link" type="button" >
                    Logout
                    <i class="fa fa-sign-out"></i>
                </a></li>
            </ul>
        </div>
        @else
        <div class="collapse navbar-collapse justify-content-end" id="navbar-wd">
            <ul class="navbar-nav">
                <li><a class="nav-link active" href="{{route('student_dashboard')}}">Home</a></li>
                <li><a href="{{route('review_page',['survey_id'=>$institutionInfo->survey_id])}}" class="nav-link" href="">My College</a></li>
                <li><a href="{{route('college_teachers_page',['student_id'=>encrypt($student_id)])}}" class="nav-link" href="">College Teachers</a></li>
                <li><a class="nav-link" href="{{route('top_rated_college_page')}}">Top Colleges</a></li>
                <li><a class="nav-link" href="{{route('student_profile_page',['student_id'=>encrypt($student_id)])}}">Profile</a></li>
                <li>
                    <a href="{{route('student_logout')}}" style="cursor: pointer" class="nav-link" type="button" >
                    Logout
                        <i class="fa fa-sign-out"></i>
                    </a>
                </li>
            </ul>
        </div>
        @endif
            {{-- <div class="search-box">
                <input type="text" class="search-txt" placeholder="Search">
                <a class="search-btn">
                    <img src="{{asset('/front_end/interface/images/search_icon.png')}}" alt="#" />
                </a>
            </div> --}}
        </div>
    </nav>
</header>