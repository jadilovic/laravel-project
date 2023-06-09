<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container">
    <a class="navbar-brand" href={{ route('home') }}>IDK Akademija</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href={{ route('dashboard') }}>Dashboard</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href={{ route('blogs') }}>Blogovi Kartice</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href={{ route('jobs') }}>Poslovi Kartice</a>
        </li>
      </ul>
      <div class="d-flex">
        <!-- Authentication -->
        @if (Auth::check())
            <form method="POST" action="{{ route('logout') }}">
              @csrf
              <a
                class="btn btn-outline-secondary"
                :href="route('logout')"
                onclick="event.preventDefault();
                this.closest('form').submit();"
              >
               {{ __('Log Out') }}
              </a>
          </form>
        @else
             <a href={{ route('login') }} class="btn btn-outline-success">Login</a>
        @endif
    </div>
  </div>
</nav>
