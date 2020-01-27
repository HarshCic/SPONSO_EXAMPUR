
<?php
$id = $_GET['id'];

include '../database/config.php';
$sql = "DELETE FROM test_series WHERE id=$id";

if (mysqli_query($ses, $sql)) {

    header('Location: list_testseries.php');
    exit;
} else {
    echo "Error deleting record";
}
 ?>
