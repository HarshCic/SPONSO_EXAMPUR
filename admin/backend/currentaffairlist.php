<?php include 'header.php';

include '../functions/currentaffairfun.php';
$status=$_GET['status'];
$query=list_currentaffair($status);



  ?>
<div class="content-wrapper">
  <section class="content-header">
    <h1>

    Current Affair

      </h1>
    <ol class="breadcrumb">
      <li>
        <a href="#">
          <i class="fa fa-dashboard"></i> Home
        </a>
      </li>
      <li>
        <a href="#">Current Affair</a>
      </li>
    </ol>
  </section>
  <section class="content">
    <div class="row">
      <div class="box">
        <div class="box-body">
          <div class="col-md-12 table-responsive">
            <table class="table table-bordered datatable example table-striped">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Title</th>
                  <th>PDF Link</th>
                  <th>Type</th>
                  <th>Delete</th>
                  <th>Edit</th>
                </tr>
              </thead>
              <tbody>
                <?php
                  $i++; 
                  while ($fetch=mysqli_fetch_array($query,MYSQLI_ASSOC)) { 
                ?>
                <tr>
                  <th>
                    <?php echo $i++; ?>
                  </th>
                  <td>
                    <?php echo $fetch['title'] ?>
                  </td>
                  <td>
                    <a href=
                      <?php echo $fetch['pdf_link']?>>
                      <?php echo $fetch['pdf_link'] ?>
                    </a>
                  </td>
                  <td>
                    <?php
                      if($fetch ['type']==1) {
                        echo "Daily";
                      }else if($fetch ['type']==2) {
                        echo "Monthly";
                      }else{
                        echo " ";
                      } 
                    ?>
                  </td>
                  <td>
                    <a href=
                      <?php echo "deletecurrentaffair.php?id=".$fetch['id']; ?>>
                      <button type="button" class="btn btn-danger">Delete</button>
                    </a>
                  </td>
                  <td>
                    <a href=
                      <?php echo "editcurrentaffair.php?id=".$fetch['id']; ?>>
                      <button type="button" class="btn btn-info">Edit</button>
                    </a>
                  </td>
                </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
<?php include 'footer.php' ?>