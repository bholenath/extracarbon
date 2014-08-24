<?php
if(!isset($_SESSION))
{
	session_start();
}
ob_start();
include('header.php');
include("connection.php");
if(!isset($_SESSION))
{
	session_start();
}
$s_id=session_id();
$error=0;
if(isset($_POST['submit']))
{           
	$email = $_POST['email'];
	$password = $_POST['password'];
	$query0 = "insert into user_login(s_id,user_email,user_pass) values('$s_id','$email','$password')";
	$result0=mysql_query($query0) or die(mysql_error());
	if($result0 === true)
	{
	$query="SELECT * FROM tbl_user WHERE email='$email' AND password='$password'";
	$result=mysql_query($query) or die(mysql_error());
	if(mysql_num_rows($result))
	{
		while($row=mysql_fetch_array($result))
		{

			$_SESSION['id'] = $s_id;
			//$_SESSION['user_fname']=$row['user_fname'];
			$_SESSION['u_mail'] = $row['email'];
		}
		header("location:index.php");
	}
	else
		header("location:index.php?error=invalid");
	}
}
ob_flush();
?>
<!--
<div id="body"><h1 class="login_header">Login</h1>
	<form action="" method="POST" name='login_form' onsubmit="return log_valid()" >
		
		<table border='0' cellspacing='8' cellpadding='3' align="center">
			<tr>
				<td class="text">E-Mail</td><td><input type='text' name='email' class="text_field"></td>
			</tr>
			<tr>
				<td class="text">PASSWORD</td><td><input type='password' name='pwd'  class="text_field" ></td><br/>
			</tr>
			
			<tr>
			<td></td>
			<td><input type='submit' name='submit' value='Login' class="submit">&nbsp;&nbsp;<a href="">Forgot Password?</a></td>
			</tr>
			<tr><td class="text">New Here?<a href="user_info/user_reg.php">Sign Up</a></td></tr>
		</table>
	</form>
</div>
-->