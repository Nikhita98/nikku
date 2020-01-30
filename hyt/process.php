<?php
	session_start();
	// ob_start(ob_gzhandler);
	$title = "User Management";
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
		  	
		  	                
 
                             


		      				<div class="col-md-6 col-sm-12">
						        <div class="card">
						          	<div class="card-header card-header-rose card-header-icon">
						              	<div class="card-icon">
						                	<i class="material-icons">add</i>
						              	</div>
						              	<h4 class="card-title">Add Process</h4>
						          	</div>
						          	<div class="card-body">
						            	<form name="form4" action="" method="POST">
						              		<div class="form-group bmd-form-group">
						                      	<label class="bmd-label-floating">Process ID</label>
						                      	<input type="text" class="form-control" id="p_id" name="pid" required="" autofocus="">
						                  	</div>
						                  	<div class="form-group bmd-form-group">
						                      	<label class="bmd-label-floating">Process Name</label>
						                      	<input type="text" class="form-control" id="p_name" required="" name="pname">
						                  	</div>
						                  	<div class="form-group bmd-form-group">
						                      	<label class="bmd-label-floating"> Process description</label>
						                     	<input type="text" class="form-control" id="p_type" required="" name="pdesc">
						                  	</div>
						                  	<div class="form-group bmd-form-group">
						                      	<label class="bmd-label-floating">Product ID</label>
						                      	<input type="text" class="form-control" id="p_id" name="prodid" required="" autofocus="">
						                  	</div>
						                  	
						                  	<div class="row">
						                    	<div class="col-md-12">
						                      		<button class="btn btn-success" name="addproc" type="submit">Add</button>
						                      		<?php
						                      		if (isset($_POST['addproc'])) {
	$sql = "INSERT INTO process (proc_id, proc_name, proc_desc, prod_id) VALUES ('".$_POST["pid"]."','".$_POST["pname"]."','".$_POST["pdesc"]."','".$_POST["prodid"]."')";
	if (mysqli_query($conn, $sql)) {
		 echo "<script type='text/javascript'>showNotification('top','right','Record Added Successfully.', 'info');</script>";
			} else {
			    echo "<script type='text/javascript'>showNotification('top','right','Duplicate Entry.','info');</script>";
		}

	}
						                      		?>
						                      		<button class="btn btn-danger" type="reset">Clear</button>
						                      		
						                    	</div>
						                  	</div>
						       
						          	</div>
						        </div>
						    </div>
						    <div class="col-md-6 col-sm-12">
		      					<div class="card">
								  	<div class="card-header card-header-rose card-header-icon">
								    	<div class="card-icon">
								      		<i class="material-icons">view_list</i>
								    	</div>
								    	<h4 class="card-title">Process list</h4>
								  	</div>
								  	<div class="card-body">
								    	<div class="table-responsive">
								      		<table class="table">
								        		<thead>
								          			<tr>
											            <th class="text-center">Process_ID</th>
											            <th>Process Name</th>
											            <th>Process desc</th>
											            <th>Product Id</th>
											            <th></th>
											            <th colspan="2" align="center">                Action </th>
											     
								          			</tr>
								        		</thead>
								        		<tbody>
								        			<?php
								        				$res = getData($conn, "process");
								        				foreach ($res as $process) {
								        			?>
									          		<tr>
											            <td class="text-center"><?php echo $process['proc_id']; ?></td>
											            <td><?php echo $process['proc_name']; ?></td>
											            <td><?php echo $process['proc_desc']; ?></td>
											             <td><?php echo $process['prod_id']; ?></td>
											            
											             <td class="text-center td-actions">
												            <a rel="tooltip" href="edit_proc.php?editproj=<?php echo $process['proc_id']; ?>" class="btn btn-success btn-link" title="Edit">
												              <i class="material-icons">edit</i>
												            </a>
												        </td><td>
												            <a rel="tooltip" href="copy_proc.php?editrole=<?php echo $process['proc_id']; ?>" class="btn btn-danger btn-link" title="copy">
												              <i class="material-icons">file_copy</i>
												            </a>
											            </td>
											            <td>
												            <a rel="tooltip" href="del_proc.php?delrole=<?php echo $process['proc_id']; ?>" class="btn btn-danger btn-link" title="Delete">
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
						    
		      				<div class="col-md-5 col-sm-12">
		      								
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