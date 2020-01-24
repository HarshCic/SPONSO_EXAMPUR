<?php include 'header.php';

include '../functions/examlistfun.php';

$list_exam = list_exams();



?>

<!-- Content Wrapper. Contains page content -->

  <div class="content-wrapper">

    <!-- Content Header (Page header) -->

    <section class="content-header">

      <h1>

        All Exams

        <small>Preview</small>

      </h1>

      <ol class="breadcrumb">

        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>

        <li><a href="#">All Exams</a></li>

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

                <th>Exam Name</th>

                <th>Exam Logo</th>

                <th>Delete</th>

                <th>Edit</th>

              </tr>

            </thead>

            <tbody>

              <?php

                while ($fetch = mysqli_fetch_array($list_exam, MYSQLI_ASSOC))

                {

                ?>

                <tr>

                   <td><?php echo $fetch['exam_name'] ?></td>

                  <td><a href=<?php echo '../images_exam/' . $fetch['exam_logo'] ?>> <?php echo $fetch['exam_logo'] ?></a></td>

                  <td><a href=<?php echo "deleteexam.php?id=" . $fetch['id']; ?>> <button type="button" class="btn btn-danger">Delete</button> </a></td>

                  <td><a href=<?php echo "editexam.php?id=" . $fetch['id']; ?>><button type="button" class="btn btn-info">Edit</button></a></td>

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

