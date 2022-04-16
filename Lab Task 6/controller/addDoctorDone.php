<?php
session_start();
?>



<?php


     require_once '../model/model.php';


     $data['Name']                     =     $_SESSION['name1'];
     $data['Email']                    =     $_SESSION['email1'];
     $data['Speciality']               =     $_SESSION['speciality1'];
     $data['Schedule']                 =     $_SESSION['schedule1'];  
     $data['Gender']                   =     $_SESSION['gender1'];
     $data['Dob']                      =     $_SESSION['dob1'];  
     $data['User Name']                =     $_SESSION['username1'];  
     $data['Password']                 =     $_SESSION['pass1'];


    if (addDoctors($data)) {
          header('location:../view/addDoctorConfirm.php');
        //echo 'Successfully added!!';
    } else {
        echo 'You are not allowed to access this page.';    
    }
               
?>

