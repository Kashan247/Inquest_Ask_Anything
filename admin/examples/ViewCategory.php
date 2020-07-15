
<?php
include 'Nav.php';
include '../../Connection.php';
$query="select * from category";
$result=mysqli_query($conn,$query);
?>
<div class="content">
<a href='AddCategory.php'><button style="background-color: lightgreen; color:white; margin-left:5px; margin-top:5px; border-radius:10px;">Add Category</button></a><br><br>
    <table class="table  table-hover">
        <tr>
            <th>Category Id</th>
            <th>Category Name</th>
          
          
              <th>Actions</th>
          
        </tr>
        <?php while($row=mysqli_fetch_array($result))
        {
        echo "<tr>";
          echo"<td>".$row['Cate_Id']."</td>";
          echo "<td>".$row['Cate_Name']."</td>";
          
            echo "<td><a href='EditCategory.php?id=".$row['Cate_Id']."'>Edit</a>  <a href='DeleteCategory.php?id=".$row['Cate_Id']."'>Delete</a> </td>";
          
          echo "</tr>";
        }
    ?>
    </table>

</div>
<?php

include 'Footer.php';
?>