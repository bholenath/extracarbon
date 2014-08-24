<link href="<?php echo base_url()?>assets/css/contact.css" type="text/css" rel="stylesheet"/>

<script type="text/javascript">

$(document).ready(function()
{
	/*$("#partner").change(function()
	{
	
		var loc = $(this).val();
		
		var url ="http://www."+loc;
		if(loc!=='')
			window.open(url);		
	});*/
	
	var deal = "dealkart.extracarbon.com?amount=<?php echo $amount->amount?>&id=<?php echo $this->session->userdata('username')?>";
	
	$("#dealkart").click(function()
	{
	window.open("http://"+deal);	
	});
	
	$("#dealkart").hover(function()
	{
	$(this).css({ 'text-decoration' : 'underline' });	
	},function()
	{	
	$(this).css({ 'text-decoration' : 'none' });	
	});
	
});

</script>

<div id="dashboard_container">

	<div id="sidebar">
	
		<?php 
		echo $menu;
		?>
	</div>
	
	<div id="content_div">
				
		<div id="erp_div">
		
			<div id="step_hd"> 
				<b> Redeem Points </b>
				<p> You can Redeem you points with any partner website. </p>
			</div>
		
			<div class="formtitle">
				Points can't be redeemed individually, you can redeem points based on total.
			</div>		
			
		
			<div id="point">			
			
				<table border="0" class="tab1">
					<tr>
						<th colspan="3" class="big left">Your Point Details</th>
					</tr>					
					
					<tr>
						<td>Your Total Points Earned by Metro Section :</td>
						<td><b><?php echo $metro_total->metro_point?> </b></td>
						<td>
							<a href="<?php echo base_url()?>showpoint/metro">
								<button class="greybutton1" id="metro_btn">Details</button>
							</a>
						</td>
					</tr>					
					
					<tr>
						<td>Your Total Points Earned by Waste-Pick Section :</td>
						<td> <b><?php echo $waste_total?> </b></td>
						<td>
							<a href="<?php echo base_url()?>showpoint/waste_pick">
								<button class="greybutton1" id="waste_btn">Details</button>
							</a>
						</td>
						
					</tr>
					
					<tr>
						<td>Your Total Points Earned by Coupons Section :</td>
						<td> <b><?php echo $coupon_total?> </b></td>
						<td>
							<a href="<?php echo base_url()?>showpoint/coupon">
								<button class="greybutton1" id="coupon_btn">Details</button>
							</a>
						</td>
						
					</tr>					
					
					<tr>
						<td>Total Points :</td>
						
					<!--<td> <b ><?php //echo ($waste_total+$metro_total->metro_point)?> </b></td>-->
						<td> <b><?php echo($waste_total+$metro_total->metro_point+$coupon_total) ?> </b></td>
						
						<td></td>
					</tr>
					
					<tr>
						<td>Coupon Code :</td>
						
						<td> <b><?php echo (!empty($code)?$code->coupon_code:'No Coupon Generated Yet')?> </b></td>
						
						<td> <b style="background:rgba(200, 0, 0, .8); padding:5px; border-radius:2px; color:#fff; "><?php echo 
						(!empty($amount)?'Rs. '.$amount->amount:'Your money is blow Rs.100.')?> </b> </td>
						
					</tr>
					
					<?php if(!empty($code)):?>
					<tr>
						<td>Redeem it with :</td>
						
						<td>
						<!--
							<select id="partner">
								<option value="">Choose Website</option>
								<option value="cosmeticstab.com">Cosmeticatab.com</option>
					
								<option value="egiftzone.com">Egiftzone.com</option>
							</select>
							-->
							
							<h2><span id="dealkart" style="color:#0000FF; cursor:pointer;">You can redeem your points with Dealkart
							</span></h2>
							<?php //echo (!empty($amount)?'Rs. '.$amount->amount:'Your money is blow Rs.100.')?>

						</td>
						
						<td></td>
						
					</tr>
					
					<?php endif;?>
					
				</table>					

				<!--<div style="margin: 10px 0; text-align:center;">
				
					<iframe src='http://www.flipkart.com/affiliate/displayWidget?affrid=WRID-136903114147982497' height=55px; 
					width=600px; scrolling:='no' marginwidth='0' marginheight='0' frameborder='0'/>			
				</div>-->
			
			</div>
			
			<?php //echo $pagination ?>
			
		</div>		
		
	</div>
	
</div>

<div id="back_div"></div>
<div id="ticket_div"></div>