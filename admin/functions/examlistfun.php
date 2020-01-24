<?php
function list_exams(){
	$ses=$GLOBALS['ses'];
	$result=mysqli_query($ses,"SELECT * FROM exam ORDER BY id DESC  ") or die($query);
	return $result;
}
?>