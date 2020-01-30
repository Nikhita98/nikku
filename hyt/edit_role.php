<?php
	session_start();
	// ob_start(ob_gzhandler);
	$title = "Edit Role";
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
	    <div class="col-md-12 ml-auto mr-auto">
	    	<?php
	    	if(isset($_GET['editrole'])) {
	    		$res = getDataById($conn, "roles", $_GET['editrole']);
				$row = mysqli_fetch_array($res);
				$section = explode(';',$row[3]);
			?>
	    	<div class="col-md-8 col-sm-12">
						        <div class="card">
						          	<div class="card-header card-header-rose card-header-icon">
						              	<div class="card-icon">
						                	<i class="material-icons">drag_indicator</i>
						              	</div>
						              	<h4 class="card-title">Add Role</h4>
						          	</div>
						          	<div class="card-body">
						            	<form name="form5" action="process/admin/usr_process.php" method="POST">
						              		<div class="form-group bmd-form-group">
						                      	<label class="bmd-label-floating">Role</label>
						                      	<input type="text" class="form-control" name="role" required="" autofocus="">
						                  	</div>
						                  	<div class="form-group bmd-form-group">
						                      	<label class="bmd-label-floating">Descripton</label>
						                      	<!-- <input type="text" class="form-control" name="fname"> -->
						                      	<textarea class="form-control" rows="3" required="" name="r_desc"></textarea>
						                  	</div>
						                  	<div class="row">
						                  		<div class="col-md-6 col-sm-12">
						                  			<h3>Project</h3>
								                  	<div class="form-group bmd-form-group">
								                     	<div class="form-check">
																			  <label class="form-check-label">
																			    <input class="form-check-input" type="checkbox" name="code[]" value="D01"> Project Management
																			    <span class="form-check-sign">
																			      <span class="check"></span>
																			    </span>
																			  </label>
																			</div>		
								                     	<div class="form-check">
																			  <label class="form-check-label">
																			    <input class="form-check-input" type="checkbox" name="code[]" value="D05">Process Management
																			    <span class="form-check-sign">
																			      <span class="check"></span>
																			    </span>
																			  </label>
																			</div>
								                  	</div>
								                  </div>
								                  
								                </div>
						                  	<div class="row">
						                  		<div class="col-md-6 col-sm-12">
						                  			<h3>Product</h3>
								                  	<div class="form-group bmd-form-group">
								                     	<div class="form-check">
																			  <label class="form-check-label">
																			    <input class="form-check-input" type="checkbox" name="code[]" value="G01">Product Management
																			    <span class="form-check-sign">
																			      <span class="check"></span>
																			    </span>
																			  </label>
																			</div>					
								                     	<div class="form-check">
																			  <label class="form-check-label">
																			    <input class="form-check-input" type="checkbox" name="code[]" value="G02">Parts Management
																			    <span class="form-check-sign">
																			      <span class="check"></span>
																			    </span>
																			  </label>
																			</div>
								                  	</div>
								                  </div>
								            <div class="col-md-6 col-sm-12">
						                  			<h3>Adminstration</h3>
								                  	<div class="form-group bmd-form-group">
								                  		<div class="form-check">
																			  <label class="form-check-label">
																			    <input class="form-check-input" type="checkbox" name="code[]" value="A01">Admin Dashboard
																			    <span class="form-check-sign">
																			      <span class="check"></span>
																			    </span>
																			  </label>
																			</div>
																			<div class="form-check">
																			  <label class="form-check-label">
																			    <input class="form-check-input" type="checkbox" name="code[]" value="A02">User Management
																			    <span class="form-check-sign">
																			      <span class="check"></span>
																			    </span>
																			  </label>
																			</div>
								                  </div>
								                </div>
								            </div>
								                <div class="row">
						                  		<div class="col-md-6 col-sm-12">
						                  		  <h3>Inventory</h3>
								                  	<div class="form-group bmd-form-group">
								                     	<div class="form-check">
																			  <label class="form-check-label">
																			    <input class="form-check-input" type="checkbox" name="code[]" value="G01">Dashboard
																			    <span class="form-check-sign">
																			      <span class="check"></span>
																			    </span>
																			  </label>
																			</div>
																			<div class="form-check">
																			  <label class="form-check-label">
																			    <input class="form-check-input" type="checkbox" name="code[]" value="G02">Store Management 
																			    <span class="form-check-sign">
																			      <span class="check"></span>
																			    </span>
																			  </label>
																			</div>
								                  	</div>
								                </div>
								            </div>
						                  	<div class="row">
						                    	<div class="col-md-12">
						                      		<button class="btn btn-success" name="addRole" type="submit">Add</button>
						                      		<button class="btn btn-danger" type="reset">Clear</button>
						                    	</div>
						                  	</div>
						           		</form>
						          	</div>
						        </div>
						    </div>
	        <?php
	        }else{
	        	// header('location:index.php');
	        }
	        ?>
	    </div>
	  </div>              
	</div>
	<?php
		/*if($_GET['msg']==1){
			echo "<script type='text/javascript'>showNotification('top','right','Please select atleast one section', 'warning');</script>";
		}*/
	?>
</div>
<!-- MAIN CONTENT ENDS -->
<?php
	require_once "./template/footer.php";
	ob_end_flush();
?>