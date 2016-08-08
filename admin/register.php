<?php

function register($fn,$ln,$ph,$em,$pass,$table){
	include "../db/db.php";
	include '../security/hash.php';

	if (!empty($password1) && !empty($password2)) {
            if ($password1 == $password2) {
                
                $final_password = $password1;
                
                if (strlen($final_password) >= 6) {
                
                $reverse_password = strrev($final_password);
                $skyfall = hash_hmac(HASH_ALGO_1, $reverse_password, SALT);
                $hashed_password = hash_hmac(HASH_ALGO, $skyfall . SALT, SITE_KEY);
                
                $sql="SELECT*FROM $table WHERE email='$em'";
				$result = $conn->query($sql); 
				if ($result->num_rows > 0) {
					echo "Duplicate rows";
				}else{
					$sql = "INSERT INTO $table (fName,lName,email,phone_number,password) VALUES ('$fn','$ln','$em','$ph','$pass')";
					$conn->query($sql);
				}
               
                } else {
                    echo 'Your password must be 8 Characters or more';
                }
            } else {
                echo 'Your Passwords Do Not Match!!!';
            }
          
    }	
}
?>
<?php
if(Isset($_GET['flag']) && $_GET['flag']=="init"){
	echo "Its init flag";
	//getting variables 
	
	$fName = $_POST['fname'];
	$lName = $_POST['lname'];
	$email = $_POST['email'];
	$phone_number = $_POST['phone_number'];
	$password= $_POST['password'];
	//
	register($fName,$lName,$phone_number,$email,$password,"init");
}
else if(Isset($_GET['flag']) && $_GET['flag']=="approval"){
	echo "Its approval flag";
	//getting variables 
	
	$fName = $_POST['fname'];
	$lName = $_POST['lname'];
	$email = $_POST['email'];
	$phone_number = $_POST['phone_number'];
	$password= $_POST['password'];
	//
	register($fName,$lName,$phone_number,$email,$password,"approval");
}
else{
	echo "Please parameter is missing or being mishandled eror 10101";
}




?>