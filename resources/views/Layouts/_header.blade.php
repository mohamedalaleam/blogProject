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
        <span class="text-primary">Blog</span>
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

        {{-- هني بنديرو كود باش يبدأ يجيب الكاتيجوري دايناميك --}}
        {{-- هيعني صفحات الهيدر حيطلعو على حسب الكاتيجوري اللي عندك--}}
        @php
            $getCategoryHeader= App\Models\CategoryModel::getCategoryMenu();
        @endphp
      >
        <div class="navbar-nav font-weight-bold mx-auto py-0">
          <a href="{{ url('') }}" class="nav-item nav-link  @if (Request::segment(1) == '' )  active @endif ">Home </a>
          @foreach ( $getCategoryHeader as  $categoryheader )
           <a href="{{ url($categoryheader->slug) }}" class="nav-item nav-link  @if (Request::segment(1) == $categoryheader->slug )  active @endif">{{ $categoryheader->name }}</a>

          @endforeach
          {{-- <a href="{{ url('about') }}" class="nav-item nav-link">About</a>
          <a href="{{ url('teams') }}" class="nav-item nav-link">Teams</a>
          <a href="{{ url('gallery') }}" class="nav-item nav-link">Gallery</a> --}}
          {{-- <a href="{{ url('blog') }}" class="nav-item nav-link">Blog</a> --}}
          <a href="{{ url('contact') }}" class="nav-item nav-link">Contact</a>
        </div>
        <a href="{{ url('login') }}" class="btn btn-primary px-4" > Login</a>
        <a href="{{ url('register') }}"style="margin-left: 10px" class="btn btn-primary px-4" > Register</a>

      </div>
    </nav>
  </div>
  <!-- Navbar End -->
