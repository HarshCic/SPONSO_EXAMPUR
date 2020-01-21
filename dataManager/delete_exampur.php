
<?php
$id = $_GET['id'];

include '../config.php';
$sql = "DELETE FROM exampur_special WHERE id=$id";

if (mysqli_query($ses, $sql)) {

    header('Location: exampuredit.php');
    exit;
} else {
    echo "Error deleting record";
}
 ?>
