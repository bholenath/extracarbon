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

$tot = array();

if(isset($_POST['submit']))
{	
	$pid	= $_POST['pdid'];
	$pqt	= $_POST['pqt'];
	$prc	= $_POST['ppr'];
	//$size	= $_POST['size'];
	
	for($i=0;$i<count($pid);$i++)
	{
		$tot[$i] = $pqt[$i]*$prc[$i];
		
		$query	= "	update tbl_cart set num_pd='$pqt[$i]', ct_cost='$tot[$i]' 
					where pd_id='$pid[$i]' and user_id='$ud' and date='$today' ";
	
		$result = mysql_query($query) or die(mysql_error());
	}
	
//header('location:'.$_SERVER['HTTP_REFERER']);
header('location: cart_show.php');
//header('location:show_cart.php');
}
