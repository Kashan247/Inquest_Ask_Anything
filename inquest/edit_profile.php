<?php
$id=$_GET['id'];
include '../connection.php';
$query2="select * from users where U_Id=".$id;
$result2=mysqli_query($conn,$query2); 
$row2=mysqli_fetch_row($result2);  


if(isset($_POST['btnUpdate']))
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
    $status="active";
	$imageName=$_FILES['img']['name']; //database
	$target='img/'.basename($imageName);
    if(move_uploaded_file($_FILES['img']['tmp_name'],$target))
    {


    $query1="update users set U_Name='$Name', U_FName='$FName', U_UserName='$UserName', U_Email='$Email', U_Contact='$UNumber', U_Gender='$male', U_DOB='$DOB', U_Country='$UCountry', U_City='$UCity', U_State='$UState', U_PostalCode='$UPostCode', U_Password='$UPassword', U_Status='$status', U_Image='$imageName' where U_Id='$id'";
    $result1=mysqli_query($conn,$query1);
    if($result1)
    {
        header('Location:user_profile.php?id='.$id);
    }else{
        echo mysqli_error($conn);
    }
}
}

include 'head.php';
?>
	<div class="breadcrumbs">
		<section class="container">
			<div class="row">
				<div class="col-md-12">
					<h1>Edit Profile</h1>
				</div>
				<div class="col-md-12">
					<div class="crumbs">
						<a href="#">Home</a>
						<span class="crumbs-span">/</span>
						<a href="#">user</a>
						<span class="crumbs-span">/</span>
						<span class="current">Edit Profile</span>
					</div>
				</div>
			</div><!-- End row -->
		</section><!-- End container -->
	</div><!-- End breadcrumbs -->
	<section class="container main-content">
		<div class="row">
			<div class="col-md-9">
				<div class="page-content">
					<div class="boxedtitle page-title"><h2>Edit Profile</h2></div>
					
					<div class="form-style form-style-4">
						<form method="POST" enctype="multipart/form-data">
							<div class="form-inputs clearfix">
								<p>
									<label>Name</label>
									<input type="text" name="Name"  value="<?php echo $row2[1];?>" >
								</p>
								<p>
									<label>Father Name</label>
									<input type="text" name="FName" value="<?php echo $row2[2];?>" >
								</p>
								<p>
									<label>User Name</label>
									<input type="text" name="UserName" value="<?php echo $row2[3];?>" >
								</p>
								<p>
									<label>Contact</label>
									<input type="number" name="UNumber" value="<?php echo $row2[7];?>" >
								</p>
								<p>
									<label >E-Mail</label>
									<input type="email" name="Email" value="<?php echo $row2[4];?>" >
								</p>
								<p>
								<label for="male">GENDER :</label>
                						Male <input type="radio" name="male" value="Male"><br>
               							Female <input type="radio" name="male" value="Female">
								</p>
								<p>
									<label>Date of Birth</label>
									<input type="date" id="DOB" name="DOB" value="<?php echo $row2[6];?>" >
								</p>
								<p>
									<label>Country</label>
									<input type="text" name="UCountry"  value="<?php echo $row2[12];?>" >
								</p>
								<p>
									<label>City</label>
									<input type="text" name="UCity"  value="<?php echo $row2[11];?>" >
								</p>
								<p>
									<label>State</label>
									<input type="text" name="UState"  value="<?php echo $row2[10];?>" >
								</p>
								<p>
									<label>Postal Code</label>
									<input type="text" name="UPostCode"  value="<?php echo $row2[9];?>" >
								</p>	

								<p>
									<label class="required">Password<span>*</span></label>
									<input type="password" name="UPassword" value="<?php echo $row2[13];?>" >
								</p>
								<p>
									<label class="required">Confirm Password<span>*</span></label>
									<input type="password" name="UPassword" value="<?php echo $row2[13];?>" >
								</p>
							</div>
							<div class="form-style form-style-2">
								<div class="user-profile-img"><img src="img/<?php echo $row2[8]?>"></div>
								<p class="user-profile-p">
									<label>Profile Picture</label>
									<div class="fileinputs">
										<input type="file" class="file" name="img">
										<div class="fakefile">
											<button type="button" class="button small margin_0">Select file</button>
											<span><i class="icon-arrow-up"></i>Browse</span>
										</div>
									</div>
								<p></p>
								<div class="clearfix"></div>
							
							</div>
							
							<p class="form-submit">
								<input type="submit" value="Update" name="btnUpdate" class="button color small login-submit submit">
							</p>
						</form>
					</div>
				</div><!-- End page-content -->
			</div><!-- End main -->
			<?php
include 'SideBar.php';
?>

		</div><!-- End row -->
	</section><!-- End container -->
	<?php	
	include 'footer.php';
	?>