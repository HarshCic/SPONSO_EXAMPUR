
<?php
include '../config.php';
$id=$_GET['id'];

 ?>
 <?php
    include('../session.php');
 ?>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

  if (isset($_POST['upload'])) {
   $concept=$_POST['concept'];
   // Get image name
   $image = $_FILES['image']['name'];
   // Get text
   $image_text = mysqli_real_escape_string($ses, $_POST['image_text']);

   // image file directory
   $target = "../images_concept/".basename($image);

   $sql = "UPDATE concept SET concept_name='$concept',concept_logo='$image' WHERE id='$id" or die($sql);
   // execute query
   mysqli_query($ses, $sql);

   if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
     $msg = "Image uploaded successfully";
   }else{
     $msg = "Failed to upload image";
   }
  }
  // $query=
  // $result=mysqli_query($ses,$query) or die($query);


?>
<?php
$query1=mysqli_query($ses,"SELECT * FROM concept WHERE id=$id");
$fetch=mysqli_fetch_array($query1);
}
else {
  $query1=mysqli_query($ses,"SELECT * FROM concept WHERE id=$id");
  $fetch=mysqli_fetch_array($query1);
}
 ?>
