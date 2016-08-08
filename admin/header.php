<<<<<<< HEAD
<html>
	<head>
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/zns_theme.css" rel="stylesheet">
		<link href='http://fonts.googleapis.com/css?family=Oswald:400,300' rel='stylesheet' type='text/css'>
		<script type="text/javascript" ></script>
		<script type="text/javascript" src="js/jquery-1.8.3.min.js"></script>
		<script type="text/javascript" src="js/bootstrap.min.js"></script>
	</head>

	<?php
		session_start();
		ob_start();
	?>
=======
<!DOCTYPE html>
<html>
	
<head>
	<title>NAPSA Initiator</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">    
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style.css">
		<meta charset="utf-8">  
		<meta name="viewport" content="width=device-width, initial-scale=1">
    <nav class="navbar navbar-default" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <a class="navbar-brand" href="index.php" style="color: white;">NAPSA - Admin</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->   
        </div>
    </nav>		
</head>
<?php
if(!isset($_SESSION['user_id'])){
    
    @header('Location: index.php');
    
} elseif(isset($_SESSION['user_id'])){
    $user_id = $_SESSION['user_id'];

}
?>
>>>>>>> b07099192ebf560b80005ade543e44d82d1343e6
