<?php
//ob_start();

include('header.php');
include('connection.php');
include('cache_func.php');

@$error=$_GET['error'];
if(!empty($error) && $error=='invalid')
{
	echo '<script>alert("Login Information is not correct")</script>';
}

@$success=$_GET['success'];
if(!empty($success) && $success=='yes')
{
	echo '<script>alert("You have been added successfully. Please Login.")</script>';
}
elseif(!empty($success) && $success=='no')
{
	echo '<script>alert("Sorry! Try Again to Signup.")</script>';
}

get_cache('index.php');

ob_start();


?>

<?php include('banner.php'); ?>



<div class="ribbon">
	
	<a href="discounts.php">
		<img src="images/discount.png" align="left">

		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<b>Checkout for offers and discounts</b>

		<img src="images/offers.png" align="right">
	</a>
	
</div>



<?php	
/*
$featured	= 	mysql_query (" 	select * from tbl_product, tbl_category 
								where tbl_category.cat_id=tbl_product.cat_id 
								and tbl_product.featured='yes' 
								order by rand() asc limit 4"
						) or die(mysql_error());
*/

$featured	= 	mysql_query (" 	select * from tbl_product
								inner join tbl_category 
								on tbl_category.cat_id=tbl_product.cat_id
								and tbl_product.featured='yes'
								order by rand() asc limit 4"
							) or die(mysql_error());



$main	= 	mysql_query (" 	select * from tbl_product, tbl_category 
							where tbl_category.cat_id=tbl_product.cat_id 
							order by pd_id desc limit 4"
						) or die(mysql_error());


$latest = 	mysql_query ( "	select * from tbl_product, tbl_category 
							where tbl_category.cat_id=tbl_product.cat_id 
							order by rand() desc limit 4"
						) or die(mysql_error());
			



?>

<table border="0" width="100%">
	<tr>
		<td valign="top" width="200px">
			<div class="slider">
				<?php		
					include('slidebar.php'); 			
				?>
			</div>
		</td>


		<td valign="top">
			<div class="pic-container">
				
					
				<div id="ttl" >Products</div>
				<?php
				if(mysql_num_rows($latest))
				{
					while($row1 = mysql_fetch_array($latest))
					{
					?>	
					
					<div class="pic" >
						
						<div id="product_div">
						
							<?php if(isset($row1['discount']))
							{
							
								echo '<div class="discount">'.$row1['rewards'].' <br> Points</div>';
							
							}
							?>
							<a href="product.php?pid=<?php echo $row1['pd_id'];?>&cid=<?php echo $row1['cat_id']?>&product=
							<?php echo $row1['cat_name']?>">
							
								<?php
										$pic = $row1['pd_image'];
										$pic = explode(', ',$pic);
										
										echo ' <img src="images/products/'.$pic[0].'" height="170" width="150">';
												
										
								?>
							</a>
							
						</div>
					
						<?php $b = $row1['cat_id']?>
						
						
						<div class="rate" >
						
							<a href="product.php?pid=<?php echo $row1['pd_id'];?>&cid=<?php echo $row1['cat_id']?>&product=
							<?php echo $row1['cat_name']?>">
							
								<b ><?php echo $row1['pd_name']?></b> 
							
								
							</a>
							<br>
							
							<a href="product.php?pid=<?php echo $row1['pd_id'];?>&cid=<?php echo $row1['cat_id']?>&product=
							<?php echo $row1['cat_name']?>" id="prc_hd">
							
							<?php
								if(isset($row1['discount']))
									echo '<b class="old_price">Rs. '. $row1['pd_price'].'</b>';
							?>	
								<br>
								
								<b class="new_price">Rs. <?php echo $row1['pd_price']-$row1['rewards']?></b></br>
								
							</a> 
							<!--<a href="product.php?id=<?php //echo $row1['pd_id'];?>&cid=<?php //echo $row1['cat_id']?>&product=
							<?php //echo $row1['cat_name']?>">
							
								<b ><?php //echo $row1['pd_name']?></b> 
							
								<b class="new_price">After redemption <?php //echo $row1['pd_price']-$row1['rewards']-$row1['discount']
								?></b>
							</a>-->
							
						</div>
					
					</div>		
				<?php
					}
				}	
				?>
				
			</div>
			
			<div id="more">
				<a href="products.php">View More...</a>
			</div>


			<div class="pic-container">
				
				<div id="ttl">  Featured Deals </div>
				
				<?php
					if(mysql_num_rows($featured))
					{
						while($row2 = mysql_fetch_array($featured))
						{
						?>	
						
						<div class="pic" >
							
							<div id="product_div">
							
								<?php if(isset($row2['discount']))
								{
								
									echo '<div class="discount">'.$row2['rewards'].'<br> Rewards</div>';
								
								}
								?>
								<a href="product.php?pid=<?php echo $row2['pd_id'];?>&cid=<?php echo $row2['cat_id']?>&product=
								<?php echo $row2['cat_name']?>">
								
									<?php
											$pic = $row2['pd_image'];
											$pic = explode(', ',$pic);
											
											echo ' <img src="images/products/'.$pic[0].'" height="170" width="150">';
													
											
									?>
								</a>
								
							</div>
						
							<?php $b = $row2['cat_id']?>
							
							
							<div class="rate" >
							
								<a href="product.php?pid=<?php echo $row2['pd_id'];?>&cid=<?php echo $row2['cat_id']?>&product=
								<?php echo $row2['cat_name']?>">
								
									<b ><?php echo $row2['pd_name']?></b> 
								
									
								</a>
								<br>
								
								<a href="product.php?pid=<?php echo $row2['pd_id'];?>&cid=<?php echo $row2['cat_id']?>&product=
								<?php echo $row2['cat_name']?>" id="prc_hd">
								
								<?php
									if(isset($row2['discount']))
										echo '<b class="old_price">Rs. '. $row2['pd_price'].'</b>';
								?>	
									<br>
									
									<b class="new_price">Rs. <?php echo $row2['pd_price']-($row2['rewards'])?></b>
								</a> 
								
							</div>
						
						</div>	
					
					<?php
							}
						}	
					?>
			</div>
			
			<div class="pic-container">
				
				<div id="ttl"> New Arrivals </div>
				
				<?php
					if(mysql_num_rows($main))
					{
						while($row1 = mysql_fetch_array($main))
						{
					?>	
						
						<div class="pic" >
						
							<div id="product_div">
							
								<?php if(isset($row1['discount']))
								{
								
									echo '<div class="discount">'.$row1['rewards'].' <br> Points</div>';
								
								}
								?>
								<a href="product.php?pid=<?php echo $row1['pd_id'];?>&cid=<?php echo $row1['cat_id']?>&product=
								<?php echo $row1['cat_name']?>">
								
								<?php
										$pic = $row1['pd_image'];
										$pic = explode(', ',$pic);
										
										echo ' <img src="images/products/'.$pic[0].'" height="170" width="150">';
													
											
									?>
								</a>
								
							</div>
					
							<?php $b = $row1['cat_id']?>
						
						
							<div class="rate" >
							
								<a href="product.php?pid=<?php echo $row1['pd_id'];?>&cid=<?php echo $row1['cat_id']?>&product=
								<?php echo $row1['cat_name']?>">
								
									<b ><?php echo $row1['pd_name']?></b> 
								
									
								</a>
								<br>
								
								<a href="product.php?pid=<?php echo $row1['pd_id'];?>&cid=<?php echo $row1['cat_id']?>&product=
								<?php echo $row1['cat_name']?>" id="prc_hd">
								
								<?php
									if(isset($row1['discount']))
										echo '<b class="old_price">Rs. '. $row1['pd_price'].'</b>';
								?>	
									<br>
									
									<b class="new_price">Rs. <?php echo $row1['pd_price']-($row1['rewards'])?></b>
								</a> 
								
							</div>
					
						</div>
					
						<?php
						}
					}	
					?>
			</div>
			
		</td>

	</tr>

</table>

<?php
include('logos.php');
include('footer.php');
put_cache('index.php');
?>