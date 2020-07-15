<?php
include '../../Connection.php';

$id=$_GET['id'];
$query2="select * from category where Cate_Id=".$id;
$result2=mysqli_query($conn,$query2); 
$row2=mysqli_fetch_row($result2);  


if(isset($_POST['btnSubmit']))
{ 
    $CatName=$_POST['CatName'];
 
    $query1="update category set Cate_Name='$CatName' where Cate_Id='$id'";
    $result1=mysqli_query($conn,$query1);
    if($result1)
    {
        header("Location:ViewCategory.php");
    }else{
        echo mysqli_error($conn);
    }
}

include 'nav.php';

?>
<div class="content">
<form method="POST">
    <label for="CatName">Category Name</label><br>
    <input type="text" name="CatName" value="<?php echo $row2[1];?>" ><br>
  

  <button type="submit" class="btn btn-primary" name="btnSubmit">Submit</button>
</form>
</div>
<?php
include 'Footer.php';
?>


