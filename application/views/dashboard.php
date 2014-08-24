<div id="dashboard_container">

	<div id="sidebar">
	
		<?php 
		echo $menu;
		?>
	</div>
	
	<div id="content_div">
		
		<div id="inner_db">
		
			<div id="top_head">

				<img src="<?php echo base_url()?>assets/images/home.png">
				
				<h2> Welcome to Dashboard </h2>
				
			</div>
			
			<div id="db_notice">
			
				Your Total Balance is <b>Rs. <?php echo $metro_total+$waste_total+$coupon_total ?>.</b><br><br>
				You have earned&nbsp;&nbsp;<b>Rs. <?php echo $metro_total ?></b>&nbsp;&nbsp;from sign up.<br><br>
				You have earned&nbsp;&nbsp;<b>Rs. <?php echo $waste_total ?></b>&nbsp;&nbsp;from your waste.<br><br> 
				You have earned&nbsp;&nbsp;<b>Rs. <?php echo $coupon_total ?></b>&nbsp;&nbsp;from your coupons.
				
			</div>
			
			<?php
			
			/*if(isset($coupon) && !empty($coupon))
			{
				echo '<div id="db_notice">You have a new coupon <b> <a href="'.base_url().'redeempoints">'.$coupon->coupon_code.'</a></b> Worth <b>Rs. '.$coupon->amount.'</b></div>';
			}*/
			
			?>			
			
			<div id="db_content">
			
			
				<div id="db_cont_left">
			
			
					<!--<div class="db_smmry">
					
						<h1>Recent Carpool Offers</h1>
						
						<div class="db_cont">
						
							<?php
							/*if(is_array($carpool) && !empty($carpool))
							{
								
								echo '<table class="db_pool"><tr><th>From</th><th>To</th><th>Date</th><th>Last Added</th></tr>';
								
								foreach($carpool as $pool)
								{
									echo '<tr><td>'.ucfirst($pool->src).'</td> <td>'.ucfirst($pool->dest).'</td> <td>'.
									$pool->offer_date.'</td>';
									
									echo '<td> <small> ';
									
									$date1 = date('Y-m-d g:i A', strtotime($pool->date_time));
									
									echo ezDate($date1);
									
									echo ' ago </small></td></tr>';
								}
								echo '</table>';
							}
							else
								echo 'No Recent offer found';
							*/
							?>
							
						</div>
						
					</div>-->
									
					
					<div class="db_smmry">
					
						<h1>Waste-Pick Summery </h1>
						
						<div class="db_cont">
						
							<?php if(!empty($w_data)) 
							{ 
								echo '<table class="db_pool">';
								echo "<tr><td>Total Requests </td><td> : $w_data->request </td></tr>";
								echo "<tr><td>Total earned points from waste-pick</td><td> : $w_data->total </td></tr>";
								echo "<tr><td>Pending Request(s)</td><td> : $w_data->uncomplete </td></tr>";
								echo "</table>";
								
							}
							else
								echo 'No data found';
							?>						
						
						</div>
					
					</div>				
				
				</div>
				
				<!--<div id="db_cont_right">
				
					<div class="db_smmry">
					
						<h1>Metro Section </h1>
						
						<div class="db_cont">
						
						<?php /*if(!empty($m_data)) 
						{ 
							echo '<table class="db_pool">';
							echo "<tr><td>Total Uploaded Tickets are</td><td> : $m_data->ticket</td></tr>";
							echo "<tr><td>Total Earned money from metro</td><td> : Rs. ". ($m_data->total/100)."</td></tr>";
							echo "<tr><td>Pending Tickets request(s)</td><td> : $m_data->new_ticket worth Rs. ".($m_data->unpaid/100)."
							</td></tr>";
							echo "</table>";
							
						}
						else
							echo 'No data found';*/
						?>
						
						</div>
					
					</div>
									
					<div class="db_smmry">
					
						<h1>Recycle Bag and Gift Plant Summery </h1>
						
						<div class="db_cont">
						
							<?php /*if(!empty($o_data)) 
							{ 
								echo '<table class="db_pool">';
								echo "<tr><td>Total Recycle Bag requests </td><td> : $o_data->bag_req</td></tr>";
								echo "<tr><td>Uncompleted Bag request(s) </td><td> : $o_data->bag_req_uc</td></tr>";
								echo "<tr><td>Total Gift Plant requests</td><td> : $o_data->plant_req</td></tr>";
								echo "<tr><td>Uncompleted Gift Plant request(s)</td><td> : $o_data->plant_req_uc</td></tr>";
								echo "</table>";
								
							}
							else
								echo 'No data found';*/
							?>
						
						</div>
					
					</div>-->
				
				</div>
			
			</div>

	</div>

</div>

<!-- ----------- Alert Message for Request Response of Gift Plant -------------->
	
	<?php if($this->session->flashdata('req_response')) :?>
	
		<script type="text/javascript">
		
		$(document).ready(function()
		{		
			$("#ok").click(function()
			{
				$("#alert_div").hide();
				$("#back_div").hide();
			});
		});
		
		</script>
		
		<div id="back_div"></div>
		
		<div id="alert_div">
		
			<div id="alert_content">
			
				<h1>Message</h1>
				
				<div id="alert_text">
				
					<?php
						echo $this->session->flashdata('req_response')
					?>
				</div>
				
				<div id="ok">
					<span><a href="<?php echo base_url()?>earnpoint/donate">Donate</a></span>
					<span>Cancle</span>
				</div>
				
			</div>
		</div>
	 
 	<?php endif; ?>

<!-- -------------Ends here --------------->


<!-- ----------- Alert Message for Request Response of Waste-Pick and Recycle Bag-------------->
	
	<?php if($this->session->flashdata('rec_response')) :?>
	
		<script type="text/javascript">
		
		$(document).ready(function()
		{		
			$("#ok").click(function()
			{
				$("#alert_div").hide();
				$("#back_div").hide();
			});
		});
		
		</script>
		
		<div id="back_div"></div>
		
		<div id="alert_div">
		
			<div id="alert_content">
			
				<h1>Message</h1>
				
				<div id="alert_text">
				
					<?php
						echo $this->session->flashdata('rec_response')
					?>
				</div>
				
				<div id="ok">
					
					<span>Ok</span>
				</div>
				
			</div>
		</div>
	 
 	<?php endif; ?>

<!-- -------------Ends here --------------->