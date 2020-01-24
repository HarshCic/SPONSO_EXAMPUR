
<?php
$id = $_GET['id'];

include '../database/config.php';
$sql = "UPDATE purchase SET transaction_id='0' WHERE id=$id";

if (mysqli_query($ses, $sql)) {

    header('Location: allpurchase.php');
    exit;
} else {
    echo "Error deleting record";
}
 ?>
