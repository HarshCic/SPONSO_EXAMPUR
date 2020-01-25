<?php
	include 'header.php';
  $serverimage=$GLOBALS['serverimage'];
$msg='';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  if (isset($_POST['upload'])) {
  	// Get image name
  	$image = $_FILES['image']['name'];
  	// Get text
  	$image_text = mysqli_real_escape_string($ses, $_POST['image_text']);

  	// image file directory
  	$target = "../images_concept/".basename($image);
    $conceptimage=$GLOBALS['serverimage']."images_concept/".basename($image);
  	$sql = "INSERT INTO concept (concept_logo, concept_name) VALUES ('$conceptimage', '$image_text')";
  	// execute query
  	mysqli_query($ses, $sql);
  	if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
  		$msg = "Image uploaded successfully";
  	}else{
  		$msg = "Failed to upload image";
  	}
  }
}
?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        
            <h1>
                Add a Concept..
            </h1>
      
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Concept</a></li>
        <li class="active">Add a Concept</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            
            
            <!-- /.box-header -->
            <!-- form start -->
            <form method="POST" action="" enctype="multipart/form-data">
              <div class="box-body">
                <?php  if($msg!='') { ?>
				 <div class="form-group">
					<div class="alert alert-success"><?php echo $msg; ?></div>
				 </div>
				<?php } ?>
                <div class="form-group">
                  <label for="exampleInputFile">Select LOGO</label>
                  <input type="file" name="image" id="exampleInputFile" required>
                </div>

                <div class="form-group">
                    <label>Title</label>
                    <input type="text" class="form-control" name="image_text"  placeholder="enter concept title.." required>
                </div>
                <span class="help-block">*All fields are Mandatory.</span>
              </div>
              <div class="box-footer">
                <button type="submit" name="upload" class="btn btn-primary">Submit</button>
              </div>
            </form>
          </div>
          
        </div>
        
      </div>
    </section>
  </div>
<?php include "footer.php";?>