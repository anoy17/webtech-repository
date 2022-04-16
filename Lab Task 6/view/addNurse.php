  <!--  comments-->

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
.error {color: #FF0000;}
</style>

<head>
  <title></title>
</head>
 <?php include('header2.php')?>
<?php

    // define variables and set to empty values
    $nameErr = $emailErr = $genderErr = $birthdateErr =  $degreeErr = $bloodgroupErr = $newpassErr = $renewpassErr = $usernameErr  = $scheduleErr = "";

    $name = $email = $gender = $birthdate = $degree1 = $degree2 = $degree3 = $degree4= $bloodgroup =$newpass = $renewpass = $username  = "";

    
    $schedule="";
    //Select
    $check=0;


    if ($_SERVER["REQUEST_METHOD"] == "POST") {

      
      
      //name validation//name validation//name validation
      if (empty($_POST["name"])) {
        $nameErr = "Name is required";
      } 
      else {
        $name = test_input($_POST["name"]);
        //validating alphabet
        if (!preg_match("/^[a-zA-Z][a-zA-Z.\_\-]+ +[a-zA-Z.\-\_]+/",$name)) {
          $nameErr = "Contain a-z, A-Z  and at least two words";
        }
        else
          $check++;
          //!preg_match("/^[a-zA-Z-'{2,8} ]*$/",$name  
      }




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


      
      //schedule validation//schedule validation//schedule validation
    
      if ($_POST["schedule"] == "Select") {
        $scheduleErr = "Schedule is required";
      } 
      else {
          $check++;
      }

      
      //username username   
      if (empty($_POST["username"])) {
        $usernameErr = "username is required";
      } 
      else 
      {
          $username = test_input($_POST["username"]);
          //validating alphabet
          if (!preg_match("/^[0-9a-zA-Z-_]{2,}[^\s.]$/",$username)) {
            $usernameErr = "Must contain at least two characters and alpha numeric characters, (@),(-),(_)";
          }
          else
            $check++;
      }



      //password validation//password validation//password validation

      if(empty($_POST["newpass"])){
        $newpassErr=" must need to fill password";
      }else
        $newpass=test_input($_POST["newpass"]);


      if(empty($_POST["renewpass"])){
        $renewpassErr=" must need to fill confirm password";
      }else
        $renewpass=test_input($_POST["renewpass"]);
      

      if (!preg_match("/^[0-9a-zA-Z@%#$]{8,}$/",$newpass)) {
            $newpassErr = "Minimum (8) characters need  one special characters (@, #, $, %)";

      }else if($_POST["newpass"]==$_POST["renewpass"]){
          $check++; 
      }
      else
        $renewpassErr="didn't macth the password ";





      //gender validation//gender validation//gender validation

      if (empty($_POST["gender"])) {
        $genderErr = "Gender is required";
      } 
      else {
        $gender = test_input($_POST["gender"]);
        $check++;
      }
      

      //date validation 
      if(empty($_POST["birthdate"])){
        $birthdateErr = " select up year, month, date ";
      }
      else{
        $birthdate = test_input($_POST["birthdate"]);
        $check++;
      }
      

      //form changing 
      if ($check == 7) {
          $_SESSION['name2']=$_REQUEST['name'];
          $_SESSION['email2']=$_REQUEST['email'];
          $_SESSION['schedule2']=$_REQUEST['schedule'];
          $_SESSION['username2']=$_REQUEST['username'];
          $_SESSION['pass2']=$_REQUEST['newpass'];
          $_SESSION['dob2']=$_REQUEST['birthdate'];
          $_SESSION['gender2']=$_REQUEST['gender'];
          header('location:../controller/addNurseDone.php');
      }
  }
  

  function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
?>


<body>

<p>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" >
  <fieldset>
      <legend><h1>Add Nurse</h1></legend>
      <span class="error">(*) must need to fill </span><br>

      <fieldset>
      <legend><h1>Nurse Information</h1></legend>
      <b> NAME:
        <input type="text" name="name"><br><br>
        <span class="error">* <?php echo $nameErr;?></span>
        <br><br>

      <b> EMAIL :
        <input type="text" name="email"><br><br>
        <span class="error">* <?php echo $emailErr;?></span>
      <br><br>



      <b>SCHEDULE :
        <select name="schedule" id="schedule">
          <option value="Select">Select</option>
          <option value="10 AM to 1 PM">10 AM to 1 PM</option>
          <option value="2 PM to 5 PM">2 PM to 5 PM</option>
          <option value="5 PM to 8 PM">5 PM to 8 PM</option>
          <option value="8 PM to 10 PM">8 PM to 10 PM</option>
        </select><br><br>
        <span class="error">* <?php echo $scheduleErr;?></span>
      <br><br>




     
        <b>  User Name: 
        <input type="text" name="username"><br><br>
        <span class="error">* <?php echo $usernameErr;?></span><br>
      <br>


      
        <b>Password :
          <input type="twxt" name="newpass" ><br><br>
        <span class="error">* <?php echo $newpassErr;?></span><br><br>
      <br><br>


       <b>Confirm Password :
        <input type="text" name="renewpass"><br><br>
        <span class="error">* <?php echo $renewpassErr;?></span>
      <br><br>
      <fieldset>

      

      <b> DATE OF BIRTH:<br>
        <input type="date" min="1953-01-01" max="1998-12-31" id="birthdate" name="birthdate"><br>
        <span class="error">* <?php echo $birthdateErr;?></span><br><br>
      


      GENDER :
        <input type="radio" name="gender" value="female">Female
        <input type="radio" name="gender" value="male">Male
        <input type="radio" name="gender" value="other">Other<br>
        <span class="error">* <?php echo $genderErr;?></span><br><br>
        <input type="submit" value="submit">&nbsp;&nbsp;
      <br><br>



</p>

</fieldset>
  


</form>



</body>

<?php include('footer.php')?>
</html>