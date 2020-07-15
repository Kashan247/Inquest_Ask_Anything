<?php
$id=$_GET['id'];
include '../../Connection.php';

$query="delete from users where U_Id='$id'";
$result=mysqli_query($conn,$query);
if($result)
{
    header('Location:ViewUser.php');
}else{
    echo mysqli_error($conn);
}

?>