<?php include 'header.php';

include '../functions/examlistfun.php';
include '../functions/livecoursefun.php';


include '../functions/test_seriesfun.php';
$list_exam = list_exams();
$list_test= list_test_series();


	?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			List Test Series
			<small>Preview</small>
		</h1>
		<ol class="breadcrumb">
			<li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
			<li><a href="#">List Test Series</a></li>
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
									<th>Exam</th>
                  <th>LOGO</th>
                  <th>Price</th>
                  <th>Offer Price</th>
                  <th>Feature 1</th>
                  <th>Feature 2</th>
                  <th>Feature 3</th>
									<th>Delete</th>
									<th>Edit</th>
								</tr>
							</thead>
							<tbody>
								<?php
									$i=1;
									while($fetch =  mysqli_fetch_array($list_test,MYSQLI_ASSOC))

									{

										?>
								<tr>
									<td><?php echo $i++; ?></td>
									<td><?php echo $fetch['title'] ?></td>
                  <td><?php
                  // while ($fetch_exam = mysqli_fetch_array($list_exam, MYSQLI_ASSOC)) {
                  // if ($fetch['exam']==$fetch_exam['id']) {
                  //   echo $fetch_exam['exam_name'];
                  // }
                  // }
                  echo getexam($fetch['exam']);

                   ?></td>

									<td><a href=<?php echo $fetch['logo'];?>> <?php echo $fetch['logo'] ?></a></td>
                  <td><?php echo $fetch['price'] ?></td>
                  <td><?php echo $fetch['offer_price'] ?></td>
                  <td><?php echo $fetch['feature_1'] ?></td>
                  <td><?php echo $fetch['feature_2'] ?></td>
                  <td><?php echo $fetch['feature_3'] ?></td>


									<td> <a href=<?php echo "delete_testseries.php?id=".$fetch['id']; ?>> <button type="button" class="btn btn-danger">Delete</button> </a></td>
									<td> <a href=<?php echo "edit_testseries.php?id=".$fetch['id']; ?>><button type="button" class="btn btn-info">Edit</button></a></td>
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
