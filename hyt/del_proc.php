<?php
session_start();
	// ob_start(ob_gzhandler);
	$title = "User Management";
	$acc_code = "A02";
	
	require "functions/dbconn.php";
	require "functions/dbfunc.php";

if(isset($_GET['delrole'])){
	$id = $_GET['delrole'];
	$sql = "DELETE FROM process WHERE proc_id = '$id'";
	if (mysqli_query($conn, $sql)) {
		$message = "Process Deleted Successfully";
		echo "<script type='text/javascript'>alert('$message');</script>";
		header('location:process.php');

	} else {
	 echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}
	}

?>