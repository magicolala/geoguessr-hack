<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Street View side-by-side</title>
    <style>
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
      #pano {
        height: 100%;
        width: 100%;
        position: absolute;
      }
      #map{
        float: right;
        width:30%;
        height:40%;
        position: relative;
        z-index: 10;
       }
	  #pano text {
		display: none;
	  }       
    </style>
  </head>
  <body>
    <div id="pano"></div>	
    <div id="map"></div>
    <script src="script.js" type="text/javascript" charset="utf-8" async defer></script>
    <script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCV4TwMSVgCpcNTOOEqi-jZOjlsHBi_omk&signed_in=true&callback=initialize">
    </script>
  </body>
</html>