<?php
<<<<<<< HEAD
	include 'header.php';
	include 'src/constants/db_constants.php';
	include 'src/constants/encryption_keys.php'; 
?>

<article>
	<div class="row">
	
		<div class="col-md-6 col-md-push-3">
		<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
			<fieldset>
				<legend>Napsa Admin Console</legend>
				
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
		$connect = mysqli_connect(NAPSA_HOSTNAME, NAPSA_SERVER_USERNAME, NAPSA_SERVER_PASS, NAPSA_SERVER_DB) or die('Error connecting to Server');

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

=======
include "../db/db.php";
if (Isset($_POST['submit'])) {
//escaping mysql injection
$email=$_POST['email'];
$password=$_POST['password'];


if  (!empty($email) && !empty($password)) 
$sql="SELECT*FROM admin WHERE email='$email' AND password='$password'";

$result = $conn->query($sql); 
if ($result->num_rows > 0) {
	
	$rows = $result->fetch_assoc();
	$admin_id=$rows['admin_id'];
	$fName = $rows['fName'];
	$lName = $rows['lName'];
	$admin_name = $fName." ".$lName;

  @ob_start(); 
  @session_start(); 

  $_SESSION['admin_id'] = $admin_id;
	@header("location:menu.php");

}
else  {
	//
	echo "<div id='u'>";
	echo "<h3 class='forgot'>You are not a member</h3>";
	echo "</div>";
//

}
}
//Header File
include 'header.php';
?>
<body>
  <div class="row home">
  <div class="container">
    <div class="col-md-3"></div>
    <div class="col-md-6">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="panel-title">Please sign in</h3>
        </div>
          <div class="panel-body">
            <form role="form" action="index.php" method="post">
                    <fieldset>
                <div class="form-group">
                  <input class="form-control" placeholder="E-mail" name="email" type="text">
              </div>
              <div class="form-group">
                <input class="form-control" placeholder="Password" name="password" type="password">
              </div>
              <div class="checkbox">
                  <label>
                    <input name="remember" type="checkbox" value="Remember Me"> Remember Me
                  </label>
                </div>
              <input class="btn btn-md btn-success btn-block" type="submit" value="Login" name="submit">
            </fieldset>
              </form>
          </div>
      </div>
    </div>
    <div class="col-md-3"></div>    
  </div>
  </div>        
</body>
</html>
>>>>>>> b07099192ebf560b80005ade543e44d82d1343e6
