<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.0/css/bootstrap.min.css" integrity="sha384-PDle/QlgIONtM1aqA2Qemk5gPOE7wFq8+Em+G/hmo5Iq0CCmYZLv3fVRDJ4MMwEA" crossorigin="anonymous">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">

</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-lg navbar-dark bg-info fixed-top">
          <a class="navbar-brand" href="#">
            <span class="text-warning">{{ config('app.name', 'Laravel') }}</span> Dashboard
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

        @auth
          <div class="row m-0">
            <div class="col-xl-2 col-lg-3 col-md-4 bg-dark text-white px-0" id="side-menu">
              <div class="side-menu-wrapper">
                <div class="user-content mb-3 pt-3 px-3">
                  <label class="mb-0 d-block">{{Auth::user()->firstname . ' ' . Auth::user()->lastname}}</label>
                </div>

                <div class="list-group" id="user-menu-list">
                  <a href="#" class="list-group-item list-group-item-action bg-info text-white border-0 rounded-0">
                    <small>Dashboard</small> <i class="fas fa-fw fa-home float-right mt-1"></i>
                  </a>
                  <a href="#" class="list-group-item list-group-item-action bg-dark text-white border-0">
                    <small>Employee Management</small> <i class="fas fa-fw fa-users float-right mt-1"></i>
                  </a>
                  <a href="#system-management-sub-list" class="list-group-item list-group-item-action bg-dark text-white border-0"
                  data-toggle="collapse" role="button" aria-expanded="false" aria-controls="collapseExample">
                    <small>System Management</small> <i class="fas fa-fw fa-database float-right mt-1"></i>
                  </a>

                  <div class="collapse" id="system-management-sub-list" data-parent="#user-menu-list" style="border-left: 5px solid #6C757D;">
                    <a href="#" class="list-group-item list-group-item-action bg-dark text-white border-0 rounded-0 pl-4">
                      <small>Department</small> <i class="far fa-fw fa-hdd float-right mt-1"></i>
                    </a>
                    <a href="#" class="list-group-item list-group-item-action bg-dark text-white border-0 pl-4">
                      <small>Division</small> <i class="fas fa-fw fa-cogs float-right mt-1"></i>
                    </a>
                    <a href="#" class="list-group-item list-group-item-action bg-dark text-white border-0 pl-4">
                      <small>Country</small> <i class="fas fa-fw fa-globe-americas float-right mt-1"></i>
                    </a>
                    <a href="#" class="list-group-item list-group-item-action bg-dark text-white border-0 pl-4">
                      <small>State</small> <i class="fas fa-fw fa-landmark float-right mt-1"></i>
                    </a>
                    <a href="#" class="list-group-item list-group-item-action bg-dark text-white border-0 pl-4">
                      <small>City</small> <i class="fas fa-fw fa-city float-right mt-1"></i>
                    </a>
                  </div>

                  <a href="#user-management-sub-list" class="list-group-item list-group-item-action bg-dark text-white border-0"
                  data-toggle="collapse" role="button" aria-expanded="false" aria-controls="collapseExample">
                    <small>User Management</small> <i class="fas fa-fw fa-user-cog float-right mt-1"></i>
                  </a>

                  <div class="collapse" id="user-management-sub-list" data-parent="#user-menu-list" style="border-left: 5px solid #6C757D;">
                    <a href="#" class="list-group-item list-group-item-action bg-dark text-white border-0 rounded-0 pl-4">
                      <small>User</small> <i class="fas fa-fw fa-users-cog float-right mt-1"></i>
                    </a>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-xl-10 col-lg-9 col-md-8 px-0 disable-overflow" id="dashboard-content-parent">
              <div class="content-backdrop d-none"></div>

              <div class="dashboard-content">
                @yield('content')
              </div>

              <button type="button" class="btn btn-danger" id="mobile-side-menu-btn-opener">
                <i class="fas fa-fw fa-bars"></i>
              </button>
            </div>
          </div>
        @else
          <main class="py-4">
              @yield('content')
          </main>
        @endauth
    </div>
</body>

<footer>
    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.0/js/bootstrap.min.js" integrity="sha384-7aThvCh9TypR7fIc2HV4O/nFMVCBwyIUKL8XCtKE+8xgCgl/PQGuFsvShjr74PBp" crossorigin="anonymous"></script>
    <script src="{{ asset('js/main.js') }}"></script>
</footer>
</html>
