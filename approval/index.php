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
?>



<!DOCTYPE html>
<html>
	
<head>
	<title>Napsa Approval Dispenser</title>
        
          <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
		<meta charset="utf-8">
		
		<meta name="viewport" content="width=device-width, initial-scale=1">
		
</head>
<body>
	<div class="container">
             <nav class="navbar navbar-inverse" role="navigation">
<div class="navbar-header"> 
<a class="navbar-brand" href="index.php">Napsa Approval</a>
 </div> 
 <div>
 <ul class="nav navbar-nav">

 
 
 </ul>

 </div> 
 </nav>
            <div class="row">
                <div class="col-md-12">
                    <form role="form" action="index.php" method="post">
                      <div class="form-group">
                          <label class="control-label">email</label>
                          <input type="text" name="email" class="form-control">
                          <label class="control-label">Password</label>
                          <input type="text" name="password" class="form-control">
                        
                          <button class="btn btn-primary" name="submit" type="submit">Login</button>
                      </div>
                        
                    </form>
                
                
            </div>
    
				
				
				
        </div>		 		
</body>
</html>
