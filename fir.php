<?php
include 'db_connection.php';
 
 session_start();
session_regenerate_id();
if(isset($_SESSION["user_name"]) && $_SESSION["authenticated"]==1)
{

//taking the form variables for the fir
echo $_SESSION["user_name"];


$name = $_POST['name'];
$age = $_POST['age'];
$address = $_POST['address'];
$complaint = $_POST['complaint'];
$incidentDate=$_POST['date'];
$incidentTime =$_POST['time'];
$registrationTime =date('Y-m-d H:i:s');
$Cphone=$_SESSION["user_phone"];
$status="0";


$query= "INSERT INTO FIR VALUES ('0','$name','$age','$address','$complaint','$incidentDate','$incidentTime','$registrationTime','$Cphone','$status')";
mysqli_query($conn, $query) or die (mysqli_error($conn));
header("location:fir_template.php?submitted=succesfully");
 
}
else
{
	echo "you are not authenticated to view this page";
}

?>