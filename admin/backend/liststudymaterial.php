<?php 
	include 'header.php';
	include '../functions/studymaterialfun.php';
	$type=$_GET['type'];
	$allstudymaterial=list_studymaterial($type);
?>
<div class="content-wrapper">
	<section class="content-header">
		<h1>
        	All Study Material
			<small>Preview</small>
		</h1>
		<ol class="breadcrumb">
			<li><a href="#"><i class="fa fa-dashboard"></i> Home </a></li>
			<li><a href="#">Study Material</a></li>
			<li><a href="#">All Study Material</a></li>
		</ol>
	</section>
	<section class="content">
		<div class="row">
			<div class="box">
				<div class="box-body">
					<div class="col-md-12 table-responsive">
						<table class="table table-bordered datatable example table-striped">
							<thead>
								<tr>
									<th>#</th>
									<th>Title</th>
									<th>PDF Link</th>
									<th>Type</th>
									<th>Status</th>
									<th>Price</th>
									<th>Delete</th>
									<th>Edit</th>
								</tr>
							</thead>
							<tbody>
								<?php
								 $i=1;
								while($row =  mysqli_fetch_array($allstudymaterial,MYSQLI_ASSOC))
								{
									$type="";
									if($row ['type']==1) {
										$type="ebooks";
									}else if($row ['type']==2) {
										$type="class notes";
									}else if($row ['type']==3){
										$type="previous year question";
									}
									
									$status="";
									if($row ['free_status']==0) {
										$status="Paid";
									}else if($row ['free_status']==1) {
										$status="Free";
									}	
								?>
								<tr>
									<td><?php echo $i; ?></td>
									<td><?php echo $row ['title']; ?></td>
									<td><a href="<?php echo $row ['pdf_link']; ?>"><?php echo $row ['pdf_link']; ?></a></td>
									<td><?php echo $type; ?></td>
									<td><?php echo $status; ?></td>
									<td><?php echo $row ['price']; ?></td>
									<td>
										<a href="<?php echo "deletestudymaterial.php?id=".$row['id']; ?>" >
											<button type="button" class="btn btn-danger">Delete</button>
										</a>
									</td>
									<td>
										<a href=<?php echo "editstudymaterial.php?id=".$row['id']; ?> >
											<button type="button" class="btn btn-info">Edit</button>
										</a>
									</td>
								</tr>
								<?php
								 $i++;							}
							?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>
<?php include 'footer.php' ?>