
<?php
$id = $_GET['id'];

include '../config.php';
$sql = "DELETE FROM exam WHERE id=$id";

if (mysqli_query($ses, $sql)) {

    header('Location: exam.php');
    exit;
} else {
    echo "Error deleting record";
}
 ?>
