<?php
include '../Connection.php';
$query="Select * from userinterest";
$result=mysqli_query($conn,$query);

if(isset($_POST['btnSignUp']))
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
    $query1="insert into users(U_Name,U_FName,U_UserName,U_Email,U_Contact,U_Gender,U_DOB,U_Country,U_City,U_State,U_PostalCode,U_Password,U_Status,U_Image)values('$Name','$FName','$UserName','$Email','$UNumber','$male','$DOB','$UCountry','$UCity','$UState','$UPostCode','$UPassword','$status','$imageName')";
    $result1=mysqli_query($conn,$query1);
    if($result1)
    {
        echo "<script>alert('You can Login to your account it has been created.');</script>";
        header('Location:index.php');
    }else{
        echo "<script>alert('".mysqli_error($conn)."');</script>";
        echo "<script>alert('Failed');</script>";
    }
    } 
}
?>

<div class="panel-pop" id="signup" style="overflow:auto; width:50%; height:600px;">
		<h2>Register Now<i class="icon-remove"></i></h2>
		<div class="form-style form-style-3">
			<form method="POST" enctype="multipart/form-data">
				<div class="form-inputs clearfix">
					<p>
                    <label for="Name"><h4 style="color: blue"> Name</h4></label>
    <input type="text" required class="form-control" name="Name" placeholder="Enter Name" style="width:50%; ">
					</p>
					<p>
                    <label for="FName"><h4 style="color: blue">Father Name</h4></label>
    <input type="text" required class="form-control" name="FName" placeholder="Enter Father Name" style="width:50%; ">
					</p>
					<p>
                    <label for="UserName"><h4 style="color: blue">User Name</h4></label>
    <input type="text" required class="form-control" name="UserName" placeholder="Enter User Name" style="width:50%; ">
					</p>
					<p>
                    <label for="Email"><h4 style="color: blue">User Email</h4></label>
    <input type="email" required class="form-control" name="Email" placeholder="Enter Email : abc@gmail.com" style="width:50%; ">
					</p>
					<p>
                    <label for="UNumber"><h4 style="color: blue">User Number</h4></label>
    <input type="tel" required class="form-control" name="UNumber" pattern="[0-9]{3}[0-9]{4}[0-9]{3}" placeholder="Enter Contact # : 345-5453-678" style="width:50%; ">
					</p>
					<p>
                    <label for="male"><h4 style="color: blue">GENDER :</h4> </label>
                 <input type="radio" name="male" value="Male">Male
                 <br>
                 <input type="radio" name="male" value="Female">Female
					</p>
					<p>
                    <label for="DOB"><h4 style="color: blue"> DATE OF BIRTH </h4> </label>
  <input required type="date" id="DOB" name="DOB">
					</p>
					<p>
                    <label for="UCountry"><h4 style="color: blue">Country</h4></label>
    <input type="text" required class="form-control" name="UCountry" placeholder="Enter Country" style="width:50%; ">
					</p>
					<p>
                    <label for="UCity"><h4 style="color: blue">City</h4></label>
    <input type="text" required class="form-control" name="UCity" placeholder="Enter City" style="width:50%; ">
					</p>
					<p>
                    <label for="UState"><h4 style="color: blue">State</h4></label>
    <input type="text" required class="form-control" name="UState" placeholder="Enter State" style="width:50%; ">
					</p>
					<p>
                    <label for="UPostCode"><h4 style="color: blue">Postal Code</h4></label>
    <input type="text" required class="form-control" name="UPostCode" placeholder="Enter Postal Code" style="width:50%; ">
					</p>
					<p>
                    <label for="UPassword"><h4 style="color: blue">Password</h4></label>
    <input type="password" required class="form-control" name="UPassword" placeholder="Password" style="width:50%; ">
					</p>
					<!-- <p>
                    <label for="status"><h4 style="color: blue">Status</h4></label>
    <input type="text" required class="form-control" name="status" placeholder="Password" style="width:50%; ">
					</p> -->
					<p>
						<label class="required">Upload Image<span>*</span></label>
                        <input required type="file" name="img"/>
					</p>
				</div>
				<p class="form-submit">
					<input type="submit" name="btnSignUp" value="Signup" class="button color small submit">
				</p>
			</form>
		</div>
	</div><!-- End signup -->