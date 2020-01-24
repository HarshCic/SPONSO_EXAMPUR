<?php include 'header.php';

include '../functions/purchasefun.php';
include '../functions/purchasefun_helper.php';

$list_purchase=list_purchase();

?>

<!-- Content Wrapper. Contains page content -->

  <div class="content-wrapper">

    <!-- Content Header (Page header) -->

    <section class="content-header">

      <h1>

        All Purchases..

        <small>Preview</small>

      </h1>

      <ol class="breadcrumb">

        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>

        <li><a href="#">All Purchases</a></li>

      </ol>

    </section>



    <!-- Main content -->

    <section class="content">

      <div class="row">

		<div class="box">

            <!-- /.box-header -->

            <div class="box-body">

			

				<div class="col-md-12 table-responsive">

					<table class="table table-bordered datatable example table-striped">

						<thead>

							<tr>

								<th>User ID</th>

								<th>Name</th>

								<th>Email</th>

								<th>Phone</th>

								<th>Transaction ID</th>

								<th>Item Type</th>
								<th>Item Purchased</th>
								<th>Price</th>
								<th>Date & Time</th>

								<th>Delete</th>

							</tr>

						</thead>

						<tbody>

							<?php

							while($fetch =  mysqli_fetch_array($list_purchase,MYSQLI_ASSOC))

							{
								

								?>

								<tr>

									 <td><?php echo $fetch['user_id']; ?></td>
									<td><?php echo $fetch['name'] ?></td>
									<td><?php echo $fetch['email'] ?></td>
									<td><?php echo $fetch['phone'] ?></td>
									<td><?php echo $fetch['transaction_id'] ?></td>
									<td><?php $type=$fetch['item_type'];

									if ($type==1) {
									  	echo "Course";
									  	$item=get_courceitemdt($fetch['item_id'],$fetch['item_type']);
									}
									elseif ($type==2) {
									  echo "Study Material";
									  $item=get_studyitemdt($fetch['item_id'],$fetch['item_type']);

									}

									else {

									  echo "Test Series";
									  $item=get_testseriesitemdt($fetch['item_id'],$fetch['item_type']);

									}

									?></td>
									<?php
									if($type==1){ ?>
										<td><?php echo $item['course_name']; ?></td>
										<td><?php echo $item['price']; ?></td>
									<?php }else if($type==2){ ?>	
										<td><?php echo $item['title']; ?></td>
										<td><?php echo $item['price']; ?></td>
									<?php }else if($type==3){ ?>
										<td><?php echo $item['title']; ?></td>
										<td><?php echo $item['price']; ?></td>
									<?php }else{ ?>
										<td> </td>
										<td> </td>
									<?php } ?>	
									<td><?php echo $fetch['datetime'] ?></td>

									<td> <a href=<?php echo "delete_purchase.php?id=".$fetch['id']; ?>> <button type="button" class="btn btn-danger">Delete</button> </a></td>

								</tr>

								<?php

							}

							?>

							

						</tbody>

					</table>

				</div>

			</div>

		</div>

      </div>

      <!-- /.row -->

    </section>

    <!-- /.content -->

  </div>

  <!-- /.content-wrapper -->

  <?php include 'footer.php' ?>