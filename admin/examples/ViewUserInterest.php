<?php
include 'nav.php';

include '../../Connection.php';
$query="select * from userinterest";
$result=mysqli_query($conn,$query);
?>
<div class="content">
    <table class="table table-hover">
        <tr>
            <th > Id</th>
            <th> User Interest</th>
            <th> User</th>
         
        </tr>
        <?php while($row=mysqli_fetch_array($result))
        {
        echo "<tr>";
          echo"<td>".$row['UI_Id']."</td>";
          $query1="select * from category where Cate_Id=".$row['Cate_Id'];
          $result1=mysqli_query($conn,$query1);
          $row1=mysqli_fetch_row($result1);
          echo"<td>".$row1[1]."</td>";

          $query2="select * from users where U_Id=".$row['U_Id'];
          $result2=mysqli_query($conn,$query2);
          $row2=mysqli_fetch_row($result2);
          echo"<td>".$row2[1]."</td>";

       
          
          
          echo "</tr>";
        }


        ?>
    </table>
    </div>
    <?php
include 'Footer.php';
?>