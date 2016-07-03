<?php

//---------include files-----------------------
ob_start();
require_once "Mail.php";
include('connection.php');
include('contain.php');

?>

<style type="text/css">
	.cong{
		font-size:25px;
		font-weight:bold;
		font-family:Arial;
		margin:50px;
	}
</style>

<?php


//-------smtp details-------------

$host 		= "";
$username 	= "";
$password 	= "";


if(!isset($_SESSION))
{
	session_start();
}
if(isset($_SESSION['id']))
{
	$ud = $_SESSION['id'];
}
else
{
	$ud = session_id();
}



//-------get url-----------

@$m_id 	= $_GET['udd'];
@$cod	= $_GET['cord'];
@$umail	= base64_encode($_SESSION['u_mail']);
//@$u_m 	= base64_decode($m_id);
date_default_timezone_set("Asia/Calcutta");	
@$today = date('Y-m-d');

$from 	= "xyz@gmail.com";

if(isset($m_id))
{
	
	$up = mysql_query(" update tbl_order_detail set confirm_order='yes' 
						where s_id in (select s_id from user_login 
						where user_email='$m_id') ") or die(mysql_error());
					
	if($up)
	{
		echo "<br><div class='cong'>Order is placed, thank you to shopping with us.</div>";
	}
	else
		echo "Order could not be confirmed due to some problem, please try again";
}

if(isset($cod))
{

//------cart and user info to send via mail------------

	$pd_name	= '';

	$pd_image	= '';

	$pd_qty		= '';

	$pd_prc		= '';

	$pd = mysql_query(" select * from tbl_cart, tbl_product, user_login 
						where tbl_cart.user_id=user_login.s_id and 
						user_login.user_email='$_SESSION[u_mail]' and 
						tbl_product.pd_id=tbl_cart.pd_id and 
						tbl_cart.date='$today'"
					) or die(mysql_error());

	if(mysql_num_rows($pd))
	{
		while($row= mysql_fetch_array($pd))
		{
			$pd_name .=$row['pd_name'].",";
			$pd_image .= "<img src='http://retailbazar.in/images/mobile_phones/$row[pd_image]' height='70' >".",";
			$pd_qty .=$row['num_pd'].",";
			$pd_prc .=$row['ct_cost'].",";
		}
	}
	
	$pd_name1	= explode(",",$pd_name);
	$pd_image1	= explode(",",$pd_image);
	$pd_qty1 	= explode(",",$pd_qty);
	$pd_prc1 	= explode(",",$pd_prc);
	
	$to			= '';
	$u_name		= '';
	$body 		= '';
	$subject	= 'Order Confirmation from DealKart';

	$getuserinfo = mysql_query("select * from user_login, tbl_shipping_detail 
								where user_login.s_id=tbl_shipping_detail.s_id and 
								user_login.user_email='$_SESSION[u_mail]' and 
								user_login.s_id='$ud'"
							) or die(mysql_error()); 

	if(mysql_num_rows($getuserinfo))
	{

		$row		=	mysql_fetch_array($getuserinfo);
		$header		=	"MIME-Version: 1.0\r\n";
		$header		.=	"Content-type:text/html; charset:ISO-8859-1\r\n";
		$header		.=	"From:<DealKart>";
		$to			=	$row['user_email'];
		$pass		=	$row['user_pass'];
		$u_name		= 	ucfirst($row['fname']);

		$body = "<html><body>
		<table cellspacing='10px' cellpadding='10px' rules='all' width='650' style='margin:20px; background:#99CCFF ;'' border='1'>
		<tr style='background:#99CCFF ;'><td colspan='4'><h1 >Dear, $u_name </h1></td></tr>
		<tr style='background:#99CCFF ;'><td colspan='4'>You are registered with DealKart your login username is <b>$to</b> and 
		password is <b>$pass</b>. </td></tr>";
		$body .="<tr style='background:#99CCFF ;'><th>Name </th><th>Image</th><th>Quantity</th><th>Price</th></tr>";


		for($i=0;$i<count($pd_name1)-1;$i++)
		{
			$body .="<tr style='background:#99CCFF ;'><th>$pd_name1[$i]</th>";
			$body .="<th>$pd_image1[$i]</td></th>";
			$body .="<th>$pd_qty1[$i]</td></th>";
			$body .="<th>$pd_prc1[$i]</td></th></tr>";
		}


		$body .="
		<tr ><td colspan='4'>
			<h5>Please click on following link <br>
			<b><a href='http://dealkart.extracarbon.com/pay_option.php?udd=$umail&con=y'>
			http://dealkart.extracarbon.com/pay_option.php?udd=$umail&con=y</a></b><br>
			to confirm order</h5></td></tr>
			<tr style='background:#99CCFF ;'><td colspan='4'>
		<h3>Thank You for shopping with us. </h3></td></tr>
			<tr ><td colspan='4'><img src='http://retailbazar.in/images/RB.png' alt='retailbazar'></td></tr></table></body></html>";

	}


	$headers = array ('MIME-Version'=>'1.0',
	'Content-type'=>'text/html; charset:ISO-8859-1',
	'From' => $from,
	'To' => $to,
	'Subject' => $subject);
	
	$smtp = Mail::factory('smtp',
	array ('host' => $host,
	'auth' => true,
	'username' => $username,
	'password' => $password));
		
	
		
		
	//-----------------------------------insert data in order detail--------------
	
	$dt = date('Y/m/d h:m:s');
	$rs = mysql_query("insert into tbl_order_detail(s_id, u_mail, date_time, cofirm_order) values('$ud','$m_id','$dt','yes')") 
	or die(mysql_error());

	if($rs)
	{
		
/*		$mail = $smtp->send($to, $headers, $body);
		
		if (PEAR::isError($mail)) 
		{
			echo("<p>" . $mail->getMessage() . "</p>");
		} 
		else 
		{
			echo "<div id='backgrr'></div>";
			echo "<div id='img-ctt'>An Email has been sent to your email-id please check email to confirm order.</div>";
			echo "<a href='index.php'><div id='k'>Ok</div></a>"; 
		}
*/		
		session_unset();
		session_regenerate_id();
	}
	else
		echo "some problem occured";
	
	echo "	<br><div class='cong'>Order is placed, thank you for shopping with us.</div>
			<br> To go back Please Click on <a href='index.php' style='text-decoration:underline; color:#c41200; 
			font-weight:bolder; font-size:20px;'>Home</a>";
	
}
ob_flush();
?>
