<script type="text/javascript">

$(document).ready(function()
{
	$("#close").click(function()
	{
		$("#back_div").hide();
		$("#ticket_div").hide();
	});
});
</script>

<img src="<?php echo base_url().'assets/images/close.png'?>" id="close">


<img src="<?php echo base_url().'assets/images/uploads/'.$ticket->title?>" >

