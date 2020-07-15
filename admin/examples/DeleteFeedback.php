<?php
$id=$_GET['id'];
include '../../Connection.php';

$query="delete from feedback where F_Id='$id'";
$result=mysqli_query($conn,$query);
if($result)
{
    header('Location:ViewFeedback.php');
}else{
    echo mysqli_error($conn);
}

?>