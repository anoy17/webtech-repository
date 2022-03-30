

<?php 

session_start();


if(isset($_SESSION['username'])){



}
else{

    header('location: login.php');
}

?>






<!DOCTYPE html>


<html lang="en">
<head>
    <title></title>
</head>


 <?php include('header2.php')?>
<body>


    <fieldset>

        <p><br></p><p><br></p>
        <h1 align="center" style= "color: #394393;">Hello, <?php echo $_SESSION['username'] ?> </span></h1>
        <h1 align="center" style= "color: #394393;">Welcome</h1> 
        <h1 align="center" style= "color: #394393;">To</h1>
        <h1 align="center" style= "color: #394393;">Hospital Management System</h1>


    
    <p><br></p><p><br></p>
    </fieldset>
</body>

<?php include('footer.php')?>

</html>