

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

 <?php include('header2.php')?>

<style>
.error {color: #394393;}


</style>

<?php 

    $q="";

      $current_data = file_get_contents('doctor.json');  
      $array_data = json_decode($current_data, true);  

      echo "<p><br></p><p><br></p><fieldset><legend><h1 align='center'>All Doctor Details</h1></legend><table align='center' border='1px'>
          <tr>
               <th>Name</th>
               <th>Email</th>
               <th>Speciality</th>
               <th>Schedule</th>
               <th>Gender</th>
               <th>Apply for Appointment</th>
           </tr>";

      foreach($array_data  as $row)  
          {  
          
               echo "



               <tr>
                   <td>
                      <h3  align = \"center\">".$row["Name"]."</h3>
                   </td>

                   <td>
                      <h3  align = \"center\">".$row["Email"]."</h3>
                   </td>

                   <td>
                      <h3  align = \"center\">".$row["speciality"]."</h3>
                   </td>

                   <td>
                      <h3  align = \"center\">".$row["schedule"]."</h3>
                   </td>


                   <td>
                      <h3  align = \"center\">".$row["gender"]."</h3>
                   </td>

                   <td>
                        <center>
                          <form method=\"post\" action=\"applied.php?q=".$row["Email"]."\">
                            <input type=\"date\" min=\"".date('Y-m-d')."\"  id=\"appointmentDate\" name=\"appointmentDate\"><br>
                            <input type=\"submit\" value=\"Apply\">&nbsp;&nbsp;
                          </form>
                        </center>
                   </td>


              </tr>
              
               ";

              
          }

          echo '</table><p><br></p><p><br></p><p><br></p>

          </fieldset>';

    ?>

<body>
<!--
<center>
  <form method="post" action="applied.php">
    <input type="date" min="<?php echo date('Y-m-d'); ?>"  id="birthdate" name="birthdate"><br>
    <input type="submit" value="Apply">&nbsp;&nbsp;
  </form>
</center>
-->
</body>


  <?php include('footer.php')?>

  </html>