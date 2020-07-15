<?php
include 'nav.php';
include '../../Connection.php';
$query="select * from admin";
$result=mysqli_query($conn,$query);
?>
<div class="content">
<a href='AddAdmin.php'><button style="background-color: lightgreen; color:white; margin-left:5px; margin-top:5px; border-radius:10px;">Add New Admin</button></a><br><br>
    <table class="table table-hover">
        <tr>
            <th> Name</th>
            <th> Username</th>
            <th>Email</th>
            <th>CNIC</th>
            <th> Contact No.</th>
            <th>Gender</th>
            <th> DOB</th>
            <th> Action</th>

         
        </tr></div>
        <?php while($row=mysqli_fetch_array($result))
        {
        echo "<tr>";
          echo "<td>".$row['A_Name']."</td>";
          echo "<td>".$row['A_UserName']."</td>";
          echo "<td>".$row['A_Email']."</td>";
          echo "<td>".$row['A_Cnic']."</td>";
          echo "<td>".$row['A_Contact']."</td>";
          echo "<td>".$row['A_Gender']."</td>";
          echo "<td>".$row['A_Dof']."</td>";

          echo "<td><a href='EditAdmin.php?id=".$row['A_Id']."'>Edit</a>  <a href='DeleteAdmin.php?id=".$row['A_Id']."'>Delete</a> </td>";
          
          
          echo "</tr>";
        }
        ?>
    </table>
    <?php
include 'Footer.php';
?>