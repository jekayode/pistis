
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
        @include('sidebar')

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
                    <div class="db-card">
                        <div class="table-responsive invoice-table">
                            <table class="table second">
                                <thead>
                                    <tr>
                                        <th>
                                            <div class="custom-control custom-checkbox invoice-table-checkbox">
                                                <input class="custom-control-input chk_all" type="checkbox" name="chk_all" id="customCheck1">
                                                <label class="custom-control-label" for="customCheck1"></label>
                                            </div>
                                        </th>
                                        <th>Phone</th>
                                        <th>Code</th>
                                        <th>State</th>
                                        <th data-orderable="false">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($phones as $phone)
                                        <tr>
                                            <td>
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input checkboxes" id="customCheck2">
                                                    <label class="custom-control-label" for="customCheck2"></label>
                                                </div>
                                            </td>
                                            <td>
                                                <p class="invoice-table-heading"> {{ $phone->phone }}</p>
                                            </td>
                                            <td>
                                                <p class="invoice-table-price">{{ $phone->code }}</p>
                                            </td>
                                            <td>
                                                <p class="invoice-table-date">{{ $phone->status }}</p>
                                            </td>
                                            <td>
                                                <div class="invoice-table-action">
                                                    <a class="dropdown-item" href="#">Send SMS</a>
                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                        <p>No Phone numbers</p>
                                    @endforelse

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

