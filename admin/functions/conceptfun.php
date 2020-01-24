<?php
function list_conceptfun(){
	$ses=$GLOBALS['ses'];
	$pr_query="SELECT * from concept";
    $pr_result=mysqli_query($ses,$pr_query);
    
	return $pr_result ;
}

?>