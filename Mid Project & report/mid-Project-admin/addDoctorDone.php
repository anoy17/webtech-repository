<?php
session_start();
?>

<!DOCTYPE html>
<html>

 <?php include('header2.php')?>

<style>
.error {color: #2BDE1A;}
</style>

<?php


    if(!empty($_SESSION['name1'])){



        $current_data = file_get_contents('doctor.json');  
        $array_data = json_decode($current_data, true);  
        $extra = array(  
             'Name'     		  =>     $_SESSION['name1'],  
             'Email'     		 =>     $_SESSION['email1'],
             'speciality'        =>     $_SESSION['speciality1'],  
             'schedule'         =>     $_SESSION['schedule1'],
             'User Name'      =>     $_SESSION['username1'],  
             'Password'     =>     $_SESSION['pass1'],
             'dob'     	  =>     $_SESSION['dob1'],  
             'gender'  =>     $_SESSION['gender1'],
        );  


        $_SESSION['name1']="";
        
        $array_data[] = $extra;  
        $final_data = json_encode($array_data);  
        if(file_put_contents('doctor.json', $final_data))  
        {  
             $message = " <label class='text-success'>File Appended  Success fully</p>"; 

        }    
    	else  
    	{  
    		$error = 'JSON File not exits';  
    	} 


    }


			
?>
 <h1 align="center" style="color: lightcoral;"><?php echo  "successfully completed ";?></h1>

<body>





</body>
<?php include('footer.php')?>
</html>