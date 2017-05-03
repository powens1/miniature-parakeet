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
$sql= "select * from inventory_edit";


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
echo "Citadel ITS Records";
echo "</center>";
echo "</h1>";
echo "<a href='logoffsrv.php'>Logoff</a>";
echo "<table border=1>";
echo "<tr><th>Employee ID</th><th>Employee Name</th><th>Inventory Name</th><th>Inventory SN</th><th>Date Modified</th></tr>";
while($row = $result->fetch_assoc()){
 echo "<tr>";
  
  echo "<td>";
    echo $row["employee_id"];
  echo "</td>";
  
  echo "<td>";
    echo $row["employee_name"];
  echo "</td>";
  
  echo "<td>";
    echo $row["inventory_name"];
  echo "</td>";
  
  echo "<td>";
    echo $row["inventory_sn"];
  echo "</td>";
  
  echo "<td>";
    echo $row["date_added"];
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
<a href="employees.php">Employees</a><br>
<form action="recordsearchsrv.php">
  <input type="search" placeholder="Search Employee ID" name="recordsearch">
  <input type="submit">
</form>