<?php

$id = $_GET['id'];

include '../database/config.php';
$sql = "UPDATE help SET flag='1' WHERE id=$id";
if (mysqli_query($ses, $sql)) {
    header('Location: help.php');
    exit;
} else {
    echo "Error resolve record";
}

 ?>

