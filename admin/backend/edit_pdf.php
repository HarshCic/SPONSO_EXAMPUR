<?php
include 'header.php';
include '../functions/examlistfun.php';
include '../functions/conceptfun.php';
include '../functions/topicfun.php';
include '../functions/subjectfun.php';
include '../functions/youtubepdffun.php';

$list_exam = list_exams();
$list_subject=list_subjects();
$list_topic=list_topics();
$list_concept=list_conceptfun();
$list_pdf=list_youtube_pdf();

$id=$_GET['id'];

$msg='';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

  $video_link=$_POST['link'];

  $title=$_POST['title'];



  $type=$_POST['type'];

  $exam_id=$_POST['exam'];

  $subject_id=$_POST['subject'];

  $topic_id=$_POST['topic'];

  $concept_id=$_POST['concept'];

  $download_link=$_POST['download_link'];

  $query="UPDATE `youtube_class` SET  `Title`='$title',`material_type`='$type',`file_link`='$video_link',`exam_id`='$exam_id',`subject`='$subject_id',`topic`='$topic_id',`concept`='$concept_id',`download_link`='$download_link'  WHERE id='$id'";

  $result=mysqli_query($ses,$query);

  $msg='Video Updated successfully';

	$query1=mysqli_query($ses,"SELECT * FROM youtube_class WHERE id=$id");

	$fetch=mysqli_fetch_array($query1);

  $examid=$fetch['exam_id'];

  }
  else {
	$query1=mysqli_query($ses,"SELECT * FROM youtube_class WHERE id=$id");
    $fetch=mysqli_fetch_array($query1);
    $examid=$fetch['exam_id'];
  }
   ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Edit Youtube Videos
        <small>Preview</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Edit Youtube Videos</a></li>
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

					  <input type="text" class="form-control" name="title" value=<?php echo $fetch['Title'] ?> required>

					</div>

          <div class="form-group">

					  <label for="type">Type <span class="star">*</span></label>

					  <select class="form-control" name="type" required>

						<option value="PDF">PDF</option>



					  </select>

					</div>

					<div class="form-group">

						<label for="link">Link <span class="star">*</span></label>

						<input type="text" class="form-control" name="link" aria-describedby="link" value=<?php echo $fetch['file_link'] ?> required>

					</div>




					<div class="form-group">

					  <label for="exam">Exam <span class="star">*</span></label>

					  <select class="form-control" name="exam" required>

              <?php

                while ($fetch1 = mysqli_fetch_array($list_exam, MYSQLI_ASSOC))
                {


                ?>
                <option value= <?php echo $fetch1['id']; if ($fetch1['id']==$fetch['exam_id']) {
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

					  <label for="subject">Subject <span class="star">*</span></label>

					  <select class="form-control" name="subject" required>

              <?php

                while ($fetch1 = mysqli_fetch_array($list_subject, MYSQLI_ASSOC))
                {


                ?>
                <option value= <?php echo $fetch1['id']; if ($fetch1['id']==$fetch['subject']) {
                  // code...
                  ?> selected
                  <?php

                }?>  ><?php echo $fetch1['subject_name']?></option>
              <?php
                }

                ?>

					  </select>


					</div>
          <div class="form-group">

					  <label for="exam">Topic <span class="star">*</span></label>

					  <select class="form-control" name="topic" required>

              <?php

                while ($fetch1 = mysqli_fetch_array($list_topic, MYSQLI_ASSOC))
                {


                ?>
                <option value= <?php echo $fetch1['id']; if ($fetch1['id']==$fetch['topic']) {
                  // code...
                  ?> selected
                  <?php

                }?>  ><?php echo $fetch1['topic_name']?></option>
              <?php
                }

                ?>

					  </select>


					</div>
          <div class="form-group">

					  <label for="exam">Concept <span class="star">*</span></label>

					  <select class="form-control" name="concept" required>

              <?php

                while ($fetch1 = mysqli_fetch_array($list_concept, MYSQLI_ASSOC))
                {


                ?>
                <option value= <?php echo $fetch1['id']; if ($fetch1['id']==$fetch['concept']) {
                  // code...
                  ?> selected
                  <?php

                }?>  ><?php echo $fetch1['concept_name']?></option>
              <?php
                }

                ?>

					  </select>


					</div>

          <div class="form-group">

						<label for="download_link">Download Link <span class="star">*</span></label>

						<input type="text" class="form-control" name="download_link" aria-describedby="link" value=<?php echo $fetch['download_link'] ?> required>

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
