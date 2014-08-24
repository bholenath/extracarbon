<!DOCTYPE HTML PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
	<title><?php echo $title; ?> </title>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
	
		<meta tag="keyword" content="car pool, rideshare, second hand items, waste pick up, recycle waste, gift a plant" />
		<meta tag="description" content="share your car in ncr or find a buyer for your second hand item, recycle your waste items" />
		<?php $base = base_url().'assets/';	?>
		
		<link href="<?php echo base_url()?>assets/images/favicon.png" rel="shortcut icon" type="image/png" />
		<link href="<?php echo base_url()?>assets/css/style.css" rel="stylesheet" type="text/css" />
		<script src="http://code.jquery.com/jquery-1.10.2.js"></script>
		<script src="http://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
		<script type="text/javascript" src="<?php echo base_url()?>assets/js/jquery.cycle.all.js"></script>
		<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
		<script src="<?php echo base_url()?>assets/js/jquery.cycle.all.js"></script>
		
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
				
				$("#user_settings ul li font").hover(function()
				{
				$(this).css({ 'color' : '#1473bb' });				
				},function()
				{
				$(this).css({ 'color' : '#fff' });
				});
				
				$("#user_settings ul li font").focus(function()
				{
				$(this).css({ 'color' : '#1473bb' });					
				});
								
				$("#user_settings ul li font").blur(function()
				{
				$(this).css({ 'color' : '#fff' });					
				});
								
			});
			
			$(document).mouseup(function (e)
			{
				var container = $("#user_settings");

				if (container.has(e.target).length === 0)
				{
					$("#set").css("background","none");
					$("#user_settings").slideUp("fast");
				}
			});
		
		</script>
		
		
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

		
	</head>
	
<body>

	<div id="outer_container">
	
		<div id="header">
		
			<div id="left_head">
			
				<a href="<?php echo base_url()?>home">
					<img src="<?php echo base_url()?>assets/images/logo.png" alt="logo" style="vertical-align:middle; 
					height:95.7%; width:auto; padding:1%; margin:0;"/> 
				</a>
				
			</div>
			
			<div id="right_head"> 
			
			<?php if($this->session->userdata('username')):?>
				
				<table align="right" width="50%" height="100%" border="0">
					<tr>
					
						<td style="width:25%;">
							<a href="<?php echo base_url()?>dashboard" style="color:#200; text-decoration:none;">
								<img src="<?php echo base_url()?>assets/images/home1.png" height="35px" width="35px" 
								style="margin:0 2%;"/>&nbsp;HOME
							</a>
						</td>
						
						<td style="width:43%; cursor:default; color:#200;" >
							<img src="<?php echo base_url()?>assets/images/im.png" alt="img" height="35px" width="35px" 
							style="margin:0 1%;"/>
							<?php echo (strtoupper($this->session->userdata('name')));?>
						</td>
						
						<td id="set" style="width:30%; color:#200;">
													
							<span id="settings"> 
								<img src="<?php echo base_url()?>assets/images/setting.png" alt="img" height="35px" width="35px" 
								style="margin:0 1%;"/>&nbsp;SETTINGS
							</span>
							
							<div id="user_settings">
								
								<ul>
									<li>
										<a href="<?php echo base_url()?>dashboard/profile" style="color:#fff; text-decoration:none;">
										<font style="vertical-align:bottom;">Profile</font> 
										&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
										&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
										&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
										<img src="<?php echo base_url()?>assets/images/profile.png" alt="img" />
										</a>
									</li>
									
									<li>
										<a href="<?php echo base_url()?>dashboard/change_password" style="color:#fff; 
										text-decoration:none;">
										<font style="vertical-align:bottom;">Change Password</font> 
										&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
										&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;										
										<img src="<?php echo base_url()?>assets/images/password.png" alt="img" />
										</a>
									</li>
									
									<li class="last">
										<a href="<?php echo base_url()?>logout" style="color:#fff; text-decoration:none;">
										<font style="vertical-align:bottom;">Logout</font>									
										&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
										&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
										&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;									
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
			echo validation_errors(); 
			if($this->session->flashdata('login_error'))
			{
			echo '<script type="text/javascript">alert("'.$this->session->flashdata('login_error').'")</script>'; 
			}
			?>
				
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
		 
		 <div id="back_div"></div>
					
					<div id="resale_form_div">
					
						<img src="<?php echo base_url()?>assets/images/close1.png" alt="Close" style="float:right; cursor:pointer;" 
						id="resale_cls"/>
						
						<form action="<?php echo base_url()?>home/resale_signup" method="post" id="resale_form" 
						enctype="multipart/form-data">
						
							<label>Email:</label>
							<input type="text" name="email" id="itm_email"> <br>
							<small id="log_msg"></small>
							
							<label>Contact No.:</label>
							<input type="text" name="phone" id="itm_phone"> <br>
							
							<label>Name:</label>
							<input type="text" name="name" id="itm_name"> <br>
							
							<label>Description:</label>
							<textarea name="description" id="itm_desc"></textarea> <br>
							
							<label>Item's Image :</label>
							<input type="file" name="item_pic" id="itm_pic"> <br><br>
							
							<input type="submit" name="upload" value="Send">
							
						</form>
						
					<div id="reg_err"></div>
												
					</div> 
							 		
		<?php echo ($this->session->userdata('username')?'<div id="dashboard_surface">':'');?>
		
		<?php
	
			if($this->session->userdata('username'))
			{
				echo '<div id="dashboard_head">';
				
				echo '<div class="top_in"><img src="'.base_url().'assets/images/metro.png" title="Point Earned by Metro Section"><br>';
							
				echo (($user_data->metro_point));
				
				echo '</div>';
				
				echo '<div class="top_in"><img src="'.base_url().'assets/images/trash.png" title="Point Earned by Waste-Pick"><br>';
							
				echo (($user_data->waste_pick_point));
				
				echo '</div>';
				
				echo '<div class="top_in"><img src="'.base_url().'assets/images/coupon.png" title="Point Earned by Coupons"><br>';
							
				echo (($user_data->coupon_points));
				
				echo '</div>';
				
				if(isset($coupon) && !empty($coupon))
				{
					echo '<div class="top_in" style="padding-top:8px;">
							<div id="coupon_alert" style="padding-top:9px;">
							<a href="'.base_url().'redeempoints">
								You have a new Extracarbon Coupon worth Rs.<span id="amt">'.$coupon->amount.'</a></span>
							</div>
						  </div>';
				}
								
				echo '</div>';				
			}
		?>  
		
		<script type="text/javascript">
			$(document).ready(function()
			{
				var ttl = $("#working").attr('data');
				
				$("#title_sh").fadeIn("slow").html(ttl);
				
				$("#title_sh").animate({marginTop:"-1px"},'fast');
				$("#title_sh").animate({marginTop:"15px"},'fast');
				$("#title_sh").animate({marginTop:"-1px"},'fast');
				$("#title_sh").animate({marginTop:"15px"},'fast');
				$("#title_sh").animate({marginTop:"-1px"},'fast');
				
				
				$("#working").attr("src","<?php echo base_url()?>assets/images/qns1.png");
				
				
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
				
				$("#fb").hover(function()
				{
					$("#fb").attr("src","<?php echo base_url()?>assets/images/fb1.png");
				},function()
				{
					$("#fb").attr("src","<?php echo base_url()?>assets/images/fb.png");
				});
				
				$("#register").hover(function()
				{
				$(this).css({ 'color' : '#1573bb' });
				},function()
				{
				$(this).css({ 'color' : '#555' });
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
				
				/*--------- item upload form ------------ */
				
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
				
				
				function checkEmail(e) 
				{
					var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
					if (!filter.test(e)) 
					{
						return false;
					}
					
				}
				
				size=0;
				
				$("#itm_pic").bind('change', function()
				{
					size=this.files[0].size;
					
				});
				
				
				var valid = 0;
				
				$("#itm_email").change(function()
				{
					var s_mail = $(this).val();
					
					$.ajax({
					type:"POST",
					url:"<?php echo base_url()?>home/check_email",
					data:"email="+s_mail,
					beforeSend:function()
					{
						$("#log_msg").show().html("<img src='<?php echo base_url()?>assets/images/loading.gif'>");
					},
					success:function(response)
					{
						if(response=="true")
						{
							$("#log_msg").show().html("Please Choose Different Email-Id");
						
							return false;
						}
						else if(response=="false")
						{
							$("#log_msg").hide();
							valid =1;
						}
					}
					});
					
				});
				
				

				
				$("#resale_form").submit(function()
				{
					var email = $("#itm_email").val();
					var phone = $("#itm_phone").val();
					var name = $("#itm_name").val();
					var desc = $("#itm_desc").val();
					
					
					if(email=='' || checkEmail(email)==false)
					{
						$("#reg_err").fadeIn().html('Please fill valid Email Id');
						return false;
					}
					else if(phone=='' || phone%1!=0 || phone.length!=10)
					{
						$("#reg_err").fadeIn().html('Please fill Contact No. with 10 digits');
						return false;
					}
					else if(name=='')
					{
						$("#reg_err").fadeIn().html('Please Item Name');
						return false;
					}
					else if(desc=='')
					{
						$("#reg_err").fadeIn().html('Please Item Description');
						return false;
					}
					else if(size==0)
					{
						$("#reg_err").fadeIn().html('Please choose Item image upto 2MB.');
						return false;
					}
					else if(valid!=1)
					{
						$("#reg_err").fadeIn().html('Please Different email id');
						return false;
					}
					else
					{
						$("#reg_err").fadeOut();
						
						$('input[type=submit]',this).val('sending...');
						
						return true;
						
						$('input[type=submit]',this).attr('disabled','disabled');
						
					}
										
				});
				
			});
		
		</script>