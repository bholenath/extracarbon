<link href="<?php echo base_url()?>assets/css/contact.css" type="text/css" rel="stylesheet"/>

<script type="text/javascript">

$(document).ready(function()
{
	
	$("#contact_form_1").submit(function()
	{
		var c_data 	= $(this).serialize();
		
	
		$.ajax({
		url:"<?php echo base_url().'earnpoint/save_recipient_info'?>",
		type:"post",
		data:c_data,
		beforeSend:function()
		{
			
			$("#prgs").html("<img src='<?php echo base_url()?>assets/images/loading.gif'>");
		},
		success:function(html)
		{
			window.location="<?php echo base_url()?>earnpoint/process_request/"+html;
		}
		});
		
		
		return false;
		
	});
});
</script>

<div id="dashboard_container">

	<div id="sidebar">
	
		<?php 
		echo $menu;
		?>
	</div>
	
	<div id="content_div">
				
		<div id="erp_div">
		
			<h1>Donation Panel </h1>
			
		</div>
		
		<!--
		<div id="right_div">
		
			
			<?php echo $user_detail ?>
			
		
		</div>
		-->
		
	</div>

	
	
	

</div>