<?php
function list_youtube_videos(){
	$ses=$GLOBALS['ses'];
	$sql = "SELECT * FROM `youtube_class` WHERE material_type = 'VIDEO'  ORDER BY id DESC";
	$result = mysqli_query($ses,$sql);
	return $result;
}

?>
