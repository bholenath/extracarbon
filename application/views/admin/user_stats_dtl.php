

    <link rel="stylesheet" href="<?php echo base_url()?>assets/admin/css/graph.css" type="text/css" media="screen" />
    
    <script type="text/javascript" src="<?php echo base_url()?>assets/admin/js/libraries/RGraph.common.core.js" ></script>
    <script type="text/javascript" src="<?php echo base_url()?>assets/admin/js/libraries/RGraph.common.dynamic.js" ></script>
    <script type="text/javascript" src="<?php echo base_url()?>assets/admin/js/libraries/RGraph.common.effects.js" ></script>
    <script type="text/javascript" src="<?php echo base_url()?>assets/admin/js/libraries/RGraph.common.tooltips.js" ></script>
    <script type="text/javascript" src="<?php echo base_url()?>assets/admin/js/libraries/RGraph.bar.js" ></script>
    <script type="text/javascript" src="<?php echo base_url()?>assets/admin/js/libraries/RGraph.pie.js" ></script>
    <!--[if lt IE 9]><script src="<?php echo base_url()?>assets/admin/js/libraries/excanvas.js"></script><![endif]-->
  
	<style type="text/css">
	
		#choose{ padding: 10px; background: #eee; margin: 10px 0;}
		#option{padding: 5px; background:#aaa; font-weight:bold; color:#000; cursor:pointer;}
		#option:hover{background:#0ba0e5;}
		#graph_cont{display:none}
		#legend {padding:10px; margin:5px; border:solid 1px #aaa; border-radius: 5px; width:400px;}
		#r_legend{background:red; width:5px; height5px; font-weight:bold;}
		#g_legend{background:#aaa; width:5px; height5px;}
		#month {padding:3px; border:solid 1px #606060;margin-left: 10px;}
	</style>
 
<script type="text/javascript">

$(document).ready(function()
{
	$("#option").html("Show Graph");
	
	$("#option").toggle(function()
	{
		$(this).html("Show Data");
		$("#table-content").fadeOut("fast");
		$("#graph_cont").fadeIn("fast");
		
	},function()
	{
		$(this).html("Show Graph");
		$("#table-content").fadeIn("fast");
		$("#graph_cont").fadeOut("fast");
		
	});
	
	$("#month").change(function()
	{
		var mon = $(this).val();
		window.location="<?php echo base_url()?>admin/stats/user_stats/<?php echo $this->uri->segment(4) ?>/"+mon;
	});
	
});

</script>


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
		
			
			
			
			<div id="choose">
				<span id="option">Show Graph</span>
				<select id="month">
					<option >Choose Month</option>
					<option value="01">January</option>
					<option value="02">Februry</option>
					<option value="03">March</option>
					<option value="04">April</option>
					<option value="06">May</option>
					<option value="06">June</option>
					<option value="07">July</option>
					<option value="08">August</option>
					<option value="09">September</option>
					<option value="10">October</option>
					<option value="11">November</option>
					<option value="12">December</option>
				</select>
				
			</div>
				
				
		<!--  start table-content  -->		
				
			<div id="table-content">
			
				
				<form id="mainform" action="">
				<table border="0" width="100%" cellpadding="0" cellspacing="0" id="product-table">
				
				<tr>
					<th class="table-header-check"><a id="toggle-all" ></a> </th>
					<th class="table-header-repeat line-left minwidth-1"><a href="">Journey</a></th>
					<th class="table-header-repeat line-left"><a href="">No. of Times Searched</a></th>
					<th class="table-header-repeat line-left"><a href="">Successfull Searches</a></th>
				
					
				</tr>
				
				<?php
				
				if(is_array($stats) && !empty($stats)):
				
					foreach($stats as $row)
					{
				
				?>
					<tr>
						<td><input  type="checkbox"/></td>
						<td><?php echo ucwords($row->journey) ?></td>
						<td><?php echo $row->count?></td>
						<td><?php echo (isset($row->success)?$row->success:'NILL')?></td>
					</tr>
				<?php
					}
				else:
					echo '<tr><td colspan="4">No row found</td></tr>';
				endif;
				?>
					
					
					
				</tr>

				</table>
				
				</form>
				
			</div>
			
			
			<!-- Graph Container -->
			
			
			<div id="graph_cont">
			
					
					
				<?php
				
				$count 	= '';
				$label 	= '';
				$status	= '';
				
				if(is_array($stats) && !empty($stats))
				{
					foreach($stats as $sts)
					{
						$count 	.= $sts->count.',';
						$label 	.= "'".ucwords($sts->journey)."'".',';
						$status	.= '['.(isset($sts->success)?$sts->success.','.(100-$sts->success):'0,'. (100-$sts->success)).'],';
					}
				}
				
				$count 	= rtrim($count ,',');
				$label 	= rtrim($label,',');
				$status	= rtrim($status,',');

				
				?>
				
					<canvas id="cvs" width="1180" height="500">[No canvas support]</canvas>

					<script>
						window.onload = function ()
						{
							var bar8 = new RGraph.Bar('cvs', [<?php echo $count ?>])
							bar8.Set('labels', [<?php echo $label ?>]);
							bar8.Set('tooltips', function (index)
												 {
													 var label = bar8.Get('chart.labels')[index];
													 return '<div style="text-align: center; font-weight: bold; font-size: 16pt; ">' + label + '</div><br  /><canvas id="tooltip_canvas" width="250" height="110"></canvas>';
												 });
							RGraph.Effects.Bar.Grow(bar8);


							/**
							* The ontooltip event runs when a tooltip is shown and creates the Pie chart in the tooltip
							*/
							bar8.ontooltip = function (obj)
							{
								var pie_data = [ <?php echo $status; ?> ]
												
								var tooltip = RGraph.Registry.Get('chart.tooltip');
								var index   = tooltip.__index__;

								var pie = new RGraph.Pie('tooltip_canvas', pie_data[index]);
								pie.Set('labels', [' ',' ']);
								pie.Set('gutter.top', 10);
								pie.Set('gutter.bottom', 25);
								pie.Draw();
							}
						}
					</script>

				<br><br>	
				
				<div id="legend">
					<h2>Note:  Click on bars to see search result rate. </h2>
					<span id="r_legend">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span> For Successful Searches.
					<br><br>
					<span id="g_legend">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span> For Failed Searches.
				</div>
			
			</div>
			
		
			<!-- End Graph -->
			
			
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