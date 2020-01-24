<?php

include 'header.php';

$id=$_GET['id'];

$mymsg='';

 if ($_SERVER['REQUEST_METHOD'] == 'POST') {



   if (isset($_POST['upload'])) {

    $image = $_FILES['image']['name'];

    // Get text

    $image_text = mysqli_real_escape_string($ses, $_POST['image_text']);



    // image file directory

    $target = "../images_concept/".basename($image);



    $sql = "UPDATE concept SET concept_name='$image_text',concept_logo='$image' WHERE id='$id'";

    // execute query

    mysqli_query($ses, $sql);



   	if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {

   		$msg = "Image uploaded successfully";

		$mymsg="Concept Edited Successfully";

      

   	}else{

		$mymsg="Something Wents Wrong";

   	}

   }



   

    $query1=mysqli_query($ses,"SELECT * FROM concept WHERE id=$id");

    $fetch=mysqli_fetch_array($query1);

 }

 else {

    $query1=mysqli_query($ses,"SELECT * FROM concept WHERE id=$id");

    $fetch=mysqli_fetch_array($query1);

 }

?>

 

<!-- Content Wrapper. Contains page content -->

  <div class="content-wrapper">

    <!-- Content Header (Page header) -->

    <section class="content-header">

      <h1>

        Edit Concept

      </h1>

      <ol class="breadcrumb">

        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>

        <li><a href="#">Edit Concept</a></li>

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

                    <?php if($mymsg!='') { ?>

					 <div class="form-group">

						<div class="alert alert-success"><?php echo $mymsg; ?></div>

					 </div>

					<?php } ?>

                       <div class="form-group">

                   <label for="title">Existing Logo</label>

                   <a class="form-control" href=<?php echo '../images_concept/'.$fetch['concept_logo']?>><?php echo $fetch['concept_logo'] ?></a>





                 </div>

                        <div class="form-group">

                        <label for="exampleInputFile">Select LOGO</label>

                        <input type="file" name="image" id="exampleInputFile" required>

                        </div>



                        <div class="form-group">

                            <label> Title</label>

                            <input type="text" class="form-control" name="image_text" value="<?php echo $fetch['concept_name'] ?>"  placeholder="enter concept title.." required>

                        </div>

                        <span class="help-block">*All fields are Mandatory.</span>

                    </div>

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