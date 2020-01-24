<?php
function list_studymaterial($type){
	$ses=$GLOBALS['ses'];
	$sql = "SELECT * FROM `study_material` WHERE type='".$type."'  ORDER BY id DESC";
	$result = mysqli_query($ses,$sql);
	return $result;
}

?>