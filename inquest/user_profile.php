

<?PHP
include 'head.php';
?>

	
	<div class="breadcrumbs">
		<section class="container">
			<div class="row">
				<div class="col-md-12">
					<h1>User Profile</h1>
				</div>
				<div class="col-md-12">
					<div class="crumbs">
						<a href="#">Home</a>
						<span class="crumbs-span">/</span>
						<a href="#">User</a>
						<span class="crumbs-span">/</span>
						<span class="current">User Profile</span>
					</div>
				</div>
			</div><!-- End row -->
		</section><!-- End container -->
	</div><!-- End breadcrumbs -->
	
	<?php

	if(isset($_GET['id']))
	{
		$id=$_GET['id'];
		include '../Connection.php';
		$query="select * from users where U_Id='$id'";
		$result=mysqli_query($conn,$query);
		$row=mysqli_fetch_array($result);
	}
	
	?>

	<section class="container main-content">
		<div class="row">
			<div class="col-md-9">
				<div class="row">
					<div class="user-profile">
						<div class="col-md-12">
							<div class="page-content">
								<h2>About </h2>
								<div class="user-profile-img"><img alt="user" src="img/<?php echo $row['U_Image']?>">
								</div>
								<div class="ul_list ul_list-icon-ok about-user">
									<ul>
									<br><br>
     									<li> <h5><i class="icon-user"></i>Name : <?php echo $row['U_Name']?></h5> </li>
										<li> <h5><i class="icon-mail"></i>Email : <?php echo $row['U_Email']?> </h5></i> 
										<!-- <li><i class="icon-plus"></i>Registerd : <span>Jan 10, 2014</span></li> -->
										<li> <h5><i class="icon-map-marker"></i>Country : <?php echo $row['U_Country']?> </h5></li>
										<li> <h5><i class="icon-map-marker"></i>City : <?php echo $row['U_City']?> </h5></li>
										<li> <h5><i class="icon-mail"></i>Contact : <?php echo $row['U_Contact']?></h5></i>
										<li> <h5><i class="icon-map-marker"></i>Postal Code : <?php echo $row['U_PostalCode']?> </h5></li>
										<li> <h5><i class="icon-mail"></i>Contact : <?php echo $row['U_Contact']?></h5></i>
										<li> <h5><i class="icon-mail"></i>Gender : <?php echo $row['U_Gender']?></h5></i> 
										<li> <h5><i class="icon-mail"></i>Date of Birth : <?php echo $row['U_DOB']?></h5></i> 


									</ul>
								</div>
								<!-- <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi adipiscing gravida odio, sit amet suscipit risus ultrices eu. Fusce viverra neque at purus laoreet consequat. Vivamus vulputate posuere nisl quis consequat. Donec congue commodo mi, sed commodo velit fringilla ac. Fusce placerat venenatis mi. Pellentesque habitant morbi tristique senectus et netus et malesuada .</p> -->
								<div class="clearfix"></div>
								<span class="user-follow-me">Follow Me</span>
								<a href="https://www.facebook.com/" original-title="Facebook" class="tooltip-n">
									<span class="icon_i">
										<span class="icon_square" icon_size="30" span_bg="#3b5997" span_hover="#2f3239">
											<i class="social_icon-facebook"></i>
										</span>
									</span>
								</a>
								<a href="https://twitter.com/explore" original-title="Twitter" class="tooltip-n">
									<span class="icon_i">
										<span class="icon_square" icon_size="30" span_bg="#00baf0" span_hover="#2f3239">
											<i class="social_icon-twitter"></i>
										</span>
									</span>
								</a>
								<a href="https://pk.linkedin.com/" original-title="Linkedin" class="tooltip-n">
									<span class="icon_i">
										<span class="icon_square" icon_size="30" span_bg="#006599" span_hover="#2f3239">
											<i class="social_icon-linkedin"></i>
										</span>
									</span>
								</a>
								<a href="https://www.google.com/" original-title="Google plus" class="tooltip-n">
									<span class="icon_i">
										<span class="icon_square" icon_size="30" span_bg="#c43c2c" span_hover="#2f3239">
											<i class="social_icon-gplus"></i>
										</span>
									</span>
								</a>
								<a href="https://www.google.com/" original-title="Email" class="tooltip-n">
									<span class="icon_i">
										<span class="icon_square" icon_size="30" span_bg="#000" span_hover="#2f3239">
											<i class="social_icon-email"></i>
										</span>
									</span>
								</a>
							</div><!-- End page-content -->
						</div><!-- End col-md-12 -->
						<div class="col-md-12">
							<div class="page-content page-content-user-profile">
								<div class="user-profile-widget">
									<h2>User Stats</h2>
									<div class="ul_list ul_list-icon-ok">
										<ul>
										<li>
							<?php
                            $countq="SELECT count( * ) as  PQ_Questions FROM postquestion where U_Id='$id'";
                            $resultq=mysqli_query($conn,$countq);
                            while($rowq=mysqli_fetch_array($resultq))
                            {
                        ?>
							<i class="icon-question-sign"></i>Questions ( <span><?php echo $rowq['PQ_Questions'];?></span> )<?php }?></li>
							
							<li>
							<?php
                            $counta="SELECT count( * ) as  PA_Answer FROM postanswer where U_Id='$id'";
                            $resulta=mysqli_query($conn,$counta);
                            while($rowa=mysqli_fetch_array($resulta))
                            {
                        ?>
							<i class="icon-comment"></i>Answers ( <span><?php echo $rowa['PA_Answer'];?></span> )<?php }?> </li>
											<!-- <li><i class="icon-star"></i><a href="user_favorite_questions.html">Favorite Questions<span> ( <span>3</span> ) </span></a></li>
											<li><i class="icon-heart"></i><a href="user_points.html">Points<span> ( <span>20</span> ) </span></a></li>
											<li><i class="icon-asterisk"></i>Best Answers<span> ( <span>2</span> ) </span></li> -->
										</ul>
									</div>
								</div><!-- End user-profile-widget -->
							</div><!-- End page-content -->
						</div><!-- End col-md-12 -->
					</div><!-- End user-profile -->
				</div><!-- End row -->
				<!-- <div class="clearfix"></div>
				<div class="page-content">
					<div class="user-stats">
						<div class="user-stats-head">
							<div class="block-stats-1 stats-head">#</div>
							<div class="block-stats-2 stats-head">Today</div>
							<div class="block-stats-3 stats-head">Month</div>
							<div class="block-stats-4 stats-head">Total</div>
						</div>
						<div class="user-stats-item">
							<div class="block-stats-1">Questions</div>
							<div class="block-stats-2">5</div>
							<div class="block-stats-3">20</div>
							<div class="block-stats-4">100</div>
						</div>
						<div class="user-stats-item">
							<div class="block-stats-1">Answers</div>
							<div class="block-stats-2">30</div>
							<div class="block-stats-3">150</div>
							<div class="block-stats-4">1000</div>
						</div>
						<div class="user-stats-item user-stats-item-last">
							<div class="block-stats-1">Visitors</div>
							<div class="block-stats-2">100</div>
							<div class="block-stats-3">3000</div>
							<div class="block-stats-4">5000</div>
						</div>
					</div>		
					</div>			 -->

						<!-- End page-content --> <!-- End user-stats -->
			</div><!-- End main -->
			<?php
include 'SideBar.php';
?>

		</div><!-- End row -->
	</section><!-- End container -->
		
	<?PHP
	
	include 'footer.php';
	
	?>