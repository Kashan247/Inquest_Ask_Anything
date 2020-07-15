<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

    <title>Inquest - Admin LogIn</title>
</head>
<body style="background: linear-gradient(to bottom, #33ccff 0%, #0000ff 100%); background-position:center center; background-repeat:no-repeat; background-attachment:fixed; background-size:cover;">

<center>
    <img src="../../Images/adminlogin.jpg" style="margin-top:20px; border-radius:20px;">
    <br> <br>
    <form method="POST">
     <h4>User Name :&nbsp; <input required type="text" name="userName" placeholder="Enter User Name" style="background: linear-gradient(to bottom, #33ccff 0%, #0000ff 100%); background-position:center center; background-repeat:no-repeat; background-attachment:fixed; background-size:cover; border-radius:20px;"></h4>
    <br>
     <h4>Password &nbsp;&nbsp;&nbsp;         :&nbsp;&nbsp;<input required type="password" name="password" placeholder="Enter Password" style="background: linear-gradient(to bottom, #33ccff 0%, #0000ff 100%); background-position:center center; background-repeat:no-repeat; background-attachment:fixed; background-size:cover; border-radius:20px;"></h4>
    <br>

    <input type="submit" name="btnLogin" value="LogIn" style="background: linear-gradient(to bottom, #33ccff 0%, #0000ff 100%); background-position:center center; background-repeat:no-repeat; background-attachment:fixed; background-size:cover; color:white; font-size:30px;  border-radius:40px; width:30%; height:50px;">
    </form>
</center>


<?php

include '../../Connection.php';

if(isset($_POST['btnLogin']))
{
    $username=$_POST['userName'];
    $password=$_POST['password'];
    $query="select * from admin where A_UserName='$username' AND A_Password='$password'";
    $result=mysqli_query($conn,$query);
    $row =mysqli_fetch_array($result);

    $count = mysqli_num_rows($result);
    if($count)
    {
          $_SESSION['admin']=$userName;
          $_SESSION['admin_id']=$row['A_Id'];
        header("Location:dashboard.php");
    }else{
        echo mysqli_error($conn);
        echo "Invalid Credentials";
    }
}

?>
</body>
</html>