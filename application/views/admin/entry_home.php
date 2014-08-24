<style type="text/css">

.home_row	{	padding: 10px; border-bottom:solid 1px #aaa; 
				background:#eee; margin:10px; width:400px; font-size:15px;
			}
.home_row a	{color:#000;}
.home_row span {color:#00a1e3; font-weight:bold;}

.table-cont		{	border:solid 1px #606060; border-radius: 5px;margin: 10px;		}
.table-cont h3 	{ 	background: #ccc; padding: 5px; border-radius: 5px 5px 0 0; color:#000;
					box-shadow: 5px 10px 10px #aaa inset;
				}

</style>

<style type="text/css">

#entry_add_form
{
	margin:0 2%; border:solid 2px #b3b3b3; border-radius:7px; padding:1%; width:94%; z-index:1000; background:#fff; float:left;
}

.form_data { width:80%; position:relative; float:left; display:block; margin:1% 10%; font-size:16px; }

.name { width:50%; margin-right:1%; float:left; font-weight:bold; text-align:left; }

.input { width:48%; margin-left:1%; float:right; text-align:left; }

#entry_add_submit 
{ 
	background:url(<?php echo base_url()?>assets/images/button.png) repeat;
	border: 1px solid #00A1E3;
	-webkit-border-radius: 3px;
	-moz-border-radius: 3px;
	border-radius: 3px; 
	line-height: 20px;
	font-size: 16px;
	padding: 6px 12px;
	color: #fff;
	font-weight:bold;
	cursor: pointer;
	width:165px;  	
}

</style>

<script>

$(document).ready(function()
{
$('#rate').attr('readonly', true);
});

function validate_entry_add()
{
var society_val =  $.trim($('#society :selected').text());
if(society_val=="")
{
alert("Please Select a Society");
$("#society").focus();
return false;
}
var item_name =  $.trim($('#item_name :selected').text());
if(item_name=="")
{
alert("Please Select an Item");
$("#item_name").focus();
return false;
}

var fer_rate = $.trim($("#fer_rate").val());
var quantity = $.trim($("#quantity").val());

if($.trim($("#fer_rate").val())=="" || $.trim($("#name").val())=="" || $.trim($("#quantity").val())=="")
{
alert("Please fill all the required Fields");
$("#quantity").focus();
return false;
}
else if(!fer_rate.toString().match(/^[.]?\d*\.?\d*$/))
{
alert("Please use only Numerals in Feriwala Rate");
$("#fer_rate").focus();
return false;
}
else if(!quantity.toString().match(/^[.]?\d*\.?\d*$/))
{
alert("Please use only Numerals for Quantity");
$("#quantity").focus();
return false;
}
return true;
}

function item_change(item_name)
{
var society_name =  $.trim($('#society :selected').val());
$.ajax({
	type:"POST",
	url:"<?php echo base_url()?>admin/entry_home/item_change",
	dataType:"json",
	data:{item_name : item_name , society_name : society_name},
	success:function(data_array)
	{	
	$('#rate').val(data_array[0]);
	$('#name').val(data_array[1]);
	$('#rate').attr('readonly', true);
	/*$('#rate').attr('disabled', true);*/
	}
	  });
}

</script>

<div id="content-outer">
<!-- start content -->
<div id="content">

	<!--  start page-heading -->
	<div id="page-heading">
		<h1>User Entry Form</h1>
	</div>
	<!-- end page-heading -->

	<!-- <table border="0" width="100%" cellpadding="0" cellspacing="0" id="content-table">
	
	<tr>
		<th rowspan="3" class="sized"><img src="<?php //echo base_url()?>assets/admin/images/shared/side_shadowleft.jpg" width="20" 
		height="300" alt="" /></th>
		<th class="topleft"></th>
		<td id="tbl-border-top">&nbsp;</td>
		<th class="topright"></th>
		<th rowspan="3" class="sized"><img src="<?php //echo base_url()?>assets/admin/images/shared/side_shadowright.jpg" width="20" 
		height="300" alt="" /></th>
	</tr>
	
	<tr>
	
	<td> -->
	
	<form action="<?php echo base_url()?>admin/entry_home/data_submit" method="post" name="entry_add_form" id="entry_add_form" 
	onsubmit="return validate_entry_add()" enctype="multipart/form-data" target="_self">	
		
	<span class="form_data">
	
	<span class="name"> Society <font color="red">*</font> </span>
	
	<span class="input"> 
	
	<select name="society" id="society" required placeholder="Select Society" style="width:98%; border:1px solid #cacaca; padding:1%;">
		  				
	<option value="" disabled="disabled">Select Society</option>	
		  
	<?php $this->load->database(); 
	$circle_query = $this->db->query("select society_name from societies");
	foreach ($circle_query->result() as $row)
	{    
	?>
	<option value="<?php echo $row->society_name; ?>" style="color:#200;"><?php echo $row->society_name; ?>
	</option>
	<?php
	}
	?>
	 
	</select>
	
	</span>
	
	</span>
	
	<span class="form_data">
	
	<span class="name"> Item Name <font color="red">*</font> </span>
	
	<span class="input"> 
	
	<select name="item_name" id="item_name" required placeholder="Select Item Name" style="width:98%; border:1px solid #cacaca; 
	padding:1%;" onChange="item_change(this.options[this.selectedIndex].value)">
		  				
	<option value="" disabled="disabled">Select Item Name</option>	
		  
	<?php $this->load->database(); 
	$property_type_query = $this->db->query("select item_name from waste_items");
	foreach ($property_type_query->result() as $row1)
	{ 
	?>
	<option value="<?php echo $row1->item_name; ?>" style="color:#200;"><?php echo $row1->item_name; ?></option>
	<?php
	}
	?>
	 
	</select>
	
	</span>
	
	</span>
	
	<span class="form_data">
	
	<span class="name"> Item Rate(in this society) </span>
	
	<span class="input"> <input type="text" name="rate" id="rate" style="width:98%; border:1px solid #cacaca; padding:1%;" 
	placeholder="Item Rate"> 
	</span>
	
	</span>	
	
	<span class="form_data">
	
	<span class="name"> Quantity <font color="red">*</font> </span>
	
	<span class="input"> <input type="text" name="quantity" id="quantity" style="width:98%; border:1px solid #cacaca; padding:1%;" 
	placeholder="Enter Waste Quantity" required> 
	</span>
	
	</span>	
	
	<span class="form_data">
	
	<span class="name"> Feriwala Name <font color="red">*</font> </span>
	
	<span class="input"> <input type="text" name="name" id="name" style="width:98%; border:1px solid #cacaca; padding:1%;" 
	placeholder="Enter Feriwala Name" required> 
	</span>
	
	</span>	
	
	<span class="form_data">
	
	<span class="name"> Feriwala Rate <font color="red">*</font> </span>
	
	<span class="input"> <input type="text" name="fer_rate" id="fer_rate" style="width:98%; border:1px solid #cacaca; padding:1%;" 
	placeholder="Enter Feriwala Rate" required> 
	</span>
	
	</span>	
	
	<span class="form_data">
	
	<span class="name"> <input type="submit" name="entry_add_submit" id="entry_add_submit" value=" SUBMIT "> </span>
	
	<span class="input"></span>
	
	</span>
	
	<span class="form_data" style="color:#c41200; font-size:12px; font-weight:bold; text-align:left;">
	
	* fields are compulsory.
	
	</span>
	
	</form>
	
	<!-- </td>
	
	</tr>
		
	</table>	
	 -->
</div>

</div>	