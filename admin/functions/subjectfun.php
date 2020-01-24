<?php
function list_subjects(){
	$ses=$GLOBALS['ses'];
	$sql = "SELECT * FROM subject ORDER BY id DESC";
	$result = mysqli_query($ses,$sql);
	return $result;
}
?>