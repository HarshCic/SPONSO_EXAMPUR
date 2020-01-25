<?php
function list_pdf(){
	$ses=$GLOBALS['ses'];
	$sql = "SELECT * FROM youtube_class WHERE material_type='PDF' ORDER BY id DESC ";
	$result = mysqli_query($ses,$sql);
	return $result;
}
?>
