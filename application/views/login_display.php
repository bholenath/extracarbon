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
	
</script>

<style type="text/css">

#home_stuff
{
	display:none; position:fixed; top:60px; left:0px; width:100%; height:100%; background:rgba(0, 0, 0, .5);
	border-radius:0 0 5px 5px; text-align:center; padding: 10px 0; cursor:pointer; z-index:999;
}

#home_stuff_menu
{
	margin:20px auto; border:solid 0px #000; padding: 10px 0; width:100%; z-index:1000;
}

#home_stuff_menu a
{
	margin:0 10px; padding: 5px; font-size: 15px; font-weight:bold; color:#000; text-transform:uppercase;
}

.signup_div, .sign_div
{
	display:none; margin:auto 34.1%; padding:1.5%; text-align:left;
}

.col_1
{
	margin: auto; width: 100%; 
}

#err_msg
{
	margin:auto; width:300px;
}

#rem, #rem a 
{
    color: #606060; font-size: 12px;
}

</style>

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
							
							<tr>
								
								<td>
									<h3>Metro Card Number</h3>
									<input type="text" name="card_no" placeholder="" size="25" />
								</td>
							</tr>
							
							<tr>
								
								<td class="mf">
									<input type="radio" name="gender" value="male"  /> : Male 
									
									<input type="radio" name="gender" value="female" /> : Female 
									
								</td>
							</tr>
							
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
				
				$("#log_in_win").toggle(function()
				{
				$("#home_stuff").slideDown("fast");
				//$(this).html('<img src="<?php echo base_url()?>assets/images/close1.png">');
				},function()
				{
				$("#home_stuff").slideUp("fast");
				//$(this).html('<img src="<?php echo base_url()?>assets/images/stuff.png">');
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