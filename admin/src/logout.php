<?php
session_destroy();

$service_number = $_SESSION['service_number'];

if(empty($service_number) && !isset($service_number)){
	header('Location: ../index.php');
	session_start();
	$_SESSION['logout'] = "out";
}


?>