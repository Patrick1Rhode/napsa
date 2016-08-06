<?php
include 'header.php';
include "../db/db.php";
$level = 1;
$gramar = "";
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT*FROM init_file INNER JOIN init USING(init_id)  WHERE init_file.level = '$level' or init_file.level=''";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
	$num = $result->num_rows;
	if($num>1){
		$gramar = "files";
	}
	else{
		$gramar = "file";
	}
	echo "<h1>The below $gramar are pending approval</h1>";
  while($row = $result->fetch_assoc()) {
	$json_file_name = $row["file_name"];
	$init_id = $row["init_id"];
	$init_file_id = $row["init_file_id"];
	
	echo "<p><a href='view.php?init_file_id=$init_file_id'>File <b>$json_file_name</b> is pending approval click here to view</a></p>";
	}
} else {
    echo "Nothing is available for now..we gonna inform you by sms or email";
}
$conn->close();
?>