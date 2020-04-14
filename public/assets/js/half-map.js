var india = [23.0387842, 79.1347856];

var listings = [
    [26.8851417, 75.650474, "assets/images/map-pin.png", "marker_1", '<div class="tooltip-block"><div class="container"><div class="row no-gutters"><div class="col-5"><div class="tooltip-img"><a href="#"><img src="assets/images/tooltip-img-1.jpg" alt="" class="img-fluid"></a></div></div><div class="col-7"><div class="tooltip-content"><h3 class="tooltip-content-title"><a href="#" class="title">Heading for OfficeSpace Title</a></h3><p class="tooltip-content-text">Ahmedabad, Gujarat, India</p><div class="review-content-rating"><span class="star"></span><span class="star"></span><span class="star"></span><span class="star empty"></span><span class="star empty"></span><a href="#" class="rating-review">5.0</a></div></div></div></div></div></div>'],
    [28.527272, 77.1389453, "assets/images/map-pin.png", "marker_2", '<div class="tooltip-block"><div class="container"><div class="row no-gutters"><div class="col-5"><div class="tooltip-img"><a href="#"><img src="assets/images/tooltip-img-2.jpg" alt="" class="img-fluid"></a></div></div><div class="col-7"><div class="tooltip-content"><h3 class="tooltip-content-title"><a href="#" class="title">Meeting Office Space Title</a></h3><p class="tooltip-content-text">Surat, Gujarat, India</p><div class="review-content-rating"><span class="star"></span><span class="star"></span><span class="star"></span><span class="star"></span><span class="star half"></span><a href="#" class="rating-review">4.5</a></div></div></div></div></div></div>'],
    [28.3790062, 81.8867066, "assets/images/map-pin.png", "marker_3", '<div class="tooltip-block"><div class="container"><div class="row no-gutters"><div class="col-5"><div class="tooltip-img"><a href="#"><img src="assets/images/tooltip-img-3.jpg" alt="" class="img-fluid"></a></div></div><div class="col-7"><div class="tooltip-content"><h3 class="tooltip-content-title"><a href="#" class="title">Coworking Office Space Title</a></h3><p class="tooltip-content-text">Vadodara, Gujarat, India</p><div class="review-content-rating"><span class="star"></span><span class="star"></span><span class="star"></span><span class="star empty"></span><span class="star empty"></span><a href="#" class="rating-review">5.0</a></div></div></div></div></div></div>'],
    [23.0201818, 72.4396585, "assets/images/map-pin.png", "marker_4", '<div class="tooltip-block"><div class="container"><div class="row no-gutters"><div class="col-5"><div class="tooltip-img"><a href="#"><img src="assets/images/tooltip-img-2.jpg" alt="" class="img-fluid"></a></div></div><div class="col-7"><div class="tooltip-content"><h3 class="tooltip-content-title"><a href="#" class="title">Office Space Title</a></h3><p class="tooltip-content-text">Bhuj, Gujarat, India</p><div class="review-content-rating"><span class="star"></span><span class="star"></span><span class="star"></span><span class="star empty"></span><span class="star empty"></span><a href="#" class="rating-review">5.0</a></div></div></div></div></div></div>'],
    [22.0498348, 78.9197119, "assets/images/map-pin.png", "marker_5", '<div class="tooltip-block"><div class="container"><div class="row no-gutters"><div class="col-5"><div class="tooltip-img"><a href="#"><img src="assets/images/tooltip-img-1.jpg" alt="" class="img-fluid"></a></div></div><div class="col-7"><div class="tooltip-content"><h3 class="tooltip-content-title"><a href="#" class="title">Heading for OfficeSpace Title</a></h3><p class="tooltip-content-text">Surat, Gujarat, India</p><div class="review-content-rating"><span class="star"></span><span class="star"></span><span class="star"></span><span class="star"></span><span class="star empty"></span><a href="#" class="rating-review">4.0</a></div></div></div></div></div></div>'],
    [25.0498348, 76.9197119, "assets/images/map-pin.png", "marker_6", '<div class="tooltip-block"><div class="container"><div class="row no-gutters"><div class="col-5"><div class="tooltip-img"><a href="#"><img src="assets/images/tooltip-img-3.jpg" alt="" class="img-fluid"></a></div></div><div class="col-7"><div class="tooltip-content"><h3 class="tooltip-content-title"><a href="#" class="title">Meeting Office Space Title</a></h3><p class="tooltip-content-text">Ahmedabad, Gujarat, India</p><div class="review-content-rating"><span class="star"></span><span class="star"></span><span class="star"></span><span class="star"></span><span class="star"></span><a href="#" class="rating-review">3.0</a></div></div></div></div></div></div>']
];



function init() {
    var myOptions = {
        center: new google.maps.LatLng(india[0], india[1]),
        zoom: 5,
        mapTypeId: google.maps.MapTypeId.ROADMAP
    }

    var map = new google.maps.Map(document.getElementById("map"), myOptions);


    for (var i = 0; i < listings.length; i++) {

        var listingid = listings[i];

        urlimg = listingid[2];

        var image = new google.maps.MarkerImage(
            urlimg,
            null,
            null,
            null,
            new google.maps.Size(36, 43));

        var myLatLng = new google.maps.LatLng(listingid[0], listingid[1]);

        var marker = new google.maps.Marker({
            position: myLatLng,
            map: map,
            icon: image,
            animation: google.maps.Animation.DROP
        });


        (function(_listingid, _listing, ) {
            $('#' + _listingid[3]).on('mouseover', function(e) {
                _listing.setAnimation(google.maps.Animation.BOUNCE);

            });

        })(listingid, marker);

        (function(_listingid, _listing, ) {
            $('#' + _listingid[3]).on('mouseout', function(e) {
                _listing.setAnimation(null);
                setTimeout(function() { _listing.setAnimation(null); }, 750);
            });

            
        })(listingid, marker);

 

        var content = listingid[4];

        var infowindow = new google.maps.InfoWindow()

        google.maps.event.addListener(marker, 'mouseover', (function(marker, content, infowindow) {
            return function() {
                infowindow.setContent(content);
                infowindow.open(map, marker);
            };
        })(marker, content, infowindow));

        google.maps.event.addListener(marker, 'click', (function(marker, content, infowindow) {
            return function() {
                infowindow.close();
            };
        })(marker, content, infowindow));



    }
   


}
$(document).ready(function() {
    init();
});