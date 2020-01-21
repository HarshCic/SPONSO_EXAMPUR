<?php include '../config.php'; ?>
<?php
   include('../session.php');
?>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  if (isset($_POST['upload'])) {
  	// Get image name
  	$image = $_FILES['image']['name'];
  	// Get text
  	$image_text = mysqli_real_escape_string($ses, $_POST['image_text']);

  	// image file directory
  	$target = "../images_concept/".basename($image);

  	$sql = "INSERT INTO concept (concept_logo, concept_name) VALUES ('$image', '$image_text')";
  	// execute query
  	mysqli_query($ses, $sql);

  	if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
  		$msg = "Image uploaded successfully";
  	}else{
  		$msg = "Failed to upload image";
  	}
  }
  $result = mysqli_query($ses, "SELECT * FROM images");
?>
<script type="text/javascript">
  alert("Concept added Succesfully");
</script>
<?php
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
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container-fluid">
          <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                  <span class="sr-only">Toggle navigation</span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand" href="#menu-toggle" id="menu-toggle"><span class="glyphicon glyphicon-list" aria-hidden="true"></span></a>
          </div>
          <div id="navbar" class="navbar-collapse collapse">
              <ul  class="nav navbar-nav navbar-left">
                  <li ><a href="index.php"> Exampur </a></li>
              </ul>
              <ul class="nav navbar-nav navbar-right">
                <li style="float:right;"><a href="#">Admin Panel</a></li>
              </ul>

          </div>
      </div>
  </nav>

  <div id="wrapper" class="toggled">
      <div class="container-fluid">
          <!-- Sidebar -->
          <div id="sidebar-wrapper">
              <ul class="sidebar-nav">
                	<li class="sidebar-brand">
                      <br>
                  </li>
                  <li>
                      <a href="index.php"><span class="glyphicon glyphicon-home" aria-hidden="true"></span> Dashboard </a>
                  </li>
                   <li>

                        <a class="dropdown-btn"><span class="glyphicon glyphicon-facetime-video" aria-hidden="true"></span> Featured Video
                           <span class="glyphicon glyphicon-triangle-bottom" aria-hidden="true"></span>
                        </a>
                        <div class="dropdown-container">
                          <a href="featureAdd.php">Add Featured Video</a>
                          <a href="featureEdit.php">Edit Featured Video</a>
                        </div>
                  </li>
                  <li>

                       <a class="dropdown-btn"><span class="glyphicon glyphicon-bookmark" aria-hidden="true"></span> Exampur Special
                         <span class="glyphicon glyphicon-triangle-bottom" aria-hidden="true"></span>
                       </a>
                       <div class="dropdown-container">
                         <a href="exampuradd.php">Add Exampur Video</a>
                         <a href="exampuredit.php">Edit Exampur Video</a>
                       </div>
                 </li>
                 <li>

                      <a class="dropdown-btn"><span class="glyphicon glyphicon-upload" aria-hidden="true"></span> Concept
                        <span class="glyphicon glyphicon-triangle-bottom" aria-hidden="true"></span>
                      </a>
                      <div class="dropdown-container">
                        <a href="conceptadd.php">Add Concept</a>
                        <a href="concept.php">Edit Concept</a>
                      </div>
                </li>
                <li>

                     <a class="dropdown-btn"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Exam
                       <span class="glyphicon glyphicon-triangle-bottom" aria-hidden="true"></span>
                     </a>
                     <div class="dropdown-container">
                       <a href="examadd.php">Add Exam</a>
                       <a href="exam.php">Edit Exam</a>
                     </div>
               </li>
               <li>

                    <a class="dropdown-btn"><span class="glyphicon glyphicon-tags" aria-hidden="true"> </span> Subject
                      <span class="glyphicon glyphicon-triangle-bottom" aria-hidden="true"></span>
                    </a>
                    <div class="dropdown-container">
                      <a href="subjectadd.php">Add Subject</a>
                      <a href="subject.php">Edit Subject</a>
                    </div>
              </li>
                 <li>
                     <a href="study_material.php"><span class="glyphicon glyphicon-book" aria-hidden="true"></span> Study Material </a>
                 </li>
                  <li>
                      <a href="help.php"><span class="glyphicon glyphicon-comment" aria-hidden="true"></span> Help Request </a>
                  </li>
              </ul>
          </div>
          <!-- /#sidebar-wrapper -->

          <!-- Page Content -->
          <div id="page-content-wrapper">
              <div class="container-fluid">
                  <div class="row">
                      <div class="col-lg-12 jumbotron">
                        <br>
                        <h1>Add A Concept..</h1>
                      </div>
                  </div>

              </div>

              <form method="POST" action="" enctype="multipart/form-data">
                <!-- <div class="form-group">
                  <label for="link">Link</label>
                  <input type="text" class="form-control" name="link" aria-describedby="link" placeholder="youtube.com" required>

                </div>
                <div class="form-group">
                  <label for="title">Title</label>
                  <input type="text" class="form-control" name="title" placeholder="Include the title of Video" required>
                </div> -->

                <!-- <input type="hidden" name="size" value="1000000"> -->
                <div class="form-group">
                  <label for="link">Select Logo </label>
                  <input type="file" name="image" class="form-control" aria-describedby="link"  required>


                </div>
                <div class="form-group">
                  <label for="title">Concept Name</label>
                  <input type="text" class="form-control" name="image_text" placeholder="Say something about this image..." required>

                </div>

                <small id="emailHelp" class="form-text text-muted">*All fields are Mandatory.</small>
                <hr>
                <button type="submit" name="upload" class="btn btn-primary">Submit</button>
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
