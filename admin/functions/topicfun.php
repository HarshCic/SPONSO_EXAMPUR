<?php
function list_topics(){
	$ses=$GLOBALS['ses'];
	$sql = "SELECT * FROM topic ORDER BY id DESC";
	$result = mysqli_query($ses,$sql);
	return $result;
}
?>
