<nav class="navbar navbar-expand-lg navbar-dark bg-info fixed-top">
<a class="navbar-brand" href="{{ route('home') }}">
    <span class="text-white">{{ config('app.name', 'Laravel') }}</span>
  </a>
  <button type="button" class="navbar-toggler border-0" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <i class="fas fa-fw fa-bars"></i>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav ml-auto">
      <!-- Authentication Links -->
      @guest
        <li class="nav-item active">
            <a class="nav-link" href="{{ route('login') }}">
              <i class="fas fa-fw fa-sign-in-alt"></i>&nbsp;{{ __('Login') }}
            </a>
        </li>
        @if (Route::has('register'))
            <li class="nav-item active">
                <a class="nav-link" href="{{ route('register') }}">
                  <i class="fas fa-fw fa-user-plus"></i>&nbsp;{{ __('Register') }}
                </a>
            </li>
        @endif
      @else
        <li class="nav-item active">
          <a href="#" class="nav-link" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
            <i class="fas fa-fw fa-sign-out-alt"></i>&nbsp;{{ __('Sign Out') }}
          </a>

          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              @csrf
          </form>
        </li>
      @endguest
    </ul>
  </div>
</nav>
