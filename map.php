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
	<?php
	$fp = fopen("log/test.log", "r");
	if(!$fp){ echo("error");}
	while(!feof($fp)){
		$str = fgets($fp, 20);
		$gps[] = $str;
	}
	fclose($fp);	
	?>
	<script>
		function initMap(){
			//var gps = new Array();
			//gps = <?php echo json_encode($gps)?>
			//var loc = {lat: gps[0], lng: gps[1]};
			var loc = {lat: 37.567335, lng: 126.9784698};
			var map = new google.maps.Map(document.getElementById('map'), {zoom: 15, center: loc});
			var marker = new google.maps.Marker({position: loc, map: map});
			for(var i=0; i<gps.length; i++){
				document.write(gps[i] + "<br>");
			}
		}
	</script>
	<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCtgW5uTfwdyeZMI3m9JexCitrq-hwfWys&callback=initMap"></script>
</body>
</html>