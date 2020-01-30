<?php
session_start();
	// ob_start(ob_gzhandler);
	$title = "Delete Product";
	$acc_code = "A02";
	
	require "functions/dbconn.php";
	require "functions/dbfunc.php";

if(isset($_GET['delrole'])){
	$id = $_GET['delrole'];
	$sql = "DELETE FROM product WHERE prod_id = '$id'";
	if (mysqli_query($conn, $sql)) {
		$message = "Product Deleted Successfully";
		echo "<script type='text/javascript'>alert('$message');</script>";
		header('location:add_prod.php');

	} else {
	 echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}
	}

?>