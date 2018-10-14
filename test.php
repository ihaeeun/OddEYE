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
			$fp = fopen("result/test.txt", "r");
			if(!$fp){ echo ("error"); }
			while(!feof($fp)){
				$str=fgets($fp, 10000);
				$arr[]=$str;
			}

			for($i=0; $i<sizeof($arr); $i++){
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
			echo("$ratej");
		?>
		<!--<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    	<script type="text/javascript" language="javascript">
			google.charts.load('current', {'packages':['line']});
      		google.charts.setOnLoadCallback(drawChart);
			function drawChart() {							
				//var model = new Array(<?= json_encode($model) ?>);
				//var rate = new Array(<?= json_encode($rate) ?>);
				var model = new <?= $modelj ?>;
				var rate = new <?= $ratej ?>;
				var data = new google.visualization.DataTable();
				data.addColumn('string', 'Model');
				data.addColumn('number', 'Accuracy');
				for (var i=0; i<model.length; i++){
					data.addRows([
						model[i].Model, 
						rate[i].Accuracy,
					]);
				}
				var options = {
					chart: { title: '차종조회결과' },
					width: 900,
					height: 500
				};	
				var chart = new.google.charts.Line(document.getElementById('linechart_material'));
				chart.draw(data, google.charts.Line.convertOptions(options));
			}
		</script>-->
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawStuff);

      function drawStuff() {
        var data = new google.visualization.arrayToDataTable([
          ['Opening Move', 'Percentage'],
          ["King's pawn (e4)", 44],
          ["Queen's pawn (d4)", 31],
          ["Knight to King 3 (Nf3)", 12],
          ["Queen's bishop pawn (c4)", 10],
          ['Other', 3]
        ]);

        var options = {
          title: 'Chess opening moves',
          width: 900,
          legend: { position: 'none' },
          chart: { title: 'Chess opening moves',
                   subtitle: 'popularity by percentage' },
          bars: 'horizontal', // Required for Material Bar Charts.
          axes: {
            x: {
              0: { side: 'top', label: 'Percentage'} // Top x-axis.
            }
          },
          bar: { groupWidth: "90%" }
        };

        var chart = new google.charts.Bar(document.getElementById('top_x_div'));
        chart.draw(data, options);
      };
    </script>
	</div>
	
</body>
</html>