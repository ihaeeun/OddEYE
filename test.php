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
			$fp = fopen("result/data.json", "r");
			if(!$fp){ echo ("error"); }
			#while(!feof($fp)){
			#	$str=fgets($fp, 10000);
			#	$arr[]=$str;
			#}
			$fr = fread($fp, filesize("result/data.json"));
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
    	<script type="text/javascript" language="javascript"></script>
<!--			//var result = '<?= $fr ?>';
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
			}*/
			// set the dimensions of the canvas-->
		<script src="http://d3js.org/d3.v3.min.js"></script>

		<script>
		// set the dimensions of the canvas
		var margin = {top: 20, right: 20, bottom: 70, left: 40},
			width = 600 - margin.left - margin.right,
			height = 300 - margin.top - margin.bottom;
		// set the ranges
		var x = d3.scale.ordinal().rangeRoundBands([0, width], .05);
		var y = d3.scale.linear().range([height, 0]);
		// define the axis
		var xAxis = d3.svg.axis()
			.scale(x)
			.orient("bottom")
		var yAxis = d3.svg.axis()
			.scale(y)
			.orient("left")
			.ticks(10);
		// add the SVG element
		var svg = d3.select("body").append("svg")
			.attr("width", width + margin.left + margin.right)
			.attr("height", height + margin.top + margin.bottom)
		  .append("g")
			.attr("transform", 
				  "translate(" + margin.left + "," + margin.top + ")");
		// load the data
		d3.json("result/data.json", function(error, data) {
			data.forEach(function(d) {
				d.model = d.model;
				d.accuracy = +d.accuracy;
			});

		  // scale the range of the data
		  x.domain(data.map(function(d) { return d.model; }));
		  y.domain([0, d3.max(data, function(d) { return d.accuracy; })]);
		  // add axis
		  svg.append("g")
			  .attr("class", "x axis")
			  .attr("transform", "translate(0," + height + ")")
			  .call(xAxis)
			.selectAll("text")
			  .style("text-anchor", "end")
			  .attr("dx", "-.8em")
			  .attr("dy", "-.55em")
			  .attr("transform", "rotate(-90)" );
		  svg.append("g")
			  .attr("class", "y axis")
			  .call(yAxis)
			.append("text")
			  .attr("transform", "rotate(-90)")
			  .attr("y", 5)
			  .attr("dy", ".71em")
			  .style("text-anchor", "end")
			  .text("Frequency");
		  // Add bar chart
		  svg.selectAll("bar")
			  .data(data)
			.enter().append("rect")
			  .attr("class", "bar")
			  .attr("x", function(d) { return x(d.model); })
			  .attr("width", x.rangeBand())
			  .attr("y", function(d) { return y(d.accuracy); })
			  .attr("height", function(d) { return height - y(d.accuracy); });
		});
		</script>

	</div>
	
</body>
</html>