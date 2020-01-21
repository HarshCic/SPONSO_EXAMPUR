
<?php
$id = $_GET['id'];

include '../config.php';
$sql = "DELETE FROM exampur_special WHERE id=$id";

if (mysqli_query($ses, $sql)) {

    header('Location: exampuredit.php'); //If book.php is your main page where you list your all records
    exit;
} else {
    echo "Error deleting record";
}
 ?>
