<?php
	session_start();
	// ob_start(ob_gzhandler);
	$title = "Add Part";
	$acc_code = "G02";
	require "./functions/access.php";
	require_once "./template/header.php";
	require_once "./template/sidebar.php";
	require "functions/dbconn.php";
	require "functions/dbfunc.php";
?>
<!-- MAIN CONTENT START -->
<div class="content" style="min-height: calc(100vh - 160px);">
	<div class="container-fluid">
		<div class="row">
		  	
		  	
		      				<div class="col-md-4 col-sm-12">
						        <div class="card">
						          	<div class="card-header card-header-rose card-header-icon">
						              	<div class="card-icon">
						                	<i class="material-icons">add</i>
						              	</div>
						              	<h4 class="card-title">Add Part</h4>
						          	</div>
						          	<div class="card-body">
						            	<form name="form4" action="parts.php" method="POST">
						              		<div class="form-group bmd-form-group">
						                      	<label class="bmd-label-floating">Parts ID</label>
						                      	<input type="text" class="form-control" id="part_id" name="part_id" required="" autofocus="">
						                  	</div>
						                  	<div class="form-group bmd-form-group">
						                      	<label class="bmd-label-floating">Parts Name</label>
						                      	<input type="text" class="form-control" id="part_name" required="" name="part_name">
						                  	</div>
						                  	<div class="form-group bmd-form-group">
						                      	<label class="bmd-label-floating"> Parts Type</label>
						                     	<input type="text" class="form-control" id="part_type" required="" name="part_type">
						                  	</div>
						                  	<div class="form-group bmd-form-group">
						                      	<label class="bmd-label-floating"> Prod id</label>
						                     	<input type="text" class="form-control" id="prod_id" required="" name="prod_id">
						                  	</div><div class="form-group bmd-form-group">
						                      	<label class="bmd-label-floating"> Parts amt</label>
						                     	<input type="text" class="form-control" id="part_amt" required="" name="part_amt">
						                  	</div>
						                  	
						                  	<div class="row">
						                    	<div class="col-md-12">
						                      		<button class="btn btn-success" name="add" type="submit">Add</button>
						                      		<?php
						                      		if (isset($_POST['add'])) {
														$sql = "INSERT INTO parts (part_id, part_name, part_type,prod_id,part_amt) VALUES ('".$_POST["part_id"]."','".$_POST["part_name"]."','".$_POST["part_type"]."','".$_POST["prod_id"]."','".$_POST["part_amt"]."')";
														if (mysqli_query($conn, $sql)) {
															echo "<script type='text/javascript'>showNotification('top','right','Record Added Successfully.','info');</script>";
														} else {
														     echo "<script type='text/javascript'>showNotification('top','right','Duplicate Entry.','info');</script>";
														}

													}
						                      		?>
						                      		<button class="btn btn-danger" type="reset">Clear</button>
						                    	</div>
						                  	</div>
						           		</form>
						          	</div>
						        </div>
						    </div>
						    
		      				<div class="col-md-8 col-sm-12">
		      					<div class="card">
								  	<div class="card-header card-header-rose card-header-icon">
								    	<div class="card-icon">
								      		<i class="material-icons">view_list</i>
								    	</div>
								    	<h4 class="card-title">Part Details</h4>
								  	</div>
								  	<div class="card-body">
								    	<div class="table-responsive">
								      		<table class="table">
								        		<thead>
								          			<tr>
											            <th class="text-center">Part_ID</th>
											            <th> Name</th>
											            <th> Type</th>
											            <th> prod_id </th>
											            <th> part_amt </th>
											            <th></th>
											     	<th colspan="2" align="center">          Action</th>
								          			</tr> 
								        		</thead>
								        		<tbody>

								        			<?php
								        				$res = getData($conn, "parts");
								        				foreach ($res as $parts) {
								        			?>
									          		<tr>
											            <td class="text-center"><?php echo $parts['part_id']; ?></td>
											            <td><?php echo $parts['part_name']; ?></td>
											            <td><?php echo $parts['part_type']; ?></td>
											            <td><?php echo $parts['prod_id']; ?></td>
											            <td><?php echo $parts['part_amt']; ?></td>
											            <td class="text-center td-actions">
												            <a rel="tooltip" href="edit_parts.php?edit_parts=<?php echo $parts['part_id']; ?>" class="btn btn-success btn-link" title="Edit">
												              <i class="material-icons">edit</i>
												            </a>
												        </td><td>
												            <a rel="tooltip" href="copy_parts.php?copy_parts=<?php echo $parts['part_id']; ?>" class="btn btn-danger btn-link" title="Copy">
												              <i class="material-icons">file_copy</i>
												            </a>
											            </td>
											            <td>
												            <a rel="tooltip" href="del_parts.php?del_parts=<?php echo $parts['part_id']; ?>" class="btn btn-danger btn-link" title="Delete">
												              <i class="material-icons">delete</i>
												            </a>
											            </td>
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
		      			</div>
		    		</div>
		    		
	<?php
		/*if($_GET['msg']==1){
			echo "<script type='text/javascript'>showNotification('top','right','Please select atleast one section!', 'warning');</script>";
		}
		if($_GET['msg']==2){
			echo "<script type='text/javascript'>showNotification('top','right','Role Added Successfully', 'success');</script>";
		}
		if($_GET['msg']==3){
			echo "<script type='text/javascript'>showNotification('top','right','Role Deleted Successfully', 'danger');</script>";
		}
		if($_GET['msg']==4){
			echo "<script type='text/javascript'>showNotification('top','right','Role Updated Successfully', 'info');</script>";
		}
		if($_GET['msg']==5){
			echo "<script type='text/javascript'>showNotification('top','right','User Added Successfully', 'success');</script>";
		}
		if($_GET['msg']==6){
			echo "<script type='text/javascript'>showNotification('top','right','User Updated Successfully', 'info');</script>";
		}
		if($_GET['msg']==7){
			echo "<script type='text/javascript'>showNotification('top','right','User Deleted Successfully', 'danger');</script>";
		}
		if($_GET['msg']==8){
			echo "<script type='text/javascript'>showNotification('top','right','Duplicate Username!', 'warning');</script>";
		}
		if($_GET['msg']==9){
			echo "<script type='text/javascript'>showNotification('top','right','Duplicate Role Name!', 'warning');</script>";
		}*/
	?>
</div>
<!-- MAIN CONTENT ENDS -->
<?php
	require_once "./template/footer.php";
	ob_end_flush();
?>