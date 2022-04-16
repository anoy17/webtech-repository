

<?php
    session_start();

    if(isset($_SESSION['username'])){


    }
    else{

        header('location: login.php');
    }


    require_once '../controller/readData.php';
    $row = fetchUsers($_SESSION['username']);

?>
<!DOCTYPE html>
<html>
<style>


</style>
<head>
    <title>Profile</title>
</head>

 <?php include('header2.php')?>



 <?php


    

             echo "<fieldset><legend>Profile Name </legend> <h3>".$row["Name"]."</h3></fieldset>";

             echo "<fieldset><legend>Email Address </legend> <h3>".$row["Email"]."</h3></fieldset>";

             echo "<fieldset><legend>User Name </legend><h3> ".$row["User_Name"]."</h3></fieldset>";

             echo "<fieldset><legend>Date of Birth </legend><h3> ".$row["Dob"]."</h3></fieldset>";

             echo "<fieldset><legend>Gender </legend><h3> ".$row["Gender"]."</h3></fieldset>";





 
?>


<body>





</body>


  <?php include('footer.php')?>

  </html>