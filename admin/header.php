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
