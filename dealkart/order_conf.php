<?php
ob_start();
include('connection.php');
include('contain.php');

//------------------------------------cart details------------------------------------------------//

if(!isset($_SESSION))
{
	@session_start();
}

date_default_timezone_set("Asia/Calcutta");	
$today = date('Y-m-d');

if(isset($_SESSION['id']))
{
	$ud		= $_SESSION['id'];
	
	$qry	= " select * from tbl_cart, tbl_product where 
				tbl_cart.pd_id=tbl_product.pd_id and 
				tbl_cart.user_id='$ud' and 
				tbl_cart.date='$today'";
}
else
{
	$ud		= session_id();
	
	$qry	= " select * from tbl_cart, tbl_product where 
				tbl_cart.pd_id=tbl_product.pd_id and 
				tbl_cart.user_id='$ud' and 
				tbl_cart.date='$today'";
}

$rslt = mysql_query($qry) or die(mysql_error());

?>



<link href="css/main.css" rel="stylesheet" type="text/css"/>



<div id="order_div" >

	<div class="tbl">
	
		<table border="0" cellspacing="0" cellpadding="5" align='center'>
		
			<tr><th colspan="7" >Cart Details</th></tr>

			<tr >
				<th >Product</th><th>Price</th><th>Quantity</th><th >Total Amount</th>
			</tr>
			
			<?php
			
			if(mysql_num_rows($rslt))
			{
				while($row=mysql_fetch_array($rslt))
				{		
			?>			
				<tr align="center">
					<th width="200px">
						<b><?php echo $row['pd_name'] ?></b>
					</th>
					<td style="">
						<?php echo $t = ($row['pd_price']-(($row['pd_price']*$row['discount'])/100)) ?>
					</td>
					<td>
						<?php echo $row['num_pd'] ?><br>
					</td>
					<td align="right">
						<?php echo $ttl = $t*$row['num_pd'] ?>						
					</td>
					<?php $tota +=$ttl; ?>
				</tr >
			<?php 
				}
			   
			}
			?>
			
			<tr>
				<th  align="left" colspan=3>
				
					<?php 
					echo ($tota<200)?'Shipping Charges: Rs.30':'No shipping charges'; 
					?>
				</th>
				
					<td align="right"><b><?php echo ($tota<200)?$tota+30:$tota; ?></b></td>
				</td>
				
			</tr>
			
			<tr>
				<td colspan=4>
					<a href="cart_show.php" >Manage Cart</a>
				</td>
			</tr>
			
		</table>
	</div>
	
	
	
<!--------------------------------cart info ends here------------------------------------------------------------
	
										AND
										
										
--------------------------------shipping info start--------------------------------------------------------------->



	<?php

	$qry	= "select * from tbl_shipping_detail where s_id='$ud' order by id desc limit 1 ";
	$rslt	= mysql_query($qry) or die(mysql_error());

	?>
	<div id="cont1">
		<div class="tbl1" >
			<table border="0" cellspacing="0" cellpadding="5" align='center'  >
				<th colspan=2 >Shipping Details</th>
				<?php
				if(mysql_num_rows($rslt))
				{
					while($row=mysql_fetch_array($rslt))
					{
					?>		
						<tr>
							<th align='right'>First Name:</th>
							<td><?php echo $row['fname']?></td>
						</tr>
						
						<tr>
							<th align='right'>Last Name:</th>
							<td><?php echo $row['lname']?></td>
						</tr>
						
						<tr>
							<th align='right'>Email:</th>
							<td><?php echo $row['email']?></td>
							<?php
							if(isset($_SESSION['u_mail']))
							{
							$mail = $_SESSION['u_mail'];		
							}
							else							
							$_SESSION['u_mail'] = $row['email'];							
							?>
						</tr>
						
						<tr>
							<th align='right' width="100px">Address:</th>
							<td width="200px"><?php echo $row['address']?></td>
						</tr>
						
						<tr>
							<th align='right'>Phone:</th>
							<td><?php echo $row['phone']?></td>
						</tr>
						
						<tr>
							<th align='right'>City:</th>
							<td><?php echo $row['city']?></td>
						</tr>
						
						<tr>
							<th align='right'>State:</th>
							<td><?php echo $row['state']?></td>
						</tr>
						
						<tr>
							<th align='right'>Pin Code:</th>
							<td><?php echo $row['zcode']?></td>
						</tr>
					
					<?php
					}
				}
				?>	
				<tr>
					<td colspan="2" ><a href='bill_detail.php' style="color:#fff;"><b>Edit Details</b></a></td>
				</tr>

			</table>
		
		</div>
	
	</div>

	
	<div  >
	 
		<a class="btn1" href='pay_gate.php?cord=ord' style="text-decoration:none;">Proceed to Payment </a>
		
	</div>

</div>

<?php
	ob_flush();
?>
