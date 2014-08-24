<link href="<?php echo base_url()?>assets/css/contact.css" type="text/css" rel="stylesheet"/>

<script type="text/javascript">

$(document).ready(function()
{
		
	$("#send").click(function()
	{
		var phone = $("#phone_no").val();
		trim1 = $.trim(phone);
		var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
		var mail = $("#e_mail").val();
		trim = $.trim(mail);
		
		if(document.waste_pickup.phone_no.value.trim()=="" || document.waste_pickup.address.value.trim()=="" || 
		document.waste_pickup.e_mail.value.trim()=="")
		{
			alert("  Please Fill all the Compulsory Fields  ");
			waste_pickup.phone_no.focus();
			return false;
		}
		else if(trim.search(filter) == -1)
		{
			alert(" Please Enter a Valid Email Address ");
			$("#e_mail").focus();
			return false;
		}
		else if(!trim1.toString().match(/^[-]?\d*\-?\d*$/))
		{
			alert(" Please enter a Valid Phone No. in Numeric Format ");
			$("#phone_no").focus();
			return false;
		}
				
		else 
		
			return true;			
					
	});
				
});

</script>


<div id="dashboard_container" style="font-family:'Open Sans',Arial,sans-serif;">

	   <div id="content_div1">
						
			<div id="step_hd"> 
				<b> Enter Pick-Up <font style="color:#7DC142;">Information</font> </b>
				<p> Please enter a valid address and contact number. </p>
			</div>
		
			<form action="<?php echo base_url()?>home/pickup" target="_self" name="waste_pickup" enctype="multipart/form-data" 
			id="waste_pickup" method="post">												
									
			<div style="margin:2% 0; float:left; width:100%;">
			
				<div class="inputtext">Contact Number: <font color="#c41200">*</font></div>
														
				<input type="text" name="phone_no" tabindex="1" id="phone_no" maxlength="10" required style="border:1px solid green; 
				width:40%; height:auto; padding:5px; -moz-box-shadow: inset 0 0 1px #186DED; -webkit-box-shadow: inset 0 0 1px #186DED;
  				box-shadow:inset 0 0 1px #186DED; text-align:left; border-radius:5px;"/>
															
			</div>
					
			<div style="margin:2% 0; float:left; width:100%;">
			
				<div class="inputtext">Email Id: <font color="#c41200">*</font></div>
														
				<input type="text" name="e_mail" tabindex="2" id="e_mail" maxlength="64" required style="border:1px solid green; 
				width:60%; height:auto; padding:5px; -moz-box-shadow: inset 0 0 1px #186DED; -webkit-box-shadow: inset 0 0 1px #186DED;
  				box-shadow: inset 0 0 1px #186DED; text-align:left; border-radius:5px; "/>
															
			</div>		
					
					
			<div style="margin:2% 0; float:left; width:100%;">
			
				<div class="inputtext">Contact Address: <font color="#c41200">*</font></div>
				
				<textarea id="address" name="address" tabindex="3" maxlength="300" rows="5" cols="45" required 
				style="border:1px solid green; padding:5px; -moz-box-shadow: inset 0 0 1px #186DED; 
				-webkit-box-shadow: inset 0 0 1px #186DED; width:80%; box-shadow: inset 0 0 1px #186DED; text-align:left; 
				border-radius:5px;"></textarea>
				
			</div>
			
			
			<div style="margin:2% 0; float:left; width:100%;">
			
				<div class="inputtext">Specific Instructions:</div>
				
				<textarea id="instruction" name="instruction" tabindex="4" maxlength="300" rows="5" cols="45" 
				style="border:1px solid green; padding:5px; -moz-box-shadow: inset 0 0 1px #186DED; border-radius:5px; width:80%;
				-webkit-box-shadow: inset 0 0 1px #186DED; box-shadow: inset 0 0 1px #186DED; text-align:left;"></textarea>
				
			</div>
			
			<font style="color:#c41200; font-size:14px;"> * fields are Compulsory </font>
				
			<div class="buttons" style="margin:2% 0; float:left; width:100%;">
						
				<input type="submit" class="orangebutton" tabindex="5" id="send" value=" Submit " style="height:auto; padding:7px 0; 
				width:40%;"/>

			</div>
						
			</form>
			         		
	  </div>
	  
	  		
	  <div id="content_div2">
		 
		 <div id="step_hd"> 
				<b> Items we <font style="color:#7DC142;">Deal In</font> </b>
		 </div>
										 
		 <div style="margin:2% 0;">
		 
			<font style="font-family:'Open Sans',Arial,sans-serif; font-weight:bold; font-size:16px; color:#555; text-align:justify;">
			
			We would provide you Handsome Amount for the following Waste Items : 
			
			<ul style="margin:4% 0;">
			<li style="margin:2% 0;">Scrap Metal.</li>
			<li style="margin:2% 0;">Any form of Paper - NewsPaper , Magazines , Books etc.</li>
			<li style="margin:2% 0;">E-Waste comprising all Electronic Items and Peripherals.</li>		
			</ul>
			
			<center>	
			
			<font style="font-family:'Open Sans',Arial,sans-serif; font-weight:bold; font-size:18px; color:#555;">
			Just Call / Mail us. We are always Ready to Serve you. 
			</font>
			
			<br><br>
			
			<img src="<?php echo base_url()?>assets/images/phone.png" width="40px" height="40px" style="margin-right:1%;">
			<img src="<?php echo base_url()?>assets/images/mail.png" width="40px" height="40px">
			
			</center>	
			
			</font>
						
			<font style="font-family:'Open Sans',Arial,sans-serif; font-weight:bold; font-size:15px; color:#33B133;">
			
			<div style="width:100%; margin-top:1%; float:left; position:relative;">
			
			<span style="width:72%; float:left; position:relative; margin-right:0.5%; padding-top:2.5%;">			
			We help to keep your surrounding Neat and Clean.<br><br>
			We work to reduce Carbon Imprint from Earth.<br><br> 
			Our motto is Recycle Reduse Reuse.<br><br>
			Help us to make World a better Place.<br><br>
			</span>
			
			<span style="width:27%; margin-left:0.5%; float:right; position:relative;">
			<img src="<?php echo base_url()?>assets/images/favicon.png" width="100%" height="155px" style="vertical-align:middle; 
			float:right;">
			</span>	
				
			</div>
			
			</font>
						
		 </div>
					 	 
	</div>
		
</div>