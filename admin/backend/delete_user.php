<?php
$id = $_GET['id'];
include '../database/config.php';
$sql = "UPDATE user SET datetime='0000-00-00 00:00:00' WHERE id=$id";

if (mysqli_query($ses, $sql)) {

    header('Location: users.php');
    exit;
} else {
    echo "Error deleting record";
}
 ?>
