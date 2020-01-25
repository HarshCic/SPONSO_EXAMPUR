<?php include 'header.php';
	include '../functions/conceptfun.php';	
	$allconcept=list_conceptfun();
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			All Concept
			<small>Preview</small>
		</h1>
		<ol class="breadcrumb">
			<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
			<li><a href="#">All Concept</a></li>
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
									<th>Concept Name</th>
									<th>Concept Logo</th>
									<th>Delete</th>
									<th>Edit</th>
								</tr>
							</thead>
							<tbody>
								<?php
									$i=1;
									while($row =  mysqli_fetch_array($allconcept,MYSQLI_ASSOC)){
								?>
								<tr>
									<td><?php echo $i++; ?></td>
									<td><?php echo $row ['concept_name']; ?></td>
									<td><a href="<?php echo $row ['concept_logo']; ?>" ><?php echo $row ['concept_logo']; ?></a></td>
									<td><a href=<?php echo "deleteconcept.php?id=".$row['id']; ?> > <button type="button" class="btn btn-danger">Delete</button> </a></td>
									<td><a href=<?php echo "edit_concept.php?id=".$row['id']; ?> ><button type="button" class="btn btn-info">Edit</button></a></td>
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