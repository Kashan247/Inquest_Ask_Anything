<?php
include '../../Connection.php';
$id=$_GET['id'];  // getting id from url
$query2="select * from feedback where F_Id=".$id;  //getting data from product table based on given id
$result2=mysqli_query($conn,$query2); //executing query
$row2=mysqli_fetch_row($result2);  //fetching data

$query="Select * from users";   //getting data from category table for dropdown values
$result=mysqli_query($conn,$query);  // executing query

if(isset($_POST['btnSubmit']))
{  
    $usr=$_POST['usr'];
    $msg=$_POST['msg'];
    $DOB=$_POST['DOB'];

    $query1="update feedback set U_Id='$usr',F_Massage='$msg',F_DateTime='$DOB' where F_Id='$id'";
    $result1=mysqli_query($conn,$query1);
    if($result1)
    {
        header("Location:viewFeedback.php");
    }else{
        echo mysqli_error($conn);
    }
}
include 'nav.php';

?>
<div class="content">
<form method="POST">

<label for="usr">User</label>
    <select name="usr">
        <?php
        while($row=mysqli_fetch_array($result))
        {
            if($row2[2]==$row['U_Id'])
            {
            ?>
            <option value=<?php echo $row['U_Id'];?> selected>
            <?php echo $row['U_Name'];?>
            </option>
            <?php
            }
            else {
                ?>
            <option value=<?php echo $row['U_Id'];?>>
            <?php echo $row['U_Name'];?>
            </option>
        <?php
        }
    }
        ?>
    </select>

    <label for="msg">Message</label>
    <input type="text" name="msg" value="<?php echo $row2[2];?>" >
  
  
    <label for="DOB"> DATE   </label>
    <input  type="date"  name="DOB" value="<?php echo $row2[4];?>" >



  <button type="submit" class="btn btn-primary" name="btnSubmit">Submit</button>
</form>

</div>
<?php
include 'Footer.php';
?>