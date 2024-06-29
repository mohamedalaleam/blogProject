  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link @if(Request::segment(2)!='dashboard') collapsed @endif "  href="{{ url('panel/dashboard') }}">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->

   @if(Auth::user()->is_admin==1)
      <li class="nav-item">
        <a class="nav-link @if(Request::segment(2)!='user') collapsed @endif" href="{{ url('panel/user/list') }}">
          <i class="bi bi-person"></i>
          <span>Users</span>
        </a>
      </li><!-- End Profile Page Nav -->


      <li class="nav-item">
        <a class="nav-link @if(Request::segment(2)!='category') collapsed @endif" href="{{ url('panel/category/list') }}">
          <i class="bi bi-person"></i>
          <span>category</span>
        </a>
      </li><!-- End Profile Page Nav -->
      @endif


      <li class="nav-item">
        <a class="nav-link @if(Request::segment(2)!='blog') collapsed @endif" href="{{ url('panel/blog/list') }}">
          <i class="bi bi-person"></i>
          <span>Blog</span>
        </a>
      </li><!-- End Profile Page Nav -->
      @if(Auth::user()->is_admin==1)

      <li class="nav-item">
        <a class="nav-link @if(Request::segment(2)!='page') collapsed @endif" href="{{ url('panel/page/list') }}">
          <i class="bi bi-person"></i>
          <span>Page</span>
        </a>
      </li><!-- End Profile Page Nav -->
   @endif



   <li class="nav-item">
     <a class="nav-link @if(Request::segment(2)!='change-password') collapsed @endif" href="{{ url('panel/change-password') }}">
       <i class="bi bi-key"></i>
       <span>Change Password</span>
     </a>
   </li><!-- End Profile Page Nav -->
   <li class="nav-item">
    <a class="nav-link @if(Request::segment(2)!='contact') collapsed @endif" href="{{ url('panel/contact') }}">
      <i class="bi bi-briefcase"></i>
      <span> Contact</span>
    </a>
  </li><!-- End Profile Page Nav -->

    </ul>

  </aside><!-- End Sidebar-->
