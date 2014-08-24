<style type="text/css">
.tkt{cursor:pointer; }
.zoom{position:fixed; top:10px; left:10px; background:#000; max-width:800px; max-height:600px;z-index:999;display:none; border:solid 5px #000; border-radius: 5px;  }

#cls{position:fixed; left:0px; top:0px; z-index:9999; display:none; cursor:pointer;}

.zoom img{max-width:800px; max-height:800px;}

</style>

<script type="text/javascript">

$(document).ready(function()
{
	$(".tkt").click(function()
	{
		//$('html, body').animate({scrollTop:10});
		
		var img = $(this).attr('src');
		$("#cls").show();
		$("#zoom_img").show().html("<img src="+img+">");
	});
	
	$("#cls").click(function()
	{
		$(this).hide();
		$("#zoom_img").hide();
	});
});

</script>


<div id="content-outer">


<!-- start content -->
<div id="content">
<img src="<?php echo base_url()?>assets/admin/images/table/action_delete.gif" id="cls">
<div id="zoom_img" class="zoom"></div>

	<!--  start page-heading -->
	<div id="page-heading">
	
		<div id="in_tag">
		
			<?php $id 	= $this->uri->segment(4) ?>
			<?php $menu = $this->uri->segment(5) ?>
			
			<a href="<?php echo base_url().'admin/home/verify_ticket/'.$id.'/new'?>" <?php echo ($menu=='new'?'class="active"':'class="inactive"')?> >New/Not Verified </a>
			
			<a href="<?php echo base_url().'admin/home/verify_ticket/'.$id.'/verified'?>" <?php echo ($menu=='verified'?'class="active"':'class="inactive"')?> > Verified </a>
			
			
			<a href="<?php echo base_url().'admin/home/verify_ticket/'.$id?>" <?php echo ($menu==''?'class="active"':'class="inactive"')?> > All </a>
		</div>
	
		<h1>View Users (<?php echo $total?>)</h1>
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
					<th class="table-header-repeat line-left minwidth-1"><a href="">Date</a></th>
					<th class="table-header-repeat line-left"><a href="">Amount</a></th>
					<th class="table-header-repeat line-left"><a href="">Ticket Image<br> <small>(click to enlarge)</small></a></th>
					<th class="table-header-repeat line-left"><a href="">Status</a></th>
					
			<!--	<th class="table-header-options line-left"><a href="">Options</a></th>	-->
				</tr>
							
				<?php 
				
				if(is_array($tickets) && !empty($tickets))
				{
					foreach($tickets as $ticket)
					{
				?>	
						<tr>
							<td><input  type="checkbox"/></td>
							<td>
								<?php echo $ticket->date_time ?>
								<?php
								
									if(date('Y-m-d', strtotime($ticket->date_time))==date('Y-m-d'))
										echo ' <b>( Today ) </b> ';
								
								?>
							</td>

							<td><a href=""><?php echo $ticket->amount?></a></td>
							<td>
								<img src="<?php echo base_url().'assets/images/uploads/'.$ticket->title?>" height="100px" width="100px" class="tkt">
							</td>
							<td>
								<?php
								if($ticket->status=='new')
								{
									echo '<a href="'.base_url().'admin/home/set_ticket_status/'.$ticket->ticket_id.'/'.$ticket->id.'" class="verify" onClick="return confirm(\'Are You Sure\')">Verify Now</a>';
								}
								else
									echo 'Verified';
								?>
							</td>
							
							
							
						</tr>
				<?php
					}
				}
				else
					echo '<tr><td colspan="5" class="nf">No Ticket found</td></tr>';
				
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