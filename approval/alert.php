<?php
include "../db/db.php";
include "header.php";

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
	
 $baseurl = "http://smsapi.probasesms.com/apis/text/index.php";

	$qs	= http_build_query(array(
		'username'=>'demo',
		'password'=>'password',
		'mobiles'=>$phone,
		'message'=>$m,
		'sender'=>'NAPSA',
		'type'=>'TEXT',
	));
	
	$url	= $baseurl.'?'.$qs;
	
	$curl_handle = curl_init();
	curl_setopt( $curl_handle, CURLOPT_URL, $url );
	curl_exec( $curl_handle );
	curl_close( $curl_handle );	
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