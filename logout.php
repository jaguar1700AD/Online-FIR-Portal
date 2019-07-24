<?php
include 'db_connection.php';
 
 session_start();
 session_unset();
 $_SESSION["authenticated"] = 0;
 $_SESSION=[];
 session_destroy();

 header("Location:index.html");

?>									