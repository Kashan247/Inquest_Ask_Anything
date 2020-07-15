<?php
include '../Connection.php';
$query="select * from postquestion ORDER BY  PQ_Id DESC LIMIT 5";
$result=mysqli_query($conn,$query);

?>


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

									<img alt="" src="img/<?php echo $catRow['U_Image']?>">
								</div>
								<div class="question-inner">
									<div class="clearfix"></div>
									<p class="question-desc"></p>
									<div class="question-details">


                                    <?php
                                    $queryans="select PA_Status from postanswer where PA_Status='Approved'";
                                    $resultans=mysqli_query($conn,$queryans);
                                    $count=mysqli_num_rows($resultans);
                                    if($count=="Approved")
                                    {
                                    
								
                                    
									echo	"<span class='question-answered question-answered-done'><i class='icon-ok'></i>solved</span>"; ?>
										<!-- <span class="question-favorite"><i class="icon-star"></i>5</span> -->
                                        <?php
                                    }
                                ?>
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
									<div class="clearfix"></div>
								</div>
							</article>
                            
                            <?php
                          }
                            ?>
                        </div>
                        <a href="cat_question.php" class="load-questions"><i class="icon-refresh"></i>Load More Questions</a>


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
    </section>
