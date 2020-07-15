<?php

include 'head.php';
if(!isset($_SESSION['user']))
{
	header('location:index.php');
}else{
include '../Connection.php';
$userId=$_SESSION['user_id'];
$query="select * from postquestion where U_Id=".$userId;
$result=mysqli_query($conn,$query);


?>


	<div class="breadcrumbs">
		<section class="container">
			<div class="row">
				<div class="col-md-12">
					<h1>Questions Category</h1>
				</div>
				<div class="col-md-12">
					<div class="crumbs">
						<a href="#">Home</a>
						<span class="crumbs-span">/</span>
						<span class="current">Questions </span>
					</div>
				</div>
			</div><!-- End row -->
		</section><!-- End container -->
	</div><!-- End breadcrumbs -->



<section class="container main-content">
		<div class="row">
			<div class="col-md-9">
            
				<div class="tabs-warp question-tab">
		            <!-- <ul class="tabs">
		                <li class="tab"><a href="#" class="current">Recent Questions</a></li>
		                <li class="tab"><a href="#">Most Responses</a></li>
		                <li class="tab"><a href="#">Recently Answered</a></li>
		                <li class="tab"><a href="#">No answers</a></li>
		            </ul>
		         -->
				
		            <div class="tab-inner-warp">
						<div class="tab-inner">
                        <?php while($row=mysqli_fetch_array($result))
                          {
                        ?>
                            <article class="question question-type-normal">
								<h2>


								<?php echo	"<a href='single_question.php?id=".$row['PQ_Id']."'>".  $row['PQ_Questions']."</a>";?>
								</h2>
								<!-- <a class="question-report" href="#">Report</a>
								<div class="question-type-main"><i class="icon-question-sign"></i>Question</div> -->
								<div class="question-author">
                                <?php
                                    $catQuery="select * from users where U_Id=".$row['U_Id'];
                                    $catResult=mysqli_query($conn,$catQuery);
                                    $catRow=mysqli_fetch_assoc($catResult);
                                    ?>

									<a href="#" original-title="ahmed" class="question-author-img tooltip-n"><span></span><img alt="" src="img/<?php echo $catRow['U_Image']?>"></a>
								</div>
								<div class="question-inner">
									<div class="clearfix"></div>
									<p class="question-desc"></p>
									<div class="question-details">
										<span class="question-answered question-answered-done"><i class="icon-ok"></i>solved</span>
										<span class="question-favorite"><i class="icon-star"></i>5</span>
									</div>
                                    <?php
                                    $catQuery="select * from category where Cate_Id=".$row['Cate_Id'];
                                    $catResult=mysqli_query($conn,$catQuery);
                                    $catRow=mysqli_fetch_assoc($catResult);
                                    ?>
									<span class="question-category"><a href="#"><i class="icon-folder-close"></i><?php echo $catRow['Cate_Name'];?></a></span>
									<span class="question-date"><i class="icon-time"></i><?php echo $row['PQ_DateTime'];?></span>
									<span class="question-comment"><a href="#"><i class="icon-comment"></i>5 Answer</a></span>
                                    <?php
                                    $catQuery="select * from users where U_Id=".$row['U_Id'];
                                    $catResult=mysqli_query($conn,$catQuery);
                                    $catRow=mysqli_fetch_assoc($catResult);
                                    ?>

									<span class="question-view"><i class="icon-user"></i><?php echo $catRow['U_Name'];?></span>
									<div class="clearfix"></div>
								</div>
							</article>
                            <?php
                          }
                            ?>
                        </div>

                    </div>

            </div>

    <table class="table table-hover">
        <!-- <tr>
            <th> Id</th>
            <th> User</th>
            <th> Category</th>
            <th> Question</th>
            <th> Date</th>
            <th> Action</th>
         
        </tr> -->
        <?php while($row=mysqli_fetch_array($result))
        {
        echo "<tr>";
          echo"<td>".$row['PQ_Id']."</td>";
          $query2="select * from users where U_Id=".$row['U_Id'];
          $result2=mysqli_query($conn,$query2);
          $row2=mysqli_fetch_row($result2);
          echo"<td>".$row2[1]."</td>";

          $query1="select * from category where Cate_Id=".$row['Cate_Id'];
          $result1=mysqli_query($conn,$query1);
          $row1=mysqli_fetch_row($result1);
          echo"<td>".$row1[1]."</td>";

          echo"<td>".$row['PQ_Questions']."</td>";

          echo"<td>".$row['PQ_DateTime']."</td>";
       
          echo "<td><a href='EditQuestion.php?id=".$row['PQ_Id']."'>Edit</a>  <a href='DeleteQuestion.php?id=".$row['PQ_Id']."'>Delete</a> </td>";
            
          
          echo "</tr>";
        }
        ?>
    </table>
    </div>
			<aside class="col-md-3 sidebar">
				<div class="widget widget_stats">
					<h3 class="widget_title">Stats</h3>
					<div class="ul_list ul_list-icon-ok">
						<ul>
							<li><i class="icon-question-sign"></i>Questions ( <span>20</span> )</li>
							<li><i class="icon-comment"></i>Answers ( <span>50</span> )</li>
						</ul>
					</div>
				</div>
				
				<div class="widget widget_social">
					<h3 class="widget_title">Find Us</h3>
					<ul>
						<li class="rss-subscribers">
							<a href="#" target="_blank">
							<strong>
								<i class="icon-rss"></i>
								<span>Subscribe</span><br>
								<small>To RSS Feed</small>
							</strong>
							</a>
						</li>
						<li class="facebook-fans">
							<a href="#" target="_blank">
							<strong>
								<i class="social_icon-facebook"></i>
								<span>5,000</span><br>
								<small>People like it</small>
							</strong>
							</a>
						</li>
						<li class="twitter-followers">
							<a href="#" target="_blank">
							<strong>
								<i class="social_icon-twitter"></i>
								<span>3,000</span><br>
								<small>Followers</small>
							</strong>
							</a>
						</li>
						<li class="youtube-subs">
							<a href="#" target="_blank">
							<strong>
								<i class="icon-play"></i>
								<span>1,000</span><br>
								<small>Subscribers</small>
							</strong>
							</a>
						</li>
					</ul>
				</div>
				
				<div class="widget widget_login">
					<h3 class="widget_title">Login</h3>
					<div class="form-style form-style-2">
						<form>
							<div class="form-inputs clearfix">
								<p class="login-text">
									<input type="text" value="Username" onfocus="if (this.value == 'Username') {this.value = '';}" onblur="if (this.value == '') {this.value = 'Username';}">
									<i class="icon-user"></i>
								</p>
								<p class="login-password">
									<input type="password" value="Password" onfocus="if (this.value == 'Password') {this.value = '';}" onblur="if (this.value == '') {this.value = 'Password';}">
									<i class="icon-lock"></i>
									<a href="#">Forget</a>
								</p>
							</div>
							<p class="form-submit login-submit">
								<input type="submit" value="Log in" class="button color small login-submit submit">
							</p>
							<div class="rememberme">
								<label><input type="checkbox" checked="checked"> Remember Me</label>
							</div>
						</form>
						<ul class="login-links login-links-r">
							<li><a href="#">Register</a></li>
						</ul>
						<div class="clearfix"></div>
					</div>
				</div>
				
				<div class="widget widget_highest_points">
					<h3 class="widget_title">Highest points</h3>
					<ul>
						<li>
							<div class="author-img">
								<a href="#"><img width="60" height="60" src="../ask-me/images/demo/admin.jpg" alt=""></a>
							</div> 
							<h6><a href="#">admin</a></h6>
							<span class="comment">12 Points</span>
						</li>
						<li>
							<div class="author-img">
								<a href="#"><img width="60" height="60" src="../ask-me/images/demo/avatar.png" alt=""></a>
							</div> 
							<h6><a href="#">vbegy</a></h6>
							<span class="comment">10 Points</span>
						</li>
						<li>
							<div class="author-img">
								<a href="#"><img width="60" height="60" src="../ask-me/images/demo/avatar.png" alt=""></a>
							</div> 
							<h6><a href="#">ahmed</a></h6>
							<span class="comment">5 Points</span>
						</li>
					</ul>
				</div>
				
				<div class="widget widget_tag_cloud">
					<h3 class="widget_title">Tags</h3>
					<a href="#">projects</a>
					<a href="#">Portfolio</a>
					<a href="#">Wordpress</a>
					<a href="#">Html</a>
					<a href="#">Css</a>
					<a href="#">jQuery</a>
					<a href="#">2code</a>
					<a href="#">vbegy</a>
				</div>
				
				<div class="widget">
					<h3 class="widget_title">Recent Questions</h3>
					<ul class="related-posts">
						<li class="related-item">
							<h3><a href="#">This is my first Question</a></h3>
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
							<div class="clear"></div><span>Feb 22, 2014</span>
						</li>
						<li class="related-item">
							<h3><a href="#">This Is My Second Poll Question</a></h3>
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
							<div class="clear"></div><span>Feb 22, 2014</span>
						</li>
					</ul>
				</div>
				
			</aside><!-- End sidebar -->
		</div><!-- End row -->
	</section><!-- End container -->
		
	<?PHP
	
	include 'footer.php';
}
	?>