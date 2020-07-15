<?php
include '../../Connection.php';
$id=$_GET['id'];  // getting id from url
$query2="select * from admin where A_Id=".$id;  //getting data from product table based on given id
$result2=mysqli_query($conn,$query2); //executing query
$row2=mysqli_fetch_row($result2);  //fetching data


if(isset($_POST['btnSubmit']))
{  
    $name=$_POST['name'];
    $uname=$_POST['uname'];
    $pass=$_POST['pass'];
    $nic=$_POST['nic'];
    $DOB=$_POST['DOB'];
    $male=$_POST['male'];
    $num=$_POST['num'];
    $email=$_POST['email'];
   
    $query1="update admin set A_Name='$name',A_UserName='$uname',A_Password='$pass',A_Cnic='$nic',A_Dof='$DOB',A_Gender='$male',A_Contact='$num',A_Email='$email' where A_Id='$id'";
    $result1=mysqli_query($conn,$query1);
    if($result1)
    {
        header("Location:viewAdmin.php");
    }else{
        echo mysqli_error($conn);
    }
}
include 'nav.php';

?>
<div class="content">
<form method="POST">


    <label for="name">Name</label><br>
    <input type="text" name="name" value="<?php echo $row2[1];?>" ><br>

    <label for="uname">UserName</label><br>
    <input type="text" name="uname" value="<?php echo $row2[2];?>" ><br>

    <label for="pass">Password</label><br>
    <input type="text" name="pass" value="<?php echo $row2[3];?>" ><br>

    <label for="nic">CNIC</label><br>
    <input type="text" name="nic" value="<?php echo $row2[4];?>" ><br>

    <label for="DOB"> DATE of BIRTH  </label><br>
    <input  type="date"  name="DOB" value="<?php echo $row2[5];?>" ><br>

    <label for="male">GENDER :</label><br>
                Male <input type="radio" name="male" value="Male" value="<?php echo $row2[6];?>" >
                Female <input type="radio" name="male" value="Female" value="<?php echo $row2[6];?>" ><br>



    <label for="num">Number</label><br>
    <input type="text"  name="num"  value="<?php echo $row2[7];?>" ><br>
  
    <label for="email">Email</label><br>
    <input type="text"  name="email"  value="<?php echo $row2[8];?>" ><br>



  <button type="submit" class="btn btn-primary" name="btnSubmit">Submit</button>
</form>
</div>
<?php
include 'Footer.php';
?>