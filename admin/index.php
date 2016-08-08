<?php
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