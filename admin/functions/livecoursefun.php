<?php
function livecoursevideopdf($materialtype){
	$ses=$GLOBALS['ses'];
	$pr_query="SELECT * from live_course_class where  material_type='".$materialtype."' ORDER BY id DESC";
    $pr_result=mysqli_query($ses,$pr_query);
	return $pr_result ;
}
function getcourse($id){
	$ses=$GLOBALS['ses'];
	$pr_query="SELECT * from course_list where id='".$id."'";
    $pr_result=mysqli_query($ses,$pr_query);
    $fetch=mysqli_fetch_array($pr_result);
	return $fetch['course_name'];
}
function getstatus($id){
	if($id==1){
		return "Live";
	}else if($id==3){
		return "Recorded";
	}
}
function getexam($id){
	$ses=$GLOBALS['ses'];
	$sql2 = "SELECT * FROM `exam` WHERE id=$id ";
  	$exam=mysqli_query($ses, $sql2);
  	$fetch=mysqli_fetch_array($exam);
  	return $fetch['exam_name'];
}
function getsubject($id){
	$ses=$GLOBALS['ses'];
	$sql2 = "SELECT * FROM `subject` WHERE id=$id  ";
  	$exam=mysqli_query($ses, $sql2);
  	$fetch=mysqli_fetch_array($exam);
  	return $fetch['subject_name'];
}
function gettopicnm($id){
	$ses=$GLOBALS['ses'];
	$sql2 = "SELECT * FROM `topic` WHERE id=$id  ";
  	$topic=mysqli_query($ses, $sql2);
  	$fetch=mysqli_fetch_array($topic);
  	return $fetch['topic_name'];
}
function getconceptnm($id){
	$ses=$GLOBALS['ses'];
	$sql2 = "SELECT * FROM `concept` WHERE id=$id  ";
  	$concept=mysqli_query($ses, $sql2);
  	$fetch=mysqli_fetch_array($concept);
  	return $fetch['concept_name'];
}
function getsectionnm($id){
	$ses=$GLOBALS['ses'];
	$sql2 = "SELECT * FROM `section`  ";
  	$section=mysqli_query($ses, $sql2);
  	$fetch=mysqli_fetch_array($section);
  	return $fetch['sec_title'];
}
function testseries($id){
	$ses=$GLOBALS['ses'];
	$sql2 = "SELECT * FROM `test_series` WHERE id=$id ";
  	$exam=mysqli_query($ses, $sql2);
  	$fetch=mysqli_fetch_array($exam);
  	return $fetch['title'];
}
?>
