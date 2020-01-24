<?php
	include 'header.php';
	$id=$_GET['id'];
	$mymsg='';
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	   	if (isset($_POST['update'])) {
			$pdf_link=$_POST['link'];
		   	$title=$_POST['title'];
		   	$status=$_POST['status'];
		   	$type=$_POST['type'];
		   	$price=$_POST['price'];

		   	$sql = "UPDATE `study_material` SET `title`='$title',`pdf_link`='$pdf_link',`type`='$type',`free_status`='$status',`price`='$price'  WHERE id='$id'";
			$result = mysqli_query($ses, $sql);
		   	
		   	if ($result) {
		   		$mymsg = "Record updated successfully";
		   	}else{
		      	$mymsg="Something wents wrong";
		   	}
	   	}
		$query1=mysqli_query($ses,"SELECT * FROM study_material WHERE id=$id");
		$fetch=mysqli_fetch_array($query1);
	}else {
	   $query1=mysqli_query($ses,"SELECT * FROM study_material WHERE id=$id");
	   $fetch=mysqli_fetch_array($query1);
	}
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			Edit Study Material
			<small>Preview</small>
		</h1>
		<ol class="breadcrumb">
			<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
			<li><a href="#">Study Material</a></li>
			<li><a href="#">Edit Study Material</a></li>
		</ol>
	</section>
	<!-- Main content -->
	<section class="content">
		<div class="row">
			<div class="col-md-12">
				<div class="box box-primary">
					<!-- /.box-header -->
					<!-- form start -->
					<form method="POST" action="" enctype="multipart/form-data">
						<div class="box-body">
							<?php if($mymsg!='') { ?>
							<div class="form-group">
								<div class="alert alert-success"><?php echo $mymsg; ?></div>
							</div>
							<?php } ?>
							<div class="form-group">
		                        <label for="title">Title <span class="star">*</span></label>
		                        <input type="text" class="form-control" value="<?php echo $fetch['title'] ?> " name="title" placeholder="Include the title of Study material" required>
		                    </div>
		                    <div class="form-group">
		                        <label for="link">Link <span class="star">*</span></label>
		                        <input type="text" class="form-control" name="link" value="<?php echo $fetch['pdf_link'] ?> " aria-describedby="link" placeholder="book.com" required>
		                    </div>
		                    <div class="form-group">
		                        <label for="type">Type <span class="star">*</span></label>
		                        <select class="form-control" name="type" required>
		                           <option value="1" <?php if($fetch['type']==1){echo "selected"; } ?> >Ebooks</option>
		                           <option value="2" <?php if($fetch['type']==2){echo "selected"; } ?>>Class Notes</option>
		                           <option value="3" <?php if($fetch['type']==3){echo "selected"; } ?>>Previous Year Questions</option>
		                        </select>
		                    </div>
		                    <div class="form-group">
		                        <label for="status">Free Status <span class="star">*</span></label>
		                        <select class="form-control" name="status" required>
		                           <option value="0" <?php if($fetch['free_status']==1){echo "selected"; } ?>>Paid</option>
		                           <option value="1" <?php if($fetch['free_status']==1){echo "selected"; } ?>>Free</option>
		                        </select>
		                    </div>
		                    <div class="form-group">
		                        <label for="price">Price <span class="star">*</span></label>
		                        <input type="text" class="form-control" name="price" value="<?php echo $fetch['price']; ?> " placeholder="Enter price in INR" required>
		                    </div>
						</div>
						<div class="box-footer">
							<button type="submit" name="update" class="btn btn-primary">Update</button>
						</div>
					</form>
				</div>
			</div>
		</div>
		<!-- /.row -->
	</section>
	<!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php include 'footer.php' ?>