<?php 
include 'header.php';
include '../functions/helpfun.php';

$allhelp=list_helpfun();

?>

<!-- Content Wrapper. Contains page content -->

  <div class="content-wrapper">

    <!-- Content Header (Page header) -->

    <section class="content-header">

      <h1>

        Help Request

        <small>Preview</small>

      </h1>

      <ol class="breadcrumb">

        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>

        <li><a href="#">Help</a></li>

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

								<th>User Name</th>

								<th>Email</th>

								<th>Phone</th>

								<th>Reason</th>

								<th>Issue</th>

								<th>Date & Time</th>
								<th>Tools</th>

							</tr>

						</thead>

						<tbody>

							<?php

							while($row =  mysqli_fetch_array($allhelp,MYSQLI_ASSOC))

							{

								?>

								<tr>

									<td><?php echo $row ['username']; ?></td>

									<td><?php echo $row ['email']; ?></td>

									<td><?php echo $row ['phone']; ?></td>

									<td><?php echo $row ['reason_select']; ?></td>

									<td><?php echo $row ['issue']; ?></td>

									<td><?php echo $row ['datetime']; ?></td>
									<td><a href=<?php echo "resolvehelp.php?id=".$row['id']; ?> > <button type="button" class="btn btn-danger">Resolve</button> </a></td>

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