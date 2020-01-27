<?php
function list_testseries(){
	$ses=$GLOBALS['ses'];
	$sql = "SELECT * FROM test_series";
	$result = mysqli_query($ses,$sql);
	return $result;
}
?>
