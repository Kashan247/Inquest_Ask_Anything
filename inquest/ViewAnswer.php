<?php
include '../Connection.php';
$QId=$_GET['id'];
$QuestionQuery="Select * from postquestion where PQ_Id=".$QId;
$QuestionResult=mysqli_query($conn,$QuestionQuery);
$QuestionRow=mysqli_fetch_array($QuestionResult);
$query="select * from postanswer where PQ_Id=".$QId;
$result=mysqli_query($conn,$query);


?>

<div id="commentlist" class="page-content">
					<div class="boxedtitle page-title"><h2>Answers </h2></div>
                
					<ol class="commentlist clearfix">
					    <li class="comment">
                        <?php while($row=mysqli_fetch_array($result))
        {
  
            ?>
					        <div class="comment-body comment-body-answered clearfix"> 
                            <?php
                                    $catQuery="select * from users where U_Id=".$row['U_Id'];
                                    $catResult=mysqli_query($conn,$catQuery);
                                    $catRow=mysqli_fetch_assoc($catResult);
                                    ?>

					            <div class="avatar"><img alt="" src="img/<?php echo $catRow['U_Image']?>"></div>

					            <div class="comment-text">
					                <div class="author clearfix">
                                        <div class="comment-author"><?php echo $catRow['U_Name'];?></div>
					                	<!-- <div class="comment-vote">
						                	<ul class="question-vote">
						                		<li><a href="#" class="question-vote-up" title="Like"></a></li>
						                		<li><a href="#" class="question-vote-down" title="Dislike"></a></li>
						                	</ul>
					                	</div>
					                	<span class="question-vote-result">+1</span> -->
					                	<div class="comment-meta">
					                        <div class="date"><i class="icon-time"></i><?php echo $row['PA_DateTime'];?></div> 
					                    </div>
										<?php
										if(isset($_SESSION['user_id']))
										{
											if($_SESSION['user_id']==$QuestionRow['U_Id'])
											{
												$st="Approved";
												$appQuery="select * from postanswer where PA_Status='$st' AND PQ_Id=".$row['PQ_Id'];
												$appResult=mysqli_query($conn,$appQuery);
												$count=mysqli_num_rows($appResult);
												if($count==0)
												{
												?>
												<a class="comment-reply" href="AnswerUpdate.php?id=<?php echo $row['PA_Id']?>">Approved</a> 
											
											<?php
												}
											}
										}
										?>
					                    
					                </div>
					                <div class="text"><p><?php echo $row['PA_Answer'];?></p>
					                </div>
									<?php if ( $row['PA_Status']=="Approved")
									{
										?>
									<div class="question-answered question-answered-done"><i class="icon-ok"></i><?php echo $row['PA_Status'];?></div>
					            <?php
								}
								?>
								</div>
					        </div>
                            <?php
        }
        ?>
					</ol><!-- End commentlist -->
				</div><!-- End page-content -->
