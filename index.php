<?php
   include("config.php");

      // include('session.php');

   session_start();
   $error="Welcome to LogIn page";

   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form

      $myusername = mysqli_real_escape_string($ses,$_POST['username']);
      $mypassword = mysqli_real_escape_string($ses,$_POST['password']);

      $sql = "SELECT id,roll FROM admin_login WHERE username = '$myusername' and password = '$mypassword'";
      $result = mysqli_query($ses,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      // $active = $row['active'];
      $roll=$row['roll'];

      $count = mysqli_num_rows($result);

      // If result matched $myusername and $mypassword, table row must be 1 row

      if($count == 1) {
         // session_register("myusername");
         $_SESSION['login_user'] = $myusername;
         echo $_SESSION['login_user'];
         if ($roll=="admin") {
           // code...
           header("location: admin/index.php");
         } elseif($roll=="customer executive") {

           header("location: customerExecutive/index.php");
         }
         else {
           // code...
           header("location: dataManager/index.php");
         }

      }else {
         $error = "*Your Username or Password is invalid";

      }
   }

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Exampur</title>
    <link rel="stylesheet" href="css/main.css">
    <script type="text/javascript" src="js/main.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous"> -->

<!-- Latest compiled and minified JavaScript -->


  </head>
  <style media="screen">
  @media (min-width: 768px){}
div#page-content-wrapper {
  width: 50%;
  margin: auto;
}
#form-content-wrapper{
  width: 70%;
  margin: auto;
}
}
  </style>
  <body>
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container-fluid">

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


          <!-- Page Content -->
          <div id="page-content-wrapper" >
              <div class="container-fluid">
                  <div class="row">
                      <div class="col-lg-12 jumbotron">
                        <br>
                        <h1>Admin Panel</h1>
                        <br>
                        <h4><?php echo $error ?></h4>
                      </div>
                  </div>

              </div>

              <form method="POST" action="" id="form-content-wrapper" class="form-horizontal">
                <div class="form-group">
                  <label class="control-label col-sm-2" for="username">Username:</label>
                  <div class="col-sm-10">
                    <input type="text" name="username" class="form-control" id="username" placeholder="Enter Username">
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-sm-2" for="pwd">Password:</label>
                  <div class="col-sm-10">
                    <input type="password" name="password" class="form-control" id="pwd" placeholder="Enter password">
                  </div>
                </div>

                <div class="form-group">
                  <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-primary" style="margin:auto;">LogIn</button>
                  </div>
                </div>

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
