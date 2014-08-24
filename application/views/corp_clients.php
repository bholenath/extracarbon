<link href="<?php echo base_url()?>assets/css/contact.css" type="text/css" rel="stylesheet"/>

<script type="text/javascript">

$(document).ready(function()
{
	$("#0,#1,#2").hover(function()
	{
	$(this).css({ '-moz-box-shadow' : '0 0 7px 1px #00C5FE', '-webkit-box-shadow' : '0 0 7px 1px #00C5FE', 
	'box-shadow' : '0 0 7px 1px #00C5FE' });
	},function()
	{
	$(this).css({ '-moz-box-shadow' : 'none', '-webkit-box-shadow' : 'none', 'box-shadow' : 'none' });
	});	
		
	/*$(".image").click(function()
	{
	
		var link = $(this).children('img').attr('src');
		$("#show").fadeIn("fast");
				
		$("#view").css({ 'background-image' : 'url('+link+')', 'background-repeat' : 'no-repeat', 'background-position' : 'center',  
		'vertical-align': 'middle',	'border' : '2px solid #cacaca' });
		$("#view").show();
		
	});	
			
	$('#close_log').click(function()
	{
	
		$("#show").fadeOut("fast");
		$('#view').hide();
		
	});*/
		
});

</script>

<div id="dashboard_container" style="height:auto;">

	<div id="content_div" style="height:auto;">
						
		 <center>					
						
			<div id="step_hd"> 
				<b>Our <font style="color:#7DC142;">Corporate Clients</font></b>
			</div>														
								
			<div class="image1" id="0" style="margin:2%; float:left; border:0px solid black; width:29.33%; cursor:pointer;">
													
				<img src="<?php echo base_url() ?>assets/images/srs.png" width="100%" height="170px"/>
															
			</div>
			
			<div class="image1" id="1" style="margin:2%; float:left; border:0px solid black; width:29.33%; cursor:pointer;">
													
				<img src="<?php echo base_url() ?>assets/images/more.png" width="100%" height="170px"/>
															
			</div>
			
			<div class="image1" id="2" style="margin:2%; float:left; border:0px solid black; width:29.33%; cursor:pointer;">
													
				<img src="<?php echo base_url() ?>assets/images/arinna.png" width="100%" height="170px"/>
															
			</div>			
			
			</center>	
			
		<hr style="height:1px; width:100%; color:#200;"></hr>	
					   		
	</div>
	
</div>