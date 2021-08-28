<?php 

$dbhandle = new mysqli('localhost','root','','criminals_detect');
echo $dbhandle->connect_error;

$query = "SELECT Name, sum(Detect) FROM detect group by Name";
$res = $dbhandle->query($query);

?>
<html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Name', 'Detect'],
          
          <?php 
while($row=$res->fetch_assoc())
{
    echo "['".$row['Name']."',".$row['sum(Detect)']."],";
}

          ?>

        ]);

        var options = {
          title: 'Criminals Detected ',
          is3D:true,
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>
  </head>
  <body>
    <div id="piechart" style="width: 900px; height: 500px;"></div>
  </body>
</html>
