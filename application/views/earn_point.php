<link href="<?php echo base_url()?>assets/css/contact.css" type="text/css" rel="stylesheet"/>

<script type="text/javascript">

$(document).ready(function()
{
	$("#contact_form_1").submit(function()
	{
		var c_data 	= $(this).serialize();

		$.ajax({
		url: "<?php echo base_url().'earnpoint/earn_point_1'?>",
		type:"post",
		data:c_data,
		beforeSend:function()
		{
			$("#prgs").html("<img src='<?php echo base_url()?>assets/images/loading.gif'>");
		},
		success:function(html)
		{
			<?php if(isset($_GET['ref'])): ?>
				window.location="<?php echo base_url().'earnpoint/request/'.$_GET['ref']?>";
			<?php else: ?>
				alert('Now please upload your ticket from Upload Ticket option');
				window.location="<?php echo base_url().'earnpoint/upload_ticket/?ref=erp'?>";
			<?php endif; ?>
			
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
				<b> You are just two steps away </b>
			</div>
		
			
		
			
			<div id="address_form" class="myform">
			
				<form class="form2" action="" id="contact_form_1" method="post">

					<div class="formtitle">Please Enter your Contact Details</div>
					
					
					<div class="input">
						<div class="inputtext">Contact Address: </div>
						<div class="inputcontent">

							<input type="text" name="contact_add" value="<?php echo (isset($user_data->contact_add)? $user_data->contact_add:'') ?>"/>

						</div>
					</div>

					<div class="input">
						<div class="inputtext">Contact Number: </div>
						<div class="inputcontent">

							<input type="text" name="contact_no" value="<?php echo (isset($user_data->contact_no)? $user_data->contact_no:'') ?>"/>

						</div>
					</div>
				<!--
					<div class="input">
						<div class="inputtext">Gender: </div>
						<div class="inputcontent">

							Male : &nbsp;&nbsp;&nbsp;&nbsp;
							<input type="radio" name="gender" value="male" class="rad" <?php echo (($user_data->gender=='male')?'checked':'checked')?> />
							<br>
							Female : 
							<input type="radio" name="gender" value="female" class="rad" <?php echo (($user_data->gender=='female')?'checked':'')?>/>

						</div>
					</div>
				-->
					<div class="buttons">
						
						<span id="prgs"></span>
						
						<input class="orangebutton" type="submit" value="Save" />

					</div>

				</form>
			</div>
			
			<!-- ----------- Alert Message if Address is Empty -------------->
				
				<?php if($this->session->flashdata('emtpy_address')) :?>
				
				<script type="text/javascript">
					alert("<?php echo $this->session->flashdata('emtpy_address'); ?>")
				</script>
				
				<?php endif; ?>
			
			<!-- -------------Ends here --------------->
			
			
			
			<!-- ----------- Alert Message if Phone is Empty -------------->
			
				<?php if($this->session->flashdata('emtpy_phone')) :?>
				
				<script type="text/javascript">
					alert("<?php echo $this->session->flashdata('emtpy_phone'); ?>")
				</script>
				
				<?php endif; ?>
			
			<!-- -------------Ends here --------------->
			
			
			
			
			<!-- ----------- Alert Message if Rquest is submitted -------------->
			
				<?php if($this->session->flashdata('req_waste_msg')) :?>
				
				<script type="text/javascript">
					alert("<?php echo $this->session->flashdata('req_waste_msg'); ?>")
					window.location="<?php echo base_url()?>dashboard"
				</script>
				
				<?php endif; ?>
		
			<!-- -------------Ends here --------------->
		
		
		</div>
		
		
		<div id="right_div">
		
			<div id="right_hd">Account Details </div>
			
			<div id="user_detail">
			
				<table class="acc_dtl">
				
					<tr class="tbl_odd">
						<th >Name </th> <td>: <?php echo ucwords($user_data->name)?> </td>
					</tr>
					
					<tr>
						<th>Email </th> <td>: <?php echo $user_data->email?> </td>
					</tr>
					
					<tr class="blnce tbl_odd">
						<th >Balance </th> <td >: Rs. <?php echo $user_data->user_point?> </td>
					</tr>
					
					<tr >
						<th>Metro Card No. </th> <td>: <?php echo $user_data->metro_card_no?> </td>
					</tr>
					
					<tr class="tbl_odd">
						<th>Contact No. </th> <td>: <?php echo $user_data->contact_no?> </td>
					</tr>
					
					<tr>
						<th>Contact Address </th> <td>: <?php echo $user_data->contact_add?> </td>
					</tr>
				
				</table>
			
			</div>
			
		
		</div>
		
	</div>

	
	
	

</div>