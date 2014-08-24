<link href="<?php echo base_url()?>assets/css/contact.css" type="text/css" rel="stylesheet"/>

<script type="text/javascript">

$(document).ready(function()
{
	
	$(".greybutton").click(function()
	{
		var id = $(this).attr('id');
		
		var parent = $(this).parent().parent();
		
		$.ajax({
		type:"post",
		url:"<?php echo base_url()?>carpool/delete_my_offer",
		data:"id="+id,
		beforeSend:function()
		{
			return confirm("Are you sure, you want to delete this offer ?");
			
		},
		success:function(html)
		{
			if(html==true)
			{
				parent.slideUp(300, function()
				{
					parent.remove()
				});
			}
		}
		});
		
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
				<b> Your Car Pool Offer List </b>
				<p> You can delete your car offer from here.</p>
			</div>
		
			<div class="formtitle">
				Your total offer(s) : <?php echo count($offers)?>
			</div>
		

		
			<div id="point">
			
				<table border="0" class="tab1">
					<tr>
						<th>From</th>
						<th>To</th>
						<th>Date</th>
						<th>Time</th>
						<th>Contact Mode</th>
						<th>Payment Mode</th>
						<th>Delete</th>
					</tr>
			
				<?php
								
				
				if(is_array($offers) && !empty($offers)):
					foreach($offers as $off):
				?>
					<tr>
						<td>
							<?php date_default_timezone_set('Asia/kolkata');
							echo $off->src;?>
						</td>
						<td><?php echo $off->dest ?> </td>
						<td><?php echo $off->offer_date ?> </td>
						<td><?php echo $off->offer_time ?> </td>
						<td><?php echo $off->contact_mode ?> </td>
						<td><?php echo $off->payment_mode ?> </td>
						<td><button class="greybutton" id="<?php echo $off->id?>">Delete</button></td>
					</tr>				
				
				<?php
					endforeach;
				else:
					echo '<tr><td colspan="5" class="msg">Please upload ticket to earn points</td></tr>';
				endif;
				?>
				
				</table>
				<br>
				<a  href="<?php echo base_url()?>carpool/offer" class="greybutton1" >Add New Offer</a>
			
			
			</div>
			
			<?php echo $pagination ?>
			
		</div>
		
		
	</div>


</div>

<div id="back_div"></div>
<div id="ticket_div"></div>