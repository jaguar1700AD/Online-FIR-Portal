<?php
include 'db_connection.php';
 

//taking the form variables for the fir


$name = $_POST['uname'];
$password = $_POST['psw'];




$sql = "SELECT * from Users WHERE Name = '$name' AND Password = '$password'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
        //found a user

    while($row = $result->fetch_assoc()) {
        //accessing variables  
        //echo "Name: " . $row["Name"]. " - Password: " . $row["Password"]. " <br>";
        session_start();
        $_SESSION["user_name"] = $row["Name"];	
        $_SESSION["user_phone"] = $row["Phone"];
        $_SESSION["designation"] = $row["Designation"]; 
        $_SESSION["category"] = $row["Category"]; 
        $_SESSION["authenticated"] = 1;

        $_SESSION["murder"] = 307;
        $_SESSION["robbery"] = 378;
        $_SESSION["land issue"] = 044;

           include('fir_template.php');
    }

} 



else {

    echo "Incorrect credentials.";
}



$conn->close();


?>