<?php
	include 'header.php';
	include_once 'constants/encryption_keys.php';
?>
<article>
	<div class="container">
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" class="new-officer">
	<div class="row">
	<div class="col-md-3">
	<?php
	include 'officer_sidebar.php';
	?>
	</div>
	<div class="col-md-7">
	
	<div class="panel panel-default">
  	<div class="panel-heading">
    <h3 class="panel-title">Add an Officer</h3>
  	</div>
 
 <fieldset class="add-officer">
		PERSONAL PARTICULARS
		<p>Service Number:<br>
		<input type="text" name="servicenumber"></p>
		<p>Rank:<br>
		<input type="text" name="rank"></p>
		<p>Surname:<br>
		<input type="text" name="surname"></p>
		<p>Other Names:<br>
		<input type="text" name="othernames"></p>
		<p>Unit:<br>
		<input type="text" name="unit"></p>
		<p>Date of Birth:<br>
		<input type="text" name="date"> Format: YYYY-MM-DD</p>
		<p>Place of Birth:<br>
		<input type="text" name="placeofbirth"></p>
		<p>Nationality:<br>
		<input type="text" name="nationality"></p>
		<p>Country of Birth:<br>
		<input type="text" name="countryofbirth"></p>
		<p>Spouse Name:<br>
		<input type="text" name="spousename"></p>
		<p>Spouse Nationality:<br>
		<input type="text" name="spousenationality"></p>
		<p>Date of Attestation:<br>
		<input type="text" name="dateofattestation"> Format: YYYY-MM-DD</p>
		<p>Create Password:<br>
		<input type="password" name="createpassword"></p>
		<p>Confirm Password:<br>
		<input type="password" name="confirmpassword"></p>
		<?php
		$security_level = $_SESSION['permissions_level'];
		$security_type = $_SESSION['permission_type'];

		if(isset($security_level) && !empty($security_type)){
			if($security_level == 1 && $security_type == 'Administrator'){
				echo 'Assign Permissions:<br><select name="permission_type">
				  <option value="Public">Public</option>
				  <option value="IT Support">IT Support</option>
				  <option value="Administrator">Administrator</option>
				</select><br><br>';
			} elseif ($security_level == 2 && $security_type == 'IT Support') {
				echo 'Assign Permissions:<br><select name="permission_type">
				  <option value="Public">Public</option>
				  <option value="IT Support">IT Support</option>
				</select><br><br>';
			} elseif ($security_level == 3 && security_type == 'Public') {
				echo 'Permission:<br><select name="permission_type">
				  <option value="Public">Public</option>
				</select><br><br>';
			} else {
				echo "Your Permission level is Public";
				echo 'Permission:<br><select name="permission_type">
				  <option value="Public">Public</option>
				</select><br><br>';
			}
		}
		?>
		<p><input type="submit" name="submit" value="Submit Information" class="btn btn-success"> <input type="reset" name="reset" value="Reset Feilds" class="btn btn-danger"></p>

	</fieldset>
  	</div>
	</div>
	</div>
	<div class="col-md-2">

	</div>
	</div>
	</form>
	</div>
</article>

<?php 
//Require required scripts
include_once('constants/db_constants.php');

if(isset($_POST['submit'])){
	//Collect data from the form via post variables

	//Personal Records Data
	$servicenumber = $_POST['servicenumber'];
	$rank = $_POST['rank'];
	$surname = $_POST['surname'];
	$othernames = $_POST['othernames'];
	$unit = $_POST['unit'];
	$dateofbirth = $_POST['date'];
	$placeofbirth = $_POST['placeofbirth'];
	$nationality = $_POST['nationality'];
	$countryofbirth = $_POST['countryofbirth'];
	$spousename = $_POST['spousename'];
	$spousenationality = $_POST['spousenationality'];
	$dateofattestation = $_POST['dateofattestation'];
	$permission_type2 = $_POST['permission_type'];

	if($permission_type2 == 'Administrator'){
		$permission_type2 = $permission_type2;
		$permissions_level = 1;
	} elseif ($permission_type2 == 'IT Support') {
		$permission_type2 = $permission_type2;
		$permissions_level = 2;
	} elseif ($permission_type2 == 'Public') {
		$permission_type2 = $permission_type2;
		$permissions_level = 3;
	}

	//History of previous promotion
	//$promotionname = $_POST['promotionname'];
	//$promotiondate = $_POST['promotiondate'];

	//Courses attended
	//$coursename = $_POST['coursename'];
	//$coursedate = $_POST['coursedate'];

	//Appointments held
	//$appointmentname = $_POST['appointmentname'];
	//$startyearappointment = $_POST['startyearappointment'];
	//$endyearappointment = $_POST['endyearappointment'];

	//Academic Qualification
	//$qualificationname = $_POST['qualificationname'];
	//$qualificationdate = $_POST['qualificationdate'];

	//Honours and Decorations
	//$honoursname = $_POST['honoursname'];
	//$honoursdate = $_POST['honoursdate'];

	//passwords
	$createpassword = $_POST['createpassword'];
	$confirmpassword = $_POST['confirmpassword'];

	if(!empty($createpassword) && isset($createpassword) && !empty($confirmpassword) && isset($confirmpassword)){
		if($createpassword == $confirmpassword){
			$password = $confirmpassword;
			/*Encrypt password
			* This password has been encrypted with simple SHA1 encryption algorithm
			*/
			$password = hash_hmac(ALGO, $password, SYSTEM_KEY);

			//Connect to server
			$connect = mysqli_connect(NAPSA_HOSTNAME, NAPSA_SERVER_USERNAME, NAPSA_SERVER_PASS, NAPSA_SERVER_DB) or die("Error connecting to NAPSA Server, Please check your connection");

			$query = "INSERT INTO `officer` VALUES('$servicenumber', '$rank', '$surname', '$othernames', '$unit', '$dateofbirth', '$placeofbirth', '$nationality', '$countryofbirth', '$spousename', '$spousenationality', '$dateofattestation')";
			$data_entry = mysqli_query($connect, $query);

			//password query
			$query = "INSERT INTO `login` VALUES ('$password', '$servicenumber')";
			$data_entry = mysqli_query($connect, $query) or die("Query Failed");

			$query = "INSERT INTO `securitygroup` VALUES ('$servicenumber', '$permission_type2', '$permissions_level')";
			$data_entry = mysqli_query($connect, $query) or die(mysqli_error());

			

			if($data_entry){
				header('Location: addconfirm.php');
			} else {
				
			}


		} else {
			echo "ERROR: Your passwords do not match!";
		}

	}

}
?>