<?php
  session_start();
?>

<?php
if ($_SESSION["username"] == "admin" && $_SESSION["password"] == "admin")
{
if ($_REQUEST["id"] != null )
{
include 'dbconnect.php';
$sql = "insert into inventory_items (name,model,sn,amount) values (" .
 "'" . $_REQUEST["name"] ."'," .
 "'" . $_REQUEST["model"] ."'," .
 "'" . $_REQUEST["sn"] ."'," .
 "'" . $_REQUEST["amount"] . "')";

if (!$result = $mysqli->query($sql)) {
echo "Error: SQL Error:</br>";
echo "Errno: " . $mysqli->connect_errno . "</br>";
echo "Error: " . $mysqli->error . "</br>";

exit;
}


$sql = "insert into inventory_edit(employee_id,inventory_name,inventory_sn) values (" . 
  "'" . $_REQUEST["id"] ."'," . 
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