<?php
$id=$_GET['id'];
include'../../Connection.php';

$query="delete from category where Cate_Id='$id'";
$result=mysqli_query($conn,$query);
if($result)
{
    header('Location:ViewCategory.php');
}else{
    echo "Failed";
}

?>