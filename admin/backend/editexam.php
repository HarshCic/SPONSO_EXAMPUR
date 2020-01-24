<?php

include 'header.php';

$id = $_GET['id'];

$msg = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST')

{



    if (isset($_POST['upload']))

    {

        // $exam=$_POST['exam'];

        // Get image name

        $category = $_POST['category'];

        $image = $_FILES['image']['name'];

        // Get text

        $image_text = mysqli_real_escape_string($ses, $_POST['image_text']);



        // image file directory

        $target = "../images_exam/" . basename($image);



        $sql = "UPDATE exam SET exam_name='$image_text',exam_logo='$image',exam_category='$category' WHERE id='$id'";

        // execute query

        mysqli_query($ses, $sql);



        if (move_uploaded_file($_FILES['image']['tmp_name'], $target))

        {

            $msg = "Record Updated Successfully";

		}

        else

        {

			 $msg = "Something wents wrong";

        }

    }

    // $query=

    // $result=mysqli_query($ses,$query) or die($query);

    



    $query1 = mysqli_query($ses, "SELECT * FROM exam WHERE id=$id");

    $fetch = mysqli_fetch_array($query1);

}

else

{

    $query1 = mysqli_query($ses, "SELECT * FROM exam WHERE id=$id");

    $fetch = mysqli_fetch_array($query1);

}

?>

 

<!-- Content Wrapper. Contains page content -->

  <div class="content-wrapper">

    <!-- Content Header (Page header) -->

    <section class="content-header">

      <h1>

        Edit Exam

      </h1>

      <ol class="breadcrumb">

        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>

        <li><a href="#">Edit Exam</a></li>

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

					<div class="alert alert-success"><?php echo $msg; ?></div>

				 </div>

				<?php } ?>

			

                <div class="form-group m-5">

                   <label for="title">Existing Logo</label>

                   <a class="form-control" href=<?php echo '../images_exam/' . $fetch['exam_logo'] ?>><?php echo $fetch['exam_logo'] ?></a>





                 </div>

                 <div class="form-group">

                   <label for="link">Select New Logo </label>

                   <input type="file" name="image" class="form-control-file" aria-describedby="link"  required>





                 </div>

                 <div class="form-group">

                   <label for="title">Exam Name</label>

                   <input type="text" class="form-control" name="image_text" value=<?php echo $fetch['exam_name'] ?> required>



                 </div>

                 <div class="form-group">

                   <label for="title">Category</label>

                   <input type="text" class="form-control" name="category" value=<?php echo $fetch['exam_category'] ?> required>



                 </div>

                    <div class="box-footer">

                      <small id="emailHelp" class="form-text text-muted">*All fields are Mandatory.</small>

                      <hr>

                        <button type="submit" name="upload" class="btn btn-primary">Update</button>

                    </div>

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

