<?php
function list_featured(){
	$ses=$GLOBALS['ses'];
    $query=mysqli_query($ses,"SELECT * FROM featured_video ORDER BY id DESC");
	return $query ;
}
function add_featuredvideo($link,$title,$status,$download_link){
	$ses=$GLOBALS['ses'];
	$date=date('d-m-Y');
	$currentDateTime=date('Y-m-d H:i:s');
	$newDateTime = date('h:i A', strtotime($currentDateTime));
	$mydate=$date." at ".$newDateTime;
	$query="INSERT INTO `featured_video`( `link`, `title`,  `live_status`, `download_link`, `date_and_time`) values ('".$link."','".$title."','".$status."','".$download_link."','".$mydate."')";
	$result=mysqli_query($ses,$query);
	return $result ;
}

function a_addexam($image,$image_text,$category){
	
 	$sql = "INSERT INTO exam (exam_logo, exam_name,exam_category) VALUES ('$image', '$image_text','$category')";
 	$ses =$GLOBALS['ses'];
  	return $result=mysqli_query($ses,$sql);
}

?>