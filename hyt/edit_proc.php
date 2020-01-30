
<?php
	session_start();	
	// ob_start(ob_gzhandler);
	$title = "Edit Process";
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
              <h4 class="card-title">Edit Process</h4>
          	</div>
					  <div class="card-body">
				    	<?php
				    		if(isset($_GET['editproj'])) {
				    			$idd= $_GET['editproj'];
				    		$sql = "SELECT proc_id, proc_name, proc_desc, prod_id FROM process where proc_id='$idd' ";
   								$res = mysqli_query($conn, $sql);
								$row = mysqli_fetch_array($res);
							?>
						            
							<form name="form4" action="" method="POST">
		        		<div class="form-group bmd-form-group">
						                      	<label class="bmd-label-floating">Process ID</label>
						                      	<input type="text" class="form-control" id="p_id" name="pid" required=""  value="<?php echo $row['proc_id']; ?>" autofocus="">
						                  	</div>
						                  	<div class="form-group bmd-form-group">
						                      	<label class="bmd-label-floating">Process Name</label>
						                      	<input type="text" class="form-control" id="p_name" required="" value="<?php echo $row['proc_name']; ?>"  name="pname">
						                  	</div>
						                  	<div class="form-group bmd-form-group">
						                      	<label class="bmd-label-floating"> Process Description</label>
						                     	<input type="text" class="form-control" id="p_type" required="" 
						                     	value="<?php echo $row['proc_desc']; ?>"  name="pdesc">
						                  	</div>
						                  
						                  	<div class="form-group bmd-form-group">
						                     	<label >Prod_ID</label>
						                     	<input type="text" class="form-control" id="p_sd" required="" value="<?php echo $row['prod_id']; ?>"  name="prodid">
						                  	</div>
						               
						                  	
	            	<div class="row">
	              	<div class="col-md-12">
						          <button class="btn btn-success" name="updateprocess" type="submit"  >Update</button>

						          <?php

    if (isset($_POST['updateprocess'])) {
	$sql = "UPDATE  process SET proc_id = '".$_POST['pid']."', proc_name = '".$_POST['pname']."', proc_desc = '".$_POST['pdesc']."', prod_id = '".$_POST['prodid']."'  WHERE proc_id = '".$_POST['pid']."'";
	if (mysqli_query($conn, $sql)) 
	{
		 echo "<script type='text/javascript'>showNotification('top','right','Record Updated Successfully.', 'info');</script>";
		
			} 
			else 
			{
			    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
			}

	}
	//header('location: process.php');
		?>
		
		<button class="btn btn-danger" type="button" onclick="window.location.href='process.php';">Back</button>


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
