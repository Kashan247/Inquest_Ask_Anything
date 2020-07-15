<?php
include 'nav.php';
?>
<div class="content">
<div class="container">
<form method="POST">
  <div class="form-group">
    <label for="catName">Category Name</label>
    <input type="text" class="form-control" name="catName" placeholder="Enter Category">
  
  </div>
  <button type="submit" class="btn btn-primary"name="btnSubmit">Submit</button>
</form>
</div>
</div>

<?php
include '../../Connection.php';
if(isset($_POST['btnSubmit']))
{
  $catName=$_POST['catName'];
  $query="insert into category (Cate_Name)values('$catName')";
  $result=mysqli_query($conn,$query);
  if($result)
  {
    header("Location:ViewCategory.php");
  }else{
    echo "Failed ";
  }
}

?>

<?php
include 'Footer.php';
?>
