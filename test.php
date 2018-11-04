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
	</div>
	<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawStuff);

      function drawStuff() {
        var data = new google.visualization.arrayToDataTable([
          ['Model', 'Accuracy'],
          ["avante2016ad", 0.87631],
          ["grandeur 2012", 0.08667],
          ["k52016sx", 0.02673],
          ["genesis", 0.00511],
          ["grandeur2016hg", 0.00511]
        ]);

        var options = {
          title: 'Reslut of vehicle type analysis',
          width: 900,
          legend: { position: 'none' },
          chart: { title: 'Result',
                   subtitle: 'Tensorflow' },
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
	    <div id="top_x_div" style="width: 900px; height: 500px; margin: auto;"></div>
</body>
</html>