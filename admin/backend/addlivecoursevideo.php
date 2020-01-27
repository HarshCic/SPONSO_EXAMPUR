<?php
  include 'header.php';
  $serverimage=$GLOBALS['serverimage'];
  $color=$msg='';
  
  
  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['upload'])) {
      $date=date('d-m-Y');
      $currentDateTime=date('Y-m-d H:i:s');
      $newDateTime = date('h:i A', strtotime($currentDateTime));
      $mydate=$date." at ".$newDateTime;
      $image = $_FILES['thumbnail']['name'];
      $target = "../Livecourse/Video/Thumbnail/".basename($image);
      $conceptimage=$GLOBALS['serverimage']."Livecourse/Video/Thumbnail/".basename($image);
      $sql = "INSERT INTO `live_course_class`(`Title`, `material_type`, `file_link`, `thumbnail`, `course_id`, `live_status`, `exam`, `subject`, `topic`, `concept`, `section`, `pdf_link`, `date_and_time`, `download_link`) VALUES ('".$_POST['title']."', 'VIDEO', '".$_POST['link']."', '".$conceptimage."', '".$_POST['course']."', '".$_POST['status']."', '".$_POST['exam']."', '".$_POST['subject']."', '".$_POST['topic']."', '".$_POST['concept']."', '".$_POST['section']."', '".$_POST['pdflink']."', '".$mydate."', '".$_POST['link']."')";
      $result=mysqli_query($ses, $sql);
      if (move_uploaded_file($_FILES['thumbnail']['tmp_name'], $target) && $result==true) {
        $msg = "Record updated successfully";
        $color="success";
      }else{
        $color="danger";
        $msg = "Failed to upload image";
      }
    }
  }
  ?>
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Add Live Video..
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="#">Live Course</a></li>
      <li class="active">Add Live Video</li>
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
                <div class="alert alert-<?php echo $color; ?>"><?php echo $msg; ?></div>
              </div>
              <?php } ?>
              <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" id="titles" class="form-control" placeholder="Enter live video name.." required >
              </div>
              <div class="form-group">
                <label for="link">Link</label>
                <input type="url" id="link" class="form-control" name="link"  placeholder="https://" required>
              </div>
              <div class="form-group">
                <label for="thumbnail">Thumbnail</label>
                <input type="file" name="thumbnail" class="form-control" aria-describedby="link"  required>
              </div>
              <div class="form-group">
                <label for="course">Course </label>
                <select name="course" class="courseoption form-control" required>
                </select>
              </div>
              <div class="form-group">
                <label for="status">Live status</label>
                <select name="status" id="status" class="form-control" required>
                  <option value="1">Live </option>
                  <option value="3">Recorded </option>
                </select>
              </div>
              <div class="form-group">
                <label for="exam">Exam </label>
                <select name="exam" id="exam" class="form-control allexam" required>
                </select>
              </div>
              <div class="form-group">
                <label for="subject">Subject </label>
                <select name="subject" id="subject" class="form-control allsubject" required>
                </select>
              </div>
              <div class="form-group">
                <label for="topic">Topic </label>
                <select name="topic" class="form-control alltopic" required>
                </select>
              </div>
              <div class="form-group">
                <label for="concept">Concept </label>
                <select name="concept" class="form-control allconcept" required>
                </select>
              </div>
              <div class="form-group">
                <label for="section">Section </label>
                <select name="section" id="section" class="form-control allsection" required>
                </select>
              </div>
              <div class="form-group">
                <label for="pdflink">PDF Link </label>
                <input type="url" name="pdflink" id="pdflink" class="form-control" placeholder="http://" required>
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
<?php 
  include "footer.php";
  //start Title
  $sql = "SELECT * FROM `live_course_class`  ";
  $alltitle=mysqli_query($ses, $sql);
  $maxtitle=array();
  while($row=mysqli_fetch_array($alltitle, MYSQLI_ASSOC)) 
  {
    array_push($maxtitle,$row['Title']);
  }
  $maxtitle=json_encode($maxtitle);
  //end Title
  //start course_list
  $sql1 = "SELECT * FROM `course_list`  ";
  $allcourse=mysqli_query($ses, $sql1);
  $maxcourse=array();
  while($row=mysqli_fetch_array($allcourse, MYSQLI_ASSOC)) 
  {
    array_push($maxcourse,$row);
  }
  $maxcourse=json_encode($maxcourse);
  //end course_list
  //start exam
  $sql2 = "SELECT * FROM `exam`  ";
  $allexam=mysqli_query($ses, $sql2);
  $maxexam=array();
  while($row=mysqli_fetch_array($allexam, MYSQLI_ASSOC)) 
  {
    array_push($maxexam,$row);
  }
  $maxexam=json_encode($maxexam);
  //end exam
  //start Subject
  $sql3 = "SELECT * FROM `subject`  ";
  $allsubject=mysqli_query($ses, $sql3);
  $maxsubject=array();
  while($row=mysqli_fetch_array($allsubject, MYSQLI_ASSOC)) 
  {
    array_push($maxsubject,$row);
  }
  $maxsubject=json_encode($maxsubject);
  //end Subject
  //start Topic
  $sql4 = "SELECT * FROM `topic`  ";
  $alltopic=mysqli_query($ses, $sql4);
  $maxtopic=array();
  while($row=mysqli_fetch_array($alltopic, MYSQLI_ASSOC)) 
  {
    array_push($maxtopic,$row);
  }
  $maxtopic=json_encode($maxtopic);
  //end Topic
  //start Concept
  $sql5 = "SELECT * FROM `concept`  ";
  $allconcept=mysqli_query($ses, $sql5);
  $maxconcept=array();
  while($row=mysqli_fetch_array($allconcept, MYSQLI_ASSOC)) 
  {
    array_push($maxconcept,$row);
  }
  $maxconcept=json_encode($maxconcept);
  //end Concept
  //start Concept
  $sql6 = "SELECT * FROM `section`  ";
  $allsection=mysqli_query($ses, $sql6);
  $maxsection=array();
  while($row=mysqli_fetch_array($allsection, MYSQLI_ASSOC)) 
  {
    array_push($maxsection,$row);
  }
  $maxsection=json_encode($maxsection);
  //end Concept
?>

<script>
  
  titles=<?php echo $maxtitle;?>;
  $(document).ready(function(){
    $( "#titles" ).autocomplete({
      source: titles
    });
    //Start Course list  
    maxcourse=<?php echo $maxcourse; ?>;
    htmlcourse=""; 
    $(maxcourse).each(function(index, element) {
      htmlcourse+="<option value="+element.id+">"+element.course_name+"</option>";
    });
    $('.courseoption').html(htmlcourse);
    //End Course list
    //Start Exam
    maxexam=<?php echo $maxexam; ?>;
    htmlexam=""; 
    $(maxexam).each(function(index, element) {
      htmlexam+="<option value="+element.id+">"+element.exam_name+"</option>";
    });
    $('.allexam').html(htmlexam);
    //End Exam
    //Start Subject
    maxsubject=<?php echo $maxsubject; ?>;
    htmlsubject=""; 
    $(maxsubject).each(function(index, element) {
      htmlsubject+="<option value="+element.id+">"+element.subject_name+"</option>";
    });
    $('.allsubject').html(htmlsubject);
    //End Subject  
    //Start Topic
    maxtopic=<?php echo $maxtopic; ?>;
    htmltopic=""; 
    $(maxtopic).each(function(index, element) {
      htmltopic+="<option value="+element.id+">"+element.topic_name+"</option>";
    });
    $('.alltopic').html(htmltopic);
    //End Topic
    //Start Concept
    maxconcept=<?php echo $maxconcept; ?>;
    htmlconcept=""; 
    $(maxconcept).each(function(index, element) {
      htmlconcept+="<option value="+element.id+">"+element.concept_name+"</option>";
    });
    $('.allconcept').html(htmlconcept);
    //End Concept
    //Start Section
    maxsection=<?php echo $maxsection; ?>;
    htmlsection=""; 
    $(maxsection).each(function(index, element) {
      htmlsection+="<option value="+element.sec_id+">"+element.sec_title+"</option>";
    });
    $('.allsection').html(htmlsection);
    //End Section  
  });    
</script>