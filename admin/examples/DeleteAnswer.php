<?php
$id=$_GET['id'];
include '../../Connection.php';

$query="delete from postanswer where PA_Id='$id'";
$result=mysqli_query($conn,$query);
if($result)
{
    header('Location:ViewAnswer.php');
}else{
    echo mysqli_error($conn);
}

?>