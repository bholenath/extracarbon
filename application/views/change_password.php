<link href="<?php echo base_url()?>assets/css/contact.css" type="text/css" rel="stylesheet"/>

<script type="text/javascript"src="<?php echo base_url()?>assets/js/jquery_tab.js"></script>

<style>

#msg1 {	position:relative; border:solid 1px #d2651d; padding:10px; border-radius:5px; display:none; background:#f5dfd0; 
width:200px; float:right; margin:0 1%; }
#prgs1 { position:relative; padding:0 10px; display:none; width:30px; float:right; margin:0 1%; }

</style>

<script>

$(document).ready(function()
{

$("#contact_form_2").submit(function()
	{				
		var new_pss = $('#new_pss').val();
		var re_pss = $('#re_pss').val();
		
		if(new_pss === re_pss)
		{
	
		var form2 = $(this).serialize();
		
		$.ajax({
		type:"post",
		url:"<?php echo base_url()?>dashboard/save_changed_password",
		data:form2,
		beforeSend:function()
		{
			$("#prgs1").show().html("<img src='<?php echo base_url()?>assets/images/loading.gif'>");
		},
		success:function(html)
		{
			$('#old_pss').val("");	
			$('#new_pss').val("");
			$('#re_pss').val("");					
			$('#old_pss').focus();		
			$("#prgs1").hide();
			$("#msg1").fadeIn("slow").html(html).delay(5000).fadeOut("slow");									
		}
			});
			
		return false;
		
		}	
		
		else
		{
		alert("Sorry! Passwords do not match. Try Again.");
		$('#new_pss').val("");
		$('#re_pss').val("");
		$('#new_pss').focus();		
		return false;		
		}
		
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
				<b> Change Password </b>
				<p> Please fill all fields </p>
			</div>					
				
			<div id="qns">
			
				<div class="formtitle">Please Enter Password</div>
				
				<div id="qns_cont">
					<!-- <div class="msg">
						<?php 
							//echo validation_errors();
						
							//echo $this->session->flashdata('err_pss');
							//echo $this->session->flashdata('pss_chng');
						
						?>
			
					</div> -->
					<form class="form2" action="" id="contact_form_2" method="post">
					
					<div class="input">
					
						<div class="inputtext"> Old Password : </div>
						
						<div class="inputcontent">
						
							<input type="password" name="old_pss" id="old_pss" required>
							<?php //echo '<span class="msg">'.form_error('old_pss').'</span>' ?>
						</div>
						
					</div> 
					
					
					<div class="input">
					
						<div class="inputtext"> New Password : </div>
						
						<div class="inputcontent">
						
							<input type="password" pattern=".{6,15}" name="new_pss" id="new_pss" required>
							<?php //echo '<span class="msg">'.form_error('new_pss').'</span>' ?>
							
						</div>						
						
					</div>
					
					<div class="input">
					
						<div class="inputtext"> Retype Password : </div>
						
						<div class="inputcontent"> 
						
							<input type="password" pattern=".{6,15}" name="re_pss" id="re_pss" required>
							<?php //echo '<span class="msg">'.form_error('re_pss').'</span>' ?>
							
						</div>
						
					</div>	
					
						<div class="buttons" style="margin-bottom:2%;">
						
							<!-- <span id="prgs"></span> -->
							<input type="hidden" name="id" value="<?php echo $user_data->id?>">
						
							<input class="orangebutton" name="submit" type="submit" value="Submit"/>
							
							<span id="prgs1"></span>
								
							<span id="msg1"></span>

						</div>					
						
					</form>
			
				</div>
			
			</div>		
			
		</div>			
		
	</div>

</div>