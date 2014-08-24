<script type="text/javascript">

$(document).ready(function()
{
	var car_qns ='';
	
	$("#car_y").click(function()
	{
			
		$(this).is(":checked");
		{
			car_qns = 'yes'; 
		}
		
		$("#car_no").slideDown();
		$("#ans_y").hide();
	
		
		
	});
	
	$(".mtr").click(function()
	{
		$("#metro_msg").slideDown();
	});
	
	
	$(".mtr").blur(function(event)
	{
		//event.stopPropagation();
		//$("#metro_msg").hide();
	});
	
	
	$(".mtr_n").click(function()
	{
		$("#metro_msg").hide();
	});
	
	$("#car_n").click(function()
	{
		
		$("#metro_msg").hide();
		
		$(this).is(":checked");
		{
			car_qns = 'no'; 
		}
		
		$("#ans_y").slideDown();
		$("#car_no").hide();
		
	});
	
	$("#next_2 button").click(function()
	{
		
		
		if(car_qns=='yes' )
		{
			//alert("car:-"+car_qns+",  car_no:-"+car_no+", metro/other:- "+travel_qns);
			
			var car_no 			= $("#car_no_inpt").val();
			var travel_qns 		= $("input:radio[name=trvl_qns]:checked").val();
			var travel_qns_2	= 0;
			
			if(car_no=='')
			{
				alert('Please Enter Your Car No');
				return false;
			}
			else if(travel_qns!='metro' && travel_qns!='other')
			{
				//alert(travel_qns);
				alert('Please Choose Travel Option');
				return false;
			}
		}
		else if(car_qns=='no')
		{
			//alert(travel_qns_2);
			var car_no 			= 0;
			var travel_qns 		= 0;
			var travel_qns_2 	= $("input:radio[name=travel_qns_2]:checked").val();
			
			if(travel_qns_2!='metro' && travel_qns_2!='other')
			{
				//alert(travel_qns_2);
				alert('Please Choose Travel Option');
				return false;
			}
			
		}
		if(car_qns!='')
		{
		
			$.ajax({
			url:"<?php echo base_url()?>earnpoint/save_user_choice",
			type:"post",
			data:"car_no=" + car_no + "&travel_choice=" + travel_qns + "&travel_choice_2=" + travel_qns_2,
			success:function(html)
			{
				alert('Now please upload your ticket form upload ticket uption');
				window.location="<?php echo base_url()?>earnpoint/upload_ticket/?ref=erp";
			}
			});
		}
	});
	
});


</script>


<div id="qns" >

<?php
	//echo $this->session->userdata('userid');
	//print_r($user_data);
?>
	<div class="formtitle">Please Enter your Contact Details</div>
	
	<div id="qns_cont">
		
		
		<div id="q1"><h2>Do you have a car? </h2></div>
		
			<div class="op"> 
				Yes: <input type="radio" name="car_qns" id="car_y" value="yes" <?php echo (isset($user_data->car_own)&&$user_data->car_own=='yes'?'checked':'')?>> 
			</div>
			
				<div id="car_no"> 
					<b>Enter Car Number : </b> &nbsp; <input type="text" name="car_no" id="car_no_inpt" value="<?php echo (isset($user_data->car_no)?$user_data->car_no:'') ?>"> <br><br>
					
					<b>What do you use to travel : </b>
					&nbsp;&nbsp;
					
					<br>
					
					Metro:<input type="radio" name="trvl_qns" id="metro_y" value="metro" class="mtr"> <br>
					Bus/Taxi/Cab: <input type="radio" name="trvl_qns" id="metro_n" value="other" class="mtr_n"> 
					<div id="chose_msg">Please choose any option</div>
				</div>
			
			<div class="op"> 			
				No: &nbsp;<input type="radio" name="car_qns" id="car_n" value="yes" > 
			</div>
			
			<div id="ans_y" >
				<b>What do you prefer to tavel : </b> 
				<br>
				
				Metro : <input type="radio" name="travel_qns_2" id="metro_y" value="metro" class="mtr">
				 <br>
				Bus/Taxi/Cab : <input type="radio" name="travel_qns_2" id="metro_n" value="other" class="mtr_n"> <br>
			</div>

	</div>
	
	<div id="metro_msg">Please upload your metro ticket from upload ticket option.</div>
	
	<div id="next_2"><button id="next_btn">Next</button></div>
	
	
</div>