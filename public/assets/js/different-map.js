

	$ = jQuery;

		var CLUSTER_IMG = WeddingCity_AJAX_OBJECT.map_marker;
		var Map_ID = 'listing_map';

		// global "map" variable
		var map = null;

		// marker cluster variable
		var markerclusterer = null;

		var myOptions = {
			disableAutoPan: true
			,maxWidth: 0
			,pixelOffset: new google.maps.Size(-135,-45)
			,zIndex: null
			,boxStyle: { 
			  width: "260px"
			  ,height: "auto"
			  ,background: "#fff"
			 }
			,closeBoxMargin: "-20px 0px 0px 0px"
			,closeBoxURL: WeddingCity_AJAX_OBJECT.close_icon
			,infoBoxClearance: new google.maps.Size(1, 1)
			,isHidden: false
			,pane: "floatPane"
			,boxClass: "listing-window"
			,alignBottom:true
			,enableEventPropagation: true
		};

		// define infowindow
		var infowindow = new InfoBox(myOptions);

		 
		function WeddingCity_Listing_Data(){

            if( $('.WeddingCity_listing').length ){

                var _lat_ = parseFloat( $('.WeddingCity_listing').find('.listing_latitude').val() );
                var _lng_ = parseFloat( $('.WeddingCity_listing').find('.listing_longitude').val() );

                var map = new google.maps.Map(document.getElementById('listing_map'), {
                    zoom: 7,
                    center: { lat: parseFloat( _lat_ ), lng: parseFloat( _lng_ ) }
                });

                var allMyMarkers = [];

                var infoWin = new google.maps.InfoWindow();

                // Create an array of alphabetical characters used to label the markers.
                var labels = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';

            }else{

                var map = new google.maps.Map(document.getElementById('listing_map'), {
                    zoom: 7,
                    center: { lat: parseFloat( 23.0199968 ), lng: parseFloat( 72.2995501 ) }
                });
            }
			

			google.maps.event.addListener(map, 'click', function() {
				infowindow.close();
			});

            var locations = new Array();

            $('.WeddingCity_listing').map(function( index, value ) {

                locations.push({
                    'id'        		: $(this).attr('id'),
                    'lat'       		: parseFloat( $(this).find('.listing_latitude').val() ),
                    'lng'       		: parseFloat( $(this).find('.listing_longitude').val() ),
                    'url'       		: $(this).find('.listing_single_link').val(),
                    'title'     		: $(this).find('.listing_title').val(),
                    'image'     		: $(this).find('.listing_image').val(),
                    'address'   		: $(this).find('.listing_address').val(),
                    'icon'      		: $(this).find('.listing_icon').val(),
                    'category_icon'     : $(this).find('.listing_category_icon').val(),
                    'address'	    	: $(this).find('.listing_address').html(),
                });
            });


			// arrays to hold copies of the markers
			var gmarkers = [];

			locations.map(function(location, i) {

			  	var point = new google.maps.LatLng( location.lat,  location.lng );

			  	var box_content 

			  	=	'<div class="vendor-listing-info">' 
			  	+     	'<div class="vendor-img">'
			  	+			'<a href="'+ location.url +'" class="title">'
			  	+				'<img src="' +	location.image + '" class="img-fluid"/>'
			  	+			'</a>'				
                +		'</div>' 
                +		'<div class="vendor-content">'
				+			'<h2 class="vendor-title"><a href="'+ location.url +'" class="title">'+ location.title +'</a></h2>'
				+			location.address
				+		'</div>'
				+	'</div>';


				var imageUrl = location.category_icon;
				var markerImage = new google.maps.MarkerImage(imageUrl);

				var marker = new google.maps.Marker({
					position: point,
				    animation: google.maps.Animation.DROP,
					'icon': markerImage,
					'id': location.id
				});

				google.maps.event.addListener(marker, 'click', function() {
					infowindow.setContent(box_content); 
					infowindow.open(map,marker);
				});

				// save the info (not used here)
				gmarkers.push(marker);

			});

			mcOptions = {  

				styles: [{

					height: 55,
					url: CLUSTER_IMG,
					width: 55,
					textColor: '#FFF',
					textSize: 14
				}]
			}
				
			// create a Marker Clusterer that clusters markers
			markerCluster = new MarkerClusterer( map, gmarkers, mcOptions );

            if ($('.WeddingCity_listing').length) {

                $('.WeddingCity_listing').on('mouseover', function() {

                    toggleBounce( $(this).attr('id') );
                });

                function toggleBounce(selectedID) {

                	if( selectedID != '' && selectedID !== null && selectedID !== null && selectedID != '' && gmarkers.length >= 1 ){

	                    for (var j = 0; j < gmarkers.length; j++) {

	                        if ( gmarkers[j].id == selectedID && selectedID !== null && selectedID != '' ) {

	                            if (gmarkers[j].getAnimation() !== null ) {

	                                gmarkers[j].setAnimation(null);

	                            } else {

	                                gmarkers[j].setAnimation(google.maps.Animation.BOUNCE);
	                                map.setCenter( gmarkers[j].getPosition() );

	                            }

	                            break;
	                        }
	                    }
	                }
                }
            }

		}

		function clearClusters( e ) {

			e.stopPropagation();
			markerCluster.clearMarkers();
			gmarkers = [];
			e.preventDefault();
		}