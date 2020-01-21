
<?php
$id = $_GET['id'];

include '../config.php';
$sql = "UPDATE user SET datetime='0000-00-00 00:00:00' WHERE id=$id";

if (mysqli_query($ses, $sql)) {

    header('Location: user.php');
    exit;
} else {
    echo "Error deleting record";
}
 ?>
