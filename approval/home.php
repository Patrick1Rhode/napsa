<?php
include 'header.php';
include "../db/db.php";
if(($_SESSION['permissions_level'] == 2 && $_SESSION['permission_type'] == 'IT Support')){
	
	    $level = 1;
$gramar = "";
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT*FROM init_file INNER JOIN officer USING(ServiceNumber) WHERE init_file.level = '$level' or init_file.level=''";
$result = $conn->query($sql) or die (mysqli_error());
if ($result->num_rows > 0) {
	 //security
	
		   
			   //
	$num = $result->num_rows; 
	if($num>1){
		$gramar = "files";
	}
	else{
		$gramar = "file";
	}
	echo "<h1>The below $gramar are pending approval</h1>";
  while($row = $result->fetch_assoc()) {
	$json_file_name = $row["file_name"];
	$ServiceNumber = $row["ServiceNumber"];
	$init_file_id = $row["init_file_id"];
	$confirmation_code = $row['confirmation_code'];
	echo "<input type='hidden' ng-init='confirmation'='$confirmation_code'></td>";
	//<a href='view.php?init_file_id=$init_file_id'>File <b>$json_file_name</b> is pending approval click here to view</a>
	?>
	
	<?php
	echo "<p><button type='button' class='btn btn-info btn-lg' data-toggle='modal' data-target='#myModal'>$json_file_name is pending approval enter confirmation code</button></p>";
	}
	//
		   
		   //end
	
} else {
    echo "Nothing is available for now..we gonna inform you by sms or email";
}
$conn->close();
			  
		   }
		   else{
			   echo "get no permision";
			    echo "<script>window.location = 'index.php';</script>'";
		   }

?>
</body>
<!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Modal Header</h4>
        </div>
        <div class="modal-body">
          <div ng-app="">
		   <input type="text" ng-model="file" name="code"></br>
		   <button type="submit" class='btn-success' name="code">Confirm code</button>
		   <p>{{file}}</p>
		   
		  </div>
		  
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

</html>