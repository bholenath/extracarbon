<?php
ob_start();
include('connection.php');
include('contain.php');

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

?>

<script src="http://code.jquery.com/jquery-1.10.2.js"></script>
<script src="http://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<link href="css/main.css" rel="stylesheet" type="text/css"/>


<script type="text/javascript">
	$(document).ready(function()
	{
		$("#outer a").click(function() 
		{
			var index = $("#outer a").index(this);
			$("#content").stop().animate({marginTop:-index*200+"px"});
			$("#outer a").css("background","none");
			$(this).css("background-image","url(images/tag.png)");
		});
	});
</script>


<?php

date_default_timezone_set("Asia/Calcutta");	
$today = date('Y-m-d');
$tot 	= 0;
$qry	= " select * from tbl_cart, tbl_product where 
				tbl_cart.pd_id=tbl_product.pd_id and 
				tbl_cart.user_id='$ud' and 
				tbl_cart.date='$today'";

$rs		= mysql_query($qry);

if(mysql_num_rows($rs))
{
	while($row = mysql_fetch_array($rs))
	{
		$tot +=$row['ct_cost'];
	}
}

?>



<div id="outer">
    <a href="#1">Cash on Delivery</a>
    <a href="#2">Paypal</a>
    <a href="#3">Debit Card</a>
    <a href="#4">Credit Card</a>
</div>

<div id="container">

    <div id="content">
        <div >
			<b>Pay using Cash on Delivery</b>
			<hr>
			<b>Amout Payable on Delivery: Rs.&nbsp;<span style="color:maroon"> <?php echo ($tot<200)?$tot+30:$tot?></span>
			<br><br>
			Cash on Delivery Order Confirmation :&nbsp;
			</b>
			<a href="pay_option.php?cord=ord&udd=<?php echo $_SESSION['u_mail']?>" style="text-decoration:underline; color:#c41200; 
			font-weight:bolder; font-size:20px;">Click to Confirm</a>
				
			</form>
		</div>
		
        <div >
			<b>Paypal</b>
			<br />Not Added Yet.
		</div>

        <div >
			<b>Debit Card</b>
			<br />Not Added Yet.
		</div>
		
        <div >
			<b>Credit Card</b>
			<br />Not Added Yet.
		</div>
    </div>
	
</div>

<?php
	ob_flush();
?>