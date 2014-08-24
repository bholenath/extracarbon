<link href="<?php echo base_url()?>assets/css/contact.css" type="text/css" rel="stylesheet"/>

<script type="text/javascript">

$(document).ready(function()
{
	$("#edit_btn").toggle(function()
	{
		$(this).text("Cancle Edit");
	
		$("#phone_no").attr("readonly", false);
		$("#address").attr("readonly", false);
		
		$("#phone_no").removeClass("disabled");
		$("#address").removeClass("disabled");
		
		$("#phone_no").addClass("enabled");
		$("#address").addClass("enabled");
		
		$("#phone_no").focus();
		
		return false;
	},function()
	{
		$(this).text("Edit Details");
		
		$("#phone_no").attr("readonly", true);
		$("#address").attr("readonly", true);
		
		$("#phone_no").removeClass("enabled");
		$("#address").removeClass("enabled");
		
		$("#phone_no").addClass("disabled");
		$("#address").addClass("disabled");
	});
	
	
	
	$("#contact_form_1").submit(function()
	{
	
		var phone = $("#phone_no").val();
		
		if($.trim(phone) == "" || phone%1>0 || isNaN(phone))
		{
			alert("Please enter valid phone no in numeric format");
			return false;
		}
		else if($.trim($("#address").val())=="")
		{
			alert("Please Enter Adderss");
			return false;
		}
		
		
		var c_data 	= $(this).serialize();
		
		
		$.ajax({
		url:"<?php echo base_url().'earnpoint/save_address/plant'?>",
		type:"post",
		data:c_data,
		beforeSend:function()
		{
			
			$("#prgs").html("<img src='<?php echo base_url()?>assets/images/loading.gif'>");
		},
		success:function(html)
		{
			//alert(html);
			window.location="<?php echo base_url()?>earnpoint/plant_request";
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
	
		<div style="background:#00A1E3; color:#fff; width: 400px; margin: 100px auto; 
					padding: 10px; border-radius: 5px; text-align:center;"> 
					
			<h1> Coming Soon To Your City </h1>
		</div>
	
<!--	
		<div id="erp_div">
		
			<div id="step_hd"> 
				<b> Enter Recipient Information </b>
				<p> Please enter a valid address and contact number. </p>
			</div>
		
			
		
			
			<div id="address_form" class="myform">
			
				<form class="form2" action="" id="contact_form_1" method="post">

					<div class="formtitle">
						<?php echo (isset($r_data->contact_no)?'This is your last delivery address, click on edit details if you want to edit or enter new Delivery Address':'Enter Delivery Details') ?>
					</div>
					
					
					<div class="input">
						<div class="inputtext">Contact Number: </div>
						
						<div class="inputcontent">

							<input 
								type="text" 
								name="contact_no" 
								value="<?php echo (isset($r_data->contact_no)?$r_data->contact_no:'') ?>" 
								<?php echo (isset($r_data->contact_no)?'readonly':'') ?> 
								class="<?php echo (isset($r_data->contact_no)?'disabled':'enabled') ?>" 
								id="phone_no"/>
							<br><br>
						</div>
					</div>
					
					<div class="input">
						<div class="inputtext">Contact Address: </div>
						
						<div class="inputcontent">

							<textarea 
								name="address" 
								rows="5" cols="25" 
								<?php echo (isset($r_data->address)?'readonly':'') ?> 
								class="<?php echo (isset($r_data->address)?'disabled':'enabled') ?>" 
								id="address"><?php echo (isset($r_data->address)?$r_data->address:'') ?></textarea>
							<br><br>
							
							<div style="text-align:right; padding: 5px;">
								<?php echo (isset($r_data->address)?'<span id="edit_btn">Edit Details</span>':'') ?>
							</div>
							
						</div>
					</div>

				
					<div class="buttons">
						
						<span id="prgs"></span>
						
						<input class="orangebutton" type="submit" value="Save and Proceed" />

					</div>

				</form>
			</div>
			
		</div>
		
-->	
		
	</div>

	
	
	

</div>