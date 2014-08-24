<style type="text/css">

#tour_div:after{content:"";clear:both;display:block;}
#tour_div{border:solid 0px red;}
#tour_sidebar{float:left; border:solid 0px red; width: 18%; height:100%;}
#tour_desc{float:left; border-left:solid 1px #aaa; width:79.8%; margin-left:1px; height:100%; padding:3px 7px 15px 10px;}

#tour_sidebar ul{list-style-type:none; margin:0px; padding:0px;}
#tour_sidebar li{padding: 10px 5px; border-bottom:solid 1px #aaa; text-decoration:none; color:#000}
#tour_sidebar li a{padding: 10px 5px;text-decoration:none;color:#000}
#tour_sidebar li:hover{background:#ccc;}

.hd{margin:2px 0; border-bottom: solid 1px #aaa;}

.des{background: #fff; width:100%; height:100%; }

ul.fact {list-style-type:none; margin:0px; padding:0px; border:solid 0px red; float:left; min-width: 47%;}
.fact li{margin: 3.3% 0; padding: 5px  0; font-size: 20px; font-weight:bold; }
.num{background:#00a1e3; padding:5px 12px; border-radius:20px; width:20px; color:#fff}

.offr{float:left; border-radius:5px; border:solid 1px #00a1e3; margin:5px; padding:5px; width:45.8%; height:100px;}
.plus{float:left; display:table-cell; vertical-align:middle; font-size:40px; font-weight:bold ; color:#00a1e3; height:100px;}
.offr_tg{padding:5px 0 5px 20px; background:url(<?php echo base_url()?>assets/images/check.png)no-repeat; font-size:16px; color:#000; }

.m_text{ float:left; margin:10px; width:47%; border:solid 1px #aaa; border-radius:5px;padding: 5px; }

</style>

<script type="text/javascript">

$(document).ready(function()
{
	
	$(".des").hide();
	$(".des").first().show();
	$("ul#links li a").click(function()
	{
		
		var link = $(this).attr('href');
		
		$(this).parent('li').css({"background":"#ccc"}).siblings().css({"background":"#fff"});
		$("#"+link).siblings().hide();
		$("#"+link).fadeIn();
		
		return false;
	});
	
	$("ul#links li:first-child").css({"background":"#ccc"})
	
	"<?php
	if(isset($_GET['ref']))
	{
		?>"
		
		var url = $(location).attr('href');
		
		var ref_link = url.substring(url.lastIndexOf('=')+1);
		
		
			
			$("#"+ref_link+"1 a").parent('li').css({"background":"#ccc"}).siblings().css({"background":"#fff"});
			$("#"+ref_link).siblings().hide();
			$("#"+ref_link).fadeIn();
			
		
		
		"<?php
		
	}
	?>"
	
});
</script>



<div id="main_container">

	<div id="tour_div">
	
		<div id="tour_sidebar">
			
			<ul id="links">
				<li id="rideshare1"> <a href="rideshare">Rideshare</a> </li>
<!--			<li id="metro1"><a href="metro">Metro Section </a></li>					-->
				<li id="plant1"> <a href="plant">Gift a Plant </a></li>
				<li id="waste1"><a href="waste">Recycle Waste-Pick </a></li>
	<!--		<li id="b1ag1"><a href="bag"> Recycle Bag </a></li>					-->
			</ul>
		
		</div>
		
		
		
		<div id="tour_desc">
		
					
			<div id="rideshare" class="des">
			
				<div>
					<h1 class="hd"> Rush in Delhi </h1>
					<br>
						<ul class="fact">
							<li><span class="num">1</span> No. of vehicles: 7.2 mn </li>
							<li><span class="num">2</span> No. of cars: 2.1 mn </li>
							<li><span class="num">3</span> No. of buses: 45,000 </li>
							<li><span class="num">4</span> Total Population: 22 mn </li>
						</ul>
						
						<div> <img src="<?php echo base_url()?>assets/images/traffic.png" width="200px"> </div>
						<br>
						<small style="float:left;">*Soucre: HT, New Delhi, August 14, 2012</small>
				</div> 
				<br><br>
				<div>
					<h1 class="hd"> Don't worry we have come up with a solution  </h1>
					
					<br>
					
					<div>
					
						<div class="offr">
							
							<div class="offr_tg"> Offer your passenger seats. </div>
							<div class="offr_tg"> Search ride share offer. </div>
							<div class="offr_tg"> Pay or collect at the end of the journey. </div>
							
						</div>
						
						<div class="plus"><br> + </div>
						
						<div class="offr">
							 
							<div class="offr_tg">Save fuel, carbon & planet. </div>
							<div class="offr_tg">Make Friends for a boring commute or journey. </div>
							<div class="offr_tg"> Join environment loyalty program. </div>
							
						</div>
						
						<div style="clear:both;"></div>
						
						<br>
						
						<div style="text-align:center">
							<img src="<?php echo base_url()?>assets/images/car.png">
							<div ><h1>Happy Sharing</h1></div>
						</div>
						
						
			
						
					</div>
					
				</div>
				
			
			</div>
			
			
			<div id="metro" class="des">
			
				<div>
					<h1 class="hd"> Make your metro travel more useful with us </h1>
				
					<div style="float:left">
											
						<img src="<?php echo base_url()?>assets/images/metro_img.png">
						
					</div>
					
					<div class="m_text">
					
						<div class="offr_tg"> With just a few clicks, commuters can reach to a page where they need to submit their 
						purchase proof to get the cashback points. </div>
						<div class="offr_tg">Our admin after checking the proof will add the points to the profile. </div>
						<div class="offr_tg">Customer can check during few working hours again and points would reflect on his/her 
						profile. </div>
							
							
					</div>
					
					<div style="text-align:center;margin-top:10px">
						
						<img src="<?php echo base_url()?>assets/images/shop.png">
						
					</div>
				
				</div>		
			
			</div>
			
			
			<div id="plant" class="des">
			
				<div>
					<h1 class="hd"> Gifting a Plant isn't a bad idea</h1>
					
					<div style="text-align:center;margin-top:30px;">
					
						<img src="<?php echo base_url()?>assets/images/g_plant.png">
					
					</div>
					
					<div>
						<div class="offr_tg">There are thousands of days to celebrate success & happiness.</div>
						<div class="offr_tg">Why not to gift a plant to our loved ones on those beautiful days.</div>
						<div class="offr_tg">Green Gift for Gorgeous day.</div>
					
					</div>
					
					<div style="text-align:center;margin-top:30px;">
					
						<img src="<?php echo base_url()?>assets/images/plant_img.png">
					
					</div>
					
				</div>
			
			</div>
			
			
			
			<div id="waste" class="des">
			
				<div>
					
					<h1 class="hd">Best Recycling of Waste</h1>
					
					<div style="text-align:center; margin-top:30px; border:solid 0px red;">
					
						<img src="<?php echo base_url()?>assets/images/recycle.jpg" height="250px">
						<!--
							<img src="<?php echo base_url()?>assets/images/ratelist.png"  height="400px" >
						-->
					</div>
				
					
					<div style="font-size:15px; line-height:20px; text-align:justify; margin-top:30px">
						
						Trading waste to the regular kabadiwala is one simple premise but wouldn’t it be better if you could get to know 
						how much you contributed to save the environment. Our aim is to create a value proposition for you to save the 
						planet through environment loyalty program. Unlike, your regular kabadiwala we will take all your dry waste and 
						put our best efforts to send it back to the manufacturers. Also, your regular kabadiwala is not capable enough to
						recycle all the waste e.g. cloth, electronics etc. So, won’t be surprised if your regular guy will shake hands 
						with us in near future.
						
				    </div>
					
			   </div>
			
		   </div>
			
		</div>
		
		<hr width="100%" height="1px" style="color:#aaa;"></hr>
		
	</div>

</div>