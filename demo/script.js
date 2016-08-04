function initialize() {
	var fenway = {lat: 37.869260, lng: -122.254811};
	var chartres = {lat: 48.443854, lng: 1.489012};
	var bourges = {lat: 47.083, lng: 2.40};
	var markers = [];

	var map = new google.maps.Map(document.getElementById('map'), {
	center: bourges,
	zoom: 4,
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
		clearMarkers();
	    marker = new google.maps.Marker({
	        position: location, 
	        map: map
	    });
	    markers.push(marker);
	}
	// Sets the map on all markers in the array.
	function setMapOnAll(map) {
	for (var i = 0; i < markers.length; i++) {
	markers[i].setMap(map);
	}
	}

	// Removes the markers from the map, but keeps them in the array.
	function clearMarkers() {
	setMapOnAll(null);
	}

	// Shows any markers currently in the array.
	function showMarkers() {
	setMapOnAll(map);
	}

	// Deletes all markers in the array by removing references to them.
	function deleteMarkers() {
	clearMarkers();
	markers = [];
	}


}