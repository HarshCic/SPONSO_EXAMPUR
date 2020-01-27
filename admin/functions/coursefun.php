<?php

function list_course(){

	$ses=$GLOBALS['ses'];

	$pr_query="SELECT * from course_list ORDER BY id DESC";

    $pr_result=mysqli_query($ses,$pr_query);



	return $pr_result ;

}



?>
