<?php
ob_start();
include('header.php');
include("connection.php");

if(isset($_POST['submit']))
{           
	$email = $_POST['email'];
	$password = $_POST['password'];
	$name = $_POST['name'];
	$gender = $_POST['gender'];
	$query="insert into tbl_user(user_name,email,password,gender) values('$name','$email','$password','$gender') ";
	$result=mysql_query($query) or die(mysql_error());
	if($result === true)
	{		
		header("location:index.php?success=yes");
	}
	else
		header("location:index.php?success=no");
}
ob_flush();
?>