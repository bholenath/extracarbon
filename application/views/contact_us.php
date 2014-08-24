<link type="text/css" href="<?php echo base_url()?>assets/css/contact.css" rel="stylesheet">

<style type="text/css">

#main_container{ width:98%; margin:auto; padding:10px; align:center; background:#fff; border-width:0 0 3px 0; 
-moz-border-image:url(../../assets/images/menu_back1.png) 25% 30% 10% 20% repeat;
-webkit-border-image:url(../../assets/images/menu_back1.png) 25% 30% 10% 20% repeat;
border-image:url(../../assets/images/menu_back1.png) 25% 30% 10% 20% repeat; font-family:'Open Sans',Arial,sans-serif; color:#555; 
}

#form {width:47%; border-right:solid 1px #aaa; float:left; padding:10px;}

#c_cont h1 {text-shadow: 1px 1px 0px #606060; color:#aaa; text-transform:uppercase;}

#address{width:48.8%; float:left; padding:10px;}

#c_err{display:none;}

.show{padding: 5px; border-radius: 5px; border:solid 1px red; }

#c_cont{border:solid 1px #cacaca; width:100%; height:99%; margin:2% auto; float:left; background:#f6f6f6; }

/*#logo_img{position:absolute; z-index:-1; left:10px;}
#c_cont:after{clear:both; display:block; content:"";}*/

</style>

<script type="text/javascript">

$(document).ready(function()
{
	function checkEmail(e) 
	{
		var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
		if (!filter.test(e)) 
		{
			return false;
		}
		
	}
	
	
	$("#contact_frm").submit(function()
	{
		var name 	= $("#name").val();
		var email	= $("#email").val();
		var subject	= $("#subject").val();
		var message	= $("#message").val();
		
		if(name=='' )
		{
			
			$("#c_err").addClass("show").show().html("Please Fill Name.");
			$("#name").focus();
			return false;
		}
		if(email=='' || checkEmail(email)==false)
		{
			$("#c_err").addClass("show").show().html("Please Fill Valid Email ID");
			$("#email").focus();
			return false;
		}
		
		if(subject=='')
		{
			
			$("#c_err").addClass("show").show().html("Please Fill subject");
			$("#subject").focus();
			return false;
		}
		
		if(message=='')
		{
			
			$("#c_err").addClass("show").show().html("Please Fill Message");
			$("#message").focus();
			return false;
		}
		else
		{	
			return true;
		}
		
	});
	
});

</script>

<div id="main_container">

	<div id="c_cont">
	
		<div id="form">
		
			<form action="<?php echo base_url()?>other/contact_us" method="post" id="contact_frm">
			
				<h1><font style="color:#7DC142;">Contact Us</font></h1>
				
				<hr>
						
				<div class="input">
							
					<div class="inputtext">Name  :</div>
					
					<div class="inputcontent">
					
						<input type="text" name="name" id="name" >

					</div>
					
				</div>
				
				<div class="input">
							
					<div class="inputtext">Email Id  :</div>
					
					<div class="inputcontent">
					
						<input type="text" name="email" id="email" >

					</div>
					
				</div>
				
				<div class="input">
							
					<div class="inputtext">Subject  :</div>
					
					<div class="inputcontent">
					
						
						<select name="subject" id="subject" style="width:58%; padding:5px 10px; font-size:16px;">
							<option value="">Choose Subject</option>
							<!-- <option value="Metro">Metro</option>
							<option value="Carpooling services">Carpooling services</option> -->
							<option value="Recycling services">Recycling services</option>
							<!-- <option value="Gift a plant">Gift a plant</option> -->
							<option value="Item Sell">Item Sell</option>
							<option value="Channel Partnership">Channel Partnership</option>
							<option value="Press">Press</option>
							<option value="Career">Career</option>
							<option value="Suggestion">Suggestion</option>
							<option value="Others">Others</option>
						</select>

					</div>
					
				</div>
				
				<div class="input">
							
					<div class="inputtext">Message :</div>
					
					<div class="inputcontent">
					
						<textarea rows="5" cols="35" name="message" id="message"></textarea> 

					</div>
					
				</div>
				
				<div class="buttons">
											
					<input class="orangebutton"  name="submit" type="submit" value="Submit" />

				</div>
				
				<div id="c_err"></div>
				
			</form>
		
		</div>
		
		<div id="address">
		
			<h1><font style="color:#7DC142;">Address</font></h1>
			
			<hr>
			
			<span class="space1"></span>
			
			<font style="font-size: 16px; color:#606060; font-family:'Open Sans',Arial,sans-serif; font-weight:bold;">EXTRACARBON</font>
			<br>
			<font style="font-size: 14px; line-height:20px; color:#606060; font-family:'Open Sans',Arial,sans-serif; font-weight:bold;"> 
			O-425, Jalvayu Vihar,<br>
			Sector 30, Gurgaon - 122001.<br>
			INDIA.<br>
			<div style="width:100%; margin:2% 0;"></div>
			<font style="font-size:16px;">Contact No. : +91 - 8510023399<br>
			<div style="width:100%; margin:2% 0;"></div>
			Mail Id : <a href="mailto:info@extracarbon.com">info@extracarbon.com</a></font></font>			
						
		</div>
		
	</div>		

</div>

<?php
if($this->session->flashdata('reply'))
echo '<script>alert("'.$this->session->flashdata('reply').'")</script>';
?>