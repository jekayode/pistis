    function initialize() {
        'use strict';

        var map = new google.maps.Map(document.getElementById('listing-map'), {
            zoom: 5,
            center: { lat: 23.0330392, lng: 72.5552774 }
        });

         var marker = new google.maps.Marker({
            position: { lat: 23.0330392, lng: 72.5552774 },
            map: map,
            icon: 'assets/images/map-pin.png'
        });


var contentString = '<div class="tooltip-block"><div class="container"><div class="row no-gutters"><div class="col-5"><div class="tooltip-img"><a href="#"><img src="./assets/images/tooltip-img-1.jpg" alt="" class="img-fluid"></a></div></div><div class="col-7"><div class="tooltip-content"><h3 class="tooltip-content-title"><a href="#" class="title">Heading for OfficeSpace Title</a></h3><p class="tooltip-content-text">Ahmedabad, Gujarat, India</p><div class="review-content-rating"><span class="star"></span><span class="star"></span><span class="star"></span><span class="star empty"></span><span class="star empty"></span><a href="#" class="rating-review">5.0</a></div></div></div></div></div></div>';

        var infowindow = new google.maps.InfoWindow({
          content: contentString
        });


 marker.addListener('click', function() {
          infowindow.open(map, marker);
        });








    }