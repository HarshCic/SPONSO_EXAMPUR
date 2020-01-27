<?php

include 'header.php';

include '../functions/usersfun.php';

$id=$_GET['id'];

$mymsg='';

 if ($_SERVER['REQUEST_METHOD'] == 'POST') {
   	if (isset($_POST['upload'])) {

		$image = $_FILES['image']['name'];

		$name=$_POST['name'];

		$email=$_POST['email'];

		$phone=$_POST['phone'];


		$username=$_POST['username'];

		$target = "../images_user/".basename($image);
		$userimage=$GLOBALS['serverimage']."images_user/".basename($image);
		if($_POST['password']!="" && $image!=""){
			$password=$_POST['password'];
			$sql = "UPDATE user SET photo='$userimage',name='$name',email='$email',phone='$phone',username='$username',password='$password' WHERE id='$id'";
		}else if($_POST['password']!="" && $image==""){
			$password=$_POST['password'];
			$sql = "UPDATE user SET name='$name',email='$email',phone='$phone',username='$username',password='$password' WHERE id='$id'";
		}else if($_POST['password']=="" && $image!=""){
			$sql = "UPDATE user SET photo='$userimage',name='$name',email='$email',phone='$phone',username='$username' WHERE id='$id'";
		}else{
			$sql = "UPDATE user SET name='$name',email='$email',phone='$phone',username='$username' WHERE id='$id'";
		}
	   	// execute query
	   	$result=mysqli_query($ses, $sql);
	   	if($result){
			$mymsg="User Updated Successfully";
	   	}else{
			$mymsg="Something Wents Wrong";
	   	}

	   	if($image!=""){
		   	if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
				$mymsg="User Updated Successfully";
		   	}else{
				$mymsg="Something Wents Wrong";
		   	}
	   	}
	   	
   	}
   // $query=
   // $result=mysqli_query($ses,$query) or die($query);
 	$query1=mysqli_query($ses,"SELECT * FROM user WHERE id=$id");
 	$fetch=mysqli_fetch_array($query1);
}else {
   	$query1=mysqli_query($ses,"SELECT * FROM user WHERE id=$id");
   	$fetch=mysqli_fetch_array($query1);
}

?>

 

<!-- Content Wrapper. Contains page content -->

  <div class="content-wrapper">

    <!-- Content Header (Page header) -->

    <section class="content-header">

      <h1>

        Edit User

        <small>Preview</small>

      </h1>

      <ol class="breadcrumb">

        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>

        <li><a href="#">Edit User</a></li>

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

					<?php }
					?>

					 <div class="form-group">

					   <label for="title">Name</label>

					   <input type="text" class="form-control" name="name" value=<?php echo $fetch['name'] ?> required>



					 </div>

					 <div class="form-group">

					   <label for="title">Email</label>

					   <input type="email" class="form-control" name="email" value=<?php echo $fetch['email'] ?> required>



					 </div>

					 <div class="form-group">

					   <label for="title">phone</label>

					   <input type="text" class="form-control" name="phone" value="<?php echo $fetch['phone'] ?>" maxlength="13" minlength="10"  required>



					 </div>

					 <div class="form-group">

					   <label for="title">User Name</label>

					   <input type="text" class="form-control" name="username" value=<?php echo $fetch['username'] ?> required>



					 </div>



					 <div class="form-group">

					   <label for="title">Password</label>

					   <input type="text" class="form-control" name="password" placeholder="*********" >



					 </div>

					 <div class="form-group">

					   <label for="title">Previous Photo</label>

					   <a class="form-control" href=<?php echo $fetch['photo']?>><?php echo $fetch['photo'] ?></a>





					 </div>

					 <div class="form-group">

					   <label for="link">Select New Photo </label>

					   <input type="file" name="image" class="form-control-file" aria-describedby="link"  >





					 </div>

				

				 </div>

				 <div class="box-footer">

					<button type="submit" name="upload" class="btn btn-primary">Update</button>

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