
<?php
	session_start();	
	// ob_start(ob_gzhandler);
	$title = "Copy part";
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
	  	<div class="col-md-12">
	    	<div class="col-md-6 ml-auto mr-auto">
	    		<div class="card">
					<div class="card-header card-header-rose card-header-icon">
              			<div class="card-icon">
                			<i class="material-icons">edit</i>
              			</div>
              			<h4 class="card-title">Copy Part</h4>
          			</div>
				<div class="card-body">
				<?php
				    if(isset($_GET['copy_parts'])) 
				    {
				    	$idd= $_GET['copy_parts'];
				    	$sql = "SELECT part_id, part_name, part_type, prod_id, part_amt FROM parts where part_id='$idd' ";
   						$res = mysqli_query($conn, $sql);
						$row = mysqli_fetch_array($res);
				?>
						            
				<form name="form4" action="" method="POST">
		    		<div class="form-group bmd-form-group">
						<label class="bmd-label-floating">Part ID</label>
						    <input type="text" class="form-control" id="part_id" name="part_id" required=""  value="" autofocus="">
					</div>
					<div class="form-group bmd-form-group">
						<label class="bmd-label-floating">Part Name</label>
						<input type="text" class="form-control" id="part_name" required="" value="<?php echo $row['part_name']; ?>"  name="part_name">
					</div>
					<div class="form-group bmd-form-group">
						<label class="bmd-label-floating"> Part Type</label>
						<input type="text" class="form-control" id="part_type" required="" 
						                     	value="<?php echo $row['part_type']; ?>"  name="part_type">
					</div>              
					<div class="form-group bmd-form-group">
						<label >Prod Id</label>
						<input type="text" class="form-control" id="prod_id" required="" value="<?php echo $row['prod_id']; ?>"  name="prod_id">
					</div>
					<div class="form-group bmd-form-group">
						<label >Part Amt</label>
						<input type="type" class="form-control" id="part_amt" required="" value="<?php echo $row['part_amt']; ?>"  name="part_amt">
					</div>              	
	            	<div class="row">
	              		<div class="col-md-12">
						    <button class="btn btn-success" name="copy_part" type="submit">Save</button>
						    <?php
								if (isset($_POST['copy_part'])) 
								{
									$sql = "INSERT INTO parts (part_id, part_name, part_type, prod_id, part_amt) VALUES ('".$_POST['part_id']."', '".$_POST['part_name']."', '".$_POST['part_type']."','".$_POST['prod_id']."','".$_POST['part_amt']."')";
									if (mysqli_query($conn, $sql)) 
									{
										echo "<script type='text/javascript'>showNotification('top','right','Duplicate Entry.','info');</script>";
										//header('location:addproject.php');
									} 
									else 
									{
				    					echo "<script type='text/javascript'>showNotification('top','right','Duplicate Entry.','info');</script>";
									}

								}
							?>
						    <button class="btn btn-danger" type="button" onclick = "window.location.href = 'parts.php';">Back</button>
							<!--  <a class="nav-link" href="parts.php">Back</a>-->
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
