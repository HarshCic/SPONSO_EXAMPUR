<?php
 	$id = $_GET['id'];
	include '../database/config.php';
	$sql = "DELETE FROM study_material WHERE id=$id";
	if (mysqli_query($ses, $sql)) {
	    header('Location: liststudymaterial.php');
	    exit;
	} else {
    	echo "Error deleting record";
	}

 ?>

