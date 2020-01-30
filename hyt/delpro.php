<?php
	session_start();
	// ob_start(ob_gzhandler);
	$title = "Dashboard";
	$acc_code = "INDEX";
	require "./functions/access.php";
	require_once "./template/header.php";
	require_once "./template/sidebar.php";
?>