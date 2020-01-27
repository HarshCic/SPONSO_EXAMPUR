<?php include 'header.php';
	include '../functions/testlistfun.php';
	
	$listtest=listtest();
	
	?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			Tests List
			<small>Preview</small>
		</h1>
		<ol class="breadcrumb">
			<li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
			<li><a href="#">Test list</a></li>
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
									<th>Test series</th>
									<th>Status</th>
									<th>Time</th>
									<th>Questions</th>
									<th>Marks</th>
									<th>Exam Theme</th>
									<th>Delete</th>
									<th>Edit</th>
								</tr>
							</thead>
							<tbody>
								<?php
									$i=1;
									while($fetch =  mysqli_fetch_array($listtest,MYSQLI_ASSOC))
									
									{
									
										?>
								<tr>
									<td><?php echo $i++; ?></td>
									<td><?php echo $fetch['title']; ?></td>
									<td><?php echo gettestnm($fetch['test_series_id']); ?></td>
									<td><?php echo getstatus($fetch['free_flag']); ?></td>
									<td><?php echo $fetch['time'] ?></td>
									<td><?php echo $fetch['questions'] ?></td>
									<td><?php echo $fetch['marks'] ?></td>
									<td><?php echo $fetch['exam_theme'] ?></td>
									<td> <a href=<?php echo "deletetest.php?id=".$fetch['id']; ?>> <button type="button" class="btn btn-danger">Delete</button> </a></td>
									<td> <a href=<?php echo "edittest.php?id=".$fetch['id']; ?>><button type="button" class="btn btn-info">Edit</button></a></td>
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