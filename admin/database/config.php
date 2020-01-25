<?php
session_start();
ob_start();
date_default_timezone_set('Asia/Calcutta');
$ses = mysqli_connect("localhost","root","");
$db = mysqli_select_db($ses,'exampur_app');
mysqli_query($ses,"SET NAMES 'utf8'");
$GLOBALS['ses'] =$ses ;

$GLOBALS['serverimage']="http://".$_SERVER['HTTP_HOST']."/admin/";

if(!$ses){
 echo("<p>Connection to content server failed.</p>");
 exit();
}
else{
	// echo "connected";
}
?>
