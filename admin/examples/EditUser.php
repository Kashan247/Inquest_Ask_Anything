<?php
include '../../Connection.php';
$id=$_GET['id'];
$query2="select * from users where U_Id=".$id;
$result2=mysqli_query($conn,$query2); 
$row2=mysqli_fetch_row($result2);  


if(isset($_POST['btnSubmit']))
{ 
    $Name=$_POST['Name'];
    $FName=$_POST['FName'];
    $UserName=$_POST['UserName'];
    $Email=$_POST['Email'];
    $UNumber=$_POST['UNumber'];
    $male=$_POST['male'];
    $DOB=$_POST['DOB'];
    $UCountry=$_POST['UCountry'];
    $UCity=$_POST['UCity'];
    $UState=$_POST['UState'];
    $UPostCode=$_POST['UPostCode'];
    $UPassword=$_POST['UPassword'];
    $status=$_POST['status'];

	$imageName=$_FILES['img']['name']; //database
	$target='img/'.basename($imageName);
    if(move_uploaded_file($_FILES['img']['tmp_name'],$target))
    {
    

    $query1="update users set U_Name='$Name', U_FName='$FName', U_UserName='$UserName', U_Email='$Email', U_Contact='$UNumber', U_Gender='$male', U_DOB='$DOB', U_Country='$UCountry', U_City='$UCity', U_State='$UState', U_PostalCode='$UPostCode', U_Password='$UPassword', U_Status='$status', U_Image='$img' where U_Id='$id'";
    $result1=mysqli_query($conn,$query1);
    if($result1)
    {
        header("Location:ViewUser.php");
    }else{
        echo mysqli_error($conn);
    }
}}
include 'nav.php';
?>
<div class="content">

<form method="POST">
    <label for="Name"><h4 style="color: white"> Name</h4></label><br>
    <input type="text" name="Name" value="<?php echo $row2[1];?>" ><br>
    <label for="FName"><h4 style="color: white">Father Name</h4></label><br>
    <input type="text" name="FName" value="<?php echo $row2[2];?>" ><br>
    <label for="UserName"><h4 style="color: white">User Name</h4></label><br>
    <input type="text" name="UserName" value="<?php echo $row2[3];?>" ><br>
    <label for="Email"><h4 style="color: white">User Email</h4></label><br>
    <input type="email" name="Email" value="<?php echo $row2[4];?>" ><br>
    <label for="UNumber"><h4 style="color: white">User Number</h4></label><br>
    <input type="number" name="UNumber" value="<?php echo $row2[7];?>" ><br>
    <label for="male"><h4 style="color: white">GENDER :</h4> </label><br>
                Male <input type="radio" name="male" value="Male">
                Female <input type="radio" name="male" value="Female">

    <label for="DOB"><h4 style="color: white"> DATE OF BIRTH </h4> </label><br>
    <input  type="date" id="DOB" name="DOB" value="<?php echo $row2[6];?>" ><br>
    <label for="UCountry"><h4 style="color: white">Country</h4></label><br>
    <input type="text"  name="UCountry" value="<?php echo $row2[12];?>" ><br>
    <label for="UCity"><h4 style="color: white">City</h4></label><br>
    <input type="text" name="UCity" value="<?php echo $row2[11];?>" ><br>
    <label for="UState"><h4 style="color: white">State</h4></label><br>
    <input type="text" name="UState" value="<?php echo $row2[10];?>" ><br>
    <label for="UPostCode"><h4 style="color: white">Postal Code</h4></label><br>
    <input type="text"  name="UPostCode" value="<?php echo $row2[9];?>" ><br>
    <label for="UPassword"><h4 style="color: white">Password</h4></label><br>
    <input type="password"  name="UPassword" value="<?php echo $row2[13];?>" ><br>
    <label for="status"><h4 style="color: white">Status</h4></label><br>
    <input type="text"  name="status" value="<?php echo $row2[14];?>" ><br>
    <input type="file" name="img" value="<?php echo $row2[8];?>" ><br>




  <button type="submit" class="btn btn-primary" name="btnSubmit">Submit</button>
</form>
</div>
<?php
include 'Footer.php';
?>