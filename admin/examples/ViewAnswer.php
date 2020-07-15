<?php
include 'Nav.php';

include '../../Connection.php';
$query="select * from postanswer";
$result=mysqli_query($conn,$query);
?>
<div class="content">
    <table class="table table-hover">
        <tr>
            <th> Id</th>
            <th> User</th>
            <th> Question</th>
            <th> Answer</th>
            <th> Date</th>
            <th> Status</th>
            <th> Action</th>
         
        </tr>
        <?php while($row=mysqli_fetch_array($result))
        {
        echo "<tr>";
          echo"<td>".$row['PA_Id']."</td>";
          $query2="select * from users where U_Id=".$row['U_Id'];
          $result2=mysqli_query($conn,$query2);
          $row2=mysqli_fetch_row($result2);
          echo"<td>".$row2[1]."</td>";

          $query1="select * from postquestion where PQ_Id=".$row['PQ_Id'];
          $result1=mysqli_query($conn,$query1);
          $row1=mysqli_fetch_row($result1);
          echo"<td>".$row1[2]."</td>";

          echo"<td>".$row['PA_Answer']."</td>";
          echo"<td>".$row['PA_DateTime']."</td>";

          echo"<td>".$row['PA_Status']."</td>";
       
          echo "<td><a href='EditAnswer.php?id=".$row['PA_Id']."'>Edit</a>  <a href='DeleteAnswer.php?id=".$row['PA_Id']."'>Delete</a> </td>";
          
          
          echo "</tr>";
        }
        ?>
    </table>
    </div>
    <?php
include 'Footer.php';
?>