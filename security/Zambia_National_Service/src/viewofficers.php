<?php
include 'header.php';
?>

<div class="container">
<div class="row">
	<div class="col-md-3">
	<?php
	include 'officer_sidebar.php';
	?>
	</div>
	<div class="col-md-7">
		<div class="panel panel-default">
		  <div class="panel-heading">
		    <h3 class="panel-title">View Officers</h3>
		  </div>
		  <div class="panel-body">
		   <?php
		   $permission_level = $_SESSION['permissions_level'];
		   $permission_type = $_SESSION['permission_type'];

		   if($permission_type == 'Administrator' && $permission_level == 1){
		  		$query = "SELECT `Rank`, `Surname`, `OtherNames`, `Unit` FROM `officer`";
		  		$data_check = mysqli_query($connect, $query) or die('Query Error');

		  		while($row = mysqli_fetch_array($data_check)){
		  			$viewrank = $row['Rank'];
		  			$viewsurname = $row['Surname'];
		  			$OtherNames = $row['OtherNames'];
		  			$viewunit = $row['Unit'];

		  			echo '<a href="officer_info.php">'.$viewrank.' '.$viewsurname.' '.$OtherNames.'</a><br>';
		  		}
		   } elseif ($permission_type == 'IT Support' && $permission_level == 2) {
		   		$query = "SELECT * FROM `barrack` WHERE `ServiceNumber` = '$service_number'";
		   		$data_check = mysqli_query($connect, $query) or die("Query Error");

		   		while($row = mysqli_fetch_array($data_check)){
		   			$barrack = $row['BarrackName'];
		   		}

		   		$query = "SELECT officer.ServiceNumber, officer.Rank, officer.Surname, officer.OtherNames, officer.Unit, barrack.BarrackName, barrack.ServiceNumber FROM officer INNER JOIN barrack ON barrack.ServiceNumber = officer.ServiceNumber WHERE BarrackName = '$barrack'";
		  		$data_check = mysqli_query($connect, $query) or die(mysqli_errno());

		  		while($row = mysqli_fetch_array($data_check)){
		  			$viewrank = $row['Rank'];
		  			$viewsurname = $row['Surname'];
		  			$OtherNames = $row['OtherNames'];
		  			$viewunit = $row['Unit'];

		  			echo '<a href="officer_info.php">'.$viewrank.' '.$viewsurname.' '.$OtherNames.'</a><br>';
		  		}
		   } elseif ($permission_type == 'Public' && $permission_level == 3) {
		   	# code...
		   }
		   ?>
		  </div>
		</div>
	</div>
	<div class="col-md-2">

	</div>
</div>
</div>

