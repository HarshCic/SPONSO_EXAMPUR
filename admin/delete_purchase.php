
<?php
$id = $_GET['id'];

include '../config.php';
$sql = "UPDATE purchase SET transaction_id='0' WHERE id=$id";

if (mysqli_query($ses, $sql)) {

    header('Location: purchases.php');
    exit;
} else {
    echo "Error deleting record";
}
 ?>
