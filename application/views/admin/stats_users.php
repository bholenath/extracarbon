<div id="content-outer">
<!-- start content -->
<div id="content">

	<!--  start page-heading -->
	<div id="page-heading">
		
		
		
		<div id="in_tag">
			
			<a href="<?php echo base_url()?>admin/stats/journey"> View Most Searched Journey</a>
			<a href="<?php echo base_url()?>admin/stats/users" >View Most Active Users</a>
			
		</div>
		
		
	</div>
	<!-- end page-heading -->

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
		<!--  start content-table-inner ...................................................................... START -->
		<div id="content-table-inner">
		
			<!--  start table-content  -->
			<div id="table-content">
			
				
				
				
				<form id="mainform" action="">
				<table border="0" width="100%" cellpadding="0" cellspacing="0" id="product-table">
				
				<tr>
					<th class="table-header-check"><a id="toggle-all" ></a> </th>
					<th class="table-header-repeat line-left minwidth-1"><a href="">User Name</a></th>
					<th class="table-header-repeat line-left minwidth-1"><a href="">Email </a></th>
					<th class="table-header-repeat line-left"><a href="">No. of Times Searched</a></th>
					<th class="table-header-options line-left"><a href="">Action</a></th>
					
				</tr>
				
				<?php
				
				if(is_array($stats) && !empty($stats)):
				
					foreach($stats as $row)
					{
				
				?>
					<tr>
						<td><input  type="checkbox"/></td>
						<td>
							<a href="<?php echo base_url().'admin/stats/user_stats/'.$row->user_id?>">
								<?php echo ucwords($row->name) ?>
							</a>
						</td>
						<td>
							<a href="<?php echo base_url().'admin/stats/user_stats/'.$row->user_id?>">
								<?php echo $row->email ?>
							</a>
						</td>
						<td><?php echo $row->count?></td>
						<td>
							<a href="<?php echo base_url().'admin/home/details/'.$row->user_id?>" title="View Details" class="icon-1 info-tooltip"></a>
						</td>
					</tr>
				<?php
					}
				else:
					echo '<tr><td>No row found</td></tr>';
				endif;
				?>
					
					
					
				</tr>

				</table>
				
				</form>
				
			</div>
			
		
			
			<table border="0" cellpadding="0" cellspacing="0" id="paging-table">
			<tr>
			<td>
				<?php //echo $pagination;?>
			</td>
			
			</tr>
			</table>
			
			
			<div class="clear"></div>
		 
		</div>
		
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
</div>