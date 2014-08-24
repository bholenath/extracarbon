<link href="<?php echo base_url()?>assets/css/contact.css" type="text/css" rel="stylesheet"/>

<script type="text/javascript">

$(document).ready(function()
{
	
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
				<b> Coupon Details</b>
				<p> Here you can see details of your coupons. </p>
			</div>
		<?php
			$sum	= 0;
			$last	= 0;
			
			if(isset($details) && !empty($details)):
				for($i=0; $i<count($details); $i++)
				{
					
					$sum += $details[$i]->amount;
					$last = $details[$i]->amount;
				}
				$sum = $sum-$last;
		?>
				<div class="formtitle">
					You have used <?php echo (count($details)-1);?> coupons of worth Rs. <?php echo $sum ?> so far. You have new Coupon worth Rs. <?php echo $last ?> left. <a href="<?php echo base_url()?>redeempoints">Redeem it now</a>
				</div>
		<?php 
			else:
		?>
				<div class="formtitle">
					You have No coupon yet.
				</div>
		<?php	
			endif;	
		?>
			
		
		
		
			<div id="point">
			
			
				<table border="0" class="tab1">
					<tr>
						<th colspan="4" class="big left">Your Point Details </th>
					</tr>
					<tr>
						<th> Coupon Code</th>
						<th> Amount</th>
						<th> Used Date</th>
						<th> Status</th>
						
					</tr>
					<?php
					
					if(is_array($details) && !empty($details)):
					
					foreach($details as $detail)
					{
					?>
						<tr>
							<td><?php echo $detail->coupon_code?></td>
							<td>
								<?php echo $detail->amount;
									$sum += $detail->amount;
								?>
							</td>
							<td><?php echo $detail->used_date?></td>
							<td><?php echo ($detail->status==0?'Used':'New')?></td>
						</tr>
					<?php
					
					}
					
					else:
						echo '<tr><td colspan="4">No Coupon Found</td></tr>';
					endif;
					
					?>
				
					
				</table>
			
			
			</div>
			
			<?php //echo $pagination ?>
			
		</div>
		
		
		
	</div>


</div>

<div id="back_div"></div>
<div id="ticket_div"></div>