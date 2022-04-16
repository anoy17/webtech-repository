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


    if(!empty($_SESSION['tempEmail1'])){



        $data = file_get_contents("doctor.json");  

        $data = json_decode($data, true);  

        


        unset($data[$_SESSION['tempEmail1']]);
        file_put_contents('doctor.json', json_encode($data));
        echo  $_SESSION['tempEmail1'];

    }
			
?>
 <h1 align="center" style="color: lightcoral;"><?php echo  "successfully completed ";?></h1>

<body>





</body>
<?php include('footer.php')?>
</html>