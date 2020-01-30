<?php
	session_start();	
	// ob_start(ob_gzhandler);
	$title = "Edit project";
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
	  	<div class="col-md-12">
	    	<div class="col-md-6 ml-auto mr-auto">
	    		<div class="card">
					  <div class="card-header card-header-rose card-header-icon">
              <div class="card-icon">
                <i class="material-icons">edit</i>
              </div>
              <h4 class="card-title">Edit Project</h4>
          	</div>
					  <div class="card-body">
				    	<?php
				    		if(isset($_GET['editproj'])) {
				    			$idd= $_GET['editproj'];
				    		$sql = "SELECT proj_id, proj_name, proj_type, proj_start_date, proj_end_date FROM project where proj_id='$idd' ";
   								$res = mysqli_query($conn, $sql);
								$row = mysqli_fetch_array($res);
							?>
						            
							<form name="form4" action="" method="POST">
		        		<div class="form-group bmd-form-group">
						                      	<label class="bmd-label-floating">Project ID</label>
						                      	<input type="text" class="form-control" id="p_id" name="pid" required=""  value="<?php echo $row['proj_id']; ?>" autofocus="">
						                  	</div>
						                  	<div class="form-group bmd-form-group">
						                      	<label class="bmd-label-floating">Project Name</label>
						                      	<input type="text" class="form-control" id="p_name" required="" value="<?php echo $row['proj_name']; ?>"  name="pname">
						                  	</div>
						                  	<div class="form-group bmd-form-group">
						                      	<label class="bmd-label-floating"> Project Type</label>
						                     	<input type="text" class="form-control" id="p_type" required="" 
						                     	value="<?php echo $row['proj_type']; ?>"  name="ptype">
						                  	</div>
						                  
						                  	<div class="form-group bmd-form-group">
						                     	<label >Start Date</label>
						                     	<input type="date" class="form-control" id="p_sd" required="" value="<?php echo $row['proj_start_date']; ?>"  name="sdate">
						                  	</div>
						                  	<div class="form-group bmd-form-group">
						                      	<label >End Date</label>
						                     	<input type="date" class="form-control" id="p_ed" required="" value="<?php echo $row['proj_end_date']; ?>"  name="edate">
						                  	</div>
						                  	
	            	<div class="row">
	              	<div class="col-md-12">
						          <button class="btn btn-success" name="addproject" type="submit">Update</button>
						                 


						          <?php

if (isset($_POST['addproject'])) {
	$sql = "UPDATE  project SET proj_id = '".$_POST['pid']."', proj_name = '".$_POST['pname']."', proj_type = '".$_POST['ptype']."', proj_start_date = '".$_POST['sdate']."',proj_end_date = '".$_POST['edate']."'  WHERE proj_id = '".$_POST['pid']."'";
	if (mysqli_query($conn, $sql)) 
	{
		 echo "<script type='text/javascript'>showNotification('top','right','Record Updated Successfully.', 'info');</script>";
			} 
			else 
			{
			    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
			}

	}
		?>
<button class="btn btn-danger" type="button" onclick = "window.location.href = 'addpro.php';">Back</button>
						                    	</div>
	            	</div>
	     				</form>
			     		<?php
			     			}
			     		?>
			     	</div>
		    	</div>
	  		</div>  
	  	</div>  
	  </div>          
	</div>
</div>
<!-- MAIN CONTENT ENDS -->
<?php
	require_once "./template/footer.php";
	ob_end_flush();
?>