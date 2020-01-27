<?php include 'header.php';
	include '../functions/livecoursefun.php';
	$materialtype=$_GET['type'];
	$list=livecoursevideopdf($materialtype);
	?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			Live Course Video..
			<small>Preview</small>
		</h1>
		<ol class="breadcrumb">
			<li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
			<li><a href="#">List Live Videos</a></li>
		</ol>
	</section>
	<!-- Main content -->
	<section class="content">
		<div class="row">
			<div class="box">
				<!-- /.box-header -->
				<div class="box-body">
					<div class="col-md-12 table-responsive">
						<table class="table table-bordered datatable example table-striped">
							<thead>
								<tr>
									<th>#</th>
									<th>Title</th>
									<th>Material Type</th>
									<th>Link</th>
									<th>Thumbnail</th>
									<th>Course</th>
									<th>Status</th>
									<th>Exam</th>
									<th>Subject</th>
									<th>Topic</th>
									<th>Concept</th>
									<th>Section</th>
									<th>PDF Link</th>
									<th>Date and Time</th>
									<th>Download Link</th>
								</tr>
							</thead>
							<tbody>
								<?php
									$i=1;
									
									while($fetch =  mysqli_fetch_array($list,MYSQLI_ASSOC))
									
									{
									
									?>
								<tr>
									<th><?php echo $i++;?></th>
									<th><?php echo $fetch['Title']?></th>
									<th><?php echo $fetch['material_type']?></th>
									<th><a class=""> href="<?php echo $fetch['file_link']?>" ><?php echo $fetch['file_link']?></a></th>
									<th><a href="<?php echo $fetch['thumbnail']?>" ><?php echo $fetch['thumbnail']?></a></th>
									<th><?php echo getcourse($fetch['course_id']); ?></th>
									<th><?php echo getstatus($fetch['live_status']); ?></th>
									<th><?php echo getexam($fetch['exam']); ?></th>
									<th><?php echo getsubject($fetch['subject']); ?></th>
									<th><?php echo gettopicnm($fetch['topic']); ?></th>
									<th><?php echo getconceptnm($fetch['concept']); ?></th>
									<th><?php echo getconceptnm($fetch['section']); ?></th>
									<th><a href="<?php echo $fetch['pdf_link']?>" ><?php echo $fetch['pdf_link']?></a></th>
									<th><?php echo $fetch['date_and_time']?></th>
									<th><a href="<?php echo $fetch['download_link']?>" ><?php echo $fetch['download_link']?></a></th>
								</tr>
								<?php
									}
								?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
		<!-- /.row -->
	</section>
	<!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php include 'footer.php' ?>
<style type="text/css" media="screen">
	a {
  	-ms-word-break: break-all;
  	word-break: break-all;

  	/* Non standard for webkit */
  	word-break: break-word;

  	-webkit-hyphens: auto;
  	-moz-hyphens: auto;
  	hyphens: auto;
}
</style>