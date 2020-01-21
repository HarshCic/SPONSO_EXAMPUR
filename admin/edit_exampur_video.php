
<?php
include '../config.php';
$id=$_GET['id'];

 ?>
 <?php
    include('../session.php');
 ?>
 <?php
 if ($_SERVER['REQUEST_METHOD'] == 'POST') {
   $link=$_POST['link'];
   $title=$_POST['title'];
   $status=$_POST['status'];
   $download_link=$_POST['download_link'];
   $query="UPDATE exampur_special SET link='$link',title='$title',live_status='$status',download_link='$download_link' WHERE id='$id'";
   $result=mysqli_query($ses,$query) or die($query);


 ?>
 <script type="text/javascript">
   alert("Video Updated Succesfully");
 </script>
 <?php
 $query1=mysqli_query($ses,"SELECT * FROM exampur_special WHERE id=$id");
 $fetch=mysqli_fetch_array($query1);
 }
 else {
   $query1=mysqli_query($ses,"SELECT * FROM exampur_special WHERE id=$id");
   $fetch=mysqli_fetch_array($query1);
 }
  ?>
 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1">
     <title>Exampur</title>
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
                         <h1>Edit Exampur Video..</h1>
                       </div>
                   </div>

               </div>

               <form method="POST" action="">
                 <div class="form-group">
                   <label for="link">Link</label>
                   <input type="text" value='<?php echo $fetch["link"]?>' class="form-control" name="link" aria-describedby="link" placeholder="youtube.com" required>

                 </div>
                 <div class="form-group">
                   <label for="title">Title</label>
                   <input type="text" value='<?php echo $fetch["title"]?>' class="form-control" name="title" placeholder="Include the title of Video" required>
                 </div>
                 <div class="form-group">
                   <label for="status">Live Status</label>
                   <select  class="form-control" name="status" required>
                     <option value="0" <?php if($fetch["live_status"]==0){ echo "selected"; } ?>>Live</option>
                     <option value="1"  <?php if($fetch["live_status"]==1){ echo "selected"; } ?>>Class Recorded</option>
                     <option value="2"  <?php if($fetch["live_status"]==2){ echo "selected"; } ?>>Upcoming Class</option>
                   </select>
                 </div>
                 <div class="form-group">
                   <label for="download_link">Download Link</label>
                   <input type="text" value='<?php echo $fetch["download_link"] ?>' class="form-control" name="download_link" placeholder="Paste the download link here.." required>
                 </div>

                 <small id="emailHelp" class="form-text text-muted">*All fields are Mandatory.</small>
                 <hr>
                 <button type="submit" class="btn btn-primary">Update</button>
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
