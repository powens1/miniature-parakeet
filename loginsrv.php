<?php
session_start();
?>

<html>
<body>

<?php
include 'dbconnect.php';
// Set session variables
$_SESSION["username"] = "" . $_REQUEST["username"];
$_SESSION["password"] = "" . $_REQUEST["password"];
if ($_SESSION["username"] == "admin" && $_SESSION["password"] == "admin")
{
  header("Location: inventory.php");
  exit();
}
else
{
    // remove all session variables
    session_unset(); 
    // destroy the session 
    session_destroy(); 
  echo "Invalid Login";

}

?>

</body>
</html>
