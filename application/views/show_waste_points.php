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
		
		if(phone == "" || phone%1>0 || isNaN(phone))
		{
			alert("Please enter valid phone no in numeric format");
			return false;
		}
		else if($("#address").val()=="")
		{
			alert("Please Enter Adderss");
			return false;
		}
		
	
		var c_data 	= $(this).serialize();
		
	
		$.ajax({
		url:"<?php echo base_url().'earnpoint/save_address/waste'?>",
		type:"post",
		data:c_data,
		beforeSend:function()
		{
			
			$("#prgs").html("<img src='<?php echo base_url()?>assets/images/loading.gif'>");
		},
		success:function(html)
		{
			//alert(html);
			window.location="<?php echo base_url()?>earnpoint/waste_request";
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
		
			<div id="step_hd"> 
				<b> Points Earned by Waste Pick Service </b>
			</div>
		
			<div class="formtitle">
				Total Number of Picked Wastes : <?php echo $total?>
			</div>
		
			<div class="formtitle">
				Your Total Balance from Waste Pick Service is : Rs. <?php echo $totalpoints;?> 
			</div>
		
			<div id="point">
			
				<table border="0" class="tab1">
					<tr>
						<th>#</th>
						<th>Date</th>
						<th>Point</th>
						
						<th>Status</th>
					</tr>
			
				<?php
				
				$no	= (($this->uri->segment(3))?$this->uri->segment(3)+1:1);
				
				
				if(is_array($points) && !empty($points)):
					foreach($points as $pt):
				?>
					<tr>
						<td><?php echo $no++ ?> </td>
						<td>
							<?php date_default_timezone_set('Asia/kolkata');
							echo date('M d, Y  g:i A', strtotime($pt->date_time)+5400);?>
							
						</td>
						<td><?php echo $pt->point ?> </td>
						
						<td><?php echo $pt->status;?> </td>
					</tr>				
				
				<?php
					endforeach;
				else:
					echo '<tr><td colspan="4" class="msg">Please make request to earn point</td></tr>';
				endif;
				?>
				
				</table>
			
			
			</div>
			
			<?php echo $pagination ?>
			
		</div>
		
		<!--
		<div id="right_div">
		
			<?php echo $user_detail ?>
		
		</div>
		-->
		
	</div>

	
	
	

</div>