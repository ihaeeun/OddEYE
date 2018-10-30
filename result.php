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
		<?php 
			$fp = fopen("result/data.json", "r");
			if(!$fp){ echo ("error"); }
			$fr = fread($fp, filesize("result/data.json"));
			echo("$fr")
		?>
		<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    	<script type="text/javascript" language="javascript">
			google.charts.load('current', {'packages':['line']});
      		google.charts.setOnLoadCallback(drawChart);
			function drawChart() {
				var data = new google.visualization.DataTable();
				data.addColumn('rate', 'model');
				data.addColumn('rate', 'model_name');
							
				var model = new Array(<?= json_encode($model) ?>);
				var rate = new Array(<?= json_encode($rate) ?>);

				for(var i=0; i<model.length; i++){
					data.addRows([[model[i], rate[i]]]);
				}
				
				var options = {
					chart: { title: '차종조회결과' },
					width: 900,
					height: 500
				};															
				
				var chart = new.google.charts.Line(document.getElementById('linechart_material'));
				chart.draw(data, google.charts.Line.convertOptions(options));
			}
		</script>
	</div>
	
</body>
</html>
