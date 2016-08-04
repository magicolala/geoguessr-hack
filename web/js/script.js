function initialize() {
	var fenway = {lat: {{ ville.lat }}, lng: {{ ville.lon }}};
	var chartres = {lat: 48.443854, lng: 1.489012};
	var markers = [];
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
	  function setMapOnAll(map) {
  for (var i = 0; i < markers.length; i++) {
    markers[i].setMap(map);
  }
}

	  function clearMarkers() {
	    setMapOnAll(null);
		markers = [];
	  }

	google.maps.event.addListener(map, 'click', function(event) {
		placeMarker(event.latLng);
	});

	function placeMarker(location) {
		clearMarkers();
	    var marker = new google.maps.Marker({
	        position: location,
	        map: map
	    });
		markers.push(marker);
	}
}
