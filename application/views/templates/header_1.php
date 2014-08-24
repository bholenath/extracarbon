<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
	
		<title><?php echo $title ?> </title>
		
		<meta tag="keyword" content="car pool, rideshare, second hand items, waste pick up, recycle waste, gift a plant" />
		<meta tag="description" content="share your car in ncr or find a buyer for your second hand item, recycle your waste items" />
		<?php $base =  base_url().'assets/';  ?>
		
		<link href="<?php echo base_url()?>assets/images/favicon.png" rel="shortcut icon" type="image/png" />
		<link href="<?php echo base_url()?>assets/css/style.css" rel="stylesheet" type="text/css" />
		<script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
		<script src="http://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
		<!-- <script type="text/javascript" src="<?php //echo base_url()?>assets/js/jquery_cookie.js"></script> -->
		
		<script type="text/javascript">

		  var _gaq = _gaq || [];
		  _gaq.push(['_setAccount', 'UA-29717646-1']);
		  _gaq.push(['_setDomainName', 'extracarbon.com']);
		  _gaq.push(['_setAllowLinker', true]);
		  _gaq.push(['_trackPageview']);

		  (function() {
			var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
			ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
			var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
		  })();

		</script>
				
<style type="text/css">

#home_stuff
{
	display:none; position:fixed; top:0; left:0px; width:100%; height:100%; background:rgba(0, 0, 0, .5);
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

.col_1
{
	margin:auto; width:100%;
}

#err_msg
{
	margin:auto 34.1%; width:300px;
}

#rem, #rem a 
{
    color: #606060; font-size: 12px;
}

</style>
				
				
		<script type="text/javascript">
			
				$(document).ready(function()
				{
												
				$("#settings").toggle(function()
				{	
					$("#set").css("background","#00A1E3");
					$("#user_settings").slideDown("fast");
				},function()
				{
					$("#set").css("background","none");
					$("#user_settings").slideUp("fast");
				});
				
				$("#fb").hover(function()
				{
					$("#fb").attr("src","<?php echo base_url()?>assets/images/fb1.png");
				},function()
				{
					$("#fb").attr("src","<?php echo base_url()?>assets/images/fb.png");
				});
								
				$("#tweet").hover(function()
				{
					$("#tweet").attr("src","<?php echo base_url()?>assets/images/twitter1.png");
				},function()
				{
					$("#tweet").attr("src","<?php echo base_url()?>assets/images/twitter.png");
				});
				
				$("#google").hover(function()
				{
					$("#google").attr("src","<?php echo base_url()?>assets/images/google1.png");
				},function()
				{
					$("#google").attr("src","<?php echo base_url()?>assets/images/google.png");
				});
				$("#linked_in").hover(function()
				{
					$("#linked_in").attr("src","<?php echo base_url()?>assets/images/linked_in1.png");
				},function()
				{
					$("#linked_in").attr("src","<?php echo base_url()?>assets/images/linked_in.png");
				});
				$("#pinterest").hover(function()
				{
					$("#pinterest").attr("src","<?php echo base_url()?>assets/images/pinterest1.png");
				},function()
				{
					$("#pinterest").attr("src","<?php echo base_url()?>assets/images/pinterest.png");
				});
				
				
				});
		
		</script>
		
<script>
	
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
	
</script>		
		
	</head>
	
<body>

	<div id="outer_container">
	
		<div id="header" style="border-bottom:1px solid #cacaca;">
		
			<div id="left_head">
			
				<a href="<?php echo base_url()?>home">
					<img src="<?php echo base_url()?>assets/images/logo.png" alt="logo" style="vertical-align:middle; 
					height:95.7%; width:auto; padding:1%; margin:0;"/> 
				</a>
				
			</div>
			
			<div id="right_head"> 
			
			<?php if($this->session->userdata('username')):?>
				<table align="right">
					<tr>
						
						<td>
							<a href="<?php echo base_url()?>dashboard">
								<img src="<?php echo base_url()?>assets/images/home1.png"  height="35px" style="margin-right:-20px"/>
							</a>
						</td>
						
						<td>
							<img src="<?php echo base_url()?>assets/images/im.png" alt="img" />
								<?php echo (strtoupper($this->session->userdata('name')))?>
						</td>
						
						<td id="set">
							<span id="settings"> 
								<img src="<?php echo base_url()?>assets/images/setting.png" alt="img" />
							</span>
							<div id="user_settings">
								
								<ul>
									<li>
										<a href="<?php echo base_url()?>dashboard/profile">
										Profile 
										&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
										&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
										&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
										<img src="<?php echo base_url()?>assets/images/profile.png" alt="img" />
										</a>
									</li>
									<li>
										<a href="<?php echo base_url()?>dashboard/change_password">
										Change Password 
										&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
										&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
										
										<img src="<?php echo base_url()?>assets/images/password.png" alt="img" />
										</a>
									</li>
									<li class="last">
										<a href="<?php echo base_url()?>logout">Logout 
									
										&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
										&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
										&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
										&nbsp;&nbsp;&nbsp;
									
										<img src="<?php echo base_url()?>assets/images/logout.png" alt="img" />
										</a>
									</li>
								 
								 </ul>
							
							  </div>
						
						</td>
					 
					  </tr>
				
				  </table>
				
			<?php 
			else:
			?>
				<script type="text/javascript">
					$(document).ready(function()
					{
						$("#working").hover(function()
						{
							var ttl = $(this).attr('data');
							$("#title_sh").fadeIn("slow").html(ttl);						
							$("#working").attr("src","<?php echo base_url()?>assets/images/qns1.png");
						},function()
						{
							$("#title_sh").hide();
							$("#working").attr("src","<?php echo base_url()?>assets/images/qns.png");
						});
												
									
					});
				</script>
				
				<div id="menu_header">
				
				<span class="menu_item"> <a href="<?php echo base_url()?>home" style="color:#333; text-decoration:none;">
				Home</a> </span>
				
				<span class="menu_item"> <a href="<?php echo base_url()?>other/pickup" style="color:#333; text-decoration:none;">
				Waste Pick</a> </span>
				
				<span class="menu_item" id="resale_frm"> <a href="#" style="color:#333; text-decoration:none;">Sell Your Product</a> 
				</span>
				
				<!--<span class="menu_item"> <a href="<?php echo base_url()?>other/recycle_glass" style="color:#333; text-decoration:none;">
				Souvenir Shop</a> </span>-->

				<span class="menu_item"> <a href="http://dealkart.extracarbon.com" target="_blank" style="color:#333; text-decoration:none;">
				Dealkart</a> </span>
				
				<span class="menu_item"> <a href="<?php echo base_url()?>other/careers" style="color:#333; text-decoration:none;">
				Careers</a> </span>
				
				<span class="menu_item"> <a href="<?php echo base_url()?>other/contact_us" style="color:#333; text-decoration:none;">
				Contact Us</a> </span>				
				
				</div>
				
				<div id="share">
				
					<span id="register">Login / Register</span>
					
					<span id="helpline">Contact :<br><font style="font-size:18px; color:#c41200; font-weight:bolder;">	
					+91-9810397172</font> </span>
					
					<!-- <a href="" id="log_in_win"> Login </a>
					
					<a href="#" id="work"> Quick Contact : +91-9810397172 </a>
					
					 <iframe src='http://www.flipkart.com/affiliate/displayWidget?affrid=WRID-136903114147982497' height='46' width='660'
					scrolling='no' frameborder='0'></iframe> -->
																				
					<!-- <div id="reg_err"></div> -->															
																				
				</div>	
				
			<?php endif?>
			
			</div>
			
	</div>	
	
	<?php echo ($this->session->userdata('username')?'<div id="dashboard_surface">':''); ?>			
	
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
								
								<td> <h3>Username</h3>
								<input type="text" name="username" placeholder="" size="25" /></td>
							</tr>
							<tr>
								
								<td><h3>Password</h3>
									<input type="password" name="password" placeholder="" size="25" />
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
							
							<!-- <tr>
								
								<td>
									<h3>Metro Card Number</h3>
									<input type="text" name="card_no" placeholder="" size="25" />
								</td>
							</tr> -->
							
							<tr>
								
								<td class="mf">
									<input type="radio" name="gender" value="male"  /> : Male 
									
									<input type="radio" name="gender" value="female" /> : Female 
									
								</td>
								
							</tr>
							
							<tr><td></td></tr>
							
							<tr><td></td></tr>
							
							<tr>
								
								<td align="right"> 
									<input type="submit" name="signup" value="Sign Up" class="signup_btn" id="sup_btn" />
									<br>
								</td>
								
							</tr>	
													
						</form>
						
						</table>
						
					</div>
										
				</div>
			
				<div id="err_msg"></div>
				
				
			</div>
			
		</div>	
		
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
		
				$("#register").hover(function()
				{
				$(this).css({ 'color' : '#1573bb' });
				},function()
				{
				$(this).css({ 'color' : '#555' });
				});	
		
				$("#resale_frm").click(function()
				{
					
					$("#back_div").show();
					$("#resale_form_div").fadeIn("fast");
					return false;
				});
				
				$("#resale_cls").click(function()
				{
					$("#back_div").hide();
					$("#resale_form_div").hide();
					return false;
				});
		
				$(".sign_div").show();
		
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
	
				$("#close_log").click(function()
				{
				$("#home_stuff").slideUp("fast");
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
				return false;
				else if(valid==1)
				return true;
				});
	
	
});

</script>			