<!DOCTYPE html>
<html>
<head>
	<title>Status Change</title>
</head>
<body>

<?php
	include 'db_connection.php';
	session_start();

	$FID = $_GET["passFID"];
	$sql = "SELECT * FROM FIR WHERE FID = '".$FID ."' ";
	$result = $conn->query($sql);
	if ($row = $result->fetch_assoc()) {
		if ($_SESSION["designation"] == "Citizen"){
			echo "You are not allowed to change the status.";
		}
		elseif ($_SESSION["designation"] == "ASI"){
			$query_asi = "UPDATE FIR SET Status = '1' WHERE FID = ".$FID;
			$conn->query($query_asi);
			echo "You have approved the FIR.";
		}
		elseif ($_SESSION["designation"] == "SI"){
			$query_si = "UPDATE FIR SET Status = '2' WHERE FID = ".$FID;
			$conn->query($query_si);
			echo "You have approved the FIR.";
		}
	}	
	?>

</body>
</html>