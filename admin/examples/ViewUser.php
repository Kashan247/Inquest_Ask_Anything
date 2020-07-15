<?php
include 'nav.php';
include '../../Connection.php';
$query="select * from users";
$result=mysqli_query($conn,$query);
?>
<div class="content">
    <table class="table table-hover">
        <tr>
            <th> Name</th>
            <th>Father Name</th>
            <th> Username</th>
            <th>Email</th>
            <th> Contact No.</th>
            <th>Gender</th>
            <th> DOB</th>
            <th>Country</th>
            <th> City</th>
            <th>State</th>
            <th> Postal Code</th>
            <th>Password</th>
            <th> Image</th>
            <th>Status</th>
            <th> Action</th>

         
        </tr></div>
        <?php while($row=mysqli_fetch_array($result))
        {
        echo "<tr>";
          echo "<td>".$row['U_Name']."</td>";
          echo "<td>".$row['U_FName']."</td>";
          echo "<td>".$row['U_UserName']."</td>";
          echo "<td>".$row['U_Email']."</td>";
          echo "<td>".$row['U_Contact']."</td>";
          echo "<td>".$row['U_Gender']."</td>";
          echo "<td>".$row['U_DOB']."</td>";
          echo "<td>".$row['U_Country']."</td>";
          echo "<td>".$row['U_City']."</td>";
          echo "<td>".$row['U_State']."</td>";
          echo "<td>".$row['U_PostalCode']."</td>";
          echo "<td>".$row['U_Password']."</td>";


          echo "<td><img src='../../inquest/img/$row[U_Image]' style='width:40%; height:100px;'/></td>";


        //   echo "<td><img src='../../img/$row[U_Image]' style='width:40%; height:100px;'/></td>";
          echo "<td>".$row['U_Status']."</td>";

          echo "<td><a href='EditUser.php?id=".$row['U_Id']."'>Edit</a>  <a href='DeleteUser.php?id=".$row['U_Id']."'>Delete</a> </td>";
          
          
          echo "</tr>";
        }
        ?>
    </table>
    <?php
include 'Footer.php';
?>