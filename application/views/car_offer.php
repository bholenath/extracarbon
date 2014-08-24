<link href="<?php echo base_url()?>assets/css/contact.css" type="text/css" rel="stylesheet"/>

<script type="text/javascript">

$(document).ready(function()
{
	var status 	= <?php echo ($status===false?'false':'true') ?>;

	var agree	= 0;
	
	$("#agree").change(function()
	{
		agree = $(this).attr('value', this.checked ? 1 : 0).val();

		if(agree==1)
		{
			$("#terms").css({"background":"#eee"});
		}		
	});
	
	$(".greybutton").click(function()
	{
		var id 		= $(this).attr('data');
		
		if(agree==1)
		{
			if(status==false)
			{
				$.ajax({
				type:"get",
				url:"<?php echo base_url()?>carpool/request_reg",
				beforeSend:function()
				{
					$("#back_div").show();
					$("#req_frm").show().html('loading...');
				},
				success:function(html)
				{
					$("#back_div").show();
					$("#req_frm").html(html);
					return false;
				}
				});
				return false;
			}
			else
			{
				
				$.ajax({
				type:"post",
				url:"<?php echo base_url()?>carpool/pooler_detail",
				data:"id="+id,
				beforeSend:function()
				{
					$("#back_div").show();
					$("#req_frm").show().html('loading...');
				},
				success:function(html)
				{
					$("#back_div").show();
					$("#req_frm").show().html(html);
					return false;
				},
				error:function(xhr, error)
				{
					alert(xhr.responseText);
				}
				});
				return false;
				
			}
		}
		else
		{
			alert('please agree with terms and conditions');
			
			//$("#terms").css({"color":"#fff"});
			$("#terms").css({"background":"#f8b389"});
			
			return false;
		}
		
		
	});
	
	$("#term_show").click(function()
	{
		$.ajax({
		type:"post",
		url:"<?php echo base_url()?>carpool/terms_conditions",
		beforeSend:function()
		{
			$("#back_div").show();
			$("#req_terms").show().html('loading...');
		},
		success:function(html)
		{
			$("#back_div").show();
			$("#req_terms").show().html(html);
		}
		});
		
		return false;
	});
	


});

</script>

<div id="dashboard_container">

	<div id="sidebar">
	
		<?php 
		echo $menu;
		?>
	</div>
	
	<div id="content_div">
		
		<div id="erp_div">
			
			<div id="step_hd"> 
				<b> Search Result for <u><?php echo $_GET['from']?></u> to <u><?php echo $_GET['to']?></u> Car Pool offers  </b>
				<p> List of car pool offers. </p>
			</div>
		
			
				
			<div id="qns">
			
				<div class="formtitle">
				
					<?php 
						if($total>0)
							echo $total.' Offer(s) found.';
						else
							echo 'Try to search nearby places of your Destination OR Pick Up Places';
					?>
					
				</div>
				
				<?php if($total>0): ?>
				
				<div id="terms">
			
					<input type="checkbox" id="agree" value="1"> 
					I agree with terms and conditions mention in <a href="" id="term_show"> Limitations & Liabilities </a>. 
				
				</div>
				<?php endif?>
				
				<div id="qns_cont">
				
					<div class="msg">
						
					</div>
					
					
					<div id="point">
			
						<table border="0" class="tab1">
							<tr>
								<th>Date </th>
								<th>Time </th>
								<th>From</th>
								<th>Destination</th>
								<th>View Details</th>
							</tr>
					
						<?php
											
						if(is_array($pool_offer) && !empty($pool_offer)):
							foreach($pool_offer as $offer):
						?>
							<tr>
								<td>
									<?php date_default_timezone_set('Asia/kolkata');
									echo date('d M Y', strtotime($offer->offer_date));?>
								</td>
								<td><?php echo date('g:i A', strtotime($offer->offer_time));?> </td>
								<td><?php echo $offer->src ?> </td>
								<td><?php echo $offer->dest ?> </td>
								<td><button class="greybutton" id="view_<?php echo $offer->id?>" data="<?php echo $offer->id?>">View</button></td>
							</tr>				
						
						<?php
							endforeach;
						else:
							echo '<tr><td colspan="5" class="msg">No Offer Found</td></tr>';
						endif;
						?>
						
						</table>
				
				
					</div>
					
					<?php echo $pagination ?>
			
				</div>
			
			</div>
			
			
		
		</div>
		
		
	</div>
	
	

</div>

<div id="back_div" ></div>
<div id="req_frm" ></div>
<div id="req_terms" ></div>


