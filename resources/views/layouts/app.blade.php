<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts
    <script src="{{ asset('js/app.js') }}" defer></script>-->

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap" rel="stylesheet">
    <!-- Styles -->
    <link href="{{ asset('assets/fonts/fontawesome/css/all.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/flag-icon/flag-icon.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/theme-style.css') }}" rel="stylesheet">
    @yield('styles')

</head>
<body class="bg-light">
    <div class="db-wrapper">
        <div class="db-header">
            <!-- header start -->
            <!-- navigation start -->
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <nav class="navbar navbar-expand-lg db-navbar">
                        <div class="db-navbar-brand"><a class="navbar-brand" href="{{ url('/')}}"> <img src="{{ asset('assets/images/pistis-logo.png') }}" alt=""></a></div>
                            <div class="db-navbar-toggler"><button class="db-sidenav-toggler navbar-toggler collapsed" type="button" data-toggle="offcanvas" data-target="#db-sidenav" aria-controls="db-sidenav" aria-expanded="false" aria-label="Toggle navigation">
                                    <span class="icon-bar top-bar mt-0"></span>
                                    <span class="icon-bar middle-bar"></span>
                                    <span class="icon-bar bottom-bar"></span>
                                </button>
                                <button class=" db-header-toggler navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#db-navbar" aria-controls="db-navbar" aria-expanded="false" aria-label="Toggle navigation">
                                    <i class="fas fa-ellipsis-v"></i>
                                </button>
                            </div>
                            <div class="collapse navbar-collapse" id="db-navbar">
                                <ul class="navbar-nav ml-auto mt-2 mt-lg-0 mr-3">

                                    @if (Route::has('login'))

                                        @auth


                                            <li class="nav-item "><a class="nav-link" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"> <i class="fas fa-fw fa-sign-out-alt"></i>
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                            </li>
                                        @else
                                        <li class="nav-item "> <a  class="nav-link" href="{{ route('login') }}"> <i class="fas fa-fw fa-sign-out-alt"></i>Login</a> </li>

                                            @if (Route::has('register'))
                                            <li class="nav-item "> <a class="nav-link" href="{{ route('register') }}"><i class="fas fa-fw fa-sign-out-alt"></i> Register</a> </li>

                                            @endif
                                        @endauth

                                @endif

                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
            <!-- navigation close -->
            <!-- header close -->
        </div>
         <!-- content start -->
        <div class="db-content">
            @yield('content')
        </div>
         <!-- content close -->
          <!-- footer start -->
        <div class="db-footer">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="db-footer-copyright">
                        <p class="db-footer-copyright-text">2020 &nbsp;©&nbsp; <a href="{{ url('/')}}"> Pistis Foundation Food Bank SMS Panel</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
         <!-- footer close -->
    </div>
    <script src="{{ asset('assets/js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.bundle.js') }}"></script>
    <script src="{{ asset('assets/js/main-js.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.slimscroll.js') }}"></script>
    @yield('scripts')

    
</body>
</html>

