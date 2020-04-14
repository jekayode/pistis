    function initialize() {
        'use strict';

        var map = new google.maps.Map(document.getElementById('contact-map'), {
            zoom: 12,
            center: { lat: 23.0330392, lng: 72.5552774 }
        });

       



        var contentString = '<div class="tooltip-block"><div class="container"><div class="row no-gutters"><div class="col-12"><div class="tooltip-content"><h3 class="tooltip-content-title"><a href="#" class="title">Space City</a></h3><p class="tooltip-content-text">Shreeratan complex, Akhbarnagar Ahmedabad, Gujarat, India</p></div></div></div></div></div>';

        var infowindow = new google.maps.InfoWindow({
          content: contentString
        });

        var marker = new google.maps.Marker({
             position: { lat: 23.0330392, lng: 72.5552774 },
            map: map,
            icon: 'assets/images/map-pin.png'
        });
        marker.addListener('mouseover', function() {
          infowindow.open(map, marker);
        });
    }

    
