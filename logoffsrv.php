<?php
session_start();
?>
<?php   
// remove all session variables
    session_unset(); 
    // destroy the session 
    session_destroy(); 
?>
    <script>
      window.location='loginpage.htm';
    </script>