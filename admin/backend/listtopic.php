<?php include 'header.php';

include '../functions/topicfun.php';

$list_topics=list_topics();

?>

<!-- Content Wrapper. Contains page content -->

  <div class="content-wrapper">

    <!-- Content Header (Page header) -->

    <section class="content-header">

      <h1>

        List Topics

        <small>Preview</small>

      </h1>

      <ol class="breadcrumb">

        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>

        <li><a href="#">List Topics</a></li>

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

                <th>Sr no.</th>

								<th>Topic Name</th>

								<th>Topic Logo</th>

								<th>Delete</th>

								<th>Edit</th>

							</tr>

						</thead>

						<tbody>

							<?php

              $i=1;

							while($fetch =  mysqli_fetch_array($list_topics,MYSQLI_ASSOC))

							{

								?>

								<tr>

                  <td><?php echo $i; ?></td>

									<td><?php echo $fetch['topic_name'] ?></td>

									<td><a href=<?php echo $fetch['topic_logo'];?>> <?php echo $fetch['topic_logo'] ?></a></td>

									<td> <a href=<?php echo "delete_topic.php?id=".$fetch['id']; ?>> <button type="button" class="btn btn-danger">Delete</button> </a></td>

									<td> <a href=<?php echo "edit_topic.php?id=".$fetch['id']; ?>><button type="button" class="btn btn-info">Edit</button></a></td>

								</tr>

								<?php

                $i++;

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

