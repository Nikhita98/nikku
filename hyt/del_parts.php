<?php
session_start();
	// ob_start(ob_gzhandler);
	$title = "Delete Part";
	$acc_code = "G02";
	
	require "functions/dbconn.php";
	require "functions/dbfunc.php";

if(isset($_GET['del_parts'])){
	$id = $_GET['del_parts'];
	$sql = "DELETE FROM parts WHERE part_id = '$id'";
	if (mysqli_query($conn, $sql)) {
		$message = "Project Deleted Successfully";
		echo "<script type='text/javascript'>alert('$message');</script>";
		header('location:parts.php');

	} else {
	 echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}
	}

?>