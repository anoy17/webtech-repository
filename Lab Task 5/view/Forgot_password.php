<?php
    session_start();

?>



<?php 
                $emailErr = "";

                $data = file_get_contents("info.json");  

                $data = json_decode($data, true);  
                if(isset($_POST['forgotEmail'])){
                  foreach($data as $row)  
                  {  
                       if($_POST['forgotEmail']==$row["Email"])
                       {  
                          session_start();

                          $_SESSION['tempEmail']=$_POST['forgotEmail'];
                          
                          header('location:forgotDone.php');
                       }else
                          $emailErr="invalid email";
                           
                  }
                }
?>

<!DOCTYPE html>

<html lang="en">
 <?php include('header.php')?>

<style>
.error {color: #FF0000;}
</style>

<center>
<fieldset><p><br></p><p><br></p>
  <h1>FORGOT PASSWORD</h1>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
		Enter Email:
        <input type="text"  name="forgotEmail" /> <br><br>
        <span class="error">* <?php echo $emailErr;?></span><br><br>
        <input type="submit" value="Submit" /><p><br></p><p><br></p><p><br></p>
    </form>

</fieldset>

</center>

  

<body>

</body>


<?php include('footer.php')?>


</html>