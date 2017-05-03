<?php
  session_start();
?>

<?php
if ($_SESSION["username"] == "admin" && $_SESSION["password"] == "admin")
{
include 'dbconnect.php';
$sql = "update inventory_items set ";
$sql .= "name = '" . $_REQUEST["name"] ."'," ;
$sql .= "model = '" . $_REQUEST["model"] ."'," ;
$sql .= "sn = '" . $_REQUEST["sn"] ."', ";
$sql .= "amount = '" . $_REQUEST["amount"] ."' " ;
$sql .= "where id = " . $_REQUEST['inventory_id'];


if (!$result = $mysqli->query($sql)) {
 echo "Error: SQL Error:</br>";
 echo "Errno: " . $mysqli->connect_errno . "</br>";
 echo "Error: " . $mysqli->error . "</br>";
 exit;
}


$sql = "insert into inventory_edit(employee_id,inventory_name,inventory_sn) values (" . 
  "'" . $_REQUEST["employee_id"] ."'," .
  "'" . $_REQUEST["name"] ."'," . 
  "'" . $_REQUEST["sn"] . "')";

if (!$result = $mysqli->query($sql)) {
echo "Error: SQL Error:</br>";
echo "Errno: " . $mysqli->connect_errno . "</br>";
echo "Error: " . $mysqli->error . "</br>";

exit;
}


$sql = "update inventory_edit
set employee_name = 'John'
where employee_id = 111";

if (!$result = $mysqli->query($sql)) {
echo "Error: SQL Error:</br>";
echo "Errno: " . $mysqli->connect_errno . "</br>";
echo "Error: " . $mysqli->error . "</br>";

exit;
}


$sql = "update inventory_edit
set employee_name = 'Sally'
where employee_id = 222";

if (!$result = $mysqli->query($sql)) {
echo "Error: SQL Error:</br>";
echo "Errno: " . $mysqli->connect_errno . "</br>";
echo "Error: " . $mysqli->error . "</br>";

exit;
}


$sql = "update inventory_edit
set employee_name = 'Sarah'
where employee_id = 333";

if (!$result = $mysqli->query($sql)) {
echo "Error: SQL Error:</br>";
echo "Errno: " . $mysqli->connect_errno . "</br>";
echo "Error: " . $mysqli->error . "</br>";

exit;
}
}
else
{
  header("Location: loginpage.htm");
  exit();
}
?>
<script>
window.location='inventory.php';
</script>