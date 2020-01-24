<?php

function atotal_users(){
	$ses=$GLOBALS['ses'];
	$pr_query="SELECT * FROM `user`";
	$result= mysqli_query($ses,$pr_query);
	$result=mysqli_num_rows ( $result );
	return $result;
}
function atotal_todaysusers(){
	$ses=$GLOBALS['ses'];
	$pr_query="SELECT * FROM `user` where DATE(datetime) = DATE(NOW())";
	$result= mysqli_query($ses,$pr_query);
	$result=mysqli_num_rows ( $result );
	return $result;
}
function atotal_featurdvideos(){
	$ses=$GLOBALS['ses'];
	$pr_query="SELECT * FROM `featured_video`";
	$result= mysqli_query($ses,$pr_query);
	$result=mysqli_num_rows ( $result );
	return $result;
}
function atotal_exams(){
	$ses=$GLOBALS['ses'];
	$pr_query="SELECT * FROM `exam`";
	$result= mysqli_query($ses,$pr_query);
	$result=mysqli_num_rows ( $result );
	return $result;
}
function atotal_subjects(){
	$ses=$GLOBALS['ses'];
	$pr_query="SELECT * FROM `subject`";
	$result= mysqli_query($ses,$pr_query);
	$result=mysqli_num_rows ( $result );
	return $result;
}
function atotal_currentaffairs(){
	$ses=$GLOBALS['ses'];
	$pr_query="SELECT * FROM `current_affair`";
	$result= mysqli_query($ses,$pr_query);
	$result=mysqli_num_rows ( $result );
	return $result;
}
function atotal_purchase(){
	$ses=$GLOBALS['ses'];
	$pr_query="SELECT * FROM `purchase`";
	$result= mysqli_query($ses,$pr_query);
	$result=mysqli_num_rows ( $result );
	return $result;
}
function atotal_studymaterial(){
	$ses=$GLOBALS['ses'];
	$pr_query="SELECT * FROM `study_material`";
	$result= mysqli_query($ses,$pr_query);
	$result=mysqli_num_rows ( $result );
	return $result;
}
?>