<!DOCTYPE html>
<html>
<head>
	<title>My Profile</title>
</head>
<body>
    <link rel="stylesheet" type="text/css" href="profile.css">

<?php
include 'db_connection.php';
 

//taking the form variables for the fir

session_start();
  echo "<div class='container' align = 'center'>";
  echo " <label> Username:  </label>".$_SESSION["user_name"]. "<br>";
 echo " <label>  Phone:  </label>".$_SESSION["user_phone"]. "<br>";
    echo " <label> Designation:  </label>".$_SESSION["designation"]. "<br>";
     echo " <label> Category:  </label>".$_SESSION["category"]. "<br>";
     echo "</div>"
?>
</body>
</html>

