<?php
include 'header.php';
$id=$_GET['id'];
$mymsg='';
$sql = "SELECT * FROM `featured_video`  ";
$allfeatures=mysqli_query($ses, $sql);
$maxtitle=array();
while($row=mysqli_fetch_array($allfeatures, MYSQLI_ASSOC)) 
{
  array_push($maxtitle,$row['title']);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $link=$_POST['link'];
    $title=$_POST['title'];
    $status=$_POST['status'];
    $download_link=$_POST['download_link'];
    $query="UPDATE `featured_video` SET  `link`='$link',`title`='$title',`live_status`='$status',`download_link`='$download_link'  WHERE id='$id'";
    $result=mysqli_query($ses,$query) or die($query);
	$mymsg='Video updated Successfully';
	$query1=mysqli_query($ses,"SELECT * FROM featured_video WHERE id=$id");
	$fetch=mysqli_fetch_array($query1);
  }
  else {
	$query1=mysqli_query($ses,"SELECT * FROM featured_video WHERE id=$id");
    $fetch=mysqli_fetch_array($query1);
  }
   ?>
 
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Edit Featured Videos
        <small>Preview</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Edit Featured Videos</a></li>
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
					<?php if($mymsg!='') { ?>
					 <div class="form-group">
						<div class="alert alert-success"><?php echo $mymsg; ?></div>
					 </div>
					<?php } ?>
					
					<div class="form-group">
                  <label for="link">Link</label>
                  <input type="url" class="form-control" name="link" aria-describedby="link" placeholder="youtube.com" value='<?php echo $fetch["link"]?>' required>

                </div>
                <div class="form-group">
                  <label for="title">Title</label>
                  <input type="text" class="form-control" id="titles" name="title" value='<?php echo $fetch["title"]?>' placeholder="Include the title of Video" required>
                </div>
                <div class="form-group">
                  <label for="status">Live Status</label>
                  <select class="form-control" name="status" required>
                  <option value="0" <?php if($fetch["live_status"]==0){ echo "selected"; } ?>>Live</option>
                     <option value="1"  <?php if($fetch["live_status"]==1){ echo "selected"; } ?>>Class Recorded</option>
                     <option value="2"  <?php if($fetch["live_status"]==2){ echo "selected"; } ?>>Upcoming Class</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="download_link">Download Link</label>
                  <input type="url" class="form-control" value='<?php echo $fetch["download_link"] ?>' name="download_link" placeholder="Paste the download link here.." required>
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
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <?php include 'footer.php' ?>
<script>
  titles=<?php echo json_encode($maxtitle);?>;
  $(document).ready(function(){
    $( "#titles" ).autocomplete({
      source: titles
    });  
  });
    
</script>