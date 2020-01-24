<?php

function list_purchase(){

	$ses=$GLOBALS['ses'];

	$result=mysqli_query($ses,"SELECT purchase.id,user_id,purchase.datetime,name,email,phone,transaction_id,item_type,item_id FROM purchase,user WHERE purchase.user_id=user.id && transaction_id!='0' ORDER BY purchase.id ");

	return $result;

}

?>