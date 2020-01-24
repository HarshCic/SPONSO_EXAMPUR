<?php

function list_helpfun(){

	$ses=$GLOBALS['ses'];

	$sql = "SELECT * FROM help where flag='0'";

	$result = mysqli_query($ses,$sql);

	return $result;

}

?>