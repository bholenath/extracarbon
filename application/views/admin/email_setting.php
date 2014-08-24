<style type="text/css">

.form_div{float:left; margin:10px; padding: 10px; border:solid 1px #aaa;}

</style>
<div id="content-outer">
<!-- start content -->
<div id="content">

	<!--  start page-heading -->
	<div id="page-heading">
	</div>
	<!-- end page-heading -->

	<table border="0" width="100%" cellpadding="0" cellspacing="0" id="content-table">
	<tr>
		<th rowspan="3" class="sized"><img src="<?php echo base_url()?>assets/admin/images/shared/side_shadowleft.jpg" width="20" height="300" alt="" /></th>
		<th class="topleft"></th>
		<td id="tbl-border-top">&nbsp;</td>
		<th class="topright"></th>
		<th rowspan="3" class="sized"><img src="<?php echo base_url()?>assets/admin/images/shared/side_shadowright.jpg" width="20" height="300" alt="" /></th>
	</tr>
	<tr>
		<td id="tbl-border-left"></td>
		<td>
		<!--  start content-table-inner ...................................................................... START -->
		<div id="content-table-inner">
		
			<!--  start table-content  -->
			<div id="table-content">
			<!--
			<h2>Change Password </h2>
			<h3>All Fields are Mendatory</h3>
			-->
			<br/><br/>
			
			
			<br>
			
			<div class="form_div">
			
				<h1>Change Password for info@extracarbon.con </h1>
				<br> <hr> <br>
				
				<p>
				<?php echo $this->session->flashdata('success_in'); ?>
				<?php echo $this->session->flashdata('success_in_err'); ?>
				</p>
				
				<form action="<?php echo base_url()?>admin/other/email_setting_in" method="post" >
				
				<table height="200px">
					<tr>
						<td>Old Password </td> <td>: <input type="password" name="old_pass"></td>
					</tr>
					<tr>
						<td>New Password </td> <td>: <input type="password" name="new_pass"> </td>
					</tr>
					<tr>
						<td>Retype Password </td><td>: <input type="password" name="re_pass"> </td>
					</tr>
					<tr>
						<td colspan="2"><input type="submit" name="submit" value="Change"></td>
					</tr>
				</table>
				
				</form>
			
			</div>
			
			
			<div class="form_div">
			
			<h1>Change Password for admin@extracarbon.con </h1>
			<br> <hr> <br>
			
			<p>
				<?php echo $this->session->flashdata('success_out'); ?>
				<?php echo $this->session->flashdata('success_out_err'); ?>
			</p>
				
				<form action="<?php echo base_url()?>admin/other/email_setting_out" method="post" >
				
				<table height="200px">
					<tr>
						<td>Old Password </td> <td>: <input type="password" name="old_pass"></td>
					</tr>
					<tr>
						<td>New Password </td> <td>: <input type="password" name="new_pass"> </td>
					</tr>
					<tr>
						<td>Retype Password </td><td>: <input type="password" name="re_pass"> </td>
					</tr>
					<tr>
						<td colspan="2"><input type="submit" name="submit" value="Change"></td>
					</tr>
				</table>
				
				</form>
			
			</div>
			
			</div>
			<!--  end table-content  -->
	
			<div class="clear"></div>
		 
		</div>
		<!--  end content-table-inner ............................................END  -->
		</td>
		<td id="tbl-border-right"></td>
	</tr>
	<tr>
		<th class="sized bottomleft"></th>
		<td id="tbl-border-bottom">&nbsp;</td>
		<th class="sized bottomright"></th>
	</tr>
	</table>
	<div class="clear">&nbsp;</div>

</div>
<!--  end content -->
<div class="clear">&nbsp;</div>
</div>
<!--  end content-outer........................................................END -->
