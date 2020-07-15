<?php
$id=$_GET['id'];
include '../../Connection.php';

$query="delete from postquestion where PQ_Id='$id'";
$result=mysqli_query($conn,$query);
if($result)
{
    header('Location:ViewQuestion.php');
}else{
    echo mysqli_error($conn);
}

?>