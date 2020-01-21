<?php
include'../config.php';
// $query=mysqli_query($ses,'SELECT * FROM help WHERE flag=0');
if (isset($_GET['page'])) {
  // code...
  $page=$_GET['page'];
}
else {
  $page=1;
}
$num_per_page=02;
$start_from=($page-1)*02;
$query=mysqli_query($ses,"SELECT * FROM help WHERE flag=0 ORDER BY id DESC LIMIT $start_from,$num_per_page");

 ?>
 <?php
    include('../session.php');
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

  </head>
  <body>
    <?php include 'main.php'; ?>
          <!-- Page Content -->
          <div id="page-content-wrapper">
              <div class="container-fluid">
                  <div class="row">
                      <div class="col-lg-12 jumbotron">
                        <br>
                        <h1>Help Requests</h1>
                      </div>
                  </div>

              </div>
          </div>
          <!-- /#page-content-wrapper -->
      </div>
  </div>
  <!-- /#wrapper -->

    <div class="container table-responsive">
      <table class="table table-striped table-bordered">
        <thead>
          <tr>
            <th>User Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Reason</th>
            <th>Issue</th>
            <th>Date & Time</th>
          </tr>
        </thead>
        <tbody>
          <?php while ($fetch=mysqli_fetch_array($query)) { ?>

            <tr>
              <td><?php echo $fetch['username'] ?></td>
              <td><?php echo $fetch['email'] ?></td>
              <td><?php echo $fetch['phone'] ?></td>
              <td><?php echo $fetch['reason_select'] ?></td>
              <td><?php echo $fetch['issue'] ?></td>
              <td><?php echo $fetch['datetime'] ?></td>
            </tr>
        <?php } ?>

        </tbody>
      </table>
      <?php
      $pr_query="SELECT * from help WHERE flag=0";
      $pr_result=mysqli_query($ses,$pr_query);
      $total_record=mysqli_num_rows($pr_result);
      $total_page=ceil($total_record/$num_per_page);
      if ($page>1) {
        echo "<a href='help.php?page=".($page-1)."'class='btn btn-primary'>Previous</a>";
      }
      for ($i=1; $i <=$total_page ; $i++) {
        echo "<a href='help.php?page=".$i."'class='btn btn-info'>$i</a>";
      }
      if ($i-1>$page) {
        echo "<a href='help.php?page=".($page+1)."'class='btn btn-primary'>Next</a>";
      }
      echo '<hr>';
      echo "Page-".$page;
       ?>
    </div>
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
</html>
