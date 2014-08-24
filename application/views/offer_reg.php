<link href="<?php echo base_url()?>assets/css/contact.css" type="text/css" rel="stylesheet"/>
<link href="<?php echo base_url()?>assets/css/pikaday.css" type="text/css" rel="stylesheet"/>

<script type="text/javascript">

$(document).ready(function()
{

	var proof_op='';
	
	$("#proof").change(function()
	{
		$("#proof_val").fadeIn("fast").focus();
		
		proof_op = $(this).val();
		
		
		return false;
	});
	
	function checkEmail(e) 
	{
		var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
		if (!filter.test(e)) 
		{
			return false;
		}
		
	}
	
	
	$("#offer_form").submit(function()
	{
		var email	= $("#email").val();
		var contact	= $("#contact_no").val();
		var address	= $("#address").val();
		var pin 	= $("#pincode").val();
		var proof 	= $("#rc").val();
		
		
		if(email=='' || checkEmail(email)==false)
		{
			$("#errs").show().html("Please Fill Valid Email ID");
			$("#email").focus();
			return false;
		}
		if(contact=='' || isNaN(contact) || contact.length<6)
		{
			
			$("#errs").show().html("Please Fill Valid Contact No.");
			$("#contact_no").focus();
			return false;
		}
		if(address=='' || address.length<10)
		{
			
			$("#errs").show().html("Please Fill Valid Address");
			$("#address").focus();
			return false;
		}
		if(pin=='' || pin.length<6 || pin.length>6)
		{
			
			$("#errs").show().html("Please Fill Valid PinCode");
			$("#pincode").focus();
			return false;
		}
		if(proof=='')
		{
			
			$("#errs").show().html("Please fill Valid Car No.");
			$("#rc").focus();
			return false;
		}
		else
		{	
			return true;
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
	
	<?php
		if($this->session->flashdata('mail_msg'))
			echo '<script type="text/javascript">alert("'.$this->session->flashdata('mail_msg').'")</script>';
	
	?>
	
	<div id="content_div">
		
		<div id="erp_div">
			
			<div id="step_hd"> 
				<b> Register for Carpool Offers  </b>
				<p> Please complete this registration process before providing any carpool offers. </p>
			</div>
		
				
			<div id="qns">
			
				<div class="formtitle">Following information will be your contact and identification details. </div>
				
				<div id="qns_cont">
				
					<div class="msg">
						<?php 
							echo validation_errors();
						
						?>
					</div>
					
					<form action="<?php echo base_url()?>carpool/offer" method="POST" id="offer_form">
					
					<div class="input">
					
						<div class="inputtext">Email :  </div>
						
						<div class="inputcontent">
							<input type="text" name="email" id="email" ><span id="mailerr" ></span> 
							<br>
							<small>* This will be your contact email for verfication.</small>
						</div>
					</div>

					<div class="input">
						<div class="inputtext">Contact No :  </div>
						
						<div class="inputcontent">
							<input type="text" name="contact_no" id="contact_no" ><span id="cntcerr"></span>
							<br>
							<small>* This will be your contact Number</small>
							
						</div>
						
					</div>

					<div class="input">
						<div class="inputtext"> Address : </div>
						
						<div class="inputcontent">
						
							<textarea name="address" id="address" rows="5" cols="23"></textarea><span id="adderr"></span>
						</div>					
					</div>
					
					<div class="input">
						<div class="inputtext">Pin Code :  </div>
						
						<div class="inputcontent">
							<input type="text" name="pincode" id="pincode" ><span id="pinerr"></span>
							
						</div>
						
					</div>
					
					<div class="input">
						<div class="inputtext">Car RC No. :  </div>
						
						<div class="inputcontent">
							<input type="text" name="car_rc" id="rc" ><span id="rcerr"></span>
							
						</div>
						
					</div>
					
					
					
					
					<div class="buttons">
						
						<span id="prgs"></span>
						
						<input class="orangebutton"  name="submit" type="submit" value="Submit" />

					</div>
					
					<div id="errs"></div>	
						
					</form>
			
				</div>
			
			</div>
			
			
		
		</div>
		
		
	</div>
	
	

</div>



<script type="text/javascript" src="<?php echo base_url()?>assets/js/pikaday.js"></script>
<script type="text/javascript" >

var picker = new Pikaday(
{
	field: document.getElementById('datepicker'),
	firstDay: 1,
	minDate: new Date(<?php echo date('Y-m-d')?>),
	maxDate: new Date('2050-12-31'),
	yearRange: [<?php echo date('Y')?>,2050]
});

</script>

