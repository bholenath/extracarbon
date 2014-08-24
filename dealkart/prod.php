<?php
include('header.php');
include('connection.php');


if(isset($_GET['cat_id']))
	$query	= "	select * from tbl_product, tbl_category 
				where tbl_category.cat_id=tbl_product.cat_id 
				and tbl_product.cat_id ='$_GET[cat_id]' ";

if(isset($_GET['sub_cat_id']))
	$query	= "	select * from tbl_product, tbl_category 
				where tbl_category.cat_id=tbl_product.cat_id 
				and tbl_product.sub_cat_id ='$_GET[sub_cat_id]' ";

if(isset($_GET['id']))
	$query	= "select * from tbl_product, tbl_category 
				where tbl_category.cat_id=tbl_product.cat_id 
				and tbl_product.sub_sub_cat_id ='$_GET[id]' ";

$result	= mysql_query($query) or die(mysql_error());


?>
<table width="100%" border="0">
	<tr valign="top" >
				
		<td align="left">
			<div class="pic-container">
			<?php
			if(mysql_num_rows($result))
			{
				while($row = mysql_fetch_array($result))
				{  
				?>
				<div class="pic" >
						
					<div id="product_div">
					
						<?php if(isset($row['discount']))
						{
						
							echo '<div class="discount">Rs.&nbsp;'.$row['discount'].'<br> OFF</div>';
						
						}
						?>
						<a href="product.php?pid=<?php echo $row['pd_id'];?>&cid=<?php echo $row['cat_id']?>&product=<?php echo 
						$row['cat_name']?>">
						
							<?php
									$pic = $row['pd_image'];
									$pic = explode(', ',$pic);
									
									echo ' <img src="images/products/'.$pic[0].'" height="170" width="150">';
											
									
							?>
						</a>
						
					</div>
			
					<?php $b = $row['cat_id']?>
				
				
					<div class="rate" >
					
						<a href="product.php?pid=<?php echo $row['pd_id'];?>&cid=<?php echo $row['cat_id']?>">
						
							<b><?php echo $row['pd_name']?></b> 
						
							
						</a>
						<br>
						
						<a href="product.php?pid=<?php echo $row['pd_id'];?>&cid=<?php echo $row['cat_id']?>" id="prc_hd">
						
						<?php
							if(isset($row['discount']))
								echo '<b class="old_price">Rs. '. $row['pd_price'].'</b>';
						?>	
							<br>
							
							<b class="new_price">Rs. <?php echo ($row['pd_price']-$row['discount'])?></b>
						</a> 
						
					</div>
					
				</div>	
				<?php
				}
			}
			else
			{
				echo "<div style='color:red; padding:20px;'>No Product Found in this category.</div>";
			}
?>	
			</div>
		</td>
	</tr>
</table>

<?php
include('footer.php');
?>