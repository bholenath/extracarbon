<link href="<?php echo base_url()?>assets/css/contact.css" type="text/css" rel="stylesheet"/>
<link href="<?php echo base_url()?>assets/css/pikaday.css" type="text/css" rel="stylesheet"/>

<script type="text/javascript">

$(document).ready(function()
{

	var agree	= 0;
	
	$("#agree").change(function()
	{
		agree = $(this).attr('value', this.checked ? 1 : 0).val();

		if(agree==1)
		{
			$("#terms").css({"background":"#eee"});
		}		
	});
	

	$("#view_offer").click(function()
	{
		window.location="<?php echo base_url()?>carpool/my_offers";
	
	});
	
	$("#offer_form").submit(function()
	{
		var dest 	= $("#dest").val();
		var src 	= $("#src").val();
		var date 	= $("#datepicker").val();
		var time 	= $("#time1").val();
		var time2 	= $("#time2").val();
		
		if(dest=='')
		{
			$("#dest").css("background","#f6dbc5");
			$("#desterr").html("Required");
			return false;
		}
		if(src=='')
		{
			$("#dest").css("background","#fff");
			$("#desterr").html("");
			
			$("#src").css("background","#f6dbc5");
			$("#srcerr").html("Required");
			return false;
		}
		if(date=='')
		{
			$("#src").css("background","#fff");
			$("#srcerr").html("");
			
			$("#datepicker").css("background","#f6dbc5");
			$("#daterr").html("Required");
			return false;
		}
		if(time=='')
		{
			$("#datepicker").css("background","#fff");
			$("#daterr").html("");
			
			$("#time1").css("background","#f6dbc5");
			$("#time1err").html("Required");
			return false;
		}
		if(time2=='')
		{
			$("#time1").css("background","#fff");
			
			$("#time2").css("background","#f6dbc5");
			$("#time1err").html("Required");
			return false;
		}
		
		if(agree==0)
		{
			alert('please agree with terms and conditions');
			
			//$("#terms").css({"color":"#fff"});
			$("#terms").css({"background":"#f8b389"});
			
			return false;
		}
		else
			return true;
		
	});
	
	$("#term_show").click(function()
	{
		$('html, body').animate({scrollTop: 0},"fast");
		
		$.ajax({
		type:"post",
		url:"<?php echo base_url()?>carpool/terms_conditions",
		beforeSend:function()
		{
			$("#back_div").show();
			$("#req_terms").show().html('loading...');
		},
		success:function(html)
		{
			$("#back_div").show();
			$("#req_terms").show().html(html);
		}
		});
		
		return false;
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
				<b> Enter Car Pool Offer  </b>
				<p> Please fill all the fields for you offer. </p>
			</div>
		
				
			<div id="qns">
			
				<div class="formtitle">Fill offer details, it will be searched by user. </div>
				
				<div id="qns_cont">
				
					<div class="msg">
						<?php 
							
							echo validation_errors();
							echo $this->session->flashdata('reg_success');
							echo $this->session->flashdata('reg_offer');
						?>
					</div>
					
					<form action="<?php echo base_url()?>carpool/save_offer" method="POST" id="offer_form">
					
					<div class="input">
					
						<div class="inputtext">Destination  :  </div>
						
						<div class="inputcontent">
							<input type="text" name="dest" id="dest" ><span id="desterr"></span> 
							<br>
							<small>* This is Destination Place.</small>
						</div>
					</div>

					<div class="input">
						<div class="inputtext">Pick Up  :  </div>
						
						<div class="inputcontent">
							<input type="text" name="src" id="src" ><span id="srcerr"></span>
							<br>
							<small>* This is Pick Up Place.</small>
							
						</div>
						
					</div>

					<div class="input">
						<div class="inputtext"> Date : </div>
						
						<div class="inputcontent">
						
							<input type="text" name="date" id="datepicker" autocomplete="off"><span id="daterr"></span>
						</div>					
					</div>
					
					<div class="input">
						<div class="inputtext"> Time : </div>
						<span id="time1err"></span>
						<div class="inputcontent">
							<select name="time1" id="time1">
								<option value="">HH</option>
								<option value="1">1</option>
								<option value="2">2</option>
								<option value="4">4</option>
								<option value="5">5</option>
								<option value="6">6</option>
								<option value="7">7</option>
								<option value="8">8</option>
								<option value="9">9</option>
								<option value="10">10</option>
								<option value="11">11</option>
								<option value="12">12</option>
							</select>
							<select name="time2" id="time2">
								<option value="">MM</option>
								<option value="00">00</option>
								<option value="30">30</option>
								
							</select>
							<select name="time3" id="time3">
								<option value="am">am</option>
								<option value="pm">pm</option>
								
							</select>
							<br>
							<small>* Leave blank if search for entire day</small>
						</div>					
					</div>
					
					
					<div class="input">
						<div class="inputtext"> Mode of Contact : </div>
						
						<div class="inputcontent">
							<select name="contact_mode" id="contact_mode">
								<option value="phone">Phone</option>
								<option value="email">Email</option>
								
							</select>
							<br>
							<small>* This will be option how other user can contact you.</small>
						</div>					
					</div>
					
					<div class="input">
						<div class="inputtext"> Mode of Payment : </div>
						
						<div class="inputcontent">
							<select name="payment_mode" id="payment_mode">
			<!--				<option value="system">System</option>				-->
								<option value="cash">Cash</option>
								
							</select>
							<br>
							<small>* This will be option how you will be paid.</small>
						</div>					
					</div>
					
					
					
					<div id="terms">
			
						<input type="checkbox" id="agree" value="1"> 
					I agree with terms and conditions mention in <a href="" id="term_show"> Limitations & Liabilities </a>. 
				
					</div>
					
					
					
					
					<div class="buttons">
						
						<span id="prgs"></span>
						
						<input class="orangebutton"  name="submit" type="submit" value="Submit" />
						<button  class="greybutton1"  id="view_offer" >View My Offers </button>

					</div>
					
						
						
					</form>
			
				</div>
			
			</div>
			
			
		
		</div>
		
		
	</div>
	
	

</div>



<script type="text/javascript" src="<?php echo base_url()?>assets/js/pikaday.js"></script>
<script type="text/javascript" >

var picker = new Pikaday(
{
	field: document.getElementById('datepicker'),
	firstDay: 1,
	minDate: new Date(<?php echo date('Y-m-d')?>),
	maxDate: new Date('2050-12-31'),
	yearRange: [<?php echo date('Y')?>,2050]
});

</script>


<div id="back_div" ></div>
<div id="req_terms" ></div>