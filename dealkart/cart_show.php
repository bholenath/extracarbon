<?php
ob_start();
include('header.php');
?>
<script type="text/javascript" src="js/jquery.numeric.js"></script>

<script type="text/javascript">

	$(document).ready(function () 
	{
		$(".qqt").numeric();
		$(".qqt").change(function()
		{
			var val = $(this).val();
			if(val>10)
			{
				alert("You can buy only up to 10 items at Once");
				$(this).val(10);
			}
		});
		
	});


	$(document).ready(function()
	{
		
		$(".del_itm").click(function()
		{
			
			var itmid = $(this).attr("id");
			
			$.ajax({
			type:'get',
			url:'del_item.php',
			data:'pid='+itmid,
			success:function(html)
			{	
				$("#cartdiv").html(html);
				window.location.reload(true);
			}
			});
			
		});
			
		$("#cart_frm").submit(function()
		{
			$.ajax({
			url:'.',
			success:function(html)
			{	
				$("#cartdiv").html(html);
			}			
			});
			
		});		
				
	});
	
	/*function quant_change(no,i)
	{
	var price = $("#ppr"+i).val();
	var tot_price = $("#total"+i).val();
	var total = price * no;
	var final = total;	
	$("#total"+i).val("Rs.&nbsp;&nbsp;"+final) = "Rs.&nbsp;&nbsp;"+final;
	var final_price = $("#final_price").val();
	var fi_pr = final_price + (final - tot_price);
	$("#final_price").val() = "Your total amount payable is Rs.&nbsp;&nbsp;"+fi_pr;
	}*/
	
</script>

<div id="cart_show">

	<?php

	if(!isset($_SESSION))
	{
		@session_start();
	}

	//@$action 	= $_GET['action'];
	//@$pid 		= $_GET['id'];
	date_default_timezone_set("Asia/Calcutta");	
	$today		= date('Y-m-d');

	include('connection.php');
	$tota = 0;
	
	if(isset($_SESSION['id']))
	{
		$ud = $_SESSION['id'];
		$qry = "select * from tbl_cart, tbl_product where 
				tbl_cart.pd_id=tbl_product.pd_id and 
				tbl_cart.user_id='$ud' and 
				tbl_cart.date='$today'";
	}
	else
	{
		$ud = session_id();
		$qry = "select * from tbl_cart, tbl_product where 
				tbl_cart.pd_id=tbl_product.pd_id and 
				tbl_cart.user_id='$ud' and 
				tbl_cart.date='$today'"; 
	}
	
	$rslt=mysql_query($qry) or die(mysql_error());	
	
	/*if(isset($action) && $action=='add')
	{
		$result1=mysql_query("select * from tbl_product where pd_id='$pid' ") or die(mysql_error());
		
		if(mysql_num_rows($result1))
		{
			$row = mysql_fetch_array($result1);
			
			$q = "select * from tbl_cart where pd_id='$pid' and user_id='$ud'";
			$r = mysql_query($q) or die(mysql_error());
			
			$total = $row['pd_price']-(($row['pd_price']*$row['discount'])/100);
			
			
			if(mysql_num_rows($r))
			{
				$q1	=	"update tbl_cart set num_pd=`num_pd`+1, ct_cost=`ct_cost`+$total 
						 where pd_id='$pid' and user_id='$ud' and size='$size'";
				
				$rs = mysql_query($q1) or die(mysql_error());
			}
			else 
			{
				$result = mysql_query("	insert into tbl_cart(user_id,pd_id,num_pd, ct_cost,date) 
										values('$ud','$pid','1','$total','$today')"
									) 
									or die(mysql_error());
				
			}
		}
	}


	$tot = array();


	if(isset($_SESSION['id']))
	{
		$qry = "select * from tbl_cart, tbl_product where 
				tbl_cart.pd_id=tbl_product.pd_id and 
				tbl_cart.user_id='$_SESSION[id]' and 
				tbl_cart.date='$today'";
	}
	else
		$qry = "select * from tbl_cart, tbl_product where 
				tbl_cart.pd_id=tbl_product.pd_id and 
				tbl_cart.user_id='$ud' and 
				tbl_cart.date='$today'"; 

	$rslt=mysql_query($qry) or die(mysql_error());
	*/	
	?>	
	<div class="tabdiv">
	
		<form name="cart" method="POST" action="update_cart.php" id="cart_frm">
		
			<table border="0" cellspacing="1" cellpadding="5" align='center' width="850" class="cartstl">
			
					<tr><th colspan="7">Cart Details</th></tr>
					
				<tr >
					<th>Product Image</th><th >Product</th><th>Price</th>
					<th>Quantity</th><th >Total Amount</th><th>Delete</th>
				</tr>
				<?php
			
				$pd = mysql_num_rows($rslt);
			
				if(mysql_num_rows($rslt))
				{
						while($row = mysql_fetch_array($rslt))
					{		
					$i = 0;
				?>			
					<tr align="center">
						<td>
							<?php
									$pic = $row['pd_image'];
									$pic = explode(', ',$pic);
									
									echo '<img src="images/products/'.$pic[0].'" height="80px" >';										
								?>
						</td>
						
						<td width="400px">
								<b><?php echo $row['pd_name'] .(($row['size']>3)?' - '. $row['size']:'');?></b>
						</td>
						
						<td width="100px">
							<b>Rs.&nbsp;<?php echo $row['pd_price']-$row['discount']; ?></b>
						</td>
						
						<td width="100px">
							
							<input type="hidden" name="pdid[]" value="<?php echo $row['pd_id']?>"  >
							<!-- <input type="hidden" name="size[]" value="<?php //echo $row['size']?>"  > -->
							<input type="text" name="pqt[]" class="qqt" value="<?php echo $row['num_pd'];?>" > 							
							<input type="hidden" name="ppr[]" value="<?php echo ($row['pd_price']-$row['discount'])?>">

						</td>
						
						<td width="100px">
							<input type='text' name='tot' style="font-weight:bold; border:0; background:none; text-align:center; 
							font-size:15px;" value = "Rs.&nbsp;<?php echo $t = number_format((($row['pd_price']-$row['discount'])
							*$row['num_pd']),2); ?>" readonly="readonly" >
							
							<?php $tota +=$t; ?>
							
						</td>

						<td align="center" >
						
							<img src='images/del.png' height='30' title="Delete Item" id="<?php echo $row['pd_id']?>" class="del_itm" 
							style="cursor:pointer;">
							
						</td>
						
					</tr>
				<?php 
				$i++;
					}
				}
				if($pd<=0)
				{
					echo "<tr>
							<th colspan='6' style='height:50px;'>
								Your Cart is Empty <a href='index.php' id='s_now'>Shop Now</a>
							</th>
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
						<th  colspan="2" align="right">
						
							<div> Shipping Charges: Rs.30 <small>(below amount of Rs. 200) </small> </div>
							<div> Your total amount payable is Rs.&nbsp;<?php echo ($tota<200)
							?number_format($tota+30,2):number_format($tota,2);?></div>	
							
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


<?php
ob_flush();
include('footer.php');
?>