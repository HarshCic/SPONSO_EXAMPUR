
<?php
$ses = mysqli_connect("localhost","root","");
$db = mysqli_select_db($ses,'exampur');
mysqli_query($ses,"SET NAMES 'utf8'");
if(!$ses){
 echo("<p>Connection to content server failed.</p>");
 exit();
}
else{
	// echo "connected";
}
?>
