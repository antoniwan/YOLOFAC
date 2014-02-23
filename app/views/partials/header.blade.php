<div class="contain-to-grid fixed">
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
        <!-- user is logged-in -->
        @if(!Auth::check())
        <li class="has-form"><a class="button round" href="{{ route('register') }}">Sign In</a></li>
        @else
        <li class="auth-controls has-dropdown">
            <a href="#">
                <img
                 class="auth-controls__profile-pic round"
                 src="{{ $user['service']->service_picture }}"
                 alt="">
                {{ $user->name }}
            </a>
            <ul class="dropdown">
                <li><a href="#">Create a challenge</a></li>
                <li><a href="#">My challenges</a></li>
                <li><a href="{{ route('logout') }}">Logout</a></li>
            </ul>
        </li>
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
