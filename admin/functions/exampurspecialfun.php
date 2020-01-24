<?php

function list_conceptfun(){

	$ses=$GLOBALS['ses'];

	$pr_query="SELECT * FROM exampur_special ORDER BY id DESC";

    $pr_result=mysqli_query($ses,$pr_query);

    

	return $pr_result ;

}

function a_addexampur($link,$title,$status,$download_link){
	$date=date('d-m-Y');
	$currentDateTime=date('Y-m-d H:i:s');
	$newDateTime = date('h:i A', strtotime($currentDateTime));
	$mydate=$date." at ".$newDateTime;
	

 	$query="INSERT into exampur_special ( `link`, `title`, `live_status`,`date_and_time` ,`dowload_link`) values ('".$link."','".$title."','".$status."','".$mydate."','".$download_link."')";

 	$ses =$GLOBALS['ses'];

  	return $result=mysqli_query($ses,$query);

}

?>