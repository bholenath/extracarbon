
		
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