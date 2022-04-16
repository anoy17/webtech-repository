
<?php
session_start();
?>


<!DOCTYPE html>
<html>

 <?php include('header.php')?>

<style>
.error {color: #2BDE1A;}
</style>

<?php


     require_once '../model/model.php';


     $data['Name']                     =     $_SESSION['name'];
     $data['Email']                    =     $_SESSION['email']; 
     $data['Gender']                   =     $_SESSION['gender'];
     $data['Dob']                      =     $_SESSION['dob'];  
     $data['User Name']                =     $_SESSION['username'];  
     $data['Password']                 =     $_SESSION['pass'];


    if (addUsers($data)) {
          header('location:../view/registrationConfirm.php');
        //echo 'Successfully added!!';
    } else {
        echo 'You are not allowed to access this page.';    
    }
               
?>


<body>





</body>
<?php include('footer.php')?>
</html>