
<?php
$id = $_GET['id'];

include '../config.php';
$sql = "DELETE FROM featured_video WHERE id=$id";

if (mysqli_query($ses, $sql)) {

    header('Location: featureEdit.php'); //If book.php is your main page where you list your all records
    exit;
} else {
    echo "Error deleting record";
}
 ?>
