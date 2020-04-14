@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-xl-2 col-lg-3 col-md-12 col-sm-12 col-12">
            <nav class="navbar navbar-expand-lg db-sidenav">
                <div class="offcanvas-collapse" id="db-sidenav">
                            <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link active" href="{{ url('/home') }}"><i class="fas fa-fw fa-tachometer-alt"></i>Dashboard</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/phones') }}"><i class="fas fa-fw fa-list"></i>Phone Numbers</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/upload') }}"><i class="fas fa-fw fa-receipt"></i>Upload Numbers</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/send') }}"><i class="fas fa-fw fa-star"></i>Send SMS</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();"> <i class="fas fa-fw fa-sign-out-alt"></i>
                                    {{ __('Logout') }}
                                </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
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
                        <p class="db-pageheader-text">@if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif</p>
                    </div>
                </div>
            </div>
            <div class="row">

                <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12">
                    <div class="db-card db-overview-widget">
                        <div class="db-card-body">
                            <h3 class="db-card-body-title">Total Phone Numbers</h3>
                            <div class="db-overview-widget-body">
                                <h3 class="db-overview-widget-body-label">
                                    5000
                                </h3>
                                <span class="db-overview-widget-body-icon">
                                    <i class="fas fa-star"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12">
                    <div class="db-card db-overview-widget">
                        <div class="db-card-body">
                            <h3 class="db-card-body-title">Total Sent</h3>
                            <div class="db-overview-widget-body">
                                <h3 class="db-overview-widget-body-label">
                                    2000
                                </h3>
                                <span class="db-overview-widget-body-icon">
                                    <i class="fas fa-paper-plane"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12">
                    <div class="db-card db-overview-widget">
                        <div class="db-card-body">
                            <h3 class="db-card-body-title">Totoal Pending </h3>
                            <div class="db-overview-widget-body">
                                <h3 class="db-overview-widget-body-label">
                                    3000
                                </h3>
                                <span class="db-overview-widget-body-icon">
                                    <i class="fas fa-file-invoice"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

@endsection
