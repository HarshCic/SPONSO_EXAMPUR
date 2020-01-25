<?php 
  include 'header.php';
  include '../functions/featured.php';
  $msg='';
  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $link=$_POST['link'];
    $title=$_POST['title'];
    $status=$_POST['status'];
    $download_link=$_POST['download_link'];
    
    add_featuredvideo($link,$title,$status,$download_link);
    ?>
    <script type="text/javascript">
      alert("Video added Succesfully");
    </script>
    <?php
  }
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Add Featured Video
      <small>Preview</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="#">Add Featured Video</a></li>
    </ol>
  </section>
  <!-- Main content -->
  <section class="content">
    <div class="row">
			<div class="col-md-12">
				<div class="box box-primary">
				  <!-- /.box-header -->
				  <!-- form start -->
				  <form method="POST" action="" enctype="multipart/form-data">
				    <div class="box-body">
              <?php if($msg!='') { ?>
              <div class="form-group">
						    <div class="alert alert-success">
                <?php echo $msg; ?>
                </div>
              </div>
              <?php } ?>
              <div class="form-group">
                <label for="link">Link</label>
                <input type="url" class="form-control" name="link" aria-describedby="link" placeholder="https://www.youtube.com/" required>
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
                <input type="url" class="form-control" name="download_link" placeholder="Paste the download link here.." required>
              </div>
              <div class="form-group">
                <label for="download_link">Date and time</label>
                <input type="text" class="form-control" name="date_and_time" placeholder="25-01-2020 at 01:26 AM" required>
              </div>
				    </div>
            <!-- /.box-body -->
            <div class="box-footer">
					   <button type="submit" name="upload" class="btn btn-primary">Submit</button>
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