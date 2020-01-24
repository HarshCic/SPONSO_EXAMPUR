<?php 


function a_add_currentaffair($title,$pdf_link,$type)
{
	$ses=$GLOBALS['ses'];
	$query="INSERT INTO `current_affair`(`title`, `date_and_time`, `pdf_link`, `type`) values  ('".$title."','".date('d-m-Y h:i:s')."','".$pdf_link."','".$type."')";
    $result=mysqli_query($ses,$query);
    return $result;
}
function list_currentaffair($status){
	$ses=$GLOBALS['ses'];
	$result=mysqli_query($ses,"SELECT * FROM `current_affair` where type='".$status."' ORDER BY id DESC");
	return $result;
}
?>