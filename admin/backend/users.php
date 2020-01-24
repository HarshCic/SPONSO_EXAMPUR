<?php include 'header.php';

include '../functions/usersfun.php';

$allusers=list_users();

?>

<!-- Content Wrapper. Contains page content -->

  <div class="content-wrapper">

    <!-- Content Header (Page header) -->

    <section class="content-header">

      <h1>

        Users

        <small>Preview</small>

      </h1>

      <ol class="breadcrumb">

        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>

        <li><a href="#">Users</a></li>

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

								<th>Name</th>

								<th>Email</th>

								<th>Phone</th>

								<th>Username</th>

								<th>Photo</th>

								<th>Date & Time</th>

								<th>Delete</th>

								<th>Password</th>

								<th>Edit</th>

							</tr>

						</thead>

						<tbody>

							<?php

							while($fetch =  mysqli_fetch_array($allusers,MYSQLI_ASSOC))

							{

								?>

								<tr>

									 <td><?php echo $fetch['name'] ?></td>

									<td><?php echo $fetch['email'] ?></td>

									<td><?php echo $fetch['phone'] ?></td>

									<td><?php echo $fetch['username'] ?></td>





									<td><a href=<?php echo $fetch['photo']?>> <?php echo $fetch['photo'] ?></a></td>

									<td><?php echo $fetch['datetime'] ?></td>

									<td> <a href=<?php echo "delete_user.php?id=".$fetch['id']; ?>> <button type="button" class="btn btn-danger">Delete</button> </a></td>

									<td> <a href=<?php echo "resetpassword.php?id=".$fetch['id']; ?>><button type="button" class="btn btn-info">Reset Password</button></a></td>

									<td> <a href=<?php echo "edit_user.php?id=".$fetch['id']; ?>> <button type="button" class="btn btn-primary">Edit</button> </a></td>

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