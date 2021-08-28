<!DOCTYPE html>
<html>
<head>
 <title>Table with database</title>
 <style>
  table {
   border-collapse: collapse;
   width: 100%;
   color: #588c7e;
   font-family: monospace;
   font-size: 25px;
   text-align: left;
     } 
  th {
   background-color: #588c7e;
   color: white;
    }
  tr:nth-child(even) {background-color: #f2f2f2}
 </style>
</head>
<body>
  <h1>Criminals Detected</h1>
 <table>
 <tr>
  <th>Id</th> 
  <th>Name</th> 
  <th>Number of times detected</th>
 </tr>
 <?php
$conn = mysqli_connect("localhost", "root", "", "criminals_detect");
  // Check connection
  if ($conn->connect_error) {
   die("Connection failed: " . $conn->connect_error);
  } 
  $sql = "SELECT ID, Name, Detect FROM detect";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
   // output data of each row
   while($row = $result->fetch_assoc()) {
    echo "<tr><td>" . $row["ID"]. "</td><td>" . $row["Name"] . "</td><td>"
. $row["Detect"]. "</td></tr>";
}
echo "</table>";
} else { echo "0 results"; }
$conn->close();
?>
</table>
</body>
</html>