<?php

//connection variables  
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "FIR_DATABASE";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if ($conn) {
    //echo("Connection ok<br>");
} 

else
{
	 die("Connection failed due to 	");
}	

?>