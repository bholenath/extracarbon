<?php
ob_start();

if(!isset($_SESSION))
{
	@session_start();
}

if(isset($_GET['id']))
{
$_SESSION['u_mail'] = $_GET['id'];
}

if(!isset($_SESSION['id']))
{
$_SESSION['id'] = session_id();
}

if(isset($_GET['amount']))
{
$_SESSION['amount'] = $_GET['amount'];
}

include("connection.php");

/*if(empty($_SESSION['cart']))
$_SESSION['cart'] = array();*/
?>


<!DOCTYPE HTML PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		
		<title>Welcome to Dealkart</title>

		<script type="text/javascript" src="js/registration.js"></script>
		<script src="http://code.jquery.com/jquery-1.10.2.js"></script>
		<script src="http://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
		<script type="text/javascript" src="js/ship-valid.js"></script>
		<script type="text/javascript" src="js/script.js"></script>
		
		<link rel="shortcut icon" href="images/favicon.ico" >
		<link rel="stylesheet" type="text/css" href="css/reg.css" >
		<link rel="stylesheet" type="text/css" href="css/menucss.css" > 
		<link rel="stylesheet" type="text/css" href="css/imgbg.css" >
		<link rel="stylesheet" type="text/css" href="css/main.css" >		
	
		<style>	
		
		#err_msg
		{
		margin:auto 34.1%; width:180px;
		}
		
		</style>
	
		<script type="text/javascript">
			$(document).ready(function(){

				$("#login-link").click(function(){
					$("#login-panel").slideToggle(200);
				});
				
				$("#register").click(function(){
				$("#login-panel").hide(50);
				$("#signup-panel").slideToggle(400);					
				});
				
				$("#signin").click(function(){
				$("#signup-panel").hide(50);
				$("#login-panel").slideToggle(400);					
				});
				
				$("#sr_btn").click(function()
				{
					var sr = $("#srch_txt").val();
					
					if(sr=='')
					{
						$("#srch_txt").css("border-color","red");
						$("#srch_txt").attr("placeholder","Please Enter Search String");
						return false;
					}
				});
				
				
			})
			$(document).keydown(function(e) {
				if (e.keyCode == 27) {
					$("#login-panel").hide(0);
				}
			});
			
			$(document).keydown(function(e) {
				if (e.keyCode == 27) {
					$("#signup-panel").hide(0);
				}
			});
		
			$(function() {
			$("#slideContainer").css({
				"height" :$("#slideContainer div:first").css("height"),
				"overflow" : "hidden"
			});
			
			function slide() {
				$("#slideContainer div:first").slideUp(3000, function() {
					var $this = $(this);
					$this.parent().append(this);
					$this.show();
					slide();
				});
			}
			slide();  
			});
					
		</script>
		
		<script>
		
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
		
		</script>

	</head>
	
	<body class="bd">
	
	<?php 
		date_default_timezone_set("Asia/Calcutta");	
		$today  = date('Y-m-d');
		
		if(isset($_SESSION['id']))
			$ud=$_SESSION['id'];
		else
			$ud= session_id();
			
		$citem = mysql_query("	select * from tbl_cart, tbl_product where 
								tbl_cart.pd_id=tbl_product.pd_id  and tbl_cart.user_id='$ud' 
								and tbl_cart.date='$today'") 
								or die(mysql_error());
								
		$item = mysql_num_rows($citem);
		
	?>
	
	<div class="main">
		<div class="head" > 
			<div class="headin">
				<div class="sign">
				
				
					<div style="" id="head_bar">
						<div class="hd_in">
							&nbsp;Door to Door Service 
							<br><small style="font-size:10px;">Best Shipping Services</small>
						</div>
						
						<div class="hd_in">
							&nbsp;24 hrs Dispatch 
							<br>&nbsp;&nbsp;<small >Delivery within 2-3 working days</small>
						</div>
						
						<div class="hd_in">
							&nbsp;100% Original Products 
							<br>&nbsp;&nbsp;<small >Top Brands at Your Click</small>
						</div>
						
						<div class="hd_in">
							&nbsp;&nbsp;Cash On Delivery 
							<br>&nbsp;&nbsp;<small >Pay after you get the product</small>
						</div>
						
						<div id="slideContainer" class="hd_in" align="center">
							<div>Contact No:+91-9650527700</div>
							<div>Email:info@extracarbon.com</div>
						</div>	
					</div>
						
						
					<table width="100%" cellspacing="5" cellpadding="0" border=0>
						<tr>
							<td >
								<a href="index.php"><img src="images/logo.png" height='80px'></a>
							</td>
							
							<td valign="top" colspan="4" align="right">
							
								<table width="500px" border=0>
									<tr>
										<td align="right">										
										
											<a href='cart_show.php'>
												My Cart&nbsp;(<?php echo $item?>)
											</a>
											
										</td>
										
										<td	align="right" >
											<img src='images/mycart.png'  title='My Cart' height="30px;">	
										</td>
										
										<td class="login"  align="right">
											
											<?php 												
												if(!empty($_SESSION['u_mail'])  && isset($_SESSION['u_mail']))
												{ 
													echo 'Welcome&nbsp;&nbsp;<strong>'.$_SESSION['u_mail'].'</strong>';
													echo "&nbsp;&nbsp;| <a href='user_info.php'>My Account</a> | 
													<a href='logout.php'>Logout</a>";
												}												
												else
												{
												?>											    
												<a id="login-link">Sign In / Register</a>													
												<?php
												}
												?>												
													
										</td>
									</tr>
								
									<tr>
										<td></td><td></td>
										
										<td align="right"  valign="top">
										
											<form method="GET" action="search.php" >
												<input type="submit" name="search" title="Search Now!" id="sr_btn" value="" />
											
												<input type="text" name="searchterm" title="Enter search term here"
												class="srch" id="srch_txt"/>
												
											</form>
											
										</td>
										
									</tr>
									
								</table>
							</td>
						</tr>
					</table>
				</div>
				
			</div>	
			
			<script src="js/jquery.min.js" type="text/javascript"></script>
			<script type="text/javascript">
				var timeout         = 500;
				var closetimer		= 0;
				var ddmenuitem      = 0;

				function jsddm_open()
				{	jsddm_canceltimer();
					jsddm_close();
					ddmenuitem = $(this).find('ul').eq(0).css('visibility', 'visible');}

				function jsddm_close()
				{	if(ddmenuitem) ddmenuitem.css('visibility', 'hidden');}

				function jsddm_timer()
				{	closetimer = window.setTimeout(jsddm_close, timeout);}

				function jsddm_canceltimer()
				{	if(closetimer)
					{	window.clearTimeout(closetimer);
						closetimer = null;}}

				$(document).ready(function()
				{	$('#jsddm > li').bind('mouseover', jsddm_open);
					$('#jsddm > li').bind('mouseout',  jsddm_timer);});

				document.onclick = jsddm_close;
			</script>
			
			
			<div class="menu">
			
			<?php include('menu.php');?>
			</div> 	
		</div>		
			
<script type="text/javascript">

	$(document).ready(function()
	{		
		$("#offer").toggle(function()
		{
			
			$("#offer_dtl").show("slow");
		},function()
		{
			$("#offer_dtl").hide("slow");
		});
		
		$("#contact_bar").click(function()
		{
			$("#black_div").show();
			$("#contact_form").show();
		});
		
		$("#cls").click(function()
		{
			$("#black_div").hide();
			$("#contact_form").hide();
		});
		
	// contact form validation

	function validateEmail(sEmail) {
    var filter = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
    if (filter.test(sEmail)) {
        return true;
    }
    else {
        return false;
    }
	
	}
	
	$("#k").click(function()
	{
		$("#black_div").fadeOut();
		$("#thank_msg").fadeOut();
		//window.location.reload(true);
	});
	
	$("#close_log").click(function()
	{
		$("#signup-panel").hide(50);	
	});
	
	$("#snd").click(function()
	{
		var comment = $("#cmmt").val();
		var email = $("#eid").val();
		if(comment=='')
		{
			$("#err1").html('Please Enter Comment');
			return false;
		}
		if(email=='' || validateEmail(email)===false)
		{
			$("#err1").html('');
			$("#err2").html('Please Enter Your valid Email');
			return false;
		}
		else
		{
			$.ajax({
			type:"post",
			url:"contact_action.php",
			data:"msg="+comment+"&e_mail="+email,
			beforeSend:function(html)
			{
				$("#contact_form").html('<div style="text-align:center;">Sending....</div>');
			},
			success:function(html)
			{	
				//alert(html);
				$("#contact_form").hide();
				$("#thank_msg").fadeIn("slow");
			}
			})
		return true;
		}
	});
	
	
});
</script>

		<div id="login-panel">	
		<label> <strong> <font size="+1"> Sign In </font> </strong> </label>			
			<form action="login.php" method="post">
				<label>Username:
					<input name="email" type="text"> </label> 
				<label>Password:
					<input name="password" type="password"> </label><br>
				<input name="submit" value="Sign In" type="submit"><br><br>
				<label id="register" style="color:#8184FC; cursor:pointer; text-decoration:underline;"> New User? Register </label><br>
				<small> Press Esc to Close </small>						
			</form>
		</div>	
		
		
		<div id="signup-panel">			
		<label> <strong> <font size="+1"> Sign Up / Register </font> </strong> </label>		
			<form action="signup.php" method="post" name="signup_form" onsubmit="return validate_signup()" id="signup_form">
				<label>Name : *
					<input type="text" name="name" required> </label>
				<label>Username : *
					<input name="email" type="text" required> </label> 
				<label>Password : *
					<input name="password" type="password" required> </label><br><br>
				<label>
					<input type="radio" name="gender" value="male"  /> : Male 
					<input type="radio" name="gender" value="female" /> : Female 
				</label><br><br>						
				<input name="submit" value="Sign Up" type="submit"><br><br>
				<label id="signin" style="color:#8184FC; cursor:pointer; text-decoration:underline;"> Sign In? </label><br>	
				<small> Press Esc to Close </small>	<br>
				<div id="err_msg"></div>							
			</form>
		</div>			

<div id="thank_msg"> Thank you for writing us, we will contact you soon <br><span id='k'>OK</span> </div>	
<!--<div id="offer_cont">		
	<div id="offer">OFFERS</div>
	
	<div id="offer_dtl">
		<ul>
			<li>Colorful Q&Q Watches @ 595. Get Your Style Here! </li>
			<li>Buy Baggit Mobile Pouches Starting @ Rs.325 Only!</li>
			<li>Look Trendy With Designer Earrings Starting @ Rs. 67 Only! </li>

		</ul>

	</div>
</div>-->

<div id="contact_bar">W<br>r<br>i<br>t<br>e<br><br>t<br>o<br><br>U<br>s</div>
<div id="black_div"></div>
<div id="contact_form">
	<span id="cls"><img src="images/cls.png" alt="close" title="close"></span>
<!--	<form name="contact" action="contact_action.php" method="post"> -->
		<div style="border-bottom:solid 1px;"><h2>Write to Us</h2></div>
		<div ><p>Your Comment</p></div>
		<div> <textarea cols="40" rows="5" id="cmmt" name="msg"></textarea></div>
		<div id="err1"> </div>
		<div> <p>Your Email Address</p></div>
		<div> <input type="text" name="email" size="53" id="eid"></div>
		<div id="err2"></div>
		<div> <p><input type="submit" name="send" value="Send" id="snd"></p></div>
		
<!--	</form>	-->
</div>

<?php  
ob_flush();?>				