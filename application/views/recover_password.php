<link href="<?php echo base_url()?>assets/css/contact.css" rel="stylesheet">

<style type="text/css">

#msg{border:solid 1px #aaa; border-radius:5px;width: 600px; margin:50px auto; padding: 5px;}
#msg h1 {border-bottom: solid 1px #aaa;padding: 5px 0; font-size:18px;}
#msg ul {margin:0px; list-style-type:square;}
#msg li, #msg li a {padding: 5px 0; color:#000;}
#mailerr{color:red}
#main_container{ width:98%; margin:auto; padding:10px; align:center; background:#fff; border-width:0 0 3px 0; 
-moz-border-image:url(../../assets/images/menu_back1.png) 25% 30% 10% 20% repeat;
-webkit-border-image:url(../../assets/images/menu_back1.png) 25% 30% 10% 20% repeat;
border-image:url(../../assets/images/menu_back1.png) 25% 30% 10% 20% repeat; font-family:'Open Sans',Arial,sans-serif; color:#555; 
}
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
	
	$("#form_p").submit(function()
	{
		var email = $("#email").val();
		
		if(email=='' || checkEmail(email)==false)
		{
			$("#mailerr").html("Please enter valid email");
			return false;
		}
		
		$.ajax({
		type:"post",
		url:"<?php echo base_url()?>home/check_email",
		data:"email="+email,
		success:function(response)
		{
			
			if(response=='false')
				$("#mailerr").html("This email is not registered.");
			else
			{
				$.ajax({
				type:"post",
				url:"<?php echo base_url()?>home/new_password",
				data:"mailid="+email,
				beforeSend:function()
				{
					$("#mailerr").html("<img src='<?php echo base_url()?>assets/images/loading.gif'>");
				},
				success:function(data)
				{
					$("#mailerr").html(data);
				}
				});	
				return false;
						
			}
			
			
		},
		error:function(xhr,error)
		{
			alert(xhr.status);
		}
		});
		return false;
	});
	
	
});
</script>

<div id="main_container">

	<div id="msg">
		<h1> Enter Your Email ID</h1>
		<p>	You will receive new password via email. </p>
		
		<form action="" method="post" id="form_p">
		
			<div class="input">
						
				<div class="inputtext"> Email ID : </div>
				
				<div class="inputcontent">
				
					<input type="text" name="email" id="email" ><br>
					<?php echo '<span id="mailerr"></span>' ?>
				</div>
				
			</div> 
			
			<div class="buttons">
							
				<span id="prgs"></span>
			
				<input class="orangebutton"  name="submit" type="submit" value="Submit" />

			</div>
			
		</form>
		
	</div>
	
</div>
