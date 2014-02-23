<div class="contain-to-grid fixed">
  <header class="header top-bar" data-topbar>
    <ul class="title-area">
      <li class="name">
        <h1><a class="app-logo" href="{{ route('home') }}">#YOLO for a Cause</a></h1>
      </li>
      <li class="toggle-topbar menu-icon"><a href="#">Menu</a></li>
    </ul>

    <section class="top-bar-section">
      <!-- Right Nav Section -->
      <ul class="right">
        <!-- user is logged-in -->
        @if(!Auth::check())
        <li class="has-form vcenter--ib">
            <div class="vcenter-inner">
                <a class="button radius expand" href="{{ route('register') }}">Sign In</a>
            </div>
        </li>
        @else
        <li class="auth-controls has-dropdown">
            <a href="{{route('dashboard')}}">
                <img
                 class="auth-controls__profile-pic round"
                 src="{{ Auth::user()->services()->first()->service_picture }}"
                 alt="">
                {{ Auth::user()->name }}
            </a>
            <ul class="dropdown">
                <li><a href="{{URL::to('/dare/create')}}">Create a dare</a></li>
                <li><a href="{{route('dashboard')}}">My dares</a></li>
                <li><a href="{{ route('logout') }}">Logout</a></li>
            </ul>
        </li>
        @endif
      </ul>

      <!-- Left Nav Section -->
      <ul class="left">
        <li><a href="{{ route('charity.all') }}">Browse Charities</a></li>
        <li><a href="#">Browse Dares</a></li>
      </ul>
    </section>
  </header>
</div>
