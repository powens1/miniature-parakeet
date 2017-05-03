<?php
  session_start();
?>
<?php
if ($_SESSION["username"] == "admin" && $_SESSION["password"] == "admin")
{
include 'dbconnect.php'; 
$sql = "select * from inventory_items where id = " . $_REQUEST['id'];
if (!$result = $mysqli->query($sql)) {
 echo "Error: SQL Error:</br>";
 echo "Errno: " . $mysqli->connect_errno . "</br>";
 echo "Error: " . $mysqli->error . "</br>";
 exit;
}
$row = $result->fetch_assoc();

  echo "";
}
else
{
  header("Location: loginpage.htm");
  exit();
}

?>
<html>
<body style="background-color:#FDF5E6;">
<h1>
 <center>Edit Item</center>
</h1>
</body>
</html>
<center>
<form style="background-color:#FDF5E6" action="editinventorysrv.php">
<input type = "hidden" name="inventory_id" value = "<?php echo $row["id"]?>"/>
<div>
Name:<select name="name">
<option value=<?php echo $row["name"]?>>"<?php echo $row["name"]?>"</option>
<option value="HDD">HDD</option>
<option value="VGA Cable">VGA Cable</option>
<option value="HDMI Cable">HDMI Cable</option>
</select>
</div>
Model:<input type="text" name="model" value="<?php echo $row["model"]?>"/></br>
Serial Number:<input type="text" name="sn" value="<?php echo $row["sn"]?>"/></br>
Amount:<input type="int" name="amount" value="<?php echo $row["amount"]?>"/></br>
Employee ID:<input type="int" name="employee_id"/><br>
<input type="submit"/> 
</form>
</center>

