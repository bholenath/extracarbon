
    <link rel="stylesheet" href="<?php echo base_url()?>assets/admin/css/graph.css" type="text/css" media="screen" />
    
    <script type="text/javascript" src="<?php echo base_url()?>assets/admin/js/libraries/RGraph.common.core.js" ></script>
    <script type="text/javascript" src="<?php echo base_url()?>assets/admin/js/libraries/RGraph.bipolar.js" ></script>
<!--
    <script type="text/javascript" src="<?php echo base_url()?>assets/admin/js/libraries/RGraph.common.dynamic.js" ></script>
    <script type="text/javascript" src="<?php echo base_url()?>assets/admin/js/libraries/RGraph.common.effects.js" ></script>
    <script type="text/javascript" src="<?php echo base_url()?>assets/admin/js/libraries/RGraph.common.tooltips.js" ></script>
    <script type="text/javascript" src="<?php echo base_url()?>assets/admin/js/libraries/RGraph.bar.js" ></script>
    <script type="text/javascript" src="<?php echo base_url()?>assets/admin/js/libraries/RGraph.pie.js" ></script>
->
    <!--[if lt IE 9]><script src="<?php echo base_url()?>assets/admin/js/libraries/excanvas.js"></script><![endif]-->
  
  
    

	
	
	
	<div id="content-outer">
<!-- start content -->
<div id="content">

	<!--  start page-heading -->
	<div id="page-heading">
		<h1>Add product</h1>
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
			<h2>Sub Heading </h2>
			<h3>Local Heading</h3>
			
			<?php
			
			$count 		= '';
			$label 		= '';
			$label1 	= '';
			
			if(is_array($stats) && !empty($stats))
			{
				foreach($stats as $sts)
				{
					$count .= $sts->count.',';
					$label .= "'".ucwords($sts->journey)."'".',';
				}
			}
			
			$count = rtrim($count ,',');
			$label = rtrim($label,',');

			
			
			if(is_array($stats1) && !empty($stats1))
			{
				foreach($stats1 as $sts)
				{
					//$count .= $sts->count.',';
					$label1 .= "'".ucwords($sts->journey)."'".',';
				}
			}
			
			
			
			?>
			
				<canvas id="cvs" width="1000" height="450">[No canvas support]</canvas>
    
				<script>
					window.onload = function ()
					{
						var bipolar = new RGraph.Bipolar('cvs', [<?php echo $count?>],[4,6,5,9,2]);
						bipolar.Set('chart.labels', [<?php echo $label?>]);
						bipolar.Draw();
					}
				</script>

			
			</div>
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
