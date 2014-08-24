<div id="content-outer">
<!-- start content -->
<div id="content">

	<!--  start page-heading -->
	<div id="page-heading">
		<h1>View Today's Rquest </h1>
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
				<tr>
					<th class="table-header-check"><a id="toggle-all" ></a> </th>
					<th class="table-header-repeat line-left minwidth-1"><a href="">Gift Plant Request</a></th>
					<th class="table-header-repeat line-left"><a href="">Recycle Waste-Pick Request</a></th>
					<th class="table-header-repeat line-left"><a href="">Recycle Bag Request</a></th>
					
				</tr>
							
				<tr>
					<td><input  type="checkbox"/></td>
					<td>
						<a href="" class="strong">
							<?php echo $today_req->total_plant_req?>
							<br>
							<a href="<?php echo base_url()?>admin/request/today_request/plant">View Details</a>
						</a>
					</td>

					<td>
						<a href="" class="strong"><?php echo $today_req->total_waste_req?></a>
						<br>
							<a href="<?php echo base_url()?>admin/request/today_request/waste">View Details</a>
					</td>
					
					<td>
						<a href="" class="strong"><?php echo $today_req->total_bag_req?></a>
						<br>
							<a href="<?php echo base_url()?>admin/request/today_request/bag">View Details</a>
					</td>
					
					
				</tr>

				</table>
				<!--  end product-table................................... --> 
				</form>
			</div>
			<!--  end content-table  -->
		
			<!--  start paging..................................................... -->
			<table border="0" cellpadding="0" cellspacing="0" id="paging-table">
			<tr>
			<td>
				<?php //echo $pagination;?>
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