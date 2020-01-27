<?php include 'header.php';
include '../functions/coursefun.php';
include '../functions/examlistfun.php';
include '../functions/test_seriesfun.php';
include '../functions/livecoursefun.php';
$list_course = list_course();
$list_exam = list_exams();
$list_test_series=list_test_series();

	?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			List Courses
			<small>Preview</small>
		</h1>
		<ol class="breadcrumb">
			<li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
			<li><a href="#">List Courses</a></li>
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
									<th>Course Name</th>
									<th>Exam</th>
                  <th>Course Thumbnail</th>
                  <th>Course Feature 1</th>
                  <th>Course Feature 2</th>
                  <th>Course Feature 3</th>
                  <th>Course Feature 4</th>
                  <th>Course Feature 5</th>
                  <th>Price</th>
                  <th>Seats</th>
                  <th>Video Counts</th>
                  <th>PDF Counts</th>
                  <th>Test Counts</th>
                  <th>Course Description</th>
                  <th>Course Demo Video</th>
                  <th>Course Demo PDF</th>
                  <th>Test Series</th>

									<th>Delete</th>
									<th>Edit</th>
								</tr>
							</thead>
							<tbody>
								<?php
									$i=1;
									while($fetch =  mysqli_fetch_array($list_course,MYSQLI_ASSOC))

									{

										?>
								<tr>
									<td><?php echo $i++; ?></td>
									<td><?php echo $fetch['course_name'] ?></td>
                  <td><?php
                  echo getexam($fetch['exam']);
                   ?></td>

									<td><a href=<?php echo $fetch['course_thumbnail'];?>> <?php echo $fetch['course_thumbnail'] ?></a></td>
                  <td><?php echo $fetch['course_feature_1'] ?></td>
                  <td><?php echo $fetch['course_feature_2'] ?></td>
                  <td><?php echo $fetch['course_feature_3'] ?></td>
                  <td><?php echo $fetch['course_feature_4'] ?></td>
                  <td><?php echo $fetch['course_feature_5'] ?></td>
                  <td><?php echo $fetch['price'] ?></td>
                  <td><?php echo $fetch['seats'] ?></td>
                  <td><?php echo $fetch['video_count'] ?></td>
                  <td><?php echo $fetch['pdf_count'] ?></td>
                  <td><?php echo $fetch['test_count'] ?></td>
                  <td><?php echo $fetch['course_description'] ?></td>
                  <td><a href=<?php echo $fetch['course_demo_video'];?>> <?php echo $fetch['course_demo_video'] ?></a></td>
                  <td><a href=<?php echo $fetch['course_demo_pdf'];?>> <?php echo $fetch['course_demo_pdf'] ?></a></td>
                  <td><?php
                echo testseries($fetch['test_series_id']);
                   ?></td>

									<td> <a href=<?php echo "delete_course.php?id=".$fetch['id']; ?>> <button type="button" class="btn btn-danger">Delete</button> </a></td>
									<td> <a href=<?php echo "edit_course.php?id=".$fetch['id']; ?>><button type="button" class="btn btn-info">Edit</button></a></td>
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
