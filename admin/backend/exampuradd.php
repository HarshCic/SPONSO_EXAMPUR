<?php

  include 'header.php';

  include '../functions/exampurspecialfun.php';

   $msg='';

  if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $link=$_POST['link'];

    $title=$_POST['title'];

    $status=$_POST['status'];

    $download_link=$_POST['download_link'];

    $result=a_addexampur($link,$title,$status,$download_link);

   $msg='Exampur Special Video Added Successfully';

  }

?>

<!-- Content Wrapper. Contains page content -->

<div class="content-wrapper">

  <!-- Content Header (Page header) -->

  <section class="content-header">

    <h1>

      Add Exampur Video 

    </h1>

    <ol class="breadcrumb">

      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>

      <li class="active">Add Exampur</li>

    </ol>

  </section>

  <!-- Main content -->

  <section class="content">

	<div class="row">

    <!-- Small boxes (Stat box) -->

    <div class="col-md-12">

      <!-- general form elements -->

      <div class="box box-primary">

        <!-- form start -->

        <form method="POST" action="">

          <div class="box-body">

			<?php if($msg!='') { ?>

			 <div class="form-group">

				<div class="alert alert-success"><?php echo $msg; ?></div>

			 </div>

			<?php } ?>

            <div class="form-group">

              <label for="exampleInputEmail1">Link </label>

              <input type="text" class="form-control" name="link" aria-describedby="link" placeholder="youtube.com" required>

            </div>

            <div class="form-group">

              <label for="title">Title</label>

              <input type="text" class="form-control" name="title" placeholder="Include the title of Video" required>

            </div>

            <div class="form-group">

              <label for="status">Live Status</label>

              <select class="form-control" name="status" required>

                <option value="0">Live</option>

                <option value="1">Class Recorded</option>

                <option value="2">Upcoming Class</option>

              </select>

            </div>

            <div class="form-group">

              <label for="download_link">Download Link</label>

              <input type="text" class="form-control" name="download_link" placeholder="Paste the download link here.." required>

            </div>

          </div>

          <!-- /.box-body -->

          <div class="box-footer">

            <small id="emailHelp" class="form-text text-muted">*All fields are Mandatory.</small>

            <hr>

            <button type="submit" class="btn btn-primary">Submit</button>

          </div>

        </form>

      </div>

      <!-- /.box -->

    </div>

	</div>

  </section>

  <!-- /.content -->

</div>

<?php include "footer.php";?>