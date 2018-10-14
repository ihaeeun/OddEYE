<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<style>
		#map{
			height: 400px;
			width: 100%;
		}
	</style>
</head>
<body>
	<div class="header">
		<a href="search.php">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;OddEYE</a>
		<div style="float:right">
		<a href='logout.php'>logout</a>
		</div>
	</div>
	<div id="map"></div>
	<script>
		function initMap(){
			var loc = {lat: 37.567335, lng: 126.9784698};
			var map = new google.maps.Map(document.getElementById('map'), {zoom: 15, center: loc});
			var marker = new google.maps.Marker({position: loc, map: map});
		}
	</script>
	<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCtgW5uTfwdyeZMI3m9JexCitrq-hwfWys&callback=initMap"></script>
</body>
</html>