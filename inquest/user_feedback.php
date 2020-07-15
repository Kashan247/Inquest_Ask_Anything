
<?PHP
include 'head.php';
if(!isset($_SESSION['user']))
{
	echo "<script>alert('Please Login first');</script>";
	header('location:index.php');
}else{

?>
	
	<div class="breadcrumbs">
		<section class="container">
			<div class="row">
				<div class="col-md-12">
					<h1>User Feedback</h1>
				</div>
				<div class="col-md-12">
					<div class="crumbs">
						<a href="#">Home</a>
						<span class="crumbs-span">/</span>
						<a href="#">User</a>
						<span class="crumbs-span">/</span>
						<span class="current">User Feedback</span>
					</div>
				</div>
			</div><!-- End row -->
		</section><!-- End container -->
	</div><!-- End breadcrumbs -->
	
	<section class="container main-content">
		<div class="row">
			<div class="col-md-9">
				<div class="clearfix"></div>

<?php
	include '../Connection.php';
	$query="select * from feedback where U_Id=".$id;
	$result=mysqli_query($conn,$query);
?>
    </table>
</body>
</html>

				<div class="page-content page-content-user">
					<div class="user-questions">
					<?php while($row=mysqli_fetch_array($result))
							        {
								
								?>

						<article class="question user-question">
							<h3 style="color:lightblue;">
								<span class="question-remove">
									<a href="#" original-title="remove the question" class="tooltip-n"><i class="icon-star"></i></a>
								</span>

								<?php echo $row['F_Massage'];?>
							</h3>
							<!-- <div class="question-type-main"><i class="icon-question-sign"></i>Question</div> -->
							<div class="question-content">
								<div class="question-bottom">
									<!-- <div class="question-answered"><i class="icon-ok"></i>in progress</div> -->
									<!-- <span class="question-favorite"><i class="icon-star"></i>5</span> -->
									<!-- <span class="question-category"><a href="#"><i class="icon-folder-close"></i>wordpress</a></span> -->
									<span class="question-date"><i class="icon-time"></i><?php echo $row['F_DateTime'];?></span>
									<!-- <span class="question-comment"><a href="#"><i class="icon-comment"></i>5 Answers</a></span>
									<a class="question-reply" href="#"><i class="icon-reply"></i>Reply</a> -->
									<?php
										$query2="select * from users where U_Id=".$row['U_Id'];
										$result2=mysqli_query($conn,$query2);
										$row2=mysqli_fetch_row($result2);
									?>
									<span class="question-view"><i class="icon-user"></i><?php echo $row2[1];?></span>
								</div>
							</div>
						</article>
						<?php
									}
							?>

					</div>
				</div>
				
				<div class="height_20"></div>
				
				<!-- <div class="pagination">
				    <a href="#" class="prev-button"><i class="icon-angle-left"></i></a>
				    <span class="current">1</span>
				    <a href="#">2</a>
				    <a href="#">3</a>
				    <a href="#">4</a>
				    <a href="#">5</a>
				    <span>...</span>
				    <a href="#">11</a>
				    <a href="#">12</a>
				    <a href="#">13</a>
				    <a href="#" class="next-button"><i class="icon-angle-right"></i></a>
				</div> -->
				
				<!-- End pagination -->
				<!-- if no questions
				<p>No questions yet</p>
				-->
			</div><!-- End main -->
			<?php
include 'SideBar.php';
?>

		</div><!-- End row -->
	</section><!-- End container -->
		
	<?PHP
	
	include 'footer.php';
}
	?>