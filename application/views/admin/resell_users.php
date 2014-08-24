<script type="text/javascript" src="<?php echo base_url()?>assets/admin/js/sorter/jquery-latest.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/admin/js/sorter/jquery.tablesorter.js"></script>

<script type="text/javascript">
$(function()
{
	$("table").tablesorter({debug:true});
});
</script>
<div id="content-outer">
<!-- start content -->
<div id="content">

	<!--  start page-heading -->
	<div id="page-heading">
		<h1>View Users</h1>
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
			
				
				<!--  start product-table ..................................................................................... -->
				<form id="mainform" action="">
				<table border="0" width="100%" cellpadding="0" cellspacing="0" id="product-table">
				<thead>
				<tr>
					<th class="table-header-check"><a id="toggle-all" ></a> </th>
					<th class="table-header-repeat line-left minwidth-1"><a href="">Email</a></th>
					<th class="table-header-repeat line-left"><a href="">Item Name</a></th>
					<th class="table-header-repeat line-left"><a href="">Description</a></th>
					<th class="table-header-repeat line-left"><a href="">Date Time</a></th>
					<th class="table-header-repeat line-left"><a href="">Image</a></th>
					<th class="table-header-options line-left"><a href="">Options</a></th>
				</tr>
				</thead>			
				<?php 
				
				if(is_array($users) && !empty($users))
				{
					foreach($users as $sch)
					{
				?>	
						<tr>
							<td><input  type="checkbox"/></td>
							<td>
								<a href="<?php echo base_url().'admin/home/details/'.$sch->id?>">
									<?php echo $sch->email?>
								</a>
							</td>

							<td><a href=""><?php echo $sch->item_name?></a></td>
							<td><a href=""><?php echo $sch->description?></a></td>
							<td><a href=""><?php echo ($sch->datetime) ?></a></td>
							<td><a href=""><img src="<?php echo base_url().'assets/images/resale_item/'.$sch->pic ?>" height="80px"/></a></td>
						
							
							
							
							<td class="options-width">
							
								<a href="<?php echo base_url().'admin/home/details/'.$sch->id?>" title="View Details" class="icon-1 info-tooltip"></a>
								
								<a href="<?php echo base_url().'admin/home/verify_ticket/'.$sch->id?>" title="Ticket Status" class="icon-3 info-tooltip"></a>
					
								<a href="<?php echo base_url().'admin/home/del_user/'.$sch->id?>" title="Delete" class="icon-2 info-tooltip" onclick="return confirm('Are you sure, you want to remove this school ?');"></a>
								
					<!--		<a href="" title="Edit" class="icon-3 info-tooltip"></a>
								<a href="" title="Edit" class="icon-4 info-tooltip"></a>
								<a href="" title="Edit" class="icon-5 info-tooltip"></a>
					-->
					
							</td>
						</tr>
				<?php
					}
				}
				else
					echo 'No user found';
				
				?>

				</table>
				<!--  end product-table................................... --> 
				</form>
			</div>
			<!--  end content-table  -->
		
			<!--  start paging..................................................... -->
			<table border="0" cellpadding="0" cellspacing="0" id="paging-table">
			<tr>
			<td>
				<?php echo $pagination;?>
			</td>
			
			</tr>
			</table>
			<!--  end paging................ -->
			
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
</div>