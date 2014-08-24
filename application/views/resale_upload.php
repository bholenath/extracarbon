<link href="<?php echo base_url()?>assets/css/contact.css" type="text/css" rel="stylesheet"/>

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
		
	$("#upload_form").submit(function()
	{
		var phone			= $("#phone").val();
		var email			= $("#email").val();
		var name 			= $("#name").val();
		var description 	= $("#description").val();
		
		
		
		if(phone%1!=0 || phone.length!=10 || phone=='')
		{
			alert("* Contact can not be blank. \n * Contact must be in numeric format with 10 digits");
			return false;
		}
		else if(email=='' || checkEmail(email)==false)
		{
			alert("* Please Enter Valid Email Id");
			return false;
		}
		else if(name=='')
		{
			alert("* Please Enter Item Name");
			return false;
		}
		else if(description=='')
		{
			alert("* Please Enter Item Description");
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
	
	<div id="content_div">
		
		<div id="erp_div">
			
			<div id="step_hd"> 
				<b> Upload Item Information with Image  </b>
				<p> Please Upload copy of your Item with details. </p>
			</div>
		
				
			<div id="qns">
			
				<div class="formtitle">Please fill all the fields.</div>
				
				<div id="qns_cont">
				
					<div class="msg">
						<?php 
							echo validation_errors();
							
							echo $this->session->flashdata('upload_error');
						
							
						?>
					</div>
					
					<form action="<?php echo base_url()?>resale/upload_item" method="post" enctype="multipart/form-data" 
					id="upload_form">
					
					<div class="input">
					
						<div class="inputtext">Contact No. :  </div>
						
						<div class="inputcontent">
							<input type="text" name="phone" id="phone" value="<?php echo $this->session->flashdata('phone')?>">
						</div>
					</div>
					
					
					<div class="input">
					
						<div class="inputtext">Email Id :  </div>
						
						<div class="inputcontent">
							<input type="text" name="email" id="email" value="<?php echo $this->session->flashdata('email')?>">
						</div>
						
					</div>

					<div class="input">
						<div class="inputtext">Item Name :  </div>
						
						<div class="inputcontent">
							<input type="text" name="name" id="name" value="<?php echo $this->session->flashdata('name')?>">
							<div id="name_msg"></div>
						</div>
						
					</div>
					
					<div class="input">
						<div class="inputtext">Item Description :  </div>
						
						<div class="inputcontent">
							<textarea name="description" rows="4" cols="30" id="description"><?php echo $this->session->flashdata('name')
							?></textarea>
							
							<div id="desc_msg"></div>
						</div>
						
					</div>

					<div class="input">
						<div class="inputtext"> Item Image : </div>
						
						<div class="inputcontent">
							<input type="file" name="item_pic" id="item" style="margin-left:0; margin-right:0;">
						</div>					
					</div>
					
					<div class="buttons">
						
						<span id="prgs"></span>
						
						<input class="orangebutton"  name="upload" type="submit" value="Submit" />

					</div>						
						
					</form>
			
				</div>
				
				<div class="buttons"></div>		
			
			</div>
			
			<?php 
				if(isset($_GET['ref']) && $_GET['ref']=='erp')
				{
					echo '<div id="ref_msg">Now you can upload metro receipt. If you don\'t have right now you can upload it later to 
					earn points.</div> ';
				}
				
			?>
		
		</div>
		
		
		
	</div>
	
	

</div>






<!-- ----------- Alert Message for Uploaded Ticket -------------->
	
	<?php if($this->session->flashdata('upload_msg')) :?>
	
		<script type="text/javascript">
		
		$(document).ready(function()
		{		
			$("#ok").click(function()
			{
				$("#alert_div").hide();
				$("#back_div").hide();
			});
		});
		
		</script>
		
		<div id="back_div"></div>
		
		<div id="alert_div">
		
			<div id="alert_content">
			
				<h1>Message</h1>
				
				<div id="alert_text">
				
					<?php
						echo $this->session->flashdata('upload_msg')
					?>
				</div>
				
				<div id="ok">
					
					<span>Ok</span>
				</div>
				
			</div>
		</div>
	 
 	<?php endif; ?>

<!-- -------------Ends here --------------->