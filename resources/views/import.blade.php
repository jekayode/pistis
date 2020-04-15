
@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        @include('sidebar')
        <div class="col-xl-10 col-lg-9 col-md-12 col-sm-12 col-12">
            <div class="row">
                @include('messages')
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

