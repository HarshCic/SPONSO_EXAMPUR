
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
   	$image = $_FILES['image']['name'];
    $name=$_POST['name'];
    $email=$_POST['email'];
    $phone=$_POST['phone'];
    $password=$_POST['password'];
    $username=$_POST['username'];

   	$target = "../images_user/".basename($image);

   	$sql = "UPDATE user SET photo='$image',name='$name',email='$email',phone='$phone',username='$username',password='$password' WHERE id='$id'";
   	// execute query
   	mysqli_query($ses, $sql);

   	if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
   		$msg = "Image uploaded successfully";
      ?>
      <script type="text/javascript">
        alert("user Updated Succesfully");
      </script>
      <?php
   	}else{
      ?>
      <script type="text/javascript">
        alert("user not Updated Succesfully");
      </script>
      <?php
   	}
   }
   // $query=
   // $result=mysqli_query($ses,$query) or die($query);



 $query1=mysqli_query($ses,"SELECT * FROM user WHERE id=$id");
 $fetch=mysqli_fetch_array($query1);
 }
 else {
   $query1=mysqli_query($ses,"SELECT * FROM user WHERE id=$id");
   $fetch=mysqli_fetch_array($query1);
 }
  ?>
 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1">
     <title>userpur</title>
     <link rel="stylesheet" href="../css/main.css">
     <script type="text/javascript" src="../js/main.js"></script>
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

     <!-- Latest compiled and minified CSS -->
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

 <!-- Optional theme -->
 <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous"> -->

 <!-- Latest compiled and minified JavaScript -->


   </head>
   <body>
     <?php include 'main.php'; ?>
           <!-- Page Content -->
           <div id="page-content-wrapper">
               <div class="container-fluid">
                   <div class="row">
                       <div class="col-lg-12 jumbotron">
                         <br>
                         <h1>Edit User..</h1>
                       </div>
                   </div>

               </div>

               <form method="POST" action="" enctype="multipart/form-data">
                 <div class="form-group">
                   <label for="title">Name</label>
                   <input type="text" class="form-control" name="name" value=<?php echo $fetch['name'] ?> required>

                 </div>
                 <div class="form-group">
                   <label for="title">Email</label>
                   <input type="email" class="form-control" name="email" value=<?php echo $fetch['email'] ?> required>

                 </div>
                 <div class="form-group">
                   <label for="title">phone</label>
                   <input type="text" class="form-control" name="phone" value=<?php echo $fetch['phone'] ?> required>

                 </div>
                 <div class="form-group">
                   <label for="title">User Name</label>
                   <input type="text" class="form-control" name="username" value=<?php echo $fetch['username'] ?> required>

                 </div>

                 <div class="form-group">
                   <label for="title">Password</label>
                   <input type="text" class="form-control" name="password" placeholder="*********" required>

                 </div>
                 <div class="form-group">
                   <label for="title">Previous Photo</label>
                   <a class="form-control" href=<?php echo '../images_user/'.$fetch['photo']?>><?php echo $fetch['photo'] ?></a>


                 </div>
                 <div class="form-group">
                   <label for="link">Select New Photo </label>
                   <input type="file" name="image" class="form-control-file" aria-describedby="link"  required>


                 </div>


                 <small id="emailHelp" class="form-text text-muted">*All fields are Mandatory.</small>
                 <hr>
                 <button type="submit" name="upload" class="btn btn-primary">Update</button>
               </form>
           </div>
           <!-- /#page-content-wrapper -->
       </div>
   </div>
   <!-- /#wrapper -->
   <script type="text/javascript">
   $("#menu-toggle").click(function(e) {
           e.preventDefault();
           $("#wrapper").toggleClass("toggled");
       });
       var dropdown = document.getElementsByClassName("dropdown-btn");
       var i;

       for (i = 0; i < dropdown.length; i++) {
         dropdown[i].addEventListener("click", function() {
         this.classList.toggle("active");
         var dropdownContent = this.nextElementSibling;
         if (dropdownContent.style.display === "block") {
         dropdownContent.style.display = "none";
         } else {
         dropdownContent.style.display = "block";
         }
         });
       }
   </script>
   </body>


 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

 </html>
