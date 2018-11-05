<html>
  <head>
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
  </head>
  <body>
    <div id="top_x_div" style="width: 900px; height: 500px;"></div>
  </body>
</html>