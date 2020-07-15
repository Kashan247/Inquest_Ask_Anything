<?php
    include '../Connection.php';
    $query="Select * from users";
    $result=mysqli_query($conn,$query);

    if(isset($_POST['submit']))
        {
            $user=$_SESSION['user_id'];
            $msg=$_POST['msg'];
            $date=date('d-m-y h:i:s');
            echo "<script>alert(".$date.")</script>";
            $query1="insert into feedback(U_Id,F_Massage,F_DateTime)values('$user','$msg','$date')";
            $result1=mysqli_query($conn,$query1);
                if($result1)
                    {
						echo "<script>alert('Thank You for your Feedback !');</script>";

					}else{
						echo "<script>alert('Sarkar phely login karain phr Feedback acha sa dain. shukria');</script>";
						echo "<script>alert('".mysqli_error($conn)."');</script>";
						 }
		} 
		if((isset($_SESSION['user'])))
		{
?>
					<div class="col-md-7">
					<div class="page-content">
						<h2>Say hello !</h2>
						<form  method="POST" enctype="multipart/form-data">
							<div class="form-inputs clearfix">
								<!-- <p>
									<label for="name" class="required">Name<span>*</span></label>
									<input type="text" class="required-item" value="" name="name" id="name" aria-required="true">
								</p> -->
								<!-- <p>
									<label for="mail" class="required">E-Mail<span>*</span></label>
									<input type="email" class="required-item" id="mail" name="mail" value="" aria-required="true">
								</p> -->
							</div>
							<div class="form-textarea">
								<p>
									<label for="message" class="required">Feedback<span>*</span></label>
									<textarea id="message" required class="required-item" name="msg"  aria-required="true" cols="60" rows="7"></textarea>
								</p>
							</div>
							<p class="form-submit">
								<input name="submit" type="submit" value="Send" class="submit button small color">
							</p>
						</form>
				</div>	</div><!-- End col-md-6 -->
<?php
}
?>