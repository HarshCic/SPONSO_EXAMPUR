<?php include '../config.php';
include '../session.php';
if (isset($_GET['page'])) {
  // code...
  $page=$_GET['page'];
}
else {
  $page=1;
}
$num_per_page=10;
$start_from=($page-1)*10;

?>
<?php
$query=mysqli_query($ses,"SELECT * FROM user WHERE datetime!='0000-00-00 00:00:00' ORDER BY id DESC LIMIT $start_from,$num_per_page") or die($query); ?>

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
          <!-- /#sidebar-wrapper -->
          <?php include 'main.php'; ?>
          <!-- Page Content -->
          <div id="page-content-wrapper">
              <div class="container-fluid">
                  <div class="row">
                      <div class="col-lg-12 jumbotron">
                        <br>
                        <h1>Users..</h1>
                      </div>
                  </div>

              </div>


          </div>
          <!-- /#page-content-wrapper -->

          <div class="container table-responsive">
            <table class="table table-striped table-bordered">
              <thead>
                <tr>

                  <th>Name</th>
                  <th>Email</th>
                  <th>Phone</th>
                  <th>Username</th>
                  <th>Photo</th>
                  <th>Date & Time</th>
                  <th>Delete</th>
                  <th>Password</th>
                  <th>Edit</th>


                </tr>
              </thead>
              <tbody>
                <?php while ($fetch=mysqli_fetch_array($query)) { ?>

                  <tr>

                    <td><?php echo $fetch['name'] ?></td>
                    <td><?php echo $fetch['email'] ?></td>
                    <td><?php echo $fetch['phone'] ?></td>
                    <td><?php echo $fetch['username'] ?></td>


                    <td><a href=<?php echo $fetch['photo']?>> <?php echo $fetch['photo'] ?></a></td>
                    <td><?php echo $fetch['datetime'] ?></td>
                    <td> <a href=<?php echo "delete_user.php?id=".$fetch['id']; ?>> <button type="button" class="btn btn-danger">Delete</button> </a></td>
                    <td> <a href='#'><button type="button" class="btn btn-info">Forgot Password</button></a></td>
                    <td> <a href=<?php echo "edit_user.php?id=".$fetch['id']; ?>> <button type="button" class="btn btn-primary">Edit</button> </a></td>

                  </tr>
              <?php } ?>
              </tbody>
            </table>
            <?php
            $pr_query="SELECT * from user WHERE datetime!='0000-00-00 00:00:00'";
            $pr_result=mysqli_query($ses,$pr_query);
            $total_record=mysqli_num_rows($pr_result);
            $total_page=ceil($total_record/$num_per_page);
            if ($page>1) {
              echo "<a href='user.php?page=".($page-1)."'class='btn btn-primary'>Previous</a>";
            }
            for ($i=1; $i <=$total_page ; $i++) {
              echo "<a href='user.php?page=".$i."'class='btn btn-info'>$i</a>";
            }
            if ($i-1>$page) {
              echo "<a href='user.php?page=".($page+1)."'class='btn btn-primary'>Next</a>";
            }
            echo '<hr>';
            echo "Page-".$page;
             ?>
          </div>
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
