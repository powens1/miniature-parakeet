<?php
  session_start();
?>
<?php
if ($_SESSION["username"] == "admin" && $_SESSION["password"] == "admin")
{
$mysqli = new mysqli('127.0.0.1', 'root', '', 'Inventory');
if ($mysqli->connect_errno) {
 echo "Error: Failed to make a MySQL connection, here is why: </br>";
 echo "Errno: " . $mysqli->connect_errno . "</br>";
 echo "Error: " . $mysqli->connect_error . "</br>";
 exit;
}
$sql= "select * from employees";


if (!$result = $mysqli->query($sql)) {
 echo "Error: Failed to make a MySQL connection, here is why: </br>";
 echo "Errno: " . $mysqli->connect_errno . "</br>";
 echo "Error: " . $mysqli->error . "</br>";
 exit;
}
echo "<style>";
echo "tr:hover{background-color:#A9A9A9}";
echo "body {background-color: #FDF5E6}";
echo "</style>";
echo "<h1>";
echo "<center>";
echo "Citadel ITS Employees";
echo "</center>";
echo "</h1>";
echo "<a href='logoffsrv.php'>Logoff</a>";
echo "<table border=1>";
echo "<tr><th>Employee ID</th><th>First Name</th><th>Last Name</th></tr>";
while($row = $result->fetch_assoc()){
 echo "<tr>";
  
  echo "<td>";
    echo $row["id"];
  echo "</td>";
  
  echo "<td>";
    echo $row["fn"];
  echo "</td>";
  
  echo "<td>";
    echo $row["ln"];
  echo "</td>";

 echo "</tr>";
}
}
else
{
  header("Location: loginpage.htm");
  exit();
}
//var_dump($row);
?>
</table>
<br>
<a href="inventory.php">Inventory</a><br>
<a href="records.php">Records</a><br>