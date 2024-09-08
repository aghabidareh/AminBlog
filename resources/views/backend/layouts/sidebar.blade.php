  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link @if(Request::segment(2) != 'dashboard' ) collapsed @endif" href="{{ route('panel-dashboard') }}">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link @if(Request::segment(2) != 'user' ) collapsed @endif" href="{{ route('panel-user-list') }}">
          <i class="bi bi-person"></i>
          <span>Users</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link @if(Request::segment(2) != 'category' ) collapsed @endif" href="{{ route('panel-category-list') }}">
          <i class="bi bi-person"></i>
          <span>Category</span>
        </a>
      </li>


      <li class="nav-item">
        <a class="nav-link @if(Request::segment(2) != 'blog' ) collapsed @endif" href="{{-- route('panel-blog-list') --}}">
          <i class="bi bi-person"></i>
          <span>Blog</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link @if(Request::segment(2) != 'help' ) collapsed @endif" href="{{-- route('panel-help-list') --}}">
          <i class="bi bi-question-circle"></i>
          <span>Help</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link @if(Request::segment(2) != 'inbox' ) collapsed @endif" href="pages-contact.html">
          <i class="bi bi-envelope"></i>
          <span>Inbox</span>
        </a>
      </li>
    </ul>

  </aside>