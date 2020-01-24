<?php include 'header.php';

include '../functions/exampurspecialfun.php';

$allexampur=list_conceptfun();

?>

<!-- Content Wrapper. Contains page content -->

  <div class="content-wrapper">

    <!-- Content Header (Page header) -->

    <section class="content-header">

      <h1>

      Exampur Videos..

      </h1>

      <ol class="breadcrumb">

        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>

        <li><a href="#">Exampur Video</a></li>

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
                <th>Title</th>
                <th>Link</th>
                <th>Live Status</th>
                <th>Download Link</th>
                <th>Delete</th>
                <th>Edit</th>	
							</tr>

						</thead>

						<tbody>

							<?php

							while($fetch =  mysqli_fetch_array($allexampur,MYSQLI_ASSOC))

							{

								?>

								<tr>
                  <td><?php echo $fetch['title'] ?></td>
                  <td><a href=<?php echo $fetch['link']?>><?php echo $fetch['link']?></a></td>
                  <td>
                    <?php if ($fetch['live_status']==0) {
                      echo "Live";
                    }elseif ($fetch['live_status']==1) {
                      echo "Class Recorded";
                    }else {
                      echo "Upcoming Class";
                    } ?>
                  </td>
                 <td>
                  <a href=<?php echo $fetch['link']?>> <?php echo $fetch['dowload_link'] ?></a>
                 </td>              
                 <td> 
                  <a href=<?php echo "delete_exampur.php?id=".$fetch['id']; ?>> <button type="button" class="btn btn-danger">Delete</button> </a></td>
                  <td> <a href=<?php echo "edit_exampur_video.php?id=".$fetch['id']; ?>><button type="button" class="btn btn-info">Edit</button></a></td>
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