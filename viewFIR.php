

<!DOCTYPE html>
<html>
<head>
	<title>View FIR</title>
	<style>
  		table {
   		border-collapse: collapse;
   		width: 100%;
   		font-family: monospace;
   		font-size: 25px;
   		text-align: left;
     	} 
  		th {
   		background-color: #588c7e;
   		color: white;
    	}
  		
 	</style>
	<script>
		function work() {
			document.getElementById("print").style.visibility = "hidden";
			window.print();
			document.getElementById("print").style.visibility = "visible";
		}
	</script>
</head>
<body>
	<?php
	include 'db_connection.php';
	session_start();
	$FID = $_GET["passFID"];
	$sql = "SELECT * FROM FIR WHERE FID = '".$FID ."' ";
	$result = $conn->query($sql);
	if ($row = $result->fetch_assoc()) {
	
		echo "<div align='center'><h1><b>First Investigation Report</b></h1></div>";

		echo "<table>";
		echo "<tr><td><b>No:   </b></td><td>" . $row["FID"] . "</td><br></tr>";
		echo "<tr><td><b>Name: </b>      </td><td> " . $row["Name"] . "  </td></tr>";
		echo "<tr><td><b>Age:  </b>      </td><td>" . $row["Age"] ."     </td></tr>";
		echo "<tr><td><b>Address:  </b>  </td><td>" . $row["Address"] . "</td></tr>";
		echo "<tr><td><b>Complaint:</b>  </td><td>" . $row["Complaint"]."</td></tr>" ;
		echo "<tr><td><b>Section:  </b>  </td><td>" . $_SESSION[$row["Complaint"]]."</td></tr>";
		echo "<tr><td><b>Date of Incidence: </b></td><td>" . $row["IncidentDate"]."</td><td>";
		echo "<b>Time: </b></td><td>" . $row["IncidentTime"] ."</td></tr>";
		$rt = $row["RegistrationTime"];
		list($a, $b) = explode(" ", $rt);
		echo "<tr><td><b>Date of Registration: </b></td><td> " . $a . "</td><td>";
		echo "<b>Time: </b></td><td>" . $b ."</td></tr></table>";
		echo "<button id = 'print' onclick='work();'>Print</button>";
	}	
	?>

</body>
</html>