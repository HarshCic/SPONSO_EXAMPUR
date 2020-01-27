

<?php include 'header.php';
include '../functions/examlistfun.php';
include '../functions/test_seriesfun.php';
$list_exam = list_exams();
$list_test_series=list_test_series();

$msg='';
$sql = "SELECT `course_name` FROM `course_list`  ";
$course=mysqli_query($ses, $sql);
$max=array();
while($row=mysqli_fetch_array($course, MYSQLI_ASSOC))
{
  $arrysub = array();
  $arraysub = $row['course_name'];
  array_push($max,$arraysub);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

  if (isset($_POST['upload'])) {

  	// Get image name

  	$image = $_FILES['image']['name'];

  	// Get text

  	$course_name = mysqli_real_escape_string($ses, $_POST['course_name']);



  	// image file directory

  	$target = "../images_course/".basename($image);


    $courselogo=$GLOBALS['serverimage']."images_course/".basename($image);

    $exam=$_POST['exam'];
    $course1=$_POST['course_feature1'];
    $course2=$_POST['course_feature2'];
    $course3=$_POST['course_feature3'];
    $course4=$_POST['course_feature4'];
    $course5=$_POST['course_feature5'];
    $price=$_POST['price'];
    $seats=$_POST['seats'];
    $video=$_POST['video'];
    $pdf=$_POST['pdf'];
    $test=$_POST['test'];
    $course_video=$_POST['course_video'];
    $course_pdf=$_POST['course_pdf'];
    $course_description=$_POST['course_description'];
    $test_series=$_POST['test_series'];





  	$sql = "INSERT INTO course_list (course_name,exam,course_thumbnail,course_feature_1,course_feature_2,course_feature_3,course_feature_4,course_feature_5,price,seats,video_count,pdf_count,test_count,course_description,course_demo_video,course_demo_pdf,test_series_id) VALUES ('$course_name','$exam','$courselogo','$course1','$course2','$course3','$course4','$course5','$price','$seats','$video','$pdf','$test','$course_description','$course_video','$course_pdf','$test_series')";

  	// execute query

  	mysqli_query($ses, $sql);



  	if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {

  		$msg = "Image uploaded successfully";

  	}else{

  		$msg = "Failed to upload image";

  	}

	$msg='course Added Successfully';

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

        Add Course

        <small>Preview</small>

      </h1>

      <ol class="breadcrumb">

        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>

        <li><a href="#">Add Course</a></li>

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

					  <label for="link">Course thumbnail <span class="star">*</span></label>

					  <input type="file" name="image" class="form-control" aria-describedby="link"  required>


					</div>

					<div class="form-group">

					  <label for="title">Course Name <span class="star">*</span></label>

					  <input type="text" class="form-control" id="courses" name="course_name" placeholder="Enter Course Name here..." required>

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

					  <label for="features">Course Feature 1 <span class="star">*</span></label>

					  <input type="text" class="form-control" id="courses" name="course_feature1" placeholder="Enter Feature here..." required>

					</div>
          <div class="form-group">

					  <label for="features">Course Feature 2 <span class="star">*</span></label>

					  <input type="text" class="form-control" id="courses" name="course_feature2" placeholder="Enter Feature here..." required>

					</div>
          <div class="form-group">

					  <label for="features">Course Feature 3 <span class="star">*</span></label>

					  <input type="text" class="form-control" id="courses" name="course_feature3" placeholder="Enter Feature here..." required>

					</div>
          <div class="form-group">

					  <label for="features">Course Feature 4 <span class="star">*</span></label>

					  <input type="text" class="form-control" id="courses" name="course_feature4" placeholder="Enter Feature here..." required>

					</div>
          <div class="form-group">

					  <label for="features">Course Feature 5 <span class="star">*</span></label>

					  <input type="text" class="form-control" id="courses" name="course_feature5" placeholder="Enter Feature here..." required>

					</div>
          <div class="form-group">

					  <label for="price">Price <span class="star">*</span></label>

					  <input type="number" class="form-control" id="price" name="price" placeholder="Enter Price in INR.." required>

					</div>
          <div class="form-group">

					  <label for="price">Seats <span class="star">*</span></label>

					  <input type="number" class="form-control" id="seats" name="seats" placeholder="Enter Seats number.." required>

					</div>
          <div class="form-group">

					  <label for="price">Video Count <span class="star">*</span></label>

					  <input type="number" class="form-control" id="video" name="video" placeholder="Enter Video Count.." required>

					</div>

          <div class="form-group">

					  <label for="price">PDF Count <span class="star">*</span></label>

					  <input type="number" class="form-control" id="Pdf" name="pdf" placeholder="Enter Pdf Count.." required>

					</div>

          <div class="form-group">

					  <label for="price">Test Count <span class="star">*</span></label>

					  <input type="number" class="form-control" id="Test" name="test" placeholder="Enter Test Count.." required>

					</div>
          <div class="form-group">

					  <label for="features">Course Description <span class="star">*</span></label>

					  <input type="text" class="form-control" id="courses" name="course_description" placeholder="Enter Description here..." required>

					</div>
          <div class="form-group">

					  <label for="features">Course Demo Video <span class="star">*</span></label>

					  <input type="text" class="form-control" id="courses" name="course_video" placeholder="Paste Video URL here..." required>

					</div>
          <div class="form-group">

					  <label for="features">Course Demo PDF <span class="star">*</span></label>

					  <input type="text" class="form-control" id="courses" name="course_pdf" placeholder="Paste PDF URL here..." required>

					</div>

          <div class="form-group">

					  <label for="test_series">Test Series <span class="star">*</span></label>

					  <select class="form-control" name="test_series" required>

              <?php

                while ($fetch_test_series = mysqli_fetch_array($list_test_series, MYSQLI_ASSOC))
                {

                ?>
                <option value= <?php echo $fetch_test_series['id'] ?>><?php echo $fetch_test_series['title'] ?></option>
              <?php
                }

                ?>

					  </select>


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
      $( "#courses" ).autocomplete({
        source: allsub
      });
    });

  </script>
