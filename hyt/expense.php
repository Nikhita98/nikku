<?php
	session_start();
	// ob_start(ob_gzhandler);
	$title = "Expense Management";
	$acc_code = "A02";
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
						              	<h4 class="card-title">Add Expense </h4>
						          	</div>
						          	<div class="card-body">
						            	<form name="form4" action="" method="POST">
						              		<div class="form-group bmd-form-group">
						                      	<label class="bmd-label-floating">Expense ID</label>
						                      	<input type="text" class="form-control" id="p_id" name="eid" required="" autofocus="">
						                  	</div>
						                  	<div class="form-group bmd-form-group">
						                      	<label class="bmd-label-floating">Expense Name</label>
						                      	<input type="text" class="form-control" id="p_name" required="" name="ename">
						                  	</div>

						                  	<div class="form-group bmd-form-group">
						                      	<label class="bmd-label-floating"> Expense Category</label>
						                     	<input type="text" class="form-control" id="p_type" required="" name="ecat">
						                  	</div>

						                  	<div class="form-group bmd-form-group">
						                      	<label class="bmd-label-floating"> Expense Amount</label>
						                     	<input type="text" class="form-control" id="p_type" required="" name="eamt">
						                  	</div>
						                  	<div class="form-group bmd-form-group">
						                      	<label class="bmd-label-floating">Notes</label>
						                     	<textarea rows="4"cols="10" class="form-control" id="p_type" required="" name="enote"></textarea>
						                  	</div>

						                  	
						                  	<div class="row">
						                    	<div class="col-md-12">
						                      		<button class="btn btn-success" name="addprod" type="submit">Add</button>
						                      		<?php

if (isset($_POST['addprod'])) {
	$sql = "INSERT INTO expense (exp_id, exp_name, exp_cat, exp_amt,notes) VALUES ('".$_POST["eid"]."','".$_POST["ename"]."','".$_POST["ecat"]."','".$_POST["eamt"]."','".$_POST["enote"]."')";
	if (mysqli_query($conn, $sql)) {
		$message = "Record Added Successfully";
		echo "<script type='text/javascript'>alert('$message');</script>";

			} else {
			    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
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
								    	<h4 class="card-title">Expense Details</h4>
								  	</div>
								  	<div class="card-body">
								    	<div class="table-responsive">
								      		<table class="table">
								        		<thead>
								          			<tr>
											            <th class="text-center"> Expense ID</th>
											            <th> Expense Name</th>
											            <th> Expense Category</th>
											            <th>  Expense Amount</th>
											           											            <th> </th>
											     	<th colspan="2" align="center">             action </th>
								          			</tr> 
								        		</thead>
								        		<tbody>
								        			<?php
								        				$res = getData($conn, "expense");
								        				foreach ($res as $role) {
								        			?>
									          		<tr>
											            <td class="text-center"><?php echo $role['exp_id']; ?></td>
											            <td><?php echo $role['exp_name']; ?></td>
											            <td><?php echo $role['exp_cat']; ?></td>
											             <td><?php echo $role['exp_amt']; ?></td>
											           
											            <td class="text-center td-actions">
												            <a rel="tooltip" href="edit_expense.php?editexp=<?php echo $role['exp_id']; ?>" class="btn btn-success btn-link" title="Edit">
												              <i class="material-icons">edit</i>
												            </a>
												        </td>

											            <td>
												            <a rel="tooltip" href="del_expense.php?delexp=<?php echo $role['exp_id']; ?>" class="btn btn-danger btn-link" title="Delete">
												              <i class="material-icons">close</i>
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