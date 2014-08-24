<?php
include('header.php');
if(!isset($_SESSION))
{
	@session_start();
}

if(isset($_SESSION['id']))
{
	$ud = $_SESSION['id'];
}
else
{
	$ud = session_id();
}

date_default_timezone_set("Asia/Calcutta");	
$today = date('Y-m-d');

include('connection.php');

$pid	= $_GET['pid'];
//$size 	= $_GET['size'];

$query	= "delete from tbl_cart where pd_id='$pid' and user_id='$ud' and date='$today' ";
$result	= mysql_query($query) or die(mysql_error());

if($result)
{
header('location: cart_show.php');	
}
?>