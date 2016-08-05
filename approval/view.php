<html>
<head>
 <meta name="description" content="Amavuvuzela">
    <meta name="author" content="Amavuvuzela">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">

    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

</head>
<?php
include "../user.class.php";
include "../db/db.php";
//
$id = $_GET['init_file_id'];
$sql = "SELECT*FROM init_file INNER JOIN init USING(init_id)  WHERE init_file.init_file_id = '$id'";
$result = $conn->query($sql); 
if ($result->num_rows > 0) {
	
	
    $row = $result->fetch_assoc();
	$json_file_name = $row["file_name"];
	$init_id = $row["init_id"];
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

<p>First Name : <?php echo $user->getfName(); ?></p>
<p>Last Name : <?php echo $user->getlName(); ?></p>
<p>Account Number : <?php echo $user->getAccountNumber(); ?></p>
<p>Bank Name : <?php echo $user->getbankName(); ?></p>
<p>Bank Branch Name : <?php echo $user->getbankBranchName(); ?></p>
<p>Amount : <?php echo $user->getAmount(); ?></p>
<p> Sex : <?php echo $user->getSex(); ?></p>
<p> age : <?php

 $age = $current_year-$user->getdob();
 
 if($age<=65){
	 $error++;
	 echo "<div style='background-color:red'>$age</div>"; 
 }
 else{
	 echo "<div style='background-color:green'>$age</div>";  
 }
 
 if($i>$json_length-2){
	 if($error==0){
		 echo "This file is error free you can click the button to approve";
		 echo "<a href='alert.php?id=accept&file_id=$id'><button type='button' class='btn btn-success'>Accept</button></a>";
	 }
	 else{
		 echo "This files contains errors. The error its hightlighted in red";
		 echo "<a href='alert.php?id=decline&file_id=$id'><button type='button' class='btn btn-danger'>decline</button></a>";
	 }
 }
 
 ?></p>

<?php } ?>



