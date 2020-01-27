<?php
include 'header.php';
$id=$_GET['id'];
$sql = "SELECT * FROM `current_affair`  ";
$subject=mysqli_query($ses, $sql);
$max=array();
while($row=mysqli_fetch_array($subject, MYSQLI_ASSOC)) 
{
  $arryarraytitlesub = array();
  $arraytitle = $row['title'];
  array_push($max,$arraytitle);
}
$mymsg='';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title=$_POST['title'];
    $pdf_link=$_POST['pdflink'];
    $type=$_POST['type'];
    $query="UPDATE `current_affair` SET `title`='".$title."',`date_and_time`='".date('d-m-Y h:i:s')."',`pdf_link`='".$pdf_link."',`type`='".$type."' WHERE id='".$id."' ";
    $result=mysqli_query($ses,$query);
  $mymsg='Current affair updated Successfully';
  $query1=mysqli_query($ses,"SELECT * FROM current_affair WHERE id=$id");
  $fetch=mysqli_fetch_array($query1);
  }
  else {
  $query1=mysqli_query($ses,"SELECT * FROM current_affair WHERE id=$id");
    $fetch=mysqli_fetch_array($query1);
  }
   ?>
 
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Edit Current Affair
        <small>Preview</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Edit Current Affair</a></li>
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
                  <label for="title">Title</label>
                  <input type="text" id="title" class="form-control" name="title" value='<?php echo $fetch["title"]?>' placeholder="Include the title of Video" required>
                </div>
                <div class="form-group">
                  <label for="title">PDF Link</label>
                  <input type="url" class="form-control" name="pdflink" value='<?php echo $fetch["pdf_link"]?>' placeholder="Include the title of Video" required>
                </div>
                <div class="form-group">
                  <label for="status">Type</label>
                  <select class="form-control" name="type" required>
                    <option value="1" <?php if($fetch["type"]=="1"){ echo "selected"; } ?>>Daily</option>
                     <option value="2"  <?php if($fetch["type"]=="2"){ echo "selected"; } ?>>Monthly</option>
                  </select>
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
    allsub=<?php echo json_encode($max);?>;
    $(document).ready(function(){
      $( "#title" ).autocomplete({
        source: allsub
      });  
    });
      
  </script>