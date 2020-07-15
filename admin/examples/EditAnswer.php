<?php
include '../../Connection.php';
$id=$_GET['id'];  // getting id from url
$UserQuery="select * from users";  //getting data from product table based on given id
$UserResult=mysqli_query($conn,$UserQuery); //executing query



$CatQuery="select * from postquestion";  //getting data from product table based on given id
$CatResult=mysqli_query($conn,$CatQuery); //executing query


$QuestQuery="Select * from postanswer where PA_Id=".$id;   //getting data from category table for dropdown values
$QuestResult=mysqli_query($conn,$QuestQuery);  // executing query
$QuestRow=mysqli_fetch_assoc($QuestResult);

if(isset($_POST['btnSubmit']))
{  
    // $usr=$_POST['usr'];
    // $ques=$_POST['ques'];
    $ans=$_POST['ans'];
    // $date=date('d-m-y h:i:s');
    // echo "<script>alert(".$date.")</script>";
     // $st=$_POST['st'];

    $query1="update postanswer set PA_Answer='$ans' where PA_Id='$id'";
    $result1=mysqli_query($conn,$query1);
    if($result1)
    {
        header("Location:ViewAnswer.php");
    }else{
        echo mysqli_error($conn);
    }
}
include 'Nav.php';

?>
<div class="content">
<form method="POST">

<!-- <label for="usr">User</label>
    <select name="usr">
        <?php
     //   while($UserRow=mysqli_fetch_array($UserResult))
        {
       //     if($UserRow["U_Id"]==$QuestRow['U_Id'])
            {
            ?>
            <option value="<?php// echo $UserRow['U_Id'];?>" selected>
            <?php// echo $UserRow['U_Name'];?>
            </option>
            <?php
            }
//            else {
                ?>
            <option value="<?php// echo $UserRow['U_Id'];?>">
            <?php// ech/ $UserRow['U_Name'];?>
            </option>
        <?php
        }
    
        ?>
    </select> -->

    <!-- <label for="ques">Question</label>
    <select name="ques">
        <?php
//        while($CatRow=mysqli_fetch_array($CatResult))
        {
  //          if($CatRow['PQ_Id']==$QuestRow['PQ_Id'])
            {
            ?>
            <option value="<?php// echo $CatRow['PQ_Id'];?>" selected>
            <?php //echo $CatRow['PQ_Questions'];?>
            </option>
            <?php
            }
//            else {
                ?>
            <option value="<?php// echo $CatRow['PQ_Id'];?>">
            <?php //echo $CatRow['PQ_Questions'];?>
            </option>
        <?php
        }
    
        ?>
    </select> -->


    <label for="ans">Answer</label>
    <input type="text" name="ans" value="<?php echo $QuestRow['PA_Answer'];?>" >

  
    <!-- <label for="DOB"> DATE   </label>
    <input  type="date"  name="DOB" value="<?php// echo $QuestRow['PA_DateTime'];?>" > -->

    <!-- <label for="st"><h4 style="color: blue">Status</h4> </label>
                Related <input type="radio" name="st" value="Related">
                Non related <input type="radio" name="st" value="Not Related"> -->



  <button type="submit" class="btn btn-primary" name="btnSubmit">Submit</button>
</form>
</div>
<?php
include 'Footer.php';
?>