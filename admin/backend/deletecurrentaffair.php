<?php
$id = $_GET['id'];

include '../database/config.php';
$sql = "DELETE FROM current_affair WHERE id=$id";

if (mysqli_query($ses, $sql)) {

    header('Location: currentaffairlist.php');
    exit;
} else {
    echo "Error deleting record";
}
 ?>
