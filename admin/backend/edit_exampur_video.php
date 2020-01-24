<?php

include 'header.php';

$id=$_GET['id'];

$mymsg='';

 if ($_SERVER['REQUEST_METHOD'] == 'POST') {



    $link=$_POST['link'];

    $title=$_POST['title'];

    $status=$_POST['status'];

    $download_link=$_POST['download_link'];
    $date=date('d-m-Y');
    $currentDateTime=date('Y-m-d H:i:s');
    $newDateTime = date('h:i A', strtotime($currentDateTime));
    $mydate=$date." at ".$newDateTime;

   $query="UPDATE exampur_special SET link='$link',title='$title',live_status='$status',date_and_time='$mydate',dowload_link='$download_link' WHERE id='$id'";

   $result=mysqli_query($ses,$query);

   $mymsg='Record updated sucessfully';



    $query1=mysqli_query($ses,"SELECT * FROM exampur_special WHERE id=$id");

    $fetch=mysqli_fetch_array($query1);

   }

   else {

     $query1=mysqli_query($ses,"SELECT * FROM exampur_special WHERE id=$id");

     $fetch=mysqli_fetch_array($query1);

   }

?>

 

<!-- Content Wrapper. Contains page content -->

<div class="content-wrapper">

    <!-- Content Header (Page header) -->

    <section class="content-header">

      <h1>

      Edit Exampur Video 

      </h1>

      <ol class="breadcrumb">

        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>

        <li class="active">Edit Exampur</li>

      </ol>

    </section>



    <!-- Main content -->

    <section class="content">

	<div class="row">

      <!-- Small boxes (Stat box) -->

      <div class="col-md-12">

          <!-- general form elements -->

          <div class="box box-primary">

          <!-- /.box-header -->

            <!-- form start -->

            <form method="POST" action="">

              <div class="box-body">

				<?php if($mymsg!='') { ?>

				 <div class="form-group">

					<div class="alert alert-success"><?php echo $mymsg; ?></div>

				 </div>

				<?php } ?>

                <div class="form-group">

                  <label for="exampleInputEmail1">Link </label>

                  <input type="text" class="form-control" name="link" aria-describedby="link" value=<?php echo $fetch['link'] ?> placeholder="youtube.com" required>

                </div>

                <div class="form-group">

                  <label for="title">Title</label>

                  <input type="text" class="form-control" name="title" value=<?php echo $fetch['title'] ?> placeholder="Include the title of Video" required>

                </div>

                <div class="form-group">

                  <label for="status">Live Status</label>

                  <select class="form-control" name="status" required>

                    <option <?php if($fetch['live_status']==0){ echo "selected";} ?>  value="0">Live</option>

                    <option <?php if($fetch['live_status']==1){ echo "selected";} ?> value="1">Class Recorded</option>

                    <option <?php if($fetch['live_status']==2){ echo "selected";} ?> value="2">Upcoming Class</option>

                  </select>

                </div>

                <div class="form-group">

                  <label for="download_link">Download Link</label>

                  <input type="text" class="form-control" name="download_link" value=<?php echo $fetch['dowload_link'] ?> placeholder="Paste the download link here.." required>

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

    </div>

	</div>

    </section>

    <!-- /.content -->

  </div>

  <!-- /.content-wrapper -->

  <?php include 'footer.php' ?>