<link href='http://fonts.googleapis.com/css?family=Yanone+Kaffeesatz:300' rel='stylesheet' type='text/css'>

<style type="text/css">

#home_stuff
{
	display:none; position:fixed; top:0; left:0px; width:100%; height:100%; background:rgba(0, 0, 0, .5);
	border-radius:0 0 5px 5px; text-align:center; padding: 10px 0; cursor:pointer; z-index:999;
}

#home_stuff_new
{
	 position:fixed; top:0; left:0px; width:100%; height:100%; background:rgba(0, 0, 0, .5);
	border-radius:0 0 5px 5px; text-align:center; padding: 10px 0; cursor:pointer; z-index:999;
}
#home_stuff_menu
{
	margin:10% auto; border:solid 0px #000; padding: 10px 0; width:100%; z-index:1000;
}

#home_stuff_menu a
{
	margin:0 10px; padding: 5px; font-size: 15px; font-weight:bold; color:#000; text-transform:uppercase;
}

.signup_div, .sign_div
{
	display:none; margin:auto 34.1%; padding:1.5%; text-align:left; background:#F9F9F9; border:1px solid #cacaca;
}
.signup_div_new, .sign_div_new
{
	margin:auto 34.1%; padding:1.5%; text-align:left; background:#F9F9F9; border:1px solid #cacaca;
}

.col_1
{
	margin:auto; width:100%;
}

#err_msg
{
	margin:auto 34.1%; width:300px;
}
#err_msg1
{
	margin:auto 34.1%; width:300px;
}

#rem, #rem a 
{
    color: #606060; font-size: 12px;
}

.ida:hover
{
-moz-box-shadow:inset 0 0 7px #00C5FE; -webkit-box-shadow:inset 0 0 7px #00C5FE; box-shadow:inset 0 0 7px #00C5FE;
}

.ida:active,.ida:focus
{
-moz-box-shadow:inset 0 0 7px #1473BB; -webkit-box-shadow:inset 0 0 7px #1473BB; box-shadow:inset 0 0 7px #1473BB;
}

#map-canvas 
{
height:275px;
width:98%;
margin:auto 1%;
border:1px #b3b3b3 solid;
overflow:hidden;
}				

#big_map { font-size:16px; font-family:'Open Sans',Arial,sans-serif; font-weight:600; text-align:center; width:100%; float:left; 
margin-top:2%; }

</style>

<!-- <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script> -->

<script>
/*
var locations = [
				['Valley View', 28.43562, 77.13629],
				['Essel Tower', 28.47605, 77.07464],
				['Wellington Estate', 28.44715, 77.09566],
				['M2K Aura', 28.42658, 77.05519],
				['Park View II', 28.40142, 77.04258],
				['Parshvnath Greenville', 28.40946, 77.04269],
				['Omaxe Nile', 28.41035, 77.05183],
				['Lilac 1', 28.41397, 77.05087],
				['Galaxy Apartments', 28.45413, 77.09548],
				['Unitech South Close', 28.41017, 77.05818],
				['Unitech North Close', 28.41017, 77.05818],
				['Unitech World Spa East', 28.46038, 77.05789],
				['Unitech World Spa West', 28.46038, 77.05789],
				['Uppal South End', 28.41049, 77.04637]
				];

function initialize() {
  
  var mapOptions = 
  {
    zoom: 14,
    center: new google.maps.LatLng(28.44715, 77.09566),
	mapTypeId: google.maps.MapTypeId.ROADMAP
  };

  var map = new google.maps.Map(document.getElementById('map-canvas'),mapOptions);
  
  var infowindow = new google.maps.InfoWindow();
  var marker,i;
  var bounds = new google.maps.LatLngBounds();
  
  for (i = 0; i < locations.length; i++) 
	{ 
	var mylatlng =  new google.maps.LatLng(locations[i][1] , locations[i][2]);
	marker = new google.maps.Marker({position: mylatlng , map: map , title: 'Click to Zoom'});
	bounds.extend(mylatlng);
				
	google.maps.event.addListener(marker, 'click', (function(marker, i) {
	return function() {
	infowindow.setContent(locations[i][0]);
    infowindow.open(map, marker);
	map.setZoom(15);
	map.panTo(marker.getPosition());
	}
  	})(marker, i));	
	
	google.maps.event.addListener(marker, 'zoom_changed', (function(marker) {
	return function() {
	window.setTimeout(function() {
    map.panTo(marker.getPosition());
    }, 1000);
	}
	})(marker));
		
	}	
	map.fitBounds(bounds);
   
}

google.maps.event.addDomListener(window, 'load', initialize);*/

</script>

<script type="text/javascript">
	
function validate_login()
{
	if(login_form.username.value=="")
	{
		//alert("Please enter username");
		document.getElementById("err_msg").style.display="block";
		document.getElementById("err_msg").innerHTML="Please enter Username";
		login_form.username.focus();
		return false;
	}
	
	if(login_form.password.value=="")
	{
		//alert("Please enter password");
		document.getElementById("err_msg").style.display="block";
		document.getElementById("err_msg").innerHTML="Please enter Password";
		login_form.password.focus();
		return false;
	}
	
	else
		
		return true;
}

function validate_signup()
{
	function alpha_test(v)
	{		
		if(!/^[a-z0-9- ]+$/i.test(v)) 
		{
		   //alert('Name can only be alpha numeric with hypen.');
		   return false;
		}
	}

	function checkEmail(e) 
	{
		var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
		if (!filter.test(e)) 
		{
			return false;
		}
		
	}
	
	function trim(value) 
	{
	  value = value.replace(/^\s+/,'');
	  value = value.replace(/\s+$/,'');
	  return value;
	}
	
	if(trim(signup_form.name.value)=="" || alpha_test(trim(signup_form.name.value))==false)
	{
		//alert("Please enter name");
		
		document.getElementById("err_msg").style.display="block";
		document.getElementById("err_msg").innerHTML="Please enter valid name in Alpha-Numeric";
		signup_form.name.focus();
		return false;
	}
	
	if(trim(signup_form.email.value)=="" || checkEmail(signup_form.email.value)==false)
	{
		//alert("Please enter email");
		
		document.getElementById("err_msg").style.display="block";
		document.getElementById("err_msg").innerHTML="Please enter a Valid Email-Id";
		signup_form.email.focus();
		return false;
	}
	if(trim(signup_form.password.value)=="")
	{
		//alert("Please enter password");
		
		document.getElementById("err_msg").style.display="block";
		document.getElementById("err_msg").innerHTML="Please enter Password";
		signup_form.password.focus();
		return false;
	}
	
	else
	
		return true;
}
function validate_login_new()
{
	if(login_form_new.username_new.value=="")
	{
		document.getElementById("err_msg1").style.display="block";
		document.getElementById("err_msg1").innerHTML="Please enter Username";
		login_form_new.username_new.focus();
		return false;
	}
	
	if(login_form_new.password_new.value=="")
	{
		//alert("Please enter password");
		document.getElementById("err_msg1").style.display="block";
		document.getElementById("err_msg1").innerHTML="Please enter Password";
		login_form_new.password_new.focus();
		return false;
	}
	
	else
		
		return true;
}

function validate_signup_new()
{
	function alpha_test(v)
	{		
		if(!/^[a-z0-9- ]+$/i.test(v)) 
		{
		   //alert('Name can only be alpha numeric with hypen.');
		   return false;
		}
	}

	function checkEmail(e) 
	{
		var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
		if (!filter.test(e)) 
		{
			return false;
		}
		
	}
	
	function trim(value) 
	{
	  value = value.replace(/^\s+/,'');
	  value = value.replace(/\s+$/,'');
	  return value;
	}
	
	if(trim(signup_form_new.name_new.value)=="" || alpha_test(trim(signup_form.name_new.value))==false)
	{
		//alert("Please enter name");
		
		document.getElementById("err_msg1").style.display="block";
		document.getElementById("err_msg1").innerHTML="Please enter valid name in Alpha-Numeric";
		signup_form_new.name_new.focus();
		return false;
	}
	
	if(trim(signup_form_new.email_new.value)=="" || checkEmail(signup_form.email_new.value)==false)
	{
		//alert("Please enter email");
		
		document.getElementById("err_msg1").style.display="block";
		document.getElementById("err_msg1").innerHTML="Please enter a Valid Email-Id";
		signup_form_new.email_new.focus();
		return false;
	}
	if(trim(signup_form_new.password_new.value)=="")
	{
		//alert("Please enter password");
		
		document.getElementById("err_msg1").style.display="block";
		document.getElementById("err_msg1").innerHTML="Please enter Password";
		signup_form_new.password_new.focus();
		return false;
	}
	
	else
	
		return true;
}

function validate()
{
var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
var mail = $("#mailid").val();
trim = $.trim(mail);
if(trim.search(filter) == -1) 
{
alert(" Please Enter a Valid Email Address ");
$("#mailid").focus();
}	
else
check_mail_list(trim);
}

function mail_list(mailid)
{
$.ajax({
		type:"POST",
		url:"<?php echo base_url()?>home/mail_list",
		data:"mailid="+mailid,		
		success:function(response)
		{		
		$("#newsletter_response").show().html(response).focus();	
		$("#mailid").attr("value", "");			
		}
	  });
}

function check_mail_list(check_mailid)
{
$.ajax({
		type:"POST",
		url:"<?php echo base_url()?>home/check_mail_list",
		data:"check_mailid="+check_mailid,		
		success:function(response1)
		{		
		if(response1=="true")
			{
		$("#newsletter_response").show().html("This Id already Exists. Please Choose a Different Email-Id.").focus();
		return false;
			}
		else if(response1=="false")
			{
		$("#newsletter_response").hide();
		mail_list(check_mailid);
			}
		}				
	  });
}

function validate1()
{
var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
var mail = $("#feed_mail").val();
var name = $("#feed_name").val();
var msg = $("#feed_msg").val();
var trim = $.trim(mail);
var trim1 = $.trim(name);
var trim2 = $.trim(msg);
if(trim1=="")
{
document.getElementById("reg_err1").style.display="block";
document.getElementById("reg_err1").innerHTML="Please Enter your Name";
$("#feed_name").focus();
}
else if(trim=="" || trim.search(filter) == -1) 
{
document.getElementById("reg_err1").style.display="block";
document.getElementById("reg_err1").innerHTML="Please Enter a Valid Email-Id";
$("#feed_mail").focus();
}	
else if(trim2=="") 
{
document.getElementById("reg_err1").style.display="block";
document.getElementById("reg_err1").innerHTML="Please Enter your Message";
$("#feed_msg").focus();
}	
else
feedback_send(trim,trim1,trim2);	
}

function feedback_send(feedback_mailid,feedback_name,feedback_msg)
{
$.ajax({
		type:"POST",
		url:"<?php echo base_url()?>home/feed",
		data:{ feedback_mailid : feedback_mailid, feedback_name : feedback_name , feedback_msg : feedback_msg },		
		success:function(response1)
		{		
		$("#reg_err1").show().html(response1).focus();	
		$("#feed_mail").attr("value", "");		
		$("#feed_name").attr("value", "");
		$("#feed_msg").attr("value", "");	
		}
	  });
}

function tooltip_disp(i)
{
$('#tooltip'+i+'').html("<center> ITEMS RECYCLED </center>");
$('#tooltip'+i+'').stop(true,true).fadeIn("slow");
}

function tooltip_hide(i)
{
$('#tooltip'+i+'').stop(true,true).fadeOut("fast");
}

</script>

<script type="text/javascript">

$(document).ready(function()
{
	$('#box2').cycle
	({
	fx:'scrollLeft', 
    speed:'slow',
	timeout:7000,
	pause:true
	});
	
	$("#feedback").show().fadeIn("slow");
	
	$("#feed_img").toggle(function()
	{
	$("#feedback").animate({ "right": "+=27.5%" }, 600);
	$("#feedback_submit").show(600);
	$("body").scrollTop($("#feedback_submit").offset().top);
	$("#feed_name").focus();
	$("#feedback_submit").animate({ "right": "+=3px" }, 1000);
	},function()
	{
	$("#feedback").animate({ "right": "-=27.5%" }, 600);
	$("#feedback_submit").hide("slow");	
	$("#feedback_submit").animate({ "right": "-=3px" }, 1000);
	});

	$("#big_map a").hover(function()
	{
	$(this).css({ 'text-decoration' : 'underline' , 'color' : '#1473bb' });
	},function()
	{
	$(this).css({ 'text-decoration' : 'none' , 'color' : '#555' });
	});

	$("#move").hover(function()
	{
	$("#move").stop(true,true).animate({ margin: "0.9% 38% 0.9% 42%" }, "slow");
	},function()
	{
	$("#move").stop(true,true).animate({ margin: "0.9% 40%" }, "slow");
	});
	
	$("#move").click(function()
	{
	$("body").scrollTop($("#steps").offset().top);
	});	
		
	$("#sign").click(function()
	{
		$(this).removeClass();
		$(this).addClass("active");
		$("#log").removeClass();
		$("#log").addClass("deactive");
		
		$(".sign_div").hide();
		$(".signup_div").show();
	});
	
	$("#log").click(function()
	{
	
		$(this).removeClass();
		$(this).addClass("active");
		$("#sign").removeClass();
		$("#sign").addClass("deactive");
	
		$(".signup_div").hide();
		$(".sign_div").show();
	});
	$("#sign_new").click(function()
	{
		$(this).removeClass();
		$(this).addClass("active");
		$("#log_new").removeClass();
		$("#log_new").addClass("deactive");
		
		$(".sign_div_new").hide();
		$(".signup_div_new").show();
	});
	$("#log_new").click(function()
	{
	
		$(this).removeClass();
		$(this).addClass("active");
		$("#sign_new").removeClass();
		$("#sign_new").addClass("deactive");
	
		$(".signup_div_new").hide();
		$(".sign_div_new").show();
	});
	
	$("#feed_name,#feed_mail,#feed_msg").hover(function()
	{
	$(this).css({ '-moz-box-shadow' : '0 0 2px 1px #00C5FE', '-webkit-box-shadow' : '0 0 2px 1px #00C5FE', 'box-shadow' : 
	'0 0 2px 1px #00C5FE' });
	},function()
	{
	$(this).css({ '-moz-box-shadow' : 'none', '-webkit-box-shadow' : 'none', 'box-shadow' : 'none' });
	});	

	var valid = 0;
	$("#s_email").change(function()
	{
		var s_mail = $(this).val();
		
		$.ajax({
		type:"POST",
		url:"<?php echo base_url()?>home/check_email",
		data:"email="+s_mail,
		beforeSend:function()
		{
			$("#err_msg").show().html("<img src='<?php echo base_url()?>assets/images/loading.gif'>");
		},
		success:function(response)
		{
			if(response=="true")
			{
				$("#err_msg").show().html("Please Choose Different Email-Id");
			
				return false;
			}
			else if(response=="false")
			{
				$("#err_msg").hide();
				valid =1;
			}
		}
			});
		
	});
	
	$("#signup_form").submit(function()
	{
		if(valid==0)
		{
			return false;
		}
		else if(valid==1)
			return true;
	});
	
$("#sell").hover(function()
{
$(this).css({ 'text-decoration' : 'underline' });
},function()
{
$(this).css({ 'text-decoration' : 'none' });
});	
	
});

</script>

<center>

	<div id="main_container">
		 
		 <div id="slider">
		 
			<span id="box1" style="width:auto; height:auto; margin-bottom:2%;">
			 
			<span id="slide4">
			
			<font style="font-size:31px; font-family:'Open Sans',Arial,sans-serif; font-weight:bolder; text-align:center; width:100%;
			float:left; color:#555;">Go <font style="color:#7DC142;">Green</font></font>
			
			<span id="slide_data1">			 
			At ExtraCarbon, we're all about inspiring and rewarding smarter, everyday choices that lead to a more sustainable future. 
			You can earn points for learning online and taking actions like recycling. Those points can be redeemed for a variety of 
			fun deals or discounts and on products and services that are good for you, your wallet, and the planet.			
			</span>
			
			</span>
			
			<span id="slide5">
						
			<span id="slide_data2" style="padding-top:5%;">
			
			<table style="float:left; width:100%;">
						<form action="<?php echo base_url()?>home/signup" method="post" name="signup_form" 
						onsubmit="return validate_signup()" id="signup_form">
						
							<tr>
								<td>
									<input type="text" name="name" placeholder="Name" style="width:90%; height:30px; margin:0 5%;"/>
								</td>
							</tr>
							<tr>								
								<td>
									<input type="text" name="email" placeholder="Email" style="width:90%; height:30px; margin:0 5%;" 
									id="s_email"/>
								</td>
							</tr>
							<tr>								
								<td>
									<input type="password" name="password" placeholder="Password" style="width:90%; height:30px; 
									margin:0 5%;"/>
								</td>
							</tr>
							
						<tr><td></td></tr>
							 
							<tr>
								
								<td class="mf" style="text-align:center;">
									<input type="radio" name="gender" value="male"  />  Male&nbsp;&nbsp; 
									
									<input type="radio" name="gender" value="female" />  Female 
									
								</td>
							</tr>
							
							<tr><td></td></tr>
							
							<tr><td></td></tr>
							
							<tr>
								
								<td align="left"> 
									<input type="submit" name="signup" value="Sign Up" class="signup_btn" id="sup_btn" 
									style="width:90%; height:30px; margin:0 5%;"/>
									<br>
								</td>
								
							</tr>	
													
						</form>
						
						</table>							
						
			</span>	
					 
			</span>
				
			</span>
			
	    </div>
		 
		 <div align="center" id="featured_heading">
		 
		 <font style="font-size:40px; font-family:'Open Sans',Arial,sans-serif; font-weight:bolder; text-align:center; width:100%;">			
			Our - <font style="color:#7DC142;">Featured Deals</font>
		</font>		
		
		 </div>
		 
		 <div id="feedback">
		
		   <img align="absmiddle" id="feed_img" src="<?php echo base_url()?>assets/images/feedback.png" style="vertical-align:middle; 
		   float:left; width:30px; height:130px; background:rgba(0,0,0,0.7);">
		   
		   </div>
		   
		   <div id="feedback_submit">
		   
		   <!-- <form name="submit_feed" id="submit_feed" method="post" target="_self" enctype="multipart/form-data" 
		   action="<?php //echo base_url()?>home/feed" onSubmit="return validate1()"> -->				
		   
		   <table style="float:left; width:100%;">						
							<tr>								
								<td> <h3>Name&nbsp;<span class="star">*</span></h3>
								<input type="text" name="feed_name" id="feed_name" style="border:1px solid green; width:94%; 
								height:auto; padding:3%; -moz-box-shadow:inset 0 0 1px #186DED; 
								-webkit-box-shadow:inset 0 0 1px #186DED; box-shadow: inset 0 0 1px #186DED; text-align:left; 
								border-radius:5px; float:left;"/></td>
							</tr>
							
							<tr>								
								<td><h3>Email&nbsp;<span class="star">*</span></h3>
								<input type="text" name="feed_mail" id="feed_mail" style="border:1px solid green; width:94%; 
								height:auto; padding:3%; -moz-box-shadow: inset 0 0 1px #186DED; 
								-webkit-box-shadow: inset 0 0 1px #186DED; box-shadow: inset 0 0 1px #186DED; text-align:left; 
								border-radius:5px; float:left;"/>
								</td>
							</tr>
							
							<tr>								
								<td><h3>Message&nbsp;<span class="star">*</span></h3>
								<textarea id="feed_msg" name="feed_msg" rows="5" style="border:1px solid green; width:94%;
								padding:3%; -moz-box-shadow: inset 0 0 1px #186DED; -webkit-box-shadow: inset 0 0 1px #186DED; 
								float:left; box-shadow: inset 0 0 1px #186DED; text-align:left; border-radius:5px;"></textarea>
								</td>
							</tr>
							
							<tr><td></td></tr>
							
							<tr>
								<td align="left">
									<br>
									<input type="submit" name="feed_submit" id="feed_submit" value="Submit" class="sign_btn" 
									onClick="validate1()" style="width:94%; padding:3%; border-radius:5px; height:auto;">
									<br>
								</td>
							</tr>
						
		   </table>
		   
		   <!-- </form> -->	
		   
		   <div id="reg_err1"></div>		   
		   
		   </div>		
		 
		 <div align="center" class="ida_cont">	 
	
	 		<span id="part1">
		   
		    <center>
		  
	  		<span id="part2_data"> <a href="http://dealkart.extracarbon.com" target="_blank"><img align="absmiddle" src="<?php 
	  		echo base_url()?>assets/images/shop1.png" target="_blank" style="vertical-align:middle; width:100%; height:315px;"></a>
			</span>
		   
		   </center>		  
		  
		   </span>
		   
		   <span class="line3"></span>
		  
		   <span id="part2">
		   
		   <center>
		   
		  <!--  <font style="width:100%; float:left; text-align:center; font-size:29px; font-weight:bold; margin-bottom:1px;"></font> 
		  -->	   
		  			
		   <div id="box2">

			<img src="<?php echo base_url() ?>assets/images/Glansa_Saloon.jpg" alt="extracarbon image" width="100%" height="315px"/>
			<img src="<?php echo base_url() ?>assets/images/LOGO_with_ Border.jpg" alt="extracarbon image" width="100%" height="315px"/>			
			<img src="<?php echo base_url() ?>assets/images/thali.jpg" alt="extracarbon image" width="100%" height="315px"/>			
			<img src="<?php echo base_url() ?>assets/images/bs_planner.jpg" alt="extracarbon image" width="100%" height="315px"/>
			
			</div>
			
			<!-- <div class="clear"></div>  -->		  	   
		   
		   </center>		  
		  
		   </span> 	   
		   
		   </div>		  
				
		 <div id="slider">
		 
		 	<font style="font-size:40px; font-family:'Open Sans',Arial,sans-serif; font-weight:bolder; text-align:center; width:100%; 
			float:left; color:#555; letter-spacing:-2px;">
			
			Earn Carbon Points - <font style="color:#7DC142;">On your Kabad</font>
			
			</font>			
									
			<font id="move" style="text-align:center; font-family:'Open Sans',Arial,sans-serif; font-weight:bold; color:#0284B5; 
			font-size:27px; text-decoration:underline; width:20%; margin:1% 40%; float:left; cursor:pointer;">
			
			How we do it&nbsp;<img src="<?php echo base_url()?>assets/images/arrow1.png" style="vertical-align:middle;">
			
			</font>
			
			<!--<font style="text-align:center; font-family:'Open Sans',Arial,sans-serif; font-weight:bold; font-size:27px; width:100%; 
			margin:1% 0 0 0; float:left;">
			
			<a id="sell" href="<?php //echo base_url()?>other/ewaste" target="_self" style="color:#0284B5; text-decoration:none;"> 
			Click Here to Sell your Product</a>
			
			</font>	-->	
			
			<span id="box1" style="margin-bottom:1%;">
			 
			<span id="slide1">
			
			<!-- <span class="img"> 
			
    		<img align="absmiddle" src="<?php //base_url()?>assets/images/sonia.png" style="width:175px; height:260px; float:left; 
			vertical-align:bottom;"/>
			
			</span> -->
			
			<span class="slide_heading" style="height:18%;">
			Professional <font style="color:#7DC142;">Approach</font>		
			</span>
			
			<span id="slide_data1" style="height:58%;">			 
			Thank you Gaurav. I value punctuality so was very pleased to note that your guy came dot on time. Worked professionally 
			& was pleasant. Best Wishes for your venture.			
			</span> 
			<span class="bottom_text" style="height:18%;">- A User in World Spa</span>
			
			</span>
			
			<span class="line"></span>
			
			<span id="slide2">
			
			<!-- <span class="img"> 
			
    		<img align="absmiddle" src="<?php //base_url()?>assets/images/rahul.png" style="width:175px; height:260px; float:left; 
			vertical-align:bottom;"/>
			
			</span> -->
			
			<span class="slide_heading" style="height:18%;">			
			Well <font style="color:#7DC142;">Mannered</font>
			</span>
			
			<span id="slide_data2" style="height:58%;">			
			Your supervisor Malik visited he is good, very well mannered, impressed, got a lot of info.
			</span> 
			<span class="bottom_text" style="height:18%;">- S. Bhattacharya, DLF-III, Gurgaon</span>
			 
			</span>
			
			<span class="line"></span>
			
			<span id="slide3"> 
			
			<!-- <span class="img"> 
			
    		<img align="absmiddle" src="<?php //base_url()?>assets/images/priyanka.png" style="width:175px; height:260px; float:left; 
			vertical-align:bottom;"/>
			
			</span> -->
			
			<span class="slide_heading" style="height:18%;">			
			Good <font style="color:#7DC142;">Service</font>
			</span>
			
			<span id="slide_data3" style="height:58%;">			
			Thanks to the Extra Carbon team in helping me dispose the old fridge. Found the experience very pleasant and would highly 
			recommend your services.			
			</span>  
			<span class="bottom_text" style="height:18%;">- Ruplai Mohan Kulshrestha, Sohna Road, Gurgaon</span>
			
			</span>
			
			</span>		

		 </div>
						
		 <div class="clear"></div>	   
					
		   <div align="center" id="steps" class="ida_cont" style="background:#f6f6f6;">
		   
		   <div id="step"> <img align="absmiddle" src="<?php echo base_url()?>assets/images/favicon.png" style="vertical-align:middle; 
		   width:80px; height:80px;"> Our 3-Step Process <br> <font style="font-size:16px; line-height:0;"> How we do it </font> 
		   </div> 
		   
		   <div class="step_parts">
		   <font style="font-size:19px;"> Step&nbsp;<strong>1</strong> </font> <br><br>
		   We take your Call/Mail on your selling product and calculate its Selling price. <br> We keep you posted with Details and 
		   Progress via <strong>SMS, Mail and Phone.</strong>
		   
		   </div>
		   
		   <div class="step_parts">
		   <font style="font-size:19px;"> Step&nbsp;<strong>2</strong> </font> <br><br>
		   We send our Representative to collect your product. <br> He checks the condition of the product and <strong>pay you the 
		   money.</strong>
		   		   
		   </div>
		   
		   <div class="step_parts">
		   <font style="font-size:19px;"> Step&nbsp;<strong>3</strong> </font> <br><br>
		   We <strong>segregate the products</strong> for recycling & send it to the concerned recyclers.
		   
		   </div>
		   
		   <br>
		   
		   <div class="line1"></div>
		   
		   <div id="newsletter">
		   
		   <center>
		   
		   <span id="txt"> Sign Up for Latest Updates </span>  		   				 
		   
		   <input type="text" id="mailid" name="mailid" placeholder="Enter Your Mail Id" maxlength="90"/> 
		   
		   <input type="submit" value="Subscribe" id="submit1" name="submit1" onClick="validate()"/>
		 
		   </center>	   
		   
		   </div>		
		   
		   <div id="newsletter_response"></div>	
		   
		   </div> 		   		   
		  
		   </div>					   
		
		  <div id="home_stuff">
			
			<img src="<?php echo base_url()?>assets/images/close1.png" alt="close" style="float:right; background:#eee; 
			border-radius:3px; padding:1px;" id="close_log"/>
			
			<div id="home_stuff_menu">						
					
				<div id="login_tags">  
					<h1 id="log" class="active">Login </h1>  
					<h1 id="sign" class="deactive">Sign Up </h1>	
				</div>
			
				<div class="col_1">				
					
					<div class="sign_div">					
					
						<form action="<?php echo base_url()?>home/login" method="post" name="login_form" 
						onsubmit="return validate_login()" >
						<table>
						
							<tr>
								
								<td><h3>Username</h3>
								<input type="text" name="username" placeholder="" size="25" />
								</td>
							</tr>
							<tr>
								
								<td><h3>Password</h3>
								<input type="password" name="password" placeholder="" size="25"/>
								</td>
							</tr>
							<tr>
								<td align="right">
									<div id="rem">
										<input type="checkbox" name="remember_me" /> Remember Me 
										&nbsp; | &nbsp;
										<a href="<?php echo base_url()?>home/recover_password" id="fp">Forgot Password ? </a> 
									</div>
									
								</td>
							</tr>
							
							<tr><td></td></tr>
							
							<tr>
								<td align="right">
									<br>
									<input type="submit" name="login" value="Sign In" class="sign_btn">
									<br>
								</td>
							</tr>
						
						</table>
						
						</form>
						
					</div>
									  	
					<div class="signup_div">
					
						<table>
						<form action="<?php echo base_url()?>home/signup" method="post" name="signup_form" 
						onsubmit="return validate_signup()" id="signup_form">
						
							<tr>
								
								<td>
									<h3>Name *</h3>
									<input type="text" name="name" placeholder="" size="25" />
								</td>
							</tr>
							<tr>
								
								<td>
									<h3>Email *</h3>
									<input type="text" name="email" placeholder="" size="25" id="s_email" />
								</td>
							</tr>
							<tr>
								
								<td>
									<h3>Password *</h3>
									<input type="password" name="password" placeholder="" size="25" />
								</td>
							</tr>
							<!-- 
							<tr>
								
								<td>
									<h3>Metro Card Number</h3>
									<input type="text" name="card_no" placeholder="" size="25" />
								</td>
							</tr>
							 -->
							 
							<tr><td></td></tr>
							 
							<tr>
								
								<td class="mf">
									<input type="radio" name="gender" value="male"  /> : Male 
									
									<input type="radio" name="gender" value="female" /> : Female 
									
								</td>
							</tr>
							
							<tr><td></td></tr>
							
							<tr><td></td></tr>
							
							<tr>
								
								<td align="left"> 
									<input type="submit" name="signup" value="Sign Up" class="signup_btn" id="sup_btn" />
									<br>
								</td>
								
							</tr>	
													
						</form>
						
						</table>
						
					</div>
										
				</div>
			
				<div id="err_msg"></div>
				
				<?php 
				echo validation_errors(); 
				if($this->session->flashdata('login_error'))
				{
				echo '<script type="text/javascript">alert("'.$this->session->flashdata('login_error').'")</script>'; 
				}
				?>
			
			</div>
			
		</div>
								
	</div>

</center>
	
<script type="text/javascript">

$(document).ready(function()
{
	$("#register").toggle(function()
	{
		$("#home_stuff").slideDown("fast");
		//$(this).html('<img src="<?php echo base_url()?>assets/images/close1.png">');
		
	},function()
	{
		$("#home_stuff").slideUp("fast");
		//$(this).html('<img src="<?php echo base_url()?>assets/images/stuff.png">');
	});
	
	
	$(".sign_div").show();
	
	
	$("#sin").toggle(function()
	{
		$(".signup_div").hide();
		$(".sign_div").fadeIn();
		return false;
	},function()
	{
		
		$(".sign_div").fadeOut();
		return false;
	});
	
	
	$("#sup").toggle(function()
	{
		$(".sign_div").hide();
		$(".signup_div").fadeIn();
		return false;
	},function()
	{
		$(".signup_div").fadeOut();
		return false;
	});
	
	
	$(".ida:not(#resale_frm,#clientele,#resale_frm1,#waste,#rideshare,#plant1)").click(function()
	{
		var link = $(this).attr('id');
		window.location="<?php echo base_url()?>other/construction";
	});
	
$("#resale_cls_new").click(function()
	{
		$("#back_div_new").hide();
		$("#outer_box").hide();
		$("#resale_form_div_new").hide();
		return false;
	});
$("#resale_form_new").submit(function()
				{
					var email = $("#itm_email_new").val();
					var phone = $("#itm_phone_new").val();
					var name = $("#itm_name_new").val();
					var desc = $("#itm_desc_new").val();
					var pass = $("#itm_pass_new").val();
					
					if(email=='' || checkEmail(email)==false)
					{
						$("#reg_err_new").fadeIn().html('Please fill valid Email Id');
						return false;
					}
					
					
					else if(phone=='' || phone%1!=0 || phone.length!=10)
					{
						$("#reg_err_new").fadeIn().html('Please fill Contact No. with 10 digits');
						return false;
					}
					else if(name=='')
					{
						$("#reg_err_new").fadeIn().html('Please Item Name');
						return false;
					}
					else if(desc=='')
					{
						$("#reg_err_new").fadeIn().html('Please Item Description');
						return false;
					}
					else if(valid!=1)
					{
						$("#reg_err_new").fadeIn().html('Please Different email id');
						return false;
					}
					else
					{
						$("#reg_err_new").fadeOut();
						
						$('input[type=submit]',this).val('sending...');
						
						return true;
						
						$('input[type=submit]',this).attr('disabled','disabled');
						
					}
										
				});
				
				function checkEmail1(e) 
				{
				var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
				if (!filter.test(e)) 
				{
				return false;
				}		
				return true;
				}
				
				$("#resale_form_new1").submit(function()
				{
					var email = $("#itm_email_new").val();
					
					if(email=='' || checkEmail1(email)===false)
					{
						$("#reg_err_new").fadeIn().html('Please fill valid Email Id');
						return false;
					}
										
					else
					{
						$("#reg_err_new").fadeOut();
						
						$('input[type=submit]',this).val('Sending...');
						
						return true;
						
						$('input[type=submit]',this).attr('disabled','disabled');
						
					}
										
				});				
				
});

</script>	
		
		<div id="back_div_new"></div>
		
			<div id="outer_box">
		
				<img src="<?php echo base_url()?>assets/images/close99.png" alt="Close" style="float:right; cursor:pointer; 
				height:30px; margin-right:3%; width:auto;" id="resale_cls_new"/>

				<div id="resale_form_div_new" style="border-radius:21px; font-family:'Yanone Kaffeesatz',sans-serif; width:100%; 
				left:0; right:0; top:30px; padding:4% 0;">						
						
						<span style="color:#000000; padding:1%; font-size:26px; font-weight:bolder; margin-bottom:3%; width:98%;
						font-family:'Yanone Kaffeesatz',sans-serif; float:left;">Enter Coupon</span>
						
						<form action="<?php echo base_url()?>home/coupon_new" method="post" id="resale_form_new1" 
						enctype="multipart/form-data">
						
						<table style="float:left; width:100%; font-family:'Yanone Kaffeesatz',sans-serif; padding:0 2%;">
							<tr style="float:left; width:100%;">
							<td style="float:left; width:35%; margin-right:1%; padding-top:2.5%; font-weight:bold; font-size:18px;
							font-family:'Yanone Kaffeesatz',sans-serif;">Email :</td>
							<td style="float:right; width:61%; margin-left:1%;">
							<input type="text" name="email_new" id="itm_email_new" style="width:95%; height:auto; padding:3% 2%; 
							font-size:18px; font-family:'Yanone Kaffeesatz',sans-serif; box-shadow:inset 0 0 9px #888; 
							border-radius:7px; outline:none;" placeholder="Enter your Mail Id..." required>
							</td></tr>								
							<tr style="float:left; width:100%; margin:2% 0;">
							<td style="float:left; width:35%; margin-right:1%; padding-top:2.5%; font-weight:bold; font-size:18px;
							font-family:'Yanone Kaffeesatz',sans-serif;">Coupon Number :</td>
							<td style="float:right; width:61%; margin-left:1%;">
							<input type="text" name="coupon_new" id="coupon_new" style="width:95%; height:auto; padding:3% 2%; 
							font-size:18px; font-family:'Yanone Kaffeesatz',sans-serif; box-shadow:inset 0 0 9px #888; 
							border-radius:7px; outline:none;" placeholder="Enter your Coupon No." required>
							</td></tr>							
							<tr style="float:left; width:100%; margin:2% 0 0 0;">							
							<td style="float:left; width:99%; margin-right:1%;">
							<input type="submit" name="upload" value="Send" style="width:50%; height:auto; padding:1.5% 2%; 
							font-family:'Yanone Kaffeesatz',sans-serif; box-shadow:1px 1px 7px 1px #888; border-radius:1px; 
							cursor:pointer; font-weight:bold; font-size:20px; outline:none;">
							</td>
							</tr>
						</table>						
						
						</form>
						
						<div id="reg_err_new"></div>
						
				</div>	
				
		   </div>			