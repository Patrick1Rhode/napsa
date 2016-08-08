<?php
include "../db/db.php";
require 'class-Clockwork.php';
session_start();
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

$service_number = $_SESSION['service_number'];
$target_dir = "approvedfiles/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$fileName = $_FILES["fileToUpload"]["name"];
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
$sql = "INSERT INTO init_file (ServiceNumber,file_name) VALUES ('$service_number','$fileName')";

if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}






if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}



if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";

} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
		//db

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 


if ($conn->query($sql) === TRUE) {
   // echo "successfully made the changes";
   	sendsms("260967779464","Mr the file has been sent for approval");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
		
		
		//dbend
        echo "The file has been uploaded we will get in touch soon.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
?>