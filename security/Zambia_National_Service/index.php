<?php
	include 'header.php';
	include 'src/constants/db_constants.php';
	include 'src/constants/encryption_keys.php'; 
?>

<article>
	<div class="row">
	
		<div class="col-md-6 col-md-push-3">
		<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
			<fieldset>
				<legend>Zambia National Service Database FRONT END</legend>
				
				<p>Service Number: <br>
				<input type="text" name="username"></p>
				<p>Password:<br>
				<input type="password" name="password"></p>
				<p><input type="submit" name="login" value="Login" class="btn btn-primary"></p>
			</fieldset>
		</form>
		</div>
	</div>
</article>

</html>

<?php
if(isset($_POST['login'])){
	$username = $_POST['username'];
	$password = $_POST['password'];

	if(!empty($username) && !empty($password)){
		$connect = mysqli_connect(ZNS_HOSTNAME, ZNS_SERVER_USERNAME, ZNS_SERVER_PASS, ZNS_SERVER_DB) or die('Error connecting to Server');

		//check varialbles and sanitize them to prevent SQL Injection
		function Sanitize_Input($input, $connect){
			$input = mysqli_real_escape_string($connect, $input);
			$input = htmlentities($input);

			return $input;
		}

		$username = Sanitize_Input($username, $connect);
		$password = Sanitize_Input($password, $connect);

		//Encrypt your password
		$password = hash_hmac(ALGO, $password, SYSTEM_KEY);

		$query = "SELECT * FROM `login` WHERE `Password` = '$password' && `ServiceNumber` = '$username'";
		$data_query = mysqli_query($connect, $query) or die('Error Querying Db');

		$num_rows = mysqli_num_rows($data_query);

		if ($num_rows >= 1) {
			while ($row = mysqli_fetch_array($data_query)) {
				$ServiceNumber = $row[1];
				$_SESSION['service_number'] = $ServiceNumber;
			}
		
			header('Location: src/home.php');
		} else {
			echo "Hello No";
		}
	}
}
?>

