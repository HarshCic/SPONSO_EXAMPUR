
<?php
$id = $_GET['id'];

include '../database/config.php';
$sql = "DELETE FROM youtube_class WHERE id=$id";

if (mysqli_query($ses, $sql)) {

    header('Location: listpdf.php');
    exit;
} else {
    echo "Error deleting record";
}
 ?>
