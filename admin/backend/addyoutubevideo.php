<?php
include 'header.php';
include '../functions/examlistfun.php';
include '../functions/conceptfun.php';
include '../functions/topicfun.php';
include '../functions/subjectfun.php';

$list_exam = list_exams();
$list_subject=list_subjects();
$list_topic=list_topics();
$list_concept=list_conceptfun();

$msg='';



if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$date=date('d-m-Y');
	$currentDateTime=date('Y-m-d H:i:s');
	$newDateTime = date('h:i A', strtotime($currentDateTime));
	$mydate=$date." at ".$newDateTime;

	$video_link=$_POST['link'];

	$title=$_POST['title'];

	$status=$_POST['status'];

	$type=$_POST['type'];

  $exam_id=$_POST['exam'];

  $subject_id=$_POST['subject'];

  $topic_id=$_POST['topic'];

  $concept_id=$_POST['concept'];

  $download_link=$_POST['download_link'];

	$query="INSERT into youtube_class(Title,material_type,file_link,live_status,exam_id,subject,topic,concept,date_and_time,download_link) values  ('".$title."','".$type."','".$video_link."','".$status."','".$exam_id."','".$subject_id."','".$topic_id."','".$concept_id."','".$mydate."','".$download_link."')";

	$result=mysqli_query($ses,$query);

	$msg='Video Added successfully';

}

?>

<!-- Content Wrapper. Contains page content -->

  <div class="content-wrapper">

    <!-- Content Header (Page header) -->

    <section class="content-header">

      <h1>

        Add Video

        <small>Preview</small>

      </h1>

      <ol class="breadcrumb">

        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>

        <li><a href="#">Video</a></li>
        <li><a href="#">Add Video</a></li>

      </ol>

    </section>



    <!-- Main content -->

    <section class="content">

      <div class="row">



			<div class="col-md-12">

				<div class="box box-primary">



				<!-- /.box-header -->

				<!-- form start -->

				<form role="form" method="post">

				  <div class="box-body">

					<?php if($msg!='') { ?>

					 <div class="form-group">

						<div class="alert alert-success"><?php echo $msg; ?></div>

					 </div>

					<?php } ?>

					<div class="form-group">

					  <label for="title">Title <span class="star">*</span></label>

					  <input type="text" class="form-control" name="title" placeholder="Include the title of Video" required>

					</div>

					<div class="form-group">

						<label for="link">Link <span class="star">*</span></label>

						<input type="text" class="form-control" name="link" aria-describedby="link" placeholder="book.com" required>

					</div>

					<div class="form-group">

					  <label for="type">Type <span class="star">*</span></label>

					  <select class="form-control" name="type" required>

						<option value="VIDEO">Video</option>



					  </select>

					</div>
          <div class="form-group">

            <label for="status">Status<span class="star">*</span></label>

            <select class="form-control" name="status" required>

              <option value="1">Live</option>

              <option value="2">Recorded</option>

              <option value="3">Upcoming</option>

            </select>
          </div>

					<div class="form-group">

					  <label for="exam">Exam <span class="star">*</span></label>

					  <select class="form-control" name="exam" required>

              <?php
                $i=1;
                while ($fetch = mysqli_fetch_array($list_exam, MYSQLI_ASSOC))
                {

                ?>
                <option value= <?php echo $fetch['id'] ?>><?php echo $fetch['exam_name'] ?></option>
              <?php
                }

                ?>

					  </select>


					</div>
          <div class="form-group">

					  <label for="subject">Subject <span class="star">*</span></label>

					  <select class="form-control" name="subject" required>

              <?php
                $i=1;
                while ($fetch = mysqli_fetch_array($list_subject, MYSQLI_ASSOC))
                {

                ?>
                <option value= <?php echo $fetch['id'] ?>><?php echo $fetch['subject_name'] ?></option>
              <?php
                }

                ?>

					  </select>


					</div>
          <div class="form-group">

					  <label for="exam">Topic <span class="star">*</span></label>

					  <select class="form-control" name="topic" required>

              <?php
                $i=1;
                while ($fetch = mysqli_fetch_array($list_topic, MYSQLI_ASSOC))
                {

                ?>
                <option value= <?php echo $fetch['id'] ?>><?php echo $fetch['topic_name'] ?></option>
              <?php
                }

                ?>

					  </select>


					</div>
          <div class="form-group">

					  <label for="exam">Concept <span class="star">*</span></label>

					  <select class="form-control" name="concept" required>

              <?php
                $i=1;
                while ($fetch = mysqli_fetch_array($list_concept, MYSQLI_ASSOC))
                {

                ?>
                <option value= <?php echo $fetch['id'] ?>><?php echo $fetch['concept_name'] ?></option>
              <?php
                }

                ?>

					  </select>


					</div>

          <div class="form-group">

						<label for="download_link">Download Link <span class="star">*</span></label>

						<input type="text" class="form-control" name="download_link" aria-describedby="link" placeholder="book.com" required>

					</div>

				  </div>

				  <!-- /.box-body -->



				  <div class="box-footer">

					 <button type="submit" class="btn btn-primary">Submit</button>

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
