<?php 
ob_start();
include('header.php');
include('connection.php');
include('functions.php');

$p_id		= intval($_GET['pid']);
$cid		= intval($_GET['cid']);
$product 	= trim($_GET['product']);

if(!check_valid_product($product))
{
	echo '<div style="margin:auto; width:500px;"><img src="images/error.png"></div>';
	include('footer.php');
	exit();
}	
?>

<style type="text/css">

p#sz{border:solid 1px #eee; height:30px; padding: 10px ; width:400px; text-align:center;}

div#pd_desc{width:450px}

#foot_size{background:#eee; border:solid 1px #aaa; border-radius:2px; padding:2px;}

#cart:hover, #cart:focus { text-decoration:underline; }

.opt{
	padding:8px 5px; background:#eee; box-shadow:0px 0px 10px #aaa inset ; 
	magin:2px; border-radius:5px; width:20px; height:15px; 
	display:inline-block; text-align:center; font-weight:bold; 
	color:#353535; cursor:pointer; vertical-align:middle;
	}
	
.opt:hover{background:#000;color:#fff;}

	
.clicked{background:#000; color:#fff; }

#ak{text-align:center; width:420px; border:solid 0px; font-family:arial;font-size:12px;}

#prc_cont{text-align:center; width:400px; border:solid 0px; color:#ff0084;}

#nm{font-family:arial; width:400px; size:15px; font-weight:bold; margin:5px 0;}

#wth{font-family:arial; font-size:14px;}

</style>

<script type="text/javascript">

$(document).ready(function()
{
		
	$("#image3").click(function()
	{
		var sr = $(this).attr('src');
		$("#imgd").show().html('<img src="'+sr+'">');

	});
	
	$(".curr_pic").click(function()
	{
		var sr = $(this).attr('src');
		$("#imgd").show().html('<img src="'+sr+'">');

	});
	
	$("#imgd").click(function()
	{
		$("#imgd").hide();
	});
	
	var foot_sz = 1;
	
	foot_sz = $("span.opt").first().attr('id');
	
	$("span.opt").first().css('display', 'none');
	
	$("#sz span").click(function()
	{
		foot_sz = $(this).attr('id');
		
		$(this).siblings().removeClass('clicked');
		$(this).addClass('clicked');
		
		//alert(foot_sz);
		
		if(foot_sz>0)
		{
			$("#sz").css("border-color","#eee");
			$("#sz").css("background","#fff");
			$("#rq").html("");
		}
			
	});	
	
});

	
	function addcart(id)
	{
		//alert(foot_sz);
		
		/*var pdid = $("#pdid").val();
		
		if(foot_sz<4)
		{
			$("#sz").css("border-color","red");
				
			return false;
		}
		else
		{*/			
			$.ajax({
			type:'post',
			datatype: "html",
			url:'show_cart.php',
			data: { action : 'add', pid : id },
			beforeSend: function()
			{
				$("#backdiv").show();
				$("#cartdiv").show().html("<img src='images/loading.gif' style='margin:15px auto;'>");				
			},
			success: function(data)
			{
				window.location.reload(true); 
				$("#backdiv").show(); 
				$("#cartdiv").show().html(data).fadeOut(5000);
				//var timer = 0;
				//timer = setTimeout(function() { $("#backdiv").show(); $("#cartdiv").show().html(data); } , 120000);				
			}
			});
		 <!-- } -->		 
		
	}

</script>

<div class="tabdiv">

	<table border="0"  width="100%">
		<tr valign="top">
			<?php
			$qry	= "select * from tbl_product where pd_id='$p_id'";
			
			$result	= mysql_query($qry) or die(mysql_error());
			
			if(mysql_num_rows($result))
			{
				$row = mysql_fetch_array($result);
				?>
				
				<td >
				
					<div class='pic-cont'>
					
						<div class="inner1" >
						
							<div class="backgr"></div>
							
							<div class="img-ct">
							
								<div class="cls">
								
									<span class="nm">
									
										<?php echo ucwords($row['pd_name'])?>
										
									</span>
									
									<img src="images/cls.png" title="close">
									
								</div>
								
							</div>
							
							<div class="pic_cont">
								<?php
									$pic = $row['pd_image'];
									$pic = explode(', ',$pic);
									
									echo '	<div class="m_pic">
												<img src="images/products/'.$pic[0].'" id="image3">
											</div>';
									echo '<div class="s_pic" >';
									foreach($pic as $p)
									{
										if(isset($p))
										echo '<img src="images/products/'.$p.'" class="curr_pic">';
									}
									echo '</div>';
								?>
							</div>
							
						</div>
				
					</div>
		
				</td>
	
				<td>
					<div class="inner2" >
					
						<table border='0' cellspacing='0' cellpadding='0' width="520px" >
							<tr>
								<td align="center" >
									<div id="nm"> <?php echo strtoupper($row['pd_name'])?> </div>
								</td>
							</tr>
							
							<tr>
								<td align="center">
									<?php
									if(isset($row['discount']))
									{
										echo '<b class="old_price">Original Price Rs. '.$row['pd_price'].'</b><br>';
									
										echo '<a id="wth"> <b> With '.$row['rewards'].'&nbsp;Rewards points </b> </a>';
									}
									?>	
									<p id="prc_cont">
									
										<a id="prc"> Price: Rs.
										<?php 
										
										echo $row['pd_price']-$row['rewards'];
										
										?>
										</a>
										
										<br><br><br>
										
										<!-- <input type="hidden" name="pdid" id="pdid" value="<?php //echo $row['pd_id']?>"> -->
								
										<!--<input type="submit" name="submit" id="add_cart" onClick="enquiry.php?id=
										<?php //echo $row['pd_id']?>" value="Add Enquiry">-->
										<!-- <a href="enquiry.php?pid=<?php //echo $row['pd_id']?>">Add to Cart</a> -->
										<span id="cart" style="padding:2% 3%; border-radius:10px; background-color:#641200; color:#fff; 
										font-weight:bolder; font-size:14px; cursor:pointer;" 
										onClick="addcart(<?php echo $row['pd_id']?>)"> ADD TO CART </span><br>
										
										<span id="backdiv"> <span id="cartdiv"></span> </span>
									</p>
									
									<br>
									
									<?php
										if(strtolower($_GET['product'])=='footwear')
										{
									?>
									
									<div id="ak">SELECT SIZE</div>
									<p id="sz">
										<span id="0" class="opt" >0</span>
										<span id="4" class="opt" >4</span>
										<span id="5" class="opt">5</span>
										<span id="6" class="opt">6</span>
										<span id="7" class="opt">7</span>
										<span id="8" class="opt">8</span>
										<span id="9" class="opt">9</span>
										<span id="10" class="opt">10</span>
										<span id="11" class="opt">11</span>
										
										
										<b id="rq"></b>
									</p>
									
									<?php
									}
									
									?>
									
								</td>
							</tr>
							
							<tr>
								<td > 
									<b>Quick Review</b>
									<div id="pd_desc">
									
										<?php echo $row['pd_description']?>
									</div>
								</td>							
							</tr>
							
						</table>
						
					</div>
				</td>
				
				<td valign="top">
				
					<div id="hd">Similar Product</div>
					
					<div id="sidediv">
					
						<?php
						$qry 	= " select * from tbl_product, tbl_category
									where tbl_product.cat_id=tbl_category.cat_id
									and tbl_product.cat_id in(	select tbl_product.cat_id from tbl_product 
																where tbl_product.pd_id=$p_id ) 
									and tbl_product.pd_id!=$p_id 
									group by tbl_product.pd_id
									order by rand() 
									limit 0, 4 ";
								
						$result	= mysql_query($qry) or die(mysql_error());
						
						if(mysql_num_rows($result))
						{
							while($row = mysql_fetch_array($result))
							{
							
									$pic = $row['pd_image'];
									$pic = explode(', ',$pic);
									
								
								echo "<div id='side_prd'>
								
										<a href='product.php?pid=$row[pd_id]&cid=$row[cat_id]&product=$row[cat_name]'>
										
											<div>
											
												<img src=\"images/products/".$pic[0]."\" height='50px' width='50px'>
												
											</div>
											
											<div id='desc' style='margin-left:3%;'>
												$row[pd_name] 
												<br> 
												<span style='font-size:12px;color:#aaa'>Price Rs. $row[pd_price] </span>
											</div>
										</a>
										
									</div>
									
									<hr id='ruler'>";
							}
						}
						else
							echo 'No similar product availabe';
						?>
						
					</div>
					
				</td>
			<?php
			} 
			?>
				
		</tr>
	</table>
</div>

<div id="backdiv"></div>
<div id="cartdiv"></div>
<div id="imgd"></div>

<?php 
ob_flush();
include('footer.php');
?>