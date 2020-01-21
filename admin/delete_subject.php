
<?php
$id = $_GET['id'];

include '../config.php';
$sql = "DELETE FROM subject WHERE id=$id";

if (mysqli_query($ses, $sql)) {

    header('Location: subject.php');
    exit;
} else {
    echo "Error deleting record";
}
 ?>
