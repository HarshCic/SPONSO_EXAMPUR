<?php

include 'header.php';

$id=$_GET['id'];
$sql = "SELECT `subject_name` FROM `subject`  ";
$subject=mysqli_query($ses, $sql);
$max=array();
while($row=mysqli_fetch_array($subject, MYSQLI_ASSOC)) 
{
  $arrysub = array();
  $arraysub = $row['subject_name'];
  array_push($max,$arraysub);
}
$mymsg='';

 if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $image_text = trim(mysqli_real_escape_string($ses, $_POST['image_text']));  
  
  $sql = "SELECT * FROM `subject` WHERE `subject_name`='".$image_text."'";
  $result=mysqli_query($ses, $sql);

   if (isset($_POST['upload'])) {

    // $subject=$_POST['subject'];

   	// Get image name

   	$image = $_FILES['image']['name'];

   	// Get text

   	$image_text = mysqli_real_escape_string($ses, $_POST['image_text']);



   	// image file directory

   	$target = "../images_subject/".basename($image);


    $subjectimage=$GLOBALS['serverimage']."images_subject/".basename($image);
   	$sql = "UPDATE subject SET subject_name='$image_text',subject_logo='$subjectimage' WHERE id='$id'";

   	// execute query

   	mysqli_query($ses, $sql);



   	if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {

   		$msg = "Image uploaded successfully";

		$mymsg="Subject edit successfully";

   	}else{

      $mymsg="Something wents wrong";

   	}

   }

	$query1=mysqli_query($ses,"SELECT * FROM subject WHERE id=$id");

	$fetch=mysqli_fetch_array($query1);

 }

 else {

   $query1=mysqli_query($ses,"SELECT * FROM subject WHERE id=$id");

   $fetch=mysqli_fetch_array($query1);

 }

  ?>



<!-- Content Wrapper. Contains page content -->

  <div class="content-wrapper">

    <!-- Content Header (Page header) -->

    <section class="content-header">

      <h1>

        Edit Subject

        <small>Preview</small>

      </h1>

      <ol class="breadcrumb">

        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>

        <li><a href="#">Edit Subject</a></li>

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

                   <label for="title">Existing Logo</label>

                   <a class="form-control" href=<?php echo $fetch['subject_logo']?>><?php echo $fetch['subject_logo'] ?></a>





                 </div>

                 <div class="form-group">

                   <label for="link">Select New Logo </label>

                   <input type="file" name="image" class="form-control-file" aria-describedby="link"  required>





                 </div>

                 <div class="form-group">

                   <label for="title"> Name</label>

                   <input type="text" id="subjects" class="form-control" name="image_text" value=<?php echo $fetch['subject_name'] ?> required>



                 </div>

				

				 </div>

				 <div class="box-footer">

					<button type="submit" name="upload" class="btn btn-primary">Update</button>

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