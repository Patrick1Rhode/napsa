<?php
include 'header.php';
include "../user.class.php";
include "../db/db.php";
?>
<div class="container">
	<div class="row">
        <div class="col-md-3">
            <form action="#" method="get">
                <div class="input-group">
                    <!-- USE TWITTER TYPEAHEAD JSON WITH API TO SEARCH -->
                    <input class="form-control" id="system-search" name="q" placeholder="Search for" required>
                    <span class="input-group-btn">
                        <button type="submit" class="btn btn-default"><i class="glyphicon glyphicon-search"></i></button>
                    </span>
                </div>
            </form>
        </div>
		<div class="col-md-9">
    	 <table class="table table-list-search table-striped">
                    <thead>
                        <tr>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Account Number</th>
                            <th>Sex</th>
                            <th>Age</th>
                            <th>Bank Name</th>
                            <th>Branch Name</th>
                            <th>Amount</th>
                        </tr>
                    </thead>
                    <tbody>
<?php
if((!$_SESSION['permissions_level'] == 3 && !$_SESSION['permission_type'] == 'Public')){
	  echo "<script>window.location = 'index.php';</script>'";
}
$id = $_GET['init_file_id'];
$sql = "SELECT*FROM init_file INNER JOIN officer USING(ServiceNumber)  WHERE init_file.init_file_id = '$id'";
$result = $conn->query($sql); 
if ($result->num_rows > 0) {
	
	
    $row = $result->fetch_assoc();
	$json_file_name = $row["file_name"];
	$ServiceNumber = $row["ServiceNumber"];
	$init_file_id = $row["init_file_id"];
	

	
} else {
    echo "The file requested its not available";
}
$conn->close();
//
$data = file_get_contents("../init/approvedfiles/".$json_file_name);
$current_year = date("Y");
$data = json_decode($data);
$json_length = count($data->Pensioners);
$error = 0;
$user = new User;
for($i=0;$i<$json_length;$i++){
	

$user->setfName($data->Pensioners[$i]->firstName);
$user->setlName($data->Pensioners[$i]->lastName);
$user->setSsn($data->Pensioners[$i]->ssn);
$user->setNrc($data->Pensioners[$i]->nrc);
$user->setSex($data->Pensioners[$i]->sex);
$text_line = explode("/",$data->Pensioners[$i]->dob);
$user->setdob($text_line[2]);
$user->setAmount($data->Pensioners[$i]->amount);
$user->setBankName($data->Pensioners[$i]->bankName);
$user->setbankBranchName($data->Pensioners[$i]->bankBranchName);
$user->setAccountNumber($data->Pensioners[$i]->acc);

?>
              		<tr>
                        <td><?php echo $user->getfName(); ?></td>
                        <td><?php echo $user->getlName(); ?></td>
                        <td><?php echo $user->getAccountNumber(); ?></td>
                         <td><?php echo $user->getSex(); ?></td>
                        <?php

						 $age = $current_year-$user->getdob();
						 
						 if($age<=65){
							 $error++;
							 echo "<td style='background-color:red'>$age</td>"; 
						 }
						 else{
							 echo "<td style='background-color:green'>$age</td>";  
						 }
						 
						 if($i>$json_length-2){
							 if($error==0){
								 echo "<blockquote>This File is Validated! ";
								 echo "<a href='alert.php?id=accept&file_id=$id'><button type='button' class='btn btn-success'> ACCEPT</button></a></blockquote>";
							 }
							 else{
								 echo "<blockquote>This files contains errors. The error its hightlighted in red ";
								 echo "<a href='alert.php?id=decline&file_id=$id'><button type='button' class='btn btn-danger'>DECLINE</button></a></blockquote>";
							 }
						 }
						 
						 ?>
                        <td><?php echo $user->getbankName(); ?></td>
                        <td><?php echo $user->getbankBranchName(); ?></td>
                        <td><?php echo $user->getAmount(); ?></td>
                    </tr>
<?php } ?>
     </tbody>
            </table>   
		</div>
	</div>
</div>
<script   src="https://code.jquery.com/jquery-3.1.0.min.js"   integrity="sha256-cCueBR6CsyA4/9szpPfrX3s49M9vUU5BgtiJj06wt/s="   crossorigin="anonymous"></script>
<script type="text/javascript">
	$(document).ready(function() {
    var activeSystemClass = $('.list-group-item.active');

    //something is entered in search form
    $('#system-search').keyup( function() {
       var that = this;
        // affect all table rows on in systems table
        var tableBody = $('.table-list-search tbody');
        var tableRowsClass = $('.table-list-search tbody tr');
        $('.search-sf').remove();
        tableRowsClass.each( function(i, val) {
        
            //Lower text for case insensitive
            var rowText = $(val).text().toLowerCase();
            var inputText = $(that).val().toLowerCase();
            if(inputText != '')
            {
                $('.search-query-sf').remove();
                tableBody.prepend('<tr class="search-query-sf"><td colspan="6"><strong>Searching for: "'
                    + $(that).val()
                    + '"</strong></td></tr>');
            }
            else
            {
                $('.search-query-sf').remove();
            }

            if( rowText.indexOf( inputText ) == -1 )
            {
                //hide rows
                tableRowsClass.eq(i).hide();
                
            }
            else
            {
                $('.search-sf').remove();
                tableRowsClass.eq(i).show();
            }
        });
        //all tr elements are hidden
        if(tableRowsClass.children(':visible').length == 0)
        {
            tableBody.append('<tr class="search-sf"><td class="text-muted" colspan="6">No entries found.</td></tr>');
        }
    });
});
</script>

