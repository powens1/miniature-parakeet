<?php
  session_start();
?>

<?php
if ($_SESSION["username"] == "admin" && $_SESSION["password"] == "admin")
{

include 'dbconnect.php';
echo $_REQUEST['recordsearch'];
$query = "select * from inventory_edit where employee_id like " . $_REQUEST['recordsearch'];

if (!$result = $mysqli->query($query)) {
echo "Error: SQL Error:</br>";
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
echo "Searched Records";
echo "</center>";
echo "</h1>";
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
?>
<a href="records.php">Back to Records</a>