<!DOCTYPE html>
<html>
<head>
	<title>FIR List</title>
	<style>
  		table {
   		border-collapse: collapse;
   		width: 100%;
   		font-family: Arial;
   		font-size: 25px;
   		text-align: left;
     	} 
  		th {
    	}
 	</style>
</head>
<body>
	<table>
		<tr>
			<th>FID</th>
			<th>Complaint</th>
			<th>Date of Incident</th>
			<th>Time of Incident</th>
			<th>Registration Time</th>
			<th>Status</th>
			<th>View</th>
		</tr>
<link rel="stylesheet" href="styles.css">

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<nav class="navbar navbar-expand-sm bg-dark navbar-dark" >
 <a class="navbar-brand" href="fir_list.php">My FIRs</a>
  <a class="navbar-brand" align = "right" href="logout.php">Logout</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
</nav>
		<?php
		include 'db_connection.php';
        
		session_start();

		$sql = "SELECT * FROM FIR WHERE CPhone = ".$_SESSION['user_phone'] ." OR Complaint = '".$_SESSION["category"]."' ORDER BY RegistrationTime";
		//echo $sql;
		$result = $conn->query($sql);
		echo "<div align='center'><h1>LIST OF FIRS</h1></h1></div>";
		if ($result->num_rows > 0) {
		   	// output data of each row
		   	while($row = $result->fetch_assoc()) {
		   		if((($row["Status"] == 1 || $row["Status"] == 0) && $_SESSION["designation"]=="SI") || ($row["Status"] == 0 && $_SESSION["designation"] == "ASI"))
		        		{
		   	        		if( ($row["Status"] !=2  && $_SESSION["designation"] == "ASI") or ($row["Status"] !=2 && $_SESSION["designation"] == "SI") or ($row["CPhone"] == $_SESSION["user_phone"])) {
		  				  echo "<tr><td>" .$row["FID"]. "</td><td>" . $row["Complaint"] . "</td><td>" . $row["IncidentDate"]. "</td><td>" . $row["IncidentTime"] . "</td><td>" . $row["RegistrationTime"] . "</td><td>" . '<a href="status_change.php?passFID='.$row["FID"].'">' ."Approve". '</a></td><td>' . '<a href="viewFIR.php?passFID='.$row["FID"].'">View FIR</a>' . "</td></tr>";
		  				}
		        		}
		     		else{
		   					 echo "<tr><td>" .$row["FID"]. "</td><td>" . $row["Complaint"] . "</td><td>" . $row["IncidentDate"]. "</td><td>" . $row["IncidentTime"] . "</td><td>" . $row["RegistrationTime"] . "</td><td>"   ."Approved". '</td><td>' . '<a href="viewFIR.php?passFID='.$row["FID"].'">View FIR</a>' . "</td></tr>";
		   				}
			
				}
			echo "</table>";
		

		} 


		else { 
		echo "0 results"; 
		}
		$conn->close();
		?>

		
	</table>
</body>
</html>