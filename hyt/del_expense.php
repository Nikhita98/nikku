<?php
session_start();
	// ob_start(ob_gzhandler);
	$title = "Expense Management";
	$acc_code = "A02";
	
	require "functions/dbconn.php";
	require "functions/dbfunc.php";

if(isset($_GET['delexp'])){
	$id = $_GET['delexp'];
	$sql = "DELETE FROM expense WHERE exp_id = '$id'";
	if (mysqli_query($conn, $sql)) {
		 echo "<script type='text/javascript'>showNotification('top','right','Expense Deleted Successfully.', 'info');</script>";
		header('location:expense.php');

	} else {
	 echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}
	}

?>