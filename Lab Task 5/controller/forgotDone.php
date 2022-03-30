<?php
    session_start();

?>



<?php 
                $passwordErr="";
                $rePasswordErr="";
                $newpass="";
                $check=0;
                $msg="";


                if(isset($_POST['newPass']) && isset($_POST['rePass'])){

                    //password validation


                     if(empty($_POST["newPass"])){
                        $passwordErr=" must need to fill password";
                      }else
                        $newpass=test_input($_POST["newPass"]);


                      if(empty($_POST["rePass"])){
                        $rePasswordErr=" must need to re-type password";
                      }else
                        $renewpass=test_input($_POST["rePass"]);
                      
                      //echo $newpass;  
                      if (!preg_match("/^[0-9a-zA-Z@%#$]{8,}$/",$newpass)) {
                            $passwordErr = "UPassword must not be less than eight (8) characters contain at least one of the special characters (@, #, $, %)";
                            
                      }else if($_POST["newPass"]==$_POST["rePass"]){


                            $data = file_get_contents("info.json");  

                            $data = json_decode($data, true); 


                            foreach($data as $row => $value)  
                            {  
                                //echo $row;
                                //if($_SESSION['tempEmail']==$row["Email"])
                                if($value['Email']==$_SESSION['tempEmail'])
                                {  
                                    $data[$row]['Password'] = $_POST["newPass"];
                                    //echo 'success';
                                    $msg="Password has been changed";
                                    file_put_contents('info.json', json_encode($data));
                                    break;
                                    
                                }else
                                    //echo 'failed';
                                    $msg="sorry the password has not changed yet";
                                    

                            }
                             



                      }
                      else
                        $rePasswordErr="didn't macth the password ";
                }




                function test_input($data) {
                    $data = trim($data);
                    $data = stripslashes($data);
                    $data = htmlspecialchars($data);
                    return $data;
                }


?>

<!DOCTYPE html>

<html lang="en">
 <?php include('header.php')?>

<style>
.error {color: #FF0000;}
</style>

<center>
<span style="color: darkgreen;"><h1><?php echo $msg ?></h1></span>
<fieldset><p><br></p><p><br></p>
  <h1>PASSWORD RECOVERY</h1>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
		New Password:
        <input type="text"  name="newPass" /> <br><br>
        <span class="error">* <?php echo $passwordErr;?></span><br><br>

        Re-type Password:
        <input type="text"  name="rePass" /> <br><br>
        <span class="error">* <?php echo $rePasswordErr;?></span><br><br>

        <input type="submit" value="Submit" /><p><br></p><p><br></p><p><br></p>
    </form>



</fieldset>

</center>

  

<body>

</body>


<?php include('footer.php')?>


</html>