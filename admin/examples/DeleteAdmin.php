<?php
$id=$_GET['id'];
include '../../Connection.php';

$query="delete from admin where A_Id='$id'";
$result=mysqli_query($conn,$query);
if($result)
{
    header('Location:ViewAdmin.php');
}else{
    echo mysqli_error($conn);
}

?>