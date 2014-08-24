<style type="text/css">
#req_frm form
{
	text-align:left;
}
#proof_val
{
	display:none;
	border:solid 1px #606060;
	margin-top:2px;
}
#proof {width:210px; height:28px; padding:5px 0;}
</style>

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
	
	
	$("#form").submit(function()
	{
		var email	= $("#email").val();
		var contact	= $("#contact_no").val();
		var address	= $("#address").val();
		var pin 	= $("#pincode").val();
		var proof 	= $("#proof_val").val();
		
		
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
		if(proof=='' || proof_op=='')
		{
			
			$("#errs").show().html("Please fill Proof ID");
			$("#proof").css("background", "#f8cfb7");
			return false;
		}
		else
		{	
			//return true;
			
			$.ajax({
			type:"post",
			url:"<?php echo base_url()?>carpool/request_register",
			data:"email="+email+"&contact_no="+contact+"&address="+address+"&pin="+pin+"&proof_op="+proof_op+"&proof_val="+proof,
			beforeSend:function()
			{
				$("#req_frm").html("<img src='<?php echo base_url()?>assets/images/loading_larg.gif'>");
			},
			success:function(html)
			{
				$("#req_frm").hide();
				$("#back_div").hide();
				alert(html);
			/*	window.location.reload();	*/
				return false;
			}
			});
		return false;
		}
	});
	
	$("#cancel").click(function()
	{
		$("#req_frm").hide();
		$("#back_div").hide();
	});
	
});

</script>


	<h2> Kindly Register Yourself To View Details of Car Provider</h2>
	
	<hr>
	
	
	<form action="<?php echo base_url()?>carpool/" method="POST" id="form">
	
	<div class="input">
	
		<div class="inputtext">Email :  </div>
		
		<div class="inputcontent">
			<input type="text" name="email" id="email" ><span id="mailerr"></span> 
			<br>
			<small>* This will be your contact email for verification.</small>
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
		<div class="inputtext">ID Proof :  </div>
		
		<div class="inputcontent">
			<select id="proof">
				<option value="">SELECT ANY PROOF </option>
				<option value="voter_id">Voter ID No. </option>
				<option value="pancard_id">PAN Car No. </option>
				<option value="passport_id">Passport Card No. </option>
				<option value="drivinglicense_id">Driving License No. </option>
				
			</select>
			
			<input type="text" name="proof_nm" id="proof_val"><span id="rcerr"></span>
			
		</div>
		
	</div>
	
	
	
	
	<div class="">
		
		
		<input class="orangebutton"  name="submit" type="submit" value="Submit" />
		<button class="greybutton1" id="cancel" >Cancel</button>

	</div>
	
		<div id="errs"></div>
		
		
	</form>
			

