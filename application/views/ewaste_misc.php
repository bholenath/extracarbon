<div style='width:96%; margin:5% auto; padding:0;'>
		
		<?php
		while($row_smartphone_data=mysql_fetch_array("+ console.log(smartphone_data); +"))
		{
		$image = $row_smartphone_data['item_image'];
		$aExtraInfo1 = getimagesize(echo base_url()."assets/images/ewaste_items/".$image);
		$sImage1 = "data:" . $aExtraInfo1["mime"] . ";base64," . base64_encode(file_get_contents(echo base_url().
		"assets/images/ewaste_items/".$image));
		?>
		
		<div style='float:left; position:relative; width:23%; margin:2%; padding:0; border:1px solid #cacaca; font-weight:bold; 
		font-size:16px;'>
		
		<img src='<?php echo $sImage1; ?>' width='100%' height='100%'> <br><br> <?php echo $row_smartphone_data['name']; ?>	
		
		</div>
		
		<?php
		}
		?>
		
		</div>
		
		
		<u><font style='font-weight:bold; text-align:center; font-size:18px;'>Choose your Product
		</font></u>
		
		
		<font style='font-weight:bold; text-align:center; font-size:18px;'><u>Choose your Product</u>		</font> <div style='width:96%; margin:5% auto; padding:0;'> <div style='float:left; position:relative; width:23%; margin:2%; padding:0; border:1px solid #cacaca; font-weight:bold; font-size:16px;'> <img src='#' width='100%' height='100%'> <br><br> </div> </div>
		
		
		
		
		
		
		
		
		
		<?php function disp1($type) { ?>

<center>
<font style='font-weight:bold; text-align:center; font-size:18px;'> <u>Choose your Product</u> </font>
</center> 
<div style='width:96%; margin:5% auto; padding:0;'> 
<?php $smartphone_data = mysql_query("select name, base_value, item_image, distinct company_image, distinct company from ewaste_items 
where type='$type' "); 
while($row_smartphone_data=mysql_fetch_array($smartphone_data))	
{ 
		$image = $row_smartphone_data['item_image'];
		$aExtraInfo1 = getimagesize(base_url()."assets/images/ewaste_items/".$image);
		$sImage1 = 'data:' . $aExtraInfo1['mime'] . ';base64,' . base64_encode(file_get_contents(echo base_url().
		'assets/images/ewaste_items/'.$image)); 
?> 
<div style='float:left; position:relative; width:23%; margin:2%; padding:0; border:1px solid #cacaca; font-weight:bold; 
font-size:16px;'> 
<img src="<?php echo $sImage1; ?>" width='100%' height='100%'> <br><br> <?php echo $row_smartphone_data['name']; ?> 
</div> 
<?php }	?> 
</div>
<?php }	?> 
		
		
		
		
		