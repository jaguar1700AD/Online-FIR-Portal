<?php
include 'db_connection.php';

//taking the form variables for the fir


$phone = $_POST['phone'];
$name = $_POST['name'];
$password = $_POST['psw'];
$designation = $_POST['designation'];
$category = $_POST['Category'];

$userCheck = "SELECT * FROM Users WHERE Name='$name'";

$result = $conn->query($userCheck);

if ($result->num_rows > 0) {
     echo "username already exists";
}
else{
	$query= "INSERT INTO Users VALUES ('$phone','$name','$password','$designation','$category')";
mysqli_query($conn, $query) or die (mysqli_error($conn));
echo "Signup Successful";
 header("location:index.html");

}



?>