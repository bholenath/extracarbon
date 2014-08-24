<style type="text/css">

#main_container1
{
	border:0 hidden red;
	width:100%;
	margin:auto;
	margin-bottom:1.5%;
	min-height:100%;
	height:1100px;
}

#disp1:hover, #disp2:hover
{
background-color:#cacaca;
}

#disp1:active, #disp2:active
{
background-color:#fff;
}

/*#disp1:focus, #disp2:focus
{
background-color:#1573BB;
}*/

</style>

<script>
	
$(document).ready(function()
{

	/*var now = new Date();
	var time = now.getTime();
	var expireTime = time + 1000*24*60*60*30;
	now.setTime(expireTime);
	document.cookie = 'model=smartphone;expires='+now.toGMTString()+';path=/other/ewaste';

	var now1 = new Date();
	var time1 = now1.getTime();
	var expireTime1 = time1 + 1000*24*60*60*30;
	now1.setTime(expireTime1);
	document.cookie = 'company=Apple;expires='+now1.toGMTString()+';path=/other/ewaste';*/
		
	/*sessionStorage.setItem("model","smartphone");
	window.model_data = sessionStorage.getItem('model');
	sessionStorage.setItem("company","Apple");
	window.company_data = sessionStorage.getItem('company');
	
	window.model = "<?php echo $_SESSION['model']; ?>";
	window.company = "<?php echo $_SESSION['company']; ?>";*/
	
	$('#item1').hover(function() { $('#item1').css({ 'background-color' : '#fff' }); }
	,function(){ $('#item1').css({ 'background-color' : '#ECECEC' }); });			
		
	$('#item2').hover(function() { $('#item2').css({ 'background-color' : '#fff' }); }
	,function(){ $('#item2').css({ 'background-color' : '#ECECEC' }); });		
			
	$('#item00').hover(function() { $('#item00').css({ 'background-color' : '#fff' }); }
	,function(){ $('#item00').css({ 'background-color' : '#ECECEC' }); });
	
	$('#item0').hover(function() { $('#item0').css({ 'background-color' : '#fff' }); }
	,function(){ $('#item0').css({ 'background-color' : '#ECECEC' }); });

	
	$("#item2").click(function()
	{
	
		$(this).removeClass();
		$(this).addClass("active2");
		$(this).css({ 'background-color' : '#1573BB' });
		$(this).hover(function() { $(this).css({ 'background-color' : '#1573BB' }); });
		
		$("#item1,#item0,#item00").removeClass();
		$("#item1,#item0,#item00").css({ 'background-color' : '#ECECEC' });
		$("#item1,#item0,#item00").addClass("deactive2");
		$('#item1').hover(function() { $('#item1').css({ 'background-color' : '#fff' }); }
		,function(){ $('#item1').css({ 'background-color' : '#ECECEC' }); });
		$('#item00').hover(function() { $('#item00').css({ 'background-color' : '#fff' }); }
		,function(){ $('#item00').css({ 'background-color' : '#ECECEC' }); });
		$('#item0').hover(function() { $('#item0').css({ 'background-color' : '#fff' }); }
		,function(){ $('#item0').css({ 'background-color' : '#ECECEC' }); });
		
		model = 'smartphone';		
		ajax_display(model);
					
	});
	
	$("#item1").click(function()
	{
	
		$(this).removeClass();
		$(this).addClass("active2");
		$(this).css({ 'background-color' : '#1573BB' });
		$(this).hover(function() { $(this).css({ 'background-color' : '#1573BB' }); });
		
		$("#item2,#item0,#item00").removeClass();
		$("#item2,#item0,#item00").css({ 'background-color' : '#ECECEC' });
		$("#item2,#item0,#item00").addClass("deactive2");
		$('#item2').hover(function() { $('#item2').css({ 'background-color' : '#fff' }); }
		,function(){ $('#item2').css({ 'background-color' : '#ECECEC' }); });
		$('#item00').hover(function() { $('#item00').css({ 'background-color' : '#fff' }); }
		,function(){ $('#item00').css({ 'background-color' : '#ECECEC' }); });
		$('#item0').hover(function() { $('#item0').css({ 'background-color' : '#fff' }); }
		,function(){ $('#item0').css({ 'background-color' : '#ECECEC' }); });
		
		model = 'desktop';
		ajax_display(model);
		
	});
	
	$("#item0").click(function()
	{
	
		$(this).removeClass();
		$(this).addClass("active2");
		$(this).css({ 'background-color' : '#1573BB' });
		$(this).hover(function() { $(this).css({ 'background-color' : '#1573BB' }); });
		
		$("#item1,#item2,#item00").removeClass();
		$("#item1,#item2,#item00").css({ 'background-color' : '#ECECEC' });
		$("#item1,#item2,#item00").addClass("deactive2");
		$('#item1').hover(function() { $('#item1').css({ 'background-color' : '#fff' }); }
		,function(){ $('#item1').css({ 'background-color' : '#ECECEC' }); });
		$('#item00').hover(function() { $('#item00').css({ 'background-color' : '#fff' }); }
		,function(){ $('#item00').css({ 'background-color' : '#ECECEC' }); });
		$('#item2').hover(function() { $('#item2').css({ 'background-color' : '#fff' }); }
		,function(){ $('#item2').css({ 'background-color' : '#ECECEC' }); });
		
		model = 'printer';
		ajax_display(model);
		
	});
	
	$("#item00").click(function()
	{
	
		$(this).removeClass();
		$(this).addClass("active2");
		$(this).css({ 'background-color' : '#1573BB' });
		$(this).hover(function() { $(this).css({ 'background-color' : '#1573BB' }); });
		
		$("#item1,#item2,#item0").removeClass();
		$("#item1,#item2,#item0").css({ 'background-color' : '#ECECEC' });
		$("#item1,#item2,#item0").addClass("deactive2");
		$('#item1').hover(function() { $('#item1').css({ 'background-color' : '#fff' }); }
		,function(){ $('#item1').css({ 'background-color' : '#ECECEC' }); });
		$('#item2').hover(function() { $('#item2').css({ 'background-color' : '#fff' }); }
		,function(){ $('#item2').css({ 'background-color' : '#ECECEC' }); });
		$('#item0').hover(function() { $('#item0').css({ 'background-color' : '#fff' }); }
		,function(){ $('#item0').css({ 'background-color' : '#ECECEC' }); });
		
		model = 'laptop';
		ajax_display(model);
		
	});
	
		
});	
							
	/*	
	$("#item2").click(function()
	{
		$.ajax({
		type:"POST",
		url:"<?php echo base_url()?>other/display_items",
		data:"type="+smartphone,
		beforeSend:function()
		{
		$("#items_display").show().html("<img src='<?php echo base_url()?>assets/images/loading.gif'>");
		},
		success:function(smartphone_data)
		{
		$("#items_display").show().html("<font style='font-weight:bold; text-align:center; font-size:18px;'><u>Choose your Product</u>		</font> <div style='width:96%; margin:5% auto; padding:0;'><?php  ?> <div style='float:left; position:relative; width:23%; margin:2%; padding:0; border:1px solid #cacaca; font-weight:bold; font-size:16px;'> <img src='#' width='100%' height='100%'> <br><br> </div> <?php  ?> </div>");
		
		}
			});
		
	});*/
		
	

	/*function getCookie(cname)
	{
	var name = cname + "=";
	var ca = document.cookie.split(';');
	for(var i=0; i<ca.length; i++) 
  	{
  	var c = ca[i].trim();
  	if (c.indexOf(name)==0) return c.substring(name.length,c.length);
	}
	return "";
	}*/	
				
	function ajax_display(model)
	{
	/*var now = new Date();
	var time = now.getTime();
	var expireTime = time + 1000*24*60*60*30;
	now.setTime(expireTime);
	//$.cookie('model', model , { expires: expireTime, path: '/other' });
	//$.cookie('model');
	document.cookie = 'model='+model+';expires='+now.toGMTString()+';path=/other/ewaste';
	sessionStorage.setItem("model",model);
	model_data = sessionStorage.getItem('model');*/
	$.ajax({
		type:"POST",
		url:"<?php echo base_url()?>other/display_items",
		dataType:"json",
		data:"model="+model,
		beforeSend:function()
		{
		$("#items_display").show();
		$("#query_data").show().html("<center> <img src='<?php echo base_url()?>assets/images/loading.gif' style='vertical-align:middle;'> </center>");
		},
		success:function(model_data)
		{
		if(model_data.length==0)
		{
		$("#items_display").show();
		$('#query_data').show().html("<center> <font style='font-size:15px; font-family:arial; font-weight:650; color:#200; text-align:justify;'> Sorry! No Data To Display in this Category. Try Another Category. </font> </center>");
		}
		else
		{
		$("#items_display").show();
		$("#query_data").show().html("<center> <font style='font-weight:bold; text-align:center; font-size:20px;'> <u><strong>Choose your Product</strong></u> </font> <div style='width:96%; margin: 0.5% auto; padding:0;'> <div align='center' style='display:block; position:relative; width:100%; margin: 1% 0 3% 0; padding:0;'>");
		for(var k=0;k<model_data.length;k++)
		{
		$("#query_data").append('<div id="disp1" align="center" style="float:left; position:relative; width:17.7%; padding:3px 0; margin:1%; font-weight:bold; font-size:21px; text-align:center; border:1px solid grey; cursor:pointer;" onclick="show_data(\''+model_data[k]['company']+'\')"> <font style="font-weight:bold; text-align:center; font-size:16px; color:brown;">'+model_data[k]['company']+' </font> </div>');		
		}
		$("#query_data").append("</div> </div> </center>");
		}
		}
		 });
	//$("#items_display").show("fast", function() { $("#query_data").show();
	//$("#query_data").show(); 
	}			
				
	function show_data(comp)
	{
	/*var now1 = new Date();
	var time1 = now1.getTime();
	var expireTime1 = time1 + 1000*24*60*60*30;
	now1.setTime(expireTime1);
	//$.cookie('company', comp , { expires: expireTime1, path: '/other' });
	//$.cookie('company');
	document.cookie = 'company='+comp+';expires='+now1.toGMTString()+';path=/other/ewaste';
	sessionStorage.setItem("company",comp);
	company_data = sessionStorage.getItem('company'); */
	$.ajax({
		type:"POST",
		url:"<?php echo base_url()?>other/display_items_data",
		dataType:"json",
		data:"company="+comp,
		beforeSend:function()
		{
		$("#data_display").show().html("<center> <img src='<?php echo base_url()?>assets/images/loading.gif' style='vertical-align:middle;'> </center>");
		},
		success:function(company_data)
		{
		if(company_data.length==0)
		{
		$('#data_display').show().html("<center> <font style='font-size:15px; font-family:arial; font-weight:650; color:#200; text-align:justify;'> Sorry! No Data To Display in this Category. Try Another Category. </font> </center>");
		}
		else
		{
		$("#data_display").show().html("<center> <font style='font-weight:bold; text-align:center; font-size:20px;'> <u><strong>Choose your Product</strong></u> </font> <div style='width:96%; margin: 0.5% auto; padding:0;'> <div align='center' style='display:block; position:relative; width:100%; margin: 1% 0 3% 0; padding:0;'>");
		for(var c=0;c<company_data.length;c++)
		{
		var image = company_data[c]['item_image'];
		$("#data_display").append('<div id="disp2" align="center" style="float:left; position:relative; width:22.7%; padding:auto; margin:1%; border:1px solid grey; font-weight:bold; font-size:16px; text-align:center; cursor:pointer;" onclick="item_model(\''+company_data[c]['name']+'\',\''+company_data[c]['item_image']+'\',\''+company_data[c]['base_value']+'\',\''+company_data[c]['company']+'\')"> <img src="<?php echo base_url()?>assets/images/ewaste_items/'+image+'" width="120px" height="200px" style="vertical-align:middle; padding:5% 0;"> <br><br> <font style="font-weight:bold; text-align:center; font-size:16px; color:brown;">'+company_data[c]['name']+' </font> </div>');		
		}
		$("#data_display").append("</div> </div> </center>");
		}
		}
		 });
	}							
			
	function item_model(name,image,value,company)
	{
	window.location.replace("<?php echo base_url()?>other/ewaste_sell/"+name+"/"+image+"/"+value+"/"+company);	  
	}				
			
	/*function delete_cookie(cookie_name)
	{
  	var cookie_date = new Date();  // current date & time
  	cookie_date.setTime = (cookie_date.getTime() - 1);
  	document.cookie = cookie_name+"=; expires="+cookie_date.toGMTString()+';path=/other/ewaste';
	//$.removeCookie(cookie_name, { path: '/other' });
	}*/	
					
				
</script>


<div id="main_container" style="padding:2% 0; border-width:0 0 3px 0; -moz-border-image:url(../../assets/images/menu_back1.png) 
25% 30% 10% 20% repeat; -webkit-border-image:url(../../assets/images/menu_back1.png) 25% 30% 10% 20% repeat; 
border-image:url(../../assets/images/menu_back1.png) 25% 30% 10% 20% repeat; font-family:'Open Sans',Arial,sans-serif;">

<div id="heading">

<center>

<font style="text-align:center; font-weight:bold; font-size:23px; color:#555;">
Choose Your <font style="color:#7DC142;">Product to Evaluate</font>
</font>

</center>

</div> 

<div id="item">

<h3 id="item1" style="border-radius:2px 0 0 0;" class="deactive2"><!-- <img src="<?php //echo base_url() ?>assets/images/desktop.png" 
width="100%" height="200" style="vertical-align:middle; "><br><br> -->Desktop</h3>  
<h3 id="item2" style="border-left-style:none; border-radius:0 2px 0 0;" class="deactive2"><!-- <img src="<?php //echo base_url() ?>
assets/images/smartphone.png" width="100%" height="200" style="vertical-align:middle; "><br><br> -->SmartPhone</h3>	
<h3 id="item0" style="border-left-style:none; border-radius:0 2px 0 0;" class="deactive2"><!-- <img src="<?php //echo base_url() ?>
assets/images/printer.png" width="100%" height="200" style="vertical-align:middle; "><br><br> -->Printer</h3>	
<h3 id="item00" style="border-left-style:none; border-radius:0 2px 0 0;" class="deactive2"><!-- <img src="<?php //echo base_url() ?>
assets/images/laptop.png" width="100%" height="200" style="vertical-align:middle; "><br><br> -->Laptop</h3>	

</div>

<div id="items_display">

<div id="query_data">

<?php 
//$model = stripcslashes($_COOKIE['model']);
/*$model = "<script> $.cookie('model'); </script>";*/
/*$model = $_SESSION['model'];
echo "<center>";
echo "<font style='font-weight:bold; text-align:center; font-size:20px;'>";
echo "<u><strong>Choose your Product</strong></u>";
echo "</font>";
echo "<div style='width:96%; margin: 0.5% auto; padding:0;'>";
$this->load->database();
echo "<div align='center' style='display:block; position:relative; width:100%; margin: 1% 0 3% 0; padding:0;'>";
$query1 = $this->db->query("SELECT DISTINCT company_image, company FROM ewaste_items WHERE type='$model'");
//$array = new array();
for($j=0; $j<$query1->num_rows(); $j++)
{
//$comp_image = $query1->row($j)->company_image;
//$array[$j] = $query1->row($j)->company;
//$array = $query1->row($j)->company;
echo '<div id="disp1" align="center" style="float:left; position:relative; width:17.7%; padding:3px 0; margin:1%; font-weight:bold; 
font-size:21px; text-align:center; border:1px solid grey; cursor:pointer;" onclick="show_data(\''. addslashes(htmlspecialchars($query1->row($j)->company)) .'\')">';
//echo "<img src='".base_url()."assets/images/ewaste_items/".$comp_image."' width='190px' height='150px' style='vertical-align:middle; 
//padding:5% 0;'>";
//echo "<br><br>";
echo "<font style='font-weight:bold; text-align:center; font-size:16px; color:brown;'>";
echo $query1->row($j)->company; 
echo "</font>";
echo "</div>";
}
echo "</div>";
echo "<br><br>";
echo "</div>";
echo "</center>";	
//delete_cookie('model');*/
?>

</div>

<div id="data_display">

<?php
//$company = stripcslashes($_COOKIE['company']);
/*$company = "<script> $.cookie('company'); </script>";*/
/*$company =  $_SESSION['company'];
echo "<center>";
echo "<font style='font-weight:bold; text-align:center; font-size:20px;'>";
echo "<u><strong>Choose your Product</strong></u>";
echo "</font>";
echo "<div style='width:96%; margin: 0.5% auto; padding:0;'>";
$this->load->database();
echo "<div align='center' style='display:block; position:relative; width:100%; margin: 1% 0 3% 0; padding:0;'>";
/*$this->db->select('name, base_value, item_image');
$this->db->where('company', '$company');
$query = $this->db->get('ewaste_items');
$query = $this->db->query("SELECT name, base_value, item_image, company FROM ewaste_items WHERE company='$company'");
for($i=0; $i<$query->num_rows(); $i++)
{
$image = $query->row($i)->item_image;
echo '<div id="disp2" align="center" style="float:left; position:relative; width:22.7%; padding:auto; margin:1%; border:1px solid grey; 
font-weight:bold; font-size:16px; text-align:center; cursor:pointer;" onclick="item_model(\''. addslashes(htmlspecialchars($query->row(
$i)->name)) .'\' , \''. addslashes(htmlspecialchars($query->row($i)->item_image)) .'\' , \''. addslashes(htmlspecialchars($query->row($i)
->base_value)) .'\' , \''. addslashes(htmlspecialchars($query->row($i)->company)) .'\')">'; 
echo "<img src='".base_url()."assets/images/ewaste_items/".$image."' width='120px' height='200px' style='vertical-align:middle; 
padding:5% 0;'>";
echo "<br><br>";
echo "<font style='font-weight:bold; text-align:center; font-size:16px; color:brown;'>";
echo $query->row($i)->name; 
echo "</font>";
echo "</div>";
}	
echo "</div>";
echo "<br><br>";
echo "</div>";
echo "</center>";
//delete_cookie('company');*/
?>

</div>

</div>

</div>