<?php
include 'header.php';

$color=$msg='';

$sql = "SELECT * FROM `study_material`  ";
$subject=mysqli_query($ses, $sql);
$max=array();
while($row=mysqli_fetch_array($subject, MYSQLI_ASSOC)) 
{
  $arryarraytitlesub = array();
  $arraytitle = $row['title'];
  array_push($max,$arraytitle);
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

	$pdf_link=$_POST['link'];

	$title=$_POST['title'];

	$status=$_POST['status'];

	$type=$_POST['type'];

	$price=$_POST['price'];

	$query="INSERT INTO `study_material`(`title`, `pdf_link`, `type`, `free_status`, `price`) values  ('".$title."','".$pdf_link."','".$type."','".$status."','".$price."')";

	$result=mysqli_query($ses,$query);
	if ($result) {
		$color="success";
		$msg='Study Material Added successfully';
	} else {
		$color="danger";
		$msg='Something wents wrong';
	}
	
	

}

?>

<!-- Content Wrapper. Contains page content -->

  <div class="content-wrapper">

    <!-- Content Header (Page header) -->

    <section class="content-header">

      <h1>

        Add Study Material

        <small>Preview</small>

      </h1>

      <ol class="breadcrumb">

        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>

        <li><a href="#">Study Material</a></li>
        <li><a href="#">Add Study Material</a></li>

      </ol>

    </section>



    <!-- Main content -->

    <section class="content">

      <div class="row">

	  

			<div class="col-md-12">

				<div class="box box-primary">

				

				<!-- /.box-header -->

				<!-- form start -->

				<form role="form" method="post">

				  <div class="box-body">

					<?php if($msg!='') { ?>

					 <div class="form-group">

						<div class="alert alert-<?php echo $color; ?>"><?php echo $msg; ?></div>

					 </div>

					<?php } ?>

					<div class="form-group">

					  <label for="title">Title <span class="star">*</span></label>

					  <input type="text" id="title" class="form-control" name="title" placeholder="Include the title of Study material" required>

					</div>

					<div class="form-group">

						<label for="link">Link <span class="star">*</span></label>

						<input type="url" class="form-control" name="link" aria-describedby="link" placeholder="book.com" required>

					</div>

					<div class="form-group">

					  <label for="type">Type <span class="star">*</span></label>

					  <select class="form-control" name="type" required>

						<option value="1">Ebooks</option>

						<option value="2">Class Notes</option>

						<option value="3">Previous Year Questions</option>

					  </select>

					</div>

					<div class="form-group">

					  <label for="status">Free Status <span class="star">*</span></label>

					  <select class="form-control" name="status" required>

						<option value="0">Paid</option>

						<option value="1">Free</option>



					  </select>

					</div>

					<div class="form-group">

					  <label for="price">Price <span class="star">*</span></label>

					  <input type="text" class="form-control decimal" name="price"  placeholder="Enter price in INR" required maxlength="10">

					</div>

				  </div>

				  <!-- /.box-body -->



				  <div class="box-footer">

					 <button type="submit" class="btn btn-primary">Submit</button>

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
  <script>
  	allsub=<?php echo json_encode($max);?>;
  	$(document).ready(function() {
  		$('.decimal').keypress(function(event) {
  			$(this).val($.trim($(this).val()).replace(/\s+/g, ""));
		    if(event.which < 46 || event.which > 59) {
		        event.preventDefault();
		    } // prevent if not number/dot

		    if(event.which == 46 && $(this).val().indexOf('.') != -1) {
		        event.preventDefault();
		    } // prevent if already dot
		});
		$( "#title" ).autocomplete({
	        source: allsub
	    }); 
  	});
  </script>
