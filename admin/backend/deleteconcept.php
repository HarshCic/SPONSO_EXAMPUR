
<?php
$id = $_GET['id'];

include '../database/config.php';
$sql = "DELETE FROM concept WHERE id=$id";

if (mysqli_query($ses, $sql)) {

    header('Location: listconcept.php');
    exit;
} else {
    echo "Error deleting record";
}
 ?>
