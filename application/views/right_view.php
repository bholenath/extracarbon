<div id="user_detail">
				<div id="right_hd">Account Details </div>
			
				<table class="acc_dtl">
				
					<tr class="tbl_odd">
						<th >Name </th> <td>: <?php echo ucwords($user_data->name)?> </td>
					</tr>
					
					<tr>
						<th>Email </th> <td>: <?php echo $user_data->email?> </td>
					</tr>
					
					<tr class="blnce tbl_odd">
						<th >Total Balance </th> 
						<td >: Rs. <?php echo (($user_data->metro_point)+($user_data->waste_pick_point))?> </td>
					</tr>
					
					<tr >
						<th>Metro Card No. </th> <td>: <?php echo $user_data->metro_card_no?> </td>
					</tr>
					
					<tr class="tbl_odd">
						<th>Contact No. </th> <td>: <?php echo $user_data->contact_no?> </td>
					</tr>
					
					<tr>
						<th>Contact Address </th> <td>: <?php echo $user_data->contact_add?> </td>
					</tr>
				
				</table>
			
			</div>