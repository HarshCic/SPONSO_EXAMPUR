<?php
function list_test_series(){
	$ses=$GLOBALS['ses'];
	$result=mysqli_query($ses,"SELECT * FROM test_series ORDER BY id DESC  ") or die($query);
	return $result;
}
?>
