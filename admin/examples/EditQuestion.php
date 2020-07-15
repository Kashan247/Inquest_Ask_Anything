<?php
include '../../Connection.php';
$id=$_GET['id'];  // getting id from url
$UserQuery="select * from users";  //getting data from product table based on given id
$UserResult=mysqli_query($conn,$UserQuery); //executing query



$CatQuery="select * from category";  //getting data from product table based on given id
$CatResult=mysqli_query($conn,$CatQuery); //executing query


$QuestQuery="Select * from postquestion where PQ_Id=".$id;   //getting data from category table for dropdown values
$QuestResult=mysqli_query($conn,$QuestQuery);  // executing query
$QuestRow=mysqli_fetch_assoc($QuestResult);

if(isset($_POST['btnSubmit']))
{  
    $usr=$_POST['usr'];
    $cat=$_POST['cat'];
    $ques=$_POST['ques'];
    $DOB=$_POST['DOB'];

    $query1="update postquestion set U_Id='$usr',Cate_Id='$cat',PQ_Questions='$ques',PQ_DateTime='$DOB' where PQ_Id='$id'";
    $result1=mysqli_query($conn,$query1);
    if($result1)
    {
        header("Location:viewQuestion.php");
    }else{
        echo mysqli_error($conn);
    }
}

include 'Nav.php';

?>
<div class="content">
<form method="POST">

<label for="usr">User</label>
    <select name="usr">
        <?php
        while($UserRow=mysqli_fetch_array($UserResult))
        {
            if($UserRow["U_Id"]==$QuestRow['U_Id'])
            {
            ?>
            <option value="<?php echo $UserRow['U_Id'];?>" selected>
            <?php echo $UserRow['U_Name'];?>
            </option>
            <?php
            }
            else {
                ?>
            <option value="<?php echo $UserRow['U_Id'];?>">
            <?php echo $UserRow['U_Name'];?>
            </option>
        <?php
        }
    }
        ?>
    </select>

    <label for="cat">Category</label>
    <select name="cat">
        <?php
        while($CatRow=mysqli_fetch_array($CatResult))
        {
            if($CatRow['Cate_Id']==$QuestRow['Cate_Id'])
            {
            ?>
            <option value="<?php echo $CatRow['Cate_Id'];?>" selected>
            <?php echo $CatRow['Cate_Name'];?>
            </option>
            <?php
            }
            else {
                ?>
            <option value="<?php echo $CatRow['Cate_Id'];?>">
            <?php echo $CatRow['Cate_Name'];?>
            </option>
        <?php
        }
    }
        ?>
    </select>


    <label for="ques">Question</label>
    <input type="text" name="ques" value="<?php echo $QuestRow['PQ_Questions'];?>" >

  
    <label for="DOB"> DATE   </label>
    <input  type="date"  name="DOB" value="<?php echo $QuestRow['PQ_DateTime'];?>" >



  <button type="submit" class="btn btn-primary" name="btnSubmit">Submit</button>
</form>
</div>
<?php
include 'Footer.php';
?>