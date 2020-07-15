<?php session_start();
include '../Connection.php';
if(isset($_POST['btnLogin']))
{
    $userName=$_POST['userName'];
    $password=$_POST['password'];
    $query="select * from users where U_UserName='$userName' AND U_Password='$password'";
    $result=mysqli_query($conn,$query);
    $row =mysqli_fetch_array($result);

    $count = mysqli_num_rows($result);
    if($count)
    {
		$_SESSION['user']=$userName;
		$_SESSION['user_id']=$row['U_Id'];
        header("Location:index.php");
    }else{
        echo "<script>alert('".mysqli_error($conn)."');</script>";
        echo "<script>alert('Invalid Credentials');</script>";
    }
}
?>

<!DOCTYPE html>

<!--[if (gte IE 9)|!(IE)]><!--><html lang="en"> <!--<![endif]-->

<head>
<link rel="icon" href="images/logo/logo2.png" type="image/gif" sizes="16x16">

	<!-- Basic Page Needs -->
	<meta charset="utf-8">
	<title>INQUEST</title>
	<meta name="description" content="Ask me Responsive Questions and Answers Template">
	<meta name="author" content="2code.info">
	
	<!-- Mobile Specific Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	
	<!-- Main Style -->
	<link rel="stylesheet" href="style.css">
	
	<!-- Skins -->
	<link rel="stylesheet" href="css/skins/skins.css">
	
	<!-- Responsive Style -->
	<link rel="stylesheet" href="css/responsive.css">
	
	<!-- Favicons -->
	<link rel="shortcut icon" href="images/favicon.png">
  
</head>



<body>

<div class="loader"><div class="loader_html"></div></div>




<div id="wrap" class="grid_1200">
	

	<div class="login-panel">
		<section class="container">
			<div class="row">
				<div class="col-md-6">
					<div class="page-content">
						<h2>Login</h2>
						<div class="form-style form-style-3">
							<form method="POST">
								<div class="form-inputs clearfix">
									<p class="login-text">
										<input type="text" required name="userName"  >
										<i class="icon-user"></i>
									</p>
									<p class="login-password">
										<input type="password" required name="password"  >
										<i class="icon-lock"></i>
										<a href="#">Forget</a>
									</p>
								</div>
								<p class="form-submit login-submit">
									<input  type="submit" name="btnLogin"  class="button color small login-submit submit">
								</p>
								<div class="rememberme">
									<label><input type="checkbox" checked="checked"> Remember Me</label>
								</div>
							</form>
						</div>
					</div><!-- End page-content -->
				</div><!-- End col-md-6 -->




				<div class="col-md-6">
					<div class="page-content Register">
						<h2>Register Now</h2>
						<a class="button color small signup">Create an account</a>
					</div><!-- End page-content -->
				</div><!-- End col-md-6 -->
			</div>
		</section>
	</div><!-- End login-panel -->
<?php 
include 'signup.php';	
?>
	<div class="panel-pop" id="lost-password">
		<h2>Lost Password<i class="icon-remove"></i></h2>
		<div class="form-style form-style-3">
			<p>Lost your password? Please enter your username and email address. You will receive a link to create a new password via email.</p>
			<form>
				<div class="form-inputs clearfix">
					<p>
						<label class="required">Username<span>*</span></label>
						<input type="text">
					</p>
					<p>
						<label class="required">E-Mail<span>*</span></label>
						<input type="email">
					</p>
				</div>
				<p class="form-submit">
					<input type="submit" value="Reset" class="button color small submit">
				</p>
			</form>
			<div class="clearfix"></div>
		</div>
	</div><!-- End lost-password -->
	
	<div id="header-top">
		<section class="container clearfix">


<nav class="header-top-nav">
				<ul>

					<!-- <li><a href="contact_us.html"><i class="icon-envelope"></i>Contact</a></li>


					<li><a href="#"><i class="icon-headphones"></i>Support</a></li> -->

<?php if(!isset($_SESSION['user'])){ ?>
					<li><a href="login.html" id="login-panel"><i class="icon-user"></i> <b> Login Area </b></a></li>
<?php } ?>
				</ul>
			</nav>


			<!-- <div class="header-search">
				<form>
				    <input type="text" value="Search here ..." onfocus="if(this.value=='Search here ...')this.value='';" onblur="if(this.value=='')this.value='Search here ...';">
				    <button type="submit" class="search-submit"></button>
				</form>
			</div> -->
		</section><!-- End container -->
	</div><!-- End header-top<H2 style="padding-top: 30px;"> <b> INQUEST </b></H2> -->
	<header id="header">
		<section class="container clearfix">
			<div class="logo"><a href="index.php"><img src="images/logo/logo2.png" style="width:40%; height:120px; margin-top:-20px;"></a></div>
			<nav class="navigation">
				<ul>
					<li class="current_page_item"><a href="index.php">Home</a>
					</li>
					<?php if(isset($_SESSION['user'])) 
					{
					echo "<li class='ask_question'><a href='ask_question.php'>Ask Question</a></li>";
					}
					?>
					<li><a href="cat_question.php">Questions</a>
					</li>
					<?php if(isset($_SESSION['user_id'])) 
					{
						$id=$_SESSION['user_id'];
					echo "<li><a href='user_profile.php'>User</a>";
					echo	"<ul>";
					echo		"<li><a href='user_profile.php?id=".$id."'>User Profile</a></li>";
					echo		"<li><a href='UserQuestion.php'>User Questions</a></li>";
					// echo		"<li><a href='user_answers.php'>User Answers</a></li>";
					echo		"<li><a href='user_feedback.php'>User Feedback</a></li>";
					// echo		"<li><a href='user_points.php'>User Points</a></li>";
					echo		"<li><a href='edit_profile.php?id=".$id."'>Edit Profile</a></li>";
					echo		"<li><a href='LogOut.php'>Logout</a></li>";
					echo	"</ul>";
					echo	"</li>";
					         }?> 

					<li><a href="contact_us.php">Contact Us</a></li>

					<?php if(isset($_SESSION['user'])) 
					{
					echo "<li><a href='LogOut.php'>Logout</a></li>";
					}?>
				</ul>
			</nav>
		</section><!-- End container -->
	</header><!-- End header -->