<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    {{-- STYLES --}}
    @include('components.styles')


</head>
<body>
    <div id="app">
        {{-- NAVBAR --}}
        @include('components.navbar')

        @auth
          <div class="row m-0">
            {{-- SIDEBAR --}}
            @include('components.sidebar')

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
    @include('components.scripts')
</footer>
</html>
