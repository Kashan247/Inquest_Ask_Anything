<?php

include '../../Connection.php';

if(isset($_POST['btnSubmit']))
{
    $Name=$_POST['Name'];
    $UserName=$_POST['UserName'];
    $Email=$_POST['Email'];
    $Number=$_POST['Number'];
    $cnic=$_POST['cnic'];
    $male=$_POST['male'];
    $DOB=$_POST['DOB'];
    $UPassword=$_POST['UPassword'];
  
    $query1="insert into admin(A_Name,A_UserName,A_Email,A_Contact,A_Cnic,A_Gender,A_Dof,A_Password)values('$Name','$UserName','$Email','$Number','$cnic','$male','$DOB','$UPassword')";
  $result1=mysqli_query($conn,$query1);
    if($result1)
    {
      header('Location:ViewAdmin.php');
    }else{
        echo mysqli_error($conn);
    }
} 
include 'nav.php';      
?>
<div class="content">
<form method="POST" enctype="multipart/form-data">
  <div class="form-group">
    <label for="Name"><h4 style="color: blue"> Name</h4></label>
    <input type="text" required class="form-control" name="Name" placeholder="Enter Name" style="width:50%; ">
  </div>
  <div class="form-group">
    <label for="UserName"><h4 style="color: blue">User Name</h4></label>
    <input type="text" required class="form-control" name="UserName" placeholder="Enter User Name" style="width:50%; ">
  </div>
  <div class="form-group">
    <label for="Email"><h4 style="color: blue"> Email</h4></label>
    <input type="email" required class="form-control" name="Email" placeholder="Enter Email" style="width:50%; ">
  </div>
`  <div class="form-group">
    <label for="Number"><h4 style="color: blue">Contatc No.</h4></label>
    <input type="number" required class="form-control" name="Number" placeholder="Enter Number" style="width:50%; ">
  </div>
  `  <div class="form-group">
    <label for="cnic"><h4 style="color: blue">CNIC No.</h4></label>
    <input type="number" required class="form-control" name="cnic" placeholder="Enter Number" style="width:50%; ">
  </div>
  <div class="form-group">
  <label for="male"><h4 style="color: blue">GENDER :</h4> </label>
                Male <input type="radio" name="male" value="Male">
                Female <input type="radio" name="male" value="Female">
  </div>
  <div class="form-group">
  <label for="DOB"><h4 style="color: blue"> DATE OF BIRTH </h4> </label>
  <input required type="date" id="DOB" name="DOB">
  </div>

  <div class="form-group">
    <label for="UPassword"><h4 style="color: blue">Password</h4></label>
    <input type="password" required class="form-control" name="UPassword" placeholder="Password" style="width:50%; ">
  </div>


  <button type="submit" class="btn btn-primary" name="btnSubmit">Submit</button>
</form>
</div>

<?php
include 'Footer.php';
?>