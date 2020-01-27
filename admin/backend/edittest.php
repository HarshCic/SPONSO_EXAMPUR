<?php
  	include 'header.php';
  	$serverimage=$GLOBALS['serverimage'];
  	$color=$msg='';
	$id=$_GET['id'];  

  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['upload'])) {
      $sql = "UPDATE `test_title` set `title`='".$_POST['title']."',`test_series_id`='".$_POST['testseries']."',`free_flag`='".$_POST['status']."',`time`='".$_POST['time']."',`questions`='".$_POST['questions']."',`marks`='".$_POST['marks']."',`exam_theme`='".$_POST['examtheme']."' WHERE id='".$id."'";
      $result=mysqli_query($ses, $sql);
      if ($result==true) {
        $msg = "Record updated successfully";
        $color="success";
      }else{
        $color="danger";
        $msg = "Failed to update record";
      }
    }
  }
  	$sqltest = "SELECT * FROM `test_title` WHERE id='".$id."'  ";
	$testresult=mysqli_query($ses, $sqltest);
	$fetch=mysqli_fetch_array($testresult);
  ?>
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Edit Test..
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="#">Test</a></li>
      <li><a href="#">Edit Test</a></li>
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
                <input type="text" name="title" id="titles" class="form-control" placeholder="Enter live video name.." value="<?php echo $fetch['title']; ?>" required >
              </div>
              <div class="form-group">
                <label for="testseries">Test Series </label>
                <select name="testseries" id="testseries" class="alltestseries form-control" required>
                </select>
              </div>
              <div class="form-group">
                <label for="status">Status</label>
                <select name="status" id="status" class="form-control" required>
                  <option value="1" <?php if($fetch['free_flag']=="1"){echo "selected";} ?>>Free </option>
                  <option value="0" <?php if($fetch['free_flag']=="0"){echo "selected";}?> >Paid </option>
                </select>
              </div>
              <div class="form-group">
              	<label for="time">Time</label>
              	<input type="text" name="time" id="time" class="form-control numeric" placeholder="put text in minutes" value="<?php echo $fetch['time']?>" required>
              	<span class="text-danger">put text in minutes</span>
              </div>
              <div class="form-group">
                <label for="questions">Questions </label>
                <input type="text" name="questions" id="questions" class="form-control numeric" placeholder="Number of question" value="<?php echo $fetch['questions']?>" required="">
              </div>
              <div class="form-group">
                <label for="marks">Marks </label>
                <input type="text" name="marks" id="marks" class="form-control numeric" placeholder="Number of marks" value="<?php echo $fetch['marks']?>" required="">
              </div>
              <div class="form-group">
                <label for="examtheme">Exam Theme </label>
                <input type="text" name="examtheme" id="examtheme" class="form-control" value="<?php echo  $fetch['exam_theme'];?>" required="">
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
  $sql = "SELECT * FROM `test_title`  ";
  $alltitle=mysqli_query($ses, $sql);
  $maxtitle=array();
  $maxtheme=array();
  while($row=mysqli_fetch_array($alltitle, MYSQLI_ASSOC)) 
  {
    array_push($maxtitle,$row['title']);
    array_push($maxtheme,$row['exam_theme']);
  }
  $maxtitle=json_encode($maxtitle);
  //end Title
  //start Test Series
  $sql1 = "SELECT * FROM `test_series`  ";
  $alltestseries=mysqli_query($ses, $sql1);
  $maxtest=array();
  
  while($row=mysqli_fetch_array($alltestseries, MYSQLI_ASSOC)) 
  {
    array_push($maxtest,$row);
  }
  $maxtest=json_encode($maxtest);
  $maxtheme=json_encode($maxtheme);
  //end Test Series
?>

<script>
  
  titles=<?php echo $maxtitle;?>;
  maxtheme=<?php echo $maxtheme;?>;
  $(document).ready(function(){
    $( "#titles" ).autocomplete({
      source: titles
    });
    $( "#examtheme" ).autocomplete({
      source: maxtheme
    });
    //Start Test Series list  
    maxtest=<?php echo $maxtest; ?>;
    htmltest=""; 
    $(maxtest).each(function(index, element) {
    	<?php if($fetch['test_series_id']){?>
      		htmltest+="<option value="+element.id+" selected>"+element.title+"</option>";
      	<?php }else{ ?>
      		htmltest+="<option value="+element.id+">"+element.title+"</option>";
      	<?php } ?>	
    });
    $('.alltestseries').html(htmltest);
    //End Test Series list
    $('body').on('keydown', '.numeric', function (e) {
        var a = e.key;
		if (a.length == 1) return /[0-9]|\+|-/.test(a);
		return true;
    });
  });    
</script>