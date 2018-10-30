// JavaScript Document
google.load('visualization', '1', {'packages':['corechart']});

google.setOnLoadCallback(drawChart);

function drawChart(){
	var jsonData = $.ajax({
		url: "result/data.json",
		dataType: "json",
		async: false
	}).responseText;
	
	var data = new google.visualizaion.DataTable(jsonData);
	
	var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
	chart.draw(data, {width: 400, height: 240});
}