<?php
include "../db/db.php";
include "header.php";
require 'class-Clockwork.php';
if((!$_SESSION['permissions_level'] == 2 && !$_SESSION['permission_type'] == 'IT Support')){
	  echo "<script>window.location = 'index.php';</script>'";
}
  $file_id = $_GET['file_id'];
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT*FROM init_file INNER JOIN officer USING(ServiceNumber)   ORDER BY init_file_id DESC ";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    $row = $result->fetch_assoc();
	$json_file_name = $row["file_name"];
	$ServiceNumber = $row["ServiceNumber"];
	//$phone_number = $row['phone_number'];
	$phone_number = "260972148199";
	
	
}


function sendsms($phone,$m){
	

try
{
		$API_KEY = "ac212a54b4a65ff1426f2054238a88b8cd3dc2f9";
    // Create a Clockwork object using your API key
    $clockwork = new Clockwork( $API_KEY );

    // Setup and send a message
    $message = array( 'to' => "$phone", 'message' => "$m" );
    $result = $clockwork->send( $message );

    // Check if the send was successful
    if($result['success']) {
        echo 'Message sent - ID: ' . $result['id'];
    } else {
        echo 'Message failed - Error: ' . $result['error_message'];
    }
}
catch (ClockworkException $e)
{
    echo 'Exception sending SMS: ' . $e->getMessage();
}
}
if($_GET['id']=="accept"){
		//
		if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sqlupdate1 = "UPDATE init_file SET init_file.level='3' WHERE init_file_id='$file_id'";

if ($conn->query($sqlupdate1) === TRUE) {
    //echo "Record updated successfully";
} else {
   // echo $conn->error;
}

$conn->close();
	//
	sendsms($phone_number,"File Approved");

}
else if($_GET['id']=="decline"){
	echo "your file denied due to errors";
	sendsms($phone_number,"You file has been denied due to errors");
	if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sqlupdate = "UPDATE init_file SET init_file.level='2' WHERE init_file_id='$file_id'";

if ($conn->query($sqlupdate) === TRUE) {
    //echo "Record updated successfully";
} else {
    //echo $conn->error;
}

$conn->close();
}








?>