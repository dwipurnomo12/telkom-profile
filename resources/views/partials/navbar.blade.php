
  <!-- ======= Header ======= -->
  <header id="header" class="d-flex align-items-center">
    <div class="container d-flex justify-content-between align-items-center">

      <div class="logo">
        <h1><a href="/">Telkom</a></h1>
      </div>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="active" href="/">Home</a></li>
          <li><a href="#featured">Layanan</a></li>
          <li><a href="#services">Antrian</a></li>
          @auth
              @if (auth()->user()->role_id == 1)
                <li><a href="/dashboard">Dashboard</a></li>
              @else
                <li><a href="/antrian/antrian-saya">{{ auth()->user()->name }}</a></li>
                <form method="POST" action="{{ route('logout') }}" class="mx-3 mt-2 d-block">
                  @csrf
                  <button type="submit" class="btn btn-custom" role="button">Logout</button>
                </form>
              
              @endif
          @else
              <li><a href="/login">Login</a></li>
          @endauth
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->