<?php
include 'Nav.php';
include '../../Connection.php';
$query="Select * from users";
$result=mysqli_query($conn,$query);

if(isset($_POST['btnSubmit']))
{
    $users=$_POST['users'];
    $msg=$_POST['msg'];
    $DOB=$_POST['DOB'];


    $query1="insert into feedback(U_Id,F_Massage,F_DateTime)values('$users','$msg','$DOB')";
  $result1=mysqli_query($conn,$query1);
    if($result1)
    {
      header('Location:Nav.php');
    }else{
         echo mysqli_error($conn);
    }
} 
      
?>
<div class="content">
<form method="POST" enctype="multipart/form-data">
<div class="form-group">
    <label for="users"><h4 style="color: blue">Users</h4></label><br/>
    <select name="users" >
        <?php
        while($row=mysqli_fetch_array($result))
        {
        ?>
                <option value=<?php echo $row['U_Id'];?>>
                <?php echo $row['U_Name'];?>
                </option>
        <?php
        }
        ?>
    </select>
  </div>

  <div class="form-group">
    <label for="msg"><h4 style="color: blue">Massage</h4></label>
    <input type="text" required class="form-control" name="msg" placeholder="Enter Massage" style="width:50%; ">
  </div>
  <div class="form-group">
  <label for="DOB"><h4 style="color: blue"> DATE OF BIRTH </h4> </label>
  <input required type="date" id="DOB" name="DOB">
  </div>


  <button type="submit" class="btn btn-primary" name="btnSubmit">Submit</button>
</form>
</div>

<?php
include 'Footer.php';
?>