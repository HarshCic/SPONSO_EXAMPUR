<?php

function listtest(){
	$ses=$GLOBALS['ses'];
	$pr_query="SELECT * from test_title ORDER BY id DESC";
    $pr_result=mysqli_query($ses,$pr_query);
	return $pr_result ;
}
function gettestnm($id){
	$ses=$GLOBALS['ses'];
	$pr_query="SELECT * from test_series where id='".$id."'";
    $pr_result=mysqli_query($ses,$pr_query);
    $fetch=mysqli_fetch_array($pr_result);
	return $fetch['title'];	
}
function getstatus($status){
	if ($status==1) {
		return "Free";
	} else if ($status==0) {
		return "Paid";
	} else {
		return "";
	}
	
}

?>