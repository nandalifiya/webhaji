<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ config('app.name', 'Web Haji - admin') }}</title>

  <!-- Scripts -->
  <script src="{{ asset('js/app.js') }}" defer></script>

  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link rel=" stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr"
    crossorigin="anonymous">

  <!-- Styles -->
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('assets/css/now-ui-dashboard.css') }}">
  <style>
    .mt-n1 {
      margin-top: -6.25rem !important;
    }
  </style>
</head>

<body>
  <div class="wrapper ">
    <div class="sidebar" data-color="blue">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red | yellow"
    -->
      <div class="logo">
        <a class="simple-text logo-mini">
          WH
        </a>
        <a class="simple-text logo-normal">
          {{ config('app.name', 'Laravel') }}
        </a>
      </div>
      <div class="sidebar-wrapper" id="sidebar-wrapper">
        <ul class="nav">
          <li class="dashboard">
            <a href="{{ route('home.index') }}">
              <i class="now-ui-icons design_app"></i>
              <p>Dashboard</p>
            </a>
          </li>
          <li class="post">
            <a href="{{ route('post.index') }}">
              <i class="now-ui-icons files_paper"></i>
              <p>Post</p>
            </a>
          </li>
          <li class="inbox">
            <a href="{{ route('inbox.index') }}">
              <i class="now-ui-icons ui-1_email-85"></i>
              <p>Inbox</p>
            </a>
          </li>
          <li class="outbox">
            <a href="{{ route('outbox.index') }}">
              <i class="now-ui-icons ui-1_email-85"></i>
              <p>Outbox</p>
            </a>
          </li>
        </ul>
      </div>
    </div>
    <div class="main-panel" id="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-transparent  bg-primary  navbar-absolute">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <div class="navbar-toggle">
              <button type="button" class="navbar-toggler">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
              </button>
            </div>
            <a class="navbar-brand" href="">{{Request::path() }}</a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index"
            aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end" id="navigation">
            <ul class="navbar-nav">
              <!-- Authentication Links -->
              @guest
              <li class="nav-item">
                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
              </li>
              @if (Route::has('register'))
              <li class="nav-item">
                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
              </li>
              @endif
              @else
              <li class="nav-item dropdown">
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown"
                  aria-haspopup="true" aria-expanded="false" v-pre>
                  {{ Auth::user()->name }}
                </a>

                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="{{ url('/index') }}">
                    {{ __('Index') }}
                  </a>
                  <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                  </a>

                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                  </form>
                </div>
              </li>
              @endguest
            </ul>
          </div>
        </div>
      </nav>
      <!-- End Navbar -->
      <div class="panel-header panel-header">
        <div class="header text-center">
          @if (Request::path() !== 'post')
          <h2 class="title">{{ Request::segment(1) }}</h2>
          @endif
        </div>
      </div>
      <div class="content mt-n1">
        <main class="">
          @yield('content')
        </main>
      </div>
    </div>
  </div>
  <!-- Scripts -->
  <script src="{{ asset('assets/js/core/jquery.min.js') }}"></script>
  <script src="{{ asset('assets/js/core/popper.min.js') }}" defer></script>
  <!-- <script src="{{ asset('assets/js/core/bootstrap.min.js') }}" defer></script> -->
  <script src="{{ asset('assets/js/plugins/perfect-scrollbar.jquery.min.js') }}" defer></script>
  <script src="{{ asset('assets/js/now-ui-dashboard.js') }}" defer></script>
  <script >
    $('#sidebar-wrapper ul.nav li.active').removeClass('active');
    var loc = window.location.href; // returns the full URL
    switch (window.location.pathname) {
      case '/home':
        $('#sidebar-wrapper ul.nav li.dashboard').addClass('active');

        break;
      case '/post':
        $('#sidebar-wrapper ul.nav li.post').addClass('active');
        break;
      case '/inbox':
        $('#sidebar-wrapper ul.nav li.inbox').addClass('active');
        break;
        case '/outbox':
        $('#sidebar-wrapper ul.nav li.outbox').addClass('active');
        break;
      default:
        // code block
    }

  </script>
</body>

</html>
