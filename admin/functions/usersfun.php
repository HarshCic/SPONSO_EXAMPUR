<?php
function list_users(){
	$ses=$GLOBALS['ses'];
	$sql = "SELECT * FROM user";
	$result = mysqli_query($ses,$sql);
	return $result;
}
?>