<?php
include("../connect.php");
if (Isset($_POST['submit'])) {
//escaping mysql injection
$email=$_POST['email'];
$password=$_POST['password'];
$email=htmlspecialchars($email);
$email=strip_tags($email);
$email=mysql_real_escape_string($email);

$password=htmlspecialchars($password);
$password=strip_tags($password);
$password=mysql_real_escape_string($password);

if  (!empty($email) && !empty($password)) 
$sql="SELECT*FROM approval WHERE email='$email' AND password='$password'";
$query=mysql_query($sql);
$rows=mysql_num_rows($query);

if ($rows==0) {
echo "<div id='u'>";
echo "<h3 class='forgot'>You are not a member</h3>";
echo "</div>";
}
else  {
$sql="SELECT*FROM approval WHERE email='$email' AND password='$password'";
$query=mysql_query($sql);
$rows=mysql_fetch_assoc($query);
$approval_id=$rows['approval_id'];
$fName = $rows['fName'];
$lName = $rows['lName'];
$approval_name = $fName." ".$lName;

$time=time()+60*60*60;
setCookie('artist_id',$approval_id,$time);
setCookie('artist_name',$approval_name,$time);

ob_start(); 
header("location:admin.php");


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
