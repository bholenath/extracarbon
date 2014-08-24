
<div id="content-outer">
<!-- start content -->
<div id="content">

	<!--  start page-heading -->
	<div id="page-heading">
	
		<div id="in_tag">
			<?php $menu = $this->uri->segment(4)?>
			<a href="<?php echo base_url()?>admin/carpool/all_carpool_request/un" <?php echo ($menu=='un'?'class="active"':'class="inactive"')?> >Show Not Confirmed Offers </a>
			
			<a href="<?php echo base_url()?>admin/carpool/all_carpool_request/cn" <?php echo ($menu=='cn'?'class="active"':'class="inactive"')?> >Show Confirmed Offers </a>
			
			<a href="<?php echo base_url()?>admin/carpool/all_carpool_request" <?php echo ($menu==''?'class="active"':'class="inactive"')?> >All </a>
			
		</div>
	
		<h1>
			All Car Pooler's List
			
		(<?php echo $total?>)
		</h1>
		
		
		
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
					<th class="table-header-repeat line-left minwidth-1"><a href="">Name</a></th>
					<th class="table-header-repeat line-left minwidth-1"><a href="">Email</a></th>
					<th class="table-header-repeat line-left"><a href="">Contact No.</a></th>
					<th class="table-header-repeat line-left"><a href="">Address </a></th>
					<th class="table-header-repeat line-left"><a href="">Pincode</a></th>
					<th class="table-header-repeat line-left"><a href="">ID Proof</a></th>
					<th class="table-header-repeat line-left"><a href="">Confirmed</a></th>
					<th class="table-header-options line-left"><a href="">Action</a></th>
				</tr>
							
				<?php 
				
				if(is_array($request) && !empty($request))
				{
					foreach($request as $req)
					{
				?>	
						<tr>
							<td><input  type="checkbox"/></td>
							<td>
								<a href="<?php echo base_url().'admin/home/details/'.$req->user_id?>">
									<?php echo $req->name?>
								</a>
							</td>
							<td>
								<a href="<?php echo base_url().'admin/home/details/'.$req->user_id?>">
									<?php echo $req->email?>
								</a>
							</td>

							<td><a href=""><?php echo $req->contact_no?></a></td>
							<td><a href=""><?php echo $req->address ?></a></td>
							<td><a href=""><?php echo $req->pincode ?></a></td>
							<td><a href=""><?php echo $req->id_proof ?></a></td>
							<td><a href=""><?php echo ($req->status==1?'Yes':'No') ?></a></td>
							
							<td class="options-width">
							
								<a href="<?php echo base_url().'admin/home/details/'.$req->user_id?>" title="View Details" class="icon-1 info-tooltip"></a>
								
				
								<a href="<?php echo base_url().'admin/home/del_user/'.$req->user_id?>" title="Delete" class="icon-2 info-tooltip" onclick="return confirm('Are you sure, you want to remove this school ?');"></a>
								
					
							</td>
						</tr>
				<?php
					}
				}
				else
					echo '<tr><td colspan="9">No Request found</td><t/tr>';
				
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