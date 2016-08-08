	<?php
	session_start();
		ob_start();
		include '../constants/db_constants.php';

		$service_number = $_SESSION['service_number'];

		$connect = mysqli_connect(NAPSA_HOSTNAME, NAPSA_SERVER_USERNAME, NAPSA_SERVER_PASS, NAPSA_SERVER_DB) or die('Error connecting to Server');
		$query = "SELECT * FROM `officer` WHERE `ServiceNumber` = '$service_number'";
		$data_collection = mysqli_query($connect, $query);

		while ($row = mysqli_fetch_array($data_collection)) {
			$rank = $row['Rank'];
			$surname = $row['Surname'];
			$othername = $row['OtherNames'];
			$unit = $row['Unit'];
			$dateofbirth = $row['DOB']; 
			$placeofbirth = $row['POB'];
			$nationality = $row['Nationality'];
			$countryofbirth = $row['CountryOfBirth'];
			$spousename = $row['SpouseName'];
			$spousenationality = $row['SpouseNationality'];
			$dateofattestation = $row['DateOfAttestation'];

			$name = $rank .' '. $surname .' '.$othername;

		}

	?>

	<?php
	$query = "SELECT * FROM `securitygroup` WHERE `SecurityGroupID` = '$service_number'";
	$data_check = mysqli_query($connect, $query) or die("Error querying database");
	$num_rows = mysqli_num_rows($data_check);

	if($num_rows >= 1){
		while($row = mysqli_fetch_array($data_check)){
			$permission = $row[2];
			$permission_name = $row[1];

			$_SESSION['permissions_level'] = $permission;
			$_SESSION['permission_type'] = $permission_name;

		}
	} else {
		echo "You have no permissions";
	}
	?>
<!DOCTYPE html>
<html>
	
<head>
	<title>NAPSA Approval Dispenser</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">    
    <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>
    <link rel="stylesheet" href="../css/style.css">
		<meta charset="utf-8">  
		<meta name="viewport" content="width=device-width, initial-scale=1">
    <nav class="navbar navbar-default" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <a class="navbar-brand" href="index.php" style="color: white;">NAPSA</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->   
        </div>
    </nav>		
</head>