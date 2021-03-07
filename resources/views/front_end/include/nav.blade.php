<header class="top-header">
    <nav class="navbar header-nav navbar-expand-lg">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.html"><img src="{{asset('/front_end/interface/images/logo.png')}}" alt="image"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-wd" aria-controls="navbar-wd" aria-expanded="false" aria-label="Toggle navigation">
                <span></span>
                <span></span>
                <span></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbar-wd">
                <ul class="navbar-nav">
                    <li><a class="nav-link active" href="index.html">Home</a></li>
                    <li><a class="nav-link" href="about.html">About</a></li>
                    @if(Session::get('customer_id')==NULL)
                    <li><a class="nav-link" href="{{route('student_login_page')}}">Top Colleges</a></li>
                    @else
                    <li><a class="nav-link" href="{{route('top_rated_college_page')}}"></a></li>
                    @endif
                    <li><a class="nav-link" href="contact.html">Contact us</a></li>
                    <li><a style="cursor: pointer" class="nav-link" type="button" data-toggle="modal" data-target="#loginModal">Login</a></li>
                </ul>
            </div>

            {{-- <div class="search-box">
                <input type="text" class="search-txt" placeholder="Search">
                <a class="search-btn">
                    <img src="{{asset('/front_end/interface/images/search_icon.png')}}" alt="#" />
                </a>
            </div> --}}
        </div>
    </nav>
</header>