<style type="text/css">

.home_row	{	padding: 10px; border-bottom:solid 1px #aaa; 
				background:#eee; margin:10px; width:400px; font-size:15px;
			}
.home_row a	{color:#000;}
.home_row span {color:#00a1e3; font-weight:bold;}

.table-cont		{	border:solid 1px #606060; border-radius: 5px;margin: 10px;		}
.table-cont h3 	{ 	background: #ccc; padding: 5px; border-radius: 5px 5px 0 0; color:#000;
					box-shadow: 5px 10px 10px #aaa inset;
				}

</style>

<div id="content-outer">
<!-- start content -->
<div id="content">

	<!--  start page-heading -->
	<div id="page-heading">
		<h1></h1>
	</div>
	<!-- end page-heading -->

	<table border="0" width="100%" cellpadding="0" cellspacing="0" id="content-table">
	<tr>
		<th rowspan="3" class="sized"><img src="<?php echo base_url()?>assets/admin/images/shared/side_shadowleft.jpg" width="20" 
		height="300" alt="" /></th>
		<th class="topleft"></th>
		<td id="tbl-border-top">&nbsp;</td>
		<th class="topright"></th>
		<th rowspan="3" class="sized"><img src="<?php echo base_url()?>assets/admin/images/shared/side_shadowright.jpg" width="20" 
		height="300" alt="" /></th>
	</tr>
	<tr>
		<td id="tbl-border-left"></td>
		<td>
		<!--  start content-table-inner ...................................................................... START -->
		<div id="content-table-inner">
		
			<!--  start table-content  -->
			
			<table width="100%" border=0 >
				<tr>
					<td valign="top" >
						<div class="table-cont" >
							<h3>User </h3>
							<div class="home_row">
								<a href="<?php echo base_url()?>admin/home/view_users">Total Registered User : <span>
								<?php echo $total_user ?></span> <a/>
							</div>
							<div class="home_row">
								<a href="<?php echo base_url()?>admin/home/today_users">
									Today's Registered User :<span> <?php echo $today_user ?> </span>
								</a>
							</div>
						</div>
						
					</td>
					
					<td valign="top" >
						<div class="table-cont" >
							<h3>Society Collection Details</h3>
							<div class="home_row">
								<a href="<?php echo base_url()?>admin/home/society_collection">Total Society Collection : <span>
								<?php echo $total_collection ?>&nbsp;INR</span> </a>
							</div>
							<div class="home_row">
								<a href="<?php echo base_url()?>admin/home/feriwala_amount">Total Money given to Feriwala : <span>
								<?php echo $amount_to_feriwala ?>&nbsp;INR</span> </a>
							</div>
							<div class="home_row">
								<a href="<?php echo base_url()?>admin/home/waste">Total Waste Collected : <span>
								<?php echo $waste_collected ?>&nbsp;Kg</span> </a>
							</div>
						</div>
						
					</td>
					<!-- <td valign="top">
						<div class="table-cont">
							<h3>Service</h3>
							<div class="home_row">
								<a href="<?php //echo base_url()?>admin/request/all_request/plant">
									Total Gifted Plant : <span><?php //echo $plant_req ?></span>
								</a>
							</div>
							<div class="home_row"><a href="<?php //echo base_url()?>admin/request/all_request/waste">Total Completed Waste Request : <span><?php //echo $waste_req ?></span></a></div>
							<div class="home_row"><a href="<?php //echo base_url()?>admin/request/all_request/bag">Total Completed Recycle Bag Request : <span><?php //echo $bag_req ?></span></a></div>
						</div>
					</td>				
				</tr>
				<tr>
					<td valign="top">
						<div class="table-cont">
							<h3>Rideshare</h3>
							<div class="home_row"><a href="<?php //echo base_url()?>admin/carpool/all_poolers">Available Car Offers : <span><?php //echo $car_offer ?></span></a></div>
						</div>
					</td>
					<td valign="top">				
						<div class="table-cont">
							<h3>Copons</h3>
							<div class="home_row"><a href="<?php //echo base_url()?>admin/coupons/all_coupons"><?php //echo 'Total Used Coupons : <span> '. $coupons->used;?></span></a></div>
							<div class="home_row"><a href="<?php //echo base_url()?>admin/coupons/all_coupons"><?php //echo 'Total Unused Coupons : <span>'. $coupons->new;?><span></a></div>
						</div>
					</td> -->
				</tr>
				
			</table>	
				
			
			
			<!--  end table-content  -->
	
			<div class="clear"></div>
		 
		</div>
		<!--  end content-table-inner ............................................END  -->
		</td>
		<td id="tbl-border-right"></td>
	</tr>
	<tr>
		<th class="sized bottomleft"></th>
		<td id="tbl-border-bottom">&nbsp;</td>
		<th class="sized bottomright"></th>
	</tr>
	</table>
	<div class="clear">&nbsp;</div>

</div>
<!--  end content -->
<div class="clear">&nbsp;</div>
</div>
<!--  end content-outer........................................................END -->
