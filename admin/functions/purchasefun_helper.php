<?php

function get_studyitemdt($itemid,$itemtype){

	$ses=$GLOBALS['ses'];
	$result=mysqli_query($ses,"SELECT * FROM study_material  WHERE type='".$itemtype."' and id='".$itemid."'");

	return mysqli_fetch_array($result);

}
function get_courceitemdt($itemid,$itemtype){

	$ses=$GLOBALS['ses'];
	$result=mysqli_query($ses,"SELECT * FROM course_list  WHERE id='".$itemid."'");
	return mysqli_fetch_array($result);

}
function get_testseriesitemdt($itemid,$itemtype){
	$ses=$GLOBALS['ses'];
	$result=mysqli_query($ses,"SELECT * FROM test_series  WHERE  id='".$itemid."'");
	return mysqli_fetch_array($result);

}

?>