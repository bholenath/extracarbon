<?php
ob_start();
include('header.php');
include('connection.php');
include('functions.php');

if(!isset($_SESSION))
{
	@session_start();
}

@$action = $_POST['action'];
@$pid = intval($_POST['pid']);
//@$size = ($_GET['size']>3)?$_GET['size']:null;
date_default_timezone_set("Asia/Calcutta");	
$today = date('Y-m-d');

$tota=0;

if(isset($_SESSION['id']))
{
	$ud = $_SESSION['id'];
}
else
{
	$ud = session_id();
}
						
if(isset($action) && $action=='add')
{
	$result1 = mysql_query("select * from tbl_product where pd_id='$pid'") or die(mysql_error());
	
	if(mysql_num_rows($result1))
	{
		$row = mysql_fetch_array($result1);
		
		$q = "select * from tbl_cart where pd_id='$pid' and user_id='$ud' and date='$today'";
		$r = mysql_query($q) or die(mysql_error());		
		
		$total = ($row['pd_price']-$row['discount']);
		
		if(mysql_num_rows($r))
		{
			$q1 = "	update tbl_cart set num_pd=`num_pd`+1, ct_cost=`ct_cost`+$total 
					where pd_id='$pid' and user_id='$ud' and date='$today'";
			$rs = mysql_query($q1) or die(mysql_error());
			$data = "Item added Successfully. Continue Shopping.";
			echo $data;
		}
		else 
		{
			$total = ($row['pd_price']-$row['discount']);
			$result = mysql_query(" insert into tbl_cart(user_id,pd_id,num_pd,ct_cost,date) 
									values('$ud','$pid','1','$total','$today') ") or die(mysql_error());
			$data = "Item added Successfully. Continue Shopping.";
			echo $data;
		}
	}
}

/*$tot = array();

if(isset($_SESSION['id']))
{
	$qry = "select * from tbl_cart, tbl_product where 
			tbl_cart.pd_id=tbl_product.pd_id and 
			tbl_cart.user_id='$_SESSION[id]' and 
			tbl_cart.date='$today'";
}
else
	$qry = "select * from tbl_cart, tbl_product where 
			tbl_cart.pd_id=tbl_product.pd_id  and 
			tbl_cart.user_id='$ud' and 
			tbl_cart.date='$today'"; 

$rslt = mysql_query($qry) or die(mysql_error());

?>	
	
<div id="cart_cont">

	<div id="cls_btn">
		<img src="images/close.png" height="20px" title="close">
	</div>
	
	<div class="tabdiv">
	
		<form name="cart" method="POST" action="update_cart.php" id="cart_frm">
		
			<table border="1" cellspacing="0" cellpadding="2" align='center' width="600" class="cartstl">
			
				<tr><th colspan="7" >Cart Details</th></tr>
				
				<tr>
					<th>Product Image</th><th >Product</th><th>Price</th>
					<th>Quantity</th><th >Total Amount</th><th>Delete</th>
				</tr>
				<?php
				$pd = mysql_num_rows($rslt);
				if(mysql_num_rows($rslt))
				{
					while($row = mysql_fetch_array($rslt))
					{		
					?>			
						<tr >
							<td>
								<?php
									$pic = $row['pd_image'];
									$pic = explode(', ',$pic);
									
									echo '<img src="images/products/'.$pic[0].'" height="50px width="50px" >';										
								?>
			
							</td>
							
							<td width="400px">
								<b><?php echo $row['pd_name'] .(($row['size']>3)?' - '. $row['size']:'');?></b>
							</td>
							
							<td width="100px" style="text-align:center">
								<b><?php echo $row['pd_price']-(($row['pd_price']*$row['discount'])/100); ?></b>
							</td>
							
							<td width="100px" style="text-align:center">
								
								<input type="hidden" name="pdid[]" value="<?php echo $row['pd_id']?>" >
								<input type="hidden" name="size[]" value="<?php echo $row['size']?>" >
								<input type="text" name="pqt[]" class="qqt" value="<?php echo $row['num_pd'];?>" >
								<input type="hidden" name="ppr[]" value="<?php echo $row['pd_price']?>">

							</td>
							
							<td width="100px">
								<input type='text' name='tot' style="font-weight:bold; border:0; background:none; text-align:center; font-size:15px;" value = "<?php echo $row['ct_cost'] ?>" readonly>
								
								<?php $tota += $row['ct_cost']; ?>
								
							</td>

							<td align="center" class="del_itm">
								<img src='images/del.png' height='30' title="Delete Item" id="<?php echo $row['pd_id']?>&size=<?php echo $row['size']?>">
								
							</td>
							
						</tr>
						
					<?php 
					}
				}
				
				if($pd<=0)
				{
					echo "<tr>
							<th colspan='6'>Cart is Empty. <a href='index.php'>Shop Now</a></th>
						</tr>";
				}
				else
				{
				?>
					<tr>
						<td colspan="6" align="right">
							<input type='submit' name='submit' value='Update Cart' class="upcart" >
						</td>
					</tr>
					
					<tr >
						<th colspan="2" align="right" >
						
							<div > 
								Shipping Charges: Rs.30 
								<br><small>(below amount of Rs. 200) </small> 
							</div>
							<div > Your total amount payble is Rs.<?php  echo ($tota<200)?$tota+30:$tota; ?></div>		
								
							
						</th>
						
						<th colspan="4" align="right" width="400px">
						
							<a href='user_email.php' class="btn">Proceed to Checkout</a>
							<a href='index.php' class="btn2" >Continue Shopping</a>
						</th>
						
					</tr>
				<?php 
				} 
				?>
			</table>
		</form>
	</div>
</div>
*/

ob_flush(); ?>