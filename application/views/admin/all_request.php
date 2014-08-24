<script type="text/javascript" src="<?php echo base_url()?>assets/admin/js/sorter/jquery-latest.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/admin/js/sorter/jquery.tablesorter.js"></script>

<script type="text/javascript">
$(function()
{
	$("table").tablesorter({debug:true});
});
</script>

<script type="text/javascript">

$(document).ready(function()
{
	$(".stat_chng").change(function()
	{
		var status 	= $(this).val();
		var id		= $(this).attr("data");
		var req		= $(this).attr("req");
		var point	= 0;
		
		<?php if($this->uri->segment(4)=='waste') :?>
		
		if(status=='completed')
		{
			$("#"+id+"_pnt").show();
			$("#"+id+"_point_sbmt").click(function()
			{
				var point 	= $("#"+id+"_pnt input").val();
				var uid 	= $("#"+id+"_uid").val();
			
				if(point=='' || point%1>0 || isNaN(point))
				{
					alert('Please Enter Valid Points');
					return false;
				}
				
				$.ajax({
				type:"post",
				url:"<?php echo base_url()?>admin/request/change_status",
				data:"status="+status+"&id="+id+"&type="+req+"&point="+point+"&uid="+uid,
				beforeSend:function()
				{
				
					$("#"+id+"_1").show().html('<img src="<?php echo base_url().'assets/images/loading.gif'?>">');

				},
				success:function(html)
				{
					//alert(html);
					$("#"+id+"_pnt").hide();
					$("#"+id+"_1").hide();
					$("#"+id).html(status);
					
				}
				});
				return false
			});
			return false;
		}
		
		
		if(status=='dispatched' || status=='rejected')
		{
			$("#"+id+"_pnt").hide();
			var uid = $("#"+id+"_uid").val();
			
			$.ajax({
				type:"post",
				url:"<?php echo base_url()?>admin/request/change_status",
				data:"status="+status+"&id="+id+"&type="+req+"&point="+point+"&uid="+uid,
				beforeSend:function()
				{
				
					$("#"+id+"_1").show().html('<img src="<?php echo base_url().'assets/images/loading.gif'?>">');

				},
				success:function(html)
				{
					//alert(html);
					$("#"+id+"_pnt").hide();
					$("#"+id+"_1").hide();
					$("#"+id).html(status);
					
				}
				});
				return false
		}
		
		<?php endif ?>
		
		$.ajax({
		type:"post",
		url:"<?php echo base_url()?>admin/request/change_status",
		data:"status="+status+"&id="+id+"&type="+req,
		beforeSend:function()
		{
		
			$("#"+id+"_1").show().html('<img src="<?php echo base_url().'assets/images/loading.gif'?>">');

		},
		success:function(html)
		{
			$("#"+id+"_1").hide();
			$("#"+id).html(status);
			
		}
		});
	});
	
	
	$("#sort_op").change(function()
	{
		var op 	= $(this).val();
		
		var loc = window.location.pathname;
		
		window.location = loc+"?sort="+op;
		
	});
});

</script>


<div id="content-outer">
<!-- start content -->
<div id="content">

	<!--  start page-heading -->
	<div id="page-heading">
	
		<div id="in_tag">
			<?php $menu = $this->uri->segment(4)?>
			
			<a href="<?php echo base_url()?>admin/request/all_request/bag" <?php echo ($menu=='bag'?'class="active"':'class="inactive"')?> >Recycle Bag </a>
			<a href="<?php echo base_url()?>admin/request/all_request/waste"  <?php echo ($menu=='waste'?'class="active"':'class="inactive"')?> >Recycle Waste-Pick </a>
			<a href="<?php echo base_url()?>admin/request/all_request/plant"  <?php echo ($menu=='plant'?'class="active"':'class="inactive"')?> >Gift a Plant </a>
		
		</div>
	
		<h1>
			All Requests for 
			<?php
			if($this->uri->segment(4)=='bag')
				echo 'Recycle Bag';
			else if($this->uri->segment(4)=='waste')
				echo 'Recycle Waste-Pick';
			else if($this->uri->segment(4)=='plant')
				echo 'Gift a Plant';
			else
				echo 'Recycle Bag';
			?>
		(<?php echo $total?>)
		</h1>
		
		
		
	</div>
	<!-- end page-heading -->
	
	
	<div id="sort_div">
		<b>Show Data with Status :</b>
		<select id="sort_op">
			<option value="">&nbsp;&nbsp;&nbsp;Choose Option &nbsp;&nbsp;&nbsp;</option>
			<option value="new">&nbsp;&nbsp;&nbsp;New</option>
			<option value="dispatched">&nbsp;&nbsp;&nbsp;Dispatched</option>
			<option value="completed">&nbsp;&nbsp;&nbsp;Completed</option>
			<option value="rejected">&nbsp;&nbsp;&nbsp;Rejected</option>
		</select>
	</div>
	
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
					<th class="table-header-repeat line-left"><a href="">Date Time</a></th>
					<th class="table-header-repeat line-left"><a href="">Contact No.</a></th>
					<th class="table-header-repeat line-left"><a href="">Status</a></th>
					<th class="table-header-repeat line-left"><a href="">Change Status</a></th>
					<th class="table-header-options line-left"><a href="">Options</a></th>
				</tr>
				</thead>
							
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
									<?php echo $req->email?>
								</a>
							</td>

							<td><a href=""><?php echo date('d M Y', strtotime($req->date_time)) ?></a></td>
							<td><a href=""><?php echo $req->contact_no ?></a></td>
							<td><a href=""><div id="<?php echo $req->id ?>"><?php echo $req->status?></div></a></td>
							
							<td>
								
								<select name="change_status" class="stat_chng" data="<?php echo $req->id ?>" req="<?php echo $this->uri->segment(4)?>">
									<option value="">Set Status</option>
									<option value="dispatched" >Dispatched</option>
									<option value="completed" >Completed</option>
									<option value="rejected" >Rejected</option>
								</select>
								<span id="<?php echo $req->id ?>_1" style="display:none; "></span>
								<span id="<?php echo $req->id ?>_pnt" style="display:none;">
									<input type="text" id="<?php echo $req->id ?>_point" size="5" class="inpt">
									<button id="<?php echo $req->id ?>_point_sbmt">save</button>
								</span>
								<input type="hidden" id="<?php echo $req->id ?>_uid" value="<?php echo $req->user_id ?>">
							</td>
							
							
							
							<td class="options-width">
							
								<a href="<?php echo base_url().'admin/home/details/'.$req->user_id?>" title="View Details" class="icon-1 info-tooltip"></a>
								
				
								<a href="<?php echo base_url().'admin/home/del_user/'.$req->user_id?>" title="Delete" class="icon-2 info-tooltip" onclick="return confirm('Are you sure, you want to remove this school ?');"></a>
								
					
							</td>
						</tr>
				<?php
					}
				}
				else
					echo '<tr><td colspan="6">No Request found</td><t/tr>';
				
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