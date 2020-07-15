<aside class="col-md-3 sidebar">
				<div class="widget widget_stats">
					<h3 class="widget_title">Stats</h3>
					<div class="ul_list ul_list-icon-ok">
						<ul>
						

							<li>
							<?php
                            $count="SELECT count( * ) as  PQ_Questions FROM postquestion";
                            $result=mysqli_query($conn,$count);
                            while($row=mysqli_fetch_array($result))
                            {
                        ?>
							<i class="icon-question-sign"></i>Questions ( <span><?php echo $row['PQ_Questions'];?></span> )<?php }?></li>
							<li>
							<?php
                            $count1="SELECT count( * ) as  PA_Answer FROM postanswer";
                            $result=mysqli_query($conn,$count1);
                            while($row=mysqli_fetch_array($result))
                            {
                        ?>
							<i class="icon-comment"></i>Answers ( <span><?php echo $row['PA_Answer'];?></span> )<?php }?> </li>
						
						</ul>
					</div>
				</div>
				
				<div class="widget widget_social">
					<h3 class="widget_title">Find Us</h3>
					<ul>
						<!-- <li class="rss-subscribers">
							<a href="#" target="_blank">
							<strong>
								<i class="icon-rss"></i>
								<span>Subscribe</span><br>
								<small>To RSS Feed</small>
							</strong>
							</a>
						</li> -->
						<li class="facebook-fans">
							<a href="https://www.facebook.com/" target="_blank">
							<strong>
								<i class="social_icon-facebook"></i>
								<span>5,000</span><br>
								<small>People like it</small>
							</strong>
							</a>
						</li>
						<li class="twitter-followers">
							<a href="https://twitter.com/Kashank26864438" target="_blank">
							<strong>
								<i class="social_icon-twitter"></i>
								<span>3,000</span><br>
								<small>Followers</small>
							</strong>
							</a>
						</li>
						<li class="youtube-subs">
							<a href="https://www.youtube.com/" target="_blank">
							<strong>
								<i class="icon-play"></i>
								<span>1,000</span><br>
								<small>Subscribers</small>
							</strong>
							</a>
						</li>
					</ul>
				</div>
				<!-- <div class="widget widget_login">
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
				</div> -->
				
                    <div class="widget widget_highest_points">
					<h3 class="widget_title">Admins</h3>

					<ul>
						<li>
							<!-- <div class="author-img">
								<a href="#"><img width="60" height="60" src="../ask-me/images/demo/admin.jpg" alt=""></a>
							</div>  -->
                        <?php
                            $query="select * from admin";
                            $result=mysqli_query($conn,$query);
                            while($row=mysqli_fetch_array($result))
                            {
                        ?>

							<h6 style="color:skyblue;">Name : <?php echo $row['A_Name'];?></h6>
							<span class="comment" style="color:skyblue;">Email : <?php echo $row['A_Email'];?></span>
                            <hr style="color:black;">
                            <?php
                           }
                    ?>
					
                    	</li>
					</ul>
				</div>
				<!-- <div class="widget widget_tag_cloud">
					<h3 class="widget_title">Tags</h3>
					<a href="#">projects</a>
					<a href="#">Portfolio</a>
					<a href="#">Wordpress</a>
					<a href="#">Html</a>
					<a href="#">Css</a>
					<a href="#">jQuery</a>
					<a href="#">2code</a>
					<a href="#">vbegy</a>
				</div> -->
				<div class="widget">
					<h3 class="widget_title">Recent Questions</h3>
					<ul class="related-posts">
						<li class="related-item">
<?php
    $ques="SELECT * FROM postquestion ORDER BY  PQ_Id DESC LIMIT 3;";
    $result12=mysqli_query($conn,$ques);
	while($row12=mysqli_fetch_array($result12))
	{
?>			
							<h3><?php echo	"<a href='single_question.php?id=".$row12['PQ_Id']."'>".  $row12['PQ_Questions']."</a>";?></h3>
							<hr>
							<!-- <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p> -->
							<div class="clear"></div><span>DATE : <?php echo $row12['PQ_DateTime'];?></span>
							<?php
	}
?>
						</li>
						<!-- <li class="related-item">
							<h3><a href="#">This Is My Second Poll Question</a></h3>
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
							<div class="clear"></div><span>Feb 22, 2014</span>
						</li> -->
					</ul>
				</div>
				
			</aside><!-- End sidebar -->
