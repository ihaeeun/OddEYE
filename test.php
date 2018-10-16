<?php
session_start(); // 세션
include ("connectb.php"); // DB접속

$key=$_POST['key'];
$query = "select * from image where file_name='$key'";
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
			<?php echo("<img src='".$row['file_path'].$row['file_name']."' width='400'>	"); ?>	
		</div>
	</div>
	<div>
		<?php 
			$fp = fopen("result/json.txt", "r");
			if(!$fp){ echo ("error"); }
			#while(!feof($fp)){
			#	$str=fgets($fp, 10000);
			#	$arr[]=$str;
			#}
			$fr = fread($fp, filesize("result/json.txt"));
			echo("$fr")
			/*for($i=0; $i<sizeof($arr); $i++){
				if($i%2==0){ 
					$model[] = array('Model'=> $arr[$i]);
					#$model[$i] = $arr[$i]; 
					#$model[] = preg_replace('/\r\n|\r|\n/','',$model[$i]);
				}
				else{ 
					$rate[] = array('Accuracy'=> $arr[$i]);
					#$rate[$i] = preg_replace('/\r\n|\r|\n/','',$rate[$i]);
				}
			}
			for($j=0; $j<sizeof($model); $j++){
				$model[$j] = preg_replace('/\r\n|\r|\n/','',$model[$j]);
				$rate[$j] = preg_replace('/\r\n|\r|\n/','',$rate[$j]);
			}
			fclose($fp);
			$modelj = json_encode($model);
			$ratej = json_encode($rate);
			
			echo("$modelj<br><br>");
			echo("$ratej")*/
		?>
		<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    	<script type="text/javascript" language="javascript">
			//var result = '<?= $fr ?>';
			//alert(result);
			google.charts.load('current', {'packages':['bar']});
      		google.charts.setOnLoadCallback(drawStuff);
			function drawChart() {
				var result = '<?= $fr ?>';

				//Use getJSON and process the file contents in the callback function
				$.getJSON(result + '.json', function(obj) {

					var data = google.visualization.arrayToDataTable(obj);

					var options = {
						title: 'Chart Demo'
					};

					var chart = new google.visualization.LineChart(document.getElementById('chart_div'));
					chart.draw(data, options);
				});
			}
		</script>

	</div>
	
</body>
</html>