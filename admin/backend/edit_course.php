<?php
include 'header.php';
include '../functions/examlistfun.php';
include '../functions/test_seriesfun.php';
$list_exam = list_exams();
$list_test_series=list_test_series();

$id=$_GET['id'];

$msg='';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

  if (isset($_POST['upload'])) {
    // code...
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

    $query="UPDATE `course_list` SET `course_name`='$course_name',`course_thumbnail`='$courselogo',`exam`='$exam',`course_feature_1`='$course1',`course_feature_2`='$course2' ,`course_feature_3`='$course3',`course_feature_4`='$course4',`course_feature_5`='$course5',`price`='$price',`seats`='$seats',`video_count`='$video',`pdf_count`='$pdf',`test_count`='$test',`course_demo_pdf`='$course_pdf',`course_demo_video`='$course_video',`course_description`='$course_description',`test_series_id`='$test_series' WHERE id='$id'";

    $result=mysqli_query($ses,$query);

    $msg='Course Updated successfully';

  	$query1=mysqli_query($ses,"SELECT * FROM course_list WHERE id=$id");

  	$fetch=mysqli_fetch_array($query1);
    if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {

      $msg = "Image uploaded successfully";

    }else{

      $msg = "Failed to upload image";

    }

    $examid=$fetch['exam'];

    }
  }


  else {
	$query1=mysqli_query($ses,"SELECT * FROM course_list WHERE id=$id");
    $fetch=mysqli_fetch_array($query1,MYSQLI_ASSOC);
    $examid=$fetch['exam_id'];
  }
   ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Edit Course
        <small>Preview</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Edit Course</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">

			<div class="col-md-12">
				<div class="box box-primary">

				<!-- /.box-header -->
				<!-- form start -->
        <form role="form" method="post" enctype="multipart/form-data">

				  <div class="box-body">

					<?php if($msg!='') { ?>

					 <div class="form-group">

						<div class="alert alert-success"><?php echo $msg; ?></div>

					 </div>

					<?php } ?>

					<div class="form-group">

					  <label for="title">Course Name <span class="star">*</span></label>

					  <input type="text" class="form-control" name="course_name" value=<?php echo $fetch['course_name'] ?> required>

					</div>
          <div class="form-group">

            <label for="title">Existing Logo</label>

            <a class="form-control" href=<?php echo $fetch['course_thumbnail']?>><?php echo $fetch['course_thumbnail'] ?></a>
          </div>

           <div class="form-group">

             <label for="image">Select LOGO</label>

             <input type="file" class="form-control-file" aria-describedby="link" name="image" required/>

           </div>

            <div class="form-group">



					  <label for="exam">Exam <span class="star">*</span></label>

					  <select class="form-control" name="exam" required>

              <?php

                while ($fetch1 = mysqli_fetch_array($list_exam, MYSQLI_ASSOC))
                {


                ?>
                <option value= <?php echo $fetch1['id']; if ($fetch1['id']==$fetch['exam']) {
                  // code...
                  ?> selected
                  <?php

                }?>  ><?php echo $fetch1['exam_name']?></option>
              <?php
                }

                ?>

					  </select>


					</div>
          <div class="form-group">

            <label for="title">Course Feature 1 <span class="star">*</span></label>

            <input type="text" class="form-control" name="course_feature1" value=<?php echo $fetch['course_feature_1'] ?> required>

          </div>
          <div class="form-group">

            <label for="title">Course Feature 2 <span class="star">*</span></label>

            <input type="text" class="form-control" name="course_feature2" value=<?php echo $fetch['course_feature_2'] ?> required>

          </div>
          <div class="form-group">

            <label for="title">Course Feature 3 <span class="star">*</span></label>

            <input type="text" class="form-control" name="course_feature3" value=<?php echo $fetch['course_feature_3'] ?> required>

          </div>
          <div class="form-group">

            <label for="title">Course Feature 4 <span class="star">*</span></label>

            <input type="text" class="form-control" name="course_feature4" value=<?php echo $fetch['course_feature_4'] ?> required>

          </div><div class="form-group">

            <label for="title">Course Feature 5 <span class="star">*</span></label>

            <input type="text" class="form-control" name="course_feature5" value=<?php echo $fetch['course_feature_5'] ?> required>

          </div>

          <div class="form-group">

					  <label for="title">Price <span class="star">*</span></label>

					  <input type="number" class="form-control" name="price" value=<?php echo $fetch['price'] ?> required>

					</div>
          <div class="form-group">

					  <label for="title">Seats <span class="star">*</span></label>

					  <input type="number" class="form-control" name="seats" value=<?php echo $fetch['seats'] ?> required>

					</div><div class="form-group">

					  <label for="title">Videos Count<span class="star">*</span></label>

					  <input type="number" class="form-control" name="video" value=<?php echo $fetch['video_count'] ?> required>

					</div>
          <div class="form-group">

					  <label for="title">PDFs Count<span class="star">*</span></label>

					  <input type="number" class="form-control" name="pdf" value=<?php echo $fetch['pdf_count'] ?> required>

					</div>
          <div class="form-group">

					  <label for="title">Tests Count<span class="star">*</span></label>

					  <input type="number" class="form-control" name="test" value=<?php echo $fetch['test_count'] ?> required>

					</div>

          <div class="form-group">

					  <label for="title">Course Description <span class="star">*</span></label>

					  <input type="text" class="form-control" name="course_description" value=<?php echo $fetch['course_description'] ?> required>

					</div>
          <div class="form-group">

					  <label for="title">Course Demo Video <span class="star">*</span></label>

					  <input type="text" class="form-control" name="course_video" value=<?php echo $fetch['course_demo_video'] ?> required>

					</div>
          <div class="form-group">

					  <label for="title">Course Demo PDF <span class="star">*</span></label>

					  <input type="text" class="form-control" name="course_pdf" value=<?php echo $fetch['course_demo_pdf'] ?> required>

					</div>

          <div class="form-group">



          <label for="test series">Test Series <span class="star">*</span></label>

          <select class="form-control" name="test_series" required>

            <?php

              while ($fetch2 = mysqli_fetch_array($list_test_series, MYSQLI_ASSOC))
              {


              ?>
              <option value= <?php echo $fetch2['id']; if ($fetch2['id']==$fetch['test_series_id']) {
                // code...
                ?> selected
                <?php

              }?>  ><?php echo $fetch2['title']?></option>
            <?php
              }

              ?>

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
