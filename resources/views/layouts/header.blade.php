    <!-- Navbar Start -->
    <div class="container-fluid bg-light position-relative shadow">
        <nav
          class="navbar navbar-expand-lg bg-light navbar-light py-3 py-lg-0 px-0 px-lg-5"
        >
          <a
            href=""
            class="navbar-brand font-weight-bold text-secondary"
            style="font-size: 50px"
          >
            <i class="flaticon-043-teddy-bear"></i>
            <span class="text-primary">AminProject</span>
          </a>
          <button
            type="button"
            class="navbar-toggler"
            data-toggle="collapse"
            data-target="#navbarCollapse"
          >
            <span class="navbar-toggler-icon"></span>
          </button>
          <div
            class="collapse navbar-collapse justify-content-between"
            id="navbarCollapse"
          >
            <div class="navbar-nav font-weight-bold mx-auto py-0">
              <a href="{{ route('home') }}" class="nav-item nav-link @if(Request::segment(1) == '') active @endif">Home</a>
              <a href="{{ route('about') }}" class="nav-item nav-link @if(Request::segment(1) == 'about') active @endif">About</a>
              <a href="{{ route('team') }}" class="nav-item nav-link @if(Request::segment(1) == 'team') active @endif">Team</a>
              <a href="{{ route('gallery') }}" class="nav-item nav-link  @if(Request::segment(1) == 'gallery') active @endif">Gallery</a>
              <a href="{{ route('contact') }}" class="nav-item nav-link @if(Request::segment(1) == 'contact') active @endif">Contact</a>
              <a href="{{ route('blog') }}" class="nav-item nav-link @if(Request::segment(1) == 'blog') active @endif">Blog</a>
            </div>
            @if (!Auth::check())
            <a href="{{ route('login') }}" class="btn btn-primary px-4 mr-2">Login</a>
            <a href="{{ route('register') }}" class="btn btn-primary px-4">Register</a>
            @else
            <a href="{{ route('logout') }}" class="btn btn-primary px-4 mr-2">Logout</a>
            @endif
          </div>
        </nav>
      </div>
      <!-- Navbar End -->