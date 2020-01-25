<?php include 'header.php';

$msg = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST')

{

    if (isset($_POST['upload']))

    {

        // Get image name

        $category = $_POST['category'];

        $image = $_FILES['image']['name'];

        // Get text

        $image_text = mysqli_real_escape_string($ses, $_POST['image_text']);



        // image file directory

        $target = "../images_exam/" . basename($image);


        $examplogo=$GLOBALS['serverimage']."images_exam/".basename($image);
        $sql = "INSERT INTO exam (exam_logo, exam_name,exam_category) VALUES ('$examplogo', '$image_text','$category')";

        // execute query

        mysqli_query($ses, $sql);



        if (move_uploaded_file($_FILES['image']['tmp_name'], $target))

        {

            $msg = "Record Added successfully";

        }

        else

        {

            $msg = "Failed to upload image";

        }

    }

   

}

?>

<!-- Content Wrapper. Contains page content -->

  <div class="content-wrapper">

    <!-- Content Header (Page header) -->

    <section class="content-header">

      <h1>

        Add Exam

        <small>Preview</small>

      </h1>

      <ol class="breadcrumb">

        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>

        <li><a href="#">Add Exam</a></li>

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

          <?php if ($msg != '')

{ ?>

           <div class="form-group">

            <div class="alert alert-success"><?php echo $msg; ?></div>

           </div>

          <?php

} ?>

          <div class="form-group">

            <label for="link">Select Logo </label>

            <input type="file" name="image" class="form-control" aria-describedby="link"  required>





          </div>

           <div class="form-group">

                    <label for="title">Exam Name</label>

                    <input type="text" class="form-control" name="image_text" placeholder="IBPS, UPSC, SSC ...." required>



                  </div>

                  <div class="form-group">

                    <label for="title">Category</label>

                    <input type="text" class="form-control" name="category" placeholder="Enter here.." required>



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

