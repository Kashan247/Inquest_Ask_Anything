<?php
include 'Nav.php';

include '../../Connection.php';
$query="select * from postquestion";
$result=mysqli_query($conn,$query);
?>
<div class="content">
    <table class="table table-hover">
        <tr>
            <th> Id</th>
            <th> User</th>
            <th> Category</th>
            <th> Question</th>
            <th> Date</th>
            <th> Action</th>
         
        </tr>
        <?php while($row=mysqli_fetch_array($result))
        {
        echo "<tr>";
          echo"<td>".$row['PQ_Id']."</td>";
          $query2="select * from users where U_Id=".$row['U_Id'];
          $result2=mysqli_query($conn,$query2);
          $row2=mysqli_fetch_row($result2);
          echo"<td>".$row2[1]."</td>";

          $query1="select * from category where Cate_Id=".$row['Cate_Id'];
          $result1=mysqli_query($conn,$query1);
          $row1=mysqli_fetch_row($result1);
          echo"<td>".$row1[1]."</td>";

          echo"<td>".$row['PQ_Questions']."</td>";

          echo"<td>".$row['PQ_DateTime']."</td>";
       
          echo "<td><a href='EditQuestion.php?id=".$row['PQ_Id']."'>Edit</a>  <a href='DeleteQuestion.php?id=".$row['PQ_Id']."'>Delete</a> </td>";
            
          
          echo "</tr>";
        }
        ?>
    </table>
    </div>
    <?php
include 'Footer.php';
?>