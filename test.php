<?php
session_start(); // 세션
include ("connect.php"); // DB접속

$key=$_POST['key'];
$query = "select * from IMAGE where FILE_NAME='$key'";
$result = mysqli_query($con, $query);
$row = mysqli_fetch_array($result);
?>
<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title><?php echo("$key");?></title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	
</head>

<body>
	<div class="header">
		<a href="search.php"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;OddEYE</a>
		<div style="float:right">
		<a href='logout.php'>logout</a>
		</div>
	</div>

	<div>
		<div align="center" >
			<?php echo("<img src='".$row['FILE_ROUTE'].$row['FILE_NAME']."' width='400'>	"); ?>	
		</div>
	</div>
	<div>
		<!--<?php 
			$fp = fopen("result/data.json", "r");
			if(!$fp){ echo ("error"); }
			$fr = fread($fp, filesize("result/data.json"));
			echo("$fr")
		?>-->
		<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
		<script type="test/javascript" src="reslut/data.json"></script>
    	<script type="text/javascript" language="javascript" src="javascript.js">
			google.charts.load('current', { 'packages':['bar']	});
			google.charts.setOnLoadCallback(drawStuff);
			var json = $.getJSON('result/data.json');
			var jsonp = JSON.parse(json);
			for(var i=0; i<json.model.length; i++){
				//var counter = jsonp.model[i];
				console.log(json.model);
			}
			/*function drawStuff(){
				var json = $.get.JSON('result/data.json');
				var jsonp = JSON.parse(json);
				var data = new google.visualization.arrayToDataTable([
					['Model', 'Accuracy'],
					[jsonp.cars[0].model, jsonp.cars[0].accuracy],
					[jsonp.cars[1].model, jsonp.cars[1].accuracy],
					[jsonp.cars[2].model, jsonp.cars[2].accuracy],
					[jsonp.cars[3].model, jsonp.cars[3].accuracy],
					[jsonp.cars[4].model, jsonp.cars[4].accuracy]
				]);
			}*/
/*			var data = new google.visualization.DataTable();
			data.addColumn('string', 'Model');
			data.addColumn('number', 'Accuracy');
			data.addColumn({type: "string", role: "tooltip"});
			data.addColumn({type: "stirng" role: "style"});
			
			var labels = [];
			for(var i=0; i<jsonData.length; i++){
				data.addRow([
					jsonData[i].model,
					jsonData[i].accuracy,
					jsonData[i].accuracy = "pages between" + jsonData[i].low + "and " + jsonData[i].high					
				]);
				labels.push(jsonData[i].low);
			}
			labels.push(jsonData[jsonData.length -1].high);
			
			var chart = new google.visulization.ColumnChart(document.getElementById('chartDiv'));
			chart draw(data, potions);*/
		</script>


	</div>
	
</body>
</html>