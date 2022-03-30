

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



<body>

  <?php 

      $current_data = file_get_contents('nurse.json');  
      $array_data = json_decode($current_data, true);  

      echo "<p><br></p><p><br></p><fieldset><legend><h1 align='center'>All Nurse Details</h1></legend><table align='center' border='5px'>
          <tr>
               <th>Name</th>
               <th>Email</th>
               <th>Schedule</th>
               <th>User Name</th>
               <th>Password</th>
               <th>D.O.B</th>
               <th>Gender</th>
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
                      <h3  align = \"center\">".$row["schedule"]."</h3>
                   </td>

                   <td>
                      <h3  align = \"center\">".$row["User Name"]."</h3>
                   </td>

                   <td>
                      <h3  align = \"center\">".$row["Password"]."</h3>
                   </td>

                   <td>
                      <h3  align = \"center\">".$row["dob"]."</h3>
                   </td>

                   <td>
                      <h3  align = \"center\">".$row["gender"]."</h3>
                   </td>

              </tr>
              
               ";

              
          }

          echo '</table><p><br></p><p><br></p><p><br></p>

          </fieldset>';

        ?>



</body>


  <?php include('footer.php')?>

  </html>