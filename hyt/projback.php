<?php
	require '../../functions/dbconn.php';
	require '../../functions/general.php';
	if (isset($_POST['addproj'])) {
		if(!empty($_POST['code'])) {
			$a_code = "A02;";
			$id = getsl($conn, 'id', 'roles');
			$sql = "INSERT INTO roles (id, rname, rdesc, acc_code) VALUES ('".$id."', '".$_POST['role']."', '".$_POST['r_desc']."', '".$a_code."')";
			if (mysqli_query($conn, $sql)) {
				header('location:../../user_mgnt.php?msg=2');
			} else {
				$err = mysqli_error($conn);
				if(strpos($err, 'Duplicate entry') !== false){
					header('location:../../user_mgnt.php?msg=9');
				}else{
			    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
				}
			}
		}else{
			header('location:../../user_mgnt.php?msg=1');
		}
	}
?>