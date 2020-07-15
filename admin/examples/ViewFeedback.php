<?php
include 'Nav.php';
include '../../Connection.php';
$query="select * from feedback";
$result=mysqli_query($conn,$query);
?>
<div class="content">
    <table class="table table-hover">
        <tr>
            <th> Name</th>
            <th>Massage</th>
            <th>Date</th>
            <th> Action</th>

         
        </tr></div>
        <?php while($row=mysqli_fetch_array($result))
        {
        echo "<tr>";

        $query2="select * from users where U_Id=".$row['U_Id'];
        $result2=mysqli_query($conn,$query2);
        $row2=mysqli_fetch_row($result2);
        echo"<td>".$row2[1]."</td>";


          echo "<td>".$row['F_Massage']."</td>";
          echo "<td>".$row['F_DateTime']."</td>";

          echo "<td><a href='EditFeedback.php?id=".$row['F_Id']."'>Edit</a>  <a href='DeleteFeedback.php?id=".$row['F_Id']."'>Delete</a> </td>";
          
          
          echo "</tr>";
        }
        ?>
    </table>
    <?php
include 'Footer.php';
?>