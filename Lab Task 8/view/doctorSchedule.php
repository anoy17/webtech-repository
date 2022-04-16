

<?php
session_start();

if(isset($_SESSION['username'])){


}
else{

    header('location: login.php');
}




require_once '../controller/readData.php';
    $rows = fetchAllDoctors($_SESSION['username']);




?>



<!DOCTYPE html>
<html>

 <?php include('header2.php')?>

<style>
.error {color: #394393;}


</style>



<body>

  <?php 


      echo "<p><br></p><p><br></p><fieldset><legend><h1 align='center'>All Doctor Details</h1></legend><table align='center' border='5px'>
          <tr>
               <th>Name</th>
               <th>Email</th>
               <th>Speciality</th>
               <th>Schedule</th>
               <th>User Name</th>
               <th>Password</th>
               <th>D.O.B</th>
               <th>Gender</th>
           </tr>";

      foreach($rows  as $row)  
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
                      <h3  align = \"center\">".$row["Speciality"]."</h3>
                   </td>

                   <td>
                      <h3  align = \"center\">".$row["Schedule"]."</h3>
                   </td>

                   <td>
                      <h3  align = \"center\">".$row["User_Name"]."</h3>
                   </td>

                   <td>
                      <h3  align = \"center\">".$row["Password"]."</h3>
                   </td>

                   <td>
                      <h3  align = \"center\">".$row["Dob"]."</h3>
                   </td>

                   <td>
                      <h3  align = \"center\">".$row["Gender"]."</h3>
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