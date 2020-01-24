<?php
	include 'header.php';
  $msg='';
  $id=$_GET['id'];
  $sqldt = "SELECT * user where id='$id'";
  $dt=mysqli_query($ses, $sql);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

  if (isset($_POST['updatepass'])) {
  	if($_POST['newpass']==$_POST['confirmpass']){
      $sql = "UPDATE user SET password = '".$_POST['confirmpass']."' WHERE id='$id'";
      $result=mysqli_query($ses, $sql);
      if ($result==true) {
        $color="success";
        $msg = "Password updated successfully";
      }else{
        $color="danger";
        $msg = "Failed to updated password";
      }
    }else{
      $color="danger";
      $msg = "New and confirm password are not same";
    }
  	
  }
}
?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
          Reset Password 
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Reset Password </li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <!-- /.box-header -->
            <!-- form start -->
            <form method="POST" action="" enctype="multipart/form-data">
              <div class="box-body">
                <?php if($msg!='') { ?>
        				 <div class="form-group">
        					<div class="alert alert-<?php echo $color; ?>"><?php echo $msg; ?></div>
        				 </div>
        				<?php } ?>

                <div class="form-group">
                    <label>New Password</label>
                    <input type="text" class="form-control newpass" name="newpass"  placeholder="enter new password.." required>
                </div>
                <div class="form-group">
                    <label>Confirm Password</label>
                    <input type="text" class="form-control confirmpass" name="confirmpass"  placeholder="enter confirm password.." required>
                </div>
                <span class="help-block">*All fields are Mandatory.</span>
              </div>
              <div class="box-footer">
                <button type="submit" name="updatepass" value="" class="btn btn-primary submitpass">Submit</button>
              </div>
            </form>
          </div>
          
        </div>
        
      </div>
    </section>
  </div>
<?php include "footer.php";?>