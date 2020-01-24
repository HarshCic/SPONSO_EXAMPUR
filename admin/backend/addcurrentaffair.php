<?php 
include 'header.php';
include '../functions/currentaffairfun.php';

$msg = '';
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $title=$_POST['title'];
    $pdf_link=$_POST['pdflink'];

    $type=$_POST['type'];
    $result=a_add_currentaffair($title,$pdf_link,$type);
    
    if ($result) {
      $msg='Current affair Added successfully';
    }else{
      $msg='Some thing wents wrong';
    }
}
?>

<!-- Content Wrapper. Contains page content -->

  <div class="content-wrapper">

    <!-- Content Header (Page header) -->

    <section class="content-header">

      <h1>

        Add Current Affair

        <small>Preview</small>

      </h1>

      <ol class="breadcrumb">

        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>

        <li><a href="#">Add Current Affair </a></li>

      </ol>

    </section>



    <!-- Main content -->

    <section class="content">

      <div class="row">

    

      <div class="col-md-12">

        <div class="box box-primary">

        

        <!-- /.box-header -->

        <!-- form start -->

        <form method="POST" action="" enctype="multipart/form-data">

          <div class="box-body">
          <?php if($msg!='') { ?>
          <div class="form-group">
            <div class="alert alert-success">
              <?php echo $msg; ?>
            </div>
          </div>
          <?php } ?>
          <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control" name="title" placeholder="Include the title of Current Affair" required>
          </div>
          <div class="form-group">
            <label for="title">PDF Link</label>
            <input type="text" class="form-control" name="pdflink" placeholder="Enter pdf link.. " required>
          </div>
          <div class="form-group">
            <label for="title">Type</label>
            <select name="type" class="form-control" required="">
              <option value="1">Daily</option>
              <option value="2">Monthly</option>
            </select>
          </div>
        </div>
        <!-- /.box-body -->
      <div class="box-footer">
        <button type="submit" name="upload" class="btn btn-primary">Submit</button>

          </div>

        </form>

        </div>

      </div>

      </div>

      <!-- /.row -->

    </section>

    <!-- /.content -->

  </div>

  <!-- /.content-wrapper -->

  <?php include 'footer.php' ?>
