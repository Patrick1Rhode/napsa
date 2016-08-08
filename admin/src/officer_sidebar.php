
<div class="officer-profile">
		<img src="../img/zambia.gif" class="img-responsive"><br>Basic Information<hr>
		<?php
		echo '<strong>Surname: </strong><div class="pull-right">'. $surname .'</div><br>';
		echo '<strong>Other Name(s): </strong><div class="pull-right"> '. $othername.'</div><br>';
		echo '<strong>Unit: </strong><div class="pull-right"> '. $unit.'</div><br>';
		echo '<strong>Place of Birth: </strong><div class="pull-right"> '. $placeofbirth.'</div><br>';
		echo '<strong>Date of Birth: </strong><div class="pull-right"> '. $dateofbirth.'</div><br>';
		echo '<strong>Nationality: </strong><div class="pull-right"> '. $nationality.'</div><br>';
		echo '<strong>Country of Birth: </strong></strong><div class="pull-right"> '.$countryofbirth.'</div><br><br>';
		?>
		
		<p>Permissions</p>
		<hr>
		<?php
		echo '<strong>Permissions Level: </strong><div class="pull-right">'. $_SESSION['permissions_level']. '</div><br>';
		echo '<strong>Permissions Type: </strong><div class="pull-right">'. $_SESSION['permission_type'] .'</div>';
		?>
	</div>
