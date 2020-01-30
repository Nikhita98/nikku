
<?php
	session_start();	
	// ob_start(ob_gzhandler);
	$title = "Edit Expense";
	$acc_code = "A01";
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
              <h4 class="card-title">Edit Expense</h4>
          	</div>
					  <div class="card-body">
				    	<?php
				    		if(isset($_GET['editexp'])) {
				    			$idd= $_GET['editexp'];
				    		$sql = "SELECT exp_id, exp_name, exp_cat, exp_amt, notes FROM expense where exp_id='$idd' ";
   								$res = mysqli_query($conn, $sql);
								$row = mysqli_fetch_array($res);
							?>
						            
							<form name="form4" action="" method="POST">
		        		<div class="form-group bmd-form-group">
						                      	<label class="bmd-label-floating">expense ID</label>
						                      	<input type="text" class="form-control" id="exp_id" name="eid" required=""  value="<?php echo $row['exp_id']; ?>" autofocus="">
						                  	</div>
						                  	<div class="form-group bmd-form-group">
						                      	<label class="bmd-label-floating">expense  Name</label>
						                      	<input type="text" class="form-control" id="exp_name" required="" value="<?php echo $row['exp_name']; ?>"  name="ename">
						                  	</div>
						                  	<div class="form-group bmd-form-group">
						                      	<label class="bmd-label-floating"> expense category</label>
						                     	<input type="text" class="form-control" id="exp_cat" required="" 
						                     	value="<?php echo $row['exp_cat']; ?>"  name="ecat">
						                  	</div>
						                  
						                  	<div class="form-group bmd-form-group">
						                     	<label >expense  amount</label>
						                     	<input type="text" class="form-control" id="exp_amt" required="" value="<?php echo $row['exp_amt']; ?>"  name="eamt">
						                  	</div>
						                  	<div class="form-group bmd-form-group">
						                      	<label >Notes</label>
						                     	<input type="type" class="form-control" id="notes" required="" value="<?php echo $row['notes']; ?>"  name="enote">
						                  	</div>
						                  	
	            	<div class="row">
	              	<div class="col-md-12">
						          <button class="btn btn-success" name="addexpense" type="submit">Update</button>

						          <?php

if (isset($_POST['addexpense'])) {
	$sql = "UPDATE  expense SET exp_id = '".$_POST['eid']."', exp_name = '".$_POST['ename']."', exp_cat = '".$_POST['ecat']."', exp_amt = '".$_POST['eamt']."',notes = '".$_POST['enote']."'  WHERE exp_id = '".$_POST['eid']."'";
	if (mysqli_query($conn, $sql)) 
	{
		$message = "Record Added Successfully";
		echo "<script type='text/javascript'>alert('$message');</script>";
		//header('location:addproject.php');
			} 
			else 
			{
			    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
			}

	}
		?>

		<button class="btn btn-danger" type="button" onclick="window.location.href='expense.php';">Back</button>
				
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
