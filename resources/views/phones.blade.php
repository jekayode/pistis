
@extends('layouts.app')

@section('styles')
<link rel="stylesheet" type="text/css" href="{{asset('assets/datatables/css/dataTables.bootstrap4.css')}}">
@endsection

@section('scripts')
    <script src="{{asset('assets/datatables//js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('assets/datatables/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('assets/datatables/js/data-table.js')}}"></script>
@endsection

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
                    <div class="db-pageheader d-xl-flex justify-content-between">
                        <div class="">
                            <h2 class="db-pageheader-title">Phone Numbers</h2>
                            
                        </div>
                        <div class="d-flex align-items-center">
                            <a href="/upload" class="btn btn-primary"> Add Number</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="card-lines-tab">
                        <ul class="nav nav-pills card-lines-tab-header" id="pills-tab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="pills-listing-tab" data-toggle="pill" href="#pills-listing" role="tab" aria-controls="pills-listing" aria-selected="true">All Listing</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="pills-pending-tab" data-toggle="pill" href="#pills-pending" role="tab" aria-controls="pills-pending" aria-selected="false">Pending</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="pills-approved-tab" data-toggle="pill" href="#pills-approved" role="tab" aria-controls="pills-approved" aria-selected="false">Approved</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="pills-removed-tab" data-toggle="pill" href="#pills-removed" role="tab" aria-controls="pills-removed" aria-selected="false">Removed</a>
                            </li>
                        </ul>
                        <div class="tab-content card-listing-tab-body" id="pills-tabContent">
                            <div class="tab-pane fade show active" id="pills-listing" role="tabpanel" aria-labelledby="pills-listing-tab">
                                <div class="table-responsive listing-table">
                                    <table class="table first">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Phone</th>
                                                <th>Date</th>
                                                <th>Time SMS Sent</th>
                                                <th>Status</th>
                                                <th data-orderable="false"



>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    
                                                </td>
                                                <td>
                                                    <p class="listing-table-head-text">Emmanuel Joseph</p>
                                                </td>
                                                <td>
                                                    <div class="listing-table-date">
                                                        <p>19 June, 2019</p>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="listing-table-review"></div>
                                                </td>
                                                <td>
                                                    <div class="listing-table-quote"></div>
                                                </td>
                                                <td>
                                                    <div class="listing-table-status">
                                                        <span class="badge badge-warning">Pending</span>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="listing-table-action">
                                                        <div class="dropdown">
                                                            <a href="#" class="dropdown-toggle" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                <i class="fas fa-ellipsis-v"></i>
                                                            </a>
                                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                                <a class="dropdown-item" href="#">Edit Details</a>
                                                                <a class="dropdown-item" href="#">Delete</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="pills-pending" role="tabpanel" aria-labelledby="pills-pending-tab">
                                <div class="table-responsive listing-table">
                                    <table class="table first">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Phone</th>
                                                <th>Date</th>
                                                <th>Time SMS Sent</th>
                                                <th>Status</th>
                                                <th data-orderable="false">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    
                                                </td>
                                                <td>
                                                    <p class="listing-table-head-text">Emmanuel Joseph</p>
                                                </td>
                                                <td>
                                                    <div class="listing-table-date">
                                                        <p>19 June, 2019</p>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="listing-table-review"></div>
                                                </td>
                                                <td>
                                                    <div class="listing-table-quote"></div>
                                                </td>
                                                <td>
                                                    <div class="listing-table-status">
                                                        <span class="badge badge-warning">Pending</span>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="listing-table-action">
                                                        <div class="dropdown">
                                                            <a href="#" class="dropdown-toggle" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                <i class="fas fa-ellipsis-v"></i>
                                                            </a>
                                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                                <a class="dropdown-item" href="#">Edit Details</a>
                                                                <a class="dropdown-item" href="#">Delete</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="pills-approved" role="tabpanel" aria-labelledby="pills-approved-tab">
                                <div class="table-responsive listing-table">
                                    <table class="table first">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Phone</th>
                                                <th>Date</th>
                                                <th>Time SMS Sent</th>
                                                <th>Status</th>
                                                <th data-orderable="false">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    
                                                </td>
                                                <td>
                                                    <p class="listing-table-head-text">Emmanuel Joseph</p>
                                                </td>
                                                <td>
                                                    <div class="listing-table-date">
                                                        <p>19 June, 2019</p>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="listing-table-review"></div>
                                                </td>
                                                <td>
                                                    <div class="listing-table-quote"></div>
                                                </td>
                                                <td>
                                                    <div class="listing-table-status">
                                                        <span class="badge badge-warning">Pending</span>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="listing-table-action">
                                                        <div class="dropdown">
                                                            <a href="#" class="dropdown-toggle" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                <i class="fas fa-ellipsis-v"></i>
                                                            </a>
                                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                                <a class="dropdown-item" href="#">Edit Details</a>
                                                                <a class="dropdown-item" href="#">Delete</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="pills-removed" role="tabpanel" aria-labelledby="pills-removed-tab">
                                <div class="table-responsive listing-table">
                                    <table class="table first">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Phone</th>
                                                <th>Date</th>
                                                <th>Time SMS Sent</th>
                                                <th>Status</th>
                                                <th data-orderable="false"



>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    
                                                </td>
                                                <td>
                                                    <p class="listing-table-head-text">Emmanuel Joseph</p>
                                                </td>
                                                <td>
                                                    <div class="listing-table-date">
                                                        <p>19 June, 2019</p>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="listing-table-review"></div>
                                                </td>
                                                <td>
                                                    <div class="listing-table-quote"></div>
                                                </td>
                                                <td>
                                                    <div class="listing-table-status">
                                                        <span class="badge badge-warning">Pending</span>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="listing-table-action">
                                                        <div class="dropdown">
                                                            <a href="#" class="dropdown-toggle" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                <i class="fas fa-ellipsis-v"></i>
                                                            </a>
                                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                                <a class="dropdown-item" href="#">Edit Details</a>
                                                                <a class="dropdown-item" href="#">Delete</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

