<div class="contain-to-grid">
  <header class="top-bar" data-topbar>
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
        <li><a class="button round" href="{{ route('register') }}">Sign In</a></li>
      </ul>

      <!-- Left Nav Section -->
      <ul class="left">
        <li><a href="#">Browse Community</a></li>
        <li><a href="#">How does this work?</a></li>
      </ul>
    </section>
  </header>
</div>
