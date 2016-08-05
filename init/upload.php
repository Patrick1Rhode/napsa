<?php
if(!isset($_COOKIE['init_id'])) {
	header("location : index.php");
}
?>
<!DOCTYPE html>
<html>
<body>
<?php
echo "<h1> hello mr ".$_COOKIE['init_name'];
?>
<form action="handle.php" method="post" enctype="multipart/form-data">
    Select image to upload:
    <input type="file" name="fileToUpload" id="fileToUpload">
    <input type="submit" value="Upload The File" name="submit">
</form>

</body>
</html>