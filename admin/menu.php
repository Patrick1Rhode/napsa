<html>
<head>

</head>
<body>
<?php include("header.php");?>
<form method="post" action="register.php?flag=init">
 <input value="First Name" type="text" name="fname"></br>
 <input value="Last Name" type="text" name="lname"></br>
 <input value="Email" type="text" name="email"></br>
 <input value="Mobile Phone" type="text" name="phone_number"></br>
 <input value="password" type="text" name="password"></br>
 <input type="submit" value="submit initiators"></br>
 
</form>



<form method="post" action="register.php?flag=approval">
 <input value="First Name" type="text" name="fname"></br>
 <input value="Last Name" type="text" name="lname"></br>
 <input value="Email" type="text" name="email"></br>
 <input value="Mobile Phone" type="text" name="phone_number"></br>
 <input value="password" type="text" name="password"></br>
 <input type="submit" value="submit approvers"></br>
</body>
</html>