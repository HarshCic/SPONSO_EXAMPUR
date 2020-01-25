
<?php
$id = $_GET['id'];

include '../database/config.php';
$sql = "DELETE FROM topic WHERE id=$id";

if (mysqli_query($ses, $sql)) {

    header('Location: listtopic.php');
    exit;
} else {
    echo "Error deleting record";
}
 ?>
