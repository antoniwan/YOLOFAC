<div class="contain-to-grid">
  <header class="header top-bar" data-topbar>
    <ul class="title-area">
      <li class="name">
        <h1><a href="{{ route('home') }}">#YOLO for a cause</a></h1>
      </li>
      <li class="toggle-topbar menu-icon"><a href="#">Menu</a></li>
    </ul>

    <section class="top-bar-section">
      <!-- Right Nav Section -->
      <ul class="right">
        <li><a class="button round" href="{{ route('dare.create') }}">Create a dare</a></li>
        @if(!Auth::check())
          <li><a class="button round" href="{{ route('register') }}">Sign In</a></li>
        @else
        <!-- user is logged-in -->
        <li class="auth-controls">
            <a href="#">
                <img
                 class="auth-controls__profile-pic round"
                 src="{{ $user['service']->service_picture }}"
                 alt="">
                {{ $user->name }}
            </a>
        </li>
        <li><a href="{{ route('logout') }}">Logout</a></li>
        @endif

      </ul>

      <!-- Left Nav Section -->
      <ul class="left">
        <li><a href="#">Browse Community</a></li>
        <li><a href="{{ route('faq') }}">How does this work?</a></li>
      </ul>
    </section>
  </header>
</div>
