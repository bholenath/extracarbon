<?php
$hostname="204.93.216.11";
$username="aki007_root";
$password="12345";
$conn=mysql_connect("$hostname","$username","$password");
if($conn)
	mysql_select_db('aki007_dealkart',$conn) or die("can't select database");
?>
