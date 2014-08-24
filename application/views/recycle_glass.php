<link href="<?php echo base_url()?>assets/css/contact.css" type="text/css" rel="stylesheet"/>

<script type="text/javascript">

$(document).ready(function()
{		
	$(".image").click(function()
	{	
		var link = $(this).children('img').attr('src');
		$("#show").fadeIn("fast");
				
		$("#view").css({ 'background-image' : 'url('+link+')', 'background-repeat' : 'no-repeat', 'background-position' : 'center',  
		'vertical-align': 'middle',	'border' : '2px solid #cacaca' });
		$("#view").show();		
	});
			
	$('#close_log1').click(function()
	{	
		$("#show").fadeOut("fast");
		$('#view').hide();		
	});
		
});

</script>

<style>

.image { margin:2%; float:left; border:2px solid black; width:28.9%; cursor:pointer; }

</style>

<div id="dashboard_container">

	<div align="center" id="content_div" style="height:auto;">
						
			<div id="step_hd"> 
				<b>Our Recycled <font style="color:#7DC142;">Glass Work Gallery</font></b>
			</div>
									
			<center>	
			
			<?php 
			$dirname = "assets/images/recycle_glass/";
			$files = glob($dirname."*.{jpg,png,gif,jpeg,JPG,PNG,JPEG,GIF}", GLOB_BRACE);
			$count = count($files);			
			for($i=0;$i<$count;$i++)
			{
			echo '<div class="image" id="$i"> <img src="http://www.extracarbon.com/'.$files[$i].'" width="100%" height="350px"/> </div>';			
			}						
			?>		
			
			</center>	
					   		
	</div>
	
</div>

<div id="show" style=" display:none; position:fixed; top:1%; left:1%; right:1%; bottom:2%; width:98%; height:95%; 
background:rgba(0, 0, 0, .5); border-radius:5px; text-align:center; padding: 10px 0; cursor:pointer; z-index:9999;">

		<img src="<?php echo base_url()?>assets/images/close1.png" alt="Close" style="float:right; background:#eee; 
		border-radius:3px; padding:1px;" id="close_log1"/>

<div id="view" style=" z-index:10000; margin:3%; height:93%; border-radius:5px;"></div>

</div>	