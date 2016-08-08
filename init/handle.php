<?php
include "../db/db.php";
require 'class-Clockwork.php';
session_start();
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
$digits = 6;
$randname = rand(pow(10, $digits-1), pow(10, $digits)-1);
$service_number = $_SESSION['service_number'];
$target_dir = "approvedfiles/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$fileName = $_FILES["fileToUpload"]["name"];
$uploadOk = 1;
echo $FileType = pathinfo($target_file,PATHINFO_EXTENSION);
$sql = "INSERT INTO init_file (ServiceNumber,file_name,confirmation_code) VALUES ('$service_number','$fileName','$randname')";

if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}






if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}

if($FileType=="csv"){
	echo "its csv file";
	
	$myfile = fopen($randname."json", "w") or die("Unable to open file!");
	fwrite($myfile, $txt);
	fclose($myfile);
}
else{


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
   	sendsms("260972148199","Mr the file has been sent for approval confirmation code is $randname");
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
}
?>