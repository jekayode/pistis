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
                            <div class="db-navbar-brand"><a class="navbar-brand" href="index.html"> <img src="./assets/images/db-logo.png" alt=""></a></div>
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
                                    <li class="nav-item dropdown dropleft notification">
                                        <a class="nav-link dropdown-toggle" href="#" id="menu-1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-bell bell-icon"></i>
                                            <span class="badge badge-primary">23</span>
                                        </a>
                                   <ul class="dropdown-menu" aria-labelledby="menu-1">
                                            <span class="with-arrow"><span class=""></span></span>
                                            <div class="notification-list">
                                                <li class="dropdown-item">
                                                    <a href="#">
                                                        <p class="dropdown-item-text">You have got a new request quote for your office.</p>
                                                        <p class="dropdown-item-time">1 days ago</p>
                                                    </a>
                                                </li>
                                                <li class="dropdown-item">
                                                    <a href="#">
                                                        <p class="dropdown-item-text">Welcome to Spacely! Click here it understand better.</p>
                                                        <p class="dropdown-item-time">23 days ago</p>
                                                    </a>
                                                </li>
                                                <li class="dropdown-item">
                                                    <a href="#">
                                                        <p class="dropdown-item-text">You have got a new request quote for your office.</p>
                                                        <p class="dropdown-item-time">1 days ago</p>
                                                    </a>
                                                </li>
                                                <li class="dropdown-item">
                                                    <a href="#">
                                                        <p class="dropdown-item-text">Welcome to Spacely! Click here it understand better.</p>
                                                        <p class="dropdown-item-time">23 days ago</p>
                                                    </a>
                                                </li>
                                                <li class="dropdown-item">
                                                    <a href="#">
                                                        <p class="dropdown-item-text">You have got a new request quote for your office.</p>
                                                        <p class="dropdown-item-time">1 days ago</p>
                                                    </a>
                                                </li>
                                                <li class="dropdown-item">
                                                    <a href="#">
                                                        <p class="dropdown-item-text">Welcome to Spacely! Click here it understand better.</p>
                                                        <p class="dropdown-item-time">23 days ago</p>
                                                    </a>
                                                </li>
                                            </div>
                                            <div class="notification-footer">
                                                <a href="#" class="notification-footer-show">Show all</a>
                                                <a href="#" class="notification-footer-mark"> Mark all as read</a>
                                            </div>
                                        </ul>
                                    </li>
                                    <li class="nav-item dropdown dropleft user">
                                           <span class="with-arrow"><span class=""></span></span>
                                        <a class="nav-link dropdown-toggle" href="#" id="menu-2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <img src="assets/images/avatar-1.jpg" alt="" class="rounded-circle user-profile">
                                        </a>
                                   <ul class="dropdown-menu" aria-labelledby="menu-2">
                                            <li class="dropdown-item">
                                                <a class="dropdown-link" href="dashboard-overview.html"><i class="fas fa-fw fa-tachometer-alt"></i>Dashboard</a>
                                            </li>
                                            <li class="dropdown-item">
                                                <a class="dropdown-link" href="dashboard-listing.html"><i class="fas fa-fw fa-list"></i>Listing</a>
                                            </li>
                                            <li class="dropdown-item">
                                                <a class="dropdown-link" href="dashboard-request-quote.html"><i class="fas fa-fw fa-receipt"></i>Request Quote</a>
                                            </li>
                                            <li class="dropdown-item">
                                                <a class="dropdown-link active" href="dashboard-listing-reviews.html"><i class="fas fa-fw fa-star"></i>Reviews</a>
                                            </li>
                                            <li class="dropdown-item">
                                                <a class="dropdown-link" href="dashboard-invoice.html"><i class="fas fa-fw fa-file-invoice"></i>Invoice</a>
                                            </li>
                                            <li class="dropdown-item">
                                                <a class="dropdown-link" href="dashboard-pricing-plan.html"><i class="fas fa-fw fa-gem"></i>My Plan</a>
                                            </li>
                                            <li class="dropdown-item">
                                                <a class="dropdown-link " href="dashboard-listing-profile.html"><i class="fas fa-fw fa-user-circle"></i>Profile</a>
                                            </li>
                                            <li class="dropdown-item">
                                                <a class="dropdown-link" href="index.html"><i class="fas fa-fw fa-sign-out-alt"></i>Logout</a>
                                            </li>
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
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xl-2 col-lg-3 col-md-12 col-sm-12 col-12">
                        <nav class="navbar navbar-expand-lg db-sidenav">
                            <div class="offcanvas-collapse" id="db-sidenav">
                                       <ul class="nav flex-column">
                                    <li class="nav-item">
                                        <a class="nav-link active" href="dashboard-overview.html"><i class="fas fa-fw fa-tachometer-alt"></i>Dashboard</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="dashboard-listing.html"><i class="fas fa-fw fa-list"></i>Listing</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="dashboard-request-quote.html"><i class="fas fa-fw fa-receipt"></i>Request Quote</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="dashboard-listing-reviews.html"><i class="fas fa-fw fa-star"></i>Reviews</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="dashboard-invoice.html"><i class="fas fa-fw fa-file-invoice"></i>Invoice</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="dashboard-pricing-plan.html"><i class="fas fa-fw fa-gem"></i>My Plan</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="dashboard-listing-profile.html"><i class="fas fa-fw fa-user-circle"></i>Profile</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="index.html"><i class="fas fa-fw fa-sign-out-alt"></i>Logout</a>
                                    </li>
                                </ul>
                            </div>
                        </nav>
                    </div>
                    <div class="col-xl-10 col-lg-9 col-md-12 col-sm-12 col-12">
                        <div class="row">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="db-pageheader">
                                    <h2 class="db-pageheader-title">Dashboard</h2>
                                    <p class="db-pageheader-text"> In commodo lorem ut erat sagittis variusm euismod lectus vehicula cursus est.</p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                                <div class="db-card db-overview-widget">
                                    <div class="db-card-body">
                                        <h3 class="db-card-body-title">Listings</h3>
                                        <div class="db-overview-widget-body">
                                            <h3 class="db-overview-widget-body-label">
                                                12
                                            </h3>
                                            <span class="db-overview-widget-body-icon">
                                                <i class="fas fa-list"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                                <div class="db-card db-overview-widget">
                                    <div class="db-card-body">
                                        <h3 class="db-card-body-title">Reviews</h3>
                                        <div class="db-overview-widget-body">
                                            <h3 class="db-overview-widget-body-label">
                                                5
                                            </h3>
                                            <span class="db-overview-widget-body-icon">
                                                <i class="fas fa-star"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                                <div class="db-card db-overview-widget">
                                    <div class="db-card-body">
                                        <h3 class="db-card-body-title">Request Quote</h3>
                                        <div class="db-overview-widget-body">
                                            <h3 class="db-overview-widget-body-label">
                                                23
                                            </h3>
                                            <span class="db-overview-widget-body-icon">
                                                <i class="fas fa-file-invoice"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                                <div class="db-card db-overview-widget">
                                    <div class="db-card-body">
                                        <h3 class="db-card-body-title">Listing Active Plan </h3>
                                        <div class="db-overview-widget-body">
                                            <h3 class="db-overview-widget-body-label">
                                                Free
                                            </h3>
                                            <span class="db-overview-widget-body-icon">
                                                <i class="fas fa-paper-plane"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-6 col-lg-12 col-md-6 col-sm-12 col-12">
                                <div class="db-card db-overview-reviews">
                                    <div class="db-card-header">
                                        <h3 class="db-card-header-title">Recent Reviews</h3>
                                    </div>
                                    <div class="db-card-body">
                                        <table class="table table-responsive">
                                            <tbody>
                                                <tr>
                                                    <td scope="row">
                                                        <div class="db-overview-reviews-img">
                                                            <img src="assets/images/avatar-3.jpg" alt="" class="rounded-circle">
                                                        </div>
                                                    </td>
                                                    <td class="db-overview-reviews-text">Charandeep Sastry</td>
                                                    <td class="db-overview-reviews-text">Listing Title Here</td>
                                                    <td class="db-overview-reviews-text">8 June 2020</td>
                                                    <td>
                                                        <div class="review-content-rating">
                                                            <span class="star"></span>
                                                            <span class="star"></span>
                                                            <span class="star"></span>
                                                            <span class="star"></span>
                                                            <span class="star empty"></span>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td scope="row">
                                                        <div class="db-overview-reviews-img">
                                                            <img src="assets/images/avatar-1.jpg" alt="" class="rounded-circle">
                                                        </div>
                                                    </td>
                                                    <td class="db-overview-reviews-text">Winona Jaskolski</td>
                                                    <td class="db-overview-reviews-text">Office Listing Here</td>
                                                    <td class="db-overview-reviews-text">12 June 2020</td>
                                                    <td>
                                                        <div class="review-content-rating">
                                                            <span class="star"></span>
                                                            <span class="star"></span>
                                                            <span class="star"></span>
                                                            <span class="star"></span>
                                                            <span class="star empty"></span>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td scope="row">
                                                        <div class="db-overview-reviews-img">
                                                            <img src="assets/images/avatar-2.jpg" alt="" class="rounded-circle">
                                                        </div>
                                                    </td>
                                                    <td class="db-overview-reviews-text">Jewell Bailey</td>
                                                    <td class="db-overview-reviews-text">Listing Title Here</td>
                                                    <td class="db-overview-reviews-text">30 June 2020</td>
                                                    <td>
                                                        <div class="review-content-rating">
                                                            <span class="star"></span>
                                                            <span class="star"></span>
                                                            <span class="star"></span>
                                                            <span class="star"></span>
                                                            <span class="star empty"></span>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <div class="db-card-body-btn">
                                            <a href="dashboard-listing-reviews.html" class="btn btn-primary btn-sm">See All Reviews</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-12 col-md-6 col-sm-12 col-12">
                                <div class="db-card db-overview-quote">
                                    <div class="db-card-header">
                                        <h3 class="db-card-header-title">Recent Request Quote</h3>
                                    </div>
                                    <div class="db-card-body">
                                        <table class="table table-responsive">
                                            <tbody>
                                                <tr>
                                                    <td class="db-overview-quote-text">Nishtha Rama</td>
                                                    <td class="db-overview-quote-text">nishtharama@gmail.com</td>
                                                    <td class="db-overview-quote-text">12 June 2020</td>
                                                    <td class="db-overview-quote-text">
                                                        010 59303753
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="db-overview-quote-text">Lata Ajeet Dial</td>
                                                    <td class="db-overview-quote-text">lataajeetdial@gmail.com</td>
                                                    <td class="db-overview-quote-text">23 June 2020</td>
                                                    <td class="db-overview-quote-text">
                                                        010 59303850
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="db-overview-quote-text">Akhil Mahadeo</td>
                                                    <td class="db-overview-quote-text">akhilmahadeo@gmail.com</td>
                                                    <td class="db-overview-quote-text">28 June 2020</td>
                                                    <td class="db-overview-quote-text">
                                                        010 59303753
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <div class="db-card-body-btn">
                                            <a href="dashboard-request-quote.html" class="btn btn-primary btn-sm">See Quotes</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
         <!-- content close -->
          <!-- footer start -->
        <div class="db-footer">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="db-footer-copyright">
                            <p class="db-footer-copyright-text">2020 &nbsp;©&nbsp; <a href="index.html"> Spacely</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
         <!-- footer close -->
    </div>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
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
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
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

        <main class="py-4">
            @yield('content')
        </main>
    </div>

    <script src="{{ asset('assets/js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.bundle.js') }}"></script>
    <script src="{{ asset('assets/js/main-js.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.slimscroll.js') }}"></script>

</body>
</html>
