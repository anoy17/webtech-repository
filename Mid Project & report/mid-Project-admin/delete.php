

<?php
session_start();

if(isset($_SESSION['username'])){


}
else{

    header('location: login.php');
}

?>

<?php

    // define variables and set to empty values

    $emailErr=$email ="";


    $check=0;


    if ($_SERVER["REQUEST_METHOD"] == "POST") {

      

      //email validation//email validation//email validation
    
      if (empty($_POST["email"])) {
        $emailErr = "Email is required";
      } 
      else {
        $email = test_input($_POST["email"]);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
          $emailErr = "Must be a valid email_address : anything@example.Com";
        }
        else
          $check++;
      }



      //form changing 
      if ($check == 1) {
          $_SESSION['email1']=$_REQUEST['email'];

          

              $data = file_get_contents("doctor.json");  

              $data = json_decode($data, true); 

              echo $_POST['email'];
              if(isset($_POST['email'])){
                foreach($data as $row)  
                {    
                     if($_POST['email']==$row["Email"])
                     {  

                        session_start();

                        $_SESSION['tempEmail1']=$_POST['email'];

                        header('location:deleteDone.php');
                     }else
                        $emailErr="Please Enter a Valid  email";
                         
                }
              }

      }
  }
  

  function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
?>

















<!DOCTYPE html>
<html>

 <?php include('header2.php')?>

<style>
.error {color: #FF0000;}


</style>

<body>
  <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" >
  <fieldset>
      <legend><h1>Delete Doctor/Nurse</h1></legend>
      <span class="error">(*) must need to fill </span><br>

      <fieldset>
      <legend><h1>Delete By Using Email</h1></legend>

      <b> EMAIL :
        <input type="text" name="email"><br><br>
        <span class="error">* <?php echo $emailErr;?></span>
      <br><br>
      <input type="submit" value="Delete">&nbsp;&nbsp;

</p>

</fieldset>
  


</form>





</body>


  <?php include('footer.php')?>

  </html>