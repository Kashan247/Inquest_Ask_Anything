<?php
include '../Connection.php';
$Aid=$_GET['id']; 
    $st="Approved";

$query="Select * from postanswer where PA_Id='$Aid'";
$result=mysqli_query($conn,$query);
$row=mysqli_fetch_array($result);

    $query1="update postanswer set PA_Status='$st' where PA_Id='$Aid'";
    $result1=mysqli_query($conn,$query1);
    if($result1)
    {
        header("Location:single_question.php?id=".$row['PQ_Id']);
    }else{
        echo mysqli_error($conn);
    }


?>

