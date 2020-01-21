
<?php
$id = $_GET['id'];

include '../config.php';
$sql = "DELETE FROM concept WHERE id=$id";

if (mysqli_query($ses, $sql)) {

    header('Location: concept.php');
    exit;
} else {
    echo "Error deleting record";
}
 ?>
