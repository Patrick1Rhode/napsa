<?php
include 'header.php';

if($_POST['add_barrack']){
	$barrack = $_POST['barrack'];
	$service_number = $_SESSION['service_number'];

	$query = "INSERT INTO `barrack` VALUES (0, '$barrack', '$service_number')";
	$data_entry = mysqli_query($connect, $query) or die("Query Error");

	if($data_entry == true){
		header('Location: home.php');
	} else {
		echo "Field to add barrack";
	}

}

?>