
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
                @if(session()->has('message'))
                <div class="alert alert-success" role="alert">
                    {{ session()->get('message') }}
                  </div>

            @endif
            </div>
            <div class="row">



                <div class="card-body">



                    <form action="{{ route('import') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="db-card listing-video">
                                <!-- listing video start  -->
                                <div class="db-card-header">
                                    <h3 class="db-card-header-title">Upload Phone List</h3>
                                </div>
                                <div class="db-card-body">

                                        <div class="form-group">
                                            <label for="videolink">Choose .csv File</label>
                                            <input type="file" name="file" class="form-control">
                                        </div>

                                </div>
                                <!-- listing video close  -->
                            </div>
                        </div>
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <button type="submit" class="btn btn-primary">Upload</button>
                        </div>




                    </form>
                </div>

            </div>

        </div>
    </div>
</div>

@endsection

