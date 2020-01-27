<?php include 'header.php';

include '../functions/youtubepdffun.php';
include '../functions/livecoursefun.php';

$list_pdf=list_youtube_pdf();

?>

<!-- Content Wrapper. Contains page content -->

  <div class="content-wrapper">

    <!-- Content Header (Page header) -->

    <section class="content-header">

      <h1>

        List PDFs

        <small>Preview</small>

      </h1>

      <ol class="breadcrumb">

        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>

        <li><a href="#">List PDFs</a></li>

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

								<th>Title</th>

								<th>Type</th>

                <th>Link</th>

                <th>Status</th>

                <th>Exam</th>

                <th>Subject</th>

                <th>Topic</th>

                <th>Concept</th>

                <th>Date and Time</th>


                <th>Download Link</th>

								<th>Delete</th>

								<th>Edit</th>

							</tr>

						</thead>

						<tbody>

							<?php

              $i=1;

							while($fetch =  mysqli_fetch_array($list_pdf,MYSQLI_ASSOC))

							{

								?>

								<tr>

                  <td><?php echo $i; ?></td>

									<td><?php echo $fetch['Title'] ?></td>

                  <td><?php echo $fetch['material_type'] ?></td>

									<td><a href=<?php echo $fetch['file_link'];?>> <?php echo $fetch['file_link'] ?></a></td>

                  <td><?php if ($fetch['live_status']==1) {
                     echo "Live";

                     }

                     elseif ($fetch['live_status']==2) {

                     echo "Recorded";

                     }

                     else {



                     echo "Upcoming";

                     } ?></td>
                     <td><?php echo getexam($fetch['exam_id']); ?></td>
                     <td><?php echo getsubject($fetch['subject']); ?></td>
   									<td><?php echo gettopicnm($fetch['topic']); ?></td>
   									<td><?php echo getconceptnm($fetch['concept']); ?></td>

                    <td><?php echo $fetch['date_and_time'] ?></td>


                  <td><a href=<?php echo $fetch['download_link'];?>> <?php echo $fetch['download_link'] ?></a></td>


									<td> <a href=<?php echo "delete_pdf.php?id=".$fetch['id']; ?>> <button type="button" class="btn btn-danger">Delete</button> </a></td>

									<td> <a href=<?php echo "edit_pdf.php?id=".$fetch['id']; ?>><button type="button" class="btn btn-info">Edit</button></a></td>

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
