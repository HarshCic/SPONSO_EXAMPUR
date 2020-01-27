

<?php include 'header.php';
include '../functions/examlistfun.php';

$list_exam = list_exams();


$msg='';
$sql = "SELECT `title` FROM `test_series`  ";
$test=mysqli_query($ses, $sql);
$max=array();
while($row=mysqli_fetch_array($test, MYSQLI_ASSOC))
{
  $arrysub = array();
  $arraysub = $row['title'];
  array_push($max,$arraysub);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

  if (isset($_POST['upload'])) {

  	// Get image name

  	$image = $_FILES['image']['name'];

  	// Get text

  	$title = mysqli_real_escape_string($ses, $_POST['title']);



  	// image file directory

  	$target = "../images_testseries/".basename($image);


    $logo=$GLOBALS['serverimage']."images_testseries/".basename($image);

    $exam_id=$_POST['exam'];

    $price=$_POST['price'];

    $offer_price=$_POST['offer'];

    $feature1=$_POST['feature1'];
    $feature2=$_POST['feature2'];
    $feature3=$_POST['feature3'];





  	$sql = "INSERT INTO test_series (title,exam,logo,price,offer_price,feature_1,feature_2,feature_3) VALUES ('".$title."','".$exam_id."','".$logo."','".$price."','".$offer_price."','".$feature1."','".$feature2."','".$feature3."')";

  	// execute query

  	mysqli_query($ses, $sql);



  	if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {

  		$msg = "Image uploaded successfully";

  	}else{

  		$msg = "Failed to upload image";

  	}

	$msg='Test Series Added Successfully';

  }else{

	$msg='Something Wents Wrong';

  }



}

 ?>

<!-- Content Wrapper. Contains page content -->

  <div class="content-wrapper">

    <!-- Content Header (Page header) -->

    <section class="content-header">

      <h1>

        Add Test Series

        <small>Preview</small>

      </h1>

      <ol class="breadcrumb">

        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>

        <li><a href="#">Add Test Series</a></li>

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

					  <label for="link">Test Series Logo <span class="star">*</span></label>

					  <input type="file" name="image" class="form-control" aria-describedby="link"  required>


					</div>

					<div class="form-group">

					  <label for="title">Title <span class="star">*</span></label>

					  <input type="text" class="form-control"  name="title" placeholder="Enter here..." required>

					</div>

				  <!-- </div> -->

          <div class="form-group">

					  <label for="exam">Exam <span class="star">*</span></label>

					  <select class="form-control" name="exam" required>

              <?php

                while ($fetch_exam = mysqli_fetch_array($list_exam, MYSQLI_ASSOC))
                {

                ?>
                <option value= <?php echo $fetch_exam['id'] ?>><?php echo $fetch_exam['exam_name'] ?></option>
              <?php
                }

                ?>

					  </select>


					</div>

          <div class="form-group">

					  <label for="price">Price <span class="star">*</span></label>

					  <input type="number" class="form-control"  name="price" placeholder="Enter Price in INR.." required>

					</div>
          <div class="form-group">

					  <label for="offer price">Offer Price <span class="star">*</span></label>

					  <input type="number" class="form-control"  name="offer" placeholder="Offer Price.." required>

					</div>
          <div class="form-group">

					  <label for="features">Feature 1 <span class="star">*</span></label>

					  <input type="text" class="form-control" name="feature1" placeholder="Enter Feature here..." required>

					</div>
          <div class="form-group">

					  <label for="features">Feature 2 <span class="star">*</span></label>

					  <input type="text" class="form-control" name="feature2" placeholder="Enter Feature here..." required>

					</div>
          <div class="form-group">

					  <label for="features">Feature 3 <span class="star">*</span></label>

					  <input type="text" class="form-control" name="feature3" placeholder="Enter Feature here..." required>

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
