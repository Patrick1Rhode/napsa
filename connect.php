<?php
$mysql_host="localhost";
$mysql_database ="napsa";
$mysql_user="root";
$mysql_password='';



//database connection
$dbcon=mysql_connect($mysql_host,$mysql_user,$mysql_password) or die(mysql_error());
$dbselect=mysql_select_db($mysql_database) or die(mysql_error());
///end of ????????????



















?>
