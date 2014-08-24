<link href="<?php echo base_url()?>assets/css/contact.css" type="text/css" rel="stylesheet"/>

<script type="text/javascript">

$(document).ready(function()
{
	$("#ref_msg").delay(5000).fadeOut("slow");
	
	var pass = '';
	
	$("#bill_no").change(function()
	{
		var bill = $(this).val();

		
		$.ajax({
		type:"post",
		url:"<?php echo base_url().'earnpoint/check_bill_no'?>",
		data:"bill_no="+bill,
		beforeSend:function()
		{
			$("#bill_msg").html('<img src="<?php echo base_url().'assets/images/loading.gif'?>">');
		},
		success:function(html)
		{
			if(html=='false')
			{
				$("#bill_msg").html('This Bill No has been already used ');
				pass = 0;
				return false;
			}
			else
			{
				$("#bill_msg").html('');
				pass = 1;
				return true;
			}
		}
		});

	});
	
	$("#upload_form").submit(function()
	{
		var amount 	= $("#m_amt").val();
		var bill 	= $("#bill_no").val();
		
		
		
		if(amount%1!=0 || amount%100>0 || amount=='')
		{
			alert("* Amount can not be blank. \n * Amount must be in numeric format. \n * Amount must be multiple of 100.");
			return false;
		}
		else if(($.isNumeric(bill))==false || bill%1!=0)
		{
			alert("* Bill No. can not be blank. \n * Bill No. must be in numeric format. \n * Bill No. can not have decimal places.");
			return false;
		}
		else
		{
			if(pass==1)
			{
				
				return true;
			}
			else if(pass==0)
			{
				
				return false;
			}
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
				<b> Upload ticket  </b>
				<p> Please Upload copy of your metro ticket copy and please mention its bill number and Rechage amount. </p>
			</div>
		
				
			<div id="qns">
			
				<div class="formtitle">Please enter recharge amount with its Bill No and upload ticket-copy.</div>
				
				<div id="qns_cont">
				
					<div class="msg">
						<?php 
							echo validation_errors();
							//echo $this->session->flashdata('upload_msg');
							echo $this->session->flashdata('upload_error');
						
							//echo $this->session->flashdata('amount_error');
							//echo $this->session->flashdata('bill_error');
						?>
					</div>
					
					<form action="<?php echo base_url()?>earnpoint/upload_ticket" method="post" enctype="multipart/form-data" id="upload_form">
					
					<div class="input">
					
						<div class="inputtext">Fill Amount :  </div>
						
						<div class="inputcontent">
							<input type="text" name="amount" id="m_amt" value="<?php echo $this->session->flashdata('amount')?>">
						</div>
					</div>

					<div class="input">
						<div class="inputtext">Bill No :  </div>
						
						<div class="inputcontent">
							<input type="text" name="bill_no" id="bill_no" value="<?php echo $this->session->flashdata('bill_no')?>">
							<div id="bill_msg"></div>
						</div>
						
					</div>

					<div class="input">
						<div class="inputtext"> Choose File : </div>
						
						<div class="inputcontent">
							<input type="file" name="metro_ticket" id="m_ticket">
						</div>					
					</div>
					
					<div class="buttons">
						
						<span id="prgs"></span>
						
						<input class="orangebutton"  name="upload" type="submit" value="Submit" />

					</div>
					
						
						
					</form>
			
				</div>
			
			</div>
			
			<?php 
				if(isset($_GET['ref']) && $_GET['ref']=='erp')
				{
					echo '<div id="ref_msg">Now you can upload metro receipt. If you don\'t have right now you can upload it later to earn points.</div> ';
				}
				
			?>
		
		</div>
		
		<!--
	
		<div id="right_div">
		
			
			<?php echo $user_detail ?>
			
		
		</div>
		
		-->
		
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