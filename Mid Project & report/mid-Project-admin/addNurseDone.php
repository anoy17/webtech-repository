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


    if(!empty($_SESSION['name2'])){



        $current_data = file_get_contents('nurse.json');  
        $array_data = json_decode($current_data, true);  
        $extra = array(  
             'Name'     		  =>     $_SESSION['name2'],  
             'Email'     		 =>     $_SESSION['email2'], 
             'schedule'         =>     $_SESSION['schedule2'],
             'User Name'      =>     $_SESSION['username2'],  
             'Password'     =>     $_SESSION['pass2'],
             'dob'     	  =>     $_SESSION['dob2'],  
             'gender'  =>     $_SESSION['gender2'],
        );  


        $_SESSION['name2']="";
        
        $array_data[] = $extra;  
        $final_data = json_encode($array_data);  
        if(file_put_contents('nurse.json', $final_data))  
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