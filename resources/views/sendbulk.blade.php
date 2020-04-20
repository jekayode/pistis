
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
                <div class="card text-center">

                    <div class="card-body">
                    <h5 class="card-title">Total Pending

                        <span id="alert">{{ $phone_pendingTotal }} </span>

                    </h5>

                    <h1 id="status"> </h1>
                                    <!-- Image loader -->
                    <div id='loader' style='display: none;'>
                    <img src='{{ asset('img/loading.gif')}}' width='128px' height='128px'>
                    </div>
                    <!-- Image loader -->

                      <button type="submit" id="ajaxSubmit" class="btn btn-sm btn-warning btn-rounded">Check Pending</button>

                      <button type="submit" id="creditPending" class="btn btn-sm btn-success btn-rounded">Send Pending SMS</button>
                    </div>

                  </div>
            </div>

        </div>
    </div>
</div>

@endsection

@section('scripts')
<script>
    jQuery(document).ready(function(){
       jQuery('#ajaxSubmit').click(function(e){
          e.preventDefault();
          $.ajaxSetup({
             headers: {
               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
           }
         });
          jQuery.ajax({
             url: "{{ url('/sms/getSmsStatus') }}",
             method: 'post',
             beforeSend: function(){
                   // Show image container
                   //$("#loader").show();
               },
             success: function(result){
                  console.log(result);
                jQuery('#alert').show();
                jQuery('#alert').html(result.items['pending_sms_count']);
             },
             complete:function(data){
                   // Hide image container
                   $("#loader").hide();
               }


             });
          });
       });
</script>

<script>
    jQuery(document).ready(function(){
       jQuery('#creditPending').click(function(e){
          e.preventDefault();
          $.ajaxSetup({
             headers: {
               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
           }
         });
          jQuery.ajax({
             url: "{{ url('/processbulk') }}",
             method: 'post',
             beforeSend: function(){
                   // Show image container
                   $("#loader").show();
               },
             success: function(result){
                  console.log(result);
                jQuery('#status').show();
                jQuery('#status').html(result.status);
                 jQuery('#alert').html(result.count);
             },
             complete:function(data){
                   // Hide image container
                   $("#loader").hide();
               }
             });
          });
       });
</script>

@endsection

