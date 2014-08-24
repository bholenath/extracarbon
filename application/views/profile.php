<link href="<?php echo base_url()?>assets/css/contact.css" type="text/css" rel="stylesheet"/>
<link href="<?php echo base_url()?>assets/css/tab.css" type="text/css" rel="stylesheet"/>

<script type="text/javascript"src="<?php echo base_url()?>assets/js/jquery_tab.js"></script>

<style type="text/css">

#msg1,#msg2, #msg3{	position:absolute; left:750px; top:410px; border:solid 1px #d2651d; padding: 10px; border-radius:5px; display:none; 
background:#f5dfd0; width:250px; }
#prgs1 { position:relative; padding:0 10px; display:none; width:30px; float:right; margin:0 1%; }
.tab_content{ min-height:200px;}

</style>

<script type="text/javascript">

$(document).ready(function() {

	//Default Action
	
	$(".tab_content").hide(); 
	$("ul.tabs li:first").addClass("active").show(); 
	$(".tab_content:first").show(); 
	
	//On Click Event
	
	$("ul.tabs li").click(function() {
		$("ul.tabs li").removeClass("active"); 
		$(this).addClass("active"); 
		$(".tab_content").hide(); 
		var activeTab = $(this).find("a").attr("href"); 
		$(activeTab).fadeIn(); 
		return false;
	});

	// Contact From1 Submission 
	
	
	$("#contact_form_1").submit(function()
	{		
		var form1 = $(this).serialize();
		
		$.ajax({
		type:"post",
		url:"<?php echo base_url()?>dashboard/save_basic_info",
		data:form1,
		beforeSend:function()
		{
			$("#prgs1").show().html("<img src='<?php echo base_url()?>assets/images/loading.gif'>");
		},
		success:function(html)
		{
			$("#msg1").fadeIn("slow").html(html).delay(5000).fadeOut("slow");
			$("#prgs1").hide();
			
		}
		});
		
		return false;
	});
	
	
	$("#contact_form_2").submit(function()
	{
		var form2 = $(this).serialize();
		
		$.ajax({
		type:"post",
		url:"<?php echo base_url()?>dashboard/save_pool_info",
		data:form2,
		beforeSend:function()
		{
			$("#prgs2").show().html("<img src='<?php echo base_url()?>assets/images/loading.gif'>");
		},
		success:function(html)
		{
			$("#msg2").fadeIn("slow").html(html).delay(5000).fadeOut("slow");
			$("#prgs2").hide()
			
		}
		});
		
		return false;
	});
	
	
	$("#contact_form_3").submit(function()
	{
		var form3 = $(this).serialize();
		
		$.ajax({
		type:"post",
		url:"<?php echo base_url()?>dashboard/save_req_info",
		data:form3,
		beforeSend:function()
		{
			$("#prgs3").show().html("<img src='<?php echo base_url()?>assets/images/loading.gif'>");
		},
		success:function(html)
		{
			$("#msg3").fadeIn("slow").html(html).delay(5000).fadeOut("slow");
			$("#prgs3").hide()
			
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
				<b> User Profile </b>
				<p> You can change your profile details here.</p>
			</div>
		
			<div class="formtitle">
				You can edit your information here.
			</div>		
		
			<div id="point">
			
				<ul class="tabs">
					<li><a href="#tab1">Basic Details</a></li>
					<li><a href="#tab2">Pool Offer Details</a></li>
					<li><a href="#tab3">Car Search Details</a></li>
				</ul>
				
				<div class="tab_container">
				
					<div id="tab1" class="tab_content">
					
						<h2 style="margin:0;">Basic Details </h2>						
						
						<form class="form2" action="" id="contact_form_1" method="post">

							<div class="input">
								<div class="inputtext">Name: </div>
								<div class="inputcontent">
								
									<input type="text" name="name" id="name" value="<?php echo $user_data->name?>"/>
																		
								</div>
							</div>
							
							<div class="input">
								<div class="inputtext">Email: </div>
								<div class="inputcontent">

									<input type="text" name="email" id="email" value="<?php echo $user_data->email?>" readonly disabled/>
									<br>
									<small>* You can not change this Email ID</small>
								
								</div>
							</div>
							
							<div class="input">
								<div class="inputtext">Metro Card No.: </div>
								<div class="inputcontent">

									<input type="text" name="metro_no" id="metro_no" value="<?php echo @$user_data->metro_card_no?>" 
									class="required"/>
									
								</div>
							</div>
							
							<div class="input">
								<div class="inputtext">Gender: </div>
								<div class="inputcontent">

									<select name="gender" id="gender">
										<option value="male" <?php echo @($user_data->gender=='male'?'selected':'')?>>Male</option>
										<option value="female" <?php echo @($user_data->gender=='female'?'selected':'')?>>Female</option>
									</select>
								</div>
							</div>

						
							<div class="buttons">
								
								<span id="prgs1"></span>
								<input type="hidden" name="id" value="<?php echo $user_data->id?>">
								<input class="orangebutton" type="submit" value="Update" />

							</div>
							
							<span id="msg1"></span>

						</form>
						
					</div>
					
					
					<div id="tab2" class="tab_content">
					
						<?php if($pool_data): ?>
						<h2>Details of Carpool Offers </h2>
						
						<form class="form2" action="" id="contact_form_2" method="post">

							<div class="input">
								<div class="inputtext">Email: </div>
								<div class="inputcontent">

									<input type="text" name="email" id="pool_email" value="<?php echo @$pool_data->email?>"/>
									
								</div>
							</div>
							
							<div class="input">
								<div class="inputtext">Contact_no: </div>
								<div class="inputcontent">

									<input type="text" name="contact_no" id="pool_cntc" value="<?php echo @$pool_data->contact_no?>"/>
								
								</div>
							</div>
							
							<div class="input">
								<div class="inputtext">Address : </div>
								<div class="inputcontent">
									<textarea name="address" id="pool_address" cols="23"><?php echo @$pool_data->address?></textarea>
									
								</div>
							</div>
							
							<div class="input">
								<div class="inputtext">Pin Code: </div>
								<div class="inputcontent">

									<input type="text" name="pincode" id="pool_pin" value="<?php echo @$pool_data->pincode?>"/>
								
								</div>
							</div>
							
							<div class="input">
								<div class="inputtext">Car RC No.: </div>
								<div class="inputcontent">

									<input type="text" name="car_rc" id="pool_rc" value="<?php echo @$pool_data->car_rc?>"/>
								
								</div>
							</div>

						
							<div class="buttons">
								
								<span id="prgs2"></span>
								<input type="hidden" name="id" value="<?php echo @$pool_data->id?>">
								<input class="orangebutton" type="submit" value="Update" />

							</div>
							
							<span id="msg2"></span>
							

						</form>
						<?php
						else:
							echo '<br><br><p>You are not register for Car Pool Offers. Please register first.</p>';
						endif;
						?>
						
					</div>
					
					<div id="tab3" class="tab_content">
						
						<?php if($req_data): ?>
						
						<h2>Details of Car Search Request</h2>
						
						<form class="form2" action="" id="contact_form_3" method="post">

							<div class="input">
								<div class="inputtext">email: </div>
								<div class="inputcontent">

									<input type="text" name="email" id="pool_email" value="<?php echo @$req_data->email?>"/>
									
								</div>
							</div>
							
							<div class="input">
								<div class="inputtext">Contact_no: </div>
								<div class="inputcontent">

									<input type="text" name="contact_no" id="pool_cntc" value="<?php echo @$req_data->contact_no?>"/>
								
								</div>
							</div>
							
							<div class="input">
								<div class="inputtext">Address : </div>
								<div class="inputcontent">
									<textarea name="address" id="pool_address" cols="23"><?php echo @$req_data->address?></textarea>
									
								</div>
							</div>
							
							<div class="input">
								<div class="inputtext">Pin Code: </div>
								<div class="inputcontent">

									<input type="text" name="pincode" id="pool_pin" value="<?php echo @$req_data->pincode?>"/>
								
								</div>
							</div>
							
							<div class="input">
								<div class="inputtext">Car RC No.: </div>
								<div class="inputcontent">

									<input type="text" name="id_proof" id="pool_rc" value="<?php echo @$req_data->id_proof?>" />
									
								
								</div>
							</div>

						
							<div class="buttons">
								
								<span id="prgs3"></span>
								<input type="hidden" name="id" value="<?php echo @$req_data->id?>">
								<input class="orangebutton" type="submit" value="Update" />

							</div>
							
							<span id="msg3"></span>

						</form>
						
						<?php
						else:
							echo '<br><br><p>You are not register for Car Pool Request. Please register first.</p>';
						endif;
						?>
						
					</div>
					
				</div>
				
				
			</div>
			
		</div>
		

	</div>


</div>

<div id="back_div"></div>
<div id="ticket_div"></div>