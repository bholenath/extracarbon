 
<!-- start content-outer -->
<div id="content-outer">
<!-- start content -->
<div id="content">


<div id="page-heading"><h1><?php echo ucwords($user_data->name) ?>'s Details</h1></div>


<table border="0" width="100%" cellpadding="0" cellspacing="0" id="content-table">
<tr>
	<th rowspan="3" class="sized"><img src="<?php echo base_url()?>assets/admin/images/shared/side_shadowleft.jpg" width="20" height="300" alt="" /></th>
	<th class="topleft"></th>
	<td id="tbl-border-top">&nbsp;</td>
	<th class="topright"></th>
	<th rowspan="3" class="sized"><img src="<?php echo base_url()?>assets/admin/images/shared/side_shadowright.jpg" width="20" height="300" alt="" /></th>
</tr>
<tr>
	<td id="tbl-border-left"></td>
	<td>
	
	<!--  start content-table-inner -->
	<div id="content-table-inner">
	
		<table border="0" width="100%" cellpadding="0" cellspacing="0">
		<tr valign="top">
			<td>
			
	
				<!-- start id-form -->
				<table border="0" cellpadding="0" cellspacing="0"  id="id-form">
				<tr>
					<th valign="top">Name:</th>
					<td>
						<?php echo $user_data->name ?>
						
					</td>
					<td></td>
				</tr>
				
				<tr>
					<th valign="top">Gender:</th>
					<td>
						<?php echo $user_data->gender ?>
						
					</td>
					<td></td>
				</tr>
				
				
				<tr>
					<th valign="top">Email:</th>
					<td>
						<?php echo $user_data->email ?>
						
					</td>
					<td></td>
				</tr>
				
				<tr>
					<th valign="top">Metro Card No.:</th>
					<td>
						<?php echo $user_data->metro_card_no ?>
						
					</td>
					<td></td>
				</tr>
				
				
				<tr>
					<th valign="top">Total Points:</th>
					<td>
						<?php echo ($user_data->metro_point + $user_data->waste_pick_point) ?>
						
					</td>
					<td></td>
				</tr>
				
				<tr>
					<th valign="top">Contact Details:</th>
					<td>
						<table border="0" width="800px" class="inner_tab">	
						<tr>
							<th>Gift Plant details</th><th>Waste Pick details</th><th>Recycle Bag details</th>
						</tr>
						<tr>
							<td>
							
								Phone : <?php echo (!empty($dtl->cnt1)?$dtl->cnt1:'n/a') ?> 
								
							</td>
							<td>
								Phone : <?php echo (!empty($dtl->cnt2)?$dtl->cnt2:'n/a') ?> 
							
							</td>
							<td>
								Phone : <?php echo (!empty($dtl->cnt3)?$dtl->cnt3:'n/a') ?> 
							
							</td>
							
							
						</tr>
						<tr>
							<td>
							
								
								Address : <?php echo (!empty($dtl->add1)?$dtl->add1:'n/a') ?>
							</td>
							<td>
								
								Address : <?php echo (!empty($dtl->add2)?$dtl->add2:'n/a') ?>
							</td>
							<td>
								
								Address : <?php echo (!empty($dtl->add3)?$dtl->add3:'n/a') ?>
							</td>
						</tr>
					
						</table>
						
					</td>
					<td></td>
				</tr>
				
				<tr><td></td></tr>
				
				
				<tr>
					<th valign="top">Metro Tickets:</th>
					<td>
						<table border="0" width="800px" class="inner_tab">	
						<tr>
							<td>Total Tickets : <?php echo $summary->total_metro_tkt ?> </td>
							<td>New : <?php echo $summary->new_metro_tkt ?>	</td>
							<td>Verified : <?php echo $summary->verified_metro_tkt ?></td>
							<td>Total Metro Points :  <?php echo $user_data->metro_point ?>	</td>
							
						</tr>
					
						</table>
						
					</td>
					<td></td>
				</tr>
				
				<tr><td></td></tr>
				
				<tr>
					<th valign="top">Request for Gift Plant:</th>
					<td>
						<table border="0" width="800px" class="inner_tab">	
						<tr>
							<td>Total Request : <?php echo $summary->total_plant_rqst ?> </td>
							<td>New : <?php echo $summary->new_plant_rqst ?> </td>
							<td>Dispacted : <?php echo $summary->dispatched_plant_rqst ?></td>
							<td>Completed : <?php echo $summary->verified_plant_rqst ?></td>
							
							
						</tr>
					
							
						</table>
						
					</td>
					<td></td>
				</tr>
				
				<tr><td></td></tr>
				
				<tr>
					<th valign="top">Request for Recycle Waste-Pick:</th>
					<td>
						<table border="0" width="800px" class="inner_tab" >	
						<tr>
							<td>Total Request : <?php echo $summary->total_waste_rqst ?></td>
							<td>New : <?php echo $summary->new_waste_rqst ?>	</td>
							<td>Dispacted : <?php echo $summary->dispatched_waste_rqst ?></td>
							<td>Completed : <?php echo $summary->verified_waste_rqst ?></td>
							
							
						</tr>
					
						</table>
						
					</td>
					<td></td>
				</tr>
				
				<tr><td></td></tr>
				
				<tr>
					<th valign="top">Request for Recycle Bag:</th>
					<td>
						<table border="0" width="800px" class="inner_tab" >	
						<tr>
							<td>Total Request : <?php echo $summary->total_bag_rqst ?></td>
							<td>New : <?php echo $summary->new_bag_rqst ?></td>
							<td>Dispacted : <?php echo $summary->dispatched_bag_rqst ?></td>
							<td>Completed : <?php echo $summary->verified_bag_rqst ?></td>
							
							
						</tr>
						</table>
						
					</td>
					<td></td>
				</tr>
				
				
		<!--		
				<tr>
					<th>&nbsp;</th>
					<td valign="top">
						<input type="hidden" name="id" vlaue="">
						<input type="submit" value="" name="submit" class="form-submit" />
						<input type="reset" value="" class="form-reset"  />
					</td>
					<td></td>
				</tr>
				
		-->
				</table>
		<!-- end id-form  -->

		</td>
		<td>

	</td>
	</tr>
	<tr>
	<td><img src="<?php echo base_url()?>assets/admin/images/shared/blank.gif" width="695" height="1" alt="blank" /></td>
	<td></td>
	</tr>
	</table>
</form>
 
<div class="clear"></div>
 

</div>
<!--  end content-table-inner  -->
</td>
<td id="tbl-border-right"></td>
</tr>
<tr>
	<th class="sized bottomleft"></th>
	<td id="tbl-border-bottom">&nbsp;</td>
	<th class="sized bottomright"></th>
</tr>
</table>
