
<?php
$id = $_GET['id'];

include '../database/config.php';
$sql = "DELETE FROM subject WHERE id=$id";

if (mysqli_query($ses, $sql)) {

    header('Location: listsubject.php');
    exit;
} else {
    echo "Error deleting record";
}
 ?>
