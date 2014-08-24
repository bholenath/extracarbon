<style type="text/css">

#msg{border:solid 1px #aaa; border-radius:5px;width: 600px; margin:50px auto; padding: 5px;}
#msg h1 {border-bottom: solid 1px #aaa;padding: 5px 0; font-size:18px;}
#msg ul {margin:0px; list-style-type:square;}
#msg li, #msg li a {padding: 5px 0; color:#000;}

</style>


<div id="main_container">

	<div id="msg">
		<h1> The page you requested was not found. </h1>
		<p>	You may have clicked an expired link or mistyped the address. </p>
		
		<ul>
			<li><a href="<?php echo base_url()?>home"> Go to the Extracarbon homepage. </a> </li>
			<li><a href="<?php echo base_url()?>home" onclick="history.back()"> Go back to the previous page. </a> </li>
		</ul>
		
	</div>
	
</div>