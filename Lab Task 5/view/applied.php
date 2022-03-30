

<?php
session_start();

if(isset($_SESSION['username'])){


}
else{

    header('location: login.php');
}

?>



<!DOCTYPE html>
<html>



<style>
.error {color: #394393;}


</style>

<?php

    

    if(!empty($_POST["appointmentDate"])){


        $q=$_GET["q"];
        $q1=$_POST["appointmentDate"];


        $data = file_get_contents("doctor.json");  

        $data = json_decode($data, true);  

        foreach($data as $row)  
        {  
           if($_GET['q']==$row["Email"])
           {  

              $name=$row["Name"];
              $email=$row["Email"];
              $speciality=$row["speciality"];
              $schedule=$row["schedule"];
              $gender=$row["gender"];
              $appontmentDate=$q1;
              
              
               
            }
        }



        $current_data = file_get_contents('appointment.json');  
        $array_data = json_decode($current_data, true); 




         
        $extra = array(  
             'Name'               =>     $name,  
             'Email'             =>     $email,
             'speciality'        =>     $speciality,  
             'schedule'         =>     $schedule, 
             'gender'           =>     $gender,
             'Appontment Date'  =>     $appontmentDate,
        );  

        
        $array_data[] = $extra;  
        $final_data = json_encode($array_data);  
        if(file_put_contents('appointment.json', $final_data))  
        {  
             $message = " <label class='text-success'>File Appended  Success fully</p>"; 
             header('location:history.php');

        }    
        else  
        {  
            $error = 'JSON File not exits';  
        } 

    }
    else
        header('location:getAppointment.php');

    


 ?>

<body>

</body>



  </html>