<?php
session_start();
ob_start();
date_default_timezone_set('Asia/Calcutta');
$ses = mysqli_connect("localhost","root","");
$db = mysqli_select_db($ses,'exampur');
mysqli_query($ses,"SET NAMES 'utf8'");
$GLOBALS['ses'] =$ses ;

if(!$ses){
 echo("<p>Connection to content server failed.</p>");
 exit();
}
else{
	// echo "connected";
}
?>
