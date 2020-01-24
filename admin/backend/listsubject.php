<?php include 'header.php';
include '../functions/subjectfun.php';
$list_subjects=list_subjects();
?>
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        List Subjects
        <small>Preview</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="#">List Subjects</a></li>
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
								<th>Subject Name</th>
								<th>Subject Logo</th>
								<th>Delete</th>
								<th>Edit</th>
							</tr>
						</thead>
						<tbody>
							<?php
							while($fetch =  mysqli_fetch_array($list_subjects,MYSQLI_ASSOC))
							{
								?>
								<tr>
									<td><?php echo $fetch['subject_name'] ?></td>
									<td><a href=<?php echo '../images_subject/'.$fetch['subject_logo']?>> <?php echo $fetch['subject_logo'] ?></a></td>
									<td> <a href=<?php echo "delete_subject.php?id=".$fetch['id']; ?>> <button type="button" class="btn btn-danger">Delete</button> </a></td>
									<td> <a href=<?php echo "edit_subject.php?id=".$fetch['id']; ?>><button type="button" class="btn btn-info">Edit</button></a></td>
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