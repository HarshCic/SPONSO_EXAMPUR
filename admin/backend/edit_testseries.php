<?php
include 'header.php';
include '../functions/examlistfun.php';

$list_exam = list_exams();


$id=$_GET['id'];

$msg='';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

  if (isset($_POST['upload'])) {
    // code...
    $image=$_FILES['image']['name'];
    $title = mysqli_real_escape_string($ses, $_POST['image_text']);
    $target ="../images_testseries/".basename($image);
    $logo=$GLOBALS['serverimage']."images_testseries/".basename($image);
    // $title=$_POST['title'];
    $exam=$_POST['exam'];

    $price=$_POST['price'];

    $offer=$_POST['offer'];

    $feature1=$_POST['feature1'];
    $feature2=$_POST['feature2'];
    $feature3=$_POST['feature3'];

    $query="UPDATE `test_series` SET `title`='$title',`logo`='$logo',`exam`='$exam',`price`='$price',`offer_price`='$offer',`feature_1`='$feature1',`feature_2`='$feature2' ,`feature_3`='$feature3' WHERE id='$id'";

    $result=mysqli_query($ses,$query);

    $msg='Test Series Updated successfully';

  	$query1=mysqli_query($ses,"SELECT * FROM test_series WHERE id=$id");

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
	$query1=mysqli_query($ses,"SELECT * FROM test_series WHERE id=$id");
    $fetch=mysqli_fetch_array($query1,MYSQLI_ASSOC);
    $examid=$fetch['exam_id'];
  }
   ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Edit Test Series
        <small>Preview</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Edit Test Series</a></li>
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

					  <label for="title">Title <span class="star">*</span></label>

					  <input type="text" class="form-control" name="image_text" value=<?php echo $fetch['title'] ?> required>

					</div>
          <div class="form-group">

            <label for="title">Existing Logo</label>

            <a class="form-control" href=<?php echo $fetch['logo']?>><?php echo $fetch['logo'] ?></a>
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

					  <label for="title">Price <span class="star">*</span></label>

					  <input type="number" class="form-control" name="price" value=<?php echo $fetch['price'] ?> required>

					</div>
          <div class="form-group">

					  <label for="title">Offer Price <span class="star">*</span></label>

					  <input type="number" class="form-control" name="offer" value=<?php echo $fetch['offer_price'] ?> required>

					</div>
          <div class="form-group">

					  <label for="title">Feature 1 <span class="star">*</span></label>

					  <input type="text" class="form-control" name="feature1" value=<?php echo $fetch['feature_1'] ?> required>

					</div>
          <div class="form-group">

					  <label for="title">Feature 2 <span class="star">*</span></label>

					  <input type="text" class="form-control" name="feature2" value=<?php echo $fetch['feature_2'] ?> required>

					</div>
          <div class="form-group">

					  <label for="title">Feature 3 <span class="star">*</span></label>

					  <input type="text" class="form-control" name="feature3" value=<?php echo $fetch['feature_3'] ?> required>

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
