
<?php
$id = $_GET['id'];

include '../database/config.php';
$sql = "DELETE FROM course_list WHERE id=$id";

if (mysqli_query($ses, $sql)) {

    header('Location: listcourse.php');
    exit;
} else {
    echo "Error deleting record";
}
 ?>
