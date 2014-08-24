<?php
ob_start();
//include('header.php');
include('contain.php');
include('connection.php');

if(!isset($_SESSION))
{
session_start();
}

//--------------------cart details------------------------------------------------

date_default_timezone_set("Asia/Calcutta");	
$today = date('Y-m-d');

if(isset($_SESSION['id']))
{
	$ud		= $_SESSION['id'];
	
	$qry	= " select * from tbl_cart, tbl_product where 
				tbl_cart.pd_id=tbl_product.pd_id and 
				tbl_cart.user_id='$ud' and 
				tbl_cart.date='$today'";
}
else
{
	$ud		= session_id();
	
	$qry	= " select * from tbl_cart, tbl_product where 
				tbl_cart.pd_id=tbl_product.pd_id and 
				tbl_cart.user_id='$ud' and 
				tbl_cart.date='$today'";
}

$tota = 0;

$rslt = mysql_query($qry) or die(mysql_error());

?>
	
<div class="tbl">
	<table border="0" cellspacing="0" cellpadding="5" align='center'>
	
		<tr><th colspan="7" style="font-size:16px; font-family:arial;">Cart Details</th></tr>

		<tr >
			<th >Product</th><th>Price</th><th>Quantity</th><th >Total Amount</th>
		</tr>
		
		<?php
		
		if(mysql_num_rows($rslt))
		{
			while($row=mysql_fetch_array($rslt))
			{		
			?>			
				<tr align="center">
				
					<th width="200px">
						<?php echo $row['pd_name'] ?>
					</th>
					
					<td style="">
						<?php echo $t = ($row['pd_price']-$row['discount']) ?>
					</td>
					
					<td>
						<?php echo $row['num_pd'] ?><br>
					</td>
					
					<td align="right">
						<?php echo $ttl = $t*$row['num_pd'] ?>						
					</td>
					<?php $tota +=$ttl; ?>
				</tr >
		<?php 
			}  
		}
		?>
		<tr>		
			<th  align="left" colspan=3>
			
				<?php 
					echo ($tota<200)?'Shipping Charges: Rs.30':'No shipping charges'; 
				?>
		
			</th>
				<td align="right"><?php echo ($tota<200)?$tota+30:$tota; ?></td>
			</td>
			
		</tr>
		
		<tr>
			<td colspan="4" align="center"><a href="cart_show.php"><b>Manage Cart</b></a></td>
		</tr>
		
	</table>
	
</div>


<?php
//---------------------shipping details-----------------------------------------------

if(isset($_POST['submit']))
{
	$fname		=	trim(mysql_real_escape_string(stripslashes($_POST['fname'])));
	$lname		=	trim(mysql_real_escape_string(stripslashes($_POST['lname'])));
	$email		=	trim(mysql_real_escape_string(stripslashes($_POST['email'])));
	$add		=	trim(mysql_real_escape_string(stripslashes($_POST['add'])));
	$phone		=	trim(mysql_real_escape_string(stripslashes($_POST['phone'])));
	$city		=	trim(mysql_real_escape_string(stripslashes($_POST['city'])));
	$state		=	trim(mysql_real_escape_string(stripslashes($_POST['state'])));
	$zcode		=	trim(mysql_real_escape_string(stripslashes($_POST['zcode'])));
	//$dt			=	date('y-m-d h:m:s');
	
	
	$gtqry = mysql_query("select * from tbl_shipping_detail where s_id='$ud'")or die(mysql_error());
	$rs =mysql_num_rows($gtqry);
	
	
	if(isset($_SESSION['id']) && $rs > 0)
	{
		$query1 = " update tbl_shipping_detail set fname='$fname', 
					lname='$lname', email='$email', address= '$add', 
					phone='$phone', city='$city', state='$state', 
					zcode='$zcode', date='$today' where s_id='$ud' ";
	}
	else
	{
		$query1 = " insert into tbl_shipping_detail(s_id,fname,lname,email,address,phone,city,state,zcode,date) 
					values('$ud','$fname', '$lname','$email','$add','$phone','$state','$city','$zcode','$today') ";
	}
	
	$result1=mysql_query($query1)or die(mysql_error());
	
	if($result1)
	{
		header('location: order_conf.php');
	} 
	else
	{
		echo "<script> alert('Sorry! Try Again.'); </script>";
		echo "<script> history.back(1); </script>";
	}	
}

$shipdt = mysql_query("select * from tbl_shipping_detail where s_id='$ud'") or die(mysql_error());

if(mysql_num_rows($shipdt))
{
	$sp = mysql_fetch_array($shipdt);
}	

?>


<script type="text/javascript" src="js/ship-valid.js"></script>
<link href="css/main.css" rel="stylesheet" type="text/css"/>


 <div id="bill_div">
 
	<div id="bill_hd">	Shipping Details</div>
	
	<form action="<?php $_SERVER['PHP_SELF']?>" method='POST' name="shipfrm" onSubmit="return ship()">
	
		<table border="0" cellspacing='2' cellpadding='0' align='center' class="bill_tbl">
			<tr >
				<td  >
				  <label for="FirstName" >First name:</label>
				</td>
				
			   <td>
				  <input type="text" name="fname" value="<?php echo @$sp['fname']; ?>" />
			   </td>
			   
			</tr>
			
			<tr >
				<td >
				  <label for="FirstName" >Last Name:</label>
				 </td>
				 
				<td><input type='text' name='lname' value="<?php echo @$sp['lname']; ?>"></td>
			</tr>
			
			<tr >
				<td >
					<label for="FirstName" >Email:</label>
				</td>
				
				<td>
				<?php
				if(isset($_SESSION['u_mail']))
				{
				$mail = $_SESSION['u_mail'];				
				?>
				<input type='text' name='email' value="<?php echo $mail;?>">
				<?php 
				}
				else	
				{							
				?>
				<input type='text' name='email'>
				<?php } ?>
				</td>
			</tr>
			
			<tr>
				<td >
					<label for="FirstName" >Address:</label>
				</td>
				
				<td><textarea rows="3" cols="15" name='add' ><?php echo @$sp['address']; ?></textarea></td>
			</tr>
			
			<tr  >
				<td >
					<label for="FirstName" >Phone No.:</label>
				</td>
				
				<td><input type='text' name='phone' value="<?php echo @$sp['phone']; ?>"></td>
			</tr>
			
			<tr >
				<td >
					<label for="FirstName" >City:</label>
				</td>
				
				<td><input type='text' name='city' value="<?php echo @$sp['city']; ?>"></td>
			</tr>
			
			<tr >
				<td >
					<label for="FirstName" >State:</label>
				</td>
				
				<td><input type='text' name='state' value="<?php echo @$sp['state']; ?>"></td>
				
			</tr>
			
			<tr>
				<td >
					<label for="FirstName" >Zip Code:</label>
				</td>
				
				<td><input type='text' name='zcode' value="<?php echo @$sp['zcode']; ?>"></td>
				
			</tr>
			
			<tr >
				<td colspan="2" align="center">
					<input type='submit' name='submit' value='Confirm and Proceed' class="btn" >
				</td>
				
			</tr>
			
		</table>

	</form>
</div>

<?php
	ob_flush();
?>