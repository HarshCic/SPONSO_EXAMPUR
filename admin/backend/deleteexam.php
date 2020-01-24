<?php include 'header.php';
$id = $_GET['id'];
$sql = "DELETE FROM exam WHERE id=$id";

if (mysqli_query($ses, $sql))
{

    header('Location: examlist.php');
    exit;
}
else
{
    echo "Error deleting record";
}
?>
