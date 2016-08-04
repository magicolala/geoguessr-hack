function initialize() {
	var fenway = {lat: 37.869260, lng: -122.254811};
	var chartres = {lat: 48.443854, lng: 1.489012};
	var map = new google.maps.Map(document.getElementById('map'), {
	center: chartres,
	zoom: 0,
	mapTypeControl: false,
	signInControl: false,
	streetViewControl: false
	});
	var panorama = new google.maps.StreetViewPanorama(
      document.getElementById('pano'), {
        position: fenway,
        pov: {
          heading: 34,
          pitch: 10
        },
		zoom: 1,
		linksControl: true,
		panControl: false,
		addressControl: false        
      });

	google.maps.event.addListener(map, 'click', function(event) {
		placeMarker(event.latLng);
	});

	function placeMarker(location) {
	    var marker = new google.maps.Marker({
	        position: location, 
	        map: map
	    });
	}  
}