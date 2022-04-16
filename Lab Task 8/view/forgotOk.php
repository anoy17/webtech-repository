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
                            $passwordErr = "minimum (8) characters need and one of the special characters (@, #, $, %)";
                            
                      }else if($_POST["newPass"]==$_POST["rePass"]){


                        require_once '../model/model.php';


                        $data['password']                 =     $_POST["rePass"];
                        $data['email']                    =     $_SESSION['tempEmail'];



                        if (updatePassword($data)) {
                            //echo 'Successfully updated!!';
                            header('location:forgotOkDone.php');

                        } else {
                            echo 'You are not allowed to access this page.';    
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


<span style="color: green;"><h1><?php echo $msg ?></h1></span>
<p><br></p><p><br></p>
  
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

        <fieldset><legend><h1>New Password</h1></legend>
            <input type="text"  name="newPass" /> <br><br>
            <span class="error">* <?php echo $passwordErr;?></span><br><br>
        </fieldset>

                          

        

            
        <fieldset><legend><h1>Re-type Password</h1></legend>
                <input type="text"  name="rePass" /><br><br>
                <span class="error">* <?php echo $rePasswordErr;?></span><br><br>
        </fieldset>
        <input type="submit" value="Change" /><p><br></p><p><br></p><p><br></p>
    </form>



  

<body>

</body>


<?php include('footer.php')?>


</html>