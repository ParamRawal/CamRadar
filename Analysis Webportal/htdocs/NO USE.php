<?php
$connect = mysqli_connect('localhost', 'root', '', 'criminals_detect');
$query = "SELECT Detected, count(*) as number FROM detect GROUP BY Name";
$result = mysqli_query($connect, $query);
//if($result){
 //echo "CONNECTED";
//}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
   


<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Detected', 'Name'],
              <?php

                        while($row = mysqli_fetch_array($result))
                        {

                            echo "['".$row['Name']."', '".$row['Detected']."]";

                        }

                ?>

          
        ]);

        var options = {
          title: 'My Daily Activities'
          
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
