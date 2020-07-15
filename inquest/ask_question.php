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
					<h1>Ask Question</h1>
				</div>
				<div class="col-md-12">
					<div class="crumbs">
						<a href="#">Home</a>
						<span class="crumbs-span">/</span>
						<!-- <a href="#">Pages</a>
						<span class="crumbs-span">/</span> -->
						<span class="current">Ask Question</span>
					</div>
				</div>
			</div><!-- End row -->
		</section><!-- End container -->
	</div><!-- End breadcrumbs -->
	
<?php

$query="Select * from Category";
$result=mysqli_query($conn,$query);

$query2="Select * from users";
$result2=mysqli_query($conn,$query2);

if(isset($_POST['btnSubmit']))
{
    $user=$_SESSION['user_id'];
    $category=$_POST['category'];
    $question=$_POST['question'];
   $date=date('d-m-y h:i:s');
   echo "<script>alert(".$date.")</script>";
    $query1="insert into postquestion(U_Id,Cate_Id,PQ_Questions,PQ_DateTime)values('$user','$category','$question','$date')";
  $result1=mysqli_query($conn,$query1);
    if($result1)
    {
	   // echo "Data Inserted";
	   echo "<script>alert('inserted');</script>";

    }else{
        echo "<script>alert('".mysqli_error($conn)."');</script>";
        echo "<script>alert('Failed');</script>";
    }
}

?>
	<section class="container main-content">
		<div class="row">
			<div class="col-md-9">
				
				<div class="page-content ask-question">
					<div class="boxedtitle page-title"><h2>Ask Question</h2></div>
					
					
					<div class="form-style form-style-3" id="question-submit">
						<form method="Post">
							<div class="form-inputs clearfix">



							<!-- <p>
									<label class="required">User Name<span>*</span></label>
									<span class="styled-select">
										<select name="user">
										<?php
										 // while($row=mysqli_fetch_array($result2))
										  {
										  ?>
											   <option value=<?php //echo $row['U_Id'];?>>
               									<?php //echo $row['U_Name'];?>
            								    </option>
        <?php
        }
        ?>
										</select>
									</span>
								</p> -->


								<p>
									<label class="required">Category<span>*</span></label>
									<span class="styled-select">
									<select name="category" >
        <?php
        while($row=mysqli_fetch_array($result))
        {
        ?>
                <option value="<?php echo $row['Cate_Id'];?>">
                <?php echo $row['Cate_Name'];?>
                </option>
        <?php
        }
        ?>
										</select>
									</span>
									<span class="form-description">Please choose the appropriate section so easily search for your question .</span>
								</p>
							</div>
							<div id="form-textarea">
								<p>
									<label class="required">Question<span>*</span></label>
									<textarea id="question-details" name="question" aria-required="true" cols="58" rows="8"></textarea>
									<span class="form-description">Type the questoin thoroughly and in detail .</span>
								</p>
							</div>

							<!-- <div class="form-group">
							<label class="required">Date<span>*</span></label>
							  <input required type="date" id="date" name="date">
 							 </div> -->
							<p class="form-submit">
								<input type="submit" id="publish-question" name="btnSubmit" value="Publish Your Question" class="button color small submit">
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
		
	<?PHP
	
	include 'footer.php';
}
	?>