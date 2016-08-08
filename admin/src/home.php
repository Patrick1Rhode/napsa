<?php
include 'header.php';
$service_number = $_SESSION['service_number'];

if(isset($service_number) && !empty($service_number)){

} else {
	header('Location: error404.php');
}

?> 

<div class="container">
<div class="row">
	<div class="col-md-3">
	<?php
	include 'officer_sidebar.php';
	?>
	</div>

	<div class="col-md-6">
	<ul id="myTab" class="nav nav-tabs">
	<li class="active"><a href="#home" data-toggle="tab"><strong>Actions</strong></a></li>
	<li><a href="#ios" data-toggle="tab"><?php echo ''. $rank .' '. $surname; ?></a></li>
   <li><a href="#vo" data-toggle="tab">Settings</a></li>
</ul>
<div id="myTabContent" class="tab-content">
   <div class="tab-pane fade in active" id="home">
   	<br>
   	<br>
      <?php
      if($_SESSION['permissions_level'] == 1 && $_SESSION['permission_type'] == 'Administrator'){
      	echo '<div class="list-group">
  		<a href="addofficer.php" class="list-group-item">
    	Add an Officer
  		</a>
  <a href="viewofficers.php" class="list-group-item">View Officers</a>
  <a href="#" class="list-group-item">Delete Officers</a>
</div>';
      } elseif ($_SESSION['permissions_level'] == 2 && $_SESSION['permission_type'] == 'IT Support') {
      	echo '<div class="list-group">
  		<a href="addofficer.php" class="list-group-item">
    	Add an Officer
  		</a>
  	<a href="viewofficers.php" class="list-group-item">View Officers</a>
	</div>';
      } elseif ($_SESSION['permissions_level'] == 3 && $_SESSION['permission_type'] == 'Public') {
      	echo '<p style="text-align: center">Unauthorized<br>You are not allowed to view this content</p>';
      	echo '';
      	echo '<div class="row">
      	<div class="col-md-4">
      	</div>
      	<div class="col-md-4">
      	<img src="../img/access-denied.jpg" class="img-responsive" style="text-align: center"/>
      	</div>
      	<div class="col-md-4">
      	</div>
      	</div>';
      } else {
      	echo "You have no access to view this content";
      }
      ?>

   </div>
   <div class="tab-pane fade" id="ios">
     <h3 style="text-align: center;">Hi, <?php echo $rank.' '.$surname;?></h3>
     <?php
     if($rank == 'Lance Corporal'){
     		echo '<div class="row">
      	<div class="col-md-4">
      	</div>
      	<div class="col-md-4">
      	<img src="../img/lance-corporal.jpg" class="img-responsive" style="text-align: center"/>
      	</div>
      	<div class="col-md-4">
      	</div>
      	</div>';
     } elseif ($rank == 'Major') {
 		echo '<div class="row">
      	<div class="col-md-4">
      	</div>
      	<div class="col-md-4">
      	<img src="../img/major.jpg" class="img-responsive" style="text-align: center"/>
      	</div>
      	<div class="col-md-4">
      	</div>
      	</div>';
     } elseif ($rank == 'Corporal') {
 		echo '<div class="row">
      	<div class="col-md-4">
      	</div>
      	<div class="col-md-4">
      	<img src="../img/major.jpg" class="img-responsive" style="text-align: center"/>
      	</div>
      	<div class="col-md-4">
      	</div>
      	</div>';
     } elseif ($rank == 'Sergent') {
 		echo '<div class="row">
      	<div class="col-md-4">
      	</div>
      	<div class="col-md-4">
      	<img src="../img/major.jpg" class="img-responsive" style="text-align: center"/>
      	</div>
      	<div class="col-md-4">
      	</div>
      	</div>';
     } elseif ($rank == 'Staff Sergent') {
 		echo '<div class="row">
      	<div class="col-md-4">
      	</div>
      	<div class="col-md-4">
      	<img src="../img/major.jpg" class="img-responsive" style="text-align: center"/>
      	</div>
      	<div class="col-md-4">
      	</div>
      	</div>';
     } elseif ($rank == 'Warrant Officer II') {
 		echo '<div class="row">
      	<div class="col-md-4">
      	</div>
      	<div class="col-md-4">
      	<img src="../img/major.jpg" class="img-responsive" style="text-align: center"/>
      	</div>
      	<div class="col-md-4">
      	</div>
      	</div>';
     } elseif ($rank == 'Warrant Officer I') {
 		echo '<div class="row">
      	<div class="col-md-4">
      	</div>
      	<div class="col-md-4">
      	<img src="../img/major.jpg" class="img-responsive" style="text-align: center"/>
      	</div>
      	<div class="col-md-4">
      	</div>
      	</div>';
     } elseif ($rank == 'Major') {
 		echo '<div class="row">
      	<div class="col-md-4">
      	</div>
      	<div class="col-md-4">
      	<img src="../img/major.jpg" class="img-responsive" style="text-align: center"/>
      	</div>
      	<div class="col-md-4">
      	</div>
      	</div>';
     } elseif ($rank == '2nd Lieutentant') {
 		echo '<div class="row">
      	<div class="col-md-4">
      	</div>
      	<div class="col-md-4">
      	<img src="../img/major.jpg" class="img-responsive" style="text-align: center"/>
      	</div>
      	<div class="col-md-4">
      	</div>
      	</div>';
     } elseif ($rank == '1st Lieutentant') {
 		echo '<div class="row">
      	<div class="col-md-4">
      	</div>
      	<div class="col-md-4">
      	<img src="../img/1lieutenant.jpg" class="img-responsive" style="text-align: center"/>
      	</div>
      	<div class="col-md-4">
      	</div>
      	</div>';
     } elseif ($rank == 'Captian') {
 		echo '<div class="row">
      	<div class="col-md-4">
      	</div>
      	<div class="col-md-4">
      	<img src="../img/major.jpg" class="img-responsive" style="text-align: center"/>
      	</div>
      	<div class="col-md-4">
      	</div>
      	</div>';
     } elseif ($rank == 'Lieutentant Colonel') {
 		echo '<div class="row">
      	<div class="col-md-4">
      	</div>
      	<div class="col-md-4">
      	<img src="../img/major.jpg" class="img-responsive" style="text-align: center"/>
      	</div>
      	<div class="col-md-4">
      	</div>
      	</div>';
     } elseif ($rank == 'Colonel') {
 		echo '<div class="row">
      	<div class="col-md-4">
      	</div>
      	<div class="col-md-4">
      	<img src="../img/major.jpg" class="img-responsive" style="text-align: center"/>
      	</div>
      	<div class="col-md-4">
      	</div>
      	</div>';
     } elseif ($rank == 'Brigadier General') {
 		echo '<div class="row">
      	<div class="col-md-4">
      	</div>
      	<div class="col-md-4">
      	<img src="../img/major.jpg" class="img-responsive" style="text-align: center"/>
      	</div>
      	<div class="col-md-4">
      	</div>
      	</div>';
     } elseif ($rank == 'Major General') {
 		echo '<div class="row">
      	<div class="col-md-4">
      	</div>
      	<div class="col-md-4">
      	<img src="../img/major.jpg" class="img-responsive" style="text-align: center"/>
      	</div>
      	<div class="col-md-4">
      	</div>
      	</div>';
     } elseif ($rank == 'Lieutentant General') {
 		echo '<div class="row">
      	<div class="col-md-4">
      	</div>
      	<div class="col-md-4">
      	<img src="../img/major.jpg" class="img-responsive" style="text-align: center"/>
      	</div>
      	<div class="col-md-4">
      	</div>
      	</div>';
     } elseif ($rank == 'General') {
 		echo '<div class="row">
      	<div class="col-md-4">
      	</div>
      	<div class="col-md-4">
      	<img src="../img/major.jpg" class="img-responsive" style="text-align: center"/>
      	</div>
      	<div class="col-md-4">
      	</div>
      	</div>';
     }
     ?>
   </div>
    <div class="tab-pane fade in active" id="vo">
   	<br>
   	<br>
   	<p>Change Password</p>
      <?php
     	if($permission == 1){
     		echo '<a href="">Assign Permissions</a>';
		} elseif($permission == 2){
			echo '<a href="">Assign Permissions</a>';
		} elseif($permission == 3){
			echo '<a>Edit Information</a>';
		} else {
			echo "YOur Permission is undefined";
		}
      ?>
   </div>  
</div>
<script>
   $(function () {
      $('#myTab li:eq(1) a').tab('show');
   });
</script>
	<?php

			
	?>
	</div>
	<div class="col-md-3">
		<img src="../img/coa.png" class="img-responsive"><br><hr>
		
	</div>
</div>
</div>

