<?php
session_start();
?>



<?php


     require_once '../model/model.php';


     $data['Name']                     =     $_SESSION['name2'];
     $data['Email']                    =     $_SESSION['email2'];
     $data['Schedule']                 =     $_SESSION['schedule2'];  
     $data['Gender']                   =     $_SESSION['gender2'];
     $data['Dob']                      =     $_SESSION['dob2'];  
     $data['User Name']                =     $_SESSION['username2'];  
     $data['Password']                 =     $_SESSION['pass2'];


    if (addNurses($data)) {
          header('location:../view/addNurseConfirm.php');
        //echo 'Successfully added!!';
    } else {
        echo 'You are not allowed to access this page.';    
    }
               
?>