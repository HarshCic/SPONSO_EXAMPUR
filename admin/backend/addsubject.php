

<?php include 'header.php';

$msg='';
$sql = "SELECT `subject_name` FROM `subject`  ";
$subject=mysqli_query($ses, $sql);
$max=array();
while($row=mysqli_fetch_array($subject, MYSQLI_ASSOC)) 
{
  $arrysub = array();
  $arraysub = $row['subject_name'];
  array_push($max,$arraysub);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

  if (isset($_POST['upload'])) {

  	// Get image name

  	$image = $_FILES['image']['name'];

  	// Get text

  	$image_text = mysqli_real_escape_string($ses, $_POST['image_text']);



  	// image file directory

  	$target = "../images_subject/".basename($image);


    $subjectlogo=$GLOBALS['serverimage']."images_subject/".basename($image);
  	$sql = "INSERT INTO subject (subject_logo, subject_name) VALUES ('$subjectlogo', '$image_text')";

  	// execute query

  	mysqli_query($ses, $sql);



  	if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {

  		$msg = "Image uploaded successfully";

  	}else{

  		$msg = "Failed to upload image";

  	}

	$msg='Subject Added Successfully';

  }else{

	$msg='Something Wents Successfully';

  }

	

}

 ?>

<!-- Content Wrapper. Contains page content -->

  <div class="content-wrapper">

    <!-- Content Header (Page header) -->

    <section class="content-header">

      <h1>

        Add Subject

        <small>Preview</small>

      </h1>

      <ol class="breadcrumb">

        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>

        <li><a href="#">Add Subject</a></li>

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

						<div class="alert alert-success"><?php echo $msg; ?></div>

					 </div>

					<?php } ?>

					<div class="form-group">

					  <label for="link">Select Logo </label>

					  <input type="file" name="image" class="form-control" aria-describedby="link"  required>





					</div>

					<div class="form-group">

					  <label for="title"> Name</label>

					  <input type="text" class="form-control" id="subjects" name="image_text" placeholder="Enter here..." required>



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
      $( "#subjects" ).autocomplete({
        source: allsub
      });  
    });
      
  </script>