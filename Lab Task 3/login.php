<!DOCTYPE html>
<html>
<style>
.error {color: #FF0000;}
</style>

<?php

	$username = $password = "";
	$usernameErr = $passwordErr =$msg="";
	$check = 0;

	if($_SERVER["REQUEST_METHOD"] == "POST"){

		//username validation
		if (empty($_POST["username"])) {
	        $usernameErr = "Name is required";
	      } 
    else
    {
      $username = test_input($_POST["username"]);
      //validating alphabet
      if (!preg_match("/^[0-9a-zA-Z-_]{2,}[^\s.]$/",$username)) {
        $usernameErr = "User Name must contain at least two (2) characters and can contain alpha numeric characters, period, dash or underscore only";
      }
      else
        $check++; 
    }


    //password validation
    if (empty($_POST["password"])) {
	        $passwordErr = "Name is required";
	      } 
    else
    {
      $password = test_input($_POST["password"]);
      //validating alphabet
      if (!preg_match("/^[0-9a-zA-Z@%#$]+$/",$password)) {
        $passwordErr = "UPassword must not be less than eight (8) characters contain at least one of the special characters (@, #, $, %)";
      }
      else
        $check++; 
    }


    $data = file_get_contents("data.json");  

		$data = json_decode($data, true);  

		if($check==2){

			foreach($data as $row)  
		{  
		    
		     if($_POST["username"]==$row["User Name"] && $_POST["password"]==$row["Password"])
		     { 

								$msg="";
								header('Location:formupload.php');


					}
					else
						$msg="invalid information";
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

<center>
	

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
  <fieldset align="center">
    <legend> <h1 align="center"> LOGIN</h1></legend><br>
	User Name: 
	<input type="text" name="username"><br><br>
	<span class="error">* <?php echo $usernameErr;?></span><br><br>
	Password : &nbsp; 
	<input type="Password" name="password" minlength="8"><br><br>
	<span class="error">* <?php echo $passwordErr;?></span><br><br>
	<input type="checkbox" id="remember" name="remember" value="remember">
	<label for="remember"> Remember me</label><br><br><br>
	
	<input type="submit" value="submit">&nbsp;&nbsp;
	<a href="changepass.php"> Forgot Password<a><br><br>
	
  </fieldset>
</form>



<h1 style="color: red;"><?php echo $msg; ?></h1>

</center>

<body>


</body>
</html>