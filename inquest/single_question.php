<?php
include 'head.php';
// if(!isset($_SESSION['user']))
// {
// 	echo "<script>alert('Please Login first');</script>";
// 	header('location:index.php');
// }else{

?>
	<div class="breadcrumbs">
		<section class="container">
			<div class="row">
				<div class="col-md-12">
					<h1>This is my first Question</h1>
				</div>
				<div class="col-md-12">
					<div class="crumbs">
						<a href="#">Home</a>
						<span class="crumbs-span">/</span>
						<a href="#">Questions</a>
						<span class="crumbs-span">/</span>
						<span class="current">This is my first Question</span>
					</div>
				</div>
			</div><!-- End row -->
		</section><!-- End container -->
	</div><!-- End breadcrumbs -->
	
	<?php
include '../Connection.php';
if(isset($_GET['id']))
{
	$id=$_GET['id'];
	$query="select * from postquestion where PQ_Id='$id'";
	$result=mysqli_query($conn,$query);
}
?>


	<section class="container main-content">
		<div class="row">
			<div class="col-md-9">
				<article class="question single-question question-type-normal">
				<?php while($row=mysqli_fetch_array($result))
                    {
		?>

					<h2>
					<?php echo $row['PQ_Questions'];?>
					</h2>
					<!-- <a class="question-report" href="#">Report</a>
					<div class="question-type-main"><i class="icon-question-sign"></i>Question</div> -->
					<div class="question-inner">
						<div class="clearfix"></div>
						<!-- <div class="question-desc">
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi adipiscing gravida odio, sit amet suscipit risus ultrices eu. Fusce viverra neque at purus laoreet consequat. Vivamus vulputate posuere nisl quis consequat. Donec congue commodo mi, sed commodo velit fringilla ac. Fusce placerat venenatis mi. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Cras ornare, dolor a aliquet rutrum, dolor turpis condimentum leo, a semper lacus purus in felis. Quisque blandit posuere turpis, eget auctor felis pharetra eu .</p>
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi adipiscing gravida odio, sit amet suscipit risus ultrices eu. Fusce viverra neque at purus laoreet consequat. Vivamus vulputate posuere nisl quis consequat. Donec congue commodo mi, sed commodo velit fringilla ac. Fusce placerat venenatis mi. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Cras ornare, dolor a aliquet rutrum, dolor turpis condimentum leo, a semper lacus purus in felis. Quisque blandit posuere turpis, eget auctor felis pharetra eu .</p>
						</div> -->
						<div class="question-details">
							<span class="question-answered question-answered-done"><i class="icon-ok"></i>solved</span>
							<!-- <span class="question-favorite"><i class="icon-star"></i>5</span> -->
						</div>
						<?php
                            $catQuery="select * from category where Cate_Id=".$row['Cate_Id'];
                            $catResult=mysqli_query($conn,$catQuery);
                            $catRow=mysqli_fetch_assoc($catResult);
                        ?>

						<span class="question-category"><a href="#"><i class="icon-folder-close"></i><?php echo $catRow['Cate_Name'];?></a></span>
						<span class="question-date"><i class="icon-time"></i><?php echo $row['PQ_DateTime'];?></span>
						<!-- <span class="question-comment"><a href="#"><i class="icon-comment"></i>5 Answer</a></span> -->

                                    <?php
                                    $catQuery="select * from users where U_Id=".$row['U_Id'];
                                    $catResult=mysqli_query($conn,$catQuery);
                                    $catRow=mysqli_fetch_assoc($catResult);
                                    ?>

									<span class="question-view"><i class="icon-user"></i><?php echo $catRow['U_Name'];?></span>
						<span class="single-question-vote-result">+22</span>
						<ul class="single-question-vote">
							<li><a href="#" class="single-question-vote-down" title="Dislike"><i class="icon-thumbs-down"></i></a></li>
							<li><a href="#" class="single-question-vote-up" title="Like"><i class="icon-thumbs-up"></i></a></li>
						</ul>
						<div class="clearfix"></div>
					</div>
				</article>
				<?php
                          }
                            ?>
				
				<!-- <div class="share-tags page-content">
					<div class="question-tags"><i class="icon-tags"></i>
						<a href="#">wordpress</a>, <a href="#">question</a>, <a href="#">developer</a>
					</div>
					<div class="share-inside-warp">
						<ul>
							<li>
								<a href="#" original-title="Facebook">
									<span class="icon_i">
										<span class="icon_square" icon_size="20" span_bg="#3b5997" span_hover="#666">
											<i i_color="#FFF" class="social_icon-facebook"></i>
										</span>
									</span>
								</a>
								<a href="#" target="_blank">Facebook</a>
							</li>
							<li>
								<a href="#" target="_blank">
									<span class="icon_i">
										<span class="icon_square" icon_size="20" span_bg="#00baf0" span_hover="#666">
											<i i_color="#FFF" class="social_icon-twitter"></i>
										</span>
									</span>
								</a>
								<a target="_blank" href="#">Twitter</a>
							</li>
							<li>
								<a href="#" target="_blank">
									<span class="icon_i">
										<span class="icon_square" icon_size="20" span_bg="#ca2c24" span_hover="#666">
											<i i_color="#FFF" class="social_icon-gplus"></i>
										</span>
									</span>
								</a>
								<a href="#" target="_blank">Google plus</a>
							</li>
							<li>
								<a href="#" target="_blank">
									<span class="icon_i">
										<span class="icon_square" icon_size="20" span_bg="#e64281" span_hover="#666">
											<i i_color="#FFF" class="social_icon-dribbble"></i>
										</span>
									</span>
								</a>
								<a href="#" target="_blank">Dribbble</a>
							</li>
							<li>
								<a target="_blank" href="#">
									<span class="icon_i">
										<span class="icon_square" icon_size="20" span_bg="#c7151a" span_hover="#666">
											<i i_color="#FFF" class="icon-pinterest"></i>
										</span>
									</span>
								</a>
								<a href="#" target="_blank">Pinterest</a>
							</li>
						</ul>
						<span class="share-inside-f-arrow"></span>
						<span class="share-inside-l-arrow"></span>
					</div> End share-inside-warp 
					<div class="share-inside"><i class="icon-share-alt"></i>Share</div>
					<div class="clearfix"></div>
				</div>< End share-tags -->
				
				<!-- <div class="about-author clearfix">
				    <div class="author-image">
				    	<a href="#" original-title="admin" class="tooltip-n"><img alt="" src="../ask-me/images/demo/admin.jpg"></a>
				    </div>
				    <div class="author-bio">
				        <h4>About the Author</h4>
				        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed viverra auctor neque. Nullam lobortis, sapien vitae lobortis tristique.
				    </div>
				</div><-- End about-author -->
				
				<!-- <div id="related-posts">
					<h2>Related questions</h2>
					<ul class="related-posts">
						<li class="related-item"><h3><a href="#"><i class="icon-double-angle-right"></i>This Is My Second Poll Question</a></h3></li>
						<li class="related-item"><h3><a href="#"><i class="icon-double-angle-right"></i>This is my third Question</a></h3></li>
						<li class="related-item"><h3><a href="#"><i class="icon-double-angle-right"></i>This is my fourth Question</a></h3></li>
						<li class="related-item"><h3><a href="#"><i class="icon-double-angle-right"></i>This is my fifth Question</a></h3></li>
					</ul>
				</div>End related-posts --> 
<?php
include 'ViewAnswer.php';
?>


<?php

$query="Select * from postquestion where PQ_Id='$id'" ;
$result=mysqli_query($conn,$query);

$query2="Select * from users";
$result2=mysqli_query($conn,$query2);

if(isset($_POST['btnSubmit']))
{
  $user=$_SESSION['user_id'];
  $ques=$_POST['ques'];
	$ans=$_POST['ans'];
	$date=date('d-m-y h:i:s');
	echo "<script>alert(".$date.")</script>";
    $query1="insert into postanswer(U_Id,PQ_Id,PA_Answer,PA_DateTime)values('$user','$ques','$ans','$date')";
  $result1=mysqli_query($conn,$query1);
    if($result1)
    {
		// header('location:single_question.php?id='.$id)
		echo "<script>alert('inserted');</script>";

    }else{
        echo "<script>alert('".mysqli_error($conn)."');</script>";
        echo "<script>alert('Failed');</script>";
    }
}

?>


<?php if(isset($_SESSION['user']))
				  {

				  ?>

				
				<div id="respond" class="comment-respond page-content clearfix">
				    <div class="boxedtitle page-title"><h2>Leave a reply</h2></div>
				    <form  method="post" id="commentform" class="comment-form">
				        <div id="respond-inputs" class="clearfix">
				            <!-- <p>
				                <label class="required" for="comment_name">Name<span>*</span></label>
				                <input name="author" type="text" value="" id="comment_name" aria-required="true">
				            </p> -->
				            <!-- <p>
							<label for="user" class="required" for="comment_email">User Name</label>
 							<select name="user" >
    				    <?php
    					  //  while($row=mysqli_fetch_array($result2))
    					    {
    				    ?>
            			    <option value=<?php// echo $row['U_Id'];?>>
            			 <?php// echo $row['U_Name'];?>
            			    </option>
       						 <?php
      						}
      						?>
    						</select>
				                <label class="required" for="comment_email">E-Mail<span>*</span></label>
				                <input name="email" type="text" value="" id="comment_email" aria-required="true">
				            </p> -->

				             <p class="last">

							<label for="ques" class="required" for="comment_url">Question</label>
    						<select name="ques" >
    					    <?php
    					    while($row=mysqli_fetch_array($result))
    						    {
    					    ?>
        			        <option value=<?php echo $row['PQ_Id'];?>>
        			        <?php echo $row['PQ_Questions'];?>
        			        </option>
    					    <?php
    					    }
    					    ?>
   							</select>
				                <!-- <label class="required" for="comment_url">Website<span>*</span></label>
				                <input name="url" type="text" value="" id="comment_url"> -->
				            </p> 
				        </div>
				        <div id="respond-textarea">
				            <p>
				                <label class="required" for="ans">Answer<span>*</span></label>
				                <textarea id="comment" name="ans" aria-required="true" cols="58" rows="8"></textarea>
				            </p>
							<!-- <p>
							<label for="st">Status </label>
			                Approved <input type="radio" name="st" value="Approved">
        			        Non related <input type="radio" name="st" value="Not Related">
							</p> -->



				        </div>
				        <p class="form-submit">
				        	<input name="btnSubmit" type="submit" id="submit" value="Post your answer" class="button small color">
		
				        </p>
				    </form>

				</div>
				<?php
				  }
				  ?>
				
				<!-- <div class="post-next-prev clearfix">
				    <p class="prev-post">
				        <a href="#"><i class="icon-double-angle-left"></i>&nbsp;Prev question</a>
				    </p>
				    <p class="next-post">
				        <a href="#">Next question&nbsp;<i class="icon-double-angle-right"></i></a>                                
				    </p>
				</div>End post-next-prev	 -->
			</div><!-- End main -->
			<?php
include 'SideBar.php';
?>

		</div><!-- End row -->
	</section><!-- End container -->
	
<?php
include 'footer.php';

?>