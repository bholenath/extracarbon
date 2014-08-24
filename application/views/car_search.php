<link href="<?php echo base_url()?>assets/css/contact.css" type="text/css" rel="stylesheet"/>
<link href="<?php echo base_url()?>assets/css/pikaday.css" type="text/css" rel="stylesheet"/>

<script type="text/javascript">

$(document).ready(function()
{
	$("#search_form").submit(function()
	{
		var to 		= $("#to").val();
		var from 	= $("#from").val();
		var date 	= $("#datepicker").val();
		
		if(to=='')
		{
			$("#to").css("background","#f6dbc5");
			$("#toerr").html("Required");
			return false;
		}
		if(from=='')
		{
			$("#to").css("background","#fff");
			$("#toerr").html("");
			
			$("#from").css("background","#f6dbc5");
			$("#fromerr").html("Required");
			return false;
		}
		if(date=='')
		{
			$("#from").css("background","#fff");
			$("#fromerr").html("");
			
			$("#datepicker").css("background","#f6dbc5");
			$("#daterr").html("Required");
			return false;
		}
		else
			return true;
		
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
				<b> Search for Lift  </b>
				<p> Please fill all the fields to search a car available for lift. </p>
			</div>
		
				
			<div id="qns">
			
				<div class="formtitle">To make your search more accessible you can search for places near by you.</div>
				
				<div id="qns_cont">
				
					<div class="msg">
						<?php 
							echo validation_errors();
							echo $this->session->flashdata('reg_success');
						?>
					</div>
					
					<form action="<?php echo base_url()?>carpool/search" method="GET" id="search_form">
					
					<div class="input">
					
						<div class="inputtext">To :  </div>
						
						<div class="inputcontent">
							<input type="text" name="to" id="to" ><span id="toerr"></span> 
							<br>
							<small>* Destination Place</small>
						</div>
					</div>

					<div class="input">
						<div class="inputtext">From :  </div>
						
						<div class="inputcontent">
							<input type="text" name="from" id="from" ><span id="fromerr"></span>
							<br>
							<small>* Pick Up/Source Place</small>
							
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
								<option value="">--</option>
								<option value="am">am</option>
								<option value="pm">pm</option>
								
							</select>
							<br>
							<small>* Leave blank if search for entire day</small>
						</div>					
					</div>
					
					
					<div class="buttons">
						
						<span id="prgs"></span>
						
						<input class="orangebutton"  name="search" type="submit" value="Search" />

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

