<html>
	<head>
		<link href="../css/bootstrap.min.css" rel="stylesheet">
		<link href="../css/zns_theme.css" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="../css/font-awesome.min.css">
		<!--<link href='http://fonts.googleapis.com/css?family=Oswald:400,300' rel='stylesheet' type='text/css'>-->
		<script type="text/javascript" src="../js/jquery-1.8.3.min.js"></script>
		<script type="text/javascript" src="../js/bootstrap.min.js"></script>
		<script type="text/javascript" src="../js/custom.js"></script>
		<title>NAPSA | Database Front End</title>
	</head>

	<?php
		session_start();
		ob_start();
		include 'constants/db_constants.php';

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
	<nav class="navbar navbar-default" role="navigation">
	  <div class="container-fluid">
	    <div class="navbar-header">
	      <a class="navbar-brand zns-brand" href="home.php">
	        NAPSA
	      </a>
	    </div>
	    <p class="navbar-text navbar-right"><i class="navbar-link">Signed in as:</i> <a href="#" class="navbar-link"><?php echo $name;?></a>   <a href="logout.php" style="color: #ff0000;">Logout</a></p>
	  </div>
	</nav>