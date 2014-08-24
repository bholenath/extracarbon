<link href="<?php echo base_url()?>assets/css/contact.css" type="text/css" rel="stylesheet"/>

<style type="text/css">

#main_container1
{	
	border:0 hidden red;
	width:100%;
	margin:auto;
	height:auto;
	min-height:100%;
}

#send
{
height:auto; padding:5px; margin:0; width:94.5%;
}

.inputtext
{
color:#200;
}

#home_stuff1
{
	display:none; position:fixed; top:0px; left:0px; width:100%; height:100%; background:rgba(0, 0, 0, .5);
	border-radius:0 0 5px 5px; text-align:center; padding: 10px 0; cursor:pointer; z-index:999; 
}

#home_stuff_menu1
{
	margin:20px auto; border:solid 0px #000; padding: 10px 0; width:100%; z-index:1000;
}

.col_2
{
	margin: auto; width: 75%; 
}

#err_msg
{
	margin:auto; width:300px;
}

</style>

<script>

$(document).ready(function()
{
	
	var year = 'yes', screen1 = 'yes', battery = 'yes', wifi = 'yes', water = 'yes', microphone = 'yes', 
	headphones = 'yes';
	
	$('#item4').hover(function() { $('#item4').css({ 'background-color' : '#fff' }); }
	,function(){ $('#item4').css({ 'background-color' : '#ECECEC' }); });		
			
	$('#item6').hover(function() { $('#item6').css({ 'background-color' : '#fff' }); }
	,function(){ $('#item6').css({ 'background-color' : '#ECECEC' }); });
	
	$('#item8').hover(function() { $('#item8').css({ 'background-color' : '#fff' }); }
	,function(){ $('#item8').css({ 'background-color' : '#ECECEC' }); });
	
	$('#item10').hover(function() { $('#item10').css({ 'background-color' : '#fff' }); }
	,function(){ $('#item10').css({ 'background-color' : '#ECECEC' }); });		
			
	$('#item12').hover(function() { $('#item12').css({ 'background-color' : '#fff' }); }
	,function(){ $('#item12').css({ 'background-color' : '#ECECEC' }); });
	
	$('#item14').hover(function() { $('#item14').css({ 'background-color' : '#fff' }); }
	,function(){ $('#item14').css({ 'background-color' : '#ECECEC' }); });
	
	$('#item16').hover(function() { $('#item16').css({ 'background-color' : '#fff' }); }
	,function(){ $('#item16').css({ 'background-color' : '#ECECEC' }); });
	
	$("#item4").click(function()
	{
	
		$(this).removeClass();
		$(this).addClass("active2");
		$(this).css({ 'background-color' : '#1573BB' });
		$(this).hover(function() { $(this).css({ 'background-color' : '#1573BB' }); });
		year = 'no';
				
		$("#item3").removeClass();
		$("#item3").css({ 'background-color' : '#ECECEC' });
		$("#item3").addClass("deactive2");
		$('#item3').hover(function() { $('#item3').css({ 'background-color' : '#fff' }); }
		,function(){ $('#item3').css({ 'background-color' : '#ECECEC' }); });
		
	});
	
	$("#item3").click(function()
	{
	
		$(this).removeClass();
		$(this).addClass("active2");
		$(this).css({ 'background-color' : '#1573BB' });
		$(this).hover(function() { $(this).css({ 'background-color' : '#1573BB' }); });
		year = 'yes';
				
		$("#item4").removeClass();
		$("#item4").css({ 'background-color' : '#ECECEC' });
		$("#item4").addClass("deactive2");
		$('#item4').hover(function() { $('#item4').css({ 'background-color' : '#fff' }); }
		,function(){ $('#item4').css({ 'background-color' : '#ECECEC' }); });
		
	});
	
		
	$("#item6").click(function()
	{
	
		$(this).removeClass();
		$(this).addClass("active2");
		$(this).css({ 'background-color' : '#1573BB' });
		$(this).hover(function() { $(this).css({ 'background-color' : '#1573BB' }); });
		screen1 = 'no';
				
		$("#item5").removeClass();
		$("#item5").css({ 'background-color' : '#ECECEC' });
		$("#item5").addClass("deactive2");
		$('#item5').hover(function() { $('#item5').css({ 'background-color' : '#fff' }); }
		,function(){ $('#item5').css({ 'background-color' : '#ECECEC' }); });
		
	});
	
	$("#item5").click(function()
	{
	
		$(this).removeClass();
		$(this).addClass("active2");
		$(this).css({ 'background-color' : '#1573BB' });
		$(this).hover(function() { $(this).css({ 'background-color' : '#1573BB' }); });
		screen1 = 'yes';
						
		$("#item6").removeClass();
		$("#item6").css({ 'background-color' : '#ECECEC' });
		$("#item6").addClass("deactive2");
		$('#item6').hover(function() { $('#item6').css({ 'background-color' : '#fff' }); }
		,function(){ $('#item6').css({ 'background-color' : '#ECECEC' }); });
		
	});
	
	$("#item8").click(function()
	{
	
		$(this).removeClass();
		$(this).addClass("active2");
		$(this).css({ 'background-color' : '#1573BB' });
		$(this).hover(function() { $(this).css({ 'background-color' : '#1573BB' }); });
		battery = 'no';
						
		$("#item7").removeClass();
		$("#item7").css({ 'background-color' : '#ECECEC' });
		$("#item7").addClass("deactive2");
		$('#item7').hover(function() { $('#item7').css({ 'background-color' : '#fff' }); }
		,function(){ $('#item7').css({ 'background-color' : '#ECECEC' }); });
		
	});
	
	$("#item7").click(function()
	{
	
		$(this).removeClass();
		$(this).addClass("active2");
		$(this).css({ 'background-color' : '#1573BB' });
		$(this).hover(function() { $(this).css({ 'background-color' : '#1573BB' }); });
		battery = 'yes';
						
		$("#item8").removeClass();
		$("#item8").css({ 'background-color' : '#ECECEC' });
		$("#item8").addClass("deactive2");
		$('#item8').hover(function() { $('#item8').css({ 'background-color' : '#fff' }); }
		,function(){ $('#item8').css({ 'background-color' : '#ECECEC' }); });
		
	});
	
	$("#item10").click(function()
	{
	
		$(this).removeClass();
		$(this).addClass("active2");
		$(this).css({ 'background-color' : '#1573BB' });
		$(this).hover(function() { $(this).css({ 'background-color' : '#1573BB' }); });
		wifi = 'no';
						
		$("#item9").removeClass();
		$("#item9").css({ 'background-color' : '#ECECEC' });
		$("#item9").addClass("deactive2");
		$('#item9').hover(function() { $('#item9').css({ 'background-color' : '#fff' }); }
		,function(){ $('#item9').css({ 'background-color' : '#ECECEC' }); });
				
	});
	
	$("#item9").click(function()
	{
	
		$(this).removeClass();
		$(this).addClass("active2");
		$(this).css({ 'background-color' : '#1573BB' });
		$(this).hover(function() { $(this).css({ 'background-color' : '#1573BB' }); });
		wifi = 'yes';
						
		$("#item10").removeClass();
		$("#item10").css({ 'background-color' : '#ECECEC' });
		$("#item10").addClass("deactive2");
		$('#item10').hover(function() { $('#item10').css({ 'background-color' : '#fff' }); }
		,function(){ $('#item10').css({ 'background-color' : '#ECECEC' }); });
		
	});
	
	$("#item12").click(function()
	{
	
		$(this).removeClass();
		$(this).addClass("active2");
		$(this).css({ 'background-color' : '#1573BB' });
		$(this).hover(function() { $(this).css({ 'background-color' : '#1573BB' }); });
		water = 'no';
						
		$("#item11").removeClass();
		$("#item11").css({ 'background-color' : '#ECECEC' });
		$("#item11").addClass("deactive2");
		$('#item11').hover(function() { $('#item11').css({ 'background-color' : '#fff' }); }
		,function(){ $('#item11').css({ 'background-color' : '#ECECEC' }); });
		
	});
	
	$("#item11").click(function()
	{
	
		$(this).removeClass();
		$(this).addClass("active2");
		$(this).css({ 'background-color' : '#1573BB' });
		$(this).hover(function() { $(this).css({ 'background-color' : '#1573BB' }); });
		water = 'yes';
								
		$("#item12").removeClass();
		$("#item12").css({ 'background-color' : '#ECECEC' });
		$("#item12").addClass("deactive2");
		$('#item12').hover(function() { $('#item12').css({ 'background-color' : '#fff' }); }
		,function(){ $('#item12').css({ 'background-color' : '#ECECEC' }); });
		
	});
	
	$("#item14").click(function()
	{
	
		$(this).removeClass();
		$(this).addClass("active2");
		$(this).css({ 'background-color' : '#1573BB' });
		$(this).hover(function() { $(this).css({ 'background-color' : '#1573BB' }); });
		microphone = 'no';
								
		$("#item13").removeClass();
		$("#item13").css({ 'background-color' : '#ECECEC' });
		$("#item13").addClass("deactive2");
		$('#item13').hover(function() { $('#item13').css({ 'background-color' : '#fff' }); }
		,function(){ $('#item13').css({ 'background-color' : '#ECECEC' }); });
		
	});
	
	$("#item13").click(function()
	{
	
		$(this).removeClass();
		$(this).addClass("active2");
		$(this).css({ 'background-color' : '#1573BB' });
		$(this).hover(function() { $(this).css({ 'background-color' : '#1573BB' }); });
		microphone = 'yes';
								
		$("#item14").removeClass();
		$("#item14").css({ 'background-color' : '#ECECEC' });
		$("#item14").addClass("deactive2");
		$('#item14').hover(function() { $('#item14').css({ 'background-color' : '#fff' }); }
		,function(){ $('#item14').css({ 'background-color' : '#ECECEC' }); });
		
	});

    $("#item16").click(function()
	{
	
		$(this).removeClass();
		$(this).addClass("active2");
		$(this).css({ 'background-color' : '#1573BB' });
		$(this).hover(function() { $(this).css({ 'background-color' : '#1573BB' }); });
		headphones = 'no';
										
		$("#item15").removeClass();
		$("#item15").css({ 'background-color' : '#ECECEC' });
		$("#item15").addClass("deactive2");
		$('#item15').hover(function() { $('#item15').css({ 'background-color' : '#fff' }); }
		,function(){ $('#item15').css({ 'background-color' : '#ECECEC' }); });
		
	});
	
	$("#item15").click(function()
	{
	
		$(this).removeClass();
		$(this).addClass("active2");
		$(this).css({ 'background-color' : '#1573BB' });
		$(this).hover(function() { $(this).css({ 'background-color' : '#1573BB' }); });
		headphones = 'yes';
											
		$("#item16").removeClass();
		$("#item16").css({ 'background-color' : '#ECECEC' });
		$("#item16").addClass("deactive2");
		$('#item16').hover(function() { $('#item16').css({ 'background-color' : '#fff' }); }
		,function(){ $('#item16').css({ 'background-color' : '#ECECEC' }); });
		
	});
	
	$("#submit").click(function()
	{
	
		$.ajax({
		type:"POST",
		url:"<?php echo base_url()?>other/check_price",
		data: { value : '<?php echo $value; ?>', year : year , screen1 : screen1, battery : battery, wifi : wifi, water : water,
		microphone : microphone, headphones : headphones },
		beforeSend:function()
		{
			$("#show_price").show().html("<img src='<?php echo base_url()?>assets/images/loading.gif'>");
		},
		success:function(price)
		{
		
			$("#show_price").show().html("<div style='float:left; width:65%; position:relative;'>Extra Carbon price for your E-Waste is :			<u><font style='font-size:24px; color:#33AE33;'>Rs. " + price + "</font></u></div>");
			$("#button").css({ 'display' : 'block' });
			$("#show_price").append( $("#button") );
			window.exchange_price = price;
		}
			});
			
	});
	
	$(".orangebutton").hover(function()
	{
	$(this).css({ 'background' : 'url(<?php echo base_url() ?>assets/images/bg_3.png) repeat' });
	},function()
	{
	$(".orangebutton").css({ 'background' : 'url(<?php echo base_url() ?>assets/images/button.png) repeat' });
	});

	$(".orangebutton").focus(function()
	{
	$(this).css({ 'background' : 'url(<?php echo base_url() ?>assets/images/bg_4.png) repeat' });
	});

});

</script>

<div id="main_container" style="padding-bottom:5%;">

<div id="heading1">

<center>

<br><br>

<font style="font-family:arial; text-align:center; font-weight:bold; font-size:18px; color:#200;">
<u> Choose Your Model Conditions </u></font>

</center>

</div> 

<div id="side2">

<div style="width:98%; margin:auto 1%;">

<center>

<br><br><br>

<font style='font-weight:bold; text-align:center; font-size:20px; color:brown;'><u> Your Chosen Product </u></font>

<br><br><br>

<img align="absmiddle" src="<?php echo base_url()?>assets/images/ewaste_items/<?php echo $image; ?>" width="120px" height="200px" 
style="vertical-align:middle; margin:auto;">

<br><br><br>

<font style='font-weight:bold; text-align:center; font-size:16px; color:brown;'><u> <?php echo $company; echo "&nbsp;&nbsp;"; 
echo $name;?> </u></font>

<br><br>

<a href="<?php echo base_url()?>other/ewaste"> Change your Product </a>

<br><br><br>

</center>

</div>

</div>

<div id="side1">

<div class="question">

<span class="q">Is your model older than one year?</span>

<div class="option">
<h3 id="item3" style="border-radius:2px 0 0 0;" class="active2">Yes</h3>  
<h3 id="item4" style="border-left-style:none; border-radius:0 2px 0 0;" class="deactive2">No</h3>	
</div>

</div>

<div class="question">

<span class="q">Did you change screen of your phone?</span>

<div class="option">
<h3 id="item5" style="border-radius:2px 0 0 0;" class="active2">Yes</h3>  
<h3 id="item6" style="border-left-style:none; border-radius:0 2px 0 0;" class="deactive2">No</h3>	
</div>

</div>

<div class="question">

<span class="q">Did you change battery of your phone?</span>

<div class="option">
<h3 id="item7" style="border-radius:2px 0 0 0;" class="active2">Yes</h3>  
<h3 id="item8" style="border-left-style:none; border-radius:0 2px 0 0;" class="deactive2">No</h3>	
</div>

</div>

<div class="question">

<span class="q">Are your wifi, camera, bluetooth out of order?</span>

<div class="option">
<h3 id="item9" style="border-radius:2px 0 0 0;" class="active2">Yes</h3>  
<h3 id="item10" style="border-left-style:none; border-radius:0 2px 0 0;" class="deactive2">No</h3>	
</div>

</div>

<div class="question">

<span class="q">Does your mobile has water damage?</span>

<div class="option">
<h3 id="item11" style="border-radius:2px 0 0 0;" class="active2">Yes</h3>  
<h3 id="item12" style="border-left-style:none; border-radius:0 2px 0 0;" class="deactive2">No</h3>	
</div>

</div>

<div class="question">

<span class="q">Is your mobile's microphone not working?</span>

<div class="option">
<h3 id="item13" style="border-radius:2px 0 0 0;" class="active2">Yes</h3>  
<h3 id="item14" style="border-left-style:none; border-radius:0 2px 0 0;" class="deactive2">No</h3>	
</div>

</div>

<div class="question">

<span class="q">Did you change your head phones?</span>

<div class="option">
<h3 id="item15" style="border-radius:2px 0 0 0;" class="active2">Yes</h3>  
<h3 id="item16" style="border-left-style:none; border-radius:0 2px 0 0;" class="deactive2">No</h3>	
</div>

</div>

<div class="submit">
<input type="submit" id="submit" class='orangebutton' value=" SUBMIT " style="width:40%;">
</div>

</div>

<div id="show_price"></div>
 

<div id="button" style="display:none;">

<div class='buttons' style='margin:0 2%; float:left; width:31%; padding:0;'><button class='orangebutton' id='send'> Proceed To Sell 
</button></div>

</div>
 
	
	<div id="home_stuff1">
			
		<img src="<?php echo base_url()?>assets/images/close1.png" alt="close" style="float:right; background:#eee;	border-radius:3px; 
		padding:1px;" id="close_log1"/>
			
		<div id="home_stuff_menu1">
															
			<div id="heading1">

			<center>

				<br><br>

				<font style="font-family:arial; text-align:center; font-weight:bold; font-size:25px; color:#ACB833;">
				<u> Enter Your Details </u></font>

			</center>

			</div> 												
																					
		   <div class="col_2">
									
			<div style="margin:1% 0; float:left; width:100%;">
			
				<div class="inputtext" style="float:left; width:42%; color:#ACB833; padding:9px; margin-right:1%; text-align:left;">
				Contact Number : <font style="color:#c41200; font-size:16px;"> *</font></div>
										
				<!-- <form name="data_send" id="data_send"> -->
										
				<div style="width:53%; float:left; margin-left:1%;">						
				<input type="text" name="phone_no" tabindex="1" id="phone_no" required maxlength="10" style="border:1px solid green; 
				width:100%; height:auto; padding: 7px 5px; -moz-box-shadow: inset 0 0 1px #186DED; -webkit-box-shadow: inset 0 0 1px 
				#186DED; box-shadow: inset 0 0 1px #186DED; text-align:left; border-radius:5px; float:left;"/>
				
				</div>
															
			</div>
					
			<div style="margin:1% 0; float:left; width:100%;">
			
				<div class="inputtext" style="float:left; width:42%; color:#ACB833; padding:9px; margin-right:1%; text-align:left;">
				Contact E-Mail : <font style="color:#c41200; font-size:16px;"> *</font></div>
										
				<div style="width:53%; float:left; margin-left:1%;">						
				<input type="text" name="e_mail" tabindex="2" id="e_mail" required maxlength="64" style="border:1px solid green; 
				width:100%; height:auto; padding: 7px 5px; -moz-box-shadow: inset 0 0 1px #186DED; -webkit-box-shadow: inset 0 0 1px 
				#186DED; box-shadow: inset 0 0 1px #186DED; text-align:left; border-radius:5px; float:left;"/>
				</div>
															
			</div>		
					
			<div style="margin:1% 0; float:left; width:100%;">
			
				<div class="inputtext" style="float:left; width:42%; color:#ACB833; padding:9px; margin-right:1%; text-align:left;">
				Contact Address : <font style="color:#c41200; font-size:16px;"> *</font></div>
				
				<div style="width:53%; float:left; margin-left:1%;">
				<textarea id="address" name="address" required tabindex="3" maxlength="300" rows="5" cols="45" 
				style="border:1px solid green; padding:5px; -moz-box-shadow: inset 0 0 1px #186DED; -webkit-box-shadow: inset 0 0 1px 
				#186DED; float:left; box-shadow: inset 0 0 1px #186DED; text-align:left; border-radius:5px;"></textarea>
				</div>
				
			</div>
			
			
			<div style="margin:1% 0; float:left; width:100%;">
			
				<div class="inputtext" style="float:left; width:42%; color:#ACB833; padding:9px; margin-right:1%; text-align:left;">
				Specific Instructions :</div>
				
				<div style="width:53%; float:left; margin-left:1%;">
				<textarea id="instruction" name="instruction" tabindex="4" maxlength="300" rows="5" cols="45" style="border:1px solid 
				green; padding:5px; -moz-box-shadow: inset 0 0 1px #186DED; -webkit-box-shadow: inset 0 0 1px #186DED; float:left;
				box-shadow: inset 0 0 1px #186DED; text-align:left; border-radius:5px;"></textarea>
				</div>
				
			</div>
			
			<div style="margin:1% 0; float:left; width:100%;">
			
			<font style="color:#c41200; font-size:15px;"> * fields are Compulsory </font>
			
			</div>
							
			<div class="buttons" style="margin:1% 0; float:left; width:100%;">
						
				<input type="submit" class="orangebutton" tabindex="5" id="send1" value=" Send " style="height:35px; width:50%;"/>

			</div>												
																					
		   </div>
			
				<div id="err_msg"></div>
															
		</div>
							
	</div>

</div>

<script type="text/javascript">

$(document).ready(function()
{

	$("#send").toggle(function()
	{
		$("#home_stuff1").slideDown("fast");
		//$(this).html('<img src="<?php echo base_url()?>assets/images/close1.png">');
		
	},function()
	{
		$("#home_stuff1").slideUp("fast");
		//$(this).html('<img src="<?php echo base_url()?>assets/images/stuff.png">');
	});
	
	$("#close_log1").click(function()
	{
	$("#home_stuff1").slideUp("fast");
	});
					
	$("#send1").click(function()
	{
	
	var emailRegEx1 = /^[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/;
	if($.trim($("#phone_no").val())=="" || $.trim($("#e_mail").val())=="" || $.trim($("#address").val())=="")
	{
	alert("  Please Fill the Compulsory fields  ");
	$("#phone_no").focus();
	return false;
	}
	else if (!($("#phone_no").val()).toString().match(/^[-]?\d*\-?\d*$/)) 
	{
	alert("  Please Enter a Valid Numeric Contact No.  ");
    $("#phone_no").focus();
	return false;
	}
	else if (($("#e_mail").val()).search(emailRegEx1) == -1) 
	{
    alert("  Please Enter a Valid Email Address  ");
    $("#e_mail").focus();
    return false;
    }	
	else
	{
		var phone_no = $("#phone_no").val();	
		var e_mail = $("#e_mail").val();
		var address = $("#address").val();
		var instruction = $("#instruction").val();
		
		$.ajax({
		type:"POST",
		url:"<?php echo base_url()?>home/ewaste_pickup",
		data: { price : exchange_price , base_value : '<?php echo $value; ?>' , company : '<?php echo $company; ?>'	, 
		model : '<?php echo $name; ?>' , phone_no : phone_no , e_mail : e_mail , address : address , instruction : instruction },
		beforeSend:function()
		{
			$("#send1").val(" Sending... ");
		},
		success:function(disp)
		{
			alert(disp);
			window.location.href="<?php echo base_url()?>home";
			/*$("#send1").val(" Send ");
			$("#send1").css({ 'background' : 'url(<?php echo base_url() ?>assets/images/button.png) repeat' });*/
		}
			});
			
	}		
		
	});
	
});

</script>	