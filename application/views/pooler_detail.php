<script type="text/javascript">

$(document).ready(function()
{
	$("#close").click(function()
	{
		$("#back_div").fadeOut("fast");
		$("#req_frm").fadeOut("fast");
	});
});

</script>


<style type="text/css">

.input, .formtitle {text-align:left}
#close 	{	top:-10px; right:-10px; background:#fff; border-radius:20px;padding:5px; 
			border-right:solid 1px #000;  border-top:solid 1px #000
		}
</style>


<div id="pooler_dt">
	
	<img src="<?php echo base_url()?>assets/images/close.png" id="close">

	<h1>Car Pooler's Details </h1>
	
	<hr>

	<div class="input">
	
		<div class="inputtext">Name :  </div>
		
	
		<div class="inputtext"><?php echo $pooler->name?>  </div>
	
	</div>
	
	<div class="input">
	
		<div class="inputtext">Email :  </div>
		
	
		<div class="inputtext"><?php echo $pooler->email?>  </div>
	
	</div>
	
	<div class="input">
	
		<div class="inputtext">Gender :  </div>
		
	
		<div class="inputtext"><?php echo $pooler->gender?>  </div>
	
	</div>
	
	<div class="input">
	
		<div class="inputtext">Contact No. :  </div>
		
	
		<div class="inputtext"><?php echo $pooler->contact_no?>  </div>
	
	</div>
	
	
	<div class="input">
	
		<div class="inputtext">Car No. :  </div>
		
	
		<div class="inputtext"><?php echo $pooler->car_rc?>  </div>
	
	</div>
	
	<div class="input">
	
		<div class="inputtext">Journey :  </div>
		
	
		<div class="inputtext"><?php echo $pooler->src.' To '. $pooler->dest?>  </div>
	
	</div>
	
	<div class="input">
	
		<div class="inputtext">Journey Date:  </div>
		
	
		<div class="inputtext"><?php echo date('l d M Y ', strtotime($pooler->offer_date)).' '. $pooler->offer_time?>  </div>
	
	</div>
	
	
<div class="formtitle">Note : 	<?php 	if($pooler->contact_mode=='email')
											echo 'Please Contact User Via Email';
										else
											echo 'Please Contact User by Phone Call';
								?>

</div>
	

</div>