<!DOCTYPE html>
<html>
<body>
<div align="center">
<link rel="stylesheet" href="styles.css">

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<nav class="navbar navbar-expand-sm bg-dark navbar-dark" >
 <?php
       if(isset($_SESSION["designation"]))
       {
      if($_SESSION["designation"] == "Citizen")
     {
     echo "<a class='navbar-brand' href='citizen_fir.php'>Submitted FIRS</a>"  ;    
     }
      else{
  echo "<a class='navbar-brand' href='fir_list.php'>Submitted FIRS</a>"        ;
      }  
       }
      

 ?>
  <a class="navbar-brand" align = "right" href="my_profile.php">My Profile</a>
  <a class="navbar-brand" align = "right" href="logout.php">Logout</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
</nav>
 <h2> FIR </h2>

<div class="col-sm-4">

<?php

if(isset($_GET['submitted']))
{
if($_GET['submitted'])

{
  echo '
<div class="alert alert-success" role="alert">
  FIR Submitted Successfully!!
</div>';
}
}

?>

<form action="fir.php" style="margin:0 auto" method="post">

   <!--For name of the complainer-->
    <div class="row">
      <div class="col-25">
        <label for="fname">Name</label>
      </div>
      <div class="col-75">
       <input type="text" id="name" name="name" placeholder="Your name.." required>
      </div>
    </div>

    <!--For the age of complainer-->
    <div class="row">
      <div class="col-25">
        <label for="lname">Age:</label>
      </div>
      <div class="col-75">
       <input type="text" id ="age" name="age" placeholder="Your age.." required>
      </div>
    </div>

    <!--For the address of the complainer-->
    <div class="row">
      <div class="col-25">
        <label for="address"> Address: </label>
      </div>
      <div class="col-75">
       <input type="text" id ="address" name="address" placeholder="Your address.." required>
      </div>
    </div>

    <!--For the complaint-->
    <div class="row">
      <div class="col-25">
        <label for="complaint">Complaint</label>
      </div>
      <div class="col-75">

         <select name="complaint">
        <option value="murder">murder</option>
       <option value="robbery">robbery</option>
       <option value="land issue">land issue</option>
       </select>
      </div>
    </div>


<!--for the date of incident-->
        <div class="row">
      <div class="col-25">
        <label for="dateofincident">Date of Incident</label>
      </div>
      <div class="col-75">
       <input type="date" id ="date" name="date" required >
      </div>
    </div>


<!--for the time of the incident-->
        <div class="row">
      <div class="col-25">
        <label for="">Incident Time</label>
      </div>
      <div class="col-75">
        <input type="time" id="time" name="time" required>
 
      </div>	
    </div>
                      

    <div class="col-sm-4" style="text-align: center;">
    <div class="col-sm-4" style="display: inline-block;">
      <button type="submit" class="btn btn-info">Submit FIR</button>
    </div>

  
  </form>
</div>

</body>
</html>
